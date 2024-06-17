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
			'name'              => 'post-grid',
			'title'             => __('Post grid'),
			'description'       => __('A Post grid section.'),
			'post_types'        => array('post', 'page'),
			'render_template'   => 'templates/blocks/block-post-grid.php',
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

		acf_register_block_type(array(
			'name'              => 'hero-simple',
			'title'             => __('Hero simple'),
			'description'       => __('A Hero simple section.'),
			'post_types'        => array('post', 'page'),
			'render_template'   => 'templates/blocks/block-hero-simple.php',
			'enqueue_assets'    => function(){
				wp_enqueue_style('hero-simple', get_template_directory_uri() . '/build/css/blocks/hero-simple.min.css');
				wp_enqueue_style('social-share', get_template_directory_uri() . '/build/css/blocks/social-share.min.css');
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
			'name'              => 'hero-simple-2',
			'title'             => __('Hero simple 2'),
			'description'       => __('A Hero simple 2 section.'),
			'post_types'        => array('page'),
			'render_template'   => 'templates/blocks/block-hero-simple-2.php',
			'enqueue_assets'    => function(){
				wp_enqueue_style('hero-simple', get_template_directory_uri() . '/build/css/blocks/hero-simple-2.min.css');
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
			'name'              => 'process',
			'title'             => __('Process'),
			'description'       => __('A Process section.'),
			'post_types'        => array('post', 'page'),
			'render_template'   => 'templates/blocks/block-process.php',
			'enqueue_assets'    => function(){
				wp_enqueue_style('process', get_template_directory_uri() . '/build/css/blocks/process.min.css');
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
			'name'              => 'contact',
			'title'             => __('Contact'),
			'description'       => __('A Contact section.'),
			'post_types'        => array('page'),
			'render_template'   => 'templates/blocks/block-contact.php',
			'enqueue_assets'    => function(){
				wp_enqueue_style('contact', get_template_directory_uri() . '/build/css/blocks/contact.min.css');
				wp_enqueue_script('contact', get_template_directory_uri() . '/build/scripts/blocks/contact.js', array('jquery'), '', true);
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
			'name'              => 'contact-thanks',
			'title'             => __('Contact thanks'),
			'description'       => __('A Contact thanks section.'),
			'post_types'        => array('page'),
			'render_template'   => 'templates/blocks/block-contact-thanks.php',
			'enqueue_assets'    => function(){
				wp_enqueue_style('contact-thanks', get_template_directory_uri() . '/build/css/blocks/contact-thanks.min.css');
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
			'name'              => 'image-text',
			'title'             => __('Image text'),
			'description'       => __('A Image text section.'),
			'post_types'        => array('page'),
			'render_template'   => 'templates/blocks/block-image-text.php',
			'enqueue_assets'    => function(){
				// wp_enqueue_style('image-text', get_template_directory_uri() . '/build/css/blocks/image-text.min.css');
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
			'name'              => 'image-text-image',
			'title'             => __('Image text image'),
			'description'       => __('A Image text image section.'),
			'post_types'        => array('page'),
			'render_template'   => 'templates/blocks/block-image-text-image.php',
			'enqueue_assets'    => function(){
				wp_enqueue_style('image-text-image', get_template_directory_uri() . '/build/css/blocks/image-text-image.min.css');
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
			'name'              => 'hero-with-box',
			'title'             => __('Hero with box'),
			'description'       => __('A Hero with box section.'),
			'post_types'        => array('page'),
			'render_template'   => 'templates/blocks/block-hero-with-box.php',
			'enqueue_assets'    => function(){
				wp_enqueue_style('hero-with-box', get_template_directory_uri() . '/build/css/blocks/hero-with-box.min.css');
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
			'name'              => 'faq',
			'title'             => __('FAQ'),
			'description'       => __('A FAQ section.'),
			'post_types'        => array('page'),
			'render_template'   => 'templates/blocks/block-faq.php',
			'enqueue_assets'    => function(){
				wp_enqueue_style('faq', get_template_directory_uri() . '/build/css/blocks/faq.min.css');
				wp_enqueue_script('faq', get_template_directory_uri() . '/build/scripts/blocks/faq.js', array('jquery'), '', true);
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
			'name'              => 'images-2-texts-2',
			'title'             => __('Images 2 texts 2'),
			'description'       => __('A Images 2 texts 2 section.'),
			'post_types'        => array('page'),
			'render_template'   => 'templates/blocks/block-images-2-texts-2.php',
			'enqueue_assets'    => function(){
				wp_enqueue_style('images-2-texts-2', get_template_directory_uri() . '/build/css/blocks/images-2-texts-2.min.css');
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
			'name'              => 'images-3-texts-1',
			'title'             => __('Images 3 texts 1'),
			'description'       => __('A Images 3 texts 1 section.'),
			'post_types'        => array('page'),
			'render_template'   => 'templates/blocks/block-images-3-texts-1.php',
			'enqueue_assets'    => function(){
				wp_enqueue_style('images-3-texts-1', get_template_directory_uri() . '/build/css/blocks/images-3-texts-1.min.css');
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
			'name'              => 'images-1-texts-2',
			'title'             => __('Images 1 texts 2'),
			'description'       => __('A Images 1 texts 2 section.'),
			'post_types'        => array('page'),
			'render_template'   => 'templates/blocks/block-images-1-texts-2.php',
			'enqueue_assets'    => function(){
				wp_enqueue_style('images-1-texts-2', get_template_directory_uri() . '/build/css/blocks/images-1-texts-2.min.css');
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
	}
}
add_action('acf/init', 'sfwed_acf_custom_blocks_init');

/**
 * Allow only specific Gutenberg blocks
 */
add_filter('allowed_block_types_all', 'sfwed_allowed_blocks');
function sfwed_allowed_blocks($allowedBlocks)
{
	if (get_post_type() == 'post') {
		$allowedBlocks = array(
			'core/paragraph',
			'core/quote',
			'core/table',
			'core/heading',
			'core/subhead',
			'core/spacer',
			'core/embed',
			'core/list',
			'core/list-item',
			'core/image',
			'acf/gallery',
			'acf/hero-simple',
		);
	} else {
		$allowedBlocks = array(
			'acf/homepage-hero',
			'acf/cta-big',
			'acf/text-boxes',
			'acf/gallery',
			'acf/portfolio-grid',
			'acf/post-grid',
			'acf/testimonials',
			'acf/hero-simple',
			'acf/hero-simple-2',
			'acf/process',
			'acf/contact',
			'acf/contact-thanks',
			'acf/image-text',
			'acf/image-text-image',
			'acf/hero-with-box',
			'acf/faq',
			'acf/images-2-texts-2',
			'acf/images-3-texts-1',
			'acf/images-1-texts-2',
		);
	}

	return $allowedBlocks;
}
