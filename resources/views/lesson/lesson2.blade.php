@extends('layouts.app')

@section('style')
    @include('layouts._lesson-styles')
@endsection

@section('content')
<div class="lesson-wrap" data-chapter="2">

    {{-- ===== 標題列 ===== --}}
    <div class="lesson-header">
        <h1>第 2 章　流程控制、選擇性敘述與迴圈</h1>
    </div>

    {{-- ===== 章節色條 ===== --}}
    <div class="chap-accent-bar"></div>

    {{-- ===== 學習目標 ===== --}}
    <div class="lesson-goals">
        <h3>學習目標</h3>
        <div class="goal-links">
            <a href="#section2-1">1. 選擇性敘述</a>
            <a href="#section2-2">2. for 迴圈</a>
        </div>
    </div>

    {{-- ===== 主要內容 ===== --}}
    <div class="lesson-content">

        <h2 id="section2-1">1. 選擇性敘述</h2>

        <h3>重點語法</h3>

        <h4>(一) 什麼是條件判斷？</h4>
        <p>條件判斷可以想成：「程式在做選擇題」。程式會先判斷條件是否成立，再決定要做什麼事情。</p>
        <p>例如：<br>
            • 如果今天下雨 ☔ → 要記得帶雨傘<br>
            • 如果今天不會下雨 ☔ → 不用帶雨傘<br>
            • 如果肚子餓 🍔 → 去吃飯<br>
            • 如果按下播放鍵 🎵 → 播放音樂
        </p>
        <p>這些都屬於「條件判斷」。</p>

        <h4>(二) if-else 條件判斷</h4>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-kw">if</span> 條件:
    條件成立時執行的程式
<span class="hl-kw">else</span>:
    條件不成立時執行的程式</pre>
        </div>
        <p>簡單理解：<br>
        👉 if 表示：「如果…」<br>
        👉 else 表示：「不然就…」<br>
        程式會根據條件，選擇不同的結果。</p>

        <p>生活小舉例（判斷成績是否及格），程式碼如下：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">score</span> = <span class="hl-nu">80</span>

<span class="hl-kw">if</span> <span class="hl-nm">score</span> >= <span class="hl-nu">60</span>:
    <span class="hl-kw">print</span>(<span class="hl-st">"及格"</span>)
<span class="hl-kw">else</span>:
    <span class="hl-kw">print</span>(<span class="hl-st">"不及格"</span>)</pre>
        </div>
        <div class="logic-block" style="margin-top:10px">
            <div class="logic-label">程式邏輯說明</div>
            <p>如果：score >= 60 成立，就輸出：及格，否則輸出：不及格。</p>
        </div>

        <h4>(三) if / elif / else 條件判斷</h4>
        <p>有時候：不只兩種情況，而是很多種選擇，這時可以使用 if、elif、else。</p>
        <table>
            <tr><th>語法</th><th>功能</th></tr>
            <tr><td>if</td><td>第一個條件判斷</td></tr>
            <tr><td>elif</td><td>其他條件判斷</td></tr>
            <tr><td>else</td><td>前面都不成立時執行</td></tr>
        </table>
        <p>基本語法如下：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-kw">if</span> 條件:
    程式內容
<span class="hl-kw">elif</span> 條件:
    程式內容
<span class="hl-kw">else</span>:
    程式內容</pre>
        </div>
        <p>
            程式判斷順序：程式會「由上往下」判斷。順序如下：<br>
            　　1️⃣ 先檢查 if<br>
            　　2️⃣ if 不成立 → 檢查 elif<br>
            　　3️⃣ 都不成立 → 執行 else
        </p>

        <hr>

        <h3>範例程式說明</h3>

        <div class="example-wrap">
            <div class="example-head">範例 (一)：判斷輸入數字的種類</div>
            <div class="example-body">
                <p>
                    請撰寫一段程式，讓使用者輸入一個整數，並判斷該數字為：<br>
                    　　• 正數<br>
                    　　• 0<br>
                    　　• 負數<br><br>
                    並將結果顯示出來。
                </p>
                <div class="hint-block">
                    <div class="hint-label">提示</div>
                    <p>• if：第一個條件判斷</p>
                    <p>• elif：多條件判斷（else if）</p>
                    <p>• else：其他所有情況</p>
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
                    <pre><span class="hl-cm"># 【題號1】 輸入整數</span>
