<?php
/**
 * Customizer handler.
 *
 * @package     Virtuoso\lib
 * @since       2.0.0
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */

namespace Virtuoso\Lib\Components\Customizer;

use WP_Customize_Color_Control;

class Customizer extends CustomizerHelpers {

	public function __construct() {
		add_action( 'customize_register', array( $this, 'register_with_customizer' ) );

	}

	/**
	 * Register settings and controls with the Customizer.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer object.
	 */
	function register_with_customizer() {
		$prefix = $this->get_settings_prefix();

		global $wp_customize;


		$wp_customize->add_section( 'slide-out-sidebar', array(
			'title'    => __( 'Slide-Out Sidebar', CHILD_TEXT_DOMAIN, 'virtuoso' ),
			'priority' => 1,
		) );


		$wp_customize->add_setting(
			$prefix . '_link_color',
			array(
				'default'           => $this->get_default_link_color(),
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$prefix . '_link_color',
				array(
					'description' => __( 'Change the default color for linked titles, menu links, post info links and more.', CHILD_TEXT_DOMAIN, 'virtuoso' ),
					'label'       => __( 'Link Color', CHILD_TEXT_DOMAIN, 'virtuoso' ),
					'section'     => 'colors',
					'settings'    => $prefix . '_sample_link_color',
				)
			)
		);

		$wp_customize->add_setting(
			$prefix . '_accent_color',
			array(
				'default'           => $this->get_default_accent_color(),
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$prefix . '_accent_color',
				array(
					'description' => __( 'Change the default color for button hovers.', CHILD_TEXT_DOMAIN, 'virtuoso' ),
					'label'       => __( 'Accent Color', CHILD_TEXT_DOMAIN, 'virtuoso' ),
					'section'     => 'colors',
					'settings'    => $prefix . '_accent_color',
				)
			)
		);

	}

}
