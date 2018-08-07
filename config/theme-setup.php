<?php
/**
 * Description
 *
 * @package     ErhardLabs\Virtuoso
 * @since       1.0.0
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */
namespace ErhardLabs\Virtuoso;

return array(
	//=============================================
	// Theme support features to add
	//=============================================
	'add_theme_support' => array(
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
		'genesis-footer-widgets'          => 3,
		'genesis-menus'                   => array(
			'primary'   => __( 'Primary Navigation', CHILD_TEXT_DOMAIN ),
			'secondary' => __( 'Secondary Navigation', CHILD_TEXT_DOMAIN ),
			'footer' => __( 'Footer Navigation', CHILD_TEXT_DOMAIN )
		),
		'woocommerce',
//		'genesis-after-entry-widget-area' => null,
	),
	//=============================================
	// Layouts to unregister
	//=============================================
	'genesis_unregister_layout' => array(
		'sidebar-content',
//		'content-sidebar',
		'content-sidebar-sidebar',
		'sidebar-content-sidebar',
		'sidebar-sidebar-content',
	),
	//=============================================
	// Theme Default Settings
	//=============================================
	'theme_default_settings' => array(
		'blog_cat_num'              => 12,
		'content_archive'           => 'full',
		'content_archive_limit'     => 0,
		'content_archive_thumbnail' => 0,
		'posts_nav'                 => 'numeric',
		'site_layout'               => 'full-width-content',

		// Virtuoso Settings
		'URLS' => array(
			'production'  => 'https://virtuoso.com',
			'staging' => 'https://staging.virtuoso.com',
			'local'   => 'https://virtuoso.test',
		),
		'header-design' => array(
			'logo-left' => false,
			'logo-middle' => true,
		),
		'sticky-contact' => array (
			'align-left' => false,
			'alight-right' => true,
		)
	),
	//=============================================
	// Image Sizes
	//=============================================
	'theme_image_sizes' => array(
		'featured-image' => array(
			'width'  => 720,
			'height' => 400,
			'crop'   => true,
		),

	),
);