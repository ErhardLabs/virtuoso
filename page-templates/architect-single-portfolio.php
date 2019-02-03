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
remove_action('genesis_entry_footer', 'genesis_post_meta', 10); // remove post meta footer

add_action('genesis_after_header', 'virtuoso_architect_single_portfolio_title');

function virtuoso_architect_single_portfolio_title() {
  ?>
    <div class="back_to_home">
        <a href="<?php echo get_home_url(); ?>"><i class="ti-arrow-left"></i>Home</a>
    </div>
    <div class="title_wrap mobile">
        <h1><?php the_title(); ?></h1>
    </div>

  <?php
}

add_action('genesis_after_entry', 'virtuoso_architect_single_portfolio');

function virtuoso_architect_single_portfolio() {

  ?>

    <div class="portfolio_info_wrap wrap desktop">
      <div class="title_wrap desktop">
        <h1><?php the_title(); ?></h1>
      </div>
      <div class="info_wrap_left">

        <?php if ( get_field('location') ): ?>
            <div class="location_wrap info_container">
              <h4>Location:</h4>
              <span><?php echo get_field('location'); ?></span>
            </div>
        <?php endif; ?>

        <?php if ( get_field('category') ): ?>
            <div class="category_wrap info_container">
              <h4>Category:</h4>
              <span><?php echo get_field('category'); ?></span>
            </div>
        <?php endif; ?>

	    <?php if ( get_field('completion') ): ?>
        <div class="completion_wrap info_container">
          <h4>Completion:</h4>
          <span><?php echo get_field('completion'); ?></span>
        </div>
		    <?php endif; ?>

      </div> <!-- info_wrap_left -->


      <div class="info_wrap_right">
	     <?php if ( get_field('description') ): ?>
            <div class="description_wrap">
              <div class="yellow-accent"></div>
             <?php echo get_field('description'); ?>
            </div>
		 <?php endif; ?>
      </div> <!-- info_wrap_right -->

    </div>

  <?php

}

genesis();