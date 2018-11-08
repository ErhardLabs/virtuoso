<?php
/**
 * Created by PhpStorm.
 * User: gerhard
 * Date: 11/7/18
 * Time: 6:39 PM
 */

namespace Virtuoso\Lib\Admin\Blocks;


class Centered_Welcome_Block
{

  private $name = 'centered_welcome';

  public function __construct() {

    add_action('acf/init', [$this, 'initialize_acf_block']);

  }

  public function initialize_acf_block() {

    if(function_exists('acf_register_block')) {
      acf_register_block(array(
          'name' => 'centered_welcome',
          'title' => __('Centered Welcome'),
          'description' => __('A block that is great for a home page.'),
          'render_callback' => [$this, 'get_template'],
          'category' => 'common',
          'icon' => 'admin-comments',
          'keywords' => array('centered_welcome', 'quote', 'acf'),
      ));
    }

  }

  public function get_template() {

    // convert name ("acf/testimonial") into path friendly slug ("testimonial")
    $slug = str_replace('acf/', '', $this->name);

    // include a template part from within the "template-parts/block" folder
    if( file_exists(CHILD_THEME_DIR . "/Lib/Admin/Blocks/Templates/block-{$slug}.php") ) {
      include( CHILD_THEME_DIR . "/Lib/Admin/Blocks/Templates/block-{$slug}.php" );
    }

  }

}