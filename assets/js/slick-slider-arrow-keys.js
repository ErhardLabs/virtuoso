$ = jQuery;
$( document ).ready( function() {
  document.onkeydown = checkKey;
});

function checkKey( e ) {

  e = e || window.event;

  if ( '37' == e.keyCode ) {
    console.log( 'left' );
    $( '.prevArrow' ).click();
  } else if ( '39' == e.keyCode ) {
    console.log( 'right' );
    $( '.nextArrow' ).click();
  }

}
