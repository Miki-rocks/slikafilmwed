<?php
$data = get_fields();

if (isset($args) && !empty($args)) {
	$array_defaults = array(
		'title' => '',
		'button' => array(),
		'image' => '',
		'text_boxes' => array(),
	);

	if (isset($args) && !empty($args)) {
		$args = wp_parse_args($args, $array_defaults);
		$data = $args;
	}
}

if (!array_filter($data)) {
	return;
}

$baseClass = 'text-boxes';
?>

<section class="sfwed-section <?php echo $baseClass; ?> overflow-hidden bg-gray-1 my-8 my-lg-13 py-10 py-lg-12" <?php echo (isset($block['anchor']) && !empty($block['anchor'])) ? 'id="' . $block['anchor'] . '"' : '' ; ?>>

	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-7">
				<div class="<?php echo $baseClass; ?>__background animateOnEnter">
					<?php echo wp_get_attachment_image($data['image'], 'full', '', ['class' => 'homepage-hero-img', 'title' => $data['title']] ); ?>
				</div>
			</div>
			<div class="col-12 col-lg-5 col-xl-4 offset-xl-1">
				<div class="d-flex flex-column h-100 justify-content-lg-end">
					<h1 class="<?php echo $baseClass; ?>__title font-size-h-xl mt-8 mt-lg-0 mb-8"><?php echo $data['title']; ?></h1>

					<?php if (isset($data['button']) && !empty($data['button'])) { ?>
						<div class="">
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

					<?php if (isset($data['text_boxes'][0]) && !empty($data['text_boxes'][0])) { ?>
						<h2 class="<?php echo $baseClass; ?>__title font-size-h-s color-tertiary-1 mt-10 mt-lg-13 mb-4"><?php echo $data['text_boxes'][0]['box_title']; ?></h2>
						<div class="<?php echo $baseClass; ?>__text font-size-b-m"><?php echo $data['text_boxes'][0]['box_text']; ?></div>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="row">
			<?php if (isset($data['text_boxes']) && !empty($data['text_boxes'])) {
				foreach ($data['text_boxes'] as $key => $text_box) {
					if ($key != 0) { ?>
						<div class="col-12 col-lg-4">
							<h2 class="<?php echo $baseClass; ?>__title font-size-h-s color-tertiary-1 mt-10 mt-lg-13 mb-4"><?php echo $text_box['box_title']; ?></h2>
							<div class="<?php echo $baseClass; ?>__text font-size-b-m"><?php echo $text_box['box_text']; ?></div>
						</div>
					<?php }
				}
			} ?>
		</div>
	</div>
</section>
