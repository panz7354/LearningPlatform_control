@extends('layouts.app')

@section('style')
    @include('layouts._lesson-styles')
@endsection

@section('content')
<div class="lesson-wrap" data-chapter="1">

    {{-- ===== 標題列 ===== --}}
    <div class="lesson-header">
        <h1>第 1 章　數值、字串與串列處理</h1>
    </div>

    {{-- ===== 章節色條 ===== --}}
    <div class="chap-accent-bar"></div>

    {{-- ===== 學習目標 ===== --}}
    <div class="lesson-goals">
        <h3>學習目標</h3>
        <div class="goal-links">
            <a href="#section1-1">1. 數值運算與字串處理</a>
            <a href="#section1-2">2. 串列與相關處理函數</a>
        </div>
    </div>

    {{-- ===== 主要內容 ===== --}}
    <div class="lesson-content">

        <h2 id="section1-1">1. 數值運算與字串處理</h2>

        <h3>重點語法</h3>

        <h4>(一) 數值運算</h4>
        <table>
            <tr><th>運算符</th><th>功能</th><th>範例</th></tr>
            <tr><td>+</td><td>加法</td><td>3 + 2 = 5</td></tr>
            <tr><td>-</td><td>減法</td><td>5 - 2 = 3</td></tr>
            <tr><td>*</td><td>乘法</td><td>3 * 2 = 6</td></tr>
            <tr><td>/</td><td>除法</td><td>6 / 2 = 3.0</td></tr>
            <tr><td>//</td><td>整數除法（取整數）</td><td>7 // 2 = 3</td></tr>
            <tr><td>%</td><td>取餘數</td><td>7 % 2 = 1</td></tr>
            <tr><td>**</td><td>次方</td><td>2 ** 3 = 8</td></tr>
        </table>

        <h4>(二) 字串處理</h4>

        <p><strong>1. 什麼是字串（string）？</strong></p>
        <p>
            字串（string）就是「文字資料」。例如："Amy"、"倫敦鐵橋"、"嗨！"都是屬於字串。<br>
            在 Python 中：文字需要用引號 " 包起來，如下程式碼：
        </p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">name</span> = <span class="hl-st">"Amy"</span></pre>
        </div>
        <div class="logic-block" style="margin-top:10px">
            <div class="logic-label">程式邏輯說明</div>
            <p>"Amy" 是文字資料（字串）。</p>
        </div>

        <h4>(三) 字串串接（合併文字）</h4>
        <p>字串可以使用 + 合併文字。如下程式碼：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-kw">print</span>(<span class="hl-st">"Hello"</span> + <span class="hl-st">" "</span> + <span class="hl-st">"World"</span>)</pre>
        </div>
        <div class="output-wrap">
            <div class="output-label">執行結果</div>
            <div class="output-block">Hello World</div>
        </div>
        <div class="logic-block" style="margin-top:10px">
            <div class="logic-label">程式邏輯說明</div>
            <p>"Hello" 是字串，"World" 也是字串，透過 + 可以把兩段文字接在一起。</p>
        </div>

        <h4>(四) 字串與數字的轉換</h4>
        <p><strong>1. 字串與數字是不同型態</strong></p>
        <p>在 Python 中，最常見的兩種型態有：</p>
        <table>
            <tr><th>資料</th><th>型態</th></tr>
            <tr><td>"5"</td><td>字串（string）</td></tr>
            <tr><td>5</td><td>整數（int）</td></tr>
        </table>
        <p><strong>字串（string）</strong>就是「文字資料」，需要使用引號 " 包起來。如下程式碼：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">a</span> = <span class="hl-st">"5"</span></pre>
        </div>
        <div class="logic-block" style="margin-top:10px">
            <div class="logic-label">程式邏輯說明</div>
            <p>雖然看起來像數字 5，但因為有引號"5"，所以 Python 會認為它是：<strong>字串</strong></p>
        </div>

        <p><strong>整數（int）</strong>就是真正可以計算的數字。如下程式碼：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">b</span> = <span class="hl-nu">5</span></pre>
        </div>
        <div class="logic-block" style="margin-top:10px">
            <div class="logic-label">程式邏輯說明</div>
            <p>因為這個 5 沒有引號，所以 Python 會認為它是：<strong>數字</strong></p>
        </div>


        <p>
            不同型態的資料，不能直接混合使用，因為：<br>
            • 字串是文字<br>
            • 數字是數字
        </p>
        <p>
            因為 "5" 是屬於文字（字串），5 是屬於數字（整數），<br>
            它們是不同種類的資料，Python 不知道該怎麼直接把它們一起運算，所以不能直接混合使用。<br>
            因此要把數字和文字一起顯示，或是要讓 "5" 也能夠做加法運算，都需要先進行<strong>「型態轉換」</strong>。
        </p><br><br>

        <p><strong>2. str()：數字轉字串</strong></p>
        <p>str() 的功能是：把數字變成文字。如下程式碼：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-kw">print</span>(<span class="hl-st">"年齡是 "</span> + <span class="hl-kw">str</span>(<span class="hl-nu">18</span>))</pre>
        </div>
        <div class="output-wrap">
            <div class="output-label">執行結果</div>
            <div class="output-block">年齡是 18</div>
        </div>
        <div class="logic-block" style="margin-top:10px">
            <div class="logic-label">程式邏輯說明</div>
            <p>18 原本是數字，str(18) 會把數字轉成文字 "18"，因此才能和前面的文字一起合併。</p>
        </div>

        <p><strong>3. int()：字串轉數字</strong></p>
        <p>int() 的功能是把文字數字轉成真正的數字，讓它能夠做數學計算。如下程式碼：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">a</span> = <span class="hl-kw">int</span>(<span class="hl-st">"5"</span>)
