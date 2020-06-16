<?php
/**
 * Template Name: Academy - Lessons
 * Template Post Type: page
 */
defined( 'ABSPATH' ) || exit;

// REMOVE ENTIRE CONTAINER FOR ENTRY HEADER
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );

add_action( 'the_content', function() {} ); // clear content so nothing displays

// RENDER ABOVE CONTENT
add_action('genesis_after_header', 'virtuoso_academy_lessons_welcome');
function virtuoso_academy_lessons_welcome() {

  ?>
    <div class="lessons_welcome_wrap">
      <div class="background-overlay"></div>
      <div class="title_wrap">
        <h1 class="page_title"><?php echo get_the_title(); ?></h1>
      </div>
      <div class="lessons_left">
        <div class="icon_text_wrap">
          <div class="icon_wrap">
            <i class="ti-desktop"></i>
          </div>
          <div class="button_wrap">
            <a href="#online" class="button">ONLINE <i class="ti-desktop"></i></a>
          </div>
        </div>
      </div>
      <div class="lessons_right">
        <div class="icon_text_wrap">
          <div class="icon_wrap">
            <i class="ti-user"></i>
          </div>
          <div class="button_wrap">
            <a href="#in_person" class="button">IN-PERSON <i class="ti-user"></i></a>
          </div>
        </div>
      </div>
    </div>

  <?php

}


add_action( 'genesis_before_entry_content', 'virtuoso_academy_lessons_content' );
function virtuoso_academy_lessons_content() {

  global $post;
  $blocks = parse_blocks($post->post_content);

  foreach($blocks as $block) {
    echo render_block($block);
  }

}

genesis();