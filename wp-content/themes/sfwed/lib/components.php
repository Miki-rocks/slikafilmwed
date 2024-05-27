<?php

$GLOBALS['sfwed_components'] = [];

function get_component( $component_name, $component_args, $return = false ) {
  global $sfwed_components;
  if ( array_key_exists( $component_name, $sfwed_components ) ) {
    add_action( 'sfwed_component_' . $component_name, $sfwed_components[ $component_name ], 10, 2 );
    ob_start();
    do_action( 'sfwed_component_' . $component_name, $component_args, $return );
    $render = ob_get_contents();
    remove_action( 'sfwed_component_' . $component_name, $sfwed_components[ $component_name ] );
    ob_end_clean();

    if ( $return ) {
      return $render;
    } else {
      echo $render;
    }
  }
}

function register_component( $component_name, $function_name ) {
  global $sfwed_components;
  $sfwed_components[ $component_name ] = $function_name;
}
