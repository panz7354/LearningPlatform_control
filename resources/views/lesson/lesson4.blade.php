@extends('layouts.app')

@section('style')
    @include('layouts._lesson-styles')
@endsection

@section('content')
<div class="lesson-wrap" data-chapter="4">

    {{-- ===== 標題列 ===== --}}
    <div class="lesson-header">
        <h1>第 4 章　物件導向程式設計</h1>
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
            • 例如：狗狗可以「汪汪叫」、記憶體可以「儲存資料」<br>
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
            • self 代表「物件自己」。可以把它想成：「這隻狗自己」或「這台機器自己」。<br>
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

        <h4>(七) 多個物件（理解物件概念）</h4>
        <p>
            • 同一個類別，可以建立很多不同的物件。<br>
            • 就像：可以有很多隻狗狗，每個物件的資料都不同。<br>
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
    <span class="hl-cm"># name 是建立物件時傳入的名字</span>
    <span class="hl-kw">def</span> <span class="hl-nm">__init__</span>(self, name):
        <span class="hl-cm"># 【題號3】self.name 是物件的屬性</span>
        <span class="hl-cm"># 功能：將傳入的名字儲存到物件中</span>
        self.name = name

    <span class="hl-cm"># 【題號4】建立 say_hello() 方法</span>
    <span class="hl-cm"># 功能：讓狗狗進行自我介紹</span>
    <span class="hl-kw">def</span> <span class="hl-nm">say_hello</span>(self):
        <span class="hl-cm"># self.name 會取得物件儲存的名字</span>
        <span class="hl-kw">print</span>(<span class="hl-st">"我是"</span> + self.name + <span class="hl-st">"！"</span>)

<span class="hl-cm"># 【題號5】建立物件並傳入名字「小黃」</span>
<span class="hl-nm">dog1</span> = <span class="hl-nm">Dog</span>(<span class="hl-st">"小黃"</span>)
<span class="hl-cm"># 呼叫 say_hello() 方法，讓狗狗進行自我介紹</span>
<span class="hl-nm">dog1</span>.<span class="hl-kw">say_hello</span>()</pre>
                </div>
                <div class="output-wrap" style="margin-top:10px">
                    <div class="output-label">執行結果</div>
                    <div class="output-block">我是小黃！</div>
                </div>
            </div>
        </div>

        <div class="example-wrap">
            <div class="example-head">範例 (二)：使用類別處理工作任務</div>
            <div class="example-body">
                <p>請撰寫一段程式，完成以下功能：</p>
                <ol>
                    <li>建立一個類別 TaskManager</li>
                    <li>使用 __init__ 建構子，初始化任務清單與已完成任務數量</li>
                    <li>建立一個方法 process_tasks()</li>
                    <li>在方法中依序處理任務清單中的所有任務</li>
                    <li>每完成一項任務，就顯示任務名稱，並更新已完成任務數量</li>
                </ol>
                <div class="code-block" style="margin-top:14px">
                    <div class="code-block-header">
                        <div class="code-block-dots">
                            <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                        </div>
                        <span class="code-block-lang">參考程式</span>
                    </div>
                    <pre><span class="hl-cm"># 【題號1】定義 TaskManager 類別</span>
