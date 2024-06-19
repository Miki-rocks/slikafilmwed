<?php
/*
Template Name: Password protected
*/

if ( post_password_required() ) {
	$args = [
		'text_box' => get_the_password_form() . '<br>' . get_field('password_protected_text_box', 'options'),
		'section_background' => get_field('password_protected_section_background', 'options'),
		'textbox_background' => get_field('password_protected_textbox_background', 'options'),
		'button' => get_field('password_protected_button', 'options'),
	];
	get_template_part('templates/blocks/block-hero-with-box', null, $args);
} else {
    // Content for pages that are not password protected
    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
}
