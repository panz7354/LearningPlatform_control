@extends('layouts.app')

@section('style')
    @include('layouts._lesson-styles')
@endsection

@section('content')
<div class="lesson-wrap" data-chapter="5">

    {{-- ===== 標題列 ===== --}}
    <div class="lesson-header">
        <h1>第 5 章　檔案、異常處理與模組</h1>
        <div class="audio-wrap">
            <span>範例音檔</span>
            <audio controls>
                <source src="{{ asset('audio/5_Alice.mp3') }}" type="audio/mpeg">
                您的瀏覽器不支援播放
            </audio>
        </div>
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

        <div class="music-card">
            <span class="music-card-icon">🎵</span>
            <div class="music-card-body">
                <p class="music-card-title">常用情境小舉例</p>
                <p>可以把《小星星》的音符：<br>
                C(do) C(do) G(sol) G(sol) A(la) A(la) G(sol)<br>
                存到文字檔中，之後再讓程式讀取並播放旋律。</p>
            </div>
        </div>

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

        <div class="music-card">
            <span class="music-card-icon">🎵</span>
            <div class="music-card-body">
                <p class="music-card-title">音樂情境理解</p>
                <p>假設有一份「音樂歌詞本」：<br><br>
                <strong>"r" 讀取模式</strong>　👉 把歌詞打開來看<br>
                <strong>"w" 寫入模式</strong>　👉 把原本歌詞全部擦掉重新寫<br>
                <strong>"a" 附加模式</strong>　👉 在最後再加一段新歌詞</p>
            </div>
        </div>

        <h4>(四) 讀取檔案內容</h4>
        <p>使用 <code>read()</code> 可以一次讀取全部內容。如下程式碼：</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">file</span> = <span class="hl-kw">open</span>(<span class="hl-st">"music.txt"</span>, <span class="hl-st">"r"</span>)  <span class="hl-cm"># 開啟檔案</span>
<span class="hl-nm">data</span> = file.<span class="hl-kw">read</span>()              <span class="hl-cm"># 讀取內容存入 data</span>
<span class="hl-kw">print</span>(data)                      <span class="hl-cm"># 顯示內容</span></pre>
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
            <pre><span class="hl-nm">file</span> = <span class="hl-kw">open</span>(<span class="hl-st">"music.txt"</span>, <span class="hl-st">"w"</span>)  <span class="hl-cm"># 開啟（寫入模式）</span>
file.<span class="hl-kw">write</span>(<span class="hl-st">"C D E F G"</span>)          <span class="hl-cm"># 把文字寫入檔案</span></pre>
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
            <p>就像 🎵 音樂播放器播放完歌曲後要記得關掉。</p>
            <p>否則可能：資料沒有正確儲存、檔案被占用、程式發生錯誤。</p>
        </div>

        <h4>(七) 完整檔案處理流程</h4>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-cm"># 開啟檔案（寫入模式）</span>
<span class="hl-nm">file</span> = <span class="hl-kw">open</span>(<span class="hl-st">"music.txt"</span>, <span class="hl-st">"w"</span>)

<span class="hl-cm"># 寫入內容</span>
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
                    <pre><span class="hl-cm"># 【第1題】開啟 music.txt（寫入模式）</span>
<span class="hl-nm">file</span> = <span class="hl-kw">open</span>(<span class="hl-st">"music.txt"</span>, <span class="hl-st">"w"</span>)

<span class="hl-cm"># 【第2題】寫入《小星星》前四個音符</span>
file.<span class="hl-kw">write</span>(<span class="hl-st">"C C G G"</span>)

<span class="hl-cm"># 【第3題】關閉檔案，確保資料正確儲存</span>
file.<span class="hl-kw">close</span>()

