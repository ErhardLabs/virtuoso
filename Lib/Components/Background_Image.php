<?php
namespace Virtuoso\Lib\Components;

class Background_Image {

  public function __construct() {
  }

  public static function background_image($postID) {

    $image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id(  $postID ), 'full' );

    if ( $image_attributes ) {

      ?><img class="page_background_image" src="<?php echo $image_attributes[0]; ?>"/><?php

    }

  }

//  public function add() {
//    add_action('virtuoso_featured_background_image', [$this, 'background_image']);
//  }
//
//  public function remove() {
//    remove_action('virtuoso_featured_background_image', [$this, 'background_image'], 10);
//  }

}