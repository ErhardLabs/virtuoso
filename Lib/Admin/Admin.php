<?php
/**
 * Admin class
 *
 * @package     Virtuoso\Lib\Admin
 * @since       2.1.7
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */

namespace Virtuoso\Lib\Admin;

use Virtuoso\Lib\Admin\CPTs\Custom_Post_Type;
use Virtuoso\Lib\Admin\Customizer\Customizer;

defined( 'ABSPATH' ) || exit;

/**
 * Admin.
 */
class Admin {

	/**
	 * Constructor.
	 */
	public function __construct() {
		new Customizer();
		new Custom_Post_Type();
	}

}