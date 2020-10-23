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

use Virtuoso\Lib\Components\Background_Video_HTML;

defined( 'ABSPATH' ) || exit;
/**
 * Class Header.
 */
class Header {
	public function __construct() {
		add_action( 'genesis_after_header', array( $this, 'include_sexy_popup' ) );
		add_action( 'genesis_after_header', array( $this, 'include_background_video' ) );
		remove_action( 'genesis_doctype', 'genesis_do_doctype' );
		add_action( 'genesis_doctype', array( $this, 'virtuoso_doctype' ) );
	}

	/**
	 * HTML5 doctype markup.
	 *
	 * @since 2.0.0
	 */
	public function virtuoso_doctype() {
		?>
		<!DOCTYPE html>
		<html <?php language_attributes( 'html' ); ?>>
		<head <?php echo genesis_attr( 'head' ); ?>>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<style>body{visibility: hidden;opacity:0;}</style>
		<?php

	}

	/**
	 * Unregister header callbacks.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public static function unregister_header_callbacks() {
		unregister_sidebar( 'header-right' );

	}

	/**
	 * Include sexy popup if it's available
	 *
	 * @return void
	 * @since 1.0.4
	 */
	public function include_sexy_popup() {

		include_once ABSPATH . 'wp-admin/includes/plugin.php';

		if ( ! is_admin() && is_plugin_active( 'sexy-popup/index.php' ) ) {
			include_once SEXY_POPUP_PATH . 'inc/views/popup.php';
		}
	}

	public function include_background_video() {
		if ( ! is_category() ) {
			if ( function_exists( 'is_buddypress' ) ) {
				if ( ! is_buddypress() ) {
					if ( ! is_search() ) {
						new Background_Video_HTML();
					}
				}
			} else {
				new Background_Video_HTML();
			}
		}
	}

}
