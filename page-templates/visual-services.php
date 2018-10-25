<?php
/**
 * Template Name: Visual - Services
 */

// Add our custom loop
add_action( 'genesis_before_entry_content', 'visual_services' );
function visual_services() {
//  $args = array(
////      'category_name' => 'genesis-office-hours', // replace with your category slug
//      'orderby' => 'post_date',
//      'order' => 'DESC',
//      'posts_per_page'=> '12', // overrides posts per page in theme settings
//  );
//  $loop = new WP_Query( $args );
//  if( $loop->have_posts() ) {
//    // loop through posts
//    while( $loop->have_posts() ): $loop->the_post();
//    endwhile;
//  }
//  wp_reset_postdata();

	?>

    <div class="visual_services_wrap">
        <h4>Select a service below</h4>
        <div class="button_wrap">
            <div class='link_wrap button'>
                <a href="/photos">PHOTOGRAPHY <i class="ti-gallery"></i></a>
            </div>
            <div class='link_wrap button'>
                <a href="/videos">VIDEOGRAPHY <i class="ti-video-clapper"></i></a>
            </div>
        </div>
    </div>


	<?php

}

genesis();