<?php
$data = get_fields();

if (isset($args) && !empty($args)) {
	$array_defaults = array(
		'title' => '',
		'image_one' => '',
		'image_two' => '',
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

$baseClass = 'images-2-texts-2';
?>

<section class="sfwed-section <?php echo $baseClass; ?> my-8 my-lg-8 py-12 py-lg-14" <?php echo (isset($block['anchor']) && !empty($block['anchor'])) ? 'id="' . $block['anchor'] . '"' : '' ; ?>>

	<div class="container">
		<div class="row bg-el--right light">
			<div class="col-12 col-lg-3">
				<div class="<?php echo $baseClass; ?>__background position-relative overflow-hidden animateOnEnter">
					<?php echo wp_get_attachment_image($data['image_one'], 'full', '', ['class' => '', 'title' => $data['title']] ); ?>
				</div>
			</div>
			<div class="col-12 col-lg-4 offset-lg-1">
				<div class="d-flex flex-column h-lg-100 justify-content-lg-center">
					<h2 class="<?php echo $baseClass; ?>__title font-size-h-xl mt-8 mt-lg-0 mb-8"><?php echo $data['title']; ?></h2>
					<div class="<?php echo $baseClass; ?>__content mb-8"><?php echo $data['text']; ?></div>
					<?php if (isset($data['button']) && !empty($data['button'])) { ?>
						<div class="">
							<?php get_template_part(
								'templates/components/button',
								null,
								[
									'type' => 'a',
									'classes' => 'btn-primary mb-10 mb-lg-0',
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
			<div class="col-12 col-lg-3 offset-lg-1">
				<div class="<?php echo $baseClass; ?>__background position-relative overflow-hidden animateOnEnter">
					<?php echo wp_get_attachment_image($data['image_two'], 'full', '', ['class' => '', 'title' => $data['title']] ); ?>
				</div>
			</div>
		</div>
	</div>

</section>
