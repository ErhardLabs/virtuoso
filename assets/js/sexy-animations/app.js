$=jQuery;
import Animation from './Animation.js';

$(document).ready(function () {

// Array of elements to animate
  const animationsElements = [
    {className: '.post', animation: 'wp-fadeInUp', delay: 'wp-delay-1'},
    {className: '.product', animation: 'wp-fadeInUp', delay: 'wp-delay-1'},
  ];

  const animate = new Animation(animationsElements);

  animate.startAnimation();
});
