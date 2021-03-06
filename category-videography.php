<?php
defined( 'ABSPATH' ) || exit;

use Virtuoso\Lib\Helper;

remove_action( 'genesis_before_loop', 'genesis_do_taxonomy_title_description', 15 );
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'virtuoso_display_videography_archive_content' );


function virtuoso_display_videography_archive_content() {

	// WP_Query arguments
	$args = array(
		'post_type'     => array( 'portfolio' ),
		'post_status'   => array( 'published' ),
		'category_name' => 'videography',
		'orderby'       => 'post_date',
		'order'         => 'DESC',
	);

	// The Query
	$loop = new WP_Query( $args );

	if ( $loop->have_posts() ) {

		?>
		<div class="videography_slider_wrap">
		<?php

			// loop through posts
		while ( $loop->have_posts() ) :
			$loop->the_post();
			$permalink = get_the_permalink();

			if ( have_rows( 'video_portfolio' ) ) :
				?>

					<ul class="videography_portfolio_slides">

						<?php
						while ( have_rows( 'video_portfolio' ) ) :
							the_row();

							// vars
							$video_link = get_sub_field( 'video_links', false );
							$video_id   = Helper::extract_video_id( $video_link );
							?>

							<?php if ( $video_id ) : ?>
								<?php $video_src = "https://www.youtube.com/embed/$video_id?rel=0&controls=1&enablejsapi=1"; ?>
								<li class="slide">
									<div class="portfolio_header_wrap">
										<a class="portfolio_name" href="<?php echo esc_url( $permalink ); ?>"><span><?php echo esc_html( get_the_title() ); ?></span></a>
										<a class="portfolio_view" href="<?php echo esc_url( $permalink ); ?>"><span>View</span></a>
									</div>
									<div class="embed-container">
										<iframe class="home_video" id="yt_home_embed" width="800" height="443"
												src="<?php echo esc_url( $video_src ); ?>" frameborder="0" allowfullscreen></iframe>
									</div>
								</li>
								<?php break; ?>
							<?php endif; ?>

						<?php endwhile; ?>

					</ul>

				<?php
				endif;

			endwhile;

		?>
			</div>
			<?php

	}

}

genesis();
