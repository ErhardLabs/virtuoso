$ = jQuery;

$( document ).ready( function() {

  // Hide Header on on scroll down
  let didScroll;
  let lastScrollTop = 0;
  let delta = 5;
  let navbarHeight = $( 'header' ).outerHeight();

  $( window ).scroll( () => {
 didScroll = true;
});

  setInterval( function() {
    if ( didScroll ) {
      hasScrolled();
      didScroll = false;
    }
  }, 250 );

  function hasScrolled() {
    let st = $( window ).scrollTop();

    // Make sure they scroll more than delta
    if ( Math.abs( lastScrollTop - st ) <= delta ) {
return;
}

    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    if ( st > lastScrollTop && st > navbarHeight ) {

      // Scroll Down
      $( '.site-header' ).removeClass( 'nav-down' ).addClass( 'nav-up' );
      $( '.site-header' ).hide();
      $( '.site-header' ).fadeIn();
    } else {

      // Scroll Up
      if ( st + $( window ).height() < $( document ).height() ) {
        $( '.site-header' ).removeClass( 'nav-up' ).addClass( 'nav-down' );
      }
    }

    lastScrollTop = st;
  }

});
