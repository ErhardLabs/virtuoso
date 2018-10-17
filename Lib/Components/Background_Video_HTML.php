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

  public $videoID;
  public $playlistID;
  public $startTime;
  public $belowHeader;
  public $archiveDisplayEnabled;
  public $stickyBackgroundVideoEnabled;

  public function __construct() {

    $prefix = CustomizerHelpers::get_settings_prefix();

    $this->videoID = get_theme_mod($prefix.'_video_id');
    $this->playlistID = get_theme_mod($prefix.'_playlist');
    $this->startTime = get_theme_mod($prefix.'_start_time');
    $this->belowHeader = get_theme_mod($prefix.'_below_header');
    $this->blurVidBg = get_theme_mod($prefix.'_blur_vid_bg');
    $this->stickyBackgroundVideoEnabled = get_theme_mod( $prefix.'_sticky');
    $this->archiveDisplayEnabled = get_theme_mod( $prefix.'_woo_archive_display');
    $this->determine_display_locations();

  }


  public function determine_display_locations() {

    if ( class_exists( 'WooCommerce' ) ) {

      if ($this->archiveDisplayEnabled) {
        if (is_product_category()) {
          $this->display();
        }
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

    if (($this->videoID !== '') && ($this->playlistID !== '')) {
      echo "<span id='landing_yt_player' data-id='" . $this->videoID . "' data-playlist-id='" . $this->playlistID . "' data-start-time='" . $this->startTime . "' data-below-header='" . $this->belowHeader. "' data-blur='" . $this->blurVidBg . "'></span>";
    }

  }

}