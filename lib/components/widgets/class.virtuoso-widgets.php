<?php

/**
 * Register Widget for slide out sidebar.
 *
 * @since 1.0.0
 *
 */
namespace ErhardLabs\Virtuoso\Widgets;

class VirtuosoWidgetArea {

  public function __construct(array $args)
  {

//    d($args);

    add_action( 'widgets_init', function() {
      register_sidebar( $args );
    });

  }

}