<span class="hl-nm">b</span> = <span class="hl-kw">int</span>(<span class="hl-st">"3"</span>)
<span class="hl-kw">print</span>(a + b)</pre>
        </div>
        <div class="output-wrap">
            <div class="output-label">執行結果</div>
            <div class="output-block">8</div>
        </div>
        <div class="logic-block" style="margin-top:10px">
            <div class="logic-label">程式邏輯說明</div>
            <p>"5" 和 "3" 原本是文字，使用 int() 後：<br>
              "5" → 5<br>
              "3" → 3<br>
            因此可以進行加法運算。</p>
        </div>

        <hr>

        <h3>範例程式說明</h3>

        <div class="example-wrap">
            <div class="example-head">範例 (一)：計算明年年齡並顯示結果</div>
            <div class="example-body">
                <p>
                    請撰寫一段程式，完成以下功能：<br>
                    1. 讓使用者輸入「姓名」與「年齡」<br>
                    2. 將輸入的年齡轉換為整數<br>
                    3. 計算「明年的年齡」<br>
                    4. 輸出完整句子，例如：小明 明年 19 歲
                </p><br>
                <div class="hint-block">
                    <div class="hint-label">提示</div>
                    <p>• 數值運算：age + 1（加法運算）</p>
                    <p>• 字串處理：使用（+）進行字串串接</p>
                    <p>• 型態轉換：使用 int()，字串 → 數字；使用 str()，數字 → 字串</p>
                </div>
                <div class="code-block" style="margin-top:14px">
                    <div class="code-block-header">
                        <div class="code-block-dots">
                            <div class="code-block-dot red"></div>
                            <div class="code-block-dot yellow"></div>
                            <div class="code-block-dot green"></div>
                        </div>
                        <span class="code-block-lang">參考程式</span>
                    </div>
                    <pre><span class="hl-cm"># 【題號1】</span>
<span class="hl-cm"># 使用 input() 讓使用者輸入姓名</span>
<span class="hl-cm"># input() 取得的資料預設為字串（string）</span>
<span class="hl-nm">name</span> = <span class="hl-kw">input</span>(<span class="hl-st">"請輸入姓名: "</span>)

