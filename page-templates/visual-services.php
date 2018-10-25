<?php
/**
 * Template Name: Visual - Services
 * Template Post Type: page
 */

// Add our custom loop
add_action( 'genesis_before_entry_content', 'visual_services' );
function visual_services() {

  ?>

    <div class="visual_services_wrap">
      <h4>Select a service below</h4>
      <div class='link_wrap one-half first'>
        <a href="/category/photography/" class="button">PHOTOGRAPHY <i class="ti-gallery"></i></a>
      </div>
      <div class='link_wrap one-half'>
        <a href="/category/videography/" class="button">VIDEOGRAPHY <i class="ti-video-clapper"></i></a>
      </div>
    </div>


  <?php

}
genesis();