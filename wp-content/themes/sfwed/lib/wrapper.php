<?php

/**
 * Gets template path.
 *
 * @return string Template path.
 */
function wrapper_template_path() {
  return SageWrapping::$main_template;
}

add_filter( 'template_include', [ 'SageWrapping', 'wrap' ], 109 );
