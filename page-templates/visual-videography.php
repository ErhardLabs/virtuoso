<?php
/**
 * Template Name: Visual - Videography Single
 * Template Post Type: portfolio
 */

use Virtuoso\Lib\Components\Background_Image;
use Virtuoso\Lib\Helper;

Background_Image::remove();

remove_action( 'genesis_before_loop', 'genesis_do_taxonomy_title_description', 15 );
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_loop', 'genesis_do_loop' );

add_action( 'genesis_loop', __NAMESPACE__ . '\display_videography_slider' );

function display_videography_slider() {

	if ( have_posts() ) {

		?>
		<div class="videography_slider_wrap"> <?php

			// loop through posts
			while ( have_posts() ): the_post();

				$title     = get_the_title();
				$permalink = get_the_permalink();

//				var_dump($title);die();

				if ( have_rows( 'video_portfolio' ) ): ?>
					<header class="entry-header">
						<h1 class="portfolio_name"><?php echo $title; ?></h1>
					</header>
					<ul class="videography_portfolio_slides">

						<?php while ( have_rows( 'video_portfolio' ) ): the_row();

							// vars
							$video_link = get_sub_field( 'video_links', false );
							$video_id = Helper::extract_video_id( $video_link );
							?>

							<?php if ( $video_id ): ?>
								<?php $videoSrc  = "https://www.youtube.com/embed/$video_id?rel=0&controls=1&enablejsapi=1"; ?>
								<li class="slide">
									<div class="embed-container">
										<iframe class="home_video" id="yt_home_embed" width="2460" height="1440" src="<?php echo $videoSrc ?>" frameborder="0" allowfullscreen></iframe>
									</div>
								</li>
							<?php endif; ?>
						<?php endwhile; ?>

					</ul>

					<?php
					$category_name = get_the_category()[0]->name;
					$category_id   = get_cat_ID( get_the_category()[0]->name );
					$category_link = get_category_link( $category_id );

					?>
					<footer class="entry-footer">
						<p class="entry-meta">
                <span class="entry-categories">
                    <a href="<?php echo $category_link ?>"><?php echo $category_name ?></a>
                </span>
						</p>
					</footer>

				<?php endif;

			endwhile;

			?> </div> <?php

	}

}

genesis();
