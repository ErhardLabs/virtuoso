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

class Customizer {

	public function __construct() {
		add_action( 'customize_register', [ $this, 'register_with_customizer' ] );
	}

	/**
	 * Register settings and controls with the Customizer.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer object.
	 */
	public function register_with_customizer() {

//	  new Background_Video();
	  new HeaderMenuLayout();
	  new FooterLayout();
	  new Contact();
    new Slide_Out_Sidebar();

	}

}
