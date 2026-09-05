@extends('layouts.app')

@section('style')
    @include('layouts._lesson-styles')
@endsection

@section('content')
<div class="lesson-wrap" data-chapter="3">

    {{-- ===== 標題列 ===== --}}
    <div class="lesson-header">
        <h1>第 3 章　函數</h1>
        <div class="audio-wrap">
            <span>範例音檔</span>
            <audio controls>
                <source src="{{ asset('audio/3_HBD.mp3') }}" type="audio/mpeg">
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

        <div class="music-card">
            <span class="music-card-icon">🎵</span>
            <div class="music-card-body">
                <p class="music-card-title">音樂情境小舉例</p>
                <p>假設我們有一個功能：👉 播放 Do 音<br>
                如果每次都要重新撰寫播放程式會很麻煩。<br>
                因此可以建立一個函數：</p>
                <pre><span class="hl-kw">def</span> <span class="hl-nm">play_do</span>():
    <span class="hl-kw">print</span>(<span class="hl-st">"播放 Do 🎵"</span>)</pre>
                <p>之後只要呼叫函數：<code>play_do()</code><br>
                就能執行播放 Do 音的功能。</p>
            </div>
        </div>

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

        <p><strong>2. 呼叫函數：</strong>函數建立後不會立刻執行，必須呼叫它才會運作。</p>

        <div class="music-card">
            <span class="music-card-icon">🎵</span>
            <div class="music-card-body">
                <p class="music-card-title">音樂情境小舉例</p>
                <p>建立函數：</p>
                <pre><span class="hl-kw">def</span> <span class="hl-nm">play_music</span>():
    <span class="hl-kw">print</span>(<span class="hl-st">"播放音樂 🎵"</span>)</pre>
                <p>呼叫函數：</p>
                <pre><span class="hl-nm">play_music</span>()</pre>
                <div class="output-wrap" style="margin-top:6px">
                    <div class="output-label">執行結果</div>
                    <div class="output-block">播放音樂 🎵</div>
                </div>
            </div>
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

        <div class="music-card">
            <span class="music-card-icon">🎵</span>
            <div class="music-card-body">
                <p class="music-card-title">音樂情境小舉例</p>
                <p>1. 建立函數：</p>
                <pre><span class="hl-kw">def</span> <span class="hl-nm">play_note</span>(note):
    <span class="hl-kw">print</span>(<span class="hl-st">"播放音符："</span> + note)</pre>
                <p>2. 呼叫函數：</p>
                <pre><span class="hl-nm">play_note</span>(<span class="hl-st">"Do"</span>)
<span class="hl-nm">play_note</span>(<span class="hl-st">"Mi"</span>)</pre>
                <div class="output-wrap" style="margin-top:6px">
                    <div class="output-label">執行結果</div>
                    <div class="output-block">播放音符：Do
播放音符：Mi</div>
                </div>
                <p>同一個函數，可以播放不同音符。</p>
            </div>
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

        <div class="music-card">
            <span class="music-card-icon">🎵</span>
            <div class="music-card-body">
                <p class="music-card-title">音樂情境小舉例</p>
                <p>假設函數需要接收兩個音符：</p>
                <pre><span class="hl-kw">def</span> <span class="hl-nm">play_two_notes</span>(note1, note2):
    <span class="hl-kw">print</span>(note1)
    <span class="hl-kw">print</span>(note2)

<span class="hl-nm">play_two_notes</span>(<span class="hl-st">"Do"</span>, <span class="hl-st">"Re"</span>)</pre>
                <div class="output-wrap" style="margin-top:6px">
                    <div class="output-label">執行結果</div>
                    <div class="output-block">Do
Re</div>
                </div>
            </div>
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

<span class="hl-nm">result</span> = add(<span class="hl-nu">3</span>, <span class="hl-nu">5</span>)</pre>
        </div>
        <div class="logic-block">
            <div class="logic-label">程式邏輯說明</div>
            <p>函數執行後，先計算 a + b = 8，得出 8。</p>
            <p>這個 8 透過 <code>return</code> 回傳，再被存入 <code>result</code> 變數。</p>
        </div>

        <div class="music-card">
            <span class="music-card-icon">🎵</span>
            <div class="music-card-body">
                <p class="music-card-title">音樂情境小舉例</p>
                <p>先建立函數：</p>
                <pre><span class="hl-kw">def</span> <span class="hl-nm">get_note</span>():
    <span class="hl-kw">return</span> <span class="hl-st">"Do"</span></pre>
                <p>再呼叫函數：</p>
                <pre><span class="hl-nm">note</span> = get_note()
