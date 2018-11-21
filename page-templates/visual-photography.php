<?php
/**
 * Template Name: Visual - Photography Single
 * Template Post Type: portfolio
 */

use Virtuoso\Lib\Components\Background_Image;
use Virtuoso\Lib\Functions\Formatting;

Background_Image::remove();
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
genesis();