$=jQuery;
import Animation from './Animation.js';

$(document).ready(function () {

  $('body').addClass('body-loaded');

// Array of elements to animate
  const animationsElements = [
    {className: '.post', animation: 'wp-fadeInUp', delay: 'wp-delay-1'},
    {className: '.product', animation: 'wp-fadeInUp', delay: 'wp-delay-1'},
  ];

  const animate = new Animation(animationsElements);

  animate.startAnimation();
});
