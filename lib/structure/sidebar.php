<?php
/**
 * Sidebar (widgetized areas) HTML markup structure
 *
 * @package     ErhardLabs\Virtuoso
 * @since       1.0.0
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */
namespace ErhardLabs\Virtuoso;

/**
 * Unregister sidebar callbacks.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unregister_sidebar_callbacks() {
	remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
}