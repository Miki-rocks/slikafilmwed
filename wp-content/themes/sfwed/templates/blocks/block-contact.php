<?php
$data = get_fields();

if (isset($args) && !empty($args)) {
	$array_defaults = array(
		'title' => '',
		'text' => '',
		'cta_title' => '',
		'button' => array(),
		'image' => '',
	);

	if (isset($args) && !empty($args)) {
		$args = wp_parse_args($args, $array_defaults);
		$data = $args;
	}
}

if (!array_filter($data)) {
	return;
}

$baseClass = 'cta-big';
?>

<section class="sfwed-section <?php echo $baseClass; ?> overflow-hidden my-8 my-lg-10 pb-12 pb-lg-12" <?php echo (isset($block['anchor']) && !empty($block['anchor'])) ? 'id="' . $block['anchor'] . '"' : '' ; ?>>

	<div class="<?php echo $baseClass; ?>__background animateOnEnter">
		<?php echo wp_get_attachment_image($data['hero_image'], 'full', '', ['class' => '', 'title' => 'Contact hero image'] ); ?>
	</div>
<h1 style="padding-top: 200px;">provjeri sve prazno</h1>
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-6 offset-lg-1">
				<p class="<?php echo $baseClass; ?>__small_title font-size-h-xxs mb-4"><?php echo $data['small_title']; ?></p>
				<h1 class="<?php echo $baseClass; ?>__title font-size-h-xl mb-8"><?php echo $data['title']; ?></h1>
				<div class="<?php echo $baseClass; ?>__text font-size-b-m mb-8 mb-lg-15"><?php echo $data['text']; ?></div>
			</div>
			<div class="col-12 col-lg-8 offset-lg-2">
				<?php echo do_shortcode($data['contact_form_shortcode']); ?>
			</div>
		</div>
		<div class="row bg-el--right">
			
			<div class="col-12 col-lg-5">
				<div class="d-flex flex-column h-lg-100 justify-content-lg-center">
					<?php /* if (isset($data['button']) && !empty($data['button'])) { ?>
						<div class="text-center">
							<?php get_template_part(
								'templates/components/button',
								null,
								[
									'type' => 'a',
									'classes' => 'btn-secondary',
									'text' => $data['button']['title'],
									'link' => $data['button']['url'],
									'target' => $data['button']['target'],
									'size' => '',
									'icon' => 'icon-chevron-right',
									'icon-position' => 'right',
								]
							); ?>
						</div>
					<?php } */ ?>
				</div>
			</div>
		</div>
	</div>
</section>
