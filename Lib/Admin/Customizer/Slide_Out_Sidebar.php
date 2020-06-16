<?php
/**
 * Slide out sidebar class
 *
 * @package     Virtuoso\Lib\Admin\Customizer
 * @since       2.0.0
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */

namespace Virtuoso\Lib\Admin\Customizer;

defined( 'ABSPATH' ) || exit;

/**
 * CustomizerHelpers.
 */
class Slide_Out_Sidebar {

	public $settings = array();

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->register_section();
		CustomizerHelpers::live_preview( $this->settings );
	}

	/**
	 * Constructor.
	 */
	public function register_section() {

		$prefix = CustomizerHelpers::get_settings_prefix();

		global $wp_customize;

		$wp_customize->add_section(
			'slide_out_sidebar',
			array(
				'title'    => __( 'Slide-Out Sidebar', 'virtuoso' ),
				'priority' => 1,
			)
		);

		$wp_customize->add_setting( $prefix . '_cart_item_quantity' );

		$wp_customize->add_control(
			$prefix . '_cart_item_quantity',
			array(
				'label'   => __( 'Show cart item quantity', 'virtuoso' ),
				'section' => 'slide_out_sidebar',
				'type'    => 'checkbox',
			)
		);

		$this->settings[] = $prefix . '_cart_item_quantity';

		$wp_customize->add_setting(
			$prefix . '_cart_classes',
			array(
				'default' => '.cart-icon',
			)
		);

		$wp_customize->add_control(
			$prefix . '_cart_classes',
			array(
				'label'       => __( 'Custom Cart Classes/IDs', 'virtuoso' ),
				'description' => __( 'Add cart classes or IDs (with prepending period or pound symbol). For multiple classes/IDs, comma separate them', 'virtuoso' ),
				'section'     => 'slide_out_sidebar',
				'type'        => 'text',
			)
		);

		$this->settings[] = $prefix . '_cart_classes';

		$sidebar_widgets = get_option( 'sidebars_widgets' );
		$slider_widgets  = $sidebar_widgets['slider'];

		foreach ( $slider_widgets as $widget ) {

			$widget_pieces = explode( '-', $widget );
			$widget_name   = $widget_pieces[0];
			$widget_index  = $widget_pieces[1];
			$widget_data   = get_option( 'widget_' . $widget_name );

			$widget_header = $widget_data[ $widget_index ]['title'];

			$widget_header_slug = strtolower( $widget_header );

			$wp_customize->add_setting( $prefix . '_widget_class_list' . '_wid_' . $widget );

			$wp_customize->add_control(
				$prefix . '_widget_class_list' . '_wid_' . $widget,
				array(
					'label'       => __( "Custom $widget_header Classes/IDs", 'virtuoso' ),
					'description' => __( "Add $widget_header_slug classes or IDs (with period/pound before class/ID). For multiple classes/IDs, comma separate them.", 'virtuoso' ),
					'section'     => 'slide_out_sidebar',
					'type'        => 'text',
				)
			);

			$this->settings[] = $prefix . '_widget_class_list' . '_wid_' . $widget;

		}

	}

}