<span class="hl-cm"># 類別可以想像成「任務管理系統的設計圖」</span>
<span class="hl-kw">class</span> <span class="hl-nm">TaskManager</span>:
    <span class="hl-cm"># 【題號2】建構子 __init__</span>
    <span class="hl-cm"># 建立物件時會自動執行</span>
    <span class="hl-cm"># 功能：初始化任務資料與完成數量</span>
    <span class="hl-kw">def</span> <span class="hl-nm">__init__</span>(self):
        <span class="hl-cm"># 建立任務清單</span>
        self.tasks = [
            <span class="hl-st">"檢查資料"</span>,
            <span class="hl-st">"整理報表"</span>,
            <span class="hl-st">"寄送通知"</span>,
            <span class="hl-st">"更新紀錄"</span>
        ]
        <span class="hl-cm"># 記錄已完成的任務數量</span>
        self.completed_count = <span class="hl-nu">0</span>

    <span class="hl-cm"># 【題號3】建立 process_tasks() 方法</span>
    <span class="hl-cm"># 功能：依序處理所有任務</span>
    <span class="hl-kw">def</span> <span class="hl-nm">process_tasks</span>(self):
        <span class="hl-cm"># 顯示開始處理訊息</span>
        <span class="hl-kw">print</span>(<span class="hl-st">"開始處理任務"</span>)
        <span class="hl-cm"># 使用 for 迴圈依序取得任務</span>
        <span class="hl-kw">for</span> <span class="hl-nm">task</span> <span class="hl-kw">in</span> self.tasks:
            <span class="hl-cm"># 顯示目前正在處理的任務</span>
            <span class="hl-kw">print</span>(<span class="hl-st">"正在處理："</span>, <span class="hl-nm">task</span>)
            <span class="hl-cm"># 每完成一項任務，completed_count 加 1</span>
            self.completed_count += <span class="hl-nu">1</span>
        <span class="hl-cm"># 顯示處理完成訊息</span>
        <span class="hl-kw">print</span>(<span class="hl-st">"任務處理完成"</span>)
        <span class="hl-cm"># 顯示完成的任務數量</span>
        <span class="hl-kw">print</span>(<span class="hl-st">"已完成任務數量："</span>, self.completed_count)

<span class="hl-cm"># 建立 TaskManager 物件</span>
<span class="hl-nm">manager</span> = <span class="hl-nm">TaskManager</span>()
<span class="hl-cm"># 呼叫 process_tasks() 方法</span>
<span class="hl-nm">manager</span>.<span class="hl-kw">process_tasks</span>()</pre>
                </div>
                <div class="output-wrap" style="margin-top:10px">
                    <div class="output-label">執行結果</div>
                    <div class="output-block">開始處理任務
正在處理：檢查資料
正在處理：整理報表
正在處理：寄送通知
正在處理：更新紀錄
任務處理完成
已完成任務數量：4</div>
                </div>
            </div>
        </div>

        <h2 id="section4-2">2. 繼承、多型與封裝</h2>

        <h3>重點語法</h3>

        <h4>(一) 繼承（Inheritance）</h4>
        <p>
            • 繼承可以想成：「孩子繼承爸爸媽媽的能力」。<br>
            • 在程式中：子類別可以直接使用父類別的方法，不用重新寫一次程式。<br>
            • 這樣可以：減少重複撰寫程式，讓程式更簡單、更方便整理。<br>
            • 如下程式碼：
        </p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-kw">class</span> <span class="hl-nm">Animal</span>:
    <span class="hl-kw">def</span> <span class="hl-nm">speak</span>(self):
        <span class="hl-kw">print</span>(<span class="hl-st">"動物會發出聲音"</span>)

<span class="hl-cm"># Dog 繼承 Animal</span>
<span class="hl-kw">class</span> <span class="hl-nm">Dog</span>(<span class="hl-nm">Animal</span>):
    <span class="hl-kw">pass</span>

