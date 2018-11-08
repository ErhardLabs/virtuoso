<?php
/**
 * Template Name: Academy - Front Page
 * Template Post Type: page
 */

// Add our custom loop
add_action( 'genesis_before_entry_content', 'academy_front_page' );
function academy_front_page() {

  ?>

  <div class="visual_services_wrap">
    <h4>Select a service below</h4>
    <div class="button_wrap">
      <div class='link_wrap button'>
        <a href="/category/photography">PHOTOGRAPHY <i class="ti-gallery"></i></a>
      </div>
      <div class='link_wrap button'>
        <a href="/category/videography">VIDEOGRAPHY <i class="ti-video-clapper"></i></a>
      </div>
    </div>
  </div>


  <?php

}

genesis();