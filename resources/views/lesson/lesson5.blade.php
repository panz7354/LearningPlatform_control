@extends('layouts.app')

@section('style')
    @include('layouts._lesson-styles')
@endsection

@section('content')
<div class="lesson-wrap" data-chapter="5">

    {{-- ===== 標題列 ===== --}}
    <div class="lesson-header">
        <h1>第 5 章　檔案、異常處理與模組</h1>
    </div>

    {{-- ===== 章節色條 ===== --}}
    <div class="chap-accent-bar"></div>

    {{-- ===== 學習目標 ===== --}}
    <div class="lesson-goals">
        <h3>學習目標</h3>
        <div class="goal-links">
            <a href="#section5-1">1. 檔案處理</a>
            <a href="#section5-2">2. 異常處理與模組</a>
        </div>
    </div>

    {{-- ===== 主要內容 ===== --}}
    <div class="lesson-content">

        <h2 id="section5-1">1. 檔案處理</h2>

        <h3>重點語法</h3>

        <h4>(一) 什麼是檔案處理？</h4>
        <p>
            在 Python 中，「檔案處理」就是讓程式可以：<br>
            • 讀取檔案內容 📖<br>
            • 寫入資料到檔案 ✏️<br>
            • 儲存程式結果 💾
        </p>
        <p>
            就像我們平常使用：記事本、Word、歌詞檔、音樂播放清單，<br>
            Python 也可以幫我們自動開啟與操作這些檔案。
        </p>

        <h4>(二) 開啟檔案：open()</h4>
        <p>使用 <code>open()</code> 可以開啟檔案。</p>
        <p><strong>基本語法：</strong></p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">檔案變數</span> = <span class="hl-kw">open</span>(<span class="hl-st">"檔名"</span>, <span class="hl-st">"模式"</span>)

<span class="hl-cm"># 例如：</span>
<span class="hl-nm">file</span> = <span class="hl-kw">open</span>(<span class="hl-st">"music.txt"</span>, <span class="hl-st">"r"</span>)</pre>
        </div>
        <div class="logic-block">
            <div class="logic-label">程式邏輯說明</div>
            <p>開啟 music.txt，使用 <code>r</code> 模式（read，讀取模式）。</p>
        </div>

        <h4>(三) 常見檔案模式</h4>
        <table>
            <tr><th>模式</th><th>說明</th></tr>
            <tr><td>"r"</td><td>讀取檔案【read】</td></tr>
            <tr><td>"w"</td><td>寫入檔案（會覆蓋原內容）【write】</td></tr>
            <tr><td>"a"</td><td>附加內容（加在最後）【append】</td></tr>
        </table>

        <h4>(四) 讀取檔案內容</h4>
        <p>使用 <code>read()</code> 可以一次讀取全部內容。如下程式碼：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">file</span> = <span class="hl-kw">open</span>(<span class="hl-st">"music.txt"</span>, <span class="hl-st">"r"</span>)  <span class="hl-cm"># 開啟檔案，並讀取內容</span>
<span class="hl-nm">data</span> = file.<span class="hl-kw">read</span>()              <span class="hl-cm"># 將剛才讀取的內容，存入變數 data 裡面</span>
<span class="hl-kw">print</span>(data)                      <span class="hl-cm"># 顯示變數 data 的內容</span></pre>
        </div>
        <div class="logic-block">
            <div class="logic-label">程式邏輯說明</div>
            <p>① 開啟檔案　→　② 讀取內容　→　③ 將內容存入變數　→　④ 顯示內容</p>
        </div>

        <h4>(五) 寫入檔案內容</h4>
        <p>使用 <code>write()</code> 可以把資料寫入檔案。如下程式碼：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">file</span> = <span class="hl-kw">open</span>(<span class="hl-st">"music.txt"</span>, <span class="hl-st">"w"</span>)  <span class="hl-cm"># 開啟檔案 music.txt（寫入模式 "w"）</span>
file.<span class="hl-kw">write</span>(<span class="hl-st">"C D E F G"</span>)          <span class="hl-cm"># 把文字 C D E F G 寫入檔案，檔案內容被儲存</span></pre>
        </div>
        <div class="logic-block">
            <div class="logic-label">程式邏輯說明</div>
            <p>① 開啟檔案（寫入模式）　→　② 把文字寫入檔案　→　③ 檔案內容被儲存</p>
        </div>

        <h4>(六) 關閉檔案：close()</h4>
        <p>檔案使用完後，要記得關閉。如下程式碼：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre>file.<span class="hl-kw">close</span>()</pre>
        </div>
        <div class="logic-block">
            <div class="logic-label">程式邏輯說明</div>
            <p>檔案使用完後要記得關閉，否則可能：資料沒有正確儲存、檔案被占用、程式發生錯誤。</p>
        </div>

        <h4>(七) 完整檔案處理流程</h4>
        <p>如下程式碼：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-cm"># 開啟檔案，用 w 寫入模式</span>
