<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PracticeController extends Controller
{
    // ===== 章節選擇頁 =====
    public function index()
    {
        $userId = session('user_id');

        // 哪些章節有題目
        $units = DB::table('program_page')
            ->pluck('unit_no')
            ->toArray();

        // 該使用者每章的分數（每章最多一筆，靠資料庫 unique 限制）
        $scores = $userId
            ? DB::table('program_attempt_log')->where('user_id', $userId)->pluck('score', 'unit_id')
            : collect();

        $chapters = [
            ['unit' => 1, 'icon' => '🔢', 'title' => '數值、字串與串列'],
            ['unit' => 2, 'icon' => '🔀', 'title' => '選擇性敘述與迴圈'],
            ['unit' => 3, 'icon' => '🧩', 'title' => '函數'],
            ['unit' => 4, 'icon' => '🏗️', 'title' => '物件導向程式設計'],
            ['unit' => 5, 'icon' => '📦', 'title' => '變數與資料型態'],
        ];

        foreach ($chapters as &$ch) {
            $ch['has_content'] = in_array($ch['unit'], $units);
            $ch['score']       = $scores[$ch['unit']] ?? null;

            // 第 1 章永遠解鎖；其餘章節要「前一章已有作答紀錄」才解鎖
            $ch['locked'] = $ch['unit'] > 1 && !isset($scores[$ch['unit'] - 1]);
        }

        return view('practice/practice-index', ['chapters' => $chapters]);
    }

    // ===== 顯示填空題頁面 =====
    public function show($unit)
    {
        $userId = session('user_id');

        if (!$this->isUnlocked($userId, $unit)) {
            return redirect('/practice')->with('error', '請先完成前一章節，才能解鎖這一章。');
        }

        if ($this->hasAttempted($userId, $unit)) {
            return redirect('/practice')->with('error', '這個章節已經作答過了，每章只能作答一次。');
        }

        $practice = DB::table('program_page')
            ->where('unit_no', $unit)
            ->first();

        if (!$practice) {
            abort(404);
        }

        $lines      = explode("\n", $practice->code_template);
        $blankCount = substr_count($practice->code_template, '___');

        return view('practice/practice', [
            'unit'       => $unit,
            'practice'   => $practice,
            'lines'      => $lines,
            'blankCount' => $blankCount,
        ]);
    }

    // ===== 判答 =====
    public function judge(Request $request, $unit)
    {
        $userId = session('user_id');

        if (!$this->isUnlocked($userId, $unit)) {
            return response()->json(['error' => '章節尚未解鎖'], 403);
        }
        if ($this->hasAttempted($userId, $unit)) {
            return response()->json(['error' => '這個章節已經作答過了'], 409);
        }

        $practice = DB::table('program_page')
            ->where('unit_no', $unit)
            ->first();

        if (!$practice) {
            return response()->json(['error' => '找不到題目'], 404);
        }

        // 正確答案陣列
        $correctAnswers = explode(';', $practice->correct_answers);
        $totalBlanks    = count($correctAnswers);
        // 學生答案（從 JSON body 來）
        $userAnswers = $request->input('answers', []);

        $results = [];
        $correct = 0;

        foreach ($correctAnswers as $i => $correctAns) {
            $userAns   = trim($userAnswers[$i] ?? '');
            $isCorrect = $userAns === trim($correctAns);

            $results[] = [
                'index'          => $i,
                'user_answer'    => $userAns,
                'correct_answer' => trim($correctAns),
                'is_correct'     => $isCorrect,
            ];

            if ($isCorrect) {
                $correct++;
            }
        }

        $score = round(($correct / $totalBlanks) * 100);

        try {
            DB::transaction(function () use ($userId, $unit, $score, $results) {
                // ===== 儲存作答歷程 =====
                DB::table('program_attempt_log')->insert([
                    'user_id'    => $userId,
                    'unit_id'    => $unit,
                    'score'      => $score,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // ===== 儲存各題目作答紀錄 =====
                $logs = [];
                foreach ($results as $r) {
                    $logs[] = [
                        'user_id'        => $userId,
                        'unit_id'        => $unit,
                        'question_id'    => $r['index'] + 1,    // 從 1 開始
                        'answer_content' => $r['user_answer'],
                        'is_correct'     => $r['is_correct'] ? 1 : 0,
                        'created_at'     => now(),
                        'updated_at'     => now(),
                    ];
                }
                DB::table('program_question_log')->insert($logs);
            });
        } catch (\Illuminate\Database\QueryException $e) {
            // 唯一索引擋下「同時送出兩次」的競態情況
            return response()->json(['error' => '這個章節已經作答過了'], 409);
        }

        return response()->json([
            'results' => $results,
            'correct' => $correct,
            'total'   => $totalBlanks,
            'score'   => $score,
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

        return DB::table('program_attempt_log')
            ->where('user_id', $userId)
            ->where('unit_id', $unit - 1)
            ->exists();
    }

    private function hasAttempted($userId, $unit)
    {
        if (!$userId) {
            return false;
        }

        return DB::table('program_attempt_log')
            ->where('user_id', $userId)
            ->where('unit_id', $unit)
            ->exists();
    }
}
