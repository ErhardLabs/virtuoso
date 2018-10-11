<?php
/**
 * Customizer handler for Background Video
 *
 * @package     Virtuoso\Lib\Components\Customizer
 * @since       2.0.0
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */

namespace Virtuoso\Lib\Components\Customizer;


class Background_Video
{

  public $settings = array();

  public function __construct()
  {
    $this->register_section();
  }

  public function register_section()
  {

    $prefix = CustomizerHelpers::get_settings_prefix();

    global $wp_customize;

    $wp_customize->add_section('background_video', array(
        'title'         => __('Background Video', CHILD_TEXT_DOMAIN, 'virtuoso'),
        'priority'      => 60
    ));

    $wp_customize->add_setting(
        $prefix . '_video_id',
        array(
            'default' => 'GlmTrpsNPh4',
        )
    );

    $wp_customize->add_control(
        $prefix . '_video_id',
        array(
            'label' => __('Background Video YouTube ID', CHILD_TEXT_DOMAIN, 'virtuoso'),
            'section' => 'background_video',
            'type' => 'text',
        )
    );

    $this->settings[] = $prefix . '_video_id';

    $wp_customize->add_setting(
        $prefix . '_playlist',
        array(
            'default' => 'PLCcd4NlKH5YzNrrji-f_3elED_tmifwUz',
        )
    );

    $wp_customize->add_control(
        $prefix . '_playlist',
        array(
            'label' => __('Video Playlist', CHILD_TEXT_DOMAIN, 'virtuoso'),
            'description' => __('Add playlist ID.', CHILD_TEXT_DOMAIN, 'virtuoso'),
            'section' => 'background_video',
            'type' => 'text',
        )
    );

    $this->settings[] = $prefix . '_playlist';

    $wp_customize->add_setting(
        $prefix . '_start_time',
        array(
            'default' => '0',
        )
    );

    $wp_customize->add_control(
        $prefix . '_start_time',
        array(
            'label' => __('Start Time (in seconds)', CHILD_TEXT_DOMAIN, 'virtuoso'),
            'section' => 'background_video',
            'type' => 'text',
        )
    );

    $this->settings[] = $prefix . '_start_time';

    $wp_customize->add_setting(
        $prefix . '_sticky',
        array(
            'default' => true,
        )
    );

    $wp_customize->add_control(
        $prefix . '_sticky',
        array(
            'label' => __('Sticky Background', CHILD_TEXT_DOMAIN, 'virtuoso'),
            'section' => 'background_video',
            'type' => 'checkbox',
        )
    );

    $this->settings[] = $prefix . '_sticky';

	  $wp_customize->add_setting(
		  $prefix . '_blur_vid_bg',
		  array(
			  'default' => false,
		  )
	  );

	  $wp_customize->add_control(
		  $prefix . '_blur_vid_bg',
		  array(
			  'label' => __('Blur Background Video', CHILD_TEXT_DOMAIN, 'virtuoso'),
			  'section' => 'background_video',
			  'type' => 'checkbox',
		  )
	  );

	  $this->settings[] = $prefix . '_blur_vid_bg';

    $wp_customize->add_setting(
        $prefix . '_woo_archive_display',
        array(
            'default' => true,
        )
    );

    $wp_customize->add_control(
        $prefix . '_woo_archive_display',
        array(
            'label' => __('Display Video in WooCommerce Archive Pages', CHILD_TEXT_DOMAIN, 'virtuoso'),
            'section' => 'background_video',
            'type' => 'checkbox',
        )
    );

    $this->settings[] = $prefix . '_woo_archive_display';

    $wp_customize->add_setting(
        $prefix . '_below_header',
        array(
            'default' => true,
        )
    );

    $wp_customize->add_control(
        $prefix . '_below_header',
        array(
            'label' => __('Display Below Header', CHILD_TEXT_DOMAIN, 'virtuoso'),
            'section' => 'background_video',
            'type' => 'checkbox',
        )
    );

    $this->settings[] = $prefix . '_below_header';

  }

  public function live_preview() {

    global $wp_customize;

    foreach($this->settings as $setting) {
      $wp_customize->get_setting( $setting )->transport = 'postMessage';
    }

  }


}