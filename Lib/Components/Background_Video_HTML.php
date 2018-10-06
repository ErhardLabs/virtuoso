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

  public function __construct() {

    $prefix = CustomizerHelpers::get_settings_prefix();

    $this->videoID = get_theme_mod($prefix.'_video_id');
    $this->playlistID = get_theme_mod($prefix.'_playlist');
    $this->startTime = get_theme_mod($prefix.'_start_time');
    $this->belowHeader = get_theme_mod($prefix.'_below_header');
    $this->determine_display_locations();

  }


  public function determine_display_locations() {

    $prefix = CustomizerHelpers::get_settings_prefix();

    $stickyBackgroundVideoEnabled = get_theme_mod( $prefix.'_sticky');
    $archiveDisplayEnabled = get_theme_mod( $prefix.'_woo_archive_display');

    if ( class_exists( 'WooCommerce' ) ) {

      if ($archiveDisplayEnabled) {
        $this->display_in_category();
      }

    }

	  $this->display();

  }

  public function display() {

//    $videoID = get_post_meta( get_the_ID(), 'ge_video_bg', true );

    if ((is_front_page()) || ($this->videoID !== '')) {
      echo "<span id='landing_yt_player' data-id='" . $this->videoID . "' data-playlist-id='" . $this->playlistID . "' data-start-time='" . $this->startTime . "' data-below-header='" . $this->belowHeader. "'></span>";
    }

  }


  function display_in_category() {
    if (is_product_category() || is_front_page()) {
//      genesis_widget_area( 'home-subscribe-widget', array(
//          'before' => '<div id="home-subscribe-widget" class="home-subscribe-widget"><div class="widget-area ' . prettycreative_widget_area_class( 'home-subscribe-widget' ) . '"><div class="wrap">',
//          'after'  => '</div></div></div>',
//      ) );
    }
  }

}