<span class="hl-cm"># 【第4題】顯示完成訊息</span>
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
            <div class="example-head">範例 (二)：播放《給愛麗絲》旋律</div>
            <div class="example-body">
                <img src="{{ asset('img/Alice.png') }}" alt="給愛麗絲五線譜">
                <p>
                    此行五線譜是《給愛麗絲》的第一句旋律，此行音符為 Mi(高) Re(高) Mi(高) Re(高) Mi(高) Si Re(高) Do(高) La<br><br>
                    請撰寫一段程式，完成以下功能：
                </p>
                <ol>
                    <li>開啟檔案 music.txt</li>
                    <li>讀取檔案中的旋律內容</li>
                    <li>顯示讀取到的旋律</li>
                    <li>播放《給愛麗絲》第一句旋律</li>
                    <li>關閉檔案</li>
                </ol>
                <div class="hint-block">
                    <div class="hint-label">前置準備</div>
                    <p>📌 事先建立 music.txt 檔案，並貼上以下內容後存檔：</p>
                    <p><code>E_high D_high E_high D_high E_high B D_high C_high A</code></p>
                    <p>音符對應：Mi(高)=E_high=76　Re(高)=D_high=74　Si=B=71　Do(高)=C_high=72　La=A=69</p>
                </div>
                <div class="code-block" style="margin-top:14px">
                    <div class="code-block-header">
                        <div class="code-block-dots">
                            <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                        </div>
                        <span class="code-block-lang">參考程式</span>
                    </div>
                    <pre><span class="hl-kw">import</span> time
<span class="hl-kw">import</span> pygame.midi

pygame.midi.<span class="hl-kw">init</span>()
<span class="hl-nm">player</span> = pygame.midi.<span class="hl-kw">Output</span>(<span class="hl-nu">0</span>)
player.<span class="hl-kw">set_instrument</span>(<span class="hl-nu">0</span>)

<span class="hl-nm">note_map</span> = {
    <span class="hl-st">"E_high"</span>: <span class="hl-nu">76</span>,   <span class="hl-cm"># 高音 Mi</span>
    <span class="hl-st">"D_high"</span>: <span class="hl-nu">74</span>,   <span class="hl-cm"># 高音 Re</span>
    <span class="hl-st">"B"</span>: <span class="hl-nu">71</span>,        <span class="hl-cm"># Si</span>
    <span class="hl-st">"C_high"</span>: <span class="hl-nu">72</span>,   <span class="hl-cm"># 高音 Do</span>
    <span class="hl-st">"A"</span>: <span class="hl-nu">69</span>         <span class="hl-cm"># La</span>
}

<span class="hl-cm"># 【第1題】開啟檔案（讀取模式）</span>
<span class="hl-nm">file</span> = <span class="hl-kw">open</span>(<span class="hl-st">"music.txt"</span>, <span class="hl-st">"r"</span>)

<span class="hl-cm"># 【第2題】讀取檔案內容</span>
<span class="hl-nm">data</span> = file.<span class="hl-kw">read</span>()

<span class="hl-cm"># 【第3題】顯示讀取到的旋律</span>
<span class="hl-kw">print</span>(<span class="hl-st">"讀取到的旋律："</span>)
<span class="hl-kw">print</span>(data)

<span class="hl-cm"># 將字串切割成串列</span>
<span class="hl-cm"># "E_high D_high ..." → ["E_high", "D_high", ...]</span>
<span class="hl-nm">melody</span> = data.<span class="hl-kw">split</span>()
<span class="hl-nm">beat</span> = <span class="hl-nu">0.5</span>

<span class="hl-cm"># 【第4題】依序播放旋律</span>
<span class="hl-kw">for</span> note <span class="hl-kw">in</span> melody:
    <span class="hl-nm">midi_num</span> = note_map[note]
    player.<span class="hl-kw">note_on</span>(midi_num, <span class="hl-nu">100</span>)
    time.<span class="hl-kw">sleep</span>(beat)
    player.<span class="hl-kw">note_off</span>(midi_num, <span class="hl-nu">100</span>)

<span class="hl-cm"># 【第5題】關閉檔案</span>
file.<span class="hl-kw">close</span>()</pre>
                </div>
                <div class="output-wrap" style="margin-top:10px">
                    <div class="output-label">執行結果</div>
                    <div class="output-block">讀取到的旋律：
E_high D_high E_high D_high E_high B D_high C_high A

