$( '.home .architecture_slider_wrap' ).slick({
  arrows: false,
  lazyLoad: true,
  dots: true,
  autoplay: true,
  autoplaySpeed: 4000

  // appendArrows: '.home .slider-nav',
  // appendDots: '.home .slider-nav',
  // prevArrow: '<i class="prevArrow ti-angle-left"></i>',
  // nextArrow: '<i class="nextArrow ti-angle-right"></i>'
});

$( '.js-slick' ).on( 'beforeChange', function( event, slick, currentSlide, nextSlide ) {
  $( slick.$slides ).removeClass( 'is-animating' );
});

$( '.js-slick' ).on( 'afterChange', function( event, slick, currentSlide, nextSlide ) {
    $( slick.$slides.get( currentSlide ) ).addClass( 'is-animating' );
});

// Move Living to the first position.
$( 'div.categories a:first-child' ).filter( function() {
  return 'Living' === $( this ).text();
}).insertAfter( $( 'div.categories a:nth-child(2)' ) );


