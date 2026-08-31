@extends('layouts.app')

@section('style')
    @include('layouts._lesson-styles')
@endsection

@section('content')
<div class="lesson-wrap">

    {{-- ===== 標題列 ===== --}}
    <div class="lesson-header">
        <h1>第 1 章 數值、字串與串列處理</h1>
        {{-- <div class="audio-wrap">
            <span>範例音檔</span>
            <audio controls>
                <source src="{{ asset('audio/1_star.mp3') }}" type="audio/mpeg">
                您的瀏覽器不支援播放
            </audio>
        </div> --}}
    </div>

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
            字串（string）就是「文字資料」。例如："Amy"、"倫敦鐵橋"、"嗨！"都是屬於字串。<br><br>
            在 Python 中：文字需要用引號 " 包起來。<br>
            如下程式碼：
        </p>
        <pre>name = "Amy"</pre>
        <p>"Amy" 是文字資料（字串）。</p>

        <h5>🎵 音樂情境小舉例</h5>
        <p>例如歌曲名稱：</p>
        <pre>song = "小星星"</pre>
        <p>"小星星" 就是一個字串。</p>

        <h4>(三) 字串串接（合併文字）</h4>
        <p>字串可以使用 + 合併文字。如下程式碼：</p>
        <pre>print("Hello" + " " + "World")</pre>
        <p>程式執行結果：</p>
        <pre>Hello World</pre>
        <p>
            程式邏輯說明：<br>
            "Hello" 是字串，"World" 也是字串，<br>
            透過 + 可以把兩段文字接在一起。
        </p>

        <h5>🎵 音樂情境小舉例</h5>
        <pre>print("正在播放：" + "小星星")</pre>
        <p>執行結果：</p>
        <pre>正在播放：小星星</pre>
        <p>程式會把兩段文字合併起來。</p>

        <h4>(四) 字串與數字的轉換</h4>
        <p><strong>1. 字串與數字是不同型態</strong></p>
        <p>在 Python 中，最常見的兩種型態有：</p>
        <table>
            <tr><th>資料</th><th>型態</th></tr>
            <tr><td>"5"</td><td>字串（string）</td></tr>
            <tr><td>5</td><td>整數（int）</td></tr>
        </table>
        <p>字串（string）就是：「文字資料」，需要使用引號 " 包起來。如下程式碼：</p>
        <pre>a = "5"</pre>
        <p>雖然看起來像數字 5，但因為有引號："5"，所以 Python 會認為它是：字串。</p>

        <p>整數（int）就是：真正可以計算的數字。如下程式碼：</p>
        <pre>b = 5</pre>
        <p>因為這個 5 沒有引號，所以 Python 會認為它是：數字。</p>

        <p>
            不同型態的資料，不能直接混合使用，因為：<br>
            • 字串是文字<br>
            • 數字是數字
        </p>
        <p>
            因為 "5" 是屬於文字（字串），5 是屬於數字（整數），<br>
            它們是不同種類的資料。Python 不知道該怎麼直接把它們一起運算。所以不能直接混合使用。<br><br>
            因此要把數字和文字一起顯示，或是要讓 "5" 也能夠做加法運算，都需要先進行「型態轉換」。
        </p>

        <p><strong>2. str()：數字轉字串</strong></p>
        <p>str() 的功能是：把數字變成文字。如下程式碼：</p>
        <pre>print("年齡是 " + str(18))</pre>
        <p>程式執行結果：</p>
        <pre>年齡是 18</pre>
        <p>
            程式邏輯說明：<br>
            18 原本是數字，str(18) 會把數字轉成文字 "18"，因此才能和前面的文字一起合併。
        </p>

        <h5>🎵 音樂情境小舉例</h5>
        <pre>print("目前音量：" + str(5))</pre>
        <p>執行結果：</p>
        <pre>目前音量：5</pre>
        <p>使用 str() 後，數字 5 才能和文字一起顯示。</p>

        <p><strong>3. int()：字串轉數字</strong></p>
        <p>int() 的功能是：把文字數字轉成真正的數字，讓它能夠做數學計算。如下程式碼：</p>
        <pre>a = int("5")
b = int("3")
print(a + b)</pre>
        <p>程式執行結果：</p>
        <pre>8</pre>
        <p>
            程式邏輯說明：<br>
            "5" 和 "3" 原本是文字，使用 int() 後：<br>
              "5" → 5<br>
              "3" → 3<br>
            因此可以進行加法運算。
        </p>

        <h5>🎵 音樂情境小舉例</h5>
        <pre>beat = int("4")
