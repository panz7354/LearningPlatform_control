@extends('layouts.app')

@section('style')
    @include('layouts._lesson-styles')
@endsection

@section('content')
<div class="lesson-wrap" data-chapter="0">

    {{-- ===== 標題列 ===== --}}
    <div class="lesson-header">
        <h1>第0章 Python 程式邏輯介紹</h1>
    </div>

    {{-- ===== 章節色條 ===== --}}
    <div class="chap-accent-bar"></div>

    {{-- ===== 學習目標 ===== --}}
    <div class="lesson-goals">
        <h3>學習目標</h3>
        <div class="goal-links">
            <a href="#section0-1">1. Python 程式設計概述</a>
            <a href="#section0-2">2. 程式執行與錯誤訊息</a>
            <a href="#section0-3">3. Python程式結構：for迴圈</a>
            <a href="#section0-4">4. 綜合範例程式：分析程式執行流程</a>
        </div>
    </div>

    {{-- ===== 主要內容 ===== --}}
    <div class="lesson-content">

        <h2 id="section0-1">1. Python 程式設計概述</h2>
        <p>Python 是一種高階程式語言，具有語法簡潔、可讀性高及支援多種程式設計方式等特性，廣泛應用於資料分析、人工智慧、網頁開發、自動化處理及科學計算等領域。</p>
        <p>程式設計的核心並不只是記住特定語法，而是將一個需要解決的問題，轉換為電腦可以依序執行的指令。因此，在學習 Python 時，需要同時理解「語法如何撰寫」以及「程式如何執行」。</p><br>

        <p>例如，以下程式：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">x</span> = <span class="hl-nu">10</span>
<span class="hl-nm">y</span> = <span class="hl-nu">20</span>
<span class="hl-nm">result</span> = <span class="hl-nm">x</span> + <span class="hl-nm">y</span>
<span class="hl-kw">print</span>(<span class="hl-nm">result</span>)
</pre>
        </div>

        <p>表面上看起來只是進行加法運算，但程式實際執行時，會依照程式碼的順序逐步處理：</p>
        <div class="logic-block" style="margin-top:10px">
            <div class="logic-label">程式邏輯說明</div>
            <pre>建立 x → 建立 y → 計算 x + y → 將結果儲存至 result → 輸出 result</pre>
        </div>

        <p>因此，程式設計可以視為一個「輸入 → 處理 → 輸出」的問題解決過程。</p><br>
        <p>在沒有條件判斷、迴圈或函數等控制結構的情況下，Python 程式通常會由上而下依序執行。例如：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">a</span> = <span class="hl-nu">10</span>
<span class="hl-nm">b</span> = <span class="hl-nu">20</span>
<span class="hl-nm">a</span> = <span class="hl-nu">30</span>
<span class="hl-kw">print</span>(<span class="hl-nm">a</span>)
</pre>
        </div>

        <p>此段程式碼的執行過程可以理解為：</p>
        <div class="logic-block" style="margin-top:10px">
            <div class="logic-label">程式邏輯說明</div>
            <pre>第1行：a ← 10
第2行：b ← 20
第3行：a ← 30
第4行：輸出 a
</pre>
        </div>

        <div class="output-wrap">
            <div class="output-label">執行結果</div>
            <div class="output-block">30</div>
        </div>

        <p>
            這裡需要注意，變數 a 並不是同時保留 10 和 30。<br>
            當執行：a = 30之後，a 原本所代表的值 10 已經被新的值取代。
        </p><br>
        <p>我們進一步思考<br>請觀察以下程式：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">x</span> = <span class="hl-nu">5</span>
<span class="hl-nm">x</span> = <span class="hl-nm">x</span> + <span class="hl-nu">3</span>
<span class="hl-nm">x</span> = <span class="hl-nm">x</span> * <span class="hl-nu">2</span>
<span class="hl-kw">print</span>(<span class="hl-nm">x</span>)
</pre>
        </div>

        <p>此段程式並不是在進行數學上的：</p>
        <div class="logic-block" style="margin-top:10px">
            <div class="logic-label">程式邏輯說明</div>
            <pre>x = 5 = x + 3 = x × 2</pre>
        </div>

        <p>而是按照執行順序逐步更新變數：</p>
        <div class="logic-block" style="margin-top:10px">
            <div class="logic-label">程式邏輯說明</div>
            <pre>第一次：x = 5

第二次：x = 5 + 3
       x = 8

第三次：x = 8 × 2
       x = 16
