var $$ = Dom7;
var host = window.location.protocol +'//' +window.location.host  + '/personality' + '/';
var storage = 'npt';
questionsServer()


async function questionsServer(){
		const response = await fetch(host,{
			  method: "post",
  headers: {
    'Accept': 'application/json',
    'Content-Type': 'application/json'
		}},
);
		const questions = await response.json();
		questionsserver = JSON.stringify(questions);
		console.log(questionsserver)
		localStorage.setItem(storage+'.datapersonality',questionsserver);
}
if(!typeof localStorage[storage+".datapersonality"] === 'undefined'){  
	
	}else{
		var submitURL = host;
//console.log(submitURL);
		
	}


function nptest(questions){ 
	localStorage.removeItem(storage+".Result");
	localStorage.removeItem(storage+".Info.name");
	localStorage.removeItem(storage+".Info.email");
	localStorage.removeItem(storage+".Info.mobile");
	localStorage.removeItem(storage+".Info.gender");
	localStorage.setItem(storage+'.A',0);
	localStorage.setItem(storage+'.B',0);
	localStorage.setItem(storage+'.C',0);
	localStorage.setItem(storage+'.D',0);
	localStorage.setItem(storage+'.E',0);
	localStorage.setItem(storage+'.F',0);
	localStorage.setItem(storage+'.G',0);
	localStorage.setItem(storage+'.H',0);
	localStorage.setItem(storage+'.I',0);
	var currentdate = new Date().getTime();  
if(questions==36){ 
	var deadline = addMinutes(currentdate,10);
}else{
	var deadline = addMinutes(currentdate,60);
}
 x = setInterval(function() { 
var now = new Date().getTime(); 
 t = deadline - now; 
var days = Math.floor(t / (1000 * 60 * 60 * 24)); 
var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60)); 
var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60)); 
var seconds = Math.floor((t % (1000 * 60)) / 1000); 
document.getElementById("timeleft").innerHTML = 
//days + "d " + hours + "h " + 
minutes + " minutes " + seconds + " seconds"; 
    if (t < 0) { 
        clearInterval(x); 
        document.getElementById("timeleft").innerHTML = "EXPIRED"; 
    } 
}, 1000); 



var ii = 1;

showquestion (ii,questions);
}

function showSelected(){
		var gotData = JSON.parse(localStorage[storage+".datapersonality"]);
		var nextQues = parseInt($$("#Ques").value())+1;
var nextQuestionA = 'nextquestion('+nextQues+',"'+$$('#AA').value()+'",'+144+')';
var nextQuestionB = 'nextquestion('+nextQues+',"'+$$('#AB').value()+'",'+144+')';
	
	
	if($$("#QuestionA").prop('checked')==true){
		
	document.getElementById("Selected").innerHTML=$$("#QuestionA").html();
	document.getElementById("SelectedH").innerHTML=$$("#QuestionHA").html();
	$$("#nextQues").attr('onclick',nextQuestionA);
		
	}else{
	document.getElementById("Selected").innerHTML=$$("#QuestionB").html();
	document.getElementById("SelectedH").innerHTML=$$("#QuestionHB").html();
	$$("#nextQues").attr('onclick',nextQuestionB);
	}
}


function showquestion(i,questions){
	$$("#Question").prop('checked', false);
	$$("#Selected").html("");
	$$("#SelectedH").html("");
	if(i<=145){
		
	var gotData = JSON.parse(localStorage[storage+".datapersonality"]);
//console.log(gotData);
	$$("#Questions").html((parseInt(i))+"/"+questions+" questions");
	$$("#Ques").value(parseInt(i));
	$$("#prevQuestions").html(("Previous "+parseInt(i))+"/"+questions);
	
	$$("#QuestionA").html(gotData['questions'][i]['QA']);
	$$("#QuestionB").html(gotData['questions'][i]['QB']);
	$$("#AA").value(gotData['questions'][i]['AA']);
	$$("#AB").value(gotData['questions'][i]['AB']);
	$$("#QuestionHA").html(gotData['questions'][i]['HA']);
	$$("#QuestionHB").html(gotData['questions'][i]['HB']);
	var nextQuestionA = 'nextquestion("'+(parseInt(i)+1)+'","'+gotData['questions'][i]['AA']+'","'+questions+'")';
	var nextQuestionB = 'nextquestion("'+(parseInt(i)+1)+'","'+gotData['questions'][i]['AB']+'","'+questions+'")';
	//var prevQuestion = 'prevquestion("'+(parseInt(i)-1)+'","'+questions+'")';
	//console.log(prevQuestion)
	// $$("#AnswerA").attr('onclick',nextQuestionA);
	$$("#AnswerA").attr('style',gotData['questions'][i]['color']);

//	$$("#AnswerB").attr('onclick',nextQuestionB);
	$$("#AnswerB").attr('style',gotData['questions'][i]['color']);
	//$$("#prevQuestion").attr('onclick',prevQuestion);
	console.log($$("#nextQues").attr("onclick"));
	}
}

