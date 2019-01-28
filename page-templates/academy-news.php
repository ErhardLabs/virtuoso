<?php
/**
 * Template Name: Academy - News
 * Template Post Type: page
 */

add_action( 'the_content', function() {} ); // clear content so nothing displays

add_action( 'the_content', 'virtuoso_display_news_archive_content' );
function virtuoso_display_news_archive_content()
{

  ?>
    <div class="blog_posts">
    <div class="blog_posts_wrap">

<?php

  // WP_Query arguments
  $args = array(
      'post_type' => array('post'),
      'post_status' => array('publish'),
      'category_name' => 'news',
      'orderby' => 'post_date',
      'order' => 'DESC',
  );

  // The Query
  $query = new WP_Query($args);

if ( $query->have_posts() ) {
  while ( $query->have_posts() ) {
    $query->the_post();
    $content = get_the_content();
    include( CHILD_DIR . '/Lib/Views/post.php' );
  }
    // Restore original Post Data
    wp_reset_postdata();
} else {
	// no posts found
	__('No News', CHILD_TEXT_DOMAIN);
}

  ?>
    </div> <!-- blog_posts -->
    </div> <!-- blog_posts_wrap -->

  <?php

}

genesis();