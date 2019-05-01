<?php
/**
 * Template Name: Publisher - Single Artist
 * Template Post Type: artists
 */

remove_action( 'genesis_entry_header', 'genesis_do_post_title' ); // remove title
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 ); // remove date, post meta
remove_action('genesis_entry_footer', 'genesis_post_meta', 10); // remove post meta footer

add_action('genesis_after_header', 'virtuoso_architect_single_portfolio_title');

function virtuoso_architect_single_portfolio_title() {
	?>
	<div class="spacing"></div>
	<?php
}

add_action('genesis_before_entry_content', 'virtuoso_publisher_single_artist');

function virtuoso_publisher_single_artist() {
	$artist_website = get_field('artist_website');
	$artist_bio = get_field('artist_bio');
	?>
    <div class="virtuoso-block frame-row">
	<?php
		$path = VIRTUOSO_BLOCKS_DIR_PATH . 'assets/images/frame-rows/';
		$svg = file_get_contents($path . 'curve-bottom.svg');
		echo $svg;?>
    </div>
    <section class="single-artist-content">
        <section class="artist-profile">
            <div class="wrap">
                <div class="title-wrap">
                    <h1><?php the_title(); ?></h1>
                </div>

                <?php if ( have_rows( 'artist_social_media_links') ): ?>
                <div class="social-media-links_wrap">
                    <?php while( have_rows( 'artist_social_media_links' ) ): the_row(); ?>
                        <a class="social-button" href="<?php the_sub_field('link') ?>"><i class="<?php the_sub_field('icon') ?>"></i></a>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>

                <?php if ( $artist_website ):
                    $artist_website_url = $artist_website['url'];
	                $artist_website_title = $artist_website['title'];
	                $artist_website_target = $artist_website['target'];
	                ?>
                    <div class="artist-website_wrap">
                        <a href="<?php echo esc_url($artist_website_url); ?>" target="<?php echo esc_html($artist_website_target);?>"><?php echo esc_html($artist_website_title);?></a>
                    </div>
                <?php endif; ?>

	            <?php if ( have_rows( 'artist_music_embed_links') ): ?>
                <div class="artist-music_wrap">
                    <div class="heading_wrap">
                        <h2>Music</h2>
                        <h4>Top Songs</h4>
                    </div>
	                <?php while( have_rows( 'artist_music_embed_links' ) ): the_row(); ?>
                        <div class="bwpp_iframe_wrap song">
<!--                              <iframe style="border: 0; width: 100%; height: 42px;" src="https://bandcamp.com/EmbeddedPlayer/track=--><?php //the_sub_field('song_id'); ?><!--/size=small/bgcol=0B0C10/linkcol=ffffff/transparent=true/" seamless></iframe>-->
                              <iframe src="https://open.spotify.com/embed/track/<?php the_sub_field('song_id'); ?>" width="1100" height="80" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                        </div>
	                <?php endwhile; ?>
                </div>
                <?php endif; ?>

            </div>
        </section>

        <?php if ( have_rows( 'artist_videos' ) ): ?>
        <section class="artist-video-playlist-slider">
            <div class="wrap">
                <div class="heading_wrap">
                    <h2>Videos</h2>
                </div>
                <div class="videos_wrap">
                    <?php while( have_rows( 'artist_videos' ) ): the_row(); ?>
                        <div class="video">
                            <div class="embed-container">
                              <?php the_sub_field('artist_video') ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <?php if ($artist_bio): ?>
        <section class="artist-bio">
            <div class="wrap">
                <div class="heading_wrap">
                    <h2>Bio</h2>
                </div>
                <div class="bio_wrap">
                    <p><?php echo $artist_bio ?></p>
                </div>
            </div>
        </section>
        <?php endif; ?>
    </section> <!-- End of single-artist-content -->

	<?php

}

genesis();