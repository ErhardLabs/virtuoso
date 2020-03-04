<?php
/**
 * Template Name: Visual - Photography Single
 * Template Post Type: portfolio
 */

use Virtuoso\Lib\Components\Background_Image;

Background_Image::remove();
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

global $post;

$images = get_post_gallery($post);

/**
 * Modify the output of the rendered core/gallery block.
 */
add_filter( 'render_block', function( $block_content, $block ) {
	if ( 'core/gallery' !== $block['blockName'] || ! isset( $block['attrs']['ids'] ) ) {
		return $block_content;
	}
	$div = '';
	foreach( (array) $block['attrs']['ids'] as $id ) {
		$div .= sprintf( '<div>%s</div>', wp_get_attachment_image( $id, 'large' ) );
	}
	return sprintf( '<div class="slick-carousel">%s</div>', $div );
}, 10, 2 );

genesis();