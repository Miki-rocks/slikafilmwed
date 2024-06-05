<?php
// Setup defaults
$array_defaults = array(
	'title' => '',
	'imageUrl' => '',
	'excerpt' => '',
	'link' => '',
);

$args = wp_parse_args($args, $array_defaults);

if (!isset($args['link']) || empty($args['link'])) {
	return;
}

$baseClass = 'social-share';

$title         = $args['title'];
$img           = $args['imageUrl'];
$excerpt       = $args['excerpt'];

$current_link = $args['link'];

$raw_url      = rawurlencode($current_link);
$raw_title    = htmlspecialchars(urlencode(html_entity_decode($title, ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
$raw_excerpt  = rawurlencode($excerpt);
$raw_img      = rawurlencode($img);

$facebook_url  = 'https://www.facebook.com/sharer/sharer.php?u=' . $raw_url;
$twitter_url   = 'https://twitter.com/intent/tweet?text=' . $raw_title . '&amp;url=' . $raw_url;
$email_url     = 'mailto:?subject=' . $raw_title . '&body=Check this out:%0A%0A' . $excerpt . '%0A%0A' . $raw_url;
$whatsapp_url  = 'whatsapp://send?text=' . $raw_title . '%0A%0A' . $raw_url;
$viber_url     = 'viber://forward?text=' . $raw_title . '%0A%0A' . $raw_url;
$linkedin_url  = 'https://www.linkedin.com/sharing/share-offsite/?url=' . urlencode($current_link);
?>

<div class="<?php echo $baseClass; ?>">
	<h2 class="font-size-h-m mb-4"><?php _e('Share the love', 'sfwed'); ?></h2>
	<div class="<?php echo $baseClass; ?>-icons_wrap d-flex flex-wrap">

		<div class="<?php echo $baseClass; ?>-icons_wrap-icon">
			<a href="<?php echo $facebook_url; ?>" class="<?php echo $baseClass; ?>-icons_wrap-icon-link js-share-link <?php echo $baseClass; ?>-facebook d-block" target="_blank" aria-label="<?php _e('Facebook', 'sfwed'); ?>">
				<div class="<?php echo $baseClass; ?>-icons_wrap-back d-flex justify-content-center align-items-center">
					<?php echo sfwed_render_svg('icon-facebook', 'icons'); ?>
				</div>
			</a>
		</div>

		<div class="<?php echo $baseClass; ?>-icons_wrap-icon">
			<a href="<?php echo $twitter_url; ?>" class="<?php echo $baseClass; ?>-icons_wrap-icon-link js-share-link <?php echo $baseClass; ?>-x d-block" target="_blank" aria-label="<?php _e('X', 'sfwed'); ?>">
				<div class="<?php echo $baseClass; ?>-icons_wrap-back d-flex justify-content-center align-items-center">
					<?php echo sfwed_render_svg('icon-x', 'icons'); ?>
				</div>
			</a>
		</div>

		<div class="<?php echo $baseClass; ?>-icons_wrap-icon">
			<a href="<?php echo $email_url; ?>" class="<?php echo $baseClass; ?>-icons_wrap-icon-link js-share-link <?php echo $baseClass; ?>-email d-block" target="_blank" aria-label="<?php _e('Email', 'sfwed'); ?>">
				<div class="<?php echo $baseClass; ?>-icons_wrap-back d-flex justify-content-center align-items-center">
					<?php echo sfwed_render_svg('icon-mail', 'icons'); ?>
				</div>
			</a>
		</div>

		<div class="<?php echo $baseClass; ?>-icons_wrap-icon">
			<a href="<?php echo $linkedin_url; ?>" class="<?php echo $baseClass; ?>-icons_wrap-icon-link js-share-link <?php echo $baseClass; ?>-linkedin d-block" target="_blank" aria-label="<?php _e('LinkedIn', 'sfwed'); ?>">
				<div class="<?php echo $baseClass; ?>-icons_wrap-back d-flex justify-content-center align-items-center">
					<?php echo sfwed_render_svg('icon-linkedin', 'icons'); ?>
				</div>
			</a>
		</div>

		<div class="<?php echo $baseClass; ?>-icons_wrap-icon d-lg-none">
			<a href="<?php echo $whatsapp_url; ?>" class="<?php echo $baseClass; ?>-icons_wrap-icon-link js-share-link <?php echo $baseClass; ?>-youtube d-block" target="_blank" aria-label="<?php _e('Youtube', 'sfwed'); ?>">
				<div class="<?php echo $baseClass; ?>-icons_wrap-back d-flex justify-content-center align-items-center">
					<?php echo sfwed_render_svg('icon-whatsapp', 'icons'); ?>
				</div>
			</a>
		</div>

		<div class="<?php echo $baseClass; ?>-icons_wrap-icon d-lg-none">
			<a href="<?php echo $viber_url; ?>" class="<?php echo $baseClass; ?>-icons_wrap-icon-link js-share-link <?php echo $baseClass; ?>-google d-block" target="_blank" aria-label="<?php _e('Google', 'sfwed'); ?>">
				<div class="<?php echo $baseClass; ?>-icons_wrap-back d-flex justify-content-center align-items-center">
					<?php echo sfwed_render_svg('icon-viber', 'icons'); ?>
				</div>
			</a>
		</div>

	</div>
</div>