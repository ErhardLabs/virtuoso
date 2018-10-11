<?php
/**
 * Customizer handler for Floating contact
 *
 * @package     Virtuoso\Lib\Components\Customizer
 * @since       2.0.0
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */

namespace Virtuoso\Lib\Components\Customizer;

class FloatingContact {

	public $settings = array();

	public function __construct() {
		$this->register_section();
	}

	public function register_section() {

		$prefix = CustomizerHelpers::get_settings_prefix();

		global $wp_customize;

		$wp_customize->add_section( 'floating_contact', array(
			'title'    => __( 'Floating Contact', CHILD_TEXT_DOMAIN, 'virtuoso' ),
			'priority' => 50
		) );

		$wp_customize->add_setting(
			$prefix . '_display_floating_contact',
			array(
				'capability' => 'edit_theme_options',
				'default' => false,
			)
		);

		$wp_customize->add_control(
			$prefix . '_display_floating_contact',
			array(
				'label' => __('Display Floating Contact', CHILD_TEXT_DOMAIN, 'virtuoso'),
				'section' => 'floating_contact',
				'type' => 'checkbox',
			)
		);

		$this->settings[] = $prefix . '_display_floating_contact';

		$wp_customize->add_setting(
			$prefix . '_contact_url',
			array(
				'default' => '/contact',
			)
		);

		$wp_customize->add_control(
			$prefix . '_contact_url',
			array(
				'label' => __('Contact Page URL', CHILD_TEXT_DOMAIN, 'virtuoso'),
				'description' => __('Add the URL of the Contact page.', CHILD_TEXT_DOMAIN, 'virtuoso'),
				'section' => 'floating_contact',
				'type' => 'text',
			)
		);

		$this->settings[] = $prefix . '_contact_url';


	}

	public function live_preview() {

		global $wp_customize;

		foreach ( $this->settings as $setting ) {
			$wp_customize->get_setting( $setting )->transport = 'postMessage';
		}

	}


}