<span class="hl-nm">file</span> = <span class="hl-kw">open</span>(<span class="hl-st">"music.txt"</span>, <span class="hl-st">"w"</span>)

<span class="hl-cm"># 寫入內容 Hello Music</span>
file.<span class="hl-kw">write</span>(<span class="hl-st">"Hello Music"</span>)

<span class="hl-cm"># 關閉檔案</span>
file.<span class="hl-kw">close</span>()</pre>
        </div>
        <div class="logic-block">
            <div class="logic-label">檔案處理流程</div>
            <p>① open()　→　② 讀取 / 寫入　→　③ close()</p>
        </div>

        <hr>

        <h3>範例程式說明</h3>

        <div class="example-wrap">
            <div class="example-head">範例 (一)：建立 music 檔案並寫入旋律 🎵</div>
            <div class="example-body">
                <p>請撰寫一段程式，完成以下功能：</p>
                <ol>
                    <li>開啟一個檔案 music.txt，使用寫入模式（"w"）</li>
                    <li>將《小星星》前四個音符寫入檔案：C C G G</li>
                    <li>關閉檔案</li>
                    <li>顯示「檔案寫入完成」</li>
                </ol>
                <div class="code-block" style="margin-top:14px">
                    <div class="code-block-header">
                        <div class="code-block-dots">
                            <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                        </div>
                        <span class="code-block-lang">參考程式</span>
                    </div>
                    <pre><span class="hl-cm"># 【第1題】</span>
<span class="hl-cm"># 使用 open() 開啟 music.txt 檔案</span>
<span class="hl-cm"># "w" 代表寫入模式（write）</span>
<span class="hl-nm">file</span> = <span class="hl-kw">open</span>(<span class="hl-st">"music.txt"</span>, <span class="hl-st">"w"</span>)

<span class="hl-cm"># 【第2題】</span>
<span class="hl-cm"># 使用 write() 將《小星星》前四個音符寫入檔案</span>
<span class="hl-cm"># 寫入內容：C C G G</span>
file.<span class="hl-kw">write</span>(<span class="hl-st">"C C G G"</span>)

<span class="hl-cm"># 【第3題】</span>
<span class="hl-cm"># 使用 close() 關閉檔案</span>
<span class="hl-cm"># 確保資料正確儲存</span>
file.<span class="hl-kw">close</span>()

<span class="hl-cm"># 【第4題】</span>
<span class="hl-cm"># 顯示完成訊息</span>
<span class="hl-kw">print</span>(<span class="hl-st">"檔案寫入完成"</span>)</pre>
                </div>
                <div class="output-wrap" style="margin-top:10px">
                    <div class="output-label">執行結果</div>
                    <div class="output-block">檔案寫入完成

📁 music.txt 檔案內容：
C C G G</div>
                </div>
            </div>
        </div>

        <div class="example-wrap">
            <div class="example-head">範例 (二)：讀取並處理任務資料</div>
            <div class="example-body">
                <p>請撰寫一段程式，完成以下功能：</p>
                <ol>
                    <li>開啟檔案 tasks.txt</li>
                    <li>讀取檔案中的任務內容</li>
                    <li>顯示讀取到的任務資料</li>
                    <li>將讀取到的任務依序顯示</li>
                    <li>關閉檔案</li>
                </ol>
                <div class="hint-block">
                    <div class="hint-label">前置準備</div>
                    <p>📌 請事先建立 tasks.txt 檔案，並在檔案中輸入以下內容後儲存：</p>
                    <p><code>檢查資料<br>整理報表<br>寄送通知<br>更新系統<br>備份資料</code></p>
                </div>
                <div class="code-block" style="margin-top:14px">
                    <div class="code-block-header">
                        <div class="code-block-dots">
                            <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                        </div>
                        <span class="code-block-lang">參考程式</span>
                    </div>
                    <pre><span class="hl-cm"># 開啟 tasks.txt 檔案，使用 r 模式讀取</span>
<span class="hl-nm">file</span> = <span class="hl-kw">open</span>(<span class="hl-st">"tasks.txt"</span>, <span class="hl-st">"r"</span>, encoding=<span class="hl-st">"utf-8"</span>)

