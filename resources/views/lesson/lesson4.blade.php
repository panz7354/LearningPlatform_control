@extends('layouts.app')

@section('style')
    @include('layouts._lesson-styles')
@endsection

@section('content')
<div class="lesson-wrap" data-chapter="4">

    {{-- ===== 標題列 ===== --}}
    <div class="lesson-header">
        <h1>第 4 章　物件導向程式設計</h1>
        <div class="audio-wrap">
            <span>範例音檔</span>
            <audio controls>
                <source src="{{ asset('audio/4_bell.mp3') }}" type="audio/mpeg">
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
            <a href="#section4-1">1. 類別裡的函數</a>
            <a href="#section4-2">2. 繼承、多型與封裝</a>
        </div>
    </div>

    {{-- ===== 主要內容 ===== --}}
    <div class="lesson-content">

        <h2 id="section4-1">1. 類別裡的函數</h2>

        <h3>重點語法</h3>

        <h4>(一) 類別（class）</h4>
        <p>
            • 類別是用來建立「物件」的設計藍圖。<br>
            • 例如：「Dog」類別就像狗狗的設計藍圖，裡面會告訴電腦：狗狗有什麼資料、狗狗可以做什麼動作。<br>
            • 就像音樂播放器也可以有自己的設計圖，裡面可以放：音符資料、播放音樂的功能。<br>
            • 如下程式碼，將「資料（屬性）」與「功能（函數）」包在一起：
        </p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-kw">class</span> <span class="hl-nm">Dog</span>:
    <span class="hl-kw">print</span>(<span class="hl-st">"汪汪"</span>)</pre>
        </div>
        <div class="logic-block">
            <div class="logic-label">程式邏輯說明</div>
            <p><code>class Dog:</code> 代表建立一個名為 Dog 的類別。</p>
            <p><code>print("汪汪")</code> 代表讓 Dog 能夠汪汪叫的功能。</p>
        </div>

        <h4>(二) 類別中的函數（方法 method）</h4>
        <p>
            • 類別中的函數稱為「方法（method）」。<br>
            • 方法就像是物件會做的動作。<br>
            • 例如：狗狗可以「汪汪叫」、音樂播放器可以「播放音樂」<br>
            • 如下程式碼：
        </p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-kw">class</span> <span class="hl-nm">Dog</span>:
    <span class="hl-kw">def</span> <span class="hl-nm">bark</span>(self):
        <span class="hl-kw">print</span>(<span class="hl-st">"汪汪"</span>)</pre>
        </div>
        <div class="logic-block">
            <div class="logic-label">程式邏輯說明</div>
            <p><code>def bark(self):</code> 代表建立一個 bark 方法。</p>
            <p><code>print("汪汪")</code> 代表讓狗狗發出「汪汪」的聲音。</p>
        </div>

        <h4>(三) self 的概念</h4>
        <p>
            • self 代表「物件自己」。可以把它想成：「這隻狗自己」或「這台音樂播放器自己」。<br>
            • 在類別的方法中，第一個參數都要寫 self。<br>
            • 如下程式碼：
        </p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-kw">class</span> <span class="hl-nm">Dog</span>:
    <span class="hl-kw">def</span> <span class="hl-nm">bark</span>(self):
        <span class="hl-kw">print</span>(<span class="hl-st">"我是狗狗"</span>)</pre>
        </div>
        <div class="logic-block">
            <div class="logic-label">程式邏輯說明</div>
            <p>這裡的 self，代表正在執行 bark() 的那隻狗。</p>
            <p>最外層的 class Dog 是最高統帥（定義類別）；往內縮 4 格的 def bark 則是它的下屬（定義功能）；而最深處的 print 則是該功能的具體執行內容。</p>
        </div>
        <table>
            <tr><th>縮排層級</th><th>程式碼內容</th><th>邏輯意義</th></tr>
            <tr><td>第一層 (0 空格)</td><td>class Dog:</td><td>定義類別：宣告一個名為 Dog 的主體。</td></tr>
            <tr><td>第二層 (4 空格)</td><td>def bark(self):</td><td>定義方法：此函數隸屬於 Dog 類別，是其成員方法。</td></tr>
            <tr><td>第三層 (8 空格)</td><td>print("我是狗狗")</td><td>執行陳述式：此邏輯隸屬於 bark 方法，僅在方法被調用時執行。</td></tr>
        </table>

        <h4>(四) 建立物件並呼叫方法</h4>
        <p>
            • 建立物件是根據「狗狗設計圖」（Dog 類別），真正生產出一隻「實體的狗狗」（dog1 物件）。<br>
            • 呼叫方法是叫 dog1 這隻狗去執行「吠叫」這個動作。
        </p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">dog1</span> = <span class="hl-nm">Dog</span>()      <span class="hl-cm"># 建立物件：先產出一隻狗</span>
