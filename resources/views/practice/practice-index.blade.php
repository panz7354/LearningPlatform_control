@extends('layouts.app')

@section('style')
<style>
    .practice-index-wrap {
        max-width: 860px;
        margin: 0 auto;
        padding: 32px 40px 60px;
    }

    /* ===== 頁首 ===== */
    .practice-index-hero {
        background: linear-gradient(135deg, #7c3aed 0%, #a78bfa 100%);
        border-radius: 16px;
        padding: 36px 40px;
        margin-bottom: 28px;
        color: #fff;
        position: relative;
        overflow: hidden;
    }
    .practice-index-hero::before {
        content: '✏️';
        position: absolute;
        right: 36px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 90px;
        opacity: 0.12;
        pointer-events: none;
    }
    .practice-index-hero h1 {
        font-family: 'Nunito', sans-serif;
        font-size: 26px;
        font-weight: 800;
        margin-bottom: 8px;
    }
    .practice-index-hero p {
        font-size: 14px;
        opacity: 0.9;
        margin: 0;
        line-height: 1.6;
    }

    /* ===== 錯誤提示 ===== */
    .flash-error {
        background: #fef2f2;
        border: 1px solid #fecaca;
        color: #b91c1c;
        border-radius: 10px;
        padding: 12px 18px;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    /* ===== 章節標題 ===== */
    .section-title {
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: #64748b;
        margin-bottom: 16px;
    }

    /* ===== 章節卡片 Grid ===== */
    .chapter-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: 16px;
    }

    .chapter-card {
        background: #fff;
        border: 1.5px solid #e2e8f0;
        border-radius: 14px;
        padding: 24px 22px;
        text-decoration: none;
        color: inherit;
        display: flex;
        flex-direction: column;
        gap: 10px;
        transition: border-color 0.15s, transform 0.15s, box-shadow 0.15s;
        position: relative;
        overflow: hidden;
    }
    .chapter-card:hover {
        border-color: #7c3aed;
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(124,58,237,0.12);
    }
    .chapter-card.no-questions {
        opacity: 0.55;
        cursor: not-allowed;
        pointer-events: none;
    }
    .chapter-card.locked {
        opacity: 0.55;
        cursor: not-allowed;
        pointer-events: none;
    }

    .card-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .chapter-label {
        font-size: 11px;
        font-weight: 700;
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: 0.06em;
    }

    .status-badge {
        font-size: 11px;
        font-weight: 700;
        padding: 3px 10px;
        border-radius: 20px;
    }
    .badge-done    { background: #ede9fe; color: #6d28d9; }
    .badge-pending { background: #f1f5f9; color: #64748b; }
    .badge-empty   { background: #fef3c7; color: #92400e; }
    .badge-locked  { background: #f1f5f9; color: #94a3b8; }

    .card-title { font-size: 15px; font-weight: 700; color: #1e293b; line-height: 1.4; }

    .card-score { font-size: 13px; color: #64748b; }
    .card-score .score-val { font-weight: 700; color: #7c3aed; }
    .card-score.not-done   { color: #94a3b8; }

    .progress-bg {
        background: #e2e8f0;
        border-radius: 6px;
        height: 5px;
        overflow: hidden;
    }
    .progress-fill {
        height: 100%;
        border-radius: 6px;
        background: #7c3aed;
        transition: width 0.4s ease;
    }
    .progress-fill.full { background: #22c55e; }

    .card-arrow {
        position: absolute;
        bottom: 30px;
        right: 25px;
        font-size: 18px;
        color: #cbd5e1;
        transition: color 0.15s, transform 0.15s;
    }
    .chapter-card:hover .card-arrow {
        color: #7c3aed;
        transform: translateX(3px);
    }

    .hint-text {
        text-align: center;
        font-size: 13px;
        color: #94a3b8;
        margin-top: 20px;
    }

    /* ===== RWD ===== */
    @media screen and (max-width: 768px) {
        .practice-index-wrap { padding: 16px; }
        .practice-index-hero { padding: 24px 20px; }
        .chapter-grid { grid-template-columns: 1fr 1fr; gap: 12px; }
    }
    @media screen and (max-width: 480px) {
        .chapter-grid { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')
<div class="practice-index-wrap">

    {{-- ===== 錯誤提示（例如點了還沒解鎖的章節、或已作答過的章節） ===== --}}
    @if(session('error'))
    <div class="flash-error">⚠️ {{ session('error') }}</div>
    @endif

    {{-- ===== 頁首 ===== --}}
    <div class="practice-index-hero">
        <div>
            <h1>程式實作</h1>
            <p>選擇章節開始填空作答<br>將程式碼中的空格填入正確內容</p>
        </div>
    </div>

    {{-- ===== 章節卡片 ===== --}}
    <p class="section-title">選擇章節（需登入才能作答，每章只能作答一次，需完成前一章才能解鎖下一章）</p>

    <div class="chapter-grid">
        @foreach($chapters as $ch)
        @php
            $hasContent = $ch['has_content'];
            $locked     = $ch['locked'] ?? false;
            $hasDone    = $ch['score'] !== null;
            $score      = $ch['score'];
            $pct        = ($hasDone) ? $score : 0;
            $clickable  = $hasContent && !$locked;
        @endphp

        <a href="{{ $clickable ? '/practice/' . $ch['unit'] : '#' }}"
           class="chapter-card
                  {{ !$hasContent ? 'no-questions' : '' }}
                  {{ $hasContent && $locked ? 'locked' : '' }}">

            <div class="card-top">
                <span class="chapter-label">第 {{ $ch['unit'] }} 章</span>
                @if(!$hasContent)
                    <span class="status-badge badge-empty">準備中</span>
                @elseif($locked)
                    <span class="status-badge badge-locked">🔒 尚未解鎖</span>
                @elseif($hasDone)
                    <span class="status-badge badge-done">已完成</span>
                @else
                    <span class="status-badge badge-pending">未作答</span>
                @endif
            </div>

            <div class="card-title">{{ $ch['title'] }}</div>

            @if(!$hasContent)
                <div class="card-score not-done">尚無題目</div>
            @elseif($locked)
                <div class="card-score not-done">請先完成第 {{ $ch['unit'] - 1 }} 章</div>
            @elseif($hasDone)
                <div class="card-score">
                    得分：<span class="score-val">{{ $score }} 分</span>
                </div>
            @else
                <div class="card-score not-done">點擊開始作答</div>
            @endif

            <div class="progress-bg">
                <div class="progress-fill {{ $pct === 100 ? 'full' : '' }}"
                     style="width: {{ $pct }}%"></div>
            </div>

            @if($clickable)
                <span class="card-arrow">→</span>
            @endif

        </a>
        @endforeach
    </div>

    <p class="hint-text">💡 登入後可記錄每章得分，並查看歷史成績</p>

</div>
@endsection
