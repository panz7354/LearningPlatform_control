@extends('layouts.app')

@section('style')
<style>
    .practice-wrap {
        max-width: 860px;
        margin: 0 auto;
        padding: 32px 40px 60px;
    }

    /* ===== 頁首 ===== */
    .practice-header {
        background: linear-gradient(135deg, #7c3aed 0%, #a78bfa 100%);
        border-radius: 14px;
        padding: 28px 32px;
        margin-bottom: 24px;
        color: #fff;
        position: relative;
        overflow: hidden;
    }
    .practice-header::before {
        content: '✏️';
        position: absolute;
        right: 32px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 80px;
        opacity: 0.12;
        pointer-events: none;
    }
    .practice-header h1 {
        font-family: 'Nunito', sans-serif;
        font-size: 22px;
        font-weight: 800;
        margin-bottom: 6px;
    }
    .practice-header p {
        font-size: 14px;
        opacity: 0.9;
        margin: 0;
        line-height: 1.6;
    }

    /* ===== 題目說明卡片 ===== */
    .desc-card {
        background: #fff;
        border-radius: 14px;
        border: 1px solid #e2e8f0;
        padding: 24px 32px;
        margin-bottom: 20px;
    }
    .desc-card h2 {
        font-family: 'Nunito', sans-serif;
        font-size: 16px;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .desc-card p {
        font-size: 14px;
        color: #475569;
        line-height: 1.8;
        white-space: pre-line;
    }

    /* ===== 程式碼區塊 ===== */
    .code-card {
        background: #fff;
        border-radius: 14px;
        border: 1px solid #e2e8f0;
        padding: 0;
        margin-bottom: 20px;
        overflow: hidden;
    }

    .code-card-header {
        background: #f8fafc;
        border-bottom: 1px solid #e2e8f0;
        padding: 12px 20px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .code-card-header span {
        font-size: 13px;
        font-weight: 700;
        color: #64748b;
    }

    .dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        display: inline-block;
    }
    .dot-red    { background: #ef4444; }
    .dot-yellow { background: #f59e0b; }
    .dot-green  { background: #22c55e; }

    /* ===== 程式碼行 ===== */
    .code-body {
        padding: 20px 0;
        font-family: 'Consolas', 'Monaco', 'Courier New', monospace;
        font-size: 13.5px;
        line-height: 1;
    }

    .code-line {
        display: flex;
        align-items: center;
        padding: 20px 10px;
    }

    .code-line:hover {
        background: #f8fafc;
    }

    .line-num {
        width: 32px;
        color: #94a3b8;
        font-size: 12px;
        user-select: none;
        flex-shrink: 0;
        text-align: right;
        padding-right: 12px;
    }

    .line-content {
        flex: 1;
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 2px;
        color: #07008c;
        white-space: nowrap;
    }

    /* ===== 填空輸入框 ===== */
    .blank-input {
        display: inline-block;
        font-family: 'Consolas', 'Monaco', 'Courier New', monospace;
        font-size: 13.5px;
        color: #1d4ed8;
        background: #eff6ff;
        border: 2px dashed #93c5fd;
        border-radius: 4px;
        padding: 1px 8px;
        min-width: 120px;
        outline: none;
        transition: border-color 0.15s, background 0.15s;
        white-space: nowrap;
    }

    .blank-input:focus {
        border-color: #4f86c6;
        background: #dbeafe;
        border-style: solid;
    }

    /* 判答後的樣式 */
    .blank-input.correct {
        border-color: #22c55e;
        border-style: solid;
        background: #dcfce7;
        color: #15803d;
    }
    .blank-input.wrong {
        border-color: #ef4444;
        border-style: solid;
        background: #fee2e2;
        color: #b91c1c;
    }
    .blank-input:disabled {
        cursor: not-allowed;
    }

    /* 正確答案提示（答錯後顯示） */
    .correct-hint {
        display: none;
        font-size: 12px;
        color: #15803d;
        background: #dcfce7;
        border-radius: 4px;
        padding: 1px 8px;
        margin-left: 6px;
        white-space: nowrap;
    }
    .correct-hint.show { display: inline-block; }

    /* ===== 送出按鈕 ===== */
    .submit-area {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-top: 4px;
        padding: 0 20px 20px;
    }

    .submit-btn {
        font-family: 'Noto Sans TC', sans-serif;
        font-size: 15px;
        font-weight: 700;
        padding: 11px 32px;
        background: #7c3aed;
        color: #fff;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: background 0.15s, transform 0.12s;
    }
    .submit-btn:hover:not(:disabled) {
        background: #6d28d9;
        transform: translateY(-1px);
    }
    .submit-btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }

    .retry-btn {
        font-family: 'Noto Sans TC', sans-serif;
        font-size: 14px;
        font-weight: 600;
        padding: 10px 24px;
        background: transparent;
        color: #7c3aed;
        border: 1.5px solid #a78bfa;
        border-radius: 10px;
        cursor: pointer;
        transition: background 0.15s;
        display: none;
    }
    .retry-btn:hover { background: #ede9fe; }
    .retry-btn.show  { display: inline-block; }

    /* ===== 分數結果 ===== */
    .result-banner {
        display: none;
        background: #fff;
        border-radius: 14px;
        border: 1px solid #e2e8f0;
        padding: 32px;
        margin-bottom: 20px;
        text-align: center;
    }
    .result-banner.show { display: block; }

    .result-score {
        font-family: 'Nunito', sans-serif;
        font-size: 60px;
        font-weight: 800;
        color: #7c3aed;
        line-height: 1;
        margin-bottom: 6px;
    }
    .result-score span { font-size: 24px; color: #94a3b8; }

    .result-msg {
        font-size: 18px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 4px;
    }
    .result-sub {
        font-size: 14px;
        color: #64748b;
    }

    /* ===== RWD ===== */
    @media screen and (max-width: 768px) {
        .practice-wrap { padding: 16px; }
        .practice-header { padding: 22px 20px; }
        .desc-card { padding: 20px; }
        .code-line { padding: 3px 10px; }
        .blank-input { min-width: 80px; }
    }
</style>
@endsection

@section('content')
<div class="practice-wrap">

    {{-- ===== 頁首 ===== --}}
    <div class="practice-header">
        <h1>第 {{ $unit }} 章　程式實作</h1>
        <p>將程式碼中的空格填入正確內容，共 {{ $blankCount }} 格，每格 {{ round(100 / $blankCount) }} 分</p>
    </div>

    {{-- ===== 分數結果（答題後顯示） ===== --}}
    <div class="result-banner" id="result-banner">
        <div class="result-score" id="result-score">0 <span>分</span></div>
        <div class="result-msg"  id="result-msg"></div>
        <div class="result-sub"  id="result-sub"></div>
    </div>

    {{-- ===== 題目說明 ===== --}}
    <div class="desc-card">
        <h2>📋 題目說明</h2>
        <p>{{ $practice->description }}</p>
    </div>

    {{-- ===== 程式碼填空區 ===== --}}
    <div class="code-card">
        <div class="code-card-header">
            <span class="dot dot-red"></span>
            <span class="dot dot-yellow"></span>
            <span class="dot dot-green"></span>
            <span style="margin-left:8px;">practice_unit{{ $unit }}.py</span>
        </div>

        <div class="code-body" id="code-body">
            @php $blankIndex = 0; @endphp

            @foreach($lines as $lineNum => $line)
            <div class="code-line">
                <span class="line-num">{{ $lineNum + 1 }}</span>
                <span class="line-content">
                @if(str_contains($line, '___'))
                @php
                    $parts = explode('___', $line);
                @endphp
                @foreach($parts as $pi => $part)
                    {!! str_replace(' ', '&nbsp;', htmlspecialchars($part)) !!}
                    @if($pi < count($parts) - 1)
                        <input
                            class="blank-input"
                            type="text"
                            data-index="{{ $blankIndex }}"
                            id="blank-{{ $blankIndex }}"
                            placeholder="填入程式碼"
                            autocomplete="off"
                            spellcheck="false"
                        >
                        <span class="correct-hint" id="hint-{{ $blankIndex }}"></span>
                        @php $blankIndex++; @endphp
                    @endif
                @endforeach
            @else
                {!! str_replace(' ', '&nbsp;', htmlspecialchars($line)) !!}
            @endif
                </span>
            </div>
            @endforeach
        </div>

        <div class="submit-area">
            <button class="submit-btn" id="submit-btn" onclick="submitAnswers()">
                ✅ 送出答案
            </button>
            <button class="retry-btn" id="retry-btn" onclick="retryPractice()">
                🔙 回章節列表
            </button>
        </div>
    </div>

</div>

<script>
    const unit        = {{ $unit }};
    const blankCount  = {{ $blankCount }};

    // ===== 送出答案 =====
    async function submitAnswers() {
        // 收集所有空格的答案
        const answers = {};
        for (let i = 0; i < blankCount; i++) {
            answers[i] = document.getElementById(`blank-${i}`).value;
        }

        // 送到後端判答
        const response = await fetch(`/practice/${unit}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
                                || '{{ csrf_token() }}',
            },
            body: JSON.stringify({ answers }),
        });

        const data = await response.json();
        showResults(data);
    }

    // ===== 顯示判答結果 =====
    function showResults(data) {
        // 鎖定所有輸入框
        document.querySelectorAll('.blank-input').forEach(input => {
            input.disabled = true;
        });

        // 標記每格對錯
        data.results.forEach(r => {
            const input = document.getElementById(`blank-${r.index}`);
            const hint  = document.getElementById(`hint-${r.index}`);

            if (r.is_correct) {
                input.classList.add('correct');
            } else {
                input.classList.add('wrong');
                // 顯示正確答案
                hint.textContent = `✓ ${r.correct_answer}`;
                hint.classList.add('show');
            }
        });

        // 顯示分數
        const banner = document.getElementById('result-banner');
        banner.classList.add('show');
        banner.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

        document.getElementById('result-score').innerHTML =
            `${data.score} <span>分</span>`;

        let msg, sub;
        if (data.score === 100) {
            msg = '🎉 滿分！完全正確！';
            sub = '程式邏輯掌握得非常好！';
        } else if (data.score >= 60) {
            msg = '👍 答對 ' + data.correct + ' / ' + data.total + ' 格';
            sub = '錯誤的格子有顯示正確答案，再複習一下！';
        } else {
            msg = '📖 答對 ' + data.correct + ' / ' + data.total + ' 格';
            sub = '建議回到課程頁面再看一遍，然後重新作答！';
        }

        document.getElementById('result-msg').textContent = msg;
        document.getElementById('result-sub').textContent = sub;

        // 顯示重新作答按鈕
        document.getElementById('submit-btn').disabled = true;
        document.getElementById('retry-btn').classList.add('show');
    }

    // ===== 回章節列表 =====
    // 每章只能作答一次，所以這裡改成導回章節列表，而不是重新整理讓使用者再作答一次
    function retryPractice() {
        window.location.href = '/practice';
    }

    // ===== Enter 鍵跳到下一格 =====
    document.addEventListener('DOMContentLoaded', function () {
        const inputs = document.querySelectorAll('.blank-input');
        inputs.forEach((input, idx) => {
            input.addEventListener('keydown', function (e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    const next = inputs[idx + 1];
                    if (next) next.focus();
                    else submitAnswers();
                }
            });
        });
    });
</script>
@endsection
