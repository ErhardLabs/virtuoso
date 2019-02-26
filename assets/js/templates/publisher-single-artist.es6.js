$('.artists-template-publisher-single-artist .artist-video-playlist-slider .videos_wrap').slick({
  centerMode: true,
  arrows: true,
  slidesToShow: 1,
  lazyLoad: true,
  centerPadding: "25em",
  prevArrow: '<i class="prevArrow ti-angle-left"></i>',
  nextArrow: '<i class="nextArrow ti-angle-right"></i>',
  dots: true,
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
        centerPadding: "70px"
      }

    }, {


      breakpoint: 600,
      settings: {
        centerMode: true,
        centerPadding: "5%"
      }

    }, {

      breakpoint: 300,
      settings: "unslick" //destroy slick

    }]
});