接著程式會依序播放：
Mi(高) → Re(高) → Mi(高) → Re(高)
→ Mi(高) → Si → Re(高) → Do(高) → La

也就是《給愛麗絲》的第一句旋律 🎵</div>
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

        <div class="music-card">
            <span class="music-card-icon">🎵</span>
            <div class="music-card-body">
                <p class="music-card-title">音樂情境理解</p>
                <p>就像音樂播放器：<br>
                • 如果音樂檔不存在<br>
                • 或輸入錯誤音符<br><br>
                播放器可能無法播放。<br>
                因此我們需要「錯誤處理機制」，讓程式即使發生問題，也不會直接當掉。</p>
            </div>
        </div>

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
            <pre><span class="hl-cm"># try 內正常執行完 → 不會跳到 except</span>
<span class="hl-kw">try</span>:
    <span class="hl-nm">num</span> = <span class="hl-kw">int</span>(<span class="hl-kw">input</span>(<span class="hl-st">"請輸入數字: "</span>))
    <span class="hl-kw">print</span>(num)

<span class="hl-cm"># 有錯誤才會跳到 except，顯示錯誤訊息</span>
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
        <p>
            • <strong>輸入文字轉數字失敗</strong>：例如 <code>int("abc")</code><br>
            • <strong>除以 0</strong>：例如 <code>10 / 0</code><br>
            • <strong>找不到檔案</strong>：開啟不存在的檔案
        </p>

        <div class="music-card">
            <span class="music-card-icon">🎵</span>
            <div class="music-card-body">
                <p class="music-card-title">音樂情境理解</p>
                <p>例如：<code>note = int("Do")</code><br>
                因為 "Do" 不是數字，所以會發生錯誤。<br>
                這時可以使用 try-except 避免程式停止。</p>
            </div>
        </div>

        <h4>(四) 模組（Module）</h4>
        <p>
            模組就是：👉 別人已經寫好的功能工具箱。<br>
            Python 可以直接匯入使用。
        </p>
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

        <div class="music-card">
            <span class="music-card-icon">🎵</span>
            <div class="music-card-body">
                <p class="music-card-title">音樂情境理解</p>
                <p>播放音樂時：<code>time.sleep(0.5)</code><br>
                代表：🎵 每個音符持續 0.5 秒。<br><br>
                如果沒有 sleep()：音樂會瞬間播完。</p>
            </div>
        </div>

        <h4>(六) pygame.midi 模組</h4>
        <p>Python 可以使用 pygame.midi 播放音樂。</p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-kw">import</span> pygame.midi

pygame.midi.<span class="hl-kw">init</span>()                      <span class="hl-cm"># 初始化 MIDI</span>
<span class="hl-nm">player</span> = pygame.midi.<span class="hl-kw">Output</span>(<span class="hl-nu">0</span>)         <span class="hl-cm"># 建立播放器</span>
player.<span class="hl-kw">note_on</span>(<span class="hl-nu">60</span>, <span class="hl-nu">100</span>)               <span class="hl-cm"># 播放音符</span>
player.<span class="hl-kw">note_off</span>(<span class="hl-nu">60</span>, <span class="hl-nu">100</span>)              <span class="hl-cm"># 停止音符</span></pre>
        </div>
        <div class="logic-block">
            <div class="logic-label">MIDI 數字簡單對照</div>
            <p>Do（C）= 60　　Re（D）= 62　　Mi（E）= 64　　Sol（G）= 67</p>
        </div>
        <div class="logic-block">
            <div class="logic-label">try-except 流程</div>
            <p>try 執行程式　→　程式是否錯誤？</p>
            <p>　　是 → except → 顯示錯誤訊息</p>
            <p>　　否 → 正常執行完成</p>
        </div>

        <hr>

        <h3>範例程式說明</h3>

        <div class="example-wrap">
            <div class="example-head">範例 (一)：輸入錯誤處理練習 🎵</div>
            <div class="example-body">
                <p>請撰寫一段程式，完成以下功能：</p>
                <ol>
                    <li>匯入 pygame.midi 與 time 模組</li>
                    <li>讓使用者輸入一個數字</li>
                    <li>使用 try-except 進行錯誤處理</li>
                    <li>如果輸入正確：播放音符 So（G）並顯示「播放音樂成功」</li>
                    <li>如果輸入錯誤：顯示「輸入錯誤，請輸入數字」</li>
                </ol>
                <div class="hint-block">
                    <div class="hint-label">提示</div>
                    <p>• So = G = 67 🎵</p>
                </div>
                <div class="code-block" style="margin-top:14px">
                    <div class="code-block-header">
                        <div class="code-block-dots">
                            <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                        </div>
                        <span class="code-block-lang">參考程式</span>
                    </div>
                    <pre><span class="hl-cm"># 【第1題】匯入模組</span>
