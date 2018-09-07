<?php
/**
 * Comments structure handling.
 *
 * @package     Virtuoso\lib\Structure
 * @since       1.0.0
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */

namespace Virtuoso\Lib\Structure;

class Comments {
	public $config = "";
	public function __construct( $config ) {
		add_filter( 'genesis_comment_list_args', [ $this, 'setup_comments_gravatar' ] );
	}

	/**
	 * Unregister comments callbacks.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function unregister_comments_callbacks( $config ) {

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
	function setup_comments_gravatar( array $args ) {

		$args['avatar_size'] = 60;

		return $args;
	}
}

