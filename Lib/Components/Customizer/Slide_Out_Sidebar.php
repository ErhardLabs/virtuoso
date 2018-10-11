<?php
/**
 * Created by PhpStorm.
 * User: gerhard
 * Date: 9/24/18
 * Time: 3:12 PM
 */

namespace Virtuoso\Lib\Components\Customizer;

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
        $prefix . '_width',
        array(
            'default'           => '400px',
        )
    );

    $wp_customize->add_control(
        $prefix . '_width',
        array(
            'label' => __('Width', CHILD_TEXT_DOMAIN, 'virtuoso'),
            'section' => 'slide_out_sidebar',
            'type' => 'text',
        )
    );

    $this->settings[] = $prefix . '_width';

    $wp_customize->add_setting(
        $prefix . '_enabled',
        array(
            'default'           => true,
        )
    );

    $wp_customize->add_control(
        $prefix . '_enabled',
        array(
            'label' => __('Enabled', CHILD_TEXT_DOMAIN, 'virtuoso'),
            'section' => 'slide_out_sidebar',
            'type' => 'checkbox',
        )
    );

    $this->settings[] = $prefix . '_enabled';

    $wp_customize->add_setting(
        $prefix . '_cart_item_quantity',
        array(
            'default'           => true,
        )
    );

    $wp_customize->add_control(
        $prefix . '_cart_item_quantity',
        array(
            'label' => __('Show cart item quantity', CHILD_TEXT_DOMAIN, 'virtuoso'),
            'section' => 'slide_out_sidebar',
            'type' => 'checkbox',
        )
    );

    $this->settings[] = $prefix . '_cart_item_quantity';

    $wp_customize->add_setting(
        $prefix . '_cart_classes',
        array(
//            'default'           => true,
        )
    );

    $wp_customize->add_control(
        $prefix . '_cart_classes',
        array(
            'label' => __('Custom Cart Classes/IDs', CHILD_TEXT_DOMAIN, 'virtuoso'),
            'description' => __('Add cart classes or IDs (with prepending period or pound symbol). For multiple classes/IDs, comma separate them', CHILD_TEXT_DOMAIN, 'virtuoso'),
            'section' => 'slide_out_sidebar',
            'type' => 'text',
        )
    );

    $this->settings[] = $prefix . '_cart_classes';

    $sidebarWidgets = get_option( 'sidebars_widgets');
    $sliderWidgets = $sidebarWidgets['slider'];
    foreach($sliderWidgets as $widget) {

      $widgetPieces = explode('-', $widget);
      $widgetName = $widgetPieces[0];
      $widgetIndex = $widgetPieces[1];
      $widgetData = get_option('widget_'.$widgetName);
      if (isset($widgetData['_multiwidget'])) {
        unset($widgetData['_multiwidget']);
      }

      foreach($widgetData as $data) {
        if (count($data) < 1) {
          continue;
        }


        $widgetTitle = $data['title'];
        $widgetSlug = strtolower($widgetTitle);

        $wp_customize->add_setting(
            $prefix . '_' . $widgetSlug . '_widget_class_list',
            array(
//            'default'           => true,
            )
        );

        $wp_customize->add_control(
            $prefix . '_' . $widgetSlug . '_widget_class_list',
            array(
                'label' => __("Custom $widgetTitle Classes/IDs", CHILD_TEXT_DOMAIN, 'virtuoso'),
                'description' => __("Add $widgetSlug classes or IDs (with prepending period or pound symbol). For multiple classes/IDs, comma separate them", CHILD_TEXT_DOMAIN, 'virtuoso'),
                'section' => 'slide_out_sidebar',
                'type' => 'text',
            )
        );

        $this->settings[] = $prefix . '_' . $widgetSlug . '_widget_class_list';

      }
    }



  }

}