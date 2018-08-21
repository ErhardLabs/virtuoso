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
namespace ErhardLabs\Virtuoso;
/**
 * Unregister header callbacks.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unregister_header_callbacks() {
	unregister_sidebar('header-right' );
}
add_action( 'genesis_after_header', __NAMESPACE__ .'\include_sexy_popup');
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