function stoptest(){
	clearInterval(x);
	t = -1;
}
function prevquestion(i,questions){
	if(i==0){}else{
		showquestion(i,questions);
	}
}

function nextquestion(i,answer, questions){
	
	if(i<=144){
			//j =i-1;
			
			//('style',"border:3px solid gray;background-color:pink");
		//	localStorage.setItem(storage+'.datapersonality',questions);
			
	showquestion(i,questions);
	
	switch(answer) {
  case "A":
				$$("#CountA").html(parseInt($$("#CountA").html())+1);
				localStorage.setItem(storage+'.A',parseInt($$("#CountA").html())+1);
    break;
  case "B":
				$$("#CountB").html(parseInt($$("#CountB").html())+1);
				localStorage.setItem(storage+'.B',parseInt($$("#CountB").html())+1);
				break;
  case "C":
				$$("#CountC").html(parseInt($$("#CountC").html())+1);
				localStorage.setItem(storage+'.C',parseInt($$("#CountC").html())+1);
    break;
  case "D":
				$$("#CountD").html(parseInt($$("#CountD").html())+1);
				localStorage.setItem(storage+'.D',parseInt($$("#CountD").html())+1);
    break;
  case "E":
				$$("#CountE").html(parseInt($$("#CountE").html())+1);
				localStorage.setItem(storage+'.E',parseInt($$("#CountE").html())+1);
				break;
  case "F":
				$$("#CountF").html(parseInt($$("#CountF").html())+1);
				localStorage.setItem(storage+'.F',parseInt($$("#CountF").html())+1);
    break;
  case "G":
				$$("#CountG").html(parseInt($$("#CountG").html())+1);
				localStorage.setItem(storage+'.G',parseInt($$("#CountG").html())+1);
    break;
  case "H":
				$$("#CountH").html(parseInt($$("#CountH").html())+1);
				localStorage.setItem(storage+'.H',parseInt($$("#CountH").html())+1);
				break;
  case "I":
				$$("#CountI").html(parseInt($$("#CountI").html())+1);
				localStorage.setItem(storage+'.I',parseInt($$("#CountI").html())+1);
    break;
  default:
			break;
    // code block
	} 
	$$("#Total").html(parseInt($$("#CountA").html())+parseInt($$("#CountB").html())+parseInt($$("#CountC").html())+parseInt($$("#CountD").html())+parseInt($$("#CountE").html())+parseInt($$("#CountF").html())+parseInt($$("#CountG").html())+parseInt($$("#CountH").html())+parseInt($$("#CountI").html()));
	$$('#A').value(localStorage[storage+".A"]);
	$$('#B').value(localStorage[storage+".B"]);
	$$('#C').value(localStorage[storage+".C"]);
	$$('#D').value(localStorage[storage+".D"]);
	$$('#E').value(localStorage[storage+".E"]);
	$$('#F').value(localStorage[storage+".F"]);
	$$('#G').value(localStorage[storage+".G"]);
	$$('#H').value(localStorage[storage+".H"]);
	$$('#I').value(localStorage[storage+".I"]);
	$$('#TotalAll').value(parseInt($$("#Total").html()));
	
	var newArray = [];
	var valA = localStorage[storage+".A"];
	newArray['A'] = parseInt(valA); 
	var valB = localStorage[storage+".B"];
	newArray['B'] = parseInt(valB);
	var valC = localStorage[storage+".C"];
	newArray['C'] = parseInt(valC);
	var valD = localStorage[storage+".D"];
	newArray['D'] = parseInt(valD);
	var valE = localStorage[storage+".E"];
	newArray['E'] = parseInt(valE);
	var valF = localStorage[storage+".F"];
	newArray['F'] = parseInt(valF);
	var valG = localStorage[storage+".G"];
	newArray['G'] = parseInt(valG);
	var valH = localStorage[storage+".H"];
	newArray['H'] = parseInt(valH);
	var valI = localStorage[storage+".I"];
	newArray['I'] = parseInt(valI);
	
	obj = newArray;
	var result = Object.keys(obj).reduce((a, b) => obj[a] > obj[b] ? a : b);
	
//	console.log(result);
	
	
	$$('#ResultAll').value(result);
		switch(result){
			case "A":
				$$('#ResultNum').value(9);
				break;
			case "B":
				$$('#ResultNum').value(6);
				break;
			case "C":
				$$('#ResultNum').value(3);
				break;
			case "D":
				$$('#ResultNum').value(1);
				break;
			case "E":
				$$('#ResultNum').value(4);
				break;
			case "F":
				$$('#ResultNum').value(2);
				break;
			case "G":
				$$('#ResultNum').value(8);
				break;
			case "H":
				$$('#ResultNum').value(5);
				break;
			case "I":
				$$('#ResultNum').value(7);
				break;
			default:
				break;
		}
	if(i==questions){
//console.log(questions);
//console.log(i);
		$$('#AnswerA').hide();
		$$('#AnswerB').hide();
		$$('#ContactInfo').show();
		
//		      app.dialog.alert('Hello!');
//		app.dialog.alert("Complete", "Nine Personality Test");
//		mainView.router.navigate('/result/', { transition: 'f7-cover' });
		return false;		
	}
	}
	
}

