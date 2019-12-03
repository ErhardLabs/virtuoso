<?php
/**
 * Template Name: Tunefuze - Front Page
 * Template Post Type: page
 */

// REMOVE ENTIRE CONTAINER FOR ENTRY HEADER
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );

if ( is_front_page() ) {
	add_filter( 'body_class', function( $classes ) {
		return array_merge( $classes, array( 'tunefuze', 'all_fuzes', 'home' ) );
	} );
}

add_action( 'genesis_before_entry_content', 'virtuoso_publisher_front_page_content' );
function virtuoso_publisher_front_page_content() {

  if (is_front_page()) {

//    $profileOwner = ((int) buddypress()->displayed_user->id === (int) buddypress()->loggedin_user->userdata->ID);

    if (is_user_logged_in()) {
      ?>
      <h2>Recommended</h2>
      <div class="fuze-group" id="recommended_fuzes"></div>
      <h2>Trending</h2>
      <div class="fuze-group" id="trending_fuzes"></div>
      <h2>Curated</h2>
      <div class="fuze-group" id="curated_fuzes"></div>
      <h2>Following</h2>
      <div class="fuze-group" id="following_fuzes"></div>
      <h2>All-Time Most Viewed</h2>
      <div class="fuze-group" id="all_time_most_viewed_fuzes"></div>
      <h2>All-Time Most Liked</h2>
      <div class="fuze-group" id="all_time_most_liked_fuzes"></div>
      <?php
    } else {
      ?>
      <h2>Trending</h2>
      <div class="fuze-group" id="trending_fuzes"></div>
      <h2>Curated</h2>
      <div class="fuze-group" id="curated_fuzes"></div>
      <h2>All-Time Most Viewed</h2>
      <div class="fuze-group" id="all_time_most_viewed_fuzes"></div>
      <h2>All-Time Most Liked</h2>
      <div class="fuze-group" id="all_time_most_liked_fuzes"></div>
      <?php
    }

  }

}

genesis();