<span class="hl-cm"># 【題號2】</span>
<span class="hl-cm"># 使用 input() 讓使用者輸入年齡</span>
<span class="hl-cm"># 因為 input() 預設為字串</span>
<span class="hl-cm"># 所以需使用 int() 轉換成整數（integer）</span>
<span class="hl-nm">age</span> = <span class="hl-kw">int</span>(<span class="hl-kw">input</span>(<span class="hl-st">"請輸入年齡: "</span>))

<span class="hl-cm"># 【題號3】</span>
<span class="hl-cm"># 使用加法運算計算明年的年齡</span>
<span class="hl-cm"># 例如：18 + 1 = 19</span>
<span class="hl-nm">next_age</span> = age + <span class="hl-nu">1</span>

<span class="hl-cm"># 【題號4】</span>
<span class="hl-cm"># 使用 + 進行字串串接</span>
<span class="hl-cm"># str() 的功能是將數字轉換為字串</span>
<span class="hl-cm"># 才能和文字一起合併輸出</span>
<span class="hl-kw">print</span>(name + <span class="hl-st">" 明年 "</span> + <span class="hl-kw">str</span>(next_age) + <span class="hl-st">" 歲"</span>)</pre>
                </div>
                <div class="output-wrap" style="margin-top:10px">
                    <div class="output-label">執行結果（假設輸入）</div>
                    <div class="output-block">請輸入姓名: 小明
請輸入年齡: 18

程式輸出：
小明 明年 19 歲</div>
                </div>
            </div>
        </div>

        <div class="example-wrap">
            <div class="example-head">範例 (二)：計算工作完成時間</div>
            <div class="example-body">
                <p>
                    請撰寫一段程式，完成以下功能：<br>
                    1. 請使用者輸入完成一項工作的數量<br>
                    2. 假設每完成一項工作需要 0.5 小時，計算預估完成所有工作的總時間<br>
                    3. 顯示預估完成時間<br>
                    4. 依序顯示「開始處理第一項工作」與「開始處理第二項工作」
                </p><br>
                <div class="code-block" style="margin-top:14px">
                    <div class="code-block-header">
                        <div class="code-block-dots">
                            <div class="code-block-dot red"></div>
                            <div class="code-block-dot yellow"></div>
                            <div class="code-block-dot green"></div>
                        </div>
                        <span class="code-block-lang">參考程式</span>
                    </div>
                    <pre><span class="hl-cm"># 【題號1】</span>
<span class="hl-cm"># 使用 input() 讓使用者輸入工作數量</span>
<span class="hl-cm"># input() 取得的是字串（string）</span>
<span class="hl-cm"># 因此需要使用 int() 將資料轉換成整數（integer）</span>
<span class="hl-nm">num</span> = <span class="hl-kw">int</span>(<span class="hl-kw">input</span>(<span class="hl-st">"請輸入需要完成的工作數量："</span>))

<span class="hl-cm"># 【題號2】</span>
<span class="hl-cm"># 計算預估完成時間</span>
<span class="hl-cm"># 每完成一項工作需要 0.5 小時</span>
<span class="hl-cm"># 例如：如果輸入 2</span>
<span class="hl-cm"># 則 total_time = 2 × 0.5 = 1.0 小時</span>
<span class="hl-nm">total_time</span> = <span class="hl-nm">num</span> * <span class="hl-nu">0.5</span>

<span class="hl-cm"># 顯示預估完成時間</span>
<span class="hl-cm"># 使用 str() 將數值轉換成字串，</span>
<span class="hl-cm"># 才能與文字一起使用 + 進行串接</span>
<span class="hl-kw">print</span>(<span class="hl-st">"預估完成時間為："</span> + <span class="hl-kw">str</span>(<span class="hl-nm">total_time</span>) + <span class="hl-st">" 小時"</span>)

<span class="hl-cm"># 【題號3】</span>
<span class="hl-cm"># 依序執行兩項工作</span>
<span class="hl-kw">print</span>(<span class="hl-st">"開始處理第一項工作"</span>)
<span class="hl-cm"># 暫停 total_time 秒，模擬工作處理時間</span>
time.<span class="hl-kw">sleep</span>(<span class="hl-nm">total_time</span>)
<span class="hl-kw">print</span>(<span class="hl-st">"第一項工作完成"</span>)

