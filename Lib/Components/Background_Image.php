<?php
/**
 * Background image
 *
 * @package     Virtuoso\Lib\Components
 * @since       2.1.7
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */
namespace Virtuoso\Lib\Components;

defined( 'ABSPATH' ) || exit;

/**
 * Class Background_Image.
 */
class Background_Image {

	public static function background_image( $post_id ) {

		$image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' );

		if ( $image_attributes ) {

			?>
			<div class="page_background_image">
				<div class="hero-overlay"></div>
				<img src="<?php echo esc_url( $image_attributes[0] ); ?>"/>
			</div>
			<?php

		}

	}

	public static function add() {
		add_action( 'virtuoso_featured_background_image', array( __class__, 'background_image' ) );
	}

	public static function remove() {
		remove_action( 'virtuoso_featured_background_image', array( __class__, 'background_image' ), 10 );
	}

}
