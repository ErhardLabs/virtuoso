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
	add_filter(
		'body_class',
		function( $classes ) {
			return array_merge( $classes, array( 'tunefuze', 'all_fuzes', 'home' ) );
		}
	);
}

add_action( 'genesis_before_entry_content', 'virtuoso_publisher_front_page_content' );
function virtuoso_publisher_front_page_content() {

	if ( is_front_page() ) {

		if ( is_user_logged_in() ) {
			?>
            <div class="recommended fuze-group-container">
                  <h2>Recommended</h2>
                  <div class="fuze-group" id="recommended_fuzes"><div class="fuze-group-wrap"></div></div>
            </div>
            <div class="trending fuze-group-container">
                  <h2>Trending</h2>
                  <div class="fuze-group" id="trending_fuzes"><div class="fuze-group-wrap"></div></div>
            </div>
            <div class="curated fuze-group-container">
                  <h2>Curated</h2>
                  <div class="fuze-group" id="curated_fuzes"><div class="fuze-group-wrap"></div></div>
            </div>
            <div class="following fuze-group-container">
	            <h2>Following</h2>
	            <div class="fuze-group" id="following_fuzes"><div class="fuze-group-wrap"></div></div>
            </div>
            <div class="all_time_most_viewed fuze-group-container">
                  <h2>All-Time Most Viewed</h2>
                  <div class="fuze-group" id="all_time_most_viewed_fuzes"><div class="fuze-group-wrap"></div></div>
            </div>
            <div class="all_time_most_liked fuze-group-container">
                  <h2>All-Time Most Liked</h2>
                  <div class="fuze-group" id="all_time_most_liked_fuzes"><div class="fuze-group-wrap"></div></div>
            </div>
			<?php
		} else {
			?>
            <div class="trending fuze-group-container">
                <h2>Trending</h2>
                <div class="fuze-group" id="trending_fuzes"><div class="fuze-group-wrap"></div></div>
            </div>
            <div class="curated fuze-group-container">
                <h2>Curated</h2>
                <div class="fuze-group" id="curated_fuzes"><div class="fuze-group-wrap"></div></div>
            </div>
            <div class="all_time_most_viewed fuze-group-container">
                <h2>All-Time Most Viewed</h2>
                <div class="fuze-group" id="all_time_most_viewed_fuzes"><div class="fuze-group-wrap"></div></div>
            </div>
            <div class="all_time_most_liked fuze-group-container">
                <h2>All-Time Most Liked</h2>
                <div class="fuze-group" id="all_time_most_liked_fuzes"><div class="fuze-group-wrap"></div></div>
            </div>
			<?php
		}
	}

}

genesis();
