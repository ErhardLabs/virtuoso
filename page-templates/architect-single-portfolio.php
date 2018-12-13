<?php
/**
 * Template Name: Architect - Single Portfolio
 * Template Post Type: portfolio
 */

use Virtuoso\Lib\Components\Background_Image;
use Virtuoso\Lib\Functions\Formatting;

Background_Image::remove();
remove_action( 'genesis_entry_header', 'genesis_do_post_title' ); // remove title
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 ); // remove date, post meta
remove_action('genesis_entry_footer', 'genesis_post_meta', 10);

add_action('genesis_after_entry', 'virtuoso_architect_single_portfolio');

function virtuoso_architect_single_portfolio() {

  ?>

    <div class="portfolio_info_wrap wrap">
      <div class="title_wrap">
        <h1><?php the_title(); ?></h1>
      </div>
      <div class="info_wrap_left">
        <div class="location_wrap">
          <h4>Location:</h4>
          <span><?php echo get_field('location'); ?></span>
        </div>
        <div class="category_wrap">
          <h4>Category:</h4>
          <span><?php echo get_field('category'); ?></span>
        </div>
        <div class="completion_wrap">
          <h4>Completion:</h4>
          <span><?php echo get_field('completion'); ?></span>
        </div>
      </div>
      <div class="info_wrap_right">
        <div class="description_wrap">
          <p><?php echo get_field('description'); ?></p>
        </div>
      </div>
    </div>

  <?php

}

genesis();