<span class="hl-cm"># 讀取檔案中的所有內容</span>
<span class="hl-nm">data</span> = file.<span class="hl-kw">read</span>()

<span class="hl-cm"># 顯示讀取到的原始資料</span>
<span class="hl-kw">print</span>(<span class="hl-st">"讀取到的任務內容："</span>)
<span class="hl-kw">print</span>(data)

<span class="hl-cm"># 將文字內容依照換行分割成串列</span>
<span class="hl-nm">tasks</span> = data.<span class="hl-kw">splitlines</span>()

<span class="hl-cm"># 顯示開始處理訊息</span>
<span class="hl-kw">print</span>(<span class="hl-st">"開始處理任務："</span>)

<span class="hl-cm"># 依序處理每一項任務</span>
<span class="hl-kw">for</span> <span class="hl-nm">task</span> <span class="hl-kw">in</span> <span class="hl-nm">tasks</span>:
    <span class="hl-kw">print</span>(<span class="hl-st">"正在處理："</span>, <span class="hl-nm">task</span>)

<span class="hl-cm"># 關閉檔案</span>
file.<span class="hl-kw">close</span>()

<span class="hl-cm"># 顯示完成訊息</span>
<span class="hl-kw">print</span>(<span class="hl-st">"所有任務處理完成"</span>)</pre>
                </div>
                <div class="output-wrap" style="margin-top:10px">
                    <div class="output-label">執行結果</div>
                    <div class="output-block">讀取到的任務內容：
檢查資料
整理報表
寄送通知
更新系統
備份資料
開始處理任務：
正在處理： 檢查資料
正在處理： 整理報表
正在處理： 寄送通知
正在處理： 更新系統
正在處理： 備份資料
所有任務處理完成</div>
                </div>
            </div>
        </div>

        <h2 id="section5-2">2. 異常處理與模組</h2>

        <h3>重點語法</h3>

        <h4>(一) 什麼是異常處理（Exception）？</h4>
        <p>
            在程式執行時，有時可能會發生錯誤，例如：<br>
            • 使用者輸入錯誤資料<br>
            • 找不到檔案<br>
            • 數字除以 0<br><br>
            這些錯誤稱為「異常（Exception）」。<br>
            如果沒有處理錯誤，程式可能會直接停止。
        </p>

        <h4>(二) try-except 錯誤處理</h4>
        <p><strong>基本語法</strong></p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-kw">try</span>:
    可能發生錯誤的程式

<span class="hl-kw">except</span>:
    發生錯誤時執行</pre>
        </div>
        <p><strong>範例程式</strong></p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-cm"># 先執行 try 內的程式。如果 try 內的程式執行上都沒有錯誤，</span>
<span class="hl-cm"># 能夠正常執行完成，就不會跳到 except 內執行 except 區塊的程式碼</span>
<span class="hl-kw">try</span>:
    <span class="hl-nm">num</span> = <span class="hl-kw">int</span>(<span class="hl-kw">input</span>(<span class="hl-st">"請輸入數字: "</span>))
    <span class="hl-kw">print</span>(num)

<span class="hl-cm"># 如果有發生錯誤的話，才會跳到 except 內，顯示「輸入錯誤」訊息</span>
<span class="hl-kw">except</span>:
    <span class="hl-kw">print</span>(<span class="hl-st">"輸入錯誤"</span>)</pre>
        </div>
        <div class="logic-block">
            <div class="logic-label">程式邏輯說明</div>
            <p>① 先執行 try 內的程式</p>
            <p>② 如果沒有錯誤 → 正常執行完成</p>
            <p>③ 如果有發生錯誤 → 跳到 except → 顯示錯誤訊息</p>
        </div>

        <h4>(三) 常見錯誤情況</h4>
        <table>
            <tr><th>錯誤情況</th><th>說明</th></tr>
            <tr><td>輸入文字轉數字失敗</td><td><code>int("abc")</code></td></tr>
            <tr><td>除以 0</td><td><code>10 / 0</code></td></tr>
            <tr><td>找不到檔案</td><td>開啟不存在的檔案</td></tr>
        </table>

        <h4>(四) 模組（Module）</h4>
        <p>
            模組就是：👉 別人已經寫好的功能工具箱。<br>
            Python 可以直接匯入使用。
        </p>
        <p><strong>基本語法：</strong></p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-kw">import</span> time</pre>
        </div>
        <div class="logic-block">
            <div class="logic-label">程式邏輯說明</div>
            <p>代表匯入 time 模組，之後就可以使用 time 裡面所有的功能。</p>
        </div>

        <h4>(五) 使用模組功能</h4>
        <p>匯入後，可以使用模組中的功能。如下程式碼：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-kw">import</span> time

