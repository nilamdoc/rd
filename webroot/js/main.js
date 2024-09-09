// main.js
var app = new Framework7({
  root: '#app',
  init: true,
  id: 'team.sff.mall',
  name: 'SFF-Mall',
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
	console.log("hi");
	
}
function goto(div){
	console.log(div);
	
}