<?php
/**
 * Template Name: Visual - Photography Single
 * Template Post Type: portfolio
 */

use Virtuoso\Lib\Components\Background_Image;

$backgroundImage = new Background_Image();
add_action('virtuoso_featured_background_image', [$backgroundImage, 'background_image']);

//$backgroundImage = new Background_Image();
//remove_action('virtuoso_featured_background_image', [$backgroundImage, 'background_image'], 10);
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
genesis();