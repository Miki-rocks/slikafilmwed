<?php
/*
* Images directory
*/
function sfwed_img_path($trail_backslash = true, $path_type = 'uri') {
 if ('uri' === $path_type) {
   $template_directory = get_template_directory_uri();
 } else {
   $template_directory = get_template_directory();
 }

 $path = $template_directory . '/assets/img';
 if ($trail_backslash) {
   $path .= '/';
 }

 return $path;
}

function sfwed_assets_path($trail_backslash = true, $path_type = 'uri') {
 if ('uri' === $path_type) {
   $template_directory = get_template_directory_uri();
 } else {
   $template_directory = get_template_directory();
 }

 $path = $template_directory . '/assets';
 if ($trail_backslash) {
   $path .= '/';
 }

 return $path;
}

function sfwed_img($image, $suburl = '' ) {
  $base_url = sfwed_img_path();

  if ($suburl && $image) {
    return $base_url . $suburl . '/' . $image;
  } elseif ($image) {
    return $base_url . $image;
  }

  return false;
}

remove_image_size('medium');
remove_image_size('medium_large');
remove_image_size('large');

function sfwed_render_svg( $file_name = '', $location = '', $path_type = 'uri' ) {
  if ('uri' === $path_type) {
    $template_directory = get_template_directory_uri();
  } else {
    $template_directory = get_template_directory();
  }

  $cache_key = 'svg_' . $location . '_' . $file_name;
  $svg_logo_ready = wp_cache_get($cache_key);

  if (!$svg_logo_ready) {
    $svg_logo = file_get_contents($template_directory . '/assets/img/' . $location . '/' . $file_name . '.svg');
    $find_string = '<svg';
    $position = strpos($svg_logo, $find_string);
    $svg_logo_ready = substr($svg_logo, $position);
    wp_cache_set($cache_key, $svg_logo_ready);
  }

  return $svg_logo_ready;
}
