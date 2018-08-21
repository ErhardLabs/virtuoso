<?php
/**
 * Developer's Theme
 *
 * @package     ErhardLabs\Virtuoso
 * @since       1.0.2
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */

// Include the main Virtuoso class.
include_once dirname( __FILE__ ) . '/lib/class.Virtuoso.php';


/**
 * Main instance of Virtuoso
 *
 * Returns the main instance of WC to prevent the need to use globals.
 *
 * @since  1.2.1
 * @return Theme\Virtuoso
 */
function virtuoso() {
	return Theme\Virtuoso::instance();
}

// Global for backwards compatibility.
$GLOBALS['virtuoso'] = virtuoso();
