<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    // ===== 章節選擇頁 =====
    public function index()
    {
        $questionCounts = DB::table('quiz_page')
            ->select('unit_no', DB::raw('count(*) as total'))
            ->groupBy('unit_no')
            ->pluck('total', 'unit_no');

        $chapters = [
            ['unit' => 1, 'title' => '數值、字串與串列'],
            ['unit' => 2, 'title' => '選擇性敘述與迴圈'],
            ['unit' => 3, 'title' => '函數'],
            ['unit' => 4, 'title' => '物件導向程式設計'],
            ['unit' => 5, 'title' => '變數與資料型態'],
        ];

        foreach ($chapters as &$ch) {
            $ch['total'] = $questionCounts[$ch['unit']] ?? 0;
            $ch['score'] = null;
        }

        return view('quiz/quiz-index', ['chapters' => $chapters]);
    }

    // ===== 章節測驗頁 =====
    public function show($unit)
    {
        $questions = DB::table('quiz_page')
            ->where('unit_no', $unit)
            ->orderBy('id')
            ->get();

        foreach ($questions as $q) {
            $q->options_array = explode('|', $q->options);
        }

        return view('quiz/quiz', [
            'unit'      => $unit,
            'questions' => $questions,
        ]);
    }

    // ===== 儲存測驗分數，回傳 result_id 供 effort 使用 =====
    public function saveResult(Request $request, $unit)
    {
        $request->validate([
            'score' => 'required|integer|min:0|max:100',
        ]);

        $resultId = DB::table('quiz_result')->insertGetId([
            'user_id'    => session('user_id'),
            'unit_id'    => $unit,
            'score'      => $request->input('score'),
            // effort_score 欄位先 null，等量表填完再 update
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json([
            'status'    => 'ok',
            'result_id' => $resultId,   // ← 前端存起來
        ]);
    }

    // ===== 補上認知負荷分數 =====
    public function saveEffort(Request $request, $unit)
    {
        $request->validate([
            'result_id'    => 'required|integer',
            'effort_score' => 'required|integer|min:1|max:9',
        ]);

        // 加 user_id 條件，防止使用者篡改別人的紀錄
        $updated = DB::table('quiz_result')
            ->where('id',      $request->input('result_id'))
            ->where('user_id', session('user_id'))
            ->update([
                'effort_score' => $request->input('effort_score'),
                'updated_at'   => now(),
            ]);

        return response()->json([
            'status'  => $updated ? 'ok' : 'not_found',
        ]);
    }
}
