<?php
/**
 * Description
 *
 * @package     Virtuoso\lib\Functions
 * @since       2.0.0
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */
namespace Virtuoso\Lib\Functions;
use Virtuoso\Lib\Components\Background_Image;

class Formatting {
	public function __construct() {
    $this->format_breadcrumbs();
    $this->set_background_image_default();
    $this->format_metadata();
	}

	public function format_breadcrumbs() {
    add_filter('genesis_breadcrumb_args', function($args) {
      $args['labels']['prefix'] = '';
      return $args;
    });
  }

  public function set_background_image_default() {
    Background_Image::add();
  }

  public function format_metadata() {
    add_filter( 'genesis_post_meta', function($post_meta) {
      $post_meta = '[post_categories before=""] [post_tags before="Tags: "]';
      return $post_meta;
    } );
  }
}