<span class="hl-cm"># input() 預設取得的是字串（string）</span>
<span class="hl-cm"># 使用 int() 轉換成整數（integer）</span>
<span class="hl-nm">num</span> = <span class="hl-kw">int</span>(<span class="hl-kw">input</span>(<span class="hl-st">"請輸入一個整數: "</span>))

<span class="hl-cm"># 【題號2】 判斷數字種類</span>
<span class="hl-kw">if</span> num > <span class="hl-nu">0</span>:
    <span class="hl-kw">print</span>(<span class="hl-st">"你輸入的是正數"</span>)
<span class="hl-kw">elif</span> num == <span class="hl-nu">0</span>:
    <span class="hl-kw">print</span>(<span class="hl-st">"你輸入的是 0"</span>)
<span class="hl-kw">else</span>:
    <span class="hl-kw">print</span>(<span class="hl-st">"你輸入的是負數"</span>)</pre>
                </div>
                <div class="output-wrap" style="margin-top:10px">
                    <div class="output-label">執行結果（假設輸入）</div>
                    <div class="output-block">請輸入一個整數: -5

你輸入的是負數</div>
                </div>
            </div>
        </div>

        <div class="example-wrap">
            <div class="example-head">範例 (二)：判斷會員優惠資格（if-else）</div>
            <div class="example-body">
                <p>
                    請撰寫一段程式，讓使用者輸入消費金額：<br>
                    　　• 如果消費金額可以被 2 整除 → 顯示「符合優惠資格」，並計算九折後的金額<br>
                    　　• 如果消費金額無法被 2 整除 → 顯示「不符合優惠資格」，並顯示原本的消費金額
                </p>
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
<span class="hl-cm"># 讓使用者輸入消費金額</span>
<span class="hl-cm"># input() 預設取得的是字串（string）</span>
<span class="hl-cm"># 使用 int() 將輸入內容轉換成整數（integer）</span>
<span class="hl-nm">amount</span> = <span class="hl-kw">int</span>(<span class="hl-kw">input</span>(<span class="hl-st">"請輸入消費金額："</span>))

<span class="hl-cm"># 【題號2】</span>
<span class="hl-cm"># 使用 if-else 判斷消費金額是否可以被 2 整除</span>
<span class="hl-cm"># % 為取餘數運算</span>
<span class="hl-cm"># 若 amount 除以 2 的餘數為 0，代表符合條件</span>
<span class="hl-kw">if</span> <span class="hl-nm">amount</span> % <span class="hl-nu">2</span> == <span class="hl-nu">0</span>:
    <span class="hl-cm"># 顯示符合優惠資格</span>
    <span class="hl-kw">print</span>(<span class="hl-st">"符合優惠資格"</span>)
    <span class="hl-cm"># 計算九折後的金額</span>
    <span class="hl-nm">discount_amount</span> = <span class="hl-nm">amount</span> * <span class="hl-nu">0.9</span>
    <span class="hl-cm"># 顯示折扣後金額</span>
    <span class="hl-kw">print</span>(<span class="hl-st">"折扣後金額為："</span>, <span class="hl-nm">discount_amount</span>)
<span class="hl-kw">else</span>:
    <span class="hl-cm"># 如果無法被 2 整除</span>
    <span class="hl-cm"># 則顯示不符合優惠資格</span>
    <span class="hl-kw">print</span>(<span class="hl-st">"不符合優惠資格"</span>)
    <span class="hl-cm"># 顯示原本的消費金額</span>
    <span class="hl-kw">print</span>(<span class="hl-st">"消費金額為："</span>, <span class="hl-nm">amount</span>)</pre>
                </div>
                <div class="output-wrap" style="margin-top:10px">
                    <div class="output-label">執行結果（範例一）</div>
                    <div class="output-block">請輸入消費金額：8

符合優惠資格
折扣後金額為：7.2</div>
                </div>
                <div class="output-wrap" style="margin-top:10px">
                    <div class="output-label">執行結果（範例二）</div>
                    <div class="output-block">請輸入消費金額：5

