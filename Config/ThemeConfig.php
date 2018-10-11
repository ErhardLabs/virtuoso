<?php
/**
 * Functions to access theme supports and theme configuration items
 *
 * @package     Virtuoso\lib\Functions
 * @since       2.1.7
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */

namespace Virtuoso\Config;


class ThemeConfig {

	static function config_settings() {
		return array(
			//=============================================
			// Theme support features to add
			//=============================================
			'add_theme_support'         => array(
				'html5'                           => array(
					'caption',
					'comment-form',
					'comment-list',
					'gallery',
					'search-form'
				),
				'genesis-accessibility'           => array(
					'404-page',
					'drop-down-menu',
					'headings',
					'rems',
					'search-form',
					'skip-links'
				),
				'genesis-responsive-viewport'     => null,
				'custom-header'                   => array(
					'width'           => 600,
					'height'          => 160,
					'header-selector' => '.site-title a',
					'header-text'     => false,
					'flex-height'     => false,
					'flex-width'      => true,
					'video'           => false,
				),
				'custom-background'               => null,
				'genesis-after-entry-widget-area' => null,
				'genesis-footer-widgets'          => 4,
				'genesis-menus'                   => array(
					'primary'   => __( 'Primary Navigation', CHILD_TEXT_DOMAIN, 'virtuoso' ),
					'secondary' => __( 'Secondary Navigation', CHILD_TEXT_DOMAIN, 'virtuoso' ),
					'footer'    => __( 'Footer Navigation', CHILD_TEXT_DOMAIN, 'virtuoso' )
				),
				'woocommerce',
				'auto-wide',
//		'genesis-after-entry-widget-area' => null,
			),
			//=============================================
			// Layouts to unregister
			//=============================================
			'genesis_unregister_layout' => array(
				'sidebar-content',
//				'content-sidebar',
				'content-sidebar-sidebar',
				'sidebar-content-sidebar',
				'sidebar-sidebar-content',
			),
			//=============================================
			// Theme Default Settings
			//=============================================
			'theme_default_settings'    => array(
				'blog_cat_num'              => 12,
				'content_archive'           => 'full',
				'content_archive_limit'     => 0,
				'content_archive_thumbnail' => 0,
				'posts_nav'                 => 'numeric',
				'site_layout'               => 'full-width-content',
				'front-page-widgets'           => array(
					array(
						'id'           => 'front-page-1',
						'name'         => __( 'Front Page 1', 'virtuoso' ),
						'description'  => __( 'Front page 1 widget area.', 'virtuoso' ),
						'before_title' => '<h1 itemprop="headline">',
						'after_title'  => '</h1>',
					),
					array(
						'id'          => 'front-page-2',
						'name'        => __( 'Front Page 2', 'virtuoso' ),
						'description' => __( 'Front page 2 widget area.', 'virtuoso' ),
					),
					array(
						'id'          => 'front-page-3',
						'name'        => __( 'Front Page 3', 'virtuoso' ),
						'description' => __( 'Front page 3 widget area.', 'virtuoso' ),
					),
					array(
						'id'          => 'front-page-4',
						'name'        => __( 'Front Page 4', 'virtuoso' ),
						'description' => __( 'Front page 4 widget area.', 'virtuoso' ),
					),
					array(
						'id'          => 'front-page-5',
						'name'        => __( 'Front Page 5', 'virtuoso' ),
						'description' => __( 'Front page 5 widget area.', 'virtuoso' ),
					),
				),
        'sidebar-widgets'       => array(
            array(
                'name' => __( 'Slide-Out Sidebar', CHILD_TEXT_DOMAIN, 'virtuoso' ),
                'id' => 'slider',
//                'description' => __( '', '' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h4 class="widgettitle">',
                'after_title'   => '</h4>',
            ),
        ),
			),
			//=============================================
			// Image Sizes
			//=============================================
			'theme_image_sizes'         => array(
				'featured-image' => array(
					'width'  => 720,
					'height' => 400,
					'crop'   => true,
				),

			),
		);
	}

	/**
	 * Get runtime configuration parameters.
	 *
	 * @since 2.1.7
	 *
	 * @param string $key Configuration parameter key
	 * @param string $config_file (Optional) Configuration filename without the extension.
	 *
	 * @return array|null|mixed
	 */
	static function get_configuration_parameters( $key = '' ) {

		$config = ThemeConfig::config_settings();

		if ( ! $key ) {
			return $config;
		}


		if ( array_key_exists( $key, $config ) ) {
			return $config[ $key ];
		}
	}

	/**
	 * Get the theme settings defaults.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	static function get_theme_settings_defaults() {
		return ThemeConfig::get_configuration_parameters( 'theme_default_settings' );
	}

}