<?php
/**
 * Created by PhpStorm.
 * User: gerhard
 * Date: 9/24/18
 * Time: 3:51 PM
 */
namespace Virtuoso\Lib\Components;
use Virtuoso\Lib\Admin\Customizer\CustomizerHelpers;
use Virtuoso\Lib\Components\Background_Image;

class Background_Video_HTML
{

  public $videoID;
  public $playlistID;
  public $startTime;
  public $belowHeader;
  public $blurVidBg;
  public $archiveDisplayEnabled;
  public $stickyBackgroundVideoEnabled;
  public $postID;

  public function __construct() {

    if (!is_category()) {
      global $post;
      $this->postID = $post->ID;
      $this->get_user_options();
      $this->determine_display_locations();
    }

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

    if (($this->videoID !== '') || ($this->playlistID !== '')) {

      echo "<span id='landing_yt_player' data-id='" . $this->videoID . "' data-playlist-id='" . $this->playlistID . "' data-start-time='" . $this->startTime . "' data-below-header='" . $this->belowHeader. "' data-blur='" . $this->blurVidBg . "'></span>";

    } else {
      do_action('virtuoso_featured_background_image', $this->postID);
    }

  }

  public function get_user_options() {

    $prefix = CustomizerHelpers::get_settings_prefix();

    $videoLink = get_field('post_youtube_video_link', $this->postID, false);

    if (($videoLink !== '') && ($videoLink !== NULL)) {
      $video_id = explode("?v=", $videoLink);
      $video_id = $video_id[1];
      $this->videoID = $video_id;
    } else {
      $this->videoID = '';
    }

    $playlistLink = get_field('post_youtube_playlist_link', $this->postID, false);

    if (($playlistLink !== '') && ($playlistLink !== NULL)) {
      $playlist_id = explode("?list=", $playlistLink);
      $playlist_id = $playlist_id[1];
      $this->playlistID = $playlist_id;
    } else {
      $this->playlistID = '';
    }


    $this->startTime = get_field('start_time', $this->postID, false);
    $this->belowHeader = get_field('display_below_header', $this->postID, false);
    $this->blurVidBg = get_field('blur', $this->postID, false);
    $this->stickyBackgroundVideoEnabled = get_field('fixed_to_page', $this->postID, false);

//    $this->startTime = get_theme_mod($prefix.'_start_time');
//    $this->belowHeader = get_theme_mod($prefix.'_below_header');
//    $this->blurVidBg = get_theme_mod($prefix.'_blur_vid_bg');
//    $this->stickyBackgroundVideoEnabled = get_theme_mod( $prefix.'_sticky');
//    $this->archiveDisplayEnabled = get_theme_mod( $prefix.'_woo_archive_display');
  }

}