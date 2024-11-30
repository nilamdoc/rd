// main.js
var $$ = Dom7;
var host = window.location.protocol +'//' +window.location.host  + '/personality' + '/';
var storage = 'npt';

var app = new Framework7({
  root: '#app',
  init: true,
  id: 'com.ruchidoctor.app',
  name: 'RuchiDoctor',
  theme: 'auto',
  template7Pages: true,
  allowDuplicateUrls: true,
  allowPageChange: true,
  closeByBackdropClick: false,
  stackPages: true,
  smartSelect: {
   pageTitle: 'Select Option',
   openIn: 'popup',
  },
  swiper: {
   initialSlide: 0,
   spaceBetween: 10,
   speed: 300,
   loop: false,
   preloadImages: true,
   zoom: {
    enabled: true,
    maxRatio: 3,
    minRatio: 1,
   },
   lazy: {
    enabled: true,
   },
  },
  photoBrowser: {
   type: 'popup',
  },
  touch: {
   materialRipple: false,
   tapHold: true,
   disableContextMenu: false,
   activeState: true,
   fastClicks: true,
  },
  pushState: false,
  toast: {
   closeTimeout: 3000,
   closeButton: true,
  },
 // routes: routes,
   panel: {
    swipe: true,
  },
  calendar: {
   url: 'calendar/',
   dateFormat: 'dd/mm/yyyy',
  },
  lazy: {
   threshold: 50,
   sequential: false,
  },
 });
function Start(){
//	console.log("hi");
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
	
}
function goto(div){
//	console.log(div);
	
}

function checkAnswer(){
	localStorage.setItem(storage+'.A',0);
	localStorage.setItem(storage+'.B',0);
	localStorage.setItem(storage+'.C',0);
	localStorage.setItem(storage+'.D',0);
	localStorage.setItem(storage+'.E',0);
	localStorage.setItem(storage+'.F',0);
	localStorage.setItem(storage+'.G',0);
	localStorage.setItem(storage+'.H',0);
	localStorage.setItem(storage+'.I',0);
	
	
	
 for (let i = 1; i < 37; i++){ 
	 var Radio = "radio"+i;

var radios = document.getElementsByName(Radio);
var k =0;
for (var j = 0, length = radios.length; j < length; j++) {
  if (radios[j].checked) {
    // do whatever you want with the checked radio
    //alert(radios[j].value);
		k++;
		break;
    // only one radio can be logically checked, don't check the rest
    }else{
	  if(k<3){
//		  alert("Not clicked "+ i);
	  }
	  break;
  }
}
	
 }
	
	
	
	
	
	
 for (let i = 1; i < 37; i++){ 
	 var Radio = "radio"+i;

var radios = document.getElementsByName(Radio);




for (var j = 0, length = radios.length; j < length; j++) {
  if (radios[j].checked) {
    // do whatever you want with the checked radio

		var answer = radios[j].value;
		switch(answer) {
  case "A":
			localStorage.setItem(storage+'.A',parseInt(localStorage[storage+'.A'])+1);
    break;
  case "B":
			localStorage.setItem(storage+'.B',parseInt(localStorage[storage+'.B'])+1);
		break;
  case "C":
			localStorage.setItem(storage+'.C',parseInt(localStorage[storage+'.C'])+1);
		break;
  case "D":
			localStorage.setItem(storage+'.D',parseInt(localStorage[storage+'.D'])+1);
			break;
  case "E":
			localStorage.setItem(storage+'.E',parseInt(localStorage[storage+'.E'])+1);
			break;
  case "F":
			localStorage.setItem(storage+'.F',parseInt(localStorage[storage+'.F'])+1);
			break;
  case "G":
			localStorage.setItem(storage+'.G',parseInt(localStorage[storage+'.G'])+1);
			break;
  case "H":
			localStorage.setItem(storage+'.H',parseInt(localStorage[storage+'.H'])+1);
			break;
  case "I":
			localStorage.setItem(storage+'.I',parseInt(localStorage[storage+'.I'])+1);
			break;
  default:
			break;
    // code block
	
	};

}
  
  
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
	console.log(newArray)
	obj = newArray;
	var result = Object.keys(obj).reduce((a, b) => obj[a] > obj[b] ? a : b);
	
	console.log(result);
	
    // only one radio can be logically checked, don't check the rest
   $$("#whoyouaretest").hide();
   $$("#whoyouareresult").show();
  $$("#A").value(parseInt(localStorage[storage+'.A']));
  $$("#B").value(parseInt(localStorage[storage+'.B']));
  $$("#C").value(parseInt(localStorage[storage+'.C']));
  $$("#D").value(parseInt(localStorage[storage+'.D'])); 
  $$("#E").value(parseInt(localStorage[storage+'.E']));
  $$("#F").value(parseInt(localStorage[storage+'.F']));
  $$("#G").value(parseInt(localStorage[storage+'.G']));
  $$("#H").value(parseInt(localStorage[storage+'.H']));
  $$("#I").value(parseInt(localStorage[storage+'.I']));
  $$('#TotalAll').value(parseInt($$("#Total").html()));
	
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
  3
  }		
  
}










function checkEmail(email){
const validateEmail = (email) => {
  return String(email)
    .toLowerCase()
    .match(
      /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
	};
}