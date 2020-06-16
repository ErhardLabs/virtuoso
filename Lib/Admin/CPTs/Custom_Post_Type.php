<?php
/**
 * Custom post type class
 *
 * @package     Virtuoso\Lib\Admin\Customizer
 * @since       2.0.0
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */

namespace Virtuoso\Lib\Admin\CPTs;

defined( 'ABSPATH' ) || exit;

/**
 * CustomizerHelpers.
 */
class Custom_Post_Type {

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->set();

	}

	/**
	 * set the post type.
	 */
	public function set() {
		$directory = get_stylesheet_directory() . '/Lib/Admin/CPTs';

		foreach ( glob( $directory . '/*.*' ) as $file ) {
			if ( __FILE__ !== $file ) {
				include_once $file;
			}
		}
	}

}
