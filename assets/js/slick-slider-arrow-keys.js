$=jQuery;
$(document).ready(function() {
  document.onkeydown = checkKey;
});

function checkKey(e) {

  e = e || window.event;

  if (e.keyCode == '37') {
    console.log('left');
    $('.prevArrow').click();
  }
  else if (e.keyCode == '39') {
    console.log('right');
    $('.nextArrow').click();
  }

}