<span class="hl-nm">dog1</span>.<span class="hl-kw">bark</span>()       <span class="hl-cm"># 呼叫方法：再叫牠吠叫一聲</span></pre>
        </div>

        <div class="music-card">
            <span class="music-card-icon">🎵</span>
            <div class="music-card-body">
                <p class="music-card-title">音樂情境小舉例</p>
                <p>如果今天建立一個「音樂播放器」類別 MusicPlayer，如下程式碼：</p>
                <pre><span class="hl-kw">class</span> <span class="hl-nm">MusicPlayer</span>:
    <span class="hl-nm">play_music</span>()</pre>
                <p>此播放器裡還有一個方法叫做 <code>play_music()</code>，它的功能就是播放《小星星》或《倫敦鐵橋》的旋律 🎵</p>
            </div>
        </div>

        <h4>(五) 類別中的參數傳入</h4>
        <p>
            • 方法（method）除了可以執行動作，也可以接收「參數」。<br>
            • 參數可以想成：「要提供給程式的小資料」。<br>
            • 例如：告訴程式這隻狗狗的名字是什麼。<br>
            • 如下程式碼：
        </p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-kw">class</span> <span class="hl-nm">Dog</span>:
    <span class="hl-kw">def</span> <span class="hl-nm">bark</span>(self, name):
        <span class="hl-kw">print</span>(name + <span class="hl-st">" 在叫"</span>)

<span class="hl-nm">dog1</span> = <span class="hl-nm">Dog</span>()
<span class="hl-nm">dog1</span>.<span class="hl-kw">bark</span>(<span class="hl-st">"小白"</span>)</pre>
        </div>
        <div class="logic-block">
            <div class="logic-label">程式邏輯說明</div>
            <p><code>name</code> 是參數，<code>"小白"</code> 會傳入方法中。</p>
            <p>程式執行後會輸出：小白 在叫</p>
        </div>

        <div class="music-card">
            <span class="music-card-icon">🎵</span>
            <div class="music-card-body">
                <p class="music-card-title">音樂情境小舉例</p>
                <p>如果是音樂播放器：</p>
                <pre><span class="hl-nm">play_music</span>(<span class="hl-st">"小星星"</span>)</pre>
                <p>"小星星" 就是傳入的參數。播放器就知道要播放哪一首歌。</p>
            </div>
        </div>

        <h4>(六) 建構子 __init__</h4>
        <p>
            • <code>__init__</code> 是一種特別的方法。當建立物件時，<code>__init__</code> 會自動執行。<br>
            • 它的功能是：幫物件設定「一開始的資料」。<br>
            • 如下程式碼：
        </p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-kw">class</span> <span class="hl-nm">Dog</span>:
    <span class="hl-kw">def</span> <span class="hl-nm">__init__</span>(self, name):
        self.name = name  <span class="hl-cm"># 儲存名稱</span>

    <span class="hl-kw">def</span> <span class="hl-nm">bark</span>(self):
        <span class="hl-kw">print</span>(self.name + <span class="hl-st">" 在叫"</span>)

<span class="hl-nm">dog1</span> = <span class="hl-nm">Dog</span>(<span class="hl-st">"小白"</span>)
<span class="hl-nm">dog1</span>.<span class="hl-kw">bark</span>()</pre>
        </div>
        <div class="logic-block">
            <div class="logic-label">程式邏輯說明</div>
            <p>建立物件時，<code>Dog("小白")</code> 會自動把 "小白" 傳入 <code>__init__</code>。</p>
            <p>接著 <code>self.name = name</code> 會把名字儲存起來。</p>
            <p>之後呼叫 <code>dog1.bark()</code> 就能輸出：小白 在叫</p>
        </div>

        <div class="music-card">
            <span class="music-card-icon">🎵</span>
            <div class="music-card-body">
                <p class="music-card-title">音樂情境小舉例</p>
                <p>如果建立音樂播放器：</p>
                <pre><span class="hl-nm">music</span> = <span class="hl-nm">MusicPlayer</span>(<span class="hl-st">"鋼琴"</span>)</pre>
                <p>可以在建立播放器時，先設定好指定的樂器種類是鋼琴。</p>
            </div>
        </div>

        <h4>(七) 多個物件（理解物件概念）</h4>
        <p>
            • 同一個類別，可以建立很多不同的物件。<br>
            • 就像：可以有很多隻狗狗，也可以有很多音樂播放器。<br>
            • 每個物件的資料都不同。<br>
            • 如下程式碼：
        </p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-nm">dog1</span> = <span class="hl-nm">Dog</span>(<span class="hl-st">"小白"</span>)
