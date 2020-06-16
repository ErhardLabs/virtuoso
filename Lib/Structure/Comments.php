<?php
/**
 * Comments structure handling.
 *
 * @package     Virtuoso\lib\Structure
 * @since       2.1.7
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */

namespace Virtuoso\Lib\Structure;

defined( 'ABSPATH' ) || exit;

/**
 * Class Comments.
 */
class Comments {

	public function __construct() {
		add_filter( 'genesis_comment_list_args', [ $this, 'setup_comments_gravatar' ] );
	}

	/**
	 * Modify size of the Gravatar in the entry comments.
	 *
	 * @since 1.0.0
	 *
	 * @param array $args
	 *
	 * @return mixed
	 */
	public function setup_comments_gravatar( array $args ) {

		$args['avatar_size'] = 60;

		return $args;
	}
}