<span class="hl-kw">print</span>(note)</pre>
                <div class="output-wrap" style="margin-top:6px">
                    <div class="output-label">執行結果</div>
                    <div class="output-block">Do</div>
                </div>
                <p><code>note</code> 裡面會存放 Do，因此輸出：Do</p>
            </div>
        </div>

        <hr>

        <h3>範例程式說明</h3>

        <div class="example-wrap">
            <div class="example-head">範例 (一)：使用函數顯示加總結果</div>
            <div class="example-body">
                <p>請撰寫一段程式，完成以下功能：</p>
                <ol>
                    <li>定義一個函數 add(a, b)</li>
                    <li>函數功能：計算兩個數字的加總並印出結果</li>
                    <li>讓使用者輸入兩個整數</li>
                    <li>呼叫函數並傳入這兩個數字</li>
                </ol>
                <div class="hint-block">
                    <div class="hint-label">提示</div>
                    <p>• def：定義函數</p>
                    <p>• 參數：a, b</p>
                    <p>• 呼叫函數：add(num1, num2)</p>
                    <p>• int()：將字串型態轉換為整數型態</p>
                </div>
                <div class="code-block" style="margin-top:14px">
                    <div class="code-block-header">
                        <div class="code-block-dots">
                            <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                        </div>
                        <span class="code-block-lang">參考程式</span>
                    </div>
                    <pre><span class="hl-cm"># 【第1題】定義函數 add(a, b)</span>
<span class="hl-cm"># a、b 為參數，用來接收外部傳入的兩個數字</span>
<span class="hl-kw">def</span> <span class="hl-nm">add</span>(a, b):
    <span class="hl-cm"># 【第2題】計算加總並存入 result</span>
    <span class="hl-nm">result</span> = a + b
    <span class="hl-kw">print</span>(<span class="hl-st">"加總結果是:"</span>, result)

<span class="hl-cm"># 【第3題】讓使用者輸入兩個整數</span>
<span class="hl-nm">num1</span> = <span class="hl-kw">int</span>(<span class="hl-kw">input</span>(<span class="hl-st">"請輸入第一個數字: "</span>))
<span class="hl-nm">num2</span> = <span class="hl-kw">int</span>(<span class="hl-kw">input</span>(<span class="hl-st">"請輸入第二個數字: "</span>))

<span class="hl-cm"># 【第4題】呼叫函數，num1 → a，num2 → b</span>
<span class="hl-nm">add</span>(num1, num2)</pre>
                </div>
                <div class="output-wrap" style="margin-top:10px">
                    <div class="output-label">執行結果（假設輸入）</div>
                    <div class="output-block">請輸入第一個數字: 5
請輸入第二個數字: 8

加總結果是: 13</div>
                </div>
            </div>
        </div>

        <div class="example-wrap">
            <div class="example-head">範例 (二)：使用函數播放生日快樂旋律</div>
            <div class="example-body">
                <img src="{{ asset('img/HBD.png') }}" alt="生日快樂五線譜">
                <p>
                    此行五線譜是《生日快樂》的第一句旋律，此行音符為 Sol Sol La Sol Do(高) Si<br><br>
                    請撰寫一段程式，完成以下功能：
                </p>
                <ol>
                    <li>定義函數 play_note(note)</li>
                    <li>函數功能：接收音符並播放</li>
                    <li>呼叫函數播放旋律：G → G → A → G → 高音C → B</li>
                </ol>
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
    <span class="hl-st">"G"</span>:   <span class="hl-nu">67</span>,  <span class="hl-cm"># Sol</span>
    <span class="hl-st">"A"</span>:   <span class="hl-nu">69</span>,  <span class="hl-cm"># La</span>
    <span class="hl-st">"C_high"</span>: <span class="hl-nu">72</span>,  <span class="hl-cm"># 高音 Do</span>
    <span class="hl-st">"B"</span>:   <span class="hl-nu">71</span>   <span class="hl-cm"># Si</span>
}

