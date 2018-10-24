<?php
/**
 * Created by PhpStorm.
 * User: gerhard
 * Date: 9/24/18
 * Time: 3:51 PM
 */
namespace Virtuoso\Lib\Components;
use Virtuoso\Lib\Components\Customizer\CustomizerHelpers;

class Background_Video_HTML
{

  public $homeVideoID;
  public $homePlaylistID;
  public $postVideoID;
  public $postPlaylistID;
  public $startTime;
  public $belowHeader;
  public $archiveDisplayEnabled;
  public $stickyBackgroundVideoEnabled;

  public function __construct() {

    $this->get_user_options();
    $this->determine_display_locations();

  }


  public function determine_display_locations() {

    if ( class_exists( 'WooCommerce' ) ) {

      if (($this->archiveDisplayEnabled) && (is_product_category())) {
          $this->display();
      } else {
        if (!is_product_category()) {
          $this->display();
        }
      }

    } else {
      $this->display();
    }
  }

  public function display() {
    global $post;

    if (is_front_page()) {
      if (($this->homeVideoID !== '') || ($this->homePlaylistID !== '')) {

        echo "<span id='landing_yt_player' data-id='" . $this->homeVideoID . "' data-playlist-id='" . $this->homePlaylistID . "' data-start-time='" . $this->startTime . "' data-below-header='" . $this->belowHeader. "' data-blur='" . $this->blurVidBg . "'></span>";

      }
    } else {
      if (($this->postVideoID !== '') || ($this->postPlaylistID !== '')) {

        echo "<span id='landing_yt_player' data-id='" . $this->postVideoID . "' data-playlist-id='" . $this->postPlaylistID . "' data-below-header='0' data-blur='" . $this->blurVidBg . "'></span>";

      } else {

        $image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id(  $post->ID ), 'full' );

        if ( $image_attributes ) {

          ?><img class="page_background_image" src="<?php echo $image_attributes[0]; ?>"/><?php

        }

      }
    }





  }

  public function get_user_options() {
    global $post;
    $prefix = CustomizerHelpers::get_settings_prefix();

    $this->homeVideoID = get_theme_mod($prefix.'_video_id');
    $this->homePlaylistID = get_theme_mod($prefix.'_playlist');

    $this->postVideoID = get_field('post_youtube_video_id', $post->ID, false);
    $this->postPlaylistID = get_field('post_youtube_playlist_id', $post->ID, false);
    $this->startTime = get_theme_mod($prefix.'_start_time');
    $this->belowHeader = get_theme_mod($prefix.'_below_header');
    $this->blurVidBg = get_theme_mod($prefix.'_blur_vid_bg');
    $this->stickyBackgroundVideoEnabled = get_theme_mod( $prefix.'_sticky');
    $this->archiveDisplayEnabled = get_theme_mod( $prefix.'_woo_archive_display');
  }

}