<span class="hl-nm">dog2</span> = <span class="hl-nm">Dog</span>(<span class="hl-st">"小黑"</span>)

<span class="hl-nm">dog1</span>.<span class="hl-kw">bark</span>()
<span class="hl-nm">dog2</span>.<span class="hl-kw">bark</span>()</pre>
        </div>
        <div class="output-wrap">
            <div class="output-label">執行結果</div>
            <div class="output-block">小白 在叫
小黑 在叫</div>
        </div>
        <div class="logic-block">
            <div class="logic-label">程式邏輯說明</div>
            <p>dog1 和 dog2 都是根據同一個 Dog 類別建立的。</p>
            <p>但是名字不同、資料不同，因此每個物件都可以有自己的內容。</p>
        </div>

        <div class="music-card">
            <span class="music-card-icon">🎵</span>
            <div class="music-card-body">
                <p class="music-card-title">音樂情境小舉例</p>
                <p>例如建立兩個播放器：</p>
                <pre><span class="hl-nm">music1</span> = <span class="hl-nm">MusicPlayer</span>(<span class="hl-st">"鋼琴"</span>)
<span class="hl-nm">music2</span> = <span class="hl-nm">MusicPlayer</span>(<span class="hl-st">"吉他"</span>)</pre>
                <p>雖然這兩個都是播放器，但分別可以播放出不同樂器的聲音。</p>
            </div>
        </div>

        <hr>

        <h3>範例程式說明</h3>

        <div class="example-wrap">
            <div class="example-head">範例 (一)：會自我介紹的狗狗 🐶</div>
            <div class="example-body">
                <p>請撰寫一段程式，完成以下功能：</p>
                <ol>
                    <li>建立一個類別 Dog</li>
                    <li>使用 __init__ 建構子，讓狗狗可以設定名字</li>
                    <li>將名字存成屬性（例如：self.name）</li>
                    <li>建立一個方法 say_hello()</li>
                    <li>呼叫方法時，輸出：「我是小黃！」（依照不同名字改變）</li>
                </ol>
                <div class="code-block" style="margin-top:14px">
                    <div class="code-block-header">
                        <div class="code-block-dots">
                            <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                        </div>
                        <span class="code-block-lang">參考程式</span>
                    </div>
                    <pre><span class="hl-cm"># 【題號1】定義 Dog 類別（狗狗的設計圖）</span>
<span class="hl-kw">class</span> <span class="hl-nm">Dog</span>:
    <span class="hl-cm"># 【題號2】建構子：建立物件時自動執行</span>
    <span class="hl-kw">def</span> <span class="hl-nm">__init__</span>(self, name):
        <span class="hl-cm"># 【題號3】將名字儲存到物件屬性</span>
        self.name = name

    <span class="hl-cm"># 【題號4】建立 say_hello() 方法</span>
    <span class="hl-kw">def</span> <span class="hl-nm">say_hello</span>(self):
        <span class="hl-cm"># self.name 取得物件儲存的名字</span>
        <span class="hl-kw">print</span>(<span class="hl-st">"我是"</span> + self.name + <span class="hl-st">"！"</span>)

<span class="hl-cm"># 【題號5】建立物件並傳入名字「小黃」</span>
<span class="hl-nm">dog1</span> = <span class="hl-nm">Dog</span>(<span class="hl-st">"小黃"</span>)
<span class="hl-nm">dog1</span>.<span class="hl-kw">say_hello</span>()</pre>
                </div>
                <div class="output-wrap" style="margin-top:10px">
                    <div class="output-label">執行結果</div>
                    <div class="output-block">我是小黃！</div>
                </div>
            </div>
        </div>

        <div class="example-wrap">
            <div class="example-head">範例 (二)：播放《耶誕鈴聲》旋律</div>
            <div class="example-body">
                <img src="{{ asset('img/bell.jpg') }}" alt="耶誕鈴聲五線譜">
                <p>
                    此行五線譜是《耶誕鈴聲》的第一句旋律，此行音符為 Si Si Si — Si Si Si — Si Re(高) Sol La Si<br>
                    (其餘實作請參考進階教學內容完成)
                </p>
            </div>
        </div>

    </div>
</div>
@endsection
