<?php


/**
 * Displays a icomoon icon.
 *
 * Call the component like:
 *
 * Add a second argument 'true' to return the component as a string instead of echoing it.
 * $html = get_component('icon', ['name' => 'icon-arrow', 'classes' => ['header__icon', 'px-1']], true);
 */

function icon_render( $args ) {
  /** Define the array of defaults */
  $defaults = [
    'name'    => '',
    'classes' => [],
  ];

  $args         = wp_parse_args( $args, $defaults );
  $class_string = '';
  foreach ( $args['classes'] as $class ) {
    $class_string .= 'icon' . $class . ' ';
  }
  if ( ! empty( $args['name'] ) ) {
  ?>
  <svg class="icon <?php echo $args['name'] ?> <?php echo $class_string ?>">
    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#<?php echo $args['name'] ?>"></use>
  </svg>
  <?php
  }
}

register_component( 'icon', 'icon_render' );
