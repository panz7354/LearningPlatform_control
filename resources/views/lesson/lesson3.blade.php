@extends('layouts.app')

@section('style')
    @include('layouts._lesson-styles')
@endsection

@section('content')
<div class="lesson-wrap" data-chapter="3">

    {{-- ===== 標題列 ===== --}}
    <div class="lesson-header">
        <h1>第 3 章　函數</h1>
    </div>

    {{-- ===== 章節色條 ===== --}}
    <div class="chap-accent-bar"></div>

    {{-- ===== 學習目標 ===== --}}
    <div class="lesson-goals">
        <h3>學習目標</h3>
        <div class="goal-links">
            <a href="#section3-1">1. 函數與參數傳入</a>
            <a href="#section3-2">2. 函數的進階應用</a>
        </div>
    </div>

    {{-- ===== 主要內容 ===== --}}
    <div class="lesson-content">

        <h2 id="section3-1">1. 函數與參數傳入</h2>

        <h3>重點語法</h3>

        <h4>(一) 什麼是函數（Function）？</h4>
        <p>
            函數可以想成：👉「幫忙做事情的小機器」。<br><br>
            當我們有一段程式碼需要重複使用時，
            就可以把它放進函數裡面。
            這樣之後需要使用時，
            只要呼叫函數即可，不需要一直重複撰寫相同程式。
        </p>

        <h4>(二) 函數（Function）</h4>
        <p><strong>1. 建立函數：</strong>使用 def 建立函數。如下程式碼：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-kw">def</span> <span class="hl-nm">say_hello</span>():
    <span class="hl-kw">print</span>(<span class="hl-st">"Hello"</span>)</pre>
        </div>
        <div class="logic-block">
            <div class="logic-label">程式邏輯說明</div>
            <p><code>def</code> 代表建立函數。</p>
            <p><code>say_hello</code> 是函數名稱。</p>
        </div>

        <p><strong>2. 呼叫函數：</strong>函數建立後不會立刻執行，必須呼叫它才會運作。如下程式碼：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">say_hello</span>()</pre>
        </div>
        <div class="output-wrap">
            <div class="output-label">執行結果</div>
            <div class="output-block">Hello</div>
        </div>

        <h4>(三) 參數（Parameter）</h4>
        <p>
            有時候函數需要接收資料，<br>
            這些資料稱為：👉 參數（Parameter）<br>
            參數可以讓同一個函數完成不同工作。
        </p>
        <p><strong>範例</strong>，如下程式碼：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-kw">def</span> <span class="hl-nm">greet</span>(name):
    <span class="hl-kw">print</span>(<span class="hl-st">"你好，"</span> + name)</pre>
        </div>
        <div class="logic-block">
            <div class="logic-label">程式邏輯說明</div>
            <p><code>name</code> 就是參數。函數執行時，可以把不同名字傳進來：</p>
        </div>

        <p>1. 呼叫函數（如果我輸入小明）：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">greet</span>(<span class="hl-st">"小明"</span>)</pre>
        </div>
        <div class="output-wrap">
            <div class="output-label">執行結果</div>
            <div class="output-block">你好，小明</div>
        </div>

        <p>2. 呼叫函數（如果我輸入小華）：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">greet</span>(<span class="hl-st">"小華"</span>)</pre>
        </div>
        <div class="output-wrap">
            <div class="output-label">執行結果</div>
            <div class="output-block">你好，小華</div>
        </div>

        <h4>(四) 傳入參數（Argument）</h4>
        <p>
            呼叫函數時傳入的資料，<br>
            稱為：👉 引數（Argument）<br>
            函數也可以同時接收多個參數。
        </p>
        <p><strong>範例</strong>，如下程式碼：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-kw">def</span> <span class="hl-nm">add</span>(a, b):
    <span class="hl-kw">print</span>(a + b)