</pre>
        </div>

        <div class="output-wrap">
            <div class="output-label">執行結果</div>
            <div class="output-block">16</div>
        </div>

        <p>這種「隨著程式執行而改變的變數狀態」是後續學習條件判斷、迴圈與函數的重要基礎。</p><br>
        <p>一個完整的程式通常可以分成三個部分：</p>
        <p><strong>（1）輸入 Input</strong>：取得程式需要處理的資料。</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">name</span> = <span class="hl-kw">input</span>(<span class="hl-st">"請輸入姓名："</span>)</pre>
        </div>

        <p><strong>（2）處理 Process</strong>：利用取得的資料進行運算或判斷。</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">message</span> = <span class="hl-st">"您好，"</span> + <span class="hl-kw">name</span></pre>
        </div>

        <p><strong>（3）輸出 Output</strong>：將處理結果呈現給使用者。</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-kw">print</span>(<span class="hl-nm">message</span>)</pre>
        </div>

        <p>完整程式範例：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">name</span> = <span class="hl-kw">input</span>(<span class="hl-st">"請輸入姓名："</span>)
<span class="hl-nm">message</span> = <span class="hl-st">"您好，"</span> + <span class="hl-kw">name</span>
<span class="hl-kw">print</span>(<span class="hl-nm">message</span>)
</pre>
        </div>

        <div class="logic-block" style="margin-top:10px">
            <div class="logic-label">假設使用者輸入：</div>
            <p>小明</p>
        </div>

        <div class="output-wrap">
            <div class="output-label">執行結果</div>
            <div class="output-block">您好，小明</div>
        </div>

        <div class="logic-block" style="margin-top:10px">
            <div class="logic-label">程式邏輯說明</div>
            <pre>使用者輸入資料 → 程式處理資料 → 顯示處理結果</pre>
        </div>





        <h2 id="section0-2">2. 程式執行與錯誤訊息</h2>

        <p>程式不一定每次都能成功執行。當程式碼存在問題時，Python 通常會產生錯誤訊息。例如：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-kw">print</span>(<span class="hl-nm">score</span>)</pre>
        </div>

        <p>如果程式之前沒有預先建立 <strong>score</strong> 會產生 <strong>NameError</strong> </p>
        <p>表示程式嘗試使用尚未定義的名稱。</p>
        <p>再例如：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-kw">print</span>(<span class="hl-st">"Hello"</span></pre>
        </div>

        <p>因為括號沒有正確關閉，會產生 <strong>SyntaxError</strong> </p>
        <p>因此，閱讀錯誤訊息也是程式設計的重要能力。</p>
        <p>學習者不應只關注「程式有沒有成功執行」，也需要逐步學習：</p>
        <div class="logic-block" style="margin-top:10px">
            <pre>使用者輸入資料 → 程式處理資料 → 顯示處理結果</pre>
        </div>






        <h2 id="section0-3">3. Python程式結構：for迴圈</h2>

        <p>for 迴圈是 Python 中重要的重複執行結構，主要用於依序取得一組資料中的每一個元素，並對每個元素執行相同的程式區塊。</p>
        <p>與單純將相同程式碼重複撰寫相比，for 迴圈可以讓程式以較簡潔的方式處理大量資料。</p>
        <p>例如，若需要依序輸出 5 個學生的成績，不需要撰寫 5 次 print()，而可以透過迴圈自動處理。</p><br>

        <p>Python 中 for 迴圈的基本語法如下：</p>
        <div class="logic-block" style="margin-top:10px">
            <pre>for 變數 in 可迭代資料:
    要重複執行的程式區塊
</pre>
        </div>

        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">numbers</span> = [<span class="hl-nu">10</span>, <span class="hl-nu">20</span>, <span class="hl-nu">30</span>, <span class="hl-nu">40</span>]

<span class="hl-kw">for</span> <span class="hl-nm">number</span> <span class="hl-kw">in</span> <span class="hl-nm">numbers</span>:
    <span class="hl-kw">print</span>(<span class="hl-nm">number</span>)
</pre>
        </div>
        <div class="output-wrap">
            <div class="output-label">執行結果</div>
            <div class="output-block">10
20
30
40
</div>

        <p>因此 <strong>for number in numbers</strong> 可以理解成：</p>
        <p><strong>「從 numbers 中依序取出一個資料，將它暫時放入 number，接著執行下面縮排的程式。」</strong></p>

        <p>以下列程式為例：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">numbers</span> = [<span class="hl-nu">10</span>, <span class="hl-nu">20</span>, <span class="hl-nu">30</span>]

<span class="hl-kw">for</span> <span class="hl-nm">number</span> <span class="hl-kw">in</span> <span class="hl-nm">numbers</span>:
    <span class="hl-kw">print</span>(<span class="hl-nm">number</span>)
</pre>
        </div>
        <p>此段程式並不是一次將三個數字全部放入 number中，而是一次取得一個元素。</p>

        <div class="logic-block" style="margin-top:10px">
            <div class="logic-label">執行流程如下：</div>
            <pre>numbers = [10, 20, 30]

第一次：
number = 10
↓
print(10)

第二次：
number = 20
↓
print(20)

第三次：
number = 30
↓
print(30)