function addMinutes(date, minutes) { 
    return date + minutes*60000;
}
function nptresult(){
	
	var Info = localStorage[storage+".Info.name"];
	console.log("Info",typeof localStorage[storage+".Info.name"])
	if((typeof localStorage[storage+".Info.name"])==="undefined"){
		$$("#NPTresult").hide();
		$$("#Information").show();
	}else{
		$$("#NPTresult").show();
		$$("#Information").hide();
	}
	
	var newArray = [];
	var valA = localStorage[storage+".A"];
	newArray['A'] = parseInt(valA); 
	var valB = localStorage[storage+".B"];
	newArray['B'] = parseInt(valB);
	var valC = localStorage[storage+".C"];
	newArray['C'] = parseInt(valC);
	var valD = localStorage[storage+".D"];
	newArray['D'] = parseInt(valD);
	var valE = localStorage[storage+".E"];
	newArray['E'] = parseInt(valE);
	var valF = localStorage[storage+".F"];
	newArray['F'] = parseInt(valF);
	var valG = localStorage[storage+".G"];
	newArray['G'] = parseInt(valG);
	var valH = localStorage[storage+".H"];
	newArray['H'] = parseInt(valH);
	var valI = localStorage[storage+".I"];
	newArray['I'] = parseInt(valI);
	
	obj = newArray;
	var result = Object.keys(obj).reduce((a, b) => obj[a] > obj[b] ? a : b);
	
	switch(result){
		case "A":
		$$("#NPType").html('<a href="/9/" class="link">9 - NINE - THE PEACEMAKER</a>');
		localStorage.setItem(storage+'.Result',"9");
		break;
		case "B":
		$$("#NPType").html('<a href="/6/" class="link">6 - SIX - THE LOYALIST</a>');
		localStorage.setItem(storage+'.Result',"6");
		break;
		case "C":
		$$("#NPType").html('<a href="/3/" class="link">3 - THREE - THE ACHIEVER</a>');
		localStorage.setItem(storage+'.Result',"3");
		break;
		case "D":
		$$("#NPType").html('<a href="/1/" class="link">1 - ONE - THE REFORMER</a>');
		localStorage.setItem(storage+'.Result',"1");
		break;
		case "E":
		$$("#NPType").html('<a href="/4/" class="link">4 - FOUR - THE INDIVIDUALIST</a>');
		localStorage.setItem(storage+'.Result',"4");
		break;
		case "F":
		$$("#NPType").html('<a href="/2/" class="link">2 - TWO - THE HELPER</a>');
		localStorage.setItem(storage+'.Result',"2");
		break;
		case "G":
		$$("#NPType").html('<a href="/8/" class="link">8 - EIGHT - THE CHALLENGER</a>');
		localStorage.setItem(storage+'.Result',"8");
		break;
		case "H":
		$$("#NPType").html('<a href="/5/" class="link">5 - FIVE - THE INVESTIGATOR</a>');
		localStorage.setItem(storage+'.Result',"5");
		break;
		case "I":
		$$("#NPType").html('<a href="/7/" class="link">7 - SEVEN - THE ENTHUSIAST</a>');
		localStorage.setItem(storage+'.Result',"7");
		break;
  default:
  dataError("You have not completed the Presonality Test");
  break;
	}
	
}

