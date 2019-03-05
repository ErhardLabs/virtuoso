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

class FooterLayout {

	public $settings = array();

	public function __construct() {
		$this->register_section();
	}

	public function register_section() {

		$prefix = CustomizerHelpers::get_settings_prefix();

		global $wp_customize;

		$wp_customize->add_section( 'footer_layout', array(
			'title'    => __( 'Footer Layout', CHILD_TEXT_DOMAIN, 'virtuoso' ),
			'priority' => 50
		) );

		$wp_customize->add_setting(
			$prefix . '_footer_design',
			array(
				'capability' => 'edit_theme_options',
				'default' => 'footer-widgets-block',
			)
		);

		$wp_customize->add_control(
			$prefix. '_footer_design', array(
			'type' => 'radio',
			'section' => 'footer_layout', // Add a default or your own section
			'label' => __( 'Footer Layout Design', CHILD_TEXT_DOMAIN ),
			'description' => __( 'Choose the Footer layout design', CHILD_TEXT_DOMAIN ),
			'choices' => array(
				'footer-widgets-left-column' => __( 'Left aligned', CHILD_TEXT_DOMAIN ),
				'footer-widgets-block' => __( 'Block (Stacked)', CHILD_TEXT_DOMAIN ),
				'footer-widgets-minimal' => __( 'Minimal left aligned', CHILD_TEXT_DOMAIN ),
			),
		) );

		$this->settings[] = $prefix . '_footer_design';


	}

	public function live_preview() {

		global $wp_customize;

		foreach ( $this->settings as $setting ) {
			$wp_customize->get_setting( $setting )->transport = 'postMessage';
		}

	}


}