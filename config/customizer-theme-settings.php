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

/**
 * The config array for setting up a Customizer panel, sections within that panel, settings and controls.
 *
 * If child theme contains a `customizer-theme-settings.php` config, it will be used instead of this config.
 *
 * @since 2.6.0
 */

use Virtuoso\Lib\Admin\Customizer\CustomizerHelpers;
$prefix = CustomizerHelpers::get_settings_prefix();

return array(
	'genesis' => array(
		'title'          => __( 'Virtuoso Theme Settings', 'genesis' ),
		'description'    => __( 'Customize the various theme settings.', 'genesis' ),
		'theme_supports' => 'genesis-customizer-theme-settings',
		'settings_field' => 'genesis-settings',
		'control_prefix' => 'genesis',
		'sections'       => array(

			///////////////////////////////
			///
			// Virtuoso Customizer Settings
			///
			///////////////////////////////

			// Contact

			'contact' => array(
				'title'    => __( 'Contact', $prefix ),
				'panel'    => 'genesis',
				'controls' => array(
					$prefix . '_display_floating_contact' => array(
						'label' => __('Display Floating Contact', CHILD_TEXT_DOMAIN, $prefix),
						'section' => 'contact',
						'type' => 'checkbox',
						'settings' => array (
							'capability' => 'edit_theme_options',
							'default' => false,
							'type'       => 'theme_mod',
							'transport'  => 'postMessage',
						),
					),
					$prefix . '_display_contact_in_menu' => array(
						'label' => __('Display Contact in menu', CHILD_TEXT_DOMAIN, $prefix),
						'section' => 'contact',
						'type' => 'checkbox',
						'settings' => array (
							'capability' => 'edit_theme_options',
							'default' => false,
							'type'       => 'theme_mod',
							'transport'  => 'postMessage',
						),
					),
					$prefix . '_contact_url' => array(
						'label' => __('Contact Page URL', CHILD_TEXT_DOMAIN, $prefix),
						'description' => __('Add the URL of the Contact page.', CHILD_TEXT_DOMAIN, 'virtuoso'),
						'section' => 'contact',
						'type' => 'text',
						'settings' => array (
							'capability' => 'edit_theme_options',
							'default' => '/contact',
							'type'       => 'theme_mod',
							'transport'  => 'postMessage',
						),
					),
					$prefix . '_contact_inner_text' => array(
						'label' => __('Contact Inner text', CHILD_TEXT_DOMAIN, $prefix),
						'description' => __('Change the inner text', CHILD_TEXT_DOMAIN, $prefix),
						'section' => 'contact',
						'type' => 'text',
						'settings' => array (
							'capability' => 'edit_theme_options',
							'default' => 'Contact',
							'type'       => 'theme_mod',
							'transport'  => 'postMessage',
						),
					),
				),
			),

			// Header Menu

			'header_nav_menu_layout' => array(
				'title'    => __( 'Header Menu Layout', CHILD_TEXT_DOMAIN, $prefix ),
				'panel'    => 'genesis',
				'controls'        => array(
					$prefix . '_header_nav_menu_design' => array(
						'type' => 'radio',
						'section' => 'header_nav_menu_layout',
						'label' => __( 'Navigation Layout Design' ),
						'description' => __( 'Choose the header navigation layout design', CHILD_TEXT_DOMAIN ),
						'choices' => array(
							'logo-left' => __( 'Logo Left', CHILD_TEXT_DOMAIN ),
							'logo-middle' => __( 'Logo Middle', CHILD_TEXT_DOMAIN ),
							'navigation-middle' => __( 'Navigation Middle', CHILD_TEXT_DOMAIN ),
						),
						'settings' => array(
							'capability' => 'edit_theme_options',
							'default' => 'logo-left',
							'type'       => 'theme_mod',
							'transport'  => 'postMessage',
						),
					),
					$prefix . '_display_login_button' => array(
						'label' => __('Display Login Button', CHILD_TEXT_DOMAIN, $prefix),
						'section' => 'header_nav_menu_layout',
						'type' => 'checkbox',
						'settings' => array (
							'capability' => 'edit_theme_options',
							'default' => false,
							'type'       => 'theme_mod',
							'transport'  => 'postMessage',
						),
					),
					$prefix . '_login_button_url' => array(
						'label' => __('Display Login Button', CHILD_TEXT_DOMAIN, $prefix),
						'section' => 'header_nav_menu_layout',
						'type' => 'text',
						'settings' => array (
							'capability' => 'edit_theme_options',
							'default' => '/wp-admin',
							'type'       => 'theme_mod',
							'transport'  => 'postMessage',
						),
					),
					$prefix . '_display_cart_icon' => array(
						'label' => __('Display Cart Icon', CHILD_TEXT_DOMAIN, $prefix),
						'section' => 'header_nav_menu_layout',
						'type' => 'checkbox',
						'settings' => array (
							'capability' => 'edit_theme_options',
							'default' => true,
							'type'       => 'theme_mod',
							'transport'  => 'postMessage',
						),
					),
				),
			),

			// Footer

			'footer_layout' => array(
				'title'    => __( 'Footer Layout', CHILD_TEXT_DOMAIN, 'virtuoso' ),
				'panel'    => 'genesis',
				'controls'        => array(
					$prefix . '_footer_design' => array(
						'type' => 'radio',
						'section' => 'footer_layout',
						'label' => __( 'Footer Layout Design', CHILD_TEXT_DOMAIN ),
						'description' => __( 'Choose the Footer layout design', CHILD_TEXT_DOMAIN ),
						'choices' => array(
							'footer-widgets-left-column' => __( 'Left aligned', CHILD_TEXT_DOMAIN ),
							'footer-widgets-block' => __( 'Block (Stacked)', CHILD_TEXT_DOMAIN ),
							'footer-widgets-minimal' => __( 'Minimal left aligned', CHILD_TEXT_DOMAIN ),
						),
						'settings' => array(
							'capability' => 'edit_theme_options',
							'default' => 'footer-widgets-block',
							'type'       => 'theme_mod',
							'transport'  => 'postMessage',
						),
					),
				),
			),

			///////////////////////////////
			///
			// Genesis Customizer Settings
			///
			///////////////////////////////

			'genesis_header'       => array(
				'active_callback' => 'genesis_show_header_customizer_callback',
				'title'           => __( 'Header', 'genesis' ),
				'panel'           => 'genesis',
				'controls'        => array(
					'blog_title' => array(
						'label'    => __( 'Use for site title/logo:', 'genesis' ),
						'section'  => 'genesis_header',
						'type'     => 'select',
						'choices'  => array(
							'text'  => __( 'Dynamic Text', 'genesis' ),
							'image' => __( 'Image logo', 'genesis' ),
						),
						'settings' => array(
							'default' => 'text',
						),
					),
				),
			),
			'genesis_color_scheme' => array(
				'active_callback' => 'genesis_has_color_schemes',
				'theme_supports'  => 'genesis-style-selector',
				'title'           => __( 'Color Scheme', 'genesis' ),
				'panel'           => 'genesis',
				'controls'        => array(
					'style_selection' => array(
						'label'    => __( 'Select Color Style', 'genesis' ),
						'section'  => 'genesis_color_scheme',
						'type'     => 'select',
						'choices'  => genesis_get_color_schemes_for_customizer(),
						'settings' => array(
							'default' => '',
						),
					),
				),
			),
			'genesis_layout'       => array(
				'active_callback' => 'genesis_has_multiple_layouts',
				'title'           => __( 'Site Layout', 'genesis' ),
				'panel'           => 'genesis',
				'controls'        => array(
					'site_layout' => array(
						'label'    => __( 'Select Site Layout', 'genesis' ),
						'section'  => 'genesis_layout',
						'type'     => 'select',
						'choices'  => genesis_get_layouts_for_customizer(),
						'settings' => array(
							'default' => '',
						),
					),
				),
			),
			'genesis_breadcrumbs'  => array(
				'theme_supports' => 'genesis-breadcrumbs',
				'title'          => __( 'Breadcrumbs', 'genesis' ),
				'description'    => __( 'Select the pages which should display breadcrumbs.', 'genesis' ),
				'panel'          => 'genesis',
				'controls'       => array(
					'breadcrumb_home'       => array(
						'active_callback' => 'genesis_posts_show_on_front',
						'label'           => __( 'Breadcrumbs on Homepage', 'genesis' ),
						'section'         => 'genesis_breadcrumbs',
						'type'            => 'checkbox',
						'settings'        => array(
							'default' => 0,
						),
					),
					'breadcrumb_front_page' => array(
						'active_callback' => 'genesis_page_show_on_front',
						'label'           => __( 'Breadcrumbs on Front page', 'genesis' ),
						'section'         => 'genesis_breadcrumbs',
						'type'            => 'checkbox',
						'settings'        => array(
							'default' => 0,
						),
					),
					'breadcrumb_posts_page' => array(
						'active_callback' => 'genesis_page_show_on_front',
						'label'           => __( 'Breadcrumbs on Posts page', 'genesis' ),
						'section'         => 'genesis_breadcrumbs',
						'type'            => 'checkbox',
						'settings'        => array(
							'default' => 0,
						),
					),
					'breadcrumb_single'     => array(
						'label'    => __( 'Breadcrumbs on Single Posts', 'genesis' ),
						'section'  => 'genesis_breadcrumbs',
						'type'     => 'checkbox',
						'settings' => array(
							'default' => 0,
						),
					),
					'breadcrumb_page'       => array(
						'label'    => __( 'Breadcrumbs on Pages', 'genesis' ),
						'section'  => 'genesis_breadcrumbs',
						'type'     => 'checkbox',
						'settings' => array(
							'default' => 0,
						),
					),
					'breadcrumb_archive'    => array(
						'label'    => __( 'Breadcrumbs on Archives', 'genesis' ),
						'section'  => 'genesis_breadcrumbs',
						'type'     => 'checkbox',
						'settings' => array(
							'default' => 0,
						),
					),
					'breadcrumb_404'        => array(
						'label'    => __( 'Breadcrumbs on 404 page', 'genesis' ),
						'section'  => 'genesis_breadcrumbs',
						'type'     => 'checkbox',
						'settings' => array(
							'default' => 0,
						),
					),
					'breadcrumb_attachment' => array(
						'label'    => __( 'Breadcrumbs on Attachment/Media', 'genesis' ),
						'section'  => 'genesis_breadcrumbs',
						'type'     => 'checkbox',
						'settings' => array(
							'default' => 0,
						),
					),
				),
			),
			'genesis_comments'     => array(
				'title'    => __( 'Comments and Trackbacks', 'genesis' ),
				'panel'    => 'genesis',
				'controls' => array(
					'comments_posts'   => array(
						'label'    => __( 'Enable Comments on Posts', 'genesis' ),
						'section'  => 'genesis_comments',
						'type'     => 'checkbox',
						'settings' => array(
							'default' => 1,
						),
					),
					'comments_pages'   => array(
						'label'    => __( 'Enable Comments on Pages', 'genesis' ),
						'section'  => 'genesis_comments',
						'type'     => 'checkbox',
						'settings' => array(
							'default' => 1,
						),
					),
					'trackbacks_posts' => array(
						'label'    => __( 'Enable Trackbacks on Posts', 'genesis' ),
						'section'  => 'genesis_comments',
						'type'     => 'checkbox',
						'settings' => array(
							'default' => 0,
						),
					),
					'trackbacks_pages' => array(
						'label'    => __( 'Enable Trackbacks on Pages', 'genesis' ),
						'section'  => 'genesis_comments',
						'type'     => 'checkbox',
						'settings' => array(
							'default' => 0,
						),
					),
				),
			),
			'genesis_archives'     => array(
				'title'    => __( 'Content Archives', 'genesis' ),
				'panel'    => 'genesis',
				'controls' => array(
					'content_archive'           => array(
						'label'    => __( 'Select one of the following', 'genesis' ),
						'section'  => 'genesis_archives',
						'type'     => 'select',
						'choices'  => array(
							'full'     => __( 'Entry content', 'genesis' ),
							'excerpts' => __( 'Entry excerpts', 'genesis' ),
						),
						'settings' => array(
							'default' => 'full',
						),
					),
					'content_archive_limit'     => array(
						'label'    => __( 'Limit content to how many characters? (0 for no limit)', 'genesis' ),
						'section'  => 'genesis_archives',
						'type'     => 'number',
						'settings' => array(
							'default' => 0,
						),
					),
					'content_archive_thumbnail' => array(
						'label'    => __( 'Display the featured image?', 'genesis' ),
						'section'  => 'genesis_archives',
						'type'     => 'checkbox',
						'settings' => array(
							'default' => 0,
						),
					),
					'image_size'                => array(
						'label'    => __( 'Featured Image Size', 'genesis' ),
						'section'  => 'genesis_archives',
						'type'     => 'select',
						'choices'  => genesis_get_image_sizes_for_customizer(),
						'settings' => array(
							'default' => '',
						),
					),
					'image_alignment'           => array(
						'label'    => __( 'Featured Image Alignment', 'genesis' ),
						'section'  => 'genesis_archives',
						'type'     => 'select',
						'choices'  => array(
							''            => __( 'None', 'genesis' ),
							'alignleft'   => __( 'Left', 'genesis' ),
							'alignright'  => __( 'Right', 'genesis' ),
							'aligncenter' => __( 'Center', 'genesis' ),
						),
						'settings' => array(
							'default' => 'alignleft',
						),
					),
					'posts_nav'                 => array(
						'label'    => __( 'Entry Pagination Type', 'genesis' ),
						'section'  => 'genesis_archives',
						'type'     => 'select',
						'choices'  => array(
							'prev-next' => __( 'Previous / Next', 'genesis' ),
							'numeric'   => __( 'Numeric', 'genesis' ),
						),
						'settings' => array(
							'default' => '',
						),
					),
				),
			),
			'genesis_scripts'      => array(
				'title'    => __( 'Header/Footer Scripts', 'genesis' ),
				'panel'    => 'genesis',
				'controls' => array(
					'header_scripts' => array(
						'label'       => __( 'Header Scripts', 'genesis' ),
						/* translators: %s: </head> */
						'description' => sprintf( __( 'This code will output immediately before the closing %s tag in the document source.', 'genesis' ), genesis_code( esc_html( '</head>' ) ) ),
						'section'     => 'genesis_scripts',
						'type'        => 'textarea',
						'settings'    => array(
							'default' => '',
						),
					),
					'footer_scripts' => array(
						'label'       => __( 'Footer Scripts', 'genesis' ),
						/* translators: %s: </body> */
						'description' => sprintf( __( 'This code will output immediately before the closing %s tag in the document source.', 'genesis' ), genesis_code( esc_html( '</body>' ) ) ),
						'section'     => 'genesis_scripts',
						'type'        => 'textarea',
						'settings'    => array(
							'default' => '',
						),
					),
				),
			),
		),
	),
);
