$( '.error404 .entry' ).mousemove( function( e ) {
  let backAmountMovedX = ( e.pageX * -1 / 75 );
  let middleAmountMovedX = ( e.pageX * -1 / 50 );
  let frontAmountMovedX = ( e.pageX * -1 / 30 );
  $( '#parallax img:nth-of-type(1)' ).css( 'left', backAmountMovedX + 'px ' );
  $( '#parallax img:nth-of-type(2)' ).css( 'right', middleAmountMovedX + 'px ' );
  $( '#parallax img:nth-of-type(3)' ).css( 'left', frontAmountMovedX + 'px ' );
});
