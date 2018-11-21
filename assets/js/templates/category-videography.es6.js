$('.category-videography .videography_slider_wrap').slick({
  adaptiveHeight: true,
  centerMode: true,
  centerPadding: "25em",
  arrows: true,
  lazyLoad: true,
  slidesToShow: 1,
  prevArrow: '<i class="prevArrow ti-angle-left"></i>',
  nextArrow: '<i class="nextArrow ti-angle-right"></i>',
  responsive: [
    {

      breakpoint: 1500,
      settings: {
        centerMode: true,
        centerPadding: "10em"
      }

    },
    {

      breakpoint: 1200,
      settings: {
        centerMode: true,
        centerPadding: "40px"
      }

    }, {


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