<span class="hl-kw">import</span> time
<span class="hl-kw">import</span> pygame.midi

pygame.midi.<span class="hl-kw">init</span>()
<span class="hl-nm">player</span> = pygame.midi.<span class="hl-kw">Output</span>(<span class="hl-nu">0</span>)
player.<span class="hl-kw">set_instrument</span>(<span class="hl-nu">0</span>)

<span class="hl-nm">note_map</span> = { <span class="hl-st">"G"</span>: <span class="hl-nu">67</span> }  <span class="hl-cm"># So</span>

<span class="hl-cm"># 【第3題】try-except 錯誤處理</span>
<span class="hl-kw">try</span>:
    <span class="hl-cm"># 【第2題】讓使用者輸入數字</span>
    <span class="hl-nm">num</span> = <span class="hl-kw">int</span>(<span class="hl-kw">input</span>(<span class="hl-st">"請輸入一個數字: "</span>))

    <span class="hl-cm"># 【第4題】播放 So（G）</span>
    <span class="hl-nm">midi_num</span> = note_map[<span class="hl-st">"G"</span>]
    player.<span class="hl-kw">note_on</span>(midi_num, <span class="hl-nu">100</span>)
    time.<span class="hl-kw">sleep</span>(<span class="hl-nu">0.5</span>)
    player.<span class="hl-kw">note_off</span>(midi_num, <span class="hl-nu">100</span>)
    <span class="hl-kw">print</span>(<span class="hl-st">"播放音樂成功 🎵"</span>)

<span class="hl-cm"># 【第5題】輸入錯誤處理</span>
<span class="hl-kw">except</span>:
    <span class="hl-kw">print</span>(<span class="hl-st">"輸入錯誤，請輸入數字 ❌"</span>)</pre>
                </div>
                <div class="output-wrap" style="margin-top:10px">
                    <div class="output-label">執行結果 1（輸入正確）</div>
                    <div class="output-block">請輸入一個數字: 5
播放音樂成功 🎵
並播放：So（G）</div>
                </div>
                <div class="output-wrap">
                    <div class="output-label">執行結果 2（輸入錯誤）</div>
                    <div class="output-block">請輸入一個數字: abc
輸入錯誤，請輸入數字 ❌</div>
                </div>
            </div>
        </div>

        <div class="example-wrap">
            <div class="example-head">範例 (二)：錯誤輸入保護 + 播放《給愛麗絲》🎵</div>
            <div class="example-body">
                <img src="{{ asset('img/Alice.png') }}" alt="給愛麗絲五線譜">
                <p>
                    此行五線譜是《給愛麗絲》的第一句旋律，此行音符為 Mi(高) Re(高) Mi(高) Re(高) Mi(高) Si Re(高) Do(高) La<br><br>
                    請撰寫一段程式，完成以下功能：
                </p>
                <ol>
                    <li>匯入 time 與 pygame.midi 模組</li>
                    <li>使用 try-except 保護使用者輸入</li>
                    <li>讓使用者輸入一個數字（播放速度）</li>
                    <li>如果輸入正確：設定節拍時間（數字 × 0.5），並播放《給愛麗絲》第一句旋律</li>
                    <li>如果輸入錯誤：顯示「輸入錯誤，請輸入數字」</li>
                </ol>
                <div class="hint-block">
                    <div class="hint-label">音符對應</div>
                    <p>• Mi(高) = E_high = 76　　Re(高) = D_high = 74</p>
                    <p>• Si = B = 71　　Do(高) = C_high = 72　　La = A = 69</p>
                </div>
                <div class="code-block" style="margin-top:14px">
                    <div class="code-block-header">
                        <div class="code-block-dots">
                            <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                        </div>
                        <span class="code-block-lang">參考程式</span>
                    </div>
                    <pre><span class="hl-cm"># 【第1題】匯入模組</span>
