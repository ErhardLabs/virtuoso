<?php
/**
 * Genesis Framework.
 *
 * WARNING: This file is part of the core Genesis Framework. DO NOT edit this file under any circumstances.
 * Please do all modifications in the form of a child theme.
 *
 * @package Genesis\Customizer\Theme Settings
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://my.studiopress.com/themes/genesis/
 */
defined( 'ABSPATH' ) || exit;

/**
 * The config array for setting up a Customizer panel, sections within that panel, settings and controls.
 *
 * If child theme contains a `customizer-theme-settings.php` config, it will be used instead of this config.
 *
 * @since 2.6.0
 */

use Virtuoso\Lib\Admin\Customizer\CustomizerHelpers;
$prefix = CustomizerHelpers::get_settings_prefix();

return [
	'genesis' => [
		'title'          => __( 'Virtuoso Theme Settings', 'virtuoso' ),
		'description'    => __( 'Customize the various theme settings.', 'virtuoso' ),
		'theme_supports' => 'genesis-customizer-theme-settings',
		'settings_field' => 'genesis-settings',
		'control_prefix' => 'genesis',
		'sections'       => [
			'genesis_updates'        => [
				'title'          => __( 'Updates', 'virtuoso' ),
				'panel'          => 'genesis',
				'theme_supports' => 'genesis-auto-updates',
				'controls'       => [
					'update'               => [
						'label'       => __( 'Check For Updates', 'virtuoso' ),
						/* translators: %s: Link to privacy policy */
						'description' => sprintf( __( 'By checking this box, you allow Genesis to periodically check for updates. Update requests send information about your site including software and theme data, as well as the site’s URL and locale. See the <a href="%s" target="_blank" rel="noopener noreferrer">privacy policy</a>.', 'virtuoso' ), 'https://www.studiopress.com/go/privacy-policy/' ),
						'section'     => 'genesis_updates',
						'type'        => 'checkbox',
						'settings'    => [
							'default' => 1,
						],
					],
					'update_email_address' => [
						'label'       => __( 'Email Address', 'virtuoso' ),
						'description' => __( 'If you provide an email address below, you will be notified via email when a new version of Genesis is available. Your email address is not sent to us.', 'virtuoso' ),
						'section'     => 'genesis_updates',
						'type'        => 'email',
						'input_attrs' => [
							'placeholder' => __( 'Email Address', 'virtuoso' ),
						],
						'settings'    => [
							'default' => '',
						],
					],

				],
			],
			'contact'                => array(
				'title'    => __( 'Contact', $prefix, 'virtuoso' ),
				'panel'    => 'genesis',
				'controls' => array(
					$prefix . '_display_floating_contact' => array(
						'label'    => __( 'Display Floating Contact', CHILD_TEXT_DOMAIN, $prefix, 'virtuoso' ),
						'section'  => 'contact',
						'type'     => 'checkbox',
						'settings' => array(
							'capability' => 'edit_theme_options',
							'default'    => false,
							'type'       => 'theme_mod',
							'transport'  => 'postMessage',
						),
					),
					$prefix . '_display_contact_in_menu'  => array(
						'label'    => __( 'Display Contact in menu', CHILD_TEXT_DOMAIN, $prefix, 'virtuoso' ),
						'section'  => 'contact',
						'type'     => 'checkbox',
						'settings' => array(
							'capability' => 'edit_theme_options',
							'default'    => false,
							'type'       => 'theme_mod',
							'transport'  => 'postMessage',
						),
					),
					$prefix . '_contact_url'              => array(
						'label'       => __( 'Contact Page URL', CHILD_TEXT_DOMAIN, $prefix, 'virtuoso' ),
						'description' => __( 'Add the URL of the Contact page.', CHILD_TEXT_DOMAIN, 'virtuoso' ),
						'section'     => 'contact',
						'type'        => 'text',
						'settings'    => array(
							'capability' => 'edit_theme_options',
							'default'    => '/contact',
							'type'       => 'theme_mod',
							'transport'  => 'postMessage',
						),
					),
					$prefix . '_contact_inner_text'       => array(
						'label'       => __( 'Contact Inner text', CHILD_TEXT_DOMAIN, $prefix, 'virtuoso' ),
						'description' => __( 'Change the inner text', CHILD_TEXT_DOMAIN, $prefix, 'virtuoso' ),
						'section'     => 'contact',
						'type'        => 'text',
						'settings'    => array(
							'capability' => 'edit_theme_options',
							'default'    => 'Contact',
							'type'       => 'theme_mod',
							'transport'  => 'postMessage',
						),
					),
				),
			),

			// Header Menu

			'header_nav_menu_layout' => array(
				'title'    => __( 'Header Menu Layout', CHILD_TEXT_DOMAIN, $prefix, 'virtuoso' ),
				'panel'    => 'genesis',
				'controls' => array(
					$prefix . '_header_nav_menu_design' => array(
						'type'        => 'radio',
						'section'     => 'header_nav_menu_layout',
						'label'       => __( 'Navigation Layout Design', 'virtuoso' ),
						'description' => __( 'Choose the header navigation layout design', CHILD_TEXT_DOMAIN, 'virtuoso' ),
						'choices'     => array(
							'logo-left'         => __( 'Logo Left', CHILD_TEXT_DOMAIN, 'virtuoso' ),
							'logo-middle'       => __( 'Logo Middle', CHILD_TEXT_DOMAIN, 'virtuoso' ),
							'navigation-middle' => __( 'Navigation Middle', CHILD_TEXT_DOMAIN, 'virtuoso' ),
							'web-application'   => __( 'Web Application', CHILD_TEXT_DOMAIN, 'virtuoso' ),
						),
						'settings'    => array(
							'capability' => 'edit_theme_options',
							'default'    => 'logo-left',
							'type'       => 'theme_mod',
							'transport'  => 'postMessage',
						),
					),
					$prefix . '_display_login_button'   => array(
						'label'    => __( 'Display Login Button', CHILD_TEXT_DOMAIN, $prefix, 'virtuoso' ),
						'section'  => 'header_nav_menu_layout',
						'type'     => 'checkbox',
						'settings' => array(
							'capability' => 'edit_theme_options',
							'default'    => false,
							'type'       => 'theme_mod',
							'transport'  => 'postMessage',
						),
					),
					$prefix . '_login_button_url'       => array(
						'label'    => __( 'Display Login Button', CHILD_TEXT_DOMAIN, $prefix, 'virtuoso' ),
						'section'  => 'header_nav_menu_layout',
						'type'     => 'text',
						'settings' => array(
							'capability' => 'edit_theme_options',
							'default'    => '/wp-admin',
							'type'       => 'theme_mod',
							'transport'  => 'postMessage',
						),
					),
					$prefix . '_display_cart_icon'      => array(
						'label'    => __( 'Display Cart Icon', CHILD_TEXT_DOMAIN, $prefix, 'virtuoso' ),
						'section'  => 'header_nav_menu_layout',
						'type'     => 'checkbox',
						'settings' => array(
							'capability' => 'edit_theme_options',
							'default'    => true,
							'type'       => 'theme_mod',
							'transport'  => 'postMessage',
						),
					),
				),
			),

			// Footer

			'footer_layout'          => array(
				'title'    => __( 'Footer Layout', CHILD_TEXT_DOMAIN, 'virtuoso' ),
				'panel'    => 'genesis',
				'controls' => array(
					$prefix . '_footer_design' => array(
						'type'        => 'radio',
						'section'     => 'footer_layout',
						'label'       => __( 'Footer Layout Design', CHILD_TEXT_DOMAIN, 'virtuoso' ),
						'description' => __( 'Choose the Footer layout design', CHILD_TEXT_DOMAIN, 'virtuoso' ),
						'choices'     => array(
							'footer-widgets-left-column' => __( 'Left aligned', CHILD_TEXT_DOMAIN, 'virtuoso' ),
							'footer-widgets-block'       => __( 'Block (Stacked)', CHILD_TEXT_DOMAIN, 'virtuoso' ),
							'footer-widgets-minimal'     => __( 'Minimal left aligned', CHILD_TEXT_DOMAIN, 'virtuoso' ),
						),
						'settings'    => array(
							'capability' => 'edit_theme_options',
							'default'    => 'footer-widgets-block',
							'type'       => 'theme_mod',
							'transport'  => 'postMessage',
						),
					),
				),
			),
			'genesis_header'         => array(
				'active_callback' => 'genesis_show_header_customizer_callback',
				'title'           => __( 'Header', 'virtuoso' ),
				'panel'           => 'genesis',
				'controls'        => array(
					'blog_title' => array(
						'label'    => __( 'Use for site title/logo:', 'virtuoso' ),
						'section'  => 'genesis_header',
						'type'     => 'select',
						'choices'  => array(
							'text'  => __( 'Dynamic Text', 'virtuoso' ),
							'image' => __( 'Image logo', 'virtuoso' ),
						),
						'settings' => array(
							'default' => 'text',
						),
					),
				),
			),
			'genesis_color_scheme'   => array(
				'active_callback' => 'genesis_has_color_schemes',
				'theme_supports'  => 'genesis-style-selector',
				'title'           => __( 'Color Scheme', 'virtuoso' ),
				'panel'           => 'genesis',
				'controls'        => array(
					'style_selection' => array(
						'label'    => __( 'Select Color Style', 'virtuoso' ),
						'section'  => 'genesis_color_scheme',
						'type'     => 'select',
						'choices'  => genesis_get_color_schemes_for_customizer(),
						'settings' => array(
							'default' => '',
						),
					),
				),
			),
			'genesis_layout'         => array(
				'active_callback' => 'genesis_has_multiple_layouts',
				'title'           => __( 'Site Layout', 'virtuoso' ),
				'panel'           => 'genesis',
				'controls'        => array(
					'site_layout' => array(
						'label'    => __( 'Select Site Layout', 'virtuoso' ),
						'section'  => 'genesis_layout',
						'type'     => 'select',
						'choices'  => genesis_get_layouts_for_customizer(),
						'settings' => array(
							'default' => '',
						),
					),
				),
			),
			'genesis_breadcrumbs'    => array(
				'theme_supports' => 'genesis-breadcrumbs',
				'title'          => __( 'Breadcrumbs', 'virtuoso' ),
				'description'    => __( 'Select the pages which should display breadcrumbs.', 'virtuoso' ),
				'panel'          => 'genesis',
				'controls'       => array(
					'breadcrumb_home'       => array(
						'active_callback' => 'genesis_posts_show_on_front',
						'label'           => __( 'Breadcrumbs on Homepage', 'virtuoso' ),
						'section'         => 'genesis_breadcrumbs',
						'type'            => 'checkbox',
						'settings'        => array(
							'default' => 0,
						),
					),
					'breadcrumb_front_page' => array(
						'active_callback' => 'genesis_page_show_on_front',
						'label'           => __( 'Breadcrumbs on Front page', 'virtuoso' ),
						'section'         => 'genesis_breadcrumbs',
						'type'            => 'checkbox',
						'settings'        => array(
							'default' => 0,
						),
					),
					'breadcrumb_posts_page' => array(
						'active_callback' => 'genesis_page_show_on_front',
						'label'           => __( 'Breadcrumbs on Posts page', 'virtuoso' ),
						'section'         => 'genesis_breadcrumbs',
						'type'            => 'checkbox',
						'settings'        => array(
							'default' => 0,
						),
					),
					'breadcrumb_single'     => array(
						'label'    => __( 'Breadcrumbs on Single Posts', 'virtuoso' ),
						'section'  => 'genesis_breadcrumbs',
						'type'     => 'checkbox',
						'settings' => array(
							'default' => 0,
						),
					),
					'breadcrumb_page'       => array(
						'label'    => __( 'Breadcrumbs on Pages', 'virtuoso' ),
						'section'  => 'genesis_breadcrumbs',
						'type'     => 'checkbox',
						'settings' => array(
							'default' => 0,
						),
					),
					'breadcrumb_archive'    => array(
						'label'    => __( 'Breadcrumbs on Archives', 'virtuoso' ),
						'section'  => 'genesis_breadcrumbs',
						'type'     => 'checkbox',
						'settings' => array(
							'default' => 0,
						),
					),
					'breadcrumb_404'        => array(
						'label'    => __( 'Breadcrumbs on 404 page', 'virtuoso' ),
						'section'  => 'genesis_breadcrumbs',
						'type'     => 'checkbox',
						'settings' => array(
							'default' => 0,
						),
					),
					'breadcrumb_attachment' => array(
						'label'    => __( 'Breadcrumbs on Attachment/Media', 'virtuoso' ),
						'section'  => 'genesis_breadcrumbs',
						'type'     => 'checkbox',
						'settings' => array(
							'default' => 0,
						),
					),
				),
			),
			'genesis_comments'       => array(
				'title'    => __( 'Comments and Trackbacks', 'virtuoso' ),
				'panel'    => 'genesis',
				'controls' => array(
					'comments_posts'   => array(
						'label'    => __( 'Enable Comments on Posts', 'virtuoso' ),
						'section'  => 'genesis_comments',
						'type'     => 'checkbox',
						'settings' => array(
							'default' => 1,
						),
					),
					'comments_pages'   => array(
						'label'    => __( 'Enable Comments on Pages', 'virtuoso' ),
						'section'  => 'genesis_comments',
						'type'     => 'checkbox',
						'settings' => array(
							'default' => 1,
						),
					),
					'trackbacks_posts' => array(
						'label'    => __( 'Enable Trackbacks on Posts', 'virtuoso' ),
						'section'  => 'genesis_comments',
						'type'     => 'checkbox',
						'settings' => array(
							'default' => 0,
						),
					),
					'trackbacks_pages' => array(
						'label'    => __( 'Enable Trackbacks on Pages', 'virtuoso' ),
						'section'  => 'genesis_comments',
						'type'     => 'checkbox',
						'settings' => array(
							'default' => 0,
						),
					),
				),
			),
			'genesis_single'         => [
				'title'       => __( 'Singular Content', 'virtuoso' ),
				'description' => __( 'Modify the settings for individual entries such as posts and pages.', 'virtuoso' ),
				'panel'       => 'genesis',
				'controls'    => [],
			],
			'genesis_archives'       => array(
				'title'    => __( 'Content Archives', 'virtuoso' ),
				'panel'    => 'genesis',
				'controls' => array(
					'content_archive'           => array(
						'label'    => __( 'Select one of the following', 'virtuoso' ),
						'section'  => 'genesis_archives',
						'type'     => 'select',
						'choices'  => array(
							'full'     => __( 'Entry content', 'virtuoso' ),
							'excerpts' => __( 'Entry excerpts', 'virtuoso' ),
						),
						'settings' => array(
							'default' => 'full',
						),
					),
					'content_archive_limit'     => array(
						'label'    => __( 'Limit content to how many characters? (0 for no limit)', 'virtuoso' ),
						'section'  => 'genesis_archives',
						'type'     => 'number',
						'settings' => array(
							'default' => 0,
						),
					),
					'content_archive_thumbnail' => array(
						'label'    => __( 'Display the featured image?', 'virtuoso' ),
						'section'  => 'genesis_archives',
						'type'     => 'checkbox',
						'settings' => array(
							'default' => 0,
						),
					),
					'image_size'                => array(
						'label'    => __( 'Featured Image Size', 'virtuoso' ),
						'section'  => 'genesis_archives',
						'type'     => 'select',
						'choices'  => genesis_get_image_sizes_for_customizer(),
						'settings' => array(
							'default' => '',
						),
					),
					'image_alignment'           => array(
						'label'    => __( 'Featured Image Alignment', 'virtuoso' ),
						'section'  => 'genesis_archives',
						'type'     => 'select',
						'choices'  => array(
							''            => __( 'None', 'virtuoso' ),
							'alignleft'   => __( 'Left', 'virtuoso' ),
							'alignright'  => __( 'Right', 'virtuoso' ),
							'aligncenter' => __( 'Center', 'virtuoso' ),
						),
						'settings' => array(
							'default' => 'alignleft',
						),
					),
					'posts_nav'                 => array(
						'label'    => __( 'Entry Pagination Type', 'virtuoso' ),
						'section'  => 'genesis_archives',
						'type'     => 'select',
						'choices'  => array(
							'prev-next' => __( 'Previous / Next', 'virtuoso' ),
							'numeric'   => __( 'Numeric', 'virtuoso' ),
						),
						'settings' => array(
							'default' => '',
						),
					),
				),
			),
			'genesis_footer'         => [
				'active_callback' => function() {
					return is_null( apply_filters( 'genesis_footer_output', null ) );
				},
				'title'           => __( 'Footer', 'virtuoso' ),
				'panel'           => 'genesis',
				'controls'        => [
					'footer_text' => [
						/* translators: %s: Link to footer shortcodes documentation */
						'description' => sprintf( __( 'The text that will appear in your site footer. Can include <a href="%s" target="_blank" rel="noopener noreferrer">footer shortcodes</a>.', 'virtuoso' ), 'https://studiopress.github.io/genesis/basics/genesis-shortcodes/#footer-shortcodes' ),
						'section'     => 'genesis_footer',
						'type'        => 'textarea',
						'settings'    => [
							'default' => sprintf( '[footer_copyright before="%s "] · [footer_childtheme_link before="" after=" %s"] [footer_genesis_link url="https://www.studiopress.com/" before=""] · [footer_wordpress_link] · [footer_loginout]', __( 'Copyright', 'virtuoso' ), __( 'on', 'virtuoso' ) ),
						],
					],
				],
			],
			'genesis_scripts'        => array(
				'title'    => __( 'Header/Footer Scripts', 'virtuoso' ),
				'panel'    => 'genesis',
				'controls' => array(
					'header_scripts' => array(
						'label'       => __( 'Header Scripts', 'virtuoso' ),
						/* translators: %s: </head> */
						'description' => sprintf( __( 'This code will output immediately before the closing %s tag in the document source.', 'virtuoso' ), genesis_code( esc_html( '</head>' ) ) ),
						'section'     => 'genesis_scripts',
						'type'        => 'textarea',
						'settings'    => array(
							'default' => '',
						),
					),
					'footer_scripts' => array(
						'label'       => __( 'Footer Scripts', 'virtuoso' ),
						/* translators: %s: </body> */
						'description' => sprintf( __( 'This code will output immediately before the closing %s tag in the document source.', 'virtuoso' ), genesis_code( esc_html( '</body>' ) ) ),
						'section'     => 'genesis_scripts',
						'type'        => 'textarea',
						'settings'    => array(
							'default' => '',
						),
					),
				),
			),
		],
	],
];
