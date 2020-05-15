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

namespace Virtuoso\Lib\Admin\Customizer;

defined( 'ABSPATH' ) || exit;

/**
 * Customizer.
 */
class Customizer {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'customize_register', [ $this, 'register_with_customizer' ] );
	}

	/**
	 * Register settings and controls with the Customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer object.
	 *
	 * @since 1.0.0
	 *
	 */
	public function register_with_customizer() {
		new Slide_Out_Sidebar();
	}

}