print(beat + 1)</pre>
        <p>執行結果：</p>
        <pre>5</pre>
        <p>int() 可以把音樂節拍數的文字轉成真正數字，方便計算。</p>

        <hr>

        <h3>範例程式說明</h3>

        <h4>範例(一)：計算明年年齡並顯示結果</h4>
        <p>
            請撰寫一段程式，完成以下功能：<br><br>
              1. 讓使用者輸入「姓名」與「年齡」<br>
              2. 將輸入的年齡轉換為整數<br>
              3. 計算「明年的年齡」<br>
              4. 輸出完整句子，例如：小明明年 19 歲<br><br>
            提示：<br>
              • 數值運算：age + 1（加法運算）<br>
              • 字串處理：使用（+）進行字串串接<br>
              • 型態轉換：使用 int()，字串 → 數字；使用 str()，數字 → 字串
        </p>
        <pre>參考程式：

# 【題號1】
# 使用 input() 讓使用者輸入姓名
# input() 取得的資料預設為字串（string）
name = input("請輸入姓名: ")

# 【題號2】
# 使用 input() 讓使用者輸入年齡
# 因為 input() 預設為字串
# 所以需使用 int() 轉換成整數（integer）
age = int(input("請輸入年齡: "))

# 【題號3】
# 使用加法運算計算明年的年齡
# 例如：18 + 1 = 19
next_age = age + 1

# 【題號4】
# 使用 + 進行字串串接
# str() 的功能是將數字轉換為字串
# 才能和文字一起合併輸出
print(name + " 明年 " + str(next_age) + " 歲")</pre>
        <p><strong>程式執行結果（假設輸入）：</strong></p>
        <pre>請輸入姓名: 小明
請輸入年齡: 18

程式輸出：
小明 明年 19 歲</pre>

        <h4>範例(二)：小星星旋律播放 (簡單版)</h4>
        <img src="{{ asset('img/star.png') }}" alt="小星星五線譜">
        <p>
            此行五線譜是《小星星》的第一句旋律，此行歌詞為一閃一閃亮晶晶(Twinkle, twinkle, little star)<br><br>
            請撰寫一段程式：<br><br>
              1. 輸入一個數字<br>
              2. 設定音符播放時間（數字 × 0.5）<br>
              3. 播放兩個音：C → G
        </p>
        <pre>參考程式：

# 【前置準備】
# 匯入 time 套件
# 功能：控制音符播放多久
import time

# 匯入 pygame.midi 音樂套件
# 功能：播放 MIDI 音樂
import pygame.midi

# 初始化 MIDI 系統
pygame.midi.init()

# 建立 MIDI 播放器
# 0 代表使用預設播放裝置
player = pygame.midi.Output(0)

# 設定樂器音色
# 0 = 鋼琴
player.set_instrument(0)

# 【題號1】
# 使用 input() 讓使用者輸入數字
# input() 取得的是字串（string）
# 因此需要使用 int() 轉換成整數（integer）
num = int(input("請輸入一個數字（這會影響每個音符的節拍長度）: "))

# 【題號2】
# 計算音符播放時間
# 將輸入數字乘以 0.5 秒
# 例如：
# 如果輸入 2
# 則 beat = 2 * 0.5 = 1.0 秒
beat = num * 0.5

# 顯示目前節拍長度
# str() 的功能：
# 將數字轉換成字串，方便與文字一起顯示
print("目前的播放速度（節拍長度）為: " + str(beat) + " 秒")

# 【題號3】
# 播放《小星星》的兩個音
# C → G

# 播放第一個音：中央 C（Do）
# MIDI 編號(音高)是 60
player.note_on(60, 100)

# 暫停 beat 秒
# 讓音符持續播放
time.sleep(beat)

# 停止播放 C 音
player.note_off(60, 100)

# 播放第二個音：G（Sol）
# MIDI 編號(音高)是 67
player.note_on(67, 100)

# 維持播放時間
time.sleep(beat)

# 停止播放 G 音
player.note_off(67, 100)</pre>
        <p><strong>程式執行結果(假設輸入)：</strong></p>
        <pre>請輸入一個數字（這會影響每個音符的節拍長度）: 2

程式輸出：
目前的播放速度（節拍長度）為: 1.0 秒

