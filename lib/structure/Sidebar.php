<?php
/**
 * Sidebar (widgetized areas) HTML markup structure
 *
 * @package     Virtuoso\lib\Structure
 * @since       1.0.0
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */

namespace Virtuoso\Lib\Structure;


class SideBar {
	public $config = "";
	public function __construct( $config ) {

	}

	/**
	 * Unregister sidebar callbacks.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function unregister_sidebar_callbacks( $config ) {
		remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
	}

}