<span class="hl-nm">add</span>(<span class="hl-nu">3</span>, <span class="hl-nu">5</span>)</pre>
        </div>
        <div class="output-wrap">
            <div class="output-label">執行結果</div>
            <div class="output-block">8</div>
        </div>
        <div class="logic-block">
            <div class="logic-label">程式邏輯說明</div>
            <p><code>a</code> 接收第一個數字（3）。</p>
            <p><code>b</code> 接收第二個數字（5）。</p>
            <p>函數執行：3 + 5 = 8</p>
        </div>

        <h4>(五) 回傳值（return）</h4>
        <p>
            有時候函數計算完結果後，<br>
            希望把結果交回來使用，<br>
            就可以使用：<code>return</code>
        </p>
        <p><strong>範例</strong>，如下程式碼：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-kw">def</span> <span class="hl-nm">add</span>(a, b):
    <span class="hl-kw">return</span> a + b

<span class="hl-nm">result</span> = <span class="hl-nm">add</span>(<span class="hl-nu">3</span>, <span class="hl-nu">5</span>)</pre>
        </div>
        <div class="logic-block">
            <div class="logic-label">程式邏輯說明</div>
            <p>函數執行後，先計算 a + b = 8，得出 8。</p>
            <p>這個 8 透過 <code>return</code> 回傳，再被存入 <code>result</code> 變數。</p>
        </div>

        <hr>

        <h3>範例程式說明</h3>

        <div class="example-wrap">
            <div class="example-head">範例 (二)：使用函數處理商品訂單</div>
            <div class="example-body">
                <p>請撰寫一段程式，完成以下功能：</p>
                <ol>
                    <li>建立商品價格對照表</li>
                    <li>定義函數 calculate_price(product)</li>
                    <li>函數功能：接收商品代碼、查詢商品名稱與價格、計算折扣後的價格、顯示商品處理結果</li>
                    <li>依序呼叫函數處理不同商品：A → A → B → A → C → D</li>
                </ol>
                <div class="code-block" style="margin-top:14px">
                    <div class="code-block-header">
                        <div class="code-block-dots">
                            <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                        </div>
                        <span class="code-block-lang">參考程式</span>
                    </div>
                    <pre><span class="hl-cm"># 建立商品資料對照表</span>
<span class="hl-cm"># 商品代碼對應商品名稱與價格</span>
<span class="hl-nm">product_map</span> = {
    <span class="hl-st">"A"</span>: (<span class="hl-st">"筆記型電腦"</span>, <span class="hl-nu">30000</span>),
    <span class="hl-st">"B"</span>: (<span class="hl-st">"鍵盤"</span>, <span class="hl-nu">1200</span>),
    <span class="hl-st">"C"</span>: (<span class="hl-st">"滑鼠"</span>, <span class="hl-nu">800</span>),
    <span class="hl-st">"D"</span>: (<span class="hl-st">"耳機"</span>, <span class="hl-nu">2500</span>)
}

<span class="hl-cm"># 【第1題】定義函數 calculate_price(product)</span>
<span class="hl-cm"># product 為參數，用來接收要處理的商品代碼</span>
<span class="hl-kw">def</span> <span class="hl-nm">calculate_price</span>(product):
    <span class="hl-cm"># 【第2題】根據商品代碼取得商品名稱與原始價格</span>
    <span class="hl-nm">name</span>, <span class="hl-nm">price</span> = <span class="hl-nm">product_map</span>[product]
    <span class="hl-cm"># 計算折扣後價格（九折）</span>
    <span class="hl-nm">final_price</span> = <span class="hl-nm">price</span> * <span class="hl-nu">0.9</span>
    <span class="hl-cm"># 顯示商品資訊</span>
    <span class="hl-kw">print</span>(<span class="hl-st">"商品名稱："</span>, <span class="hl-nm">name</span>)
    <span class="hl-kw">print</span>(<span class="hl-st">"折扣後價格："</span>, <span class="hl-nm">final_price</span>)
    <span class="hl-kw">print</span>(<span class="hl-st">"----------------"</span>)

