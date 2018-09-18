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

	private function config_settings() {
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
					'flex-height'     => true,
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
				'sidebar-widgets'                  => array(
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
				// Virtuoso Settings
				'URLS'                      => array(
					'production' => 'https://tylerpaulsonpictures.com',
					'staging'    => 'https://staging.tylerpaulsonpictures.com',
					'local'      => 'https://tylerpaulsonpictures.test',
				),
				'header-design'             => array(
					'logo-left'   => true,
					'logo-middle' => false,
				),
				'footer-design'             => array(
					'footer-widgets-left-column' => false,
					'footer-widgets-block'       => true,
				),
				'sticky-contact'            => array(
					'align-left'   => false,
					'alight-right' => true,
				)
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
	public function get_configuration_parameters( $key = '' ) {

		$config = $this->config_settings();

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
	public function get_theme_settings_defaults() {
		return $this->get_configuration_parameters( 'theme_default_settings' );
	}

}