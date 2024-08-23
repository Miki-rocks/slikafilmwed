<?php
$data = get_fields();

if (isset($args) && !empty($args)) {
	$array_defaults = array(
		'images' => '',
		'title' => '',
		'subtitle' => '',
		'button' => array(),
	);

	if (isset($args) && !empty($args)) {
		$args = wp_parse_args($args, $array_defaults);
		$data = $args;
	}
}

if (!array_filter($data)) {
	return;
}

$baseClass = 'homepage-hero';
?>

<section class="sfwed-section <?php echo $baseClass; ?> hero-w-scroll overflow-hidden position-relative d-flex flex-column align-items-center justify-content-start" <?php echo (isset($block['anchor']) && !empty($block['anchor'])) ? 'id="' . $block['anchor'] . '"' : '' ; ?>>
	
	<div class="<?php echo $baseClass; ?>__slider">
		<?php if (isset($data['images']) && !empty($data['images'])) { ?>
			<?php foreach ($data['images'] as $key => $image) { ?>
				<div class="<?php echo $baseClass; ?>__slide">
					<div class="<?php echo $baseClass; ?>__background">
						<?php echo wp_get_attachment_image($image['image'], 'full', '', ['class' => 'homepage-hero-img', 'title' => $data['title'] . ' ' . $key] ); ?>
					</div>
				</div>
			<?php } ?>
		<?php } ?>
	</div>
	
	<div class="<?php echo $baseClass; ?>__gradient"></div>

	<div class="container">
		<div class="row">
			<div class="col-12 col-md-10 offset-md-1">
				<div class="<?php echo $baseClass; ?>__content text-center pt-lg-13 pb-10">
					<h1 class="<?php echo $baseClass; ?>__title font-size-h-xl mb-3 mb-lg-6 pt-13"><?php echo $data['title']; ?></h1>
					<h2 class="<?php echo $baseClass; ?>__subtitle font-size-h-s mb-0 mx-5 mx-lg-auto"><?php echo $data['subtitle']; ?></h2>

					<?php if (isset($data['button']) && !empty($data['button'])) { ?>
						<div class="mt-6">
							<?php get_template_part(
								'templates/components/button',
								null,
								[
									'type' => 'a',
									'classes' => 'btn-primary',
									'text' => $data['button']['title'],
									'link' => $data['button']['url'],
									'target' => $data['button']['target'],
									'size' => '',
									'icon' => 'icon-chevron-right',
									'icon-position' => 'right',
								]
							); ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>

	<div class="<?php echo $baseClass; ?>__slider-dots-outer-wrap mb-5 mb-md-6 mt-4">
		<div class="<?php echo $baseClass; ?>__slider-dots-wrap font-size-b-l"></div>
	</div>

</section>
