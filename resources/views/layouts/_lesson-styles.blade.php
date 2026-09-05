{{--
    共用課程頁樣式 (重新設計版)
    使用方式：在各 lesson 頁的 @section('style') 中 @include('layouts._lesson-styles')

    各章節色系 (在 lesson-wrap 加 data-chapter="N")：
      0 → 紫  (purple)
      1 → 藍綠 (blue→teal)
      2 → 橘  (amber)
      3 → 珊瑚 (coral)
      4 → 綠  (green)
      5 → 粉  (pink)
--}}
<style>
/* =====================================================
   Reset & Base
   ===================================================== */
.lesson-wrap *,
.lesson-wrap *::before,
.lesson-wrap *::after {
    box-sizing: border-box;
}

/* =====================================================
   頁面容器
   ===================================================== */
.lesson-wrap {
    max-width: 900px;
    margin: 0 auto;
    padding: 28px 36px 64px;
    font-family: 'Noto Sans TC', 'Nunito', system-ui, sans-serif;
}

/* =====================================================
   標題列（含音檔播放器）
   ===================================================== */
.lesson-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #fff;
    border-radius: 12px;
    border: 1px solid #e2e8f0;
    padding: 20px 28px;
    margin-bottom: 12px;
    gap: 20px;
}

.lesson-header h1 {
    font-size: 20px;
    font-weight: 700;
    color: #1e293b;
    margin: 0;
    line-height: 1.35;
}

.audio-wrap {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-shrink: 0;
}

.audio-wrap span {
    font-size: 12px;
    font-weight: 600;
    color: #94a3b8;
    white-space: nowrap;
}

.audio-wrap audio {
    height: 34px;
    width: 230px;
}

/* =====================================================
   章節色條（每章不同色，靠 data-chapter 控制）
   ===================================================== */
.chap-accent-bar {
    height: 4px;
    border-radius: 4px;
    margin-bottom: 18px;
}

