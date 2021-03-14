<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Document</title>
  </head>
  
  <body onload=startConverting()>
    <div class="quizHead">
      <form class="form" method="get" action="/">
        @csrf
        <button>戻る</button>
      </form>
      <div class="countDown">
        <span id="countDownNum"></span>
      </div>
      <div class="counter">
        <p>Done Counter</p>
        <div class="counterNum">
          <span id="numerator">3</span>/<span id="denominator">50</span>
        </div>
      </div>
    </div>
    <div class="quizMain">
      <div class="jsentence">
        <span class="front">私は（今）サンドイッチを食べています。</span>
      </div>
      <div class="esentence">
        <span id="answer"></span>
      </div>
      
      <div class="speechRecog">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <div id="result"></div>
      </div>
    </div>
    <div class="hints">
      <button id="wordage">wordage</button>
      <button id="initial">initial</button>
      <button id="moreHints">more hints</button>
    </div>

  </body>

  <script>

    /* Voice Recog */
		var result = document.getElementById('result');
    var myAnswer = document.getElementById('answer');
    var answerOne = "yo como un bocadillo".split(' ')
  
  function startConverting () {

  if('webkitSpeechRecognition' in window) {
    var speechRecognizer = new webkitSpeechRecognition();
    speechRecognizer.continuous = true;
    speechRecognizer.interimResults = true;
    speechRecognizer.lang = 'es-ES';
    speechRecognizer.start();

    var finalTranscripts = '';

    speechRecognizer.onresult = function(event) {
      var interimTranscripts = '';
      for(var i = event.resultIndex; i < event.results.length; i++){
        var transcript = event.results[i][0].transcript;
        transcript.replace("\n", "<br>");
        if(event.results[i].isFinal) {
          finalTranscripts += transcript;
        }else{
          interimTranscripts += transcript;
        }
      }
      result.innerHTML = finalTranscripts + '<span style="color: #999">' + interimTranscripts + '</span>';

      /* Trying to get array from result */
      var updatedResultArray = document.getElementById('result').innerText.split(' ');
      console.log(updatedResultArray+ '  (before for');

      /* Check if it is collect or not */
      var tempAns = [];

      for (let i = 0, j = 0; i < updatedResultArray.length; ){
        if (updatedResultArray[i] === answerOne[j]){
          tempAns.push(updatedResultArray[i]);
          console.log(tempAns);
          i += 1;
          j += 1;
        } else {
          i += 1;
        }
        myAnswer.innerHTML = tempAns.join(' ');
      }
    };
    speechRecognizer.onerror = function (event) {

    };
  }else {
    result.innerHTML = 'Your browser is not supported. Please download Google chrome or Update your Google chrome!!';
  }	
  }

  /* timer */
  const totalTime = 10000; // 10秒
  const oldTime = Date.now();

  const timerId = setInterval(() => {
    const currentTime = Date.now();
    // 差分を求める
    const diff = currentTime - oldTime;

    // 残りミリ秒を計算する
    const remainMSec = totalTime - diff;
    // ミリ秒を整数の秒数に変換する
    const remainSec = Math.ceil(remainMSec / 1000);

    let label = `残り${remainSec}秒`;

    // 0秒以下になったら
    if (remainMSec <= 0) {
      // タイマーを終了する
      clearInterval(timerId);

      // タイマー終了の文言を表示
      label = '終了';
    }

    // 画面に表示する
    document.querySelector('#countDownNum').innerHTML = label;
  }, 1000);
  </script>
</html>