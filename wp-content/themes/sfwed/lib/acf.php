<?php
/**
 * Adding ACF options page
 */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Page options',
		'menu_title'	=> 'Page options',
		'menu_slug' 	=> 'page-options',
		'redirect'		=> false
	));
}


/**
 * Creating custom ACF blocks category
 */
function sfwed_acf_custom_blocks_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'sfwed-blocks',
				'title' => __( 'sfwed blocks', 'sfwed' ),
				'icon'  => 'category',
			),
		)
	);
}
add_filter( 'block_categories_all', 'sfwed_acf_custom_blocks_category', 10, 2);


/**
 * Creating custom ACF blocks
 */
function sfwed_acf_custom_blocks_init() {

	// Check function exists.
	if( function_exists('acf_register_block_type') ) {

		acf_register_block_type(array(
			'name'              => 'homepage-hero',
			'title'             => __('Homepage hero'),
			'description'       => __('A Homepage hero section.'),
			'post_types'        => array('post', 'page'),
			'render_template'   => 'templates/blocks/block-homepage-hero.php',
			'enqueue_assets'    => function(){
				wp_enqueue_style('slick', get_template_directory_uri() . '/build/css/blocks/slick.min.css');
				wp_enqueue_style('homepage-hero', get_template_directory_uri() . '/build/css/blocks/homepage-hero.min.css');
				wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/lib/slick.min.js', array('jquery'), '', true);
				wp_enqueue_script('homepage-hero', get_template_directory_uri() . '/build/scripts/blocks/homepage-hero.js', array('jquery', 'slick'), '', true);
			},
			'icon'              => 'welcome-widgets-menus',
			'category'          => 'sfwed-blocks',
			'supports'          => array(
				'align' => false,
				'anchor' => true,
				'multiple' => false,
			),
			'mode' => 'auto',
		));

		acf_register_block_type(array(
			'name'              => 'cta-big',
			'title'             => __('CTA big'),
			'description'       => __('A CTA big section.'),
			'post_types'        => array('post', 'page'),
			'render_template'   => 'templates/blocks/block-cta-big.php',
			'enqueue_assets'    => function(){
				wp_enqueue_style('cta-big', get_template_directory_uri() . '/build/css/blocks/cta-big.min.css');
			},
			'icon'              => 'welcome-widgets-menus',
			'category'          => 'sfwed-blocks',
			'supports'          => array(
				'align' => false,
				'anchor' => true,
				'multiple' => true,
			),
			'mode' => 'auto',
		));

		acf_register_block_type(array(
			'name'              => 'text-boxes',
			'title'             => __('Text boxes'),
			'description'       => __('A Text boxes section.'),
			'post_types'        => array('post', 'page'),
			'render_template'   => 'templates/blocks/block-text-boxes.php',
			'enqueue_assets'    => function(){
				wp_enqueue_style('text-boxes', get_template_directory_uri() . '/build/css/blocks/text-boxes.min.css');
			},
			'icon'              => 'welcome-widgets-menus',
			'category'          => 'sfwed-blocks',
			'supports'          => array(
				'align' => false,
				'anchor' => true,
				'multiple' => true,
			),
			'mode' => 'auto',
		));

		acf_register_block_type(array(
			'name'              => 'gallery',
			'title'             => __('Gallery'),
			'description'       => __('A Gallery section.'),
			'post_types'        => array('post', 'page', 'portfolio'),
			'render_template'   => 'templates/blocks/block-gallery.php',
			'enqueue_assets'    => function(){
				wp_enqueue_style('gallery', get_template_directory_uri() . '/build/css/blocks/gallery.min.css');

				wp_enqueue_style('lightgallery', get_template_directory_uri() . '/build/css/blocks/lightgallery.min.css');
				wp_enqueue_script('lightgallery', get_template_directory_uri() . '/assets/js/lib/lightgallery.min.js', array('jquery'), '', true);

				wp_enqueue_script('masonry', get_template_directory_uri() . '/assets/js/lib/masonry.min.js', array('jquery'), '', true);
				
				wp_enqueue_script('gallery', get_template_directory_uri() . '/build/scripts/blocks/gallery.js', array('jquery', 'lightgallery', 'masonry'), '', true);
			},
			'icon'              => 'welcome-widgets-menus',
			'category'          => 'sfwed-blocks',
			'supports'          => array(
				'align' => false,
				'anchor' => true,
				'multiple' => false,
			),
			'mode' => 'auto',
		));

		acf_register_block_type(array(
			'name'              => 'portfolio-grid',
			'title'             => __('Portfolio grid'),
			'description'       => __('A Portfolio grid section.'),
			'post_types'        => array('post', 'page'),
			'render_template'   => 'templates/blocks/block-portfolio-grid.php',
			'enqueue_assets'    => function(){
				wp_enqueue_style('portfolio-grid', get_template_directory_uri() . '/build/css/blocks/portfolio-grid.min.css');
			},
			'icon'              => 'welcome-widgets-menus',
			'category'          => 'sfwed-blocks',
			'supports'          => array(
				'align' => false,
				'anchor' => true,
				'multiple' => true,
			),
			'mode' => 'auto',
		));

		acf_register_block_type(array(
			'name'              => 'testimonials',
			'title'             => __('Testimonials'),
			'description'       => __('A testimonials section.'),
			'post_types'        => array('post', 'page'),
			'render_template'   => 'templates/blocks/block-testimonials.php',
			'enqueue_assets'    => function(){
				wp_enqueue_style('slick', get_template_directory_uri() . '/build/css/blocks/slick.min.css');
				wp_enqueue_style('testimonials', get_template_directory_uri() . '/build/css/blocks/testimonials.min.css');
				wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/lib/slick.min.js', array('jquery'), '', true);
				wp_enqueue_script('testimonials', get_template_directory_uri() . '/build/scripts/blocks/testimonials.js', array('jquery', 'slick'), '', true);
			},
			'icon'              => 'welcome-widgets-menus',
			'category'          => 'sfwed-blocks',
			'supports'          => array(
				'align' => false,
				'anchor' => true,
				'multiple' => false,
			),
			'mode' => 'auto',
		));
	}
}
add_action('acf/init', 'sfwed_acf_custom_blocks_init');

/**
 * Allow only specific Gutenberg blocks
 */
add_filter('allowed_block_types_all', 'sfwed_allowed_blocks');
function sfwed_allowed_blocks($allowed_blocks)
{
	$allowedBlocksArray = array(
		'acf/homepage-hero',
		'acf/cta-big',
		'acf/text-boxes',
		'acf/gallery',
		'acf/portfolio-grid',
		'acf/testimonials',
	);

	return $allowedBlocksArray;
}
