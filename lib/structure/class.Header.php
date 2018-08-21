<?php
/**
 * Header HTML markup structure
 *
 * @package     ErhardLabs\Virtuoso
 * @since       1.0.0
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */
namespace Theme\Virtuoso\Structure;


class Header {

	public function __construct() {
		add_action( 'genesis_after_header', array( $this, 'include_sexy_popup') );

	}

	/**
	 * Unregister header callbacks.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function unregister_header_callbacks() {
		unregister_sidebar('header-right' );

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

		if (!is_admin() && is_plugin_active( 'sexy-popup/index.php' )){
			include_once(SEXY_POPUP_PATH . "inc/views/popup.php");
		}
	}

}







