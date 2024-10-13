<script>
</script>
<div class="block"><br>
	<div class="grid grid-cols-2">
		<div class=""><img src="../img/steps.png"></div>
		<div class="Bebas " style="font-weight:bold;font-size:40px"><span id="time" >60:00</span> expires in<br>60 minutes
		</div>
	</div>
<br><br>
		<div id="whoyouaretest" class="" style="margin:0 auto;  text-align: left;">
<form method="" >

		<?php foreach($questions as $q) {?>

		<table class="" style="width:100vw">
			<tr>
        <td class="center" style="width:30px"><?=$q->{'question'}?>.</td>

		<td class="" style="background-image:url('../img/shade 1.png');  background-position: center; /* Center the image */;width:45vw ;border: 1px solid gray">
		<label class="container">
			<input type="radio"  name="radio<?=$q->{'question'}?>" id="radio<?=$q->{'question'}?><?=$q->{'AA'}?>"  value="<?=$q->{'AA'}?>"/>
			<?=$q->{'QA'}?>
		<span class="checkmark"></span>
		</label>
		</td>
	
		<td class="" style="background-image:url('../img/shade 2.png') ;  background-position: center; /* Center the image */;width:45vw;border: 1px solid gray">
		<label class="container">
			<input type="radio"  name="radio<?=$q->{'question'}?>" id="radio<?=$q->{'question'}?><?=$q->{'AB'}?>" value="<?=$q->{'AB'}?>"/>
			<?=$q->{'QB'}?>
			<span class="checkmark"></span>
		</label>
		</td>
			</tr>
		</table><br>
		<?php }?>
		<input  value="Next" style="height:50px; background-color:red;color:white;border:1px solid red;width:180px;font-size:24px;font-weight:bold;cursor:pointer;" onclick="return checkAnswer();"></input>
		<input type="text" value="<?php echo $email?>" name="email" id="email">
</form>
	  </div>
	  <div id="whoyouareresult" style="display:none">
	  
	  <form action="/whoyouaretest/action" method="post" class="list list-strong-ios list-dividers-ios list-outline-ios">
	  <label for="fname">First name:</label><br>
	  <input type="text" id="fname" name="fname" value="" required="required"><br>
	  <label for="lname">Last name:</label><br>
	  <input type="text" id="lname" name="lname" value="" required="required"><br>
	  <label for="mobile">Mobile #:</label><br>
	  <input type="text" id="mobile" name="mobile" value="" required="required"><br>
	  <label for="email">Email:</label><br>
	  <input type="text" id="email" name="email" value="<?php echo $email?>" required="required"><br><br>
	  <input type="hidden" id="A" name="A" value="" required="required">
	  <input type="hidden" id="B" name="B" value="" required="required">
	  <input type="hidden" id="C" name="C" value="" required="required">
	  <input type="hidden" id="D" name="D" value="" required="required">
	  <input type="hidden" id="E" name="E" value="" required="required">
	  <input type="hidden" id="F" name="F" value="" required="required">
	  <input type="hidden" id="G" name="G" value="" required="required">
	  <input type="hidden" id="H" name="H" value="" required="required">
	  <input type="hidden" id="I" name="I" value="" required="required">
	  <input type="hidden" id="TotalAll" name="TotalAll" value="" required="required">
	  <input type="hidden" id="ResultAll" name="ResultAll" value="" required="required">
	  Result
	  <input type="text" id="ResultNum" name="ResultNum" value="" required="required">
	  <div id="CountA" style="display:none" >0</div>
		   <div id="CountB" style="display:none" >0</div>
		   <div id="CountC" style="display:none" >0</div>
		   <div id="CountD" style="display:none" >0</div>
		   <div id="CountE" style="display:none" >0</div>
		   <div id="CountF" style="display:none" >0</div>
		   <div id="CountG" style="display:none" >0</div>
		   <div id="CountH" style="display:none" >0</div>
		   <div id="CountI" style="display:none" >0</div>
		   <div id="AnswerAA"  style="display:none"  >0</div>
		   <div id="AnswerBB"  style="display:none" >0</div>
		   <div id="Total"  style="display:none" >0</div>

	  <input type="submit" value="Submit">
  </form> 
	</div>
</div>
<script>
function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}

window.onload = function () {
    var fiveMinutes = 60 * 60,
        display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
};
</script>
<style>
table {
  border-spacing: 10px;
}
.center {
  display: flex;
  justify-content: center;
  align-content: center;
  flex-direction: column;
  padding:5px;
}

.grid-container {
  display: grid;
  grid-template-columns: 30px 600px 600px;
  grid-gap: 10px;
  padding: 10px;
}

/* The container */
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  padding-right: 30px;
  
  margin-top: 12px;
  
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 20px;
  font-weight:bold;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: ;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) *
.container .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}



</style>