<span class="hl-cm"># 【第3題】依序呼叫函數處理商品資料</span>
<span class="hl-nm">calculate_price</span>(<span class="hl-st">"A"</span>)  <span class="hl-cm"># 第 1 個商品</span>
<span class="hl-nm">calculate_price</span>(<span class="hl-st">"A"</span>)  <span class="hl-cm"># 第 2 個商品</span>
<span class="hl-nm">calculate_price</span>(<span class="hl-st">"B"</span>)  <span class="hl-cm"># 第 3 個商品</span>
<span class="hl-nm">calculate_price</span>(<span class="hl-st">"A"</span>)  <span class="hl-cm"># 第 4 個商品</span>
<span class="hl-nm">calculate_price</span>(<span class="hl-st">"C"</span>)  <span class="hl-cm"># 第 5 個商品</span>
<span class="hl-nm">calculate_price</span>(<span class="hl-st">"D"</span>)  <span class="hl-cm"># 第 6 個商品</span></pre>
                </div>
                <div class="output-wrap" style="margin-top:10px">
                    <div class="output-label">執行結果</div>
                    <div class="output-block">商品名稱：筆記型電腦
折扣後價格：27000.0
----------------
商品名稱：筆記型電腦
折扣後價格：27000.0
----------------
商品名稱：鍵盤
折扣後價格：1080.0
----------------
商品名稱：筆記型電腦
折扣後價格：27000.0
----------------
商品名稱：滑鼠
折扣後價格：720.0
----------------
商品名稱：耳機
折扣後價格：2250.0
----------------</div>
                </div>
            </div>
        </div>

        <h2 id="section3-2">2. 函數的進階應用</h2>

        <h3>重點語法</h3>

        <h4>(一) 參數預設值（Default Parameter）</h4>
        <p>
            有時候函數需要接收資料，但如果使用者沒有提供資料，函數也能先使用預設值。<br>
            預先準備好的內容，就是「預設值」。
        </p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-kw">def</span> <span class="hl-nm">greet</span>(name=<span class="hl-st">"同學"</span>):
    <span class="hl-kw">print</span>(<span class="hl-st">"你好，"</span> + name)

<span class="hl-nm">greet</span>()
<span class="hl-nm">greet</span>(<span class="hl-st">"小明"</span>)</pre>
        </div>
        <div class="logic-block">
            <div class="logic-label">程式邏輯說明</div>
            <p>建立函數時：<code>name="同學"</code> 表示預設名字是「同學」。</p>
            <p>沒有傳入資料：<code>greet()</code> → 執行結果：你好，同學</p>
            <p>有傳入資料：<code>greet("小明")</code> → 執行結果：你好，小明（新資料取代預設值）</p>
        </div>

        <h4>(二) 函數中呼叫函數</h4>
        <p>函數不只能自己工作，還可以請其他函數幫忙完成任務。</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-kw">def</span> <span class="hl-nm">add</span>(a, b):
    <span class="hl-kw">return</span> a + b

<span class="hl-kw">def</span> <span class="hl-nm">show_result</span>(x, y):
    <span class="hl-nm">result</span> = <span class="hl-nm">add</span>(x, y)
    <span class="hl-kw">print</span>(<span class="hl-st">"結果是："</span>, result)

<span class="hl-nm">show_result</span>(<span class="hl-nu">3</span>, <span class="hl-nu">5</span>)</pre>
        </div>
        <div class="logic-block">
            <div class="logic-label">程式邏輯說明</div>
            <p><code>add()</code> 負責計算加法；<code>show_result()</code> 負責顯示結果。</p>
            <p>執行 <code>show_result(3, 5)</code> 時，會先呼叫 <code>add(3, 5)</code> 得到 8，再印出：結果是：8</p>
        </div>

        <h4>(三) 區域變數與全域變數</h4>
        <p>
            變數也有自己的活動範圍。<br>
            可以想成：<br>
            🏫 全校都能使用的東西（全域變數）<br>
            🏠 只有自己教室能使用的東西（區域變數）
        </p>

        <p><strong>全域變數（Global Variable）：</strong>在函數外面建立的，整個程式都可以使用。</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">x</span> = <span class="hl-nu">10</span>

<span class="hl-kw">def</span> <span class="hl-nm">test</span>():
    <span class="hl-kw">print</span>(x)

