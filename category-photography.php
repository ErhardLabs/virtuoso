<?php

defined( 'ABSPATH' ) || exit;

remove_action( 'genesis_before_loop', 'genesis_do_taxonomy_title_description', 15 );
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'virtuoso_display_photography_archive_content' );

function virtuoso_display_photography_archive_content() {

	// WP_Query arguments
	$args = array(
		'post_type'     => array( 'portfolio' ),
		'post_status'   => array( 'published' ),
		'category_name' => 'photography',
		'orderby'       => 'post_date',
		'order'         => 'DESC',
	);

	// The Query
	$loop = new WP_Query( $args );

	if ( $loop->have_posts() ) {

		?>
		<div class="photography_slider_wrap">
		<?php

				// loop through posts
		while ( $loop->have_posts() ) :
			$loop->the_post();

			$image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );

			if ( $image_attributes ) {

				?>
					<li>
						<div class="portfolio_header_wrap">
							<a class="portfolio_name" href="<?php the_permalink(); ?>"><span><?php the_title(); ?>
							Photography</span></a>
							<a class="portfolio_view" href="<?php the_permalink(); ?>"><span>View</span></a>
						</div>
						<img class="single_slider_item" src="<?php echo esc_url( $image_attributes[0] ); ?>"/>
					</li>
						<?php

			}

				endwhile;

		?>
		</div>
				<?php

	}

}

genesis();
