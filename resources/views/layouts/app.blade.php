<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>教學網站</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Noto+Sans+TC:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        /* 關鍵：讓 html 和 body 都不捲動，捲動交給 .main-content */
        html, body {
            height: 100%;
            overflow: hidden;
        }

        :root {
            --primary: #4f86c6;
            --primary-light: #dbeafe;
            --primary-dark: #2d6aa8;
            --accent: #f59e0b;
            --accent-light: #fef3c7;
            --bg-page: #f0f4f8;
            --bg-white: #ffffff;
            --bg-sidebar: #ffffff;
            --sidebar-hover: #eef4fc;
            --sidebar-active: #dbeafe;
            --sidebar-active-border: #4f86c6;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --text-white: #ffffff;
            --border: #e2e8f0;
            --navbar-bg: #ffffff;
            --navbar-height: 64px;
            --sidebar-width: 260px;
            --radius: 10px;
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.08);
            --shadow-md: 0 4px 12px rgba(0,0,0,0.08);
        }

        body {
            font-family: 'Noto Sans TC', sans-serif;
            background-color: var(--bg-page);
            color: var(--text-main);
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        /* ===== NAVBAR ===== */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 100;
            height: var(--navbar-height);
            background: var(--navbar-bg);
            border-bottom: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 24px;
            gap: 16px;
        }

        .navbar-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 8px;
            font-family: 'Nunito', sans-serif;
            font-weight: 800;
            font-size: 20px;
            color: var(--primary);
            text-decoration: none;
            letter-spacing: -0.3px;
        }

        .logo-icon {
            width: 34px;
            height: 34px;
            background: linear-gradient(135deg, var(--primary) 0%, #7cb9f4 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .nav-links a {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-muted);
            text-decoration: none;
            padding: 6px 14px;
            border-radius: 8px;
            transition: background 0.18s, color 0.18s;
            white-space: nowrap;
        }

        .nav-links a:hover {
            background: var(--primary-light);
            color: var(--primary-dark);
        }

        .nav-links a.active {
            background: var(--primary-light);
            color: var(--primary);
        }

        /* 下拉選單容器 */
        .dropdown {
            position: relative;
            display: flex;
            align-items: center;
        }

        .dropdown-toggle {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-muted);
            text-decoration: none;
            padding: 6px 14px;
            border-radius: 8px;
            transition: background 0.18s, color 0.18s;
            white-space: nowrap;
        }

        .dropdown-toggle:hover {
            background: var(--primary-light);
            color: var(--primary-dark);
        }

        /* 預設隱藏選單 */
        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #fff;   /* 配合你的 nav 背景色調整 */
            min-width: 120px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 6px;
            z-index: 999;
            padding: 4px 0;
        }

        /* hover 時顯示 */
        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-menu a {
            display: block;
            padding: 8px 16px;
            white-space: nowrap;
        }

        .dropdown-menu a:hover {
            background-color: #f5f5f5;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-greeting {
            font-size: 14px;
            font-weight: 600;
            color: #334155;
            white-space: nowrap;
        }

        .logout-btn {
            font-family: 'Noto Sans TC', sans-serif;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            padding: 7px 16px;
            background: transparent;
            color: #64748b;
            border: 1.5px solid #e2e8f0;
            border-radius: 8px;
            transition: background 0.15s, color 0.15s, border-color 0.15s;
            white-space: nowrap;
        }
        .logout-btn:hover {
            background: #fee2e2;
            color: #b91c1c;
            border-color: #fca5a5;
        }

        .login-btn {
            font-family: 'Noto Sans TC', sans-serif;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            padding: 8px 20px;
            background: var(--primary);
            color: var(--text-white);
            border: none;
            border-radius: 8px;
            transition: background 0.18s, transform 0.12s;
            white-space: nowrap;
            text-decoration: none;
        }

        .login-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .hamburger-btn {
            display: none;
            background: none;
            border: 1px solid var(--border);
            color: var(--text-muted);
            font-size: 22px;
            cursor: pointer;
            padding: 6px 10px;
            border-radius: 8px;
            line-height: 1;
            transition: background 0.15s;
        }

        .hamburger-btn:hover {
            background: var(--bg-page);
        }

        /* ===== LAYOUT ===== */
        .layout {
            display: flex;
            flex: 1;
            overflow: hidden;
            height: calc(100vh - var(--navbar-height));
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--bg-sidebar);
            border-right: 1px solid var(--border);
            overflow-y: auto;
            flex-shrink: 0;
            padding: 16px 0;
        }

        .sidebar-section-title {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--text-muted);
            padding: 8px 20px 4px;
        }

        .nav-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .nav-item {
            margin: 2px 10px;
        }

        .nav-header {
            border-radius: 8px;
            overflow: hidden;
        }

        .nav-header a {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--text-main);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            padding: 9px 12px;
            border-radius: 8px;
            border-left: 3px solid transparent;
            transition: background 0.15s, color 0.15s, border-color 0.15s;
        }

        .nav-header a:hover {
            background: var(--sidebar-hover);
            color: var(--primary);
        }

        .nav-header a.active {
            background: var(--sidebar-active);
            color: var(--primary-dark);
            border-left-color: var(--sidebar-active-border);
            font-weight: 700;
        }

        .nav-chapter-num {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 22px;
            height: 22px;
            background: var(--bg-page);
            border-radius: 6px;
            font-size: 11px;
            font-weight: 700;
            color: var(--text-muted);
            flex-shrink: 0;
            transition: background 0.15s, color 0.15s;
        }

        .nav-header a:hover .nav-chapter-num,
        .nav-header a.active .nav-chapter-num {
            background: var(--primary);
            color: #fff;
        }

        /* ===== MAIN CONTENT ===== */
        .main-content {
            flex: 1;
            overflow-y: auto;
            background: var(--bg-page);
        }

        /* RWD 區塊外面，全域預設 */
        .mobile-nav {
            display: none;
        }

        /* ===== RWD ===== */
        @media screen and (max-width: 768px) {
            html, body { overflow: visible; height: auto; }
            .nav-links { display: none; }
            .hamburger-btn { display: flex; align-items: center; justify-content: center; }

            .layout {
                flex-direction: column;
                height: auto;
                overflow: visible;
            }

            /* mobile-nav 預設隱藏，點漢堡後顯示 */
            .mobile-nav {
                display: none;
                background: var(--bg-white);
                border-bottom: 1px solid var(--border);
                padding: 4px 16px 8px;
            }

            /* ← 這條是關鍵，直接對 .mobile-nav.show-menu 作用 */
            .mobile-nav.show-menu {
                display: block;
            }

            .mobile-nav a {
                display: block;
                padding: 10px 0;
                font-size: 14px;
                font-weight: 600;
                color: var(--text-muted);
                text-decoration: none;
                border-bottom: 1px solid var(--border);
            }

            .mobile-nav a:last-child {
                border-bottom: none;
            }

            .sidebar {
                display: none;
                width: 100%;
                border-right: none;
                border-bottom: 1px solid var(--border);
                padding: 8px 0;
            }

            .sidebar.show-menu { display: block; }

            .main-content {
                overflow-y: visible;
            }
        }
    </style>
    @yield('style')
