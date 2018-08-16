<?php

/**
 * Register settings and controls with the Customizer.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
add_action( 'widgets_init', 'slide_out_sidebar_widget_admin_area' );
function slide_out_sidebar_widget_admin_area() {
  register_sidebar( array(
      'name' => __( 'Slide-Out Sidebar', 'slide-out-sidebar' ),
      'id' => 'slider',
      'description' => __( '', '' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h4 class="widgettitle">',
      'after_title'   => '</h4>',
  ) );
}