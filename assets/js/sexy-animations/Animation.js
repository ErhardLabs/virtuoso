$=jQuery;

/**
 *  Animations Class
 *
 *  @param array animationElements
 *
 * */

// All of the animation classes from animate.css
const animationClasses = [
  "bounce",
  "flash",
  "pulse",
  "rubberBand",
  "shake",
  "swing",
  "tada",
  "wobble",
  "jello",

  "bounceIn",
  "bounceInDown",
  "bounceInLeft",
  "bounceInRight",
  "bounceInUp",

  "bounceOut",
  "bounceOutDown",
  "bounceOutLeft",
  "bounceOutRight",
  "bounceOutUp",

  "fadeIn",
  "fadeInDown",
  "fadeInDownBig",
  "fadeInLeft",
  "fadeInLeftBig",
  "fadeInRight",
  "fadeInRightBig",
  "fadeInUp",
  "fadeInUpBig",

  "fadeOut",
  "fadeOutDown",
  "fadeOutDownBig",
  "fadeOutLeft",
  "fadeOutLeftBig",
  "fadeOutRight",
  "fadeOutRightBig",
  "fadeOutUp",
  "fadeOutUpBig",

  "flip",
  "flipInX",
  "flipInY",
  "flipOutX",
  "flipOutY",

  "lightSpeedIn",
  "lightSpeedOut",

  "rotateIn",
  "rotateInDownLeft",
  "rotateInDownRight",
  "rotateInUpLeft",
  "rotateInUpRight",

  "rotateOut",
  "rotateOutDownLeft",
  "rotateOutDownRight",
  "rotateOutUpLeft",
  "rotateOutUpRight",

  "slideInUp",
  "slideInDown",
  "slideInLeft",
  "slideInRight",

  "slideOutUp",
  "slideOutDown",
  "slideOutLeft",
  "slideOutRight",

  "zoomIn",
  "zoomInDown",
  "zoomInLeft",
  "zoomInRight",
  "zoomInUp",

  "zoomOut",
  "zoomOutDown",
  "zoomOutLeft",
  "zoomOutRight",
  "zoomOutUp",

  "hinge",
  "jackInTheBox",
  "rollIn",
  "rollOut"
];

class Animation {

 constructor( animationElements ) {

   animationElements.forEach( function ( element ){
     $(element.className).addClass('wp-animation').addClass(element.animation).addClass(element.delay);
   });
 }

 startAnimation(){

   this.setDataAttr();
   this.setDelay();

   this.onScrollInit( $('.wp-animation') );
   this.onScrollInit( $('.wp-staggered-animation'), $('.wp-staggered-animation-container') );
 }

  // Append the animation data attribute
  setDataAttr() {
    $.each( animationClasses, function( index, animation ) {
      $('.wp-' + animation).attr('data-wp-animation', animation);
    });
  }

  setDelay() {
    for (let x = 0; x <= 5; x++) {
      if ( $('.wp-animation').hasClass('wp-delay-' + x) || $('.animated').hasClass('wp-delay-' + x) ) {
        $('.wp-delay-' + x).attr('data-wp-animation-delay', x + 's');
      }
    }
  }

  onScrollInit( items, trigger ) {
    items.each( function() {
      let wpElement = $(this),
        wpAnimationClass = wpElement.attr('data-wp-animation'),
        wpAnimationDelay = wpElement.attr('data-wp-animation-delay');

      wpElement.css({
        '-webkit-animation-delay':  wpAnimationDelay,
        '-moz-animation-delay':     wpAnimationDelay,
        'animation-delay':          wpAnimationDelay
      });

      let wpTrigger = ( trigger ) ? trigger : wpElement;

      wpTrigger.waypoint(function() {
        wpElement.addClass('animated').addClass(wpAnimationClass);
      },{
        triggerOnce: false,
        offset: '90%'
      });
    });
  }

}

export default Animation;