🎵 接著會播放：
C → G（Do → Sol）</pre>

        <h2 id="section1-2">2. 串列與相關處理函數</h2>

        <h3>重點語法</h3>

        <h4>(一) 串列（List）是什麼？</h4>
        <p>
            串列（List）可以想成：「一個可以放很多資料的小盒子」。<br>
            裡面可以放：音符、數字、文字<br><br>
            如下程式碼：
        </p>
        <pre>melody = ["C", "D", "E"]</pre>
        <p>
            [] 代表建立一個串列。串列中放了 3 個音符：<br>
            C（Do）<br>
            D（Re）<br>
            E（Mi）
        </p>
        <h5>🎵 音樂情境小舉例</h5>
        <p>
            這個串列就像一小段樂譜：<code>["C", "D", "E"]</code><br>
            代表：🎵 Do → Re → Mi<br>
            程式之後可以依照順序播放音樂。
        </p>

        <h4>(二) 串列中的資料有順序</h4>
        <p>
            串列中的資料都有自己的位置。<br>
            位置稱為：索引（index）<br>
            Python 的索引是：從 0 開始算。如下：
        </p>
        <table>
            <tr><th>位置(index)</th><th>資料</th></tr>
            <tr><td>0</td><td>"C"</td></tr>
            <tr><td>1</td><td>"D"</td></tr>
            <tr><td>2</td><td>"E"</td></tr>
        </table>
        <p>如下程式碼：</p>
        <pre>melody = ["C", "D", "E"]
print(melody[0])
print(melody[1])</pre>
        <p>程式執行結果：</p>
        <pre>C
D</pre>
        <p>
            程式邏輯說明：<br>
            melody[0]代表取得第 1 個音符。<br>
            melody[1]代表取得第 2 個音符。<br>
            雖然是第 1 個資料，但索引要從 0 開始。
        </p>
        <h5>🎵 音樂情境小舉例</h5>
        <p>
            如果：<code>melody = ["Do", "Re", "Mi"]</code><br>
            那麼：<code>melody[0]</code> 就是 Do 🎵
        </p>

        <h4>(三) len()：取得串列長度</h4>
        <p>len() 的功能是：計算串列中有幾個資料。如下程式碼：</p>
        <pre>melody = ["C", "D", "E"]
print(len(melody))</pre>
        <p>程式執行結果：</p>
        <pre>3</pre>
        <p>
            程式邏輯說明：<br>
            melody 串列中有：C、D、E，共 3 個資料。<br>
            因此：len(melody) 會得到：3
        </p>
        <h5>🎵 音樂情境小舉例</h5>
        <p>如果 melody 有很多音符，len(melody)就可以知道：「這段旋律共有幾個音符」🎵</p>

        <h4>(四) 串列如何新增資料（append）</h4>
        <p>append() 的功能是：在串列最後加入新資料。如下程式碼：</p>
        <pre>melody = ["C", "D", "E"]
melody.append("F")

# 原本：["C", "D", "E"]
# 加入後變成：["C", "D", "E", "F"]</pre>
        <h5>🎵 音樂情境小舉例</h5>
        <p>原本旋律只有：🎵 Do → Re → Mi<br>
        加入 "F" 後：🎵 Do → Re → Mi → Fa，旋律變長了。</p>

        <h4>(五) 串列如何修改資料</h4>
        <p>可以直接改變串列中的資料。如下程式碼：</p>
        <pre>melody = ["C", "D", "E"]
melody[0] = "G"

# 修改後：["G", "D", "E"]</pre>
        <p>
            程式邏輯說明：<br>
            melody[0]代表第 1 個位置。<br>
            因此：melody[0] = "G"，會把原本的 "C" 改成 "G"。
        </p>
        <h5>🎵 音樂情境小舉例</h5>
        <p>原本：🎵 Do → Re → Mi<br>
        修改後：🎵 Sol → Re → Mi，第一個音變了 🎵</p>

        <h4>(六) 刪除資料（remove）</h4>
        <p>remove() 的功能是：刪除指定資料。如下程式碼：</p>
        <pre>melody = ["C", "D", "E"]
melody.remove("D")

