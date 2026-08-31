@extends('layouts.app')

@section('style')
<style>
    .quiz-wrap {
        max-width: 800px;
        margin: 0 auto;
        padding: 32px 40px 60px;
    }

    /* ===== 頁首 ===== */
    .quiz-header {
        background: linear-gradient(135deg, #4f86c6 0%, #6fa3d8 100%);
        border-radius: 14px;
        padding: 28px 32px;
        margin-bottom: 28px;
        color: #fff;
    }
    .quiz-header h1 {
        font-family: 'Nunito', sans-serif;
        font-size: 22px;
        font-weight: 800;
        margin-bottom: 6px;
    }
    .quiz-header p {
        font-size: 14px;
        opacity: 0.88;
        margin: 0;
    }

    /* ===== 進度條 ===== */
    .progress-bar-wrap {
        background: rgba(255,255,255,0.3);
        border-radius: 20px;
        height: 8px;
        margin-top: 16px;
        overflow: hidden;
    }
    .progress-bar-fill {
        background: #fff;
        height: 100%;
        border-radius: 20px;
        transition: width 0.4s ease;
        width: 0%;
    }

    /* ===== 題目卡片 ===== */
    .question-card {
        background: #fff;
        border-radius: 14px;
        border: 1px solid #e2e8f0;
        padding: 28px 32px;
        margin-bottom: 20px;
        transition: border-color 0.2s;
    }
    .question-card.correct {
        border-color: #22c55e;
        background: #f0fdf4;
    }
    .question-card.wrong {
        border-color: #ef4444;
        background: #fef2f2;
    }

    .question-meta {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 14px;
    }
    .question-num {
        font-size: 13px;
        font-weight: 700;
        color: #64748b;
    }
    .question-type-badge {
        font-size: 11px;
        font-weight: 700;
        padding: 3px 10px;
        border-radius: 20px;
        letter-spacing: 0.05em;
    }
    .badge-tf   { background: #dbeafe; color: #1d4ed8; }
    .badge-mc   { background: #fef3c7; color: #b45309; }
    .badge-sort { background: #ede9fe; color: #7c3aed; }

    .question-text {
        font-size: 16px;
        font-weight: 600;
        color: #1e293b;
        line-height: 1.65;
        margin-bottom: 20px;
    }

    /* ===== 是非 / 選擇 按鈕 ===== */
    .options-group {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
    .option-btn {
        font-family: 'Noto Sans TC', sans-serif;
        font-size: 14px;
        font-weight: 600;
        padding: 10px 22px;
        border-radius: 8px;
        border: 2px solid #e2e8f0;
        background: #f8fafc;
        color: #334155;
        cursor: pointer;
        transition: all 0.15s;
    }
    .option-btn:hover:not(:disabled) {
        border-color: #4f86c6;
        background: #dbeafe;
        color: #1d4ed8;
    }
    .option-btn.selected {
        border-color: #4f86c6;
        background: #4f86c6;
        color: #fff;
    }
    .option-btn.correct-ans {
        border-color: #22c55e;
        background: #22c55e;
        color: #fff;
    }
    .option-btn.wrong-ans {
        border-color: #ef4444;
        background: #ef4444;
        color: #fff;
    }
    .option-btn:disabled {
        cursor: not-allowed;
        opacity: 0.85;
    }

    /* ===== 答題回饋 ===== */
    .feedback {
        display: none;
        margin-top: 14px;
        font-size: 14px;
        font-weight: 600;
        padding: 10px 16px;
        border-radius: 8px;
    }
    .feedback.show { display: block; }
    .feedback.correct { background: #dcfce7; color: #15803d; }
    .feedback.wrong   { background: #fee2e2; color: #b91c1c; }

    /* ===== 拖曳排序題 ===== */
    .sort-container {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-bottom: 16px;
    }
    .sort-item {
        background: #f8fafc;
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        padding: 12px 16px;
        font-size: 14px;
        font-weight: 600;
        color: #334155;
        cursor: grab;
        display: flex;
        align-items: center;
        gap: 12px;
        transition: border-color 0.15s, background 0.15s, box-shadow 0.15s;
        user-select: none;
    }
    .sort-item:active { cursor: grabbing; }
    .sort-item.dragging {
        opacity: 0.4;
        border-color: #4f86c6;
    }
    .sort-item.drag-over {
        border-color: #4f86c6;
        background: #dbeafe;
        box-shadow: 0 0 0 3px rgba(79,134,198,0.2);
    }
    .sort-item.correct-item { border-color: #22c55e; background: #dcfce7; }
    .sort-item.wrong-item   { border-color: #ef4444; background: #fee2e2; }

    .drag-handle {
        color: #94a3b8;
        font-size: 18px;
        flex-shrink: 0;
    }
    .sort-label {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 24px;
        height: 24px;
        background: #4f86c6;
        color: #fff;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 700;
        flex-shrink: 0;
    }
    .sort-text {
        font-family: 'Consolas', 'Monaco', monospace;
        font-size: 13px;
        color: #c10000;
        flex: 1;
    }

    .confirm-sort-btn {
        font-family: 'Noto Sans TC', sans-serif;
        font-size: 14px;
        font-weight: 600;
        padding: 10px 24px;
        background: #4f86c6;
        color: #fff;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background 0.15s, transform 0.12s;
        margin-top: 6px;
    }
    .confirm-sort-btn:hover:not(:disabled) {
        background: #2d6aa8;
        transform: translateY(-1px);
    }
    .confirm-sort-btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }

    /* ===== 心智努力量表 ===== */
    .effort-card {
        display: none;
        background: #fff;
        border-radius: 14px;
        border: 1px solid #e2e8f0;
        padding: 32px 36px;
        margin-bottom: 20px;
    }
    .effort-card.show { display: block; }

    .effort-title {
        font-family: 'Nunito', sans-serif;
        font-size: 17px;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 6px;
        text-align: center;
    }
    .effort-sub {
        font-size: 13px;
        color: #64748b;
        text-align: center;
        margin-bottom: 28px;
    }

    .effort-scale-wrap {
        max-width: 560px;
        margin: 0 auto;
    }

    .effort-numbers {
        display: flex;
        justify-content: space-between;
        margin-bottom: 8px;
    }
    .effort-numbers span {
        font-size: 13px;
        font-weight: 700;
        color: #94a3b8;
        width: 28px;
        text-align: center;
    }

    .effort-radios {
        display: flex;
        justify-content: space-between;
        margin-bottom: 8px;
    }
    .effort-radio-btn {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        border: 2px solid #cbd5e1;
        background: #fff;
        cursor: pointer;
        transition: border-color 0.15s, background 0.15s, transform 0.12s;
        flex-shrink: 0;
    }
    .effort-radio-btn:hover {
        border-color: #4f86c6;
        transform: scale(1.1);
    }
    .effort-radio-btn.selected {
        border-color: #4f86c6;
        background: #4f86c6;
        box-shadow: 0 0 0 4px rgba(79,134,198,0.18);
    }

    .effort-labels {
        display: flex;
        justify-content: space-between;
        font-size: 12px;
        color: #94a3b8;
        margin-top: 4px;
    }

    .effort-submit-btn {
        display: block;
        margin: 28px auto 0;
        font-family: 'Noto Sans TC', sans-serif;
        font-size: 14px;
        font-weight: 700;
        padding: 10px 32px;
        background: #4f86c6;
        color: #fff;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: background 0.15s, transform 0.12s;
    }
    .effort-submit-btn:hover:not(:disabled) {
        background: #2d6aa8;
        transform: translateY(-1px);
    }
    .effort-submit-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    /* ===== 分數結果 ===== */
    .result-card {
        display: none;
        background: #fff;
        border-radius: 14px;
        border: 1px solid #e2e8f0;
        padding: 40px 32px;
        text-align: center;
        margin-bottom: 28px;
    }
    .result-card.show { display: block; }
    .result-score {
        font-family: 'Nunito', sans-serif;
        font-size: 64px;
        font-weight: 800;
        color: #4f86c6;
        line-height: 1;
        margin-bottom: 8px;
    }
    .result-score span {
        font-size: 28px;
        color: #64748b;
    }
    .result-msg {
        font-size: 18px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 6px;
    }
    .result-sub {
        font-size: 14px;
        color: #64748b;
        margin-bottom: 28px;
    }
    .retry-btn {
        font-family: 'Noto Sans TC', sans-serif;
        font-size: 15px;
        font-weight: 700;
        padding: 12px 32px;
        background: #4f86c6;
        color: #fff;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: background 0.15s, transform 0.12s;
    }
    .retry-btn:hover {
        background: #2d6aa8;
        transform: translateY(-1px);
    }

    /* ===== RWD ===== */
    @media screen and (max-width: 768px) {
        .quiz-wrap { padding: 16px; }
        .quiz-header { padding: 22px 20px; }
        .question-card { padding: 20px 18px; }
        .options-group { flex-direction: column; }
        .option-btn { width: 100%; text-align: left; }
        .effort-card { padding: 24px 18px; }
        .effort-radio-btn { width: 24px; height: 24px; }
        .effort-numbers span { font-size: 11px; width: 24px; }
    }
</style>
@endsection

@section('content')
<div class="quiz-wrap">

    {{-- ===== 頁首 ===== --}}
    <div class="quiz-header">
        <h1>第 {{ $unit }} 章　互動測驗</h1>
        <p>共 {{ count($questions) }} 題，答完後自動計算分數</p>
        <div class="progress-bar-wrap">
            <div class="progress-bar-fill" id="progress-bar"></div>
        </div>
    </div>

    {{-- ===== 題目列表 ===== --}}
    @foreach($questions as $index => $q)
    <div class="question-card" id="card-{{ $q->id }}" data-id="{{ $q->id }}">
        <div class="question-meta">
            <span class="question-num">第 {{ $index + 1 }} 題</span>
            @if($q->q_type === 'TF')
                <span class="question-type-badge badge-tf">是非題</span>
            @elseif($q->q_type === 'MC')
                <span class="question-type-badge badge-mc">選擇題</span>
            @else
                <span class="question-type-badge badge-sort">排序題</span>
            @endif
        </div>

        <div class="question-text">{{ $q->question_text }}</div>

        {{-- 是非題 / 選擇題 --}}
        @if($q->q_type === 'TF' || $q->q_type === 'MC')
        <div class="options-group" id="options-{{ $q->id }}">
            @foreach($q->options_array as $opt)
            <button class="option-btn"
                    data-qid="{{ $q->id }}"
                    data-value="{{ $opt }}"
                    data-correct="{{ $q->correct_answer }}">
                {{ $opt }}
            </button>
            @endforeach
        </div>

        {{-- 排序題 --}}
        @elseif($q->q_type === 'SORT')
        <div class="sort-container" id="sort-{{ $q->id }}">
            @foreach($q->options_array as $opt)
            @php
                // 取出選項代號（A/B/C）和內容
                $letter = substr($opt, 0, 1);
                $content = substr($opt, 2); // 去掉 "A." 前綴
            @endphp
            <div class="sort-item"
                 draggable="true"
                 data-letter="{{ $letter }}"
                 data-qid="{{ $q->id }}">
                <span class="drag-handle">⠿</span>
                <span class="sort-label">{{ $letter }}</span>
                <span class="sort-text">{{ $content }}</span>
            </div>
            @endforeach
        </div>
        <button class="confirm-sort-btn"
                id="confirm-{{ $q->id }}"
                onclick="submitSort({{ $q->id }}, '{{ $q->correct_answer }}')">
            確認排序
        </button>
        @endif

        {{-- 答題回饋 --}}
        <div class="feedback" id="feedback-{{ $q->id }}"></div>
    </div>
    @endforeach

    {{-- ===== 心智努力量表 ===== --}}
    <div class="effort-card" id="effort-card">
        <p class="effort-title">請問您在完成本次程式學習任務時，投入了多少心智努力？</p>
        <p class="effort-sub">請點選最符合您感受的數字</p>

        <div class="effort-scale-wrap">
            <div class="effort-numbers">
                <span>1</span><span>2</span><span>3</span><span>4</span>
                <span>5</span><span>6</span><span>7</span><span>8</span><span>9</span>
            </div>
            <div class="effort-radios" id="effort-radios">
                @for($i = 1; $i <= 9; $i++)
                <button type="button" class="effort-radio-btn" data-value="{{ $i }}"></button>
                @endfor
            </div>
            <div class="effort-labels">
                <span>極低</span>
                <span>低</span>
                <span>中等</span>
                <span>高</span>
                <span>極高</span>
            </div>
        </div>

        <button class="effort-submit-btn" id="effort-submit-btn" disabled onclick="submitEffort()">
            送出
        </button>
    </div>

    {{-- ===== 分數結果 ===== --}}
    <div class="result-card" id="result-card">
        <div class="result-score" id="result-score">0 <span>/ {{ count($questions) }}</span></div>
        <div class="result-msg" id="result-msg"></div>
        <div class="result-sub" id="result-sub"></div>
        <button class="retry-btn" onclick="retryQuiz()">回章節列表</button>
    </div>

</div>

<script>
    // ===== 狀態管理 =====
    const unit           = {{ $unit }};
    const totalQuestions = {{ count($questions) }};
    let answeredCount = 0;
    let correctCount  = 0;          // 僅供作答當下的即時特效使用，不是最終成績
    const answered    = {};
    const userAnswers = {};         // qid -> 使用者的作答內容，送給後端重新計分
    let quizResultId  = null;       // 存分數後從後端拿回來
    let finalScore    = 0;          // 後端算出來的正式分數
    let finalCorrect  = 0;          // 後端算出來的正式答對題數

    // ===== 更新進度條 =====
    function updateProgress() {
        const pct = (answeredCount / totalQuestions) * 100;
        document.getElementById('progress-bar').style.width = pct + '%';
        if (answeredCount === totalQuestions) {
            setTimeout(saveResultThenShowScale, 600);
        }
    }

    // ===== 答完題：把作答內容送後端重新計分，拿到 result_id 後再顯示量表 =====
    // 分數一律由後端根據 quiz_page 的正確答案重新計算，前端算的分數只當作答題當下的即時特效
    async function saveResultThenShowScale() {
        try {
            const res = await fetch(`/quiz/${unit}/result`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ answers: userAnswers }),
            });

            if (!res.ok) {
                const err = await res.json().catch(() => ({}));
                alert(err.error || '分數儲存失敗，請重新整理頁面再試一次');
                window.location.href = '/quiz';
                return;
            }

            const data = await res.json();
            quizResultId = data.result_id ?? null;
            finalScore   = data.score ?? 0;
            finalCorrect = data.correct ?? correctCount;
        } catch (e) {
            console.error('分數儲存失敗', e);
            alert('網路異常，分數儲存失敗，請重新整理頁面再試一次');
            return;
        }

        // result_id 拿到後才顯示量表
        const effortCard = document.getElementById('effort-card');
        effortCard.classList.add('show');
        effortCard.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    // ===== 心智努力量表：選擇分數 =====
    let selectedEffort = null;
    document.querySelectorAll('.effort-radio-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            document.querySelectorAll('.effort-radio-btn').forEach(b => b.classList.remove('selected'));
            this.classList.add('selected');
            selectedEffort = this.dataset.value;
            document.getElementById('effort-submit-btn').disabled = false;
        });
    });

    // ===== 心智努力量表：送出 =====
    async function submitEffort() {
        if (!selectedEffort) return;

        document.querySelectorAll('.effort-radio-btn').forEach(b => b.disabled = true);
        document.getElementById('effort-submit-btn').disabled = true;

        try {
            await fetch(`/quiz/${unit}/effort`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    effort_score: selectedEffort,
                    result_id: quizResultId,  // 這時一定有值了
                }),
            });
        } catch (e) {
            console.error('認知負荷儲存失敗', e);
        }

        showResult();  // effort 存完才顯示結果
    }

    // ===== 是非 / 選擇題：作答（即時特效用，正式計分在後端） =====
    function submitAnswer(qid, selected, correct, clickedBtn) {
        if (answered[qid]) return;
        answered[qid] = true;
        answeredCount++;
        userAnswers[qid] = selected;

        const isCorrect = selected.trim() === correct.trim() ||
                  selected.trim().charAt(0) === correct.trim().charAt(0);

        const btns = document.querySelectorAll(`#options-${qid} .option-btn`);
        btns.forEach(btn => {
            btn.disabled = true;
            const val = btn.getAttribute('data-value').trim();
            if (val.trim() === correct.trim() || val.trim().charAt(0) === correct.trim().charAt(0)) {
                btn.classList.add('correct-ans');
            }
        });

        if (!isCorrect) {
            clickedBtn.classList.remove('selected');
            clickedBtn.classList.add('wrong-ans');
        }

        const card = document.getElementById(`card-${qid}`);
        card.classList.add(isCorrect ? 'correct' : 'wrong');

        const fb = document.getElementById(`feedback-${qid}`);
        fb.classList.add('show', isCorrect ? 'correct' : 'wrong');
        fb.textContent = isCorrect ? '✅ 答對了！' : `❌ 答錯了！正確答案是：${correct}`;

        if (isCorrect) correctCount++;
        updateProgress();
    }

    // ===== 拖曳排序題 =====
    let dragSrcEl = null;
    document.querySelectorAll('.sort-item').forEach(item => {
        item.addEventListener('dragstart', function(e) {
            dragSrcEl = this;
            this.classList.add('dragging');
            e.dataTransfer.effectAllowed = 'move';
        });
        item.addEventListener('dragend', function() {
            this.classList.remove('dragging');
            document.querySelectorAll('.sort-item').forEach(i => i.classList.remove('drag-over'));
        });
        item.addEventListener('dragover', function(e) {
            e.preventDefault();
            e.dataTransfer.dropEffect = 'move';
            if (this !== dragSrcEl) {
                document.querySelectorAll('.sort-item').forEach(i => i.classList.remove('drag-over'));
                this.classList.add('drag-over');
            }
        });
        item.addEventListener('drop', function(e) {
            e.preventDefault();
            if (this !== dragSrcEl) {
                const container = this.parentNode;
                const items = [...container.querySelectorAll('.sort-item')];
                const srcIdx  = items.indexOf(dragSrcEl);
                const destIdx = items.indexOf(this);
                if (srcIdx < destIdx) {
                    container.insertBefore(dragSrcEl, this.nextSibling);
                } else {
                    container.insertBefore(dragSrcEl, this);
                }
            }
            document.querySelectorAll('.sort-item').forEach(i => i.classList.remove('drag-over'));
        });
    });

    // ===== 排序題：確認答案（即時特效用，正式計分在後端） =====
    function submitSort(qid, correct) {
        if (answered[qid]) return;
        answered[qid] = true;
        answeredCount++;

        const container  = document.getElementById(`sort-${qid}`);
        const items      = container.querySelectorAll('.sort-item');
        const userAnswer = [...items].map(i => i.getAttribute('data-letter')).join(';');
        userAnswers[qid] = userAnswer;
        const isCorrect  = userAnswer === correct.trim();

        items.forEach(item => {
            item.setAttribute('draggable', 'false');
            item.style.cursor = 'default';
            item.classList.add(isCorrect ? 'correct-item' : 'wrong-item');
        });

        document.getElementById(`confirm-${qid}`).disabled = true;
        document.getElementById(`card-${qid}`).classList.add(isCorrect ? 'correct' : 'wrong');

        const fb = document.getElementById(`feedback-${qid}`);
        fb.classList.add('show', isCorrect ? 'correct' : 'wrong');
        const correctLabels = correct.split(';').join(' → ');
        fb.textContent = isCorrect
            ? '✅ 排列正確！'
            : `❌ 排列錯誤！正確順序是：${correctLabels}`;

        if (isCorrect) correctCount++;
        updateProgress();
    }

    // ===== 顯示分數（使用後端回傳的正式成績，不是前端算的） =====
    function showResult() {
        const pct = Math.round((finalCorrect / totalQuestions) * 100);
        const resultCard = document.getElementById('result-card');
        resultCard.classList.add('show');
        resultCard.scrollIntoView({ behavior: 'smooth', block: 'center' });

        document.getElementById('result-score').innerHTML =
            `${finalCorrect} <span>/ ${totalQuestions}</span>`;

        let msg, sub;
        if (pct === 100) {
            msg = '🎉 完美！全部答對！';
            sub = '你對這個章節的內容掌握得非常好！';
        } else if (pct >= 60) {
            msg = '👍 不錯！繼續加油！';
            sub = '還有幾題可以再複習一下。';
        } else {
            msg = '📖 再多複習一下吧！';
            sub = '建議回到課程頁面再看一遍重點。';
        }
        document.getElementById('result-msg').textContent = msg;
        document.getElementById('result-sub').textContent = sub;
    }

    // ===== 回章節列表 =====
    // 每章只能測驗一次，所以這裡改成導回章節列表，而不是重新整理讓使用者再作答一次
    function retryQuiz() {
        window.location.href = '/quiz';
    }

    // ===== 事件委派 =====
    document.querySelectorAll('.options-group').forEach(group => {
        group.addEventListener('click', function(e) {
            const btn = e.target.closest('.option-btn');
            if (!btn || btn.disabled) return;
            const qid     = btn.dataset.qid;
            const val     = btn.dataset.value;
            const correct = btn.dataset.correct;
            submitAnswer(qid, val, correct, btn);
        });
    });
</script>
@endsection
