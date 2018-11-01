<?php
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
      <div class="videography_slider_wrap"> <?php

				// loop through posts
				while ( $loop->have_posts() ): $loop->the_post();

					$title     = get_the_title() . ' Videography';
					$permalink = get_the_permalink();

					if ( have_rows( 'video_portfolio' ) ): ?>

              <ul class="videography_portfolio_slides">

								<?php while ( have_rows( 'video_portfolio' ) ): the_row();

									// vars
									$videoLink = get_sub_field( 'video_links', false );
									$video_id  = explode( "?v=", $videoLink );
									$video_id  = $video_id[1];
									$videoSrc  = "https://www.youtube.com/embed/$video_id?rel=0&controls=0&showinfo=0&enablejsapi=1"
									?>

                    <li class="slide">
											<?php if ( $video_id ): ?>
                          <div class="portfolio_header_wrap">
                              <a class="portfolio_name"
                                 href="<?php echo $permalink; ?>"><span><?php echo $title; ?></span></a>
                              <a class="portfolio_view" href="<?php echo $permalink; ?>"><span>View</span></a>
                          </div>
                          <div class="embed-container">
                              <iframe class="home_video" id="yt_home_embed" width="800" height="443"
                                      src="<?php echo $videoSrc ?>" frameborder="0" allowfullscreen></iframe>
                          </div>
												<?php break; ?>
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