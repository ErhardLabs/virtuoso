// TODO: MAKE THIS JQUERY SELECTOR MORE TEMPLATE-SPECIFIC

$('.photography_slider_wrap').slick({
  adaptiveHeight: true,
  centerMode: true,
  arrows: true,
  lazyLoad: true,
  slidesToShow: 1,
  prevArrow: '<i class="prevArrow ti-angle-left"></i>',
  nextArrow: '<i class="nextArrow ti-angle-right"></i>',
  responsive: [{

    breakpoint: 600,
    settings: {
      centerMode: true,
      centerPadding: "40px"
    }

  }, {

    breakpoint: 300,
    settings: "unslick" //destroy slick

  }]

});