<span class="hl-cm"># 【第1題】定義函數 play_note(note)</span>
<span class="hl-kw">def</span> <span class="hl-nm">play_note</span>(note):
    <span class="hl-cm"># 【第2題】取得 MIDI 數值並播放音符</span>
    <span class="hl-nm">midi_num</span> = note_map[note]
    player.<span class="hl-kw">note_on</span>(midi_num, <span class="hl-nu">100</span>)
    time.<span class="hl-kw">sleep</span>(<span class="hl-nu">0.5</span>)
    player.<span class="hl-kw">note_off</span>(midi_num, <span class="hl-nu">100</span>)

<span class="hl-cm"># 【第3題】依序呼叫函數播放《生日快樂》第一句</span>
<span class="hl-nm">play_note</span>(<span class="hl-st">"G"</span>)       <span class="hl-cm"># Sol</span>
<span class="hl-nm">play_note</span>(<span class="hl-st">"G"</span>)       <span class="hl-cm"># Sol</span>
<span class="hl-nm">play_note</span>(<span class="hl-st">"A"</span>)       <span class="hl-cm"># La</span>
<span class="hl-nm">play_note</span>(<span class="hl-st">"G"</span>)       <span class="hl-cm"># Sol</span>
<span class="hl-nm">play_note</span>(<span class="hl-st">"C_high"</span>) <span class="hl-cm"># 高音 Do</span>
<span class="hl-nm">play_note</span>(<span class="hl-st">"B"</span>)       <span class="hl-cm"># Si</span></pre>
                </div>
                <div class="output-wrap" style="margin-top:10px">
                    <div class="output-label">執行結果</div>
                    <div class="output-block">程式會依序播放：
Sol → Sol → La → Sol → Do(高) → Si

也就是《生日快樂》第一句旋律 🎵
Happy Birthday to You</div>
                </div>
            </div>
        </div>

        <h2 id="section3-2">2. 函數的進階應用</h2>

        <h3>重點語法</h3>

        <h4>(一) 參數預設值（Default Parameter）</h4>
        <p>
            有時候函數需要接收資料，但如果使用者沒有提供資料，函數也能先使用預設值。<br>
            就像老師上音樂課時說：👉「如果不知道要唱哪首歌，就先唱《小星星》。」<br>
            這個預先準備好的內容，就是「預設值」。
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

        <div class="music-card">
            <span class="music-card-icon">🎵</span>
            <div class="music-card-body">
                <p class="music-card-title">音樂情境小舉例</p>
                <pre><span class="hl-kw">def</span> <span class="hl-nm">play_song</span>(song=<span class="hl-st">"小星星"</span>):
    <span class="hl-kw">print</span>(<span class="hl-st">"播放："</span> + song)</pre>
                <p>呼叫：<code>play_song()</code> → 結果：播放：小星星</p>
                <p>呼叫：<code>play_song("生日快樂歌")</code> → 結果：播放：生日快樂歌</p>
            </div>
        </div>

        <h4>(二) 函數中呼叫函數</h4>
        <p>
            函數不只能自己工作，還可以請其他函數幫忙完成任務。<br>
            就像樂團演奏時：<br>
            🎹 鋼琴負責旋律<br>
            🥁 鼓負責節奏<br>
            大家一起合作完成歌曲。
        </p>
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
    <span class="hl-nm">result</span> = add(x, y)
    <span class="hl-kw">print</span>(<span class="hl-st">"結果是："</span>, result)

<span class="hl-nm">show_result</span>(<span class="hl-nu">3</span>, <span class="hl-nu">5</span>)</pre>
        </div>
        <div class="logic-block">
            <div class="logic-label">程式邏輯說明</div>
            <p><code>add()</code> 負責計算加法；<code>show_result()</code> 負責顯示結果。</p>
            <p>執行 <code>show_result(3, 5)</code> 時，會先呼叫 <code>add(3, 5)</code> 得到 8，再印出：結果是：8</p>
        </div>

        <div class="music-card">
            <span class="music-card-icon">🎵</span>
            <div class="music-card-body">
                <p class="music-card-title">音樂情境小舉例</p>
                <pre><span class="hl-kw">def</span> <span class="hl-nm">play_note</span>():
    <span class="hl-kw">print</span>(<span class="hl-st">"播放 Do"</span>)