/* 第 0 章 — 紫 */
.lesson-wrap[data-chapter="0"] .chap-accent-bar {
    background: linear-gradient(90deg, #7c3aed, #a78bfa);
}
.lesson-wrap[data-chapter="0"] .lesson-goals {
    background: linear-gradient(135deg, #7c3aed 0%, #9d72f5 100%);
}
.lesson-wrap[data-chapter="0"] .lesson-content h2 {
    border-color: #ede9fe;
}
.lesson-wrap[data-chapter="0"] .lesson-content h4 {
    color: #7c3aed;
}
.lesson-wrap[data-chapter="0"] .code-block {
    border-left-color: #7c3aed;
}

/* 第 1 章 — 藍→青 */
.lesson-wrap[data-chapter="1"] .chap-accent-bar {
    background: linear-gradient(90deg, #2563eb, #0d9488);
}
.lesson-wrap[data-chapter="1"] .lesson-goals {
    background: linear-gradient(135deg, #2563eb 0%, #0d9488 100%);
}
.lesson-wrap[data-chapter="1"] .lesson-content h2 {
    border-color: #dbeafe;
}
.lesson-wrap[data-chapter="1"] .lesson-content h4 {
    color: #2563eb;
}
.lesson-wrap[data-chapter="1"] .code-block {
    border-left-color: #2563eb;
}

/* 第 2 章 — 琥珀橘 */
.lesson-wrap[data-chapter="2"] .chap-accent-bar {
    background: linear-gradient(90deg, #d97706, #f59e0b);
}
.lesson-wrap[data-chapter="2"] .lesson-goals {
    background: linear-gradient(135deg, #b45309 0%, #d97706 100%);
}
.lesson-wrap[data-chapter="2"] .lesson-content h2 {
    border-color: #fef3c7;
}
.lesson-wrap[data-chapter="2"] .lesson-content h4 {
    color: #b45309;
}
.lesson-wrap[data-chapter="2"] .code-block {
    border-left-color: #d97706;
}

/* 第 3 章 — 珊瑚 */
.lesson-wrap[data-chapter="3"] .chap-accent-bar {
    background: linear-gradient(90deg, #e11d48, #f43f5e);
}
.lesson-wrap[data-chapter="3"] .lesson-goals {
    background: linear-gradient(135deg, #be123c 0%, #e11d48 100%);
}
.lesson-wrap[data-chapter="3"] .lesson-content h2 {
    border-color: #ffe4e6;
}
.lesson-wrap[data-chapter="3"] .lesson-content h4 {
    color: #be123c;
}
.lesson-wrap[data-chapter="3"] .code-block {
    border-left-color: #e11d48;
}

/* 第 4 章 — 綠 */
.lesson-wrap[data-chapter="4"] .chap-accent-bar {
    background: linear-gradient(90deg, #16a34a, #4ade80);
}
.lesson-wrap[data-chapter="4"] .lesson-goals {
    background: linear-gradient(135deg, #15803d 0%, #16a34a 100%);
}
.lesson-wrap[data-chapter="4"] .lesson-content h2 {
    border-color: #dcfce7;
}
.lesson-wrap[data-chapter="4"] .lesson-content h4 {
    color: #15803d;
}
.lesson-wrap[data-chapter="4"] .code-block {
    border-left-color: #16a34a;
}

/* 第 5 章 — 粉 */
.lesson-wrap[data-chapter="5"] .chap-accent-bar {
    background: linear-gradient(90deg, #db2777, #f472b6);
}
.lesson-wrap[data-chapter="5"] .lesson-goals {
    background: linear-gradient(135deg, #be185d 0%, #db2777 100%);
}
.lesson-wrap[data-chapter="5"] .lesson-content h2 {
    border-color: #fce7f3;
}
.lesson-wrap[data-chapter="5"] .lesson-content h4 {
    color: #be185d;
}
.lesson-wrap[data-chapter="5"] .code-block {
    border-left-color: #db2777;
}

/* =====================================================
   學習目標區塊
   ===================================================== */
.lesson-goals {
    border-radius: 12px;
    padding: 18px 24px;
    margin-bottom: 18px;
    color: #fff;
    /* 顏色由 data-chapter 覆蓋 */
    background: linear-gradient(135deg, #4f86c6 0%, #6fa3d8 100%);
}

.lesson-goals h3 {
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.07em;
    opacity: 0.75;
    margin: 0 0 12px;
    padding: 0;
}

.goal-links {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.goal-links a {
    display: inline-block;
    background: rgba(255, 255, 255, 0.18);
    color: #fff;
    text-decoration: none;
    font-size: 13px;
    font-weight: 600;
    padding: 5px 16px;
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    transition: background 0.15s;
}

.goal-links a:hover {
    background: rgba(255, 255, 255, 0.32);
}

/* =====================================================
   主要內容區
   ===================================================== */
.lesson-content {
    background: #fff;
    border-radius: 12px;
    border: 1px solid #e2e8f0;
    padding: 32px 38px;
}

/* =====================================================
   內文標題階層
   ===================================================== */
.lesson-content h2 {
    font-size: 18px;
    font-weight: 700;
    color: #1e293b;
    margin: 48px 0 6px;
    padding-bottom: 10px;
    border-bottom: 2px solid #e2e8f0; /* 由 data-chapter 覆蓋顏色 */
}

.lesson-content h2:first-child {
    margin-top: 0;
}

.lesson-content h3 {
    font-size: 15.5px;
    font-weight: 700;
    color: #334155;
    margin: 26px 0 6px;
    padding: 0;
}

.lesson-content h4 {
    font-size: 14px;
    font-weight: 700;
    color: #4f86c6; /* 由 data-chapter 覆蓋 */
    margin: 20px 0 5px;
    padding: 0;
}

.lesson-content h5 {
    display: none; /* h5 全部由 .music-card 取代，隱藏原始 h5 */
}

/* =====================================================
   段落
   ===================================================== */
.lesson-content p {
    font-size: 14.5px;
    line-height: 1.88;
    color: #475569;
    margin: 7px 0;
    padding: 0;
}

/* =====================================================
   分隔線
   ===================================================== */
.lesson-content hr {
    border: none;
    border-top: 1px solid #e2e8f0;
    margin: 28px 0;
}

/* =====================================================
   表格
   ===================================================== */
.lesson-content table {
    border-collapse: collapse;
    margin: 12px 0 18px;
    font-size: 13.5px;
    width: auto;
}

.lesson-content table th {
    background: #f8fafc;
    color: #334155;
    font-weight: 700;
    padding: 9px 18px;
    border: 1px solid #e2e8f0;
    text-align: left;
}

.lesson-content table td {
    padding: 8px 18px;
    border: 1px solid #e2e8f0;
    color: #475569;
}

.lesson-content table tr:nth-child(even) td {
    background: #f8fafc;
}

/* =====================================================
   程式碼區塊（.code-block 包住 pre）
   ===================================================== */
.code-block {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-left: 4px solid #4f86c6; /* 由 data-chapter 覆蓋顏色 */
    border-radius: 0 8px 8px 0;
    margin: 12px 0 16px;
    overflow: hidden;
}

.code-block-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 7px 14px;
    background: #f1f5f9;
    border-bottom: 1px solid #e2e8f0;
}

.code-block-dots {
    display: flex;
    gap: 5px;
}

.code-block-dot {
    width: 9px;
    height: 9px;
    border-radius: 50%;
}
.code-block-dot.red   { background: #f87171; }
.code-block-dot.yellow{ background: #fbbf24; }
.code-block-dot.green { background: #34d399; }

.code-block-lang {
    font-family: 'Consolas', 'Monaco', monospace;
    font-size: 11px;
    font-weight: 600;
    color: #94a3b8;
    letter-spacing: 0.04em;
}

.code-block pre {
    /* 覆蓋 lesson-content pre 的舊樣式 */
    background: transparent !important;
    border: none !important;
    border-radius: 0 !important;
    padding: 16px 20px !important;
    margin: 0 !important;
    overflow-x: auto;
    font-family: 'Consolas', 'Monaco', 'Courier New', monospace;
    font-size: 13.5px;
    line-height: 1.7;
    color: #334155;
}

/* 語法高亮 class（手動加在 blade 內） */
.hl-kw  { color: #2563eb; font-weight: 600; } /* keyword / builtin fn */
.hl-st  { color: #7c3aed; }                   /* string */
.hl-nm  { color: #0f766e; }                   /* variable / name */
.hl-cm  { color: #94a3b8; font-style: italic; }/* comment */
.hl-nu  { color: #d97706; }                   /* number */

/* =====================================================
   執行結果區塊（.output-block）
   ===================================================== */
.output-wrap {
    margin: 4px 0 16px;
}

.output-label {
    font-size: 11px;
    font-weight: 700;
    color: #94a3b8;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    margin-bottom: 5px;
}

.output-block {
    background: #1e293b;
    border-radius: 6px;
    padding: 14px 18px;
    font-family: 'Consolas', 'Monaco', 'Courier New', monospace;
    font-size: 13px;
    line-height: 1.7;
    color: #e2e8f0;
    white-space: pre-wrap;
}

/* =====================================================
   🎵 音樂情境 callout（.music-card）
   取代原本的 h5 + p 區塊
   ===================================================== */
.music-card {
    display: flex;
    gap: 14px;
    align-items: flex-start;
    background: #f0fdf4;
    border: 1px solid #bbf7d0;
    border-left: 4px solid #16a34a;
    border-radius: 0 8px 8px 0;
    padding: 14px 18px;
    margin: 14px 0;
}

.music-card-icon {
    font-size: 18px;
    color: #16a34a;
    flex-shrink: 0;
    margin-top: 2px;
}

.music-card-body {
    flex: 1;
    min-width: 0;
}

.music-card-title {
    font-size: 13px;
    font-weight: 700;
    color: #15803d;
    margin: 0 0 6px;
}

.music-card-body p {
    font-size: 14px;
    line-height: 1.8;
    color: #166534;
    margin: 4px 0;
}

.music-card-body pre {
    background: rgba(22, 163, 74, 0.08) !important;
    border: 1px solid #bbf7d0 !important;
    border-left: none !important;
    border-radius: 6px !important;
    padding: 10px 14px !important;
    margin: 8px 0 4px !important;
    font-family: 'Consolas', 'Monaco', monospace;
    font-size: 13px;
    line-height: 1.65;
    color: #14532d;
}

/* =====================================================
   提示區塊（.hint-block）
   ===================================================== */
.hint-block {
    background: #fffbeb;
    border: 1px solid #fde68a;
    border-left: 4px solid #f59e0b;
    border-radius: 0 8px 8px 0;
    padding: 12px 18px;
    margin: 10px 0;
}

.hint-label {
    font-size: 11px;
    font-weight: 700;
    color: #92400e;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    margin-bottom: 6px;
}

.hint-block p {
    font-size: 13.5px;
    color: #78350f !important;
    margin: 3px 0 !important;
    line-height: 1.75;
}

/* =====================================================
   程式邏輯說明區塊（.logic-block）
   ===================================================== */
.logic-block {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-left: 4px solid #64748b;
    border-radius: 0 8px 8px 0;
    padding: 12px 18px;
    margin: 8px 0 16px;
}

.logic-label {
    font-size: 11px;
    font-weight: 700;
    color: #475569;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    margin-bottom: 6px;
}

.logic-block p {
    font-size: 13.5px;
    color: #475569 !important;
    margin: 3px 0 !important;
    line-height: 1.8;
}

/* =====================================================
   範例程式包裝（.example-wrap）
   ===================================================== */
.example-wrap {
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    margin: 24px 0;
    overflow: hidden;
}

.example-head {
    background: #f8fafc;
    padding: 11px 20px;
    border-bottom: 1px solid #e2e8f0;
    font-size: 13.5px;
    font-weight: 700;
    color: #334155;
}

.example-body {
    padding: 20px 22px;
}

.example-body > p {
    font-size: 14px;
    color: #475569;
    line-height: 1.85;
    margin: 5px 0;
}

.example-body ol {
    padding-left: 22px;
    margin: 8px 0 14px;
    color: #475569;
    font-size: 14px;
    line-height: 1.9;
}

/* =====================================================
   圖片
   ===================================================== */
.lesson-content img {
    display: block;
    margin: 16px auto;
    max-width: 100%;
    border-radius: 8px;
    border: 1px solid #e2e8f0;
}

/* =====================================================
   有序清單（內文中）
   ===================================================== */
.lesson-content > ol,
.lesson-content ol {
    padding-left: 22px;
    margin: 10px 0;
    color: #475569;
    font-size: 14.5px;
    line-height: 1.9;
}

/* =====================================================
   按鈕
   ===================================================== */
.start-btn {
    display: inline-block;
    margin-top: 8px;
    cursor: pointer;
    padding: 10px 24px;
    background: #4f86c6;
    color: #fff;
    border: none;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    font-family: 'Noto Sans TC', sans-serif;
    transition: background 0.15s, transform 0.12s;
}

.start-btn:hover {
    background: #2d6aa8;
    transform: translateY(-1px);
}

/* =====================================================
   RWD
   ===================================================== */
@media screen and (max-width: 768px) {
    .lesson-wrap {
        padding: 16px 16px 48px;
    }

    .lesson-header {
        flex-direction: column;
        align-items: flex-start;
        padding: 18px 20px;
    }

    .audio-wrap audio {
        width: 100%;
    }

    .lesson-goals {
        padding: 16px 20px;
    }

    .lesson-content {
        padding: 22px 18px;
    }

    .lesson-content table {
        width: 100%;
    }

    .example-body {
        padding: 16px 16px;
    }
}
</style>