<span class="hl-kw">import</span> time
<span class="hl-kw">import</span> pygame.midi

pygame.midi.<span class="hl-kw">init</span>()
<span class="hl-nm">player</span> = pygame.midi.<span class="hl-kw">Output</span>(<span class="hl-nu">0</span>)
player.<span class="hl-kw">set_instrument</span>(<span class="hl-nu">0</span>)

<span class="hl-nm">note_map</span> = {
    <span class="hl-st">"E_high"</span>: <span class="hl-nu">76</span>,   <span class="hl-cm"># Mi(高)</span>
    <span class="hl-st">"D_high"</span>: <span class="hl-nu">74</span>,   <span class="hl-cm"># Re(高)</span>
    <span class="hl-st">"B"</span>: <span class="hl-nu">71</span>,        <span class="hl-cm"># Si</span>
    <span class="hl-st">"C_high"</span>: <span class="hl-nu">72</span>,   <span class="hl-cm"># Do(高)</span>
    <span class="hl-st">"A"</span>: <span class="hl-nu">69</span>         <span class="hl-cm"># La</span>
}

<span class="hl-cm"># 給愛麗絲第一句旋律</span>
<span class="hl-nm">melody</span> = [<span class="hl-st">"E_high"</span>, <span class="hl-st">"D_high"</span>, <span class="hl-st">"E_high"</span>, <span class="hl-st">"D_high"</span>,
          <span class="hl-st">"E_high"</span>, <span class="hl-st">"B"</span>, <span class="hl-st">"D_high"</span>, <span class="hl-st">"C_high"</span>, <span class="hl-st">"A"</span>]

<span class="hl-cm"># 【第2題】try-except 保護輸入</span>
<span class="hl-kw">try</span>:
    <span class="hl-cm"># 【第3題】讓使用者輸入播放速度</span>
    <span class="hl-nm">num</span> = <span class="hl-kw">int</span>(<span class="hl-kw">input</span>(<span class="hl-st">"請輸入播放速度（數字）: "</span>))
    <span class="hl-nm">beat</span> = num * <span class="hl-nu">0.5</span>
    <span class="hl-kw">print</span>(<span class="hl-st">"開始播放《給愛麗絲》🎵，節拍為:"</span>, beat)

    <span class="hl-cm"># 【第4題】依序播放旋律</span>
    <span class="hl-kw">for</span> note <span class="hl-kw">in</span> melody:
        <span class="hl-nm">midi_num</span> = note_map[note]
        player.<span class="hl-kw">note_on</span>(midi_num, <span class="hl-nu">100</span>)
        time.<span class="hl-kw">sleep</span>(beat)
        player.<span class="hl-kw">note_off</span>(midi_num, <span class="hl-nu">100</span>)

<span class="hl-cm"># 【第5題】輸入錯誤處理</span>
<span class="hl-kw">except</span>:
    <span class="hl-kw">print</span>(<span class="hl-st">"輸入錯誤，請輸入數字 ❌"</span>)</pre>
                </div>
                <div class="output-wrap" style="margin-top:10px">
                    <div class="output-label">執行結果 1（輸入正確）</div>
                    <div class="output-block">請輸入播放速度（數字）: 2
開始播放《給愛麗絲》🎵，節拍為: 1.0

並播放：
Mi(高) → Re(高) → Mi(高) → Re(高)
→ Mi(高) → Si → Re(高) → Do(高) → La</div>
                </div>
                <div class="output-wrap">
                    <div class="output-label">執行結果 2（輸入錯誤）</div>
                    <div class="output-block">請輸入播放速度（數字）: abc
輸入錯誤，請輸入數字 ❌</div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
