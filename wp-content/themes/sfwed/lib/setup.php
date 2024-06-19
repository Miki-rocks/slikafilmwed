<?php

/**
 * Theme stuff.
 *
 * @see https://wordpress.stackexchange.com/questions/80334/how-to-make-a-wordpress-plugin-translation-ready
 */
function sfwed_setup() {
  load_theme_textdomain( 'sfwed', get_template_directory() . '/lang' );
  add_theme_support( 'title-tag' );
  add_theme_support( 'woocommerce' );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'html5', [ 'caption', 'comment-form', 'comment-list', 'gallery' ] );
  add_theme_support( 'editor-styles' );

  add_editor_style( 'editor-style.css' );

  add_image_size( 'hero-hd', 1920, 1080 );
  add_image_size( 'grid-hd', 720, 1100, false );
  add_image_size( 'footer', 171, 276, true );
  add_image_size( 'card', 750, 500, true );
  add_image_size( 'card-sm', 450, 293, true );
  add_image_size( 'card-vertical', 351, 526, true );

  register_nav_menus(
    [
      'primary_navigation_l' => __( 'Main menu - left', 'sfwed' ),
      'primary_navigation_r' => __( 'Main menu - right', 'sfwed' ),
      'footer_menu' => __( 'Footer menu', 'sfwed' ),
      'footer_menu_2' => __( 'Footer menu 2', 'sfwed' ),
    ]
  );

}
add_action( 'after_setup_theme', 'sfwed_setup' );

/**
 * Enqueue assets.
 */
function sfwed_assets() {
  if ( ! is_admin() ) {
    wp_deregister_script( 'jquery-core' );
  }

  $theme_path = get_template_directory_uri();
  $real_path = get_template_directory();
  $header_scripts = array(
    // 'jquery-core' => '/assets/js/lib/jquery-3.6.0.min.js',
  );
  foreach ( $header_scripts as $name => $path ) {
    wp_enqueue_script(
      $name,
      $theme_path . $path,
      array(),
      filemtime( $real_path . $path ),
      true
    );
  }

  $footer_scripts = array(
    'jquery-core' => '/assets/js/lib/jquery-3.6.0.min.js',
    'bootstrap-min' => '/assets/js/lib/bootstrap.min.js',
    // 'slick' => '/assets/js/lib/slick.min.js',
    'app' => '/build/js/app.js'
  );
  foreach ( $footer_scripts as $name => $path ) {
    wp_enqueue_script(
      $name,
      $theme_path . $path,
      array(),
      filemtime( $real_path . $path ),
      true
    );
  }

  switch ( wp_get_environment_type() ) {
    case 'development':
      wp_enqueue_style( 'sfwed-stylesheet', get_template_directory_uri() . '/theme.css', [], null );
      break;

    case 'local':
      wp_enqueue_style( 'sfwed-stylesheet', get_template_directory_uri() . '/theme.css', [], null );
      break;

    case 'staging':
      wp_enqueue_style( 'sfwed-stylesheet', get_template_directory_uri() . '/theme.min.css', [], null );
      break;

    default:
      wp_enqueue_style( 'sfwed-stylesheet', get_template_directory_uri() . '/theme.min.css', [], null );
      break;
  }

  if (is_singular('portfolio')) {
    wp_enqueue_style('gallery', get_template_directory_uri() . '/build/css/blocks/gallery.min.css');

    wp_enqueue_style('lightgallery', get_template_directory_uri() . '/build/css/blocks/lightgallery.min.css');
    wp_enqueue_script('lightgallery', get_template_directory_uri() . '/assets/js/lib/lightgallery.min.js', array('jquery'), '', true);

    wp_enqueue_script('masonry', get_template_directory_uri() . '/assets/js/lib/masonry.min.js', array('jquery'), '', true);
    
    wp_enqueue_script('gallery', get_template_directory_uri() . '/build/scripts/blocks/gallery.js', array('jquery', 'lightgallery', 'masonry'), '', true);


    wp_enqueue_style('portfolio-grid', get_template_directory_uri() . '/build/css/blocks/portfolio-grid.min.css');
  }

  if (is_category() || is_tax( 'portfolio-category' ) || is_home() || is_tag() || is_post_type_archive('portfolio')) {
    wp_enqueue_style('portfolio-grid', get_template_directory_uri() . '/build/css/blocks/portfolio-grid.min.css');
  }

  if (is_singular('post')) {
    wp_enqueue_style('hero-simple', get_template_directory_uri() . '/build/css/blocks/hero-simple.min.css');
		wp_enqueue_style('social-share', get_template_directory_uri() . '/build/css/blocks/social-share.min.css');
  }

  if ( post_password_required() ) {
    wp_enqueue_style('hero-with-box', get_template_directory_uri() . '/build/css/blocks/hero-with-box.min.css');
	  wp_enqueue_style('contact', get_template_directory_uri() . '/build/css/blocks/contact.min.css');
  }
}
add_action( 'wp_enqueue_scripts', 'sfwed_assets', 100 );

