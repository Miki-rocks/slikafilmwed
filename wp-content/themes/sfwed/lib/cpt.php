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
		'supports'            => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields',),
		// 'taxonomies'          => array('genres'),
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
}
add_action('init', 'sfwed_custom_post_type_register', 0);
