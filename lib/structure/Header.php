<?php
/**
 * Header HTML markup structure
 *
 * @package     Virtuoso\lib\Structure
 * @since       2.1.7
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */

namespace Virtuoso\Lib\Structure;


class Header {
	public $config = "";
	public function __construct( $config ) {
		add_action( 'genesis_after_header', [ $this, 'include_sexy_popup' ] );

	}

	/**
	 * Unregister header callbacks.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function unregister_header_callbacks( $config ) {
		unregister_sidebar( 'header-right' );

	}

	/**
	 * Include sexy popup if it's available
	 *
	 * @since 1.0.4
	 *
	 * @return void
	 */
	function include_sexy_popup() {

		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

		if ( ! is_admin() && is_plugin_active( 'sexy-popup/index.php' ) ) {
			include_once( SEXY_POPUP_PATH . "inc/views/popup.php" );
		}
	}

}