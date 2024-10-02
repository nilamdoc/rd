<script>
</script>
<div class="block"><br>
<img src="../img/steps.png"><br><br><br><br>
		<div class="" style="margin:0 auto;  text-align: left;">
<form method="post" action="/whoyouaretest/register1">

		<?php foreach($questions as $q) {?>

		<div class="grid-container" style="height:120px">
        <div class="center" style="width:50px"><?=$q->{'question'}?>.</div>

		<div class="center" style="background-image:url('../img/shade 1.png'); ">
		<label class="container">
			<input type="radio"  name="radio<?=$q->{'question'}?>"  value="<?=$q->{'AA'}?>"/>
			<?=$q->{'QA'}?>
		<span class="checkmark"></span>
		</label>
		</div>
	
		<div class="center" style="background-image:url('../img/shade 2.png'); ">
		<label class="container">
			<input type="radio"  name="radio<?=$q->{'question'}?>"  value="<?=$q->{'AB'}?>"/>
			<?=$q->{'QB'}?>
		<span class="checkmark"></span>
		</label>
		</div>
		
		</div><br>
		<?php }?>
		<input type="submit" value="Next" style="height:50px; background-color:red;color:white;border:1px solid red;width:180px;font-size:24px;font-weight:bold;cursor:pointer;" onclick="checkAnswer();">
		<input type="text" value="<?php echo $email?>" name="email" id="email">
</form>
	  </div>
</div>
<style>
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
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 18px;
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
  background-color: #ccc;
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

/* Style the indicator (dot/circle) */
.container .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}



</style>