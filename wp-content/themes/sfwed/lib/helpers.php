<?php
/*
 * Get sfwed svg logo
 */
function sfwed_logo() {
	return sfwed_render_svg( 'logo', 'raw', 'uri' );
}

/*
 * Get social channels bar
 */
function sfwed_social_channels_bar( $title = false ) {
	$args = array( 'display_title' => $title );
	get_template_part( 'templates/modules/module-social-channels', 'module-social-channels', $args );
}
