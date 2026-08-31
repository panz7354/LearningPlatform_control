<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    // ===== 章節選擇頁 =====
    public function index()
    {
        $userId = session('user_id');

        $questionCounts = DB::table('quiz_page')
            ->select('unit_no', DB::raw('count(*) as total'))
            ->groupBy('unit_no')
            ->pluck('total', 'unit_no');

        // 該使用者每章的分數（每章最多一筆，靠資料庫 unique 限制）
        $scores = $userId
            ? DB::table('quiz_result')->where('user_id', $userId)->pluck('score', 'unit_id')
            : collect();

        $chapters = [
            ['unit' => 1, 'title' => '數值、字串與串列'],
            ['unit' => 2, 'title' => '選擇性敘述與迴圈'],
            ['unit' => 3, 'title' => '函數'],
            ['unit' => 4, 'title' => '物件導向程式設計'],
            ['unit' => 5, 'title' => '變數與資料型態'],
        ];

        foreach ($chapters as &$ch) {
            $ch['total'] = $questionCounts[$ch['unit']] ?? 0;
            $ch['score'] = $scores[$ch['unit']] ?? null;

            // 第 1 章永遠解鎖；其餘章節要「前一章已有作答紀錄」才解鎖
            $ch['locked'] = $ch['unit'] > 1 && !isset($scores[$ch['unit'] - 1]);
        }

        return view('quiz/quiz-index', ['chapters' => $chapters]);
    }

    // ===== 章節測驗頁 =====
    public function show($unit)
    {
        $userId = session('user_id');

        if (!$this->isUnlocked($userId, $unit)) {
            return redirect('/quiz')->with('error', '請先完成前一章節，才能解鎖這一章。');
        }

        if ($this->hasAttempted($userId, $unit)) {
            return redirect('/quiz')->with('error', '這個章節已經測驗過了，每章只能測驗一次。');
        }

        $questions = DB::table('quiz_page')
            ->where('unit_no', $unit)
            ->orderBy('id')
            ->get();

        if ($questions->isEmpty()) {
            abort(404);
        }

        foreach ($questions as $q) {
            $q->options_array = explode('|', $q->options);
        }

        return view('quiz/quiz', [
            'unit'      => $unit,
            'questions' => $questions,
        ]);
    }

    // ===== 收作答內容、後端重新計分並存分數，回傳 result_id 供 effort 使用 =====
    public function saveResult(Request $request, $unit)
    {
        $userId = session('user_id');

        if (!$this->isUnlocked($userId, $unit)) {
            return response()->json(['error' => '章節尚未解鎖'], 403);
        }
        if ($this->hasAttempted($userId, $unit)) {
            return response()->json(['error' => '這個章節已經測驗過了'], 409);
        }

        $request->validate([
            'answers' => 'required|array',
        ]);

        $questions = DB::table('quiz_page')
            ->where('unit_no', $unit)
            ->orderBy('id')
            ->get();

        $total = $questions->count();
        if ($total === 0) {
            return response()->json(['error' => '找不到題目'], 404);
        }

        $correct = 0;
        $results = [];

        foreach ($questions as $q) {
            $userAns    = trim((string) $request->input("answers.{$q->id}", ''));
            $correctAns = trim($q->correct_answer);

            if ($q->q_type === 'SORT') {
                // 排序題：整串字母序列要完全一致，例如 "A;B;C"
                $isCorrect = $userAns !== '' && $userAns === $correctAns;
            } else {
                // 是非 / 選擇題：完全相符，或選項代號（字首）相符
                $isCorrect = $userAns !== '' && (
                    $userAns === $correctAns ||
                    mb_substr($userAns, 0, 1) === mb_substr($correctAns, 0, 1)
                );
            }

            if ($isCorrect) {
                $correct++;
            }

            $results[] = [
                'id'             => $q->id,
                'is_correct'     => $isCorrect,
                'correct_answer' => $correctAns,
            ];
        }

        $score = (int) round($correct / $total * 100);

        try {
            $resultId = DB::table('quiz_result')->insertGetId([
                'user_id'    => $userId,
                'unit_id'    => $unit,
                'score'      => $score,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            // 唯一索引擋下「同時送出兩次」的競態情況
            return response()->json(['error' => '這個章節已經測驗過了'], 409);
        }

        return response()->json([
            'status'    => 'ok',
            'result_id' => $resultId,
            'score'     => $score,
            'correct'   => $correct,
            'total'     => $total,
            'results'   => $results,
        ]);
    }

    // ===== 補上認知負荷分數 =====
    public function saveEffort(Request $request, $unit)
    {
        $request->validate([
            'result_id'    => 'required|integer',
            'effort_score' => 'required|integer|min:1|max:9',
        ]);

        // 加上 user_id / unit_id 條件，防止使用者竄改別人或別章的紀錄
        $updated = DB::table('quiz_result')
            ->where('id',      $request->input('result_id'))
            ->where('user_id', session('user_id'))
            ->where('unit_id', $unit)
            ->update([
                'effort_score' => $request->input('effort_score'),
                'updated_at'   => now(),
            ]);

        return response()->json([
            'status' => $updated ? 'ok' : 'not_found',
        ]);
    }

    // ===== 共用小工具 =====
    private function isUnlocked($userId, $unit)
    {
        if ($unit == 1) {
            return true;
        }
        if (!$userId) {
            return false;
        }

        return DB::table('quiz_result')
            ->where('user_id', $userId)
            ->where('unit_id', $unit - 1)
            ->exists();
    }

    private function hasAttempted($userId, $unit)
    {
        if (!$userId) {
            return false;
        }

        return DB::table('quiz_result')
            ->where('user_id', $userId)
            ->where('unit_id', $unit)
            ->exists();
    }
}
