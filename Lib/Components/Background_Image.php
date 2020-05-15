<?php
namespace Virtuoso\Lib\Components;

class Background_Image {

  public static function background_image($postID) {

    $image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id(  $postID ), 'full' );

    if ( $image_attributes ) {

      ?>
      <div class="page_background_image">
          <div class="hero-overlay"></div>
        <img src="<?php echo $image_attributes[0]; ?>"/>
      </div>
      <?php

    }

  }

  public static function add() {
    add_action('virtuoso_featured_background_image', array(__class__, 'background_image'));
  }

  public static function remove() {
    remove_action('virtuoso_featured_background_image', array(__class__, 'background_image'), 10);
  }

}