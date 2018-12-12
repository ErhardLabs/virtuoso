<?php
/**
 * Template Name: Academy - News
 * Template Post Type: page
 */

add_action( 'genesis_loop', 'virtuoso_display_news_archive_content' );
function virtuoso_display_news_archive_content()
{

  ?>
    <div class="page_title_wrap">
      <h2>NEWS</h2>
    </div>
    <div class="blog_posts_wrap">

<?php

  // WP_Query arguments
  $args = array(
      'post_type' => array('post'),
      'post_status' => array('published'),
      'category_name' => 'news',
      'orderby' => 'post_date',
      'order' => 'DESC',
  );

  // The Query
  $query = new WP_Query($args);

if ( $query->have_posts() ) {
  while ( $query->have_posts() ) {
    $query->the_post();
    ?>

    <div class="post">
      <div class="featured_image_wrap">
        <?php the_post_thumbnail('thumbnail'); ?>
      </div>
      <div class="info_wrap">
        <h4><?php echo get_the_title();?></h4>
        <p class="post_excerpt"><?php echo get_the_excerpt();?></p>
        <a href="<?php echo get_the_permalink()?>">Read more <i class="dashicons-arrow-right"></i></a>
      </div>
    </div>

    <?php
  }
} else {
  // no posts found
}

  ?></div> <!-- blog_posts_wrap --> <?php

}

genesis();