<span class="hl-nm">dog1</span> = <span class="hl-nm">Dog</span>()
<span class="hl-nm">dog1</span>.<span class="hl-nm">speak</span>()  <span class="hl-cm"># 使用父類別的方法</span></pre>
        </div>
        <div class="logic-block">
            <div class="logic-label">程式邏輯說明</div>
            <p><code>class Animal:</code> 建立一個 Animal 類別，裡面有 <code>speak()</code> 方法，功能是讓動物發出聲音。</p>
            <p><code>class Dog(Animal):</code> 代表 Dog 繼承 Animal，因此 Dog 可以直接使用 Animal 裡面的功能。</p>
            <p>所以 <code>dog1.speak()</code> 雖然 Dog 裡沒有重新寫 <code>speak()</code>，但還是可以使用。</p>
        </div>

        <h4>(二) 多型（Polymorphism）</h4>
        <p>
            • 多型的意思是：「相同的方法名稱，不同物件會有不同結果」。<br>
            • 例如：狗狗 speak() → 汪汪；貓咪 speak() → 喵喵。<br>
            • 雖然方法名稱都叫 speak()，但結果不同。<br>
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
    <span class="hl-kw">def</span> <span class="hl-nm">speak</span>(self):
        <span class="hl-kw">print</span>(<span class="hl-st">"汪汪"</span>)

<span class="hl-kw">class</span> <span class="hl-nm">Cat</span>:
    <span class="hl-kw">def</span> <span class="hl-nm">speak</span>(self):
        <span class="hl-kw">print</span>(<span class="hl-st">"喵喵"</span>)

<span class="hl-nm">dog</span> = <span class="hl-nm">Dog</span>()
<span class="hl-nm">cat</span> = <span class="hl-nm">Cat</span>()

<span class="hl-nm">dog</span>.<span class="hl-nm">speak</span>()
<span class="hl-nm">cat</span>.<span class="hl-nm">speak</span>()</pre>
        </div>
        <div class="output-wrap">
            <div class="output-label">執行結果</div>
            <div class="output-block">汪汪
喵喵</div>
        </div>
        <div class="logic-block">
            <div class="logic-label">程式邏輯說明</div>
            <p><code>dog.speak()</code> 是讓狗狗執行 speak()，會輸出：汪汪。</p>
            <p><code>cat.speak()</code> 是讓貓咪執行 speak()，會輸出：喵喵。</p>
        </div>

        <h4>(三) 方法覆寫（Override）</h4>
        <p>
            • 方法覆寫可以想成：「孩子把原本的方法改成自己的版本」。<br>
            • 雖然子類別是從父類別繼承而來，但子類別也可以重新改寫方法內容。<br>
            • 這時候：子類別的方法會覆蓋父類別的方法。<br>
            • 如下程式碼：
        </p>
        <div class="code-block">
            <div class="code-block-header">
                <div class="code-block-dots">
                    <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                </div>
                <span class="code-block-lang">Python</span>
            </div>
            <pre><span class="hl-kw">class</span> <span class="hl-nm">Animal</span>:
    <span class="hl-kw">def</span> <span class="hl-nm">speak</span>(self):
        <span class="hl-kw">print</span>(<span class="hl-st">"動物發聲"</span>)

<span class="hl-kw">class</span> <span class="hl-nm">Dog</span>(<span class="hl-nm">Animal</span>):
    <span class="hl-kw">def</span> <span class="hl-nm">speak</span>(self):  <span class="hl-cm"># 覆寫 speak 方法</span>
        <span class="hl-kw">print</span>(<span class="hl-st">"汪汪"</span>)

