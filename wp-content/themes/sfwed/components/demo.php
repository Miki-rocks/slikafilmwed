<?php
/**
 * Displays a button.
 *
 * Call the component like:
 * get_component('demo');
 * get_component('demo', [ 'color' => 'green']);
 * get_component('demo', [ 'color' => 'green', 'label_text' => 'See more']);
 *
 * Add a second argument 'true' to return the component as a string instead of echoing it.
 * $html = get_component('demo', [], true);
 */

function demo_render( $args ) {
  /** Define the array of defaults */
  $defaults = [
    'color'      => 'red',
    'label_text' => 'klik!',
  ];

  $args = wp_parse_args( $args, $defaults );
  ?>
  <div style="display: inline-block; padding:10px; background: <?php echo $args['color'] ?>;">
    <?php echo $args['label_text'] ?>
  </div>
  <?php
}

register_component( 'demo', 'demo_render' );