<span class="hl-nm">test</span>()</pre>
        </div>
        <div class="output-wrap">
            <div class="output-label">執行結果</div>
            <div class="output-block">10</div>
        </div>
        <div class="logic-block">
            <div class="logic-label">程式邏輯說明</div>
            <p><code>x</code> 是在函數外建立的，所以整個程式（包含函數內）都能使用。</p>
        </div>

        <p><strong>區域變數（Local Variable）：</strong>在函數裡建立的，只能在該函數內使用。</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-kw">def</span> <span class="hl-nm">test</span>():
    <span class="hl-nm">y</span> = <span class="hl-nu">5</span>
    <span class="hl-kw">print</span>(y)

<span class="hl-nm">test</span>()</pre>
        </div>
        <div class="output-wrap">
            <div class="output-label">執行結果</div>
            <div class="output-block">5</div>
        </div>
        <div class="logic-block">
            <div class="logic-label">程式邏輯說明</div>
            <p><code>y</code> 只存在於 <code>test()</code> 函數內部。函數外面若直接使用 <code>print(y)</code>，會發生錯誤。</p>
            <p>例如：<code>product = "電腦"</code> 放在函數外面，整個程式都知道目前商品是電腦，這就是全域變數。</p>
            <p>如果放在函數裡：<code>score = 80</code> 只能在該函數內使用，這就是區域變數。</p>
        </div>

        <h4>(四) 函數的模組化（Modularization）</h4>
        <p>
            模組化就是：👉 把大工作拆成很多小工作。<br>
            這樣程式會更容易閱讀、修改與維護。<br>
            如果要完成一件事情，我們可以拆成不同工作，交給不同函數完成。
        </p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-kw">def</span> <span class="hl-nm">input_data</span>():
    <span class="hl-kw">return</span> <span class="hl-kw">int</span>(<span class="hl-kw">input</span>(<span class="hl-st">"請輸入數字："</span>))

<span class="hl-kw">def</span> <span class="hl-nm">calculate</span>(n):
    <span class="hl-kw">return</span> n * <span class="hl-nu">2</span>

<span class="hl-kw">def</span> <span class="hl-nm">show</span>(n):
    <span class="hl-kw">print</span>(<span class="hl-st">"結果是："</span>, n)

<span class="hl-nm">num</span> = <span class="hl-nm">input_data</span>()
<span class="hl-nm">result</span> = <span class="hl-nm">calculate</span>(num)
<span class="hl-nm">show</span>(result)</pre>
        </div>
        <div class="logic-block">
            <div class="logic-label">程式邏輯說明</div>
            <p>第一步：<code>input_data()</code> 負責取得使用者輸入。</p>
            <p>第二步：<code>calculate()</code> 負責計算（例如：5 × 2 = 10）。</p>
            <p>第三步：<code>show()</code> 負責輸出結果。</p>
            <p>整個流程：輸入資料 → 進行計算 → 顯示結果。每個函數只負責一件事，程式會更清楚。</p>
        </div>

        <hr>

        <h3>範例程式說明</h3>

        <div class="example-wrap">
            <div class="example-head">範例 (二)：使用函數計算商品折扣（進階版）</div>
            <div class="example-body">
                <p>請撰寫一段程式，完成以下功能：</p>
                <ol>
                    <li>建立商品價格對照表</li>
                    <li>定義一個函數 calculate_discount(product, rate=0.95)</li>
                    <li>函數功能：接收商品代碼、接收折扣比例（預設 0.95）、查詢商品原始價格、計算折扣後的價格並顯示結果</li>
                    <li>依序處理商品：A → A → B → A → C → D</li>
                    <li>前三筆商品使用 8 折，後三筆商品使用預設 95 折</li>
                </ol>
                <div class="code-block" style="margin-top:14px">
                    <div class="code-block-header">
                        <div class="code-block-dots">
                            <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                        </div>
                        <span class="code-block-lang">參考程式</span>
                    </div>
                    <pre><span class="hl-cm"># 建立商品價格對照表</span>
