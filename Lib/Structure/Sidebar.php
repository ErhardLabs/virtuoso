<?php
/**
 * Sidebar (widgetized areas) HTML markup structure
 *
 * @package     Virtuoso\lib\Structure
 * @since       2.1.7
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */

namespace Virtuoso\Lib\Structure;


class Sidebar {
	public $config = "";
	public function __construct( $config ) {

		$this->config = $config;

		add_action( 'widgets_init', [ $this, 'register_sidebar_widgets' ] );
	}

	public function register_sidebar_widgets() {

		$sidebar_widgets = $this->config['sidebar-widgets'];

		foreach ( $sidebar_widgets as $sidebar_widget ) {
			genesis_register_sidebar($sidebar_widget);
		}

	}

	/**
	 * Unregister sidebar callbacks.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function unregister_sidebar_callbacks( $config ) {
		//remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
	}

}