function getCelebrity(){
		var submitURL = personality_server+'persons';
		app.preloader.show();
		app.request.post(submitURL, '', function (data) {
		gotData = JSON.parse(data);
			console.log(gotData);
			var htmlnew = "";
			for(key in gotData['persons']){
				htmlnew = htmlnew + '     <li>\
				<a href="/'+gotData['persons'][key]['Type']+'/" class="item-link item-content">\
          <div class="item-inner">\
            <div class="item-title">'+gotData['persons'][key]['Type']+' : '+gotData['persons'][key]['Name']+'</div>\
												</div>\
					</a>\
        </li>\
					';
			}
			$$("#Celebrity").html(htmlnew);
			app.preloader.hide();
		}, 
		function () {
			toastBottomNoInternet.open();
					app.preloader.hide();
		});

	   
	var searchbar = app.searchbar.create({
  el: '.searchbar',
  searchContainer: '.list',
  searchIn: '.item-title',
  on: {
    search(sb, query, previousQuery) {
//      console.log(query, previousQuery);
    }
  }
});
}

function RegisterMe(){
	var $$ = Dom7;
	var formData = app.form.convertToData('#register-form');
	if(formData.name==""){
   app.dialog.alert("Please enter name.", "Register")
   app.input.focus("#name");
   return false;
  }
	if(formData.name.length<2){
   app.dialog.alert("Please enter first name.", "Register")
   app.input.focus("#name");
   return false;
  }
  if(formData.gender==""){
   app.dialog.alert("Please select gender.", "Register")
   return false;
  }
  if(formData.email==""){
   app.dialog.alert("Please enter correct email.", "Register")
   app.input.focus("#email");
   return false;
  }
		if(ValidateEmail(formData.email)==false){
   app.dialog.alert("Please enter correct email.", "Register")
   app.input.focus("#email");
   return false;
  }
  if(formData.mobile==""){
   app.dialog.alert("Please enter mobile.", "Register")
   return false;
  }
  if(formData.mobile.length!=10){
   app.dialog.alert("Please enter correct mobile.", "Register")
   return false;
  }
	var submitURL = personality_server+'register';		
	var form_data = new FormData();
 form_data.append("name", formData.name);
	form_data.append("gender", formData.gender);
	form_data.append("email", formData.email);
	form_data.append("mobile", formData.mobile);
	var mcaNumber = localStorage[storage + '.mcaNumber'];
	form_data.append('mcaNumber', mcaNumber);
	form_data.append("type", $$("#NPType").html()); 
	
	app.request.post(submitURL, form_data, function (data) {
		localStorage.setItem(storage+'.Info.mobile',mobile);
		localStorage.setItem(storage+'.Info.email',email);
		localStorage.setItem(storage+'.Info.name',name);
		localStorage.setItem(storage+'.Info.gender',gender);
  $$("#NPTresult").show();
		$$("#Information").hide();
 }, function () {
  toastBottomNoInternet.open();
  app.preloader.hide();
 });
}

function ValidateEmail(email) {
 var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
 if (email.match(mailformat)) {
  return (true)
 } else {
  return (false)
 }
}