<span class="hl-nm">dog</span> = <span class="hl-nm">Dog</span>()
<span class="hl-nm">dog</span>.<span class="hl-nm">speak</span>()</pre>
        </div>
        <div class="output-wrap">
            <div class="output-label">執行結果</div>
            <div class="output-block">汪汪</div>
        </div>
        <div class="logic-block">
            <div class="logic-label">程式邏輯說明</div>
            <p>原本 Animal 類別中的 <code>def speak(self):</code> 會輸出：動物發聲。</p>
            <p>但是 Dog 類別重新寫了一個 <code>def speak(self):</code>，因此會改成輸出：汪汪。</p>
            <p>所以 <code>dog.speak()</code> 最後執行的是 Dog 自己的方法。</p>
        </div>

        <h4>(四) 封裝（Encapsulation）</h4>
        <p>
            • 封裝可以想成：「把重要資料保護起來」。<br>
            • 在類別中：可以把資料與方法包在一起，避免外部隨意修改重要資料。<br>
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
        self.name = name        <span class="hl-cm"># 公開屬性</span>
        self.__age = <span class="hl-nu">3</span>         <span class="hl-cm"># 私有屬性（前面加 __）</span>

    <span class="hl-kw">def</span> <span class="hl-nm">show</span>(self):
        <span class="hl-kw">print</span>(self.name, self.__age)</pre>
        </div>
        <div class="logic-block">
            <div class="logic-label">程式邏輯說明</div>
            <p><code>self.name</code> 是公開屬性，外部可以直接使用。</p>
            <p><code>self.__age</code> 前面加上 <code>__</code>，代表私有屬性，意思是不希望外部直接修改這個資料。</p>
            <p>例如：<code>dog1 = Dog("小白")</code> 是建立一隻叫小白的狗狗。當執行 <code>dog1.show()</code> 就會顯示狗狗名字與年齡。</p>
        </div>

        <hr>

        <h3>範例程式說明</h3>

        <div class="example-wrap">
            <div class="example-head">範例 (一)：會發出不同聲音的動物 🐶🐱</div>
            <div class="example-body">
                <p>請撰寫一段程式，完成以下功能：</p>
                <ol>
                    <li>建立一個父類別 Animal：包含一個方法 speak()，輸出：「動物會發出聲音」</li>
                    <li>建立一個子類別 Dog，繼承 Animal：覆寫（override）speak() 方法，輸出：「狗狗汪汪」</li>
                    <li>建立一個子類別 Cat，繼承 Animal：覆寫（override）speak() 方法，輸出：「貓咪喵喵」</li>
                    <li>建立物件並呼叫方法，觀察不同結果</li>
                </ol>
                <div class="code-block" style="margin-top:14px">
                    <div class="code-block-header">
                        <div class="code-block-dots">
                            <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                        </div>
                        <span class="code-block-lang">參考程式</span>
                    </div>
                    <pre><span class="hl-cm"># 【題號1】建立父類別 Animal</span>
<span class="hl-cm"># 類別可以想像成「動物的設計圖」</span>
<span class="hl-kw">class</span> <span class="hl-nm">Animal</span>:
    <span class="hl-cm"># 建立 speak() 方法，功能：讓動物發出聲音</span>
    <span class="hl-kw">def</span> <span class="hl-nm">speak</span>(self):
        <span class="hl-kw">print</span>(<span class="hl-st">"動物會發出聲音"</span>)

<span class="hl-cm"># 【題號2】建立子類別 Dog，繼承 Animal</span>
<span class="hl-kw">class</span> <span class="hl-nm">Dog</span>(<span class="hl-nm">Animal</span>):
    <span class="hl-cm"># 覆寫（override）父類別中的 speak() 方法</span>
    <span class="hl-cm"># 功能：改成狗狗的叫聲</span>
    <span class="hl-kw">def</span> <span class="hl-nm">speak</span>(self):
        <span class="hl-kw">print</span>(<span class="hl-st">"狗狗汪汪"</span>)

<span class="hl-cm"># 【題號3】建立子類別 Cat，繼承 Animal</span>
<span class="hl-kw">class</span> <span class="hl-nm">Cat</span>(<span class="hl-nm">Animal</span>):
    <span class="hl-cm"># 覆寫（override）父類別中的 speak() 方法</span>
    <span class="hl-cm"># 功能：改成貓咪的叫聲</span>
    <span class="hl-kw">def</span> <span class="hl-nm">speak</span>(self):
        <span class="hl-kw">print</span>(<span class="hl-st">"貓咪喵喵"</span>)

<span class="hl-cm"># 【題號4】建立物件並呼叫方法</span>
<span class="hl-nm">dog</span> = <span class="hl-nm">Dog</span>()
<span class="hl-nm">cat</span> = <span class="hl-nm">Cat</span>()

