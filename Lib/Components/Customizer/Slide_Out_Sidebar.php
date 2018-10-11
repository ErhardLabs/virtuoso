<?php
/**
 * Created by PhpStorm.
 * User: gerhard
 * Date: 9/24/18
 * Time: 3:12 PM
 */

namespace Virtuoso\Lib\Components\Customizer;
use WP_Customize_Color_Control;


class Slide_Out_Sidebar
{

  public $settings = array();

  public function __construct()
  {
    $this->register_section();
    CustomizerHelpers::live_preview($this->settings);
  }

  public function register_section() {

    $prefix = CustomizerHelpers::get_settings_prefix();

    global $wp_customize;

    $wp_customize->add_section( 'slide_out_sidebar', array(
        'title'    => __( 'Slide-Out Sidebar', CHILD_TEXT_DOMAIN, 'virtuoso' ),
        'priority' => 1,
    ) );


    $wp_customize->add_setting(
        $prefix . '_link_color',
        array(
//            'default'           => CustomizerHelpers::get_default_link_color(),
//            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            $prefix . '_link_color',
            array(
                'description' => __( 'Change the default color for linked titles, menu links, post info links and more.', CHILD_TEXT_DOMAIN, 'virtuoso' ),
                'label'       => __( 'Link Color', CHILD_TEXT_DOMAIN, 'virtuoso' ),
                'section'     => 'slide_out_sidebar',
                'settings'    => $prefix . '_link_color',
                'type'        => 'color'
            )
        )
    );


    $this->settings[] = $prefix . '_link_color';


//
//    $wp_customize->add_setting(
//        $prefix . '_accent_color',
//        array(
//            'default'           => CustomizerHelpers::get_default_accent_color(),
//            'sanitize_callback' => 'sanitize_hex_color',
//        )
//    );
//
//    $wp_customize->add_control(
//        new WP_Customize_Color_Control(
//            $wp_customize,
//            $prefix . '_accent_color',
//            array(
//                'description' => __( 'Change the default color for button hovers.', CHILD_TEXT_DOMAIN, 'virtuoso' ),
//                'label'       => __( 'Accent Color', CHILD_TEXT_DOMAIN, 'virtuoso' ),
//                'section'     => 'colors',
//                'settings'    => $prefix . '_accent_color',
//            )
//        )
//    );

  }

}