</head>
<body>

    <header class="navbar">
        <div class="navbar-left">
            <button class="hamburger-btn" id="hamburger-btn" aria-label="開啟選單">☰</button>
            <a href="/" class="logo">
                PyMusic
            </a>
        </div>

        <nav class="nav-links">
            <a href="/">首頁</a>
            <a href="/lesson0">單元學習</a>
            <a href="/practice">程式實作</a>
            <a href="/quiz">互動測驗</a>

            <div class="dropdown">
                <a href="#" class="dropdown-toggle">問卷填寫 ▾</a>
                <div class="dropdown-menu">
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSe_MYSv8lCKNYeYuSAoZvLcTWGhs24YUNja7B6ZDwa0vGYAqg/viewform?usp=header" target="_blank" rel="noreferrer noopener">前測問卷</a>
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLScLvYXYh6KnviLmKy5f0TrxMtlZnRnVl-ggNBzrCkcMMEZU1g/viewform?usp=publish-editor" target="_blank" rel="noreferrer noopener">後測問卷</a>
                </div>
            </div>
        </nav>

        <div class="navbar-right">
            @if(session('user_id'))
                {{-- 已登入：顯示姓名 + 登出 --}}
                <span class="user-greeting">👤 {{ session('user_name') }}</span>
                <form method="POST" action="/logout" style="display:inline;">
                    @csrf
                    <button type="submit" class="logout-btn">登出</button>
                </form>
            @else
                {{-- 未登入：顯示登入按鈕 --}}
                <a href="/login" class="login-btn">登入</a>
            @endif
        </div>
    </header>

    <div class="mobile-nav">
        <a href="/">首頁</a>
        <a href="/lesson0">單元學習</a>
        <a href="/practice">程式實作</a>
        <a href="/quiz">互動測驗</a>

        <div class="dropdown">
            <a href="#" class="dropdown-toggle">問卷填寫 ▾</a>
            <div class="dropdown-menu">
                <a href="https://docs.google.com/forms/d/e/1FAIpQLSe_MYSv8lCKNYeYuSAoZvLcTWGhs24YUNja7B6ZDwa0vGYAqg/viewform?usp=header" target="_blank" rel="noreferrer noopener">前測問卷</a>
                <a href="https://docs.google.com/forms/d/e/1FAIpQLScLvYXYh6KnviLmKy5f0TrxMtlZnRnVl-ggNBzrCkcMMEZU1g/viewform?usp=publish-editor" target="_blank" rel="noreferrer noopener">後測問卷</a>
            </div>
        </div>
    </div>

    <div class="layout">
        <nav class="sidebar" id="sidebar">
            <p class="sidebar-section-title">課程目錄</p>
            <ul class="nav-menu">
                <li class="nav-item">
                    <div class="nav-header">
                        <a href="lesson0">
                            <span class="nav-chapter-num">0</span>
                            Pygame 套件介紹
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="nav-header">
                        <a href="lesson1">
                            <span class="nav-chapter-num">1</span>
                            數值、字串與串列
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="nav-header">
                        <a href="lesson2">
                            <span class="nav-chapter-num">2</span>
                            選擇性敘述與迴圈
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="nav-header">
                        <a href="lesson3">
                            <span class="nav-chapter-num">3</span>
                            函數
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="nav-header">
                        <a href="lesson4">
                            <span class="nav-chapter-num">4</span>
                            物件導向程式設計
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="nav-header">
                        <a href="lesson5">
                            <span class="nav-chapter-num">5</span>
                            變數與資料型態
                        </a>
                    </div>
                </li>
            </ul>
        </nav>

        <main class="main-content">
            @yield('content')
        </main>
    </div>

    {{-- ===== 回頂部按鈕 ===== --}}
    <button id="back-to-top" title="回到頂部" aria-label="回到頂部">↑</button>

    <style>
        #back-to-top {
            display: none;
            position: fixed;
            bottom: 28px;
            right: 28px;
            z-index: 999;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            border: none;
            cursor: pointer;
            background: var(--primary);
            color: #fff;
            font-size: 20px;
            font-weight: 700;
            line-height: 1;
            box-shadow: 0 2px 10px rgba(79,134,198,0.35);
            transition: background 0.15s, opacity 0.2s, transform 0.15s;
        }
        #back-to-top:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // ===== 漢堡選單 =====
            document.getElementById('hamburger-btn').addEventListener('click', function () {
                document.getElementById('sidebar').classList.toggle('show-menu');
                document.querySelector('.mobile-nav').classList.toggle('show-menu');
            });

            // ===== 自動標記 active 連結 =====
            const currentPath = window.location.pathname.replace(/^\//, '') || '/';
            document.querySelectorAll('.nav-header a, .nav-links a').forEach(link => {
                const href = link.getAttribute('href');
                if (href === currentPath || (currentPath === '' && href === '/')) {
                    link.classList.add('active');
                }
            });

            // ===== 回頂部按鈕 =====
            const topBtn = document.getElementById('back-to-top');

            // 你的 layout 是 .main-content 在捲動，不是 window
            // 手機版 RWD 時改為 window 捲動，所以兩個都監聽
            function handleScroll(el) {
                const scrollTop = el === window ? window.scrollY : el.scrollTop;
                topBtn.style.display = scrollTop > 300 ? 'block' : 'none';
            }

            const mainContent = document.querySelector('.main-content');
            if (mainContent) {
                mainContent.addEventListener('scroll', () => handleScroll(mainContent));
            }
            window.addEventListener('scroll', () => handleScroll(window));

            // 點擊後捲回頂部（同時處理兩種情境）
            topBtn.addEventListener('click', function () {
                if (mainContent && mainContent.scrollTop > 0) {
                    mainContent.scrollTo({ top: 0, behavior: 'smooth' });
                } else {
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                }
            });
        });
    </script>

</body>
</html>
