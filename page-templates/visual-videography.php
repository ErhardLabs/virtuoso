<?php
/**
 * Template Name: Visual - Videography Single
 * Template Post Type: portfolio
 */

use Virtuoso\Lib\Components\Background_Image;

Background_Image::remove();

remove_action( 'genesis_before_loop', 'genesis_do_taxonomy_title_description', 15 );
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_loop', 'genesis_do_loop' );

add_action('genesis_loop', 'virtuoso_display_videography_slider');

function virtuoso_display_videography_slider() {

  if ( have_posts() ) {

    ?> <div class="videography_slider_wrap"> <?php

      // loop through posts
      while( have_posts() ): the_post();

        $title = get_the_title() . ' Videography';
        $permalink = get_the_permalink();

        if( have_rows('video_portfolio') ): ?>

          <ul class="videography_portfolio_slides">

            <?php while( have_rows('video_portfolio') ): the_row();

              // vars
              $videoLink = get_sub_field('video_links', false);
              $video_id = explode("?v=", $videoLink);
              $video_id = $video_id[1];
              $videoSrc = "https://www.youtube.com/embed/$video_id?rel=0&controls=1&showinfo=0&autoplay=0&loop=1&enablejsapi=1"
              ?>

              <li class="slide">
                <?php if( $video_id ): ?>
                  <a class="portfolio_name" href="<?php echo $permalink; ?>"><?php echo $title; ?></a>
                  <iframe class="home_video" id="yt_home_embed" width="2460" height="1440" src="<?php echo $videoSrc ?>" frameborder="0" allowfullscreen></iframe>
                <?php endif; ?>

              </li>

            <?php endwhile; ?>

          </ul>

        <?php endif;

      endwhile;

      ?> </div> <?php

  }

}

genesis();