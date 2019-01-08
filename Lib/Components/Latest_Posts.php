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

  public function __construct()
  {

    // WP_Query arguments
    $args = array(
        'post_type'              => array( 'post' ),
        'post_status'            => array( 'published' ),
        'posts_per_page'         => 3,
        'order'                  => 'DESC',
        'orderby'                => 'date',
        'nopaging'               => true,
    );

// The Query
    $query = new WP_Query( $args );

    // The Loop
    if ( $query->have_posts() ) {
      while ( $query->have_posts() ) {
        $query->the_post();
        ?>

        <div class="latest_post">
            <div class="latest_post_wrap">
              <div class="featured_image_wrap">
                <?php the_post_thumbnail('medium' ); ?>
              </div>
              <div class="info_wrap">
                <h4><?php echo get_the_title();?></h4>
                <p class="latest_post_excerpt"><?php echo get_the_excerpt();?></p>
                <a href="<?php echo get_the_permalink()?>">Read more <i class="ti-arrow-right"></i></a>
              </div>
            </div>
        </div>

        <?php
      }
    } else {
      // no posts found
    }

    // Restore original Post Data
    wp_reset_postdata();
  }

}