time.<span class="hl-kw">sleep</span>(<span class="hl-nu">1</span>)</pre>
        </div>
        <div class="logic-block">
            <div class="logic-label">程式邏輯說明</div>
            <p><code>sleep(1)</code> 代表程式暫停 1 秒。</p>
        </div>

        <h4>(六) try-except 流程圖</h4>
        <div class="logic-block">
            <div class="logic-label">try-except 流程</div>
            <p>try 執行程式　→　程式是否錯誤？</p>
            <p>　　是 → except → 顯示錯誤訊息</p>
            <p>　　否 → 正常執行原來的程式碼</p>
        </div>

        <hr>

        <h3>範例程式說明</h3>

        <div class="example-wrap">
            <div class="example-head">範例 (一)：輸入錯誤處理練習</div>
            <div class="example-body">
                <p>請撰寫一段程式，完成以下功能：</p>
                <ol>
                    <li>匯入 time 模組</li>
                    <li>讓使用者輸入一個數字，作為程式的處理資料</li>
                    <li>使用 try-except 進行錯誤處理</li>
                    <li>如果輸入正確：將輸入的數字進行處理、暫停 0.5 秒模擬資料處理時間、顯示「資料處理成功」</li>
                    <li>如果輸入錯誤：顯示「輸入錯誤，請輸入數字」</li>
                </ol>
                <div class="code-block" style="margin-top:14px">
                    <div class="code-block-header">
                        <div class="code-block-dots">
                            <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                        </div>
                        <span class="code-block-lang">參考程式</span>
                    </div>
                    <pre><span class="hl-cm"># 【第 1 題】</span>
<span class="hl-cm"># 匯入 time 模組</span>
<span class="hl-cm"># 功能：模擬程式處理資料所需的時間</span>
<span class="hl-kw">import</span> time

<span class="hl-cm"># 【第 3 題】</span>
<span class="hl-cm"># 使用 try-except 進行錯誤處理</span>
<span class="hl-kw">try</span>:
    <span class="hl-cm"># 【第 2 題】</span>
    <span class="hl-cm"># 讓使用者輸入數字</span>
    <span class="hl-cm"># input() 預設取得的是字串</span>
    <span class="hl-cm"># 因此使用 int() 將資料轉換成整數</span>
    <span class="hl-nm">num</span> = <span class="hl-kw">int</span>(<span class="hl-kw">input</span>(<span class="hl-st">"請輸入一個數字："</span>))

    <span class="hl-cm"># 【第 4 題】顯示目前輸入的資料</span>
    <span class="hl-kw">print</span>(<span class="hl-st">"正在處理資料："</span>, <span class="hl-nm">num</span>)

    <span class="hl-cm"># 模擬程式進行資料處理，暫停 0.5 秒</span>
    time.<span class="hl-kw">sleep</span>(<span class="hl-nu">0.5</span>)

    <span class="hl-cm"># 將輸入的數字進行簡單運算，例如將數字乘以 2</span>
    <span class="hl-nm">result</span> = <span class="hl-nm">num</span> * <span class="hl-nu">2</span>

    <span class="hl-cm"># 顯示處理結果</span>
    <span class="hl-kw">print</span>(<span class="hl-st">"處理結果："</span>, <span class="hl-nm">result</span>)

    <span class="hl-cm"># 顯示成功訊息</span>
    <span class="hl-kw">print</span>(<span class="hl-st">"資料處理成功"</span>)

<span class="hl-cm"># 【第 5 題】如果輸入的資料無法轉換為整數，例如輸入文字 abc</span>
<span class="hl-kw">except</span>:
    <span class="hl-kw">print</span>(<span class="hl-st">"輸入錯誤，請輸入數字"</span>)</pre>
                </div>
                <div class="output-wrap" style="margin-top:10px">
                    <div class="output-label">執行結果 1（若輸入正確，假設輸入 5）</div>
                    <div class="output-block">正在處理資料：5