<span class="hl-kw">print</span>(<span class="hl-st">"開始處理第二項工作"</span>)
<span class="hl-cm"># 暫停 total_time 秒，模擬工作處理時間</span>
time.<span class="hl-kw">sleep</span>(<span class="hl-nm">total_time</span>)
<span class="hl-kw">print</span>(<span class="hl-st">"第二項工作完成"</span>)</pre>
                </div>
                <div class="output-wrap" style="margin-top:10px">
                    <div class="output-label">執行結果（假設輸入）</div>
                    <div class="output-block">請輸入需要完成的工作數量：2

程式輸出：
預估完成時間為：1.0 小時
開始處理第一項工作
第一項工作完成
開始處理第二項工作
第二項工作完成</div>
                </div>
            </div>
        </div>

        <h2 id="section1-2">2. 串列與相關處理函數</h2>

        <h3>重點語法</h3>

        <h4>(一) 串列（List）是什麼？</h4>
        <p>
            串列（List）可以想成：「一個可以放很多資料的小盒子」。<br>
            裡面可以放：數字、文字<br><br>
            如下程式碼：
        </p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">melody</span> = [<span class="hl-st">"C"</span>, <span class="hl-st">"D"</span>, <span class="hl-st">"E"</span>]</pre>
        </div>
        <div class="logic-block" style="margin-top:10px">
            <div class="logic-label">程式邏輯說明</div>
            <p>
                [] 代表建立一個串列，串列中放了 3 個字母：<br>
                C<br>
                D<br>
                E
            </p>
        </div>

        <h4>(二) 串列中的資料有順序</h4>
        <p>
            串列中的資料都有自己的位置。<br>
            位置稱為：<strong>索引（index）</strong><br>
            Python 的索引是從 0 開始算。如下：
        </p>
        <table>
            <tr><th>位置(index)</th><th>資料</th></tr>
            <tr><td>0</td><td>"C"</td></tr>
            <tr><td>1</td><td>"D"</td></tr>
            <tr><td>2</td><td>"E"</td></tr>
        </table>
        <p>如下程式碼：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">melody</span> = [<span class="hl-st">"C"</span>, <span class="hl-st">"D"</span>, <span class="hl-st">"E"</span>]
<span class="hl-kw">print</span>(<span class="hl-nm">melody</span>[<span class="hl-nu">0</span>])
<span class="hl-kw">print</span>(<span class="hl-nm">melody</span>[<span class="hl-nu">1</span>])</pre>
        </div>
        <div class="output-wrap">
            <div class="output-label">執行結果</div>
            <div class="output-block">C
D</div>
        </div>
        <div class="logic-block" style="margin-top:10px">
            <div class="logic-label">程式邏輯說明</div>
            <p>
                melody[0] 代表取得第 1 個音符。<br>
                melody[1] 代表取得第 2 個音符。<br>
                雖然是第 1 個資料，但索引要從 0 開始。
            </p>
        </div>

        <h4>(三) len()：取得串列長度</h4>
        <p>len() 的功能是：計算串列中有幾個資料。如下程式碼：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">melody</span> = [<span class="hl-st">"C"</span>, <span class="hl-st">"D"</span>, <span class="hl-st">"E"</span>]
<span class="hl-kw">print</span>(<span class="hl-kw">len</span>(<span class="hl-nm">melody</span>))</pre>
        </div>
        <div class="output-wrap">
            <div class="output-label">執行結果</div>
            <div class="output-block">3</div>
        </div>
        <div class="logic-block" style="margin-top:10px">
            <div class="logic-label">程式邏輯說明</div>
            <p>
                melody 串列中有：C、D、E，共 3 個資料。<br>
                因此：len(melody) 會得到：3
            </p>
        </div>

        <h4>(四) 串列如何新增資料（append）</h4>
        <p>append() 的功能是：在串列最後加入新資料。如下程式碼：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">melody</span> = [<span class="hl-st">"C"</span>, <span class="hl-st">"D"</span>, <span class="hl-st">"E"</span>]
<span class="hl-nm">melody</span>.<span class="hl-kw">append</span>(<span class="hl-st">"F"</span>)

