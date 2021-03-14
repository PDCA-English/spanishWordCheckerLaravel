<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <title>Spanish Phrases Master</title>
</head>
<body>
  <header>
    <form class="form" method="post" action="/quiz">
      @csrf
      <button>
        START
      </button>
    </form>
    <div class="infoContent">
        <div class="first-line">
          <h3>Chosen Section:<span id="checkedNum">ココに番号</span></h3>
          <h3>Total Phrases:<span class="number">ココに番号</span></h3>
        </div>
        <div class="second-line">
          <label>
            <input type="checkbox" name="mode" value="countDownMode">Count Down Mode
          </label>
          <label>
            <input type="checkbox" name="mode" value="noHint">No Hint
          </label>
        </div>
      </div>
  </header>
  <div class="toc">
    <h2>CONTENTS</h2>
    <label class="chapterContent">
      <input id="chapterOne" type="checkbox" onclick="js_check_toggle('chapterOne')" >Chapter 1
    </label>
    <div class="sectionContents" name="my">
      <form id="sections" method="get" action="prjFormEvent.js">
        <label>
          <input class="chapterOne"
          type="checkbox"
          name="section"
          value="item1"
          onclick="getCheckedOnes()">01 現在形
        </label>
        <label>
          <input class="chapterOne"
          type="checkbox"
          name="section"
          value="item2"
          onclick="getCheckedOnes()">02 過去形
        </label>
        <label>
          <input class="chapterOne"
          type="checkbox"
          name="section"
          value="item3"
          onclick="getCheckedOnes()">03 未来形
        </label>
        <label>
          <input class="chapterOne"
          type="checkbox"
          name="section"
          value="item4"
          onclick="getCheckedOnes()">04 進行形
        </label>
        <label>
          <input class="chapterOne"
          type="checkbox"
          name="section"
          value="item5"
          onclick="getCheckedOnes()">05 再帰動詞
        </label>
        <label>
          <input class="chapterOne"
          type="checkbox"
          name="section"
          value="item6"
          onclick="getCheckedOnes()">06 接続法
        </label>
        <label>
          <input class="chapterOne"
          type="checkbox"
          name="section"
          value="item7"
          onclick="getCheckedOnes()">07 目的語の代名詞
        </label>
      </form>
    </div>
  </div>


</body>

<script>
  //Check Children if their Parents are Checked
  function js_check_toggle(id) {
    var parent = document.getElementById(id);
    var children = document.getElementsByClassName(id);
    for(var i = 0; i < children.length; i++) {
      if(parent.checked === false) {
        children[i].checked = false;
      }else{
        children[i].checked = true;
      }
    }
  }

  //Count the Number of Checked Items
  var getChoosen = new Array();
  getChoosen["item1"] = 1;
  getChoosen["item2"] = 1;
  getChoosen["item3"] = 1;
  getChoosen["item4"] = 1;
  getChoosen["item5"] = 1;
  getChoosen["item6"] = 1;
  getChoosen["item7"] = 1;

  function getCheckedOnes()
  {
      var rTotal = 0;
      var selectedRealistic = document.forms["sections"]["section"];

      for (var sel = 0; sel < selectedRealistic.length; sel++)
      {
        if (selectedRealistic[sel].checked)
            rTotal += getChoosen[selectedRealistic[sel].value]
      }
        
      document.getElementById("checkedNum").innerHTML = rTotal
  }




</script>
</html>