不符合優惠資格
消費金額為：5</div>
                </div>
            </div>
        </div>

        <h2 id="section2-2">2. for 迴圈</h2>

        <h3>重點語法</h3>

        <h4>(一) 什麼是 for 迴圈？</h4>
        <p>
            for 迴圈可以想成：<br>
            👉「幫程式重複做事情的小助手」。<br><br>
            當有很多資料需要：<br>
            　　• 一個一個處理<br>
            　　• 一個一個播放<br>
            　　• 一個一個顯示<br><br>
            就很適合使用 for 迴圈。
        </p>

        <h4>(二) for 迴圈語法</h4>
        <p>基本語法：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-kw">for</span> 變數 <span class="hl-kw">in</span> 串列:
    要重複執行的程式</pre>
        </div>
        <p>
            簡單理解：<br>
            👉 for 表示：「重複做」<br>
            👉 變數：用來暫時存放目前的資料<br>
            👉 in 表示：「從串列裡面取資料」
        </p>
        <p>範例說明，如下程式碼：</p>
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

<span class="hl-kw">for</span> <span class="hl-nm">note</span> <span class="hl-kw">in</span> <span class="hl-nm">melody</span>:
    <span class="hl-kw">print</span>(<span class="hl-nm">note</span>)</pre>
        </div>
        <div class="output-wrap">
            <div class="output-label">執行結果</div>
            <div class="output-block">C
D
E</div>
        </div>
        <div class="logic-block">
            <div class="logic-label">程式邏輯說明</div>
            <p>程式會：</p>
            <p>　　1️⃣ 先取出 "C"，放進變數 note</p>
            <p>　　2️⃣ 再取出 "D"</p>
            <p>　　3️⃣ 再取出 "E"</p>
            <p>直到所有資料都處理完。</p>
        </div>

        <h4>(三) 索引（index）是什麼？</h4>
        <p>串列中的每個資料，都有自己的位置編號，這個編號稱為：👉 索引（index）</p>
        <p>重點觀念：Python 的索引：👉 從 0 開始，不是從 1 開始。</p>
        <p>範例，如下程式碼：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">melody</span> = [<span class="hl-st">"G"</span>, <span class="hl-st">"A"</span>, <span class="hl-st">"G"</span>, <span class="hl-st">"F"</span>]</pre>
        </div>
        <p>對應位置如下：</p>
        <table>
            <tr><th>位置（index）</th><th>資料</th></tr>
            <tr><td>0</td><td>G</td></tr>
            <tr><td>1</td><td>A</td></tr>
            <tr><td>2</td><td>G</td></tr>
            <tr><td>3</td><td>F</td></tr>
        </table>
        <p>
            什麼是 melody[i]？<br>
            melody[i] 代表：👉 使用位置編號，取得對應的資料，就像：用座號找同學。
        </p>
        <p>範例說明，如下程式碼：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div>
                    <div class="code-block-dot yellow"></div>
                    <div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">i</span> = <span class="hl-nu">1</span>
<span class="hl-kw">print</span>(<span class="hl-nm">melody</span>[<span class="hl-nm">i</span>])</pre>
        </div>
        <div class="output-wrap">
            <div class="output-label">執行結果</div>
            <div class="output-block">A</div>
        </div>
        <div class="logic-block">
            <div class="logic-label">程式邏輯說明</div>
            <p>因為：i = 1，代表取：👉 第 1 個位置。</p>
            <table>
                <tr><th>index</th><th>資料</th></tr>
                <tr><td>0</td><td>G</td></tr>
                <tr><td>1</td><td>A</td></tr>
            </table>
            <p>所以：melody[1] 會得到：A</p>
        </div>

        <hr>

        <h3>範例程式說明</h3>

        <div class="example-wrap">
            <div class="example-head">範例 (一)：for 迴圈基礎練習</div>
            <div class="example-body">
                <p>請撰寫一段程式，使用 for 迴圈，依序印出數字 1 到 5。</p>
                <div class="hint-block">
                    <div class="hint-label">提示</div>
                    <p>• for：用來重複執行程式</p>
                    <p>• range(1, 6)：代表從 1 到 5（不包含 6）</p>
                    <p>• i：每次迴圈的數值</p>
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
<span class="hl-cm"># 使用 for 迴圈依序印出數字 1 到 5</span>
<span class="hl-cm"># range(1, 6) 會產生：1、2、3、4、5</span>
<span class="hl-cm"># 注意：6 不會被包含進去</span>
<span class="hl-kw">for</span> <span class="hl-nm">i</span> <span class="hl-kw">in</span> <span class="hl-kw">range</span>(<span class="hl-nu">1</span>, <span class="hl-nu">6</span>):
    <span class="hl-cm"># i 代表目前迴圈執行到的數字</span>
    <span class="hl-cm"># 第一次 i = 1</span>
    <span class="hl-cm"># 第二次 i = 2</span>
    <span class="hl-cm"># 第三次 i = 3</span>
    <span class="hl-cm"># 第四次 i = 4</span>
    <span class="hl-cm"># 第五次 i = 5</span>
    <span class="hl-kw">print</span>(<span class="hl-nm">i</span>)</pre>
                </div>
                <div class="output-wrap" style="margin-top:10px">
                    <div class="output-label">執行結果</div>
                    <div class="output-block">1