# 刪除後：["C", "E"]</pre>
        <p>
            程式邏輯說明：<br>
            "D" 被刪除了。<br>
            因此串列只剩：C、E
        </p>
        <h5>🎵 音樂情境小舉例</h5>
        <p>原本旋律：🎵 Do → Re → Mi<br>
        刪除 Re 後：🎵 Do → Mi<br>
        旋律中的一個音被拿掉了。</p>

        <hr>

        <h3>範例程式說明</h3>

        <h4>範例(一)：串列基本操作練習</h4>
        <p>
            請撰寫一段程式，完成以下功能：<br><br>
              1. 建立一個串列，內容為：["apple", "banana", "cherry"]<br>
              2. 印出串列中的第一個水果<br>
              3. 在串列最後新增一個水果 "orange"<br>
              4. 印出更新後的串列長度<br><br>
            提示：<br>
              • 串列建立：[]<br>
              • 索引取值：fruits[0]<br>
              • 新增資料：append()<br>
              • 長度計算：len()
        </p>
        <pre>參考程式：

# 【題號1】
# 建立串列（List）
# 串列可以存放多個資料
# 這裡存放 3 個水果名稱
fruits = ["apple", "banana", "cherry"]

# 【題號2】
# 取出串列中的第一個水果
# 索引（index）從 0 開始
# fruits[0] 代表第一個位置
print("第一個水果是:", fruits[0])

# 【題號3】
# 使用 append() 在串列最後新增資料
# 將 "orange" 加到 fruits 串列最後面
fruits.append("orange")

# 【題號4】
# 使用 len() 計算串列長度
# len(fruits) 代表目前串列中有幾個資料
print("目前共有", len(fruits), "個水果")</pre>
        <p><strong>程式執行結果：</strong></p>
        <pre>第一個水果是: apple
目前共有 4 個水果</pre>

        <h4>範例(二)：使用串列播放小星星旋律</h4>
        <img src="{{ asset('img/star.png') }}" alt="小星星五線譜">
        <p>
            此行五線譜是《小星星》的第一句旋律，此行歌詞為一閃一閃亮晶晶(Twinkle, twinkle, little star)<br><br>
            請撰寫一段程式，完成以下功能：<br><br>
              1. 建立串列：["C", "C", "G", "G"]<br>
              2. 印出第一個音符<br>
              3. 依序播放每個音符
        </p>
        <pre>參考程式：

# 【前置準備】
# 匯入 time 套件
# 功能：控制音符播放時間
import time

# 匯入 pygame.midi 套件
# 功能：播放 MIDI 音樂
import pygame.midi

# 初始化 MIDI 系統
pygame.midi.init()

# 建立 MIDI 播放器
# 0 代表預設裝置
player = pygame.midi.Output(0)

# 設定樂器
# 0 = 鋼琴
player.set_instrument(0)

# 建立音符對照表
# 將音符名稱轉換成 MIDI 音高的數值
note_map = {
"C": 60, # Do
"G": 67 # Sol
}

# 【題號1】
# 建立串列（List）
# 串列中存放《小星星》前四個音符
melody = ["C", "C", "G", "G"]

# 【題號2】
# 印出第一個音符
# index（索引）從 0 開始
# melody[0] 代表第一個音符
print("第一個音符是:", melody[0])

# 設定每個音符播放時間
# 單位：秒
beat = 0.5

# 【題號3】
# 依序播放每個音符 (每個音符的播放流程都一樣)
# 🎵 第 1 個音：melody[0]
# 取得串列中的第 1 個音符（C）
note = melody[0]

# 將音符轉換成 MIDI 音高的數值
# C → 60
midi_num = note_map[note]

# 開始播放音符
player.note_on(midi_num, 100)

# 維持播放時間
time.sleep(beat)

# 停止播放音符
player.note_off(midi_num, 100)

# 🎵 第 2 個音：melody[1]
# 所有播放流程的程式碼，都和第1個音相同，請參考🎵第1個音的註解說明
note = melody[1]
midi_num = note_map[note]
player.note_on(midi_num, 100)
time.sleep(beat)
player.note_off(midi_num, 100)

# 🎵 第 3 個音：melody[2]
# 所有播放流程的程式碼，都和第1個音相同，請參考🎵第1個音的註解說明
note = melody[2]
midi_num = note_map[note]
player.note_on(midi_num, 100)
time.sleep(beat)
player.note_off(midi_num, 100)

# 🎵 第 4 個音：melody[3]
# 所有播放流程的程式碼，都和第1個音相同，請參考🎵第1個音的註解說明
note = melody[3]
midi_num = note_map[note]
player.note_on(midi_num, 100)
time.sleep(beat)
player.note_off(midi_num, 100)</pre>
        <p><strong>程式執行結果：</strong></p>
        <pre>第一個音符是：C

🎵 接著程式會播放：
C → C → G → G
（Do → Do → Sol → Sol）</pre>

    </div>
</div>
@endsection