處理結果：10
資料處理成功</div>
                </div>
                <div class="output-wrap">
                    <div class="output-label">執行結果 2（若輸入錯誤，假設輸入 abc）</div>
                    <div class="output-block">輸入錯誤，請輸入數字</div>
                </div>
            </div>
        </div>

        <div class="example-wrap">
            <div class="example-head">範例 (二)：錯誤輸入保護＋依序處理資料</div>
            <div class="example-body">
                <p>請撰寫一段程式，完成以下功能：</p>
                <ol>
                    <li>匯入 time 模組</li>
                    <li>使用 try-except 保護使用者輸入</li>
                    <li>讓使用者輸入一個數字，作為每筆資料的處理間隔</li>
                    <li>如果輸入正確：設定處理間隔時間（輸入數字 × 0.5），依序處理串列中的所有資料</li>
                    <li>如果輸入錯誤：顯示「輸入錯誤，請輸入數字」</li>
                </ol>
                <div class="code-block" style="margin-top:14px">
                    <div class="code-block-header">
                        <div class="code-block-dots">
                            <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                        </div>
                        <span class="code-block-lang">參考程式</span>
                    </div>
                    <pre><span class="hl-cm"># 【第 1 題】匯入 time 模組</span>
<span class="hl-cm"># 功能：控制每筆資料處理之間的時間間隔</span>
<span class="hl-kw">import</span> time

<span class="hl-cm"># 建立待處理資料串列</span>
<span class="hl-nm">data_list</span> = [
    <span class="hl-st">"A102"</span>, <span class="hl-st">"B205"</span>, <span class="hl-st">"A317"</span>,
    <span class="hl-st">"C408"</span>, <span class="hl-st">"B512"</span>, <span class="hl-st">"A623"</span>,
    <span class="hl-st">"C731"</span>, <span class="hl-st">"B846"</span>, <span class="hl-st">"A954"</span>
]

<span class="hl-cm"># 【第 2 題】使用 try-except 保護輸入錯誤</span>
<span class="hl-kw">try</span>:
    <span class="hl-cm"># 【第 3 題】讓使用者輸入資料處理速度</span>
    <span class="hl-cm"># input() 取得的是字串，因此使用 int() 轉換成整數</span>
    <span class="hl-nm">num</span> = <span class="hl-kw">int</span>(<span class="hl-kw">input</span>(<span class="hl-st">"請輸入處理速度（數字）："</span>))

    <span class="hl-cm"># 計算每筆資料的處理間隔</span>
    <span class="hl-cm"># 例如輸入 2，處理間隔為 2 × 0.5 = 1.0 秒</span>
    <span class="hl-nm">interval</span> = <span class="hl-nm">num</span> * <span class="hl-nu">0.5</span>

    <span class="hl-cm"># 顯示目前設定的處理間隔</span>
    <span class="hl-kw">print</span>(<span class="hl-st">"開始處理資料，處理間隔為："</span>, <span class="hl-nm">interval</span>, <span class="hl-st">"秒"</span>)

    <span class="hl-cm"># 【第 4 題】使用 for 迴圈依序處理所有資料</span>
    <span class="hl-kw">for</span> <span class="hl-nm">item</span> <span class="hl-kw">in</span> <span class="hl-nm">data_list</span>:
        <span class="hl-cm"># 顯示目前正在處理的資料</span>
        <span class="hl-kw">print</span>(<span class="hl-st">"正在處理資料："</span>, <span class="hl-nm">item</span>)
        <span class="hl-cm"># 暫停指定的時間，模擬每筆資料需要一定的處理時間</span>
        time.<span class="hl-kw">sleep</span>(<span class="hl-nm">interval</span>)
        <span class="hl-cm"># 顯示該筆資料處理完成</span>
        <span class="hl-kw">print</span>(<span class="hl-nm">item</span>, <span class="hl-st">"處理完成"</span>)

<span class="hl-cm"># 【第 5 題】輸入錯誤處理</span>
<span class="hl-cm"># 如果輸入的內容無法轉換成整數，例如輸入 abc</span>
<span class="hl-kw">except</span>:
    <span class="hl-kw">print</span>(<span class="hl-st">"輸入錯誤，請輸入數字"</span>)</pre>
                </div>
                <div class="output-wrap" style="margin-top:10px">
                    <div class="output-label">執行結果 1（若正確輸入，假設輸入 2）</div>
                    <div class="output-block">開始處理資料，處理間隔為：1.0 秒
正在處理資料：A102
A102 處理完成
正在處理資料：B205
B205 處理完成
正在處理資料：A317
A317 處理完成
...
程式會繼續依序處理：
A102 → B205 → A317 → C408 → B512 → A623 → C731 → B846 → A954</div>
                </div>
                <div class="output-wrap">
                    <div class="output-label">執行結果 2（若錯誤輸入，假設輸入 abc）</div>
                    <div class="output-block">輸入錯誤，請輸入數字</div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection