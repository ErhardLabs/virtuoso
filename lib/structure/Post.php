<?php
/**
 * Description
 *
 * @package     Virtuoso\lib\Structure
 * @since       1.0.0
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */

namespace Virtuoso\Lib\Structure;


class Post {
	public function __construct( $config ) {
		add_filter( 'genesis_author_box_gravatar_size', [ $this, 'setup_author_box_gravatar_size' ] );
	}

	/**
	 * Unregister post callbacks.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function unregister_post_callbacks( $config ) {

	}


	/**
	 * Modify size of the Gravatar in the author box.
	 *
	 * @since 1.0.0
	 *
	 * @param $size
	 *
	 * @return int
	 */
	public static function setup_author_box_gravatar_size( $size ) {

		return 90;
	}
}