<span class="hl-kw">def</span> <span class="hl-nm">play_song</span>():
    <span class="hl-nm">play_note</span>()</pre>
                <p>執行 <code>play_song()</code> → 結果：播放 Do<br>
                一個函數可以呼叫另一個函數來幫忙完成工作。</p>
            </div>
        </div>

        <h4>(三) 區域變數與全域變數</h4>
        <p>
            變數也有自己的活動範圍。<br>
            可以想成：<br>
            🏫 全校都能使用的東西（全域變數）<br>
            🏠 只有自己教室能使用的東西（區域變數）
        </p>

        <p><strong>1. 全域變數（Global Variable）</strong>：在函數外面建立的，整個程式都可以使用。</p>
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

        <p><strong>2. 區域變數（Local Variable）</strong>：在函數裡建立的，只能在該函數內使用。</p>
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
            <p><code>y</code> 只存在於 <code>test()</code> 函數內部。</p>
            <p>函數外面若直接使用 <code>print(y)</code>，會發生錯誤。</p>
        </div>

        <div class="music-card">
            <span class="music-card-icon">🎵</span>
            <div class="music-card-body">
                <p class="music-card-title">音樂情境小舉例</p>
                <p><code>song = "小星星"</code> 放在函數外面 → 整個程式都知道目前歌曲是《小星星》。這就是全域變數。</p>
                <pre><span class="hl-kw">def</span> <span class="hl-nm">play</span>():
    <span class="hl-nm">note</span> = <span class="hl-st">"Do"</span></pre>
                <p><code>note</code> 放在函數裡 → 只能在 <code>play()</code> 裡使用。這就是區域變數。</p>
            </div>
        </div>

        <h4>(四) 函數的模組化（Modularization）</h4>
        <p>
            模組化就是：👉 把大工作拆成很多小工作。<br>
            這樣程式會更容易閱讀、修改與維護。
        </p>

        <div class="music-card">
            <span class="music-card-icon">🎵</span>
            <div class="music-card-body">
                <p class="music-card-title">音樂情境小舉例</p>
                <p>如果要播放一首歌曲，我們可以拆成：<br>
                ① 輸入節拍　② 計算速度　③ 顯示結果<br>
                每個工作交給不同函數完成。</p>
            </div>
        </div>

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

<span class="hl-nm">num</span> = input_data()
<span class="hl-nm">result</span> = calculate(num)
<span class="hl-nm">show</span>(result)</pre>
        </div>
        <div class="logic-block">
            <div class="logic-label">程式邏輯說明</div>
            <p>① <code>input_data()</code> 負責取得使用者輸入</p>
            <p>② <code>calculate()</code> 負責計算（例如：5 × 2 = 10）</p>
            <p>③ <code>show()</code> 負責輸出結果</p>
            <p>每個函數只負責一件事，程式會更清楚易讀。</p>
        </div>

        <div class="music-card">
            <span class="music-card-icon">🎵</span>
            <div class="music-card-body">
                <p class="music-card-title">音樂情境小舉例</p>
                <p>播放《生日快樂歌》時：<br>
                <code>input_song()</code> 負責選歌曲 →
                <code>play_song()</code> 負責播放音符 →
                <code>show_message()</code> 負責顯示「播放完成」<br><br>
                這就是模組化的概念。</p>
            </div>
        </div>

        <hr>

        <h3>範例程式說明</h3>

        <div class="example-wrap">
            <div class="example-head">範例 (一)：使用函數計算折扣金額</div>
            <div class="example-body">
                <p>請撰寫一段程式，完成以下功能：</p>
                <ol>
                    <li>定義一個函數 discount(price, rate=0.9)</li>
                    <li>函數功能：計算折扣後價格並回傳結果</li>
                    <li>讓使用者輸入商品價格</li>
                    <li>呼叫函數（使用預設折扣），並顯示結果</li>
                </ol>
                <div class="code-block" style="margin-top:14px">
                    <div class="code-block-header">
                        <div class="code-block-dots">
                            <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                        </div>
                        <span class="code-block-lang">參考程式</span>
                    </div>
                    <pre><span class="hl-cm"># 【第1題】定義函數，rate 預設為 0.9（九折）</span>
<span class="hl-kw">def</span> <span class="hl-nm">discount</span>(price, rate=<span class="hl-nu">0.9</span>):
    <span class="hl-cm"># 【第2題】計算折扣後價格並回傳</span>
    <span class="hl-nm">final_price</span> = price * rate
    <span class="hl-kw">return</span> final_price

