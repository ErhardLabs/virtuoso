<?php
/**
 * Template Name: Landscaping - Front Page
 * Template Post Type: page
 */

// REMOVE ENTIRE CONTAINER FOR ENTRY HEADER
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );

// RENDER FIRST BLOCK OUTSIDE OF CONTENT
add_action('genesis_after_header', 'virtuoso_landscaping_front_page_welcome');
function virtuoso_landscaping_front_page_welcome() {

  if (is_front_page()) {
    global $post;
    $blocks = parse_blocks($post->post_content);

    foreach($blocks as $block) {
      echo render_block($block);
      break;
    }
  }

}

//add_action( 'genesis_before_entry_content', 'virtuoso_landscaping_front_page_content' );
//function virtuoso_landscaping_front_page_content($content) {
//
//  if (is_front_page()) {
//    global $post;
//    $blocks = parse_blocks($post->post_content);
//    unset($blocks[0]); // don't display welcome block
//
//    foreach($blocks as $block) {
//      echo render_block($block);
//    }
//  }
//
//}

genesis();