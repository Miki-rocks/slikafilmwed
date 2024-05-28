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

  register_nav_menus(
    [
      'primary_navigation_l' => __( 'Main menu - left', 'sfwed' ),
      'primary_navigation_r' => __( 'Main menu - right', 'sfwed' ),
      'footer_menu' => __( 'Footer menu', 'sfwed' ),
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