<span class="hl-cm"># 【第3題】讓使用者輸入商品價格</span>
<span class="hl-nm">price</span> = <span class="hl-kw">int</span>(<span class="hl-kw">input</span>(<span class="hl-st">"請輸入商品價格: "</span>))

<span class="hl-cm"># 【第4題】呼叫函數（未傳入 rate → 使用預設值 0.9）</span>
<span class="hl-nm">final_price</span> = discount(price)
<span class="hl-kw">print</span>(<span class="hl-st">"折扣後價格為:"</span>, final_price)</pre>
                </div>
                <div class="output-wrap" style="margin-top:10px">
                    <div class="output-label">執行結果（假設輸入）</div>
                    <div class="output-block">請輸入商品價格: 100

折扣後價格為: 90.0</div>
                </div>
            </div>
        </div>

        <div class="example-wrap">
            <div class="example-head">範例 (二)：使用函數播放生日快樂（進階版）</div>
            <div class="example-body">
                <img src="{{ asset('img/HBD.png') }}" alt="生日快樂五線譜">
                <p>
                    此行五線譜是《生日快樂》的第一句旋律，此行音符為 Sol Sol La Sol Do(高) Si<br><br>
                    請撰寫一段程式，完成以下功能：
                </p>
                <ol>
                    <li>定義一個函數 play_note(note, beat=0.5)</li>
                    <li>函數功能：接收音符（note）與播放時間（beat，預設 0.5 秒）並播放</li>
                    <li>播放旋律：G → G → A → G → 高音 C → B</li>
                    <li>前三個音符的節拍設定為 2 秒</li>
                </ol>
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
    <span class="hl-st">"G"</span>: <span class="hl-nu">67</span>,       <span class="hl-cm"># Sol</span>
    <span class="hl-st">"A"</span>: <span class="hl-nu">69</span>,       <span class="hl-cm"># La</span>
    <span class="hl-st">"C_high"</span>: <span class="hl-nu">72</span>,  <span class="hl-cm"># 高音 Do</span>
    <span class="hl-st">"B"</span>: <span class="hl-nu">71</span>        <span class="hl-cm"># Si</span>
}

<span class="hl-cm"># 【第1題】定義函數，beat 預設 0.5 秒</span>
<span class="hl-kw">def</span> <span class="hl-nm">play_note</span>(note, beat=<span class="hl-nu">0.5</span>):
    <span class="hl-cm"># 【第2題】取得 MIDI 數值，播放音符</span>
    <span class="hl-nm">midi_num</span> = note_map[note]
    player.<span class="hl-kw">note_on</span>(midi_num, <span class="hl-nu">100</span>)
    time.<span class="hl-kw">sleep</span>(beat)
    player.<span class="hl-kw">note_off</span>(midi_num, <span class="hl-nu">100</span>)

<span class="hl-cm"># 【第3+4題】播放旋律：前三個音用 2 秒，後三個用預設 0.5 秒</span>
<span class="hl-nm">play_note</span>(<span class="hl-st">"G"</span>, <span class="hl-nu">2</span>)       <span class="hl-cm"># Sol（較長）</span>
<span class="hl-nm">play_note</span>(<span class="hl-st">"G"</span>, <span class="hl-nu">2</span>)       <span class="hl-cm"># Sol（較長）</span>
<span class="hl-nm">play_note</span>(<span class="hl-st">"A"</span>, <span class="hl-nu">2</span>)       <span class="hl-cm"># La（較長）</span>
<span class="hl-nm">play_note</span>(<span class="hl-st">"G"</span>)          <span class="hl-cm"># Sol（預設 0.5 秒）</span>
<span class="hl-nm">play_note</span>(<span class="hl-st">"C_high"</span>)    <span class="hl-cm"># 高音 Do</span>
<span class="hl-nm">play_note</span>(<span class="hl-st">"B"</span>)          <span class="hl-cm"># Si</span></pre>
                </div>
                <div class="output-wrap" style="margin-top:10px">
                    <div class="output-label">執行結果</div>
                    <div class="output-block">程式會依序播放：
Sol（2秒）→ Sol（2秒）→ La（2秒）→ Sol → 高音Do → Si

也就是《生日快樂》第一句旋律 🎵</div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