<span class="hl-cm"># 原本：["C", "D", "E"]</span>
<span class="hl-cm"># 加入後變成：["C", "D", "E", "F"]</span></pre>
        </div>

        <h4>(五) 串列如何修改資料</h4>
        <p>可以直接改變串列中的資料。如下程式碼：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">melody</span> = [<span class="hl-st">"C"</span>, <span class="hl-st">"D"</span>, <span class="hl-st">"E"</span>]
<span class="hl-nm">melody</span>[<span class="hl-nu">0</span>] = <span class="hl-st">"G"</span>

<span class="hl-cm"># 修改後：["G", "D", "E"]</span></pre>
        </div>
        <div class="logic-block" style="margin-top:10px">
            <div class="logic-label">程式邏輯說明</div>
            <p>
                melody[0] 代表第 1 個位置。<br>
                因此：melody[0] = "G"，會把原本的 "C" 改成 "G"。
            </p>
        </div>

        <h4>(六) 刪除資料（remove）</h4>
        <p>remove() 的功能是：刪除指定資料。如下程式碼：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">melody</span> = [<span class="hl-st">"C"</span>, <span class="hl-st">"D"</span>, <span class="hl-st">"E"</span>]
<span class="hl-nm">melody</span>.<span class="hl-kw">remove</span>(<span class="hl-st">"D"</span>)

<span class="hl-cm"># 刪除後：["C", "E"]</span></pre>
        </div>
        <div class="logic-block" style="margin-top:10px">
            <div class="logic-label">程式邏輯說明</div>
            <p>
                "D" 被刪除了。<br>
                因此串列只剩：C、E
            </p>
        </div>

        <hr>

        <h3>範例程式說明</h3>

        <div class="example-wrap">
            <div class="example-head">範例 (一)：串列基本操作練習</div>
            <div class="example-body">
                <p>
                    請撰寫一段程式，完成以下功能：<br>
                    1. 建立一個串列，內容為：["apple", "banana", "cherry"]<br>
                    2. 印出串列中的第一個水果<br>
                    3. 在串列最後新增一個水果 "orange"<br>
                    4. 印出更新後的串列長度
                </p><br>
                <div class="hint-block">
                    <div class="hint-label">提示</div>
                    <p>• 串列建立：[]</p>
                    <p>• 索引取值：fruits[0]</p>
                    <p>• 新增資料：append()</p>
                    <p>• 長度計算：len()</p>
                </div>
                <div class="code-block" style="margin-top:14px">
                    <div class="code-block-header">
                        <div class="code-block-dots">
                            <div class="code-block-dot red"></div>
                            <div class="code-block-dot yellow"></div>
                            <div class="code-block-dot green"></div>
                        </div>
                        <span class="code-block-lang">參考程式</span>
                    </div>
                    <pre><span class="hl-cm"># 【題號1】</span>
<span class="hl-cm"># 建立串列（List）</span>
<span class="hl-cm"># 串列可以存放多個資料</span>
<span class="hl-cm"># 這裡存放 3 個水果名稱</span>
<span class="hl-nm">fruits</span> = [<span class="hl-st">"apple"</span>, <span class="hl-st">"banana"</span>, <span class="hl-st">"cherry"</span>]

<span class="hl-cm"># 【題號2】</span>
<span class="hl-cm"># 取出串列中的第一個水果</span>
<span class="hl-cm"># 索引（index）從 0 開始</span>
<span class="hl-cm"># fruits[0] 代表第一個位置</span>
<span class="hl-kw">print</span>(<span class="hl-st">"第一個水果是:"</span>, <span class="hl-nm">fruits</span>[<span class="hl-nu">0</span>])

<span class="hl-cm"># 【題號3】</span>
<span class="hl-cm"># 使用 append() 在串列最後新增資料</span>
<span class="hl-cm"># 將 "orange" 加到 fruits 串列最後面</span>
<span class="hl-nm">fruits</span>.<span class="hl-kw">append</span>(<span class="hl-st">"orange"</span>)

