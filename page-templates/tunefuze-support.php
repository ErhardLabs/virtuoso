<?php
/**
 * Template Name: Tunefuze - Support
 * Template Post Type: page
 */
defined( 'ABSPATH' ) || exit;

add_action( 'the_content', function() {} ); // clear content so nothing displays

add_action( 'body_class', 'add_support_page_class' );

function add_support_page_class( $classes ) {
	$classes[] = 'support-archive-page';

	return $classes;
}

add_action( 'genesis_before_entry_content', 'virtuoso_display_support_archive_content' );
function virtuoso_display_support_archive_content()
{

	// WP_Query arguments
	$args = array(
		'post_type' => array('post'),
		'post_status' => array('publish'),
		'category_name' => 'support',
		'orderby' => 'post_date',
		'order' => 'DESC',
	);

	// The Query
	$query = new WP_Query($args);

	?>
	<div class="blog_posts">
		<p class="post_count"><?php printf( _n( '%s Article', '%s Articles', $query->post_count, CHILD_TEXT_DOMAIN, 'virtuoso' ), number_format_i18n( $query->post_count ) ); ?></p>
		<div class="blog_posts_wrap">

			<?php

			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					$content = get_the_content();
					include( CHILD_DIR . '/Lib/Views/support-article.php' );
				}
				// Restore original Post Data
				wp_reset_postdata();
			} else {
				// no posts found
				__('No Support Articles Found', CHILD_TEXT_DOMAIN, 'virtuoso');
			}

			?>
		</div> <!-- blog_posts -->
	</div> <!-- blog_posts_wrap -->

	<?php

}

genesis();