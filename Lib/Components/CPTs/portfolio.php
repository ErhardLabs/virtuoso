<?php
if ( ! function_exists('virtuoso_register_portfolio_cpt') ) {

// Register Custom Post Type
  function virtuoso_register_portfolio_cpt() {

    $labels = array(
        'name'                  => _x( 'Portfolio', 'Post Type General Name', 'CHILD_TEXT_DOMAIN' ),
        'singular_name'         => _x( 'Portfolio Item', 'Post Type Singular Name', 'CHILD_TEXT_DOMAIN' ),
        'menu_name'             => __( 'Portfolio', 'CHILD_TEXT_DOMAIN' ),
        'name_admin_bar'        => __( 'Portfolio', 'CHILD_TEXT_DOMAIN' ),
        'archives'              => __( 'Portfolio Archives', 'CHILD_TEXT_DOMAIN' ),
        'attributes'            => __( 'Portfolio Attributes', 'CHILD_TEXT_DOMAIN' ),
        'parent_item_colon'     => __( 'Parent Portfolio Item:', 'CHILD_TEXT_DOMAIN' ),
        'all_items'             => __( 'All Portfolio Items', 'CHILD_TEXT_DOMAIN' ),
        'add_new_item'          => __( 'Add New Portfolio Item', 'CHILD_TEXT_DOMAIN' ),
        'add_new'               => __( 'Add New', 'CHILD_TEXT_DOMAIN' ),
        'new_item'              => __( 'New Portfolio Item', 'CHILD_TEXT_DOMAIN' ),
        'edit_item'             => __( 'Edit Portfolio Item', 'CHILD_TEXT_DOMAIN' ),
        'update_item'           => __( 'Update Portfolio Item', 'CHILD_TEXT_DOMAIN' ),
        'view_item'             => __( 'View Portfolio Item', 'CHILD_TEXT_DOMAIN' ),
        'view_items'            => __( 'View Portfolio Items', 'CHILD_TEXT_DOMAIN' ),
        'search_items'          => __( 'Search Portfolio Item', 'CHILD_TEXT_DOMAIN' ),
        'not_found'             => __( 'Not found', 'CHILD_TEXT_DOMAIN' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'CHILD_TEXT_DOMAIN' ),
        'featured_image'        => __( 'Featured Image', 'CHILD_TEXT_DOMAIN' ),
        'set_featured_image'    => __( 'Set featured image', 'CHILD_TEXT_DOMAIN' ),
        'remove_featured_image' => __( 'Remove featured image', 'CHILD_TEXT_DOMAIN' ),
        'use_featured_image'    => __( 'Use as featured image', 'CHILD_TEXT_DOMAIN' ),
        'insert_into_item'      => __( 'Insert into portfolio item', 'CHILD_TEXT_DOMAIN' ),
        'uploaded_to_this_item' => __( 'Uploaded to this portfolio item', 'CHILD_TEXT_DOMAIN' ),
        'items_list'            => __( 'Portfolio item list', 'CHILD_TEXT_DOMAIN' ),
        'items_list_navigation' => __( 'Portfolio item list navigation', 'CHILD_TEXT_DOMAIN' ),
        'filter_items_list'     => __( 'Filter portfolio item list', 'CHILD_TEXT_DOMAIN' ),
    );
    $args = array(
        'label'                 => __( 'Portfolio Item', 'CHILD_TEXT_DOMAIN' ),
        'description'           => __( 'Portfolio items for visual creatives.', 'CHILD_TEXT_DOMAIN' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
    );
    register_post_type( 'portfolio', $args );

  }
  add_action( 'init', 'virtuoso_register_portfolio_cpt', 0 );

}