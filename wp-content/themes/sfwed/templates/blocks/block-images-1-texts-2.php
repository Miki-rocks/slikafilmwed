<?php
$data = get_fields();

if (isset($args) && !empty($args)) {
	$array_defaults = array(
		'title' => '',
		'image_one' => '',
		'subtitle_one' => '',
		'subtitle_two' => '',
		'text_one' => '',
		'text_two' => '',
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

$baseClass = 'images-1-texts-2';
?>

<section class="sfwed-section <?php echo $baseClass; ?> my-8 my-lg-8 py-8" <?php echo (isset($block['anchor']) && !empty($block['anchor'])) ? 'id="' . $block['anchor'] . '"' : '' ; ?>>

	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-7">
				<h2 class="<?php echo $baseClass; ?>__title font-size-h-xl mb-8 mb-lg-12"><?php echo $data['title']; ?></h2>
			</div>
		</div>
		<div class="row bg-el--right light">
			<div class="col-12 col-lg-4">
				<div class="<?php echo $baseClass; ?>__background w-100 h-lg-100 mb-5 position-relative overflow-hidden animateOnEnter">
					<?php echo wp_get_attachment_image($data['image_one'], 'full', '', ['class' => '', 'title' => $data['title']] ); ?>
				</div>
			</div>
			<div class="col-12 col-lg-4">
				<h3 class="<?php echo $baseClass; ?>__subtitle mt-6 mt-lg-0 mb-4"><?php echo $data['subtitle_one']; ?></h3>
				<div class="<?php echo $baseClass; ?>__content mb-4"><?php echo $data['text_one']; ?></div>
			</div>
			<div class="col-12 col-lg-4">
				<h3 class="<?php echo $baseClass; ?>__subtitle mt-6 mt-lg-0 mb-4"><?php echo $data['subtitle_two']; ?></h3>
				<div class="<?php echo $baseClass; ?>__content mb-4"><?php echo $data['text_two']; ?></div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<?php if (isset($data['button']) && !empty($data['button'])) { ?>
					<div class="text-center mt-8 mt-lg-10">
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

</section>
