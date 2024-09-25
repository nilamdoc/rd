<script type="text/javascript" src="../js/npt.js"></script>
<div class="page-content">
          <div class="row">
					<div class="col">
						<div class="elevation-20 text-align-center" >
						<h1 id="timeleft"></h1>
						<h2 id="Questions"></h2>
						</div>
					</div>
			</div>
		   
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

		   <div id="NPTresult"  ></div>
		   <div id="Information"  ></div>
<style>
table {
	border-collapse: collapse;
  width: 100%;
}
</style>
  <div>
  <div class="block block-strong inset elevation-20" style="border:3px solid gray" id="AnswerA" onclick="showSelected()"  onmouseover="" name="AnswerA">
	<table width="col:100%">
		<tr>
			<td col="20px"><label class="radio"><input type="radio" name="Question" id="QuestionA" ><i class="icon-radio"></i></label></td>
			<td col="45%"><h2 id="QuestionA" ></h2></td>
			<td col="45%"><h2 id="QuestionHA" ></h2></td>
			<input type="hidden" value="" id="AA">
			<input type="hidden" value="" id="Ques">
			
			</td>
		</tr>
	</table>
	</div>
	</div>
  <div class="block block-strong inset elevation-20" style="border:3px solid gray" id="AnswerB" onclick="showSelected()" name="AnswerB">
  <table>
		<tr>
			<td col="20px"><label class="radio"><input type="radio" name="Question" id="QuestionB"><i class="icon-radio"></i></label></td>
			<td col="45%"><h2 id="QuestionB"></h2></td>
			<td col="45%"><h2 id="QuestionHB" ></h2></td>
			<input type="hidden" value="" id="AB">
			</td>
		</tr>
	</table>
	</div>
		<div class="block block-strong inset elevation-20" style="border:3px solid gray">
		<h2 id="Selected"></h2>
		<h2 id="SelectedH"></h2>
		<a onclick="" class="button button-fill button-large"  id="nextQues"><span style="text-weight:bold">Next</span></a>
		</div>
	</div>
  <div class="block block-strong inset elevation-20" style="border:3px solid gray;display:none" id="ContactInfo" >
  <form action="/whoyouare/action" method="post" class="list list-strong-ios list-dividers-ios list-outline-ios">
	  <label for="fname">First name:</label><br>
	  <input type="text" id="fname" name="fname" value="" required="required"><br>
	  <label for="lname">Last name:</label><br>
	  <input type="text" id="lname" name="lname" value="" required="required"><br>
	  <label for="mobile">Mobile #:</label><br>
	  <input type="text" id="mobile" name="mobile" value="" required="required"><br>
	  <label for="email">Email:</label><br>
	  <input type="text" id="email" name="email" value="" required="required"><br><br>
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
	  <input type="hidden" id="ResultNum" name="ResultNum" value="" required="required">
	  
	  <input type="submit" value="Submit">
  </form> 
	</div>
  
  
  </div>

<!-- 
<div class="block block-strong inset elevation-20" style="border:3px solid gray;text-align:center" id="prevQuestion" onclick="prevQuestion()">
	<h2>Previous</h2>
</div>
-->
<script>nptest(144)</script>