沒有其他資料
↓
結束迴圈
</pre>
        </div>

        <p>因此可以將 for 迴圈理解為：</p>
        <div class="logic-block" style="margin-top:10px">
            <pre>取得一筆資料 → 執行程式區塊 → 取得下一筆資料 → 再執行一次 → 直到所有資料處理完成。</pre>
        </div>






        <h2 id="section0-4">4. 綜合範例程式：分析程式執行流程</h2>

        <p>請觀察以下程式，依照程式的實際執行順序，逐步分析每一段程式碼的作用與結果：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">score1</span> = <span class="hl-nu">70</span>
<span class="hl-nm">score2</span> = <span class="hl-nu">85</span>
<span class="hl-nm">average</span> = (<span class="hl-nm">score1</span> + <span class="hl-nm">score2</span>) / <span class="hl-nu">2</span>

<span class="hl-kw">if</span> <span class="hl-nm">average</span> >= <span class="hl-nu">60</span>:
    <span class="hl-nm">result</span> = <span class="hl-st">"及格"</span>
<span class="hl-kw">else</span>:
    <span class="hl-nm">result</span> = <span class="hl-st">"不及格"</span>

<span class="hl-kw">print</span>(<span class="hl-st">"平均分數："</span>, <span class="hl-nm">average</span>)
<span class="hl-kw">print</span>(<span class="hl-st">"結果："</span>, <span class="hl-nm">result</span>)
</pre>
        </div><br>

        {{-- 步驟一 --}}
        <strong>步驟一：建立變數並儲存成績</strong>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">score1</span> = <span class="hl-nu">70</span>
<span class="hl-nm">score2</span> = <span class="hl-nu">85</span></pre>
        </div>

        <div class="logic-block" style="margin-top:16px">
            <div class="logic-label">此時建立兩個變數：</div>
            <table class="info-table">
                <thead>
                    <tr><th>變數</th><th>儲存的值</th></tr>
                </thead>
                <tbody>
                    <tr><td>score1</td><td><strong>70</strong></td></tr>
                    <tr><td>score2</td><td><strong>85</strong></td></tr>
                </tbody>
            </table>
            <p>score1 儲存第一個成績 70</p>
            <p>score2 儲存第二個成績 85</p>
        </div><br>

        {{-- 步驟二 --}}
        <strong>步驟二：計算平均分數</strong>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">average</span> = (<span class="hl-nm">score1</span> + <span class="hl-nm">score2</span>) / <span class="hl-nu">2</span></pre>
        </div>

        <div class="logic-block" style="margin-top:16px">
            <div class="logic-label">將目前兩個變數的值代入：</div>
            <pre>average = (70 + 85) / 2
        = 155 / 2
        = 77.5</pre><br>
            <p>因此 average = 77.5，此時變數狀態為：</p>
            <table class="info-table">
                <thead>
                    <tr><th>變數</th><th>儲存的值</th></tr>
                </thead>
                <tbody>
                    <tr><td>score1</td><td><strong>70</strong></td></tr>
                    <tr><td>score2</td><td><strong>85</strong></td></tr>
                    <tr><td>average</td><td><strong>77.5</strong></td></tr>
                </tbody>
            </table>
        </div><br>

        {{-- 步驟三 --}}
        <strong>步驟三：進行條件判斷</strong>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-kw">if</span> <span class="hl-nm">average</span> >= <span class="hl-nu">60</span>:
    <span class="hl-nm">result</span> = <span class="hl-st">"及格"</span>
<span class="hl-kw">else</span>:
    <span class="hl-nm">result</span> = <span class="hl-st">"不及格"</span></pre>
        </div>

        <div class="logic-block" style="margin-top:16px">
            <div class="logic-label">將 average 的值代入：</div>
            <pre>77.5 >= 60</pre>
        </div>

        <div class="output-wrap">
            <div class="output-label">執行結果</div>
            <div class="output-block">True（條件成立）</div>
        </div>

        <p>此時 result = "及格"，而 else 區塊不會執行。</p>
        <p>因此，程式會執行 if 下方縮排的程式：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">result</span> = <span class="hl-st">"及格"</span></pre>
        </div><br>



        {{-- 步驟四 --}}
        <strong>步驟四：輸出平均分數</strong>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-kw">print</span>(<span class="hl-st">"平均分數："</span>, <span class="hl-nm">average</span>)</pre>
        </div>

        <div class="output-wrap">
            <div class="output-label">執行結果</div>
            <div class="output-block">平均分數：77.5</div>
        </div><br>


        {{-- 步驟五 --}}
        <strong>步驟五：輸出判斷結果</strong>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-kw">print</span>(<span class="hl-st">"結果："</span>, <span class="hl-nm">result</span>)</pre>
        </div>

        <div class="output-wrap">
            <div class="output-label">執行結果</div>
            <div class="output-block">結果：及格</div>
        </div>


    </div>
</div>
@endsection
