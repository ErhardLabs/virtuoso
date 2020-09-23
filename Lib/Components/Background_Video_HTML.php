<?php
/**
 * Background video
 *
 * @package     Virtuoso\Lib\Components
 * @since       2.1.7
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */

namespace Virtuoso\Lib\Components;

use Virtuoso\Lib\Admin\Customizer\CustomizerHelpers;
use Virtuoso\Lib\Components\Background_Image;
use Virtuoso\Lib\Helper;

defined('ABSPATH') || exit;

/**
 * Class Background_Video_HTML.
 */
class Background_Video_HTML
{

    public $video_id;
    public $playlist_id;
    public $start_time;
    public $below_header;
    public $blur_vid_bg;
    public $archive_display_enabled;
    public $sticky_background_video_enabled;
    public $post_id;

    public function __construct()
    {

        global $post;
        if (null !== $post) {
            $this->post_id = $post->ID;
            $this->get_user_options();
            $this->determine_display_locations();
        }
    }


    public function determine_display_locations()
    {

        if (class_exists('WooCommerce')) {

            if (($this->archive_display_enabled) && (is_product_category())) {
                $this->display();
            } else {
                if ( ! is_product_category()) {
                    $this->display();
                }
            }
        } else {
            $this->display();
        }
    }

    public function display()
    {

        if (('' !== $this->video_id) || ('' !== $this->playlist_id)) {

            echo "<span id='landing_yt_player' data-id='".esc_attr($this->video_id)."' data-playlist-id='".esc_attr($this->playlist_id)."' data-start-time='".esc_attr($this->start_time)."' data-below-header='".esc_attr($this->below_header)."' data-blur='".esc_attr($this->blur_vid_bg)."'></span>";

        }

        do_action('virtuoso_featured_background_image', $this->post_id);

    }

    public function get_user_options()
    {

        $prefix = CustomizerHelpers::get_settings_prefix();

        if (function_exists('get_field')) {
            $video_link     = get_field('post_youtube_video_link', $this->post_id, false);
            $video_id       = Helper::extract_video_id($video_link);
            $this->video_id = ($video_id) ? $video_id : '';

            $playlist_link = get_field('post_youtube_playlist_link', $this->post_id, false);

            if (('' !== $playlist_link) && (null !== $playlist_link)) {
                $playlist_id       = explode('?list=', $playlist_link);
                $playlist_id       = $playlist_id[1];
                $this->playlist_id = $playlist_id;
            } else {
                $this->playlist_id = '';
            }

            $this->start_time                      = get_field('start_time', $this->post_id, false);
            $this->below_header                    = get_field('display_below_header', $this->post_id, false);
            $this->blur_vid_bg                     = get_field('blur', $this->post_id, false);
            $this->sticky_background_video_enabled = get_field('fixed_to_page', $this->post_id, false);

        }

    }

}
