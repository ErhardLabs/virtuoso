$( '.home .architecture_slider_wrap' ).slick({
  arrows: false,
  lazyLoad: true,
  dots: true,
  autoplay: true,
  autoplaySpeed: 4000,
  pauseOnHover: false
});

// Move Living to the first position.
$( 'div.categories a:first-child' ).filter( function() {
  return 'Gathering' === $( this ).text();
}).insertAfter( $( 'div.categories a:nth-child(2)' ) );
