<?php
/**
 * Created by PhpStorm.
 * User: gerhard
 * Date: 12/11/18
 * Time: 8:37 PM
 */

namespace Virtuoso\Lib\Components;
use WP_Query;

class Latest_Posts
{

  public function __construct( $support_article = false )
  {

    // WP_Query arguments
    $args = array(
        'post_type'              => array( 'post' ),
        'post_status'            => array( 'publish' ),
        'posts_per_page' => 3
    );

// The Query
    $query = new WP_Query( $args );

    // The Loop
    if ( $query->have_posts() ) {
      while ( $query->have_posts() ) {
      $query->the_post();
      if ($support_article){
	      include( CHILD_DIR . '/Lib/Views/support-article.php' );
      } else {
	      include( CHILD_DIR . '/Lib/Views/post.php' );
      }
      }
    // Restore original Post Data
    wp_reset_postdata();
    } else {
      // no posts found
      __('No News', CHILD_TEXT_DOMAIN);
    }
  }

}