<span class="hl-cm"># 【題號4】</span>
<span class="hl-cm"># 使用 len() 計算串列長度</span>
<span class="hl-cm"># len(fruits) 代表目前串列中有幾個資料</span>
<span class="hl-kw">print</span>(<span class="hl-st">"目前共有"</span>, <span class="hl-kw">len</span>(<span class="hl-nm">fruits</span>), <span class="hl-st">"個水果"</span>)</pre>
                </div>
                <div class="output-wrap" style="margin-top:10px">
                    <div class="output-label">執行結果</div>
                    <div class="output-block">第一個水果是: apple
目前共有 4 個水果</div>
                </div>
            </div>
        </div>

        <div class="example-wrap">
            <div class="example-head">範例 (二)：學生分數資料處理</div>
            <div class="example-body">
                <p>
                    請撰寫一段程式，完成以下功能：<br>
                    1. 建立一個串列，儲存四位學生的測驗分數：[75, 82, 68, 90]<br>
                    2. 印出第一位學生的分數<br>
                    3. 使用 for 迴圈依序處理每一位學生的分數<br>
                    4. 判斷每位學生是否及格：<br>
                    &nbsp;&nbsp;&nbsp;• 分數大於或等於 60 分，顯示「及格」<br>
                    &nbsp;&nbsp;&nbsp;• 分數低於 60 分，顯示「不及格」<br>
                    5. 最後計算並顯示及格的人數
                </p><br>
                <div class="code-block" style="margin-top:14px">
                    <div class="code-block-header">
                        <div class="code-block-dots">
                            <div class="code-block-dot red"></div>
                            <div class="code-block-dot yellow"></div>
                            <div class="code-block-dot green"></div>
                        </div>
                        <span class="code-block-lang">參考程式</span>
                    </div>
                    <pre><span class="hl-cm"># 建立學生測驗分數串列</span>
<span class="hl-nm">scores</span> = [<span class="hl-nu">75</span>, <span class="hl-nu">82</span>, <span class="hl-nu">68</span>, <span class="hl-nu">90</span>]

<span class="hl-cm"># 顯示第一位學生的分數</span>
<span class="hl-kw">print</span>(<span class="hl-st">"第一位學生的分數是:"</span>, <span class="hl-nm">scores</span>[<span class="hl-nu">0</span>])

<span class="hl-cm"># 建立及格人數計數變數</span>
<span class="hl-nm">pass_count</span> = <span class="hl-nu">0</span>

<span class="hl-cm"># 使用 for 迴圈依序處理每一筆分數</span>
<span class="hl-kw">for</span> <span class="hl-nm">score</span> <span class="hl-kw">in</span> <span class="hl-nm">scores</span>:
    <span class="hl-cm"># 判斷學生是否及格</span>
    <span class="hl-kw">if</span> <span class="hl-nm">score</span> >= <span class="hl-nu">60</span>:
        <span class="hl-kw">print</span>(<span class="hl-nm">score</span>, <span class="hl-st">"分：及格"</span>)
        <span class="hl-cm"># 及格人數加 1</span>
        <span class="hl-nm">pass_count</span> = <span class="hl-nm">pass_count</span> + <span class="hl-nu">1</span>
    <span class="hl-kw">else</span>:
        <span class="hl-kw">print</span>(<span class="hl-nm">score</span>, <span class="hl-st">"分：不及格"</span>)

<span class="hl-cm"># 顯示及格人數</span>
<span class="hl-kw">print</span>(<span class="hl-st">"及格人數為:"</span>, <span class="hl-nm">pass_count</span>)

<span class="hl-cm"># 顯示學生總人數</span>
<span class="hl-kw">print</span>(<span class="hl-st">"學生總人數為:"</span>, <span class="hl-kw">len</span>(<span class="hl-nm">scores</span>))</pre>
                </div>
                <div class="output-wrap" style="margin-top:10px">
                    <div class="output-label">執行結果</div>
                    <div class="output-block">第一位學生的分數是: 75
75 分：及格
82 分：及格
68 分：及格
90 分：及格
及格人數為: 4
學生總人數為: 4</div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