<span class="hl-cm"># 商品代碼對應商品名稱與原始價格</span>
<span class="hl-nm">product_map</span> = {
    <span class="hl-st">"A"</span>: (<span class="hl-st">"筆記型電腦"</span>, <span class="hl-nu">30000</span>),
    <span class="hl-st">"B"</span>: (<span class="hl-st">"鍵盤"</span>, <span class="hl-nu">1200</span>),
    <span class="hl-st">"C"</span>: (<span class="hl-st">"滑鼠"</span>, <span class="hl-nu">800</span>),
    <span class="hl-st">"D"</span>: (<span class="hl-st">"耳機"</span>, <span class="hl-nu">2500</span>)
}

<span class="hl-cm"># 【第1題】定義函數 calculate_discount(product, rate=0.95)</span>
<span class="hl-cm"># product：要處理的商品代碼</span>
<span class="hl-cm"># rate：折扣比例，預設為 0.95</span>
<span class="hl-kw">def</span> <span class="hl-nm">calculate_discount</span>(product, rate=<span class="hl-nu">0.95</span>):
    <span class="hl-cm"># 【第2題】根據商品代碼取得商品名稱與原始價格</span>
    <span class="hl-nm">name</span>, <span class="hl-nm">price</span> = <span class="hl-nm">product_map</span>[product]
    <span class="hl-cm"># 計算折扣後價格</span>
    <span class="hl-nm">final_price</span> = <span class="hl-nm">price</span> * rate
    <span class="hl-cm"># 顯示商品處理結果</span>
    <span class="hl-kw">print</span>(<span class="hl-st">"商品名稱："</span>, <span class="hl-nm">name</span>)
    <span class="hl-kw">print</span>(<span class="hl-st">"原始價格："</span>, <span class="hl-nm">price</span>)
    <span class="hl-kw">print</span>(<span class="hl-st">"折扣後價格："</span>, <span class="hl-nm">final_price</span>)
    <span class="hl-kw">print</span>(<span class="hl-st">"----------------------"</span>)

<span class="hl-cm"># 【第3題】依序處理商品</span>
<span class="hl-cm"># 前三筆商品：使用 8 折（自行指定 rate）</span>
<span class="hl-cm"># 後三筆商品：使用預設 95 折</span>
<span class="hl-nm">calculate_discount</span>(<span class="hl-st">"A"</span>, <span class="hl-nu">0.8</span>)  <span class="hl-cm"># 第 1 筆：筆記型電腦</span>
<span class="hl-nm">calculate_discount</span>(<span class="hl-st">"A"</span>, <span class="hl-nu">0.8</span>)  <span class="hl-cm"># 第 2 筆：筆記型電腦</span>
<span class="hl-nm">calculate_discount</span>(<span class="hl-st">"B"</span>, <span class="hl-nu">0.8</span>)  <span class="hl-cm"># 第 3 筆：鍵盤</span>
<span class="hl-nm">calculate_discount</span>(<span class="hl-st">"A"</span>)       <span class="hl-cm"># 第 4 筆：筆記型電腦（預設 0.95）</span>
<span class="hl-nm">calculate_discount</span>(<span class="hl-st">"C"</span>)       <span class="hl-cm"># 第 5 筆：滑鼠</span>
<span class="hl-nm">calculate_discount</span>(<span class="hl-st">"D"</span>)       <span class="hl-cm"># 第 6 筆：耳機</span></pre>
                </div>
                <div class="output-wrap" style="margin-top:10px">
                    <div class="output-label">執行結果</div>
                    <div class="output-block">商品名稱：筆記型電腦
原始價格：30000
折扣後價格：24000.0
----------------------
商品名稱：筆記型電腦
原始價格：30000
折扣後價格：24000.0
----------------------
商品名稱：鍵盤
原始價格：1200
折扣後價格：960.0
----------------------
商品名稱：筆記型電腦
原始價格：30000
折扣後價格：28500.0
----------------------
商品名稱：滑鼠
原始價格：800
折扣後價格：760.0
----------------------
商品名稱：耳機
原始價格：2500
折扣後價格：2375.0
----------------------</div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