/**
 * Enqueue Javascript and styles for Gutenberg editor
 */
function sfwed_editor_styles() {
  wp_enqueue_style( 'editor_styles', get_template_directory_uri() . '/editor_styles.min.css', [ 'wp-edit-blocks' ] );
}
add_action( 'enqueue_block_editor_assets', 'sfwed_editor_styles' );

/**
 * Disable the emoji's bloat.
 */
function disable_emojis() {
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}


/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param  array $plugins List of plugins.
 * @return array Filtered list of plugins.
 */
function disable_emojis_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, [ 'wpemoji' ] );
  } else {
    return [];
  }
}
add_action( 'init', 'disable_emojis' );


function sfwed_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'sfwed_mime_types');

// Change wordpress login logo
function sfwed_custom_loginlogo() {
if ( get_field( 'login_logo', 'option' ) ) {
    $login_logo_img = get_field( 'login_logo', 'option' );
    $login_logo_img_url = wp_get_attachment_image_src( $login_logo_img, 'medium' )[0];
  } else {
    $login_logo_img_url = '';
  }
  echo '<style type="text/css">h1 a {background-image: url(' . $login_logo_img_url . ') !important; }</style>';
}
add_action('login_head', 'sfwed_custom_loginlogo');

/**
 * Function to wrap blocks inside a .container div
 */
function wrap_blocks_in_container($block_content, $block) {
  $allowed_blocks = [
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
  ];

  // Check if the block is in the list of allowed blocks
  if (in_array($block['blockName'], $allowed_blocks)) {
      // Wrap the block content in a .container div
      $block_content = '<section class="sfwed-section"><div class="container"><div class="row"><div class="col-12">' . $block_content . '</div></div></div></section>';
  }

  return $block_content;
}
// Add the filter
add_filter('render_block', 'wrap_blocks_in_container', 10, 2);

/**
 * display all posts on posts archive
 */
function custom_posts_per_page( $query ) {
  if ( is_post_type_archive( 'post' ) && $query->is_main_query() && !is_admin() ) {
      $query->set( 'posts_per_page', -1 );
  }
}
add_action( 'pre_get_posts', 'custom_posts_per_page' );

/**
 * Custom password form
 */
function custom_password_form() {
  global $post;
  $label = 'pwbox-' . ( empty( $post->ID ) ? rand() : $post->ID );
  $output = '<div class="wpcf7-form"><form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post" class="form-group">
  <p>' . esc_html__( 'This content is password protected. To view it please enter your password below:', 'sfwed' ) . '</p>
  <label for="' . $label . '" class="d-block">' . esc_html__( 'Password:', 'sfwed' ) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" class="form-control font-size-b-m" /><input type="submit" name="Access pricing" value="' . esc_attr__( 'Access pricing', 'sfwed' ) . '" class="btn btn-secondary w-100 d-block text-center mt-4" />
  </form></div>';
  return $output;
}
add_filter( 'the_password_form', 'custom_password_form' );
