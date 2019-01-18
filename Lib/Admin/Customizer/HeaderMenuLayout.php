<?php
/**
 * Customizer handler for Header
 *
 * @package     Virtuoso\Lib\Admin\Customizer
 * @since       2.0.0
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */

namespace Virtuoso\Lib\Admin\Customizer;

class HeaderMenuLayout {

	public $settings = array();

	public function __construct() {
		$this->register_section();
	}

	public function register_section() {

		$prefix = CustomizerHelpers::get_settings_prefix();

		global $wp_customize;

		$wp_customize->add_section( 'header_menu_layout', array(
			'title'    => __( 'Header Menu Layout', CHILD_TEXT_DOMAIN, 'virtuoso' ),
			'priority' => 50
		) );

		$wp_customize->add_setting(
			$prefix . '_header_design',
			array(
				'capability' => 'edit_theme_options',
				'default' => 'logo-left',
			)
		);

		$wp_customize->add_control(
			$prefix. '_header_design', array(
			'type' => 'radio',
			'section' => 'header_menu_layout', // Add a default or your own section
			'label' => __( 'Header Layout Design' ),
			'description' => __( 'Choose the header layout design', CHILD_TEXT_DOMAIN ),
			'choices' => array(
				'logo-left' => __( 'Logo Left', CHILD_TEXT_DOMAIN ),
				'logo-middle' => __( 'Logo Middle', CHILD_TEXT_DOMAIN ),
				'navigation-middle' => __( 'Navigation Middle', CHILD_TEXT_DOMAIN ),
			),
		) );

		$this->settings[] = $prefix . '_header_design';


	}

	public function live_preview() {

		global $wp_customize;

		foreach ( $this->settings as $setting ) {
			$wp_customize->get_setting( $setting )->transport = 'postMessage';
		}

	}


}