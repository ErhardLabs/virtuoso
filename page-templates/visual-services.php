<?php
/**
 * Template Name: Visual - Services
 * Template Post Type: page
 */
defined( 'ABSPATH' ) || exit;

// Add our custom loop
add_action( 'genesis_before_entry_content', 'visual_services' );
function visual_services() {

	?>

    <div class="visual_services_wrap">
        <h4>Select a service below</h4>
        <div class="button_container">
            <div class='link_wrap'>
                <a class="button" href="/category/photography">PHOTOGRAPHY <i class="ti-gallery"></i></a>
            </div>
            <div class='link_wrap'>
                <a class="button" href="/category/videography">VIDEOGRAPHY <i class="ti-video-clapper"></i></a>
            </div>
        </div>
    </div>


	<?php

}

genesis();