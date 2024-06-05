<?php
function sfwed_custom_post_type_register()
{
	// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x('Portfolio', 'Post Type General Name', 'sfwed'),
		'singular_name'       => _x('Portfolio', 'Post Type Singular Name', 'sfwed'),
		'menu_name'           => __('Portfolio', 'sfwed'),
		'parent_item_colon'   => __('Parent Portfolio', 'sfwed'),
		'all_items'           => __('All Portfolio', 'sfwed'),
		'view_item'           => __('view Portfolio', 'sfwed'),
		'add_new_item'        => __('Add new Portfolio', 'sfwed'),
		'add_new'             => __('Add new', 'sfwed'),
		'edit_item'           => __('Edit Portfolio', 'sfwed'),
		'update_item'         => __('Update Portfolio', 'sfwed'),
		'search_items'        => __('Search Portfolio', 'sfwed'),
		'not_found'           => __('Not found', 'sfwed'),
		'not_found_in_trash'  => __('Not found in trash', 'sfwed'),
	);

	// Set other options for Custom Post Type

	$args = array(
		'label'               => __('portfolio', 'sfwed'),
		'description'         => __('Portfolio', 'sfwed'),
		'labels'              => $labels,
		'supports'            => array('title', 'excerpt', 'thumbnail', 'custom-fields',),
		'taxonomies'          => array('portfolio-category'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'show_in_rest' => true,
		'menu_icon' => 'dashicons-camera',
	);

	// Registering your Custom Post Type
	register_post_type('portfolio', $args);



	$portfolio_categories_lables = array(
		'name' => _x( 'Portfolio categories', 'taxonomy general name' ),
		'singular_name' => _x( 'Portfolio category', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Portfolio categories' ),
		'all_items' => __( 'All Portfolio categories' ),
		'parent_item' => __( 'Parent Portfolio category' ),
		'parent_item_colon' => __( 'Parent Portfolio category:' ),
		'edit_item' => __( 'Edit Portfolio category' ), 
		'update_item' => __( 'Update Portfolio category' ),
		'add_new_item' => __( 'Add New Portfolio category' ),
		'new_item_name' => __( 'New Portfolio category Name' ),
		'menu_name' => __( 'Portfolio categories' ),
	);

	$args_portfolio_category = array(
		'hierarchical' => true,
		'labels' => $portfolio_categories_lables,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'portfolio-category' ),
	);
	register_taxonomy('portfolio-category',array('portfolio'), $args_portfolio_category);
}
add_action('init', 'sfwed_custom_post_type_register', 0);

add_action( 'init', 'sfwed_rename_post_type' );
function sfwed_rename_post_type() {
    global $wp_post_types;

    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Stories';
    $labels->singular_name = 'Story';
    $labels->add_new = 'Add story';
    $labels->add_new_item = 'Add story';
    $labels->edit_item = 'Edit story';
    $labels->new_item = 'Story';
    $labels->view_item = 'View story';
    $labels->search_items = 'Search stories';
    $labels->not_found = 'No stories found';
    $labels->not_found_in_trash = 'No stories found in Trash';
    $labels->all_items = 'All stories';
    $labels->menu_name = 'Stories';
    $labels->name_admin_bar = 'Stories';
}
