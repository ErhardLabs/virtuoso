<?php
/**
 * Description
 *
 * @package     Virtuoso\lib\Structure
 * @since       2.1.7
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */

namespace Virtuoso\Lib\Structure;

use Virtuoso\Lib\ThemeConfig;
use Virtuoso\Lib\Components\Background_Image;

defined( 'ABSPATH' ) || exit;
/**
 * Class Post.
 */
class Post {
	public $config = '';
	public function __construct() {

		$this->config = ThemeConfig::get_configuration_parameters( 'theme_default_settings' );

		add_filter( 'genesis_author_box_gravatar_size', [ $this, 'setup_author_box_gravatar_size' ] );
		add_action( 'widgets_init', [ $this, 'register_widgets' ] );
	}

	public function register_widgets() {

		$widgets = $this->config['front-page-widgets'];

		foreach ( $widgets as $widget ) {
			genesis_register_sidebar( $widget );
		}

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
