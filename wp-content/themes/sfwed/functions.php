<?php
$theme_includes = [
  'lib/class-sagewrapping.php',
  'lib/wrapper.php',
  'lib/helpers.php',
  'lib/setup.php',
  'lib/class-sfwed-walker.php',
  'lib/components.php',
  'lib/acf.php',
  'lib/cpt.php',
  'lib/images.php',
];

/** Include all components too */
$components = array_diff( scandir( __DIR__ . '/components/' ), [ '..', '.' ] );
if ( $components ) {
  foreach ( $components as $key => $value ) {
    $components[ $key ] = 'components/' . $value;
  }
  $theme_includes = array_merge( $theme_includes, $components );
}

foreach ( $theme_includes as $file ) {
  require_once locate_template( $file );
}

unset( $file, $filepath );