2
3
4
5</div>
                </div>
            </div>
        </div>

        <div class="example-wrap">
            <div class="example-head">範例 (二)：使用 for 迴圈處理商品訂單</div>
            <div class="example-body">
                <p>
                    請撰寫一段程式，使用 for 迴圈依序處理商品訂單資料。<br><br>
                    已知訂單中的商品代碼依序為：<br>
                    　　A → B → A → C → D → C → B<br><br>
                    請完成程式，使其能夠依序取得每筆商品代碼，並透過商品對照表查詢商品名稱後顯示。
                </p>
                <div class="code-block" style="margin-top:14px">
                    <div class="code-block-header">
                        <div class="code-block-dots">
                            <div class="code-block-dot red"></div>
                            <div class="code-block-dot yellow"></div>
                            <div class="code-block-dot green"></div>
                        </div>
                        <span class="code-block-lang">參考程式</span>
                    </div>
                    <pre><span class="hl-cm"># 【前置準備】</span>
<span class="hl-cm"># 建立商品對照表（Dictionary）</span>
<span class="hl-cm"># 功能：將商品代碼轉換成商品名稱</span>
<span class="hl-nm">product_map</span> = {
    <span class="hl-st">"A"</span>: <span class="hl-st">"筆記型電腦"</span>,
    <span class="hl-st">"B"</span>: <span class="hl-st">"鍵盤"</span>,
    <span class="hl-st">"C"</span>: <span class="hl-st">"滑鼠"</span>,
    <span class="hl-st">"D"</span>: <span class="hl-st">"耳機"</span>
}

<span class="hl-cm"># 【題號1】</span>
<span class="hl-cm"># 建立訂單串列（List）</span>
<span class="hl-cm"># 將訂單中的商品代碼依序存入串列</span>
<span class="hl-nm">orders</span> = [<span class="hl-st">"A"</span>, <span class="hl-st">"B"</span>, <span class="hl-st">"A"</span>, <span class="hl-st">"C"</span>, <span class="hl-st">"D"</span>, <span class="hl-st">"C"</span>, <span class="hl-st">"B"</span>]

<span class="hl-cm"># 顯示提示訊息</span>
<span class="hl-kw">print</span>(<span class="hl-st">"開始處理訂單"</span>)

<span class="hl-cm"># 【題號2】</span>
<span class="hl-cm"># 使用 for 迴圈依序處理訂單資料</span>
<span class="hl-cm"># code 代表目前從 orders 串列中取出的商品代碼</span>
<span class="hl-kw">for</span> <span class="hl-nm">code</span> <span class="hl-kw">in</span> <span class="hl-nm">orders</span>:
    <span class="hl-cm"># 根據商品代碼，</span>
    <span class="hl-cm"># 從 product_map 字典中取得對應的商品名稱</span>
    <span class="hl-nm">product_name</span> = <span class="hl-nm">product_map</span>[<span class="hl-nm">code</span>]
    <span class="hl-cm"># 顯示目前處理的商品資料</span>
    <span class="hl-kw">print</span>(<span class="hl-st">"目前處理的商品："</span>, <span class="hl-nm">product_name</span>)</pre>
                </div>
                <div class="output-wrap" style="margin-top:10px">
                    <div class="output-label">執行結果</div>
                    <div class="output-block">開始處理訂單
目前處理的商品：筆記型電腦
目前處理的商品：鍵盤
目前處理的商品：筆記型電腦
目前處理的商品：滑鼠
目前處理的商品：耳機
目前處理的商品：滑鼠
目前處理的商品：鍵盤</div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
