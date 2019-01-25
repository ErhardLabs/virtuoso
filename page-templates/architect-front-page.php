<?php
/**
 * Template Name: Architect - Front Page
 * Template Post Type: page
 */

// REMOVE ENTIRE CONTAINER FOR ENTRY HEADER
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );

add_action( 'the_content', 'virtuoso_architect_front_page_clean' );
function virtuoso_architect_front_page_clean($content) {
  // display nothing
}

add_action('genesis_after_header', 'virtuoso_architect_front_page_after_header');

function virtuoso_architect_front_page_after_header() {

	//////////////////////// SLIDER START ////////////////////////

//    global $post;
//    echo get_the_content();

	// WP_Query arguments
	$args = array(
		'post_type'       => array( 'portfolio' ),
		'post_status'     => array( 'publish' ),
		'orderby'         => 'post_date',
		'order'           => 'DESC',
		'posts_per_page'  => 3
	);

// The Query
	$loop = new WP_Query( $args );

	if ( $loop->have_posts() ) {

		?>
      <div class="architecture_slider_wrap"> <?php

				// loop through posts
				while ( $loop->have_posts() ): $loop->the_post();


					$image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );

					if ( $image_attributes ) {

						?>

                        <div class="photo" style="background-image: url('<?php echo $image_attributes[0]; ?>');">
                            <div class="portfolio_header_container">
                                <a class="container_link" href="<?php the_permalink(); ?>"></a>
                                <div class="portfolio_header_wrap">
                                    <a class="portfolio_name" href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span></a>
                                    <span class="portfolio_category"><?php echo get_field('category'); ?></span>
                                    <a class="portfolio_view" href="<?php the_permalink(); ?>"><span>View <i class="ti-arrow-right icon"></i></span></a>
                                </div>
                            </div>
                        </div>
						<?php

					}

				endwhile;

				?>
      </div>

      <?php

	}

	wp_reset_query();
	wp_reset_postdata();

	//////////////////////// SLIDER END ////////////////////////
}

add_action('the_content', 'virtuoso_architect_front_page_content');

function virtuoso_architect_front_page_content() {

  if (is_front_page()) {


    //////////////////////// OFFSET TRANSPARENT IMAGE START ////////////////////////

    ?>
    <div class="offset_transparent_image">
      <section>
        <div class="section_info">
          <h2><?php echo bloginfo('title'); ?></h2>
          <p>Architectural design, planning, interiors, furniture design, and construction services.</p>
            <a class="read_more" href="/#"><span>Read More<i class="ti-arrow-right icon"></i></span></a>
        </div>
      </section>
      <div class="transparent_image_wrap">
          <div class="transparent-overlay"></div>
          <img src="/wp-content/uploads/2018/12/racestreet7.jpg"/>
          <div class="yellow-accent"></div>
      </div>
    </div>
    <?php

    //////////////////////// OFFSET TRANSPARENT IMAGE END //////////////////////////

    //////////////////////// FILTERABLE GALLERY START //////////////////////////

    virtuoso_portfolio_image_gallery();

    //////////////////////// FILTERABLE GALLERY END ////////////////////////////

  }


}

genesis();