<span class="hl-nm">dog</span>.<span class="hl-nm">speak</span>()
<span class="hl-nm">cat</span>.<span class="hl-nm">speak</span>()</pre>
                </div>
                <div class="output-wrap" style="margin-top:10px">
                    <div class="output-label">執行結果</div>
                    <div class="output-block">狗狗汪汪
貓咪喵喵</div>
                </div>
            </div>
        </div>

        <div class="example-wrap">
            <div class="example-head">範例 (二)：使用類別建立通知系統（進階版）</div>
            <div class="example-body">
                <p>請撰寫一段程式，完成以下功能：</p>
                <ol>
                    <li>建立一個父類別 Notification：包含一個 send() 方法，輸出「開始發送通知！」</li>
                    <li>建立一個子類別 EmailNotification，繼承 Notification：覆寫 send() 方法，並依序發送多項通知內容</li>
                    <li>建立物件並呼叫 send() 方法</li>
                </ol>
                <div class="code-block" style="margin-top:14px">
                    <div class="code-block-header">
                        <div class="code-block-dots">
                            <div class="code-block-dot red"></div><div class="code-block-dot yellow"></div><div class="code-block-dot green"></div>
                        </div>
                        <span class="code-block-lang">參考程式</span>
                    </div>
                    <pre><span class="hl-cm"># 【題號1】建立父類別 Notification</span>
<span class="hl-cm"># 用來表示一般通知功能</span>
<span class="hl-kw">class</span> <span class="hl-nm">Notification</span>:
    <span class="hl-cm"># 建立 send() 方法，功能：顯示開始發送通知</span>
    <span class="hl-kw">def</span> <span class="hl-nm">send</span>(self):
        <span class="hl-kw">print</span>(<span class="hl-st">"開始發送通知！"</span>)

<span class="hl-cm"># ------------------------------------------------</span>
<span class="hl-cm"># 【題號2】建立子類別 EmailNotification</span>
<span class="hl-cm"># 繼承 Notification 類別</span>
<span class="hl-kw">class</span> <span class="hl-nm">EmailNotification</span>(<span class="hl-nm">Notification</span>):
    <span class="hl-cm"># 覆寫父類別的 send() 方法</span>
    <span class="hl-kw">def</span> <span class="hl-nm">send</span>(self):
        <span class="hl-kw">print</span>(<span class="hl-st">"開始發送電子郵件通知"</span>)
        <span class="hl-cm"># 建立通知內容串列</span>
        <span class="hl-nm">messages</span> = [
            <span class="hl-st">"系統更新完成"</span>,
            <span class="hl-st">"新的任務已建立"</span>,
            <span class="hl-st">"請查看最新通知"</span>,
            <span class="hl-st">"今日報表已產生"</span>
        ]
        <span class="hl-cm"># 依序處理每一項通知內容</span>
        <span class="hl-kw">for</span> <span class="hl-nm">message</span> <span class="hl-kw">in</span> <span class="hl-nm">messages</span>:
            <span class="hl-kw">print</span>(<span class="hl-st">"已發送："</span>, <span class="hl-nm">message</span>)
        <span class="hl-kw">print</span>(<span class="hl-st">"所有通知發送完成！"</span>)

<span class="hl-cm"># ------------------------------------------------</span>
<span class="hl-cm"># 【題號3】建立 EmailNotification 物件</span>
<span class="hl-nm">notification</span> = <span class="hl-nm">EmailNotification</span>()
<span class="hl-cm"># 呼叫 send() 方法</span>
<span class="hl-nm">notification</span>.<span class="hl-nm">send</span>()</pre>
                </div>
                <div class="output-wrap" style="margin-top:10px">
                    <div class="output-label">執行結果</div>
                    <div class="output-block">開始發送電子郵件通知
已發送：系統更新完成
已發送：新的任務已建立
已發送：請查看最新通知
已發送：今日報表已產生
所有通知發送完成！</div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
