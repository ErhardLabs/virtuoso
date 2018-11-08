<?php

namespace Virtuoso\Lib\Admin\Blocks;

class Testimonial_Block {

  private $name = 'testimonial';

  public function __construct() {

    add_action('acf/init', [$this, 'initialize_acf_block']);

  }

  public function initialize_acf_block() {

    if(function_exists('acf_register_block')) {
      acf_register_block(array(
          'name' => 'testimonial',
          'title' => __('Testimonial'),
          'description' => __('An ACF Testimonial Block'),
          'render_callback' => [$this, 'get_template'],
          'category' => 'common',
          'icon' => 'admin-comments',
          'keywords' => array('testimonial', 'quote', 'acf'),
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