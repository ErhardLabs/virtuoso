<?php
/**
 * Template Name: Front Page
 * Template Post Type: page
 */

add_action( 'the_content', 'virtuoso_front_page_clean' );
function virtuoso_front_page_clean($content) {
  // display nothing
}

add_action('genesis_after_header', 'virtuoso_front_page_content');

function virtuoso_front_page_content() {

  if (is_front_page()) {

    global $post;
    echo get_the_content();
//    print_r($post->post_content);
  }


}

genesis();