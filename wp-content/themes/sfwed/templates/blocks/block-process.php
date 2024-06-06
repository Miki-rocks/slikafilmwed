<?php
$data = get_fields();

if (isset($args) && !empty($args)) {
	$array_defaults = array(
		'title' => '',
		'image' => '',
		'button' => array(),
		'steps' => array(),
	);

	if (isset($args) && !empty($args)) {
		$args = wp_parse_args($args, $array_defaults);
		$data = $args;
	}
}

if (!array_filter($data)) {
	return;
}

$baseClass = 'process';
?>

<section class="sfwed-section <?php echo $baseClass; ?> my-8 my-lg-13 py-10 py-lg-12" <?php echo (isset($block['anchor']) && !empty($block['anchor'])) ? 'id="' . $block['anchor'] . '"' : '' ; ?>>

	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-4">
				<div class="<?php echo $baseClass; ?>__background">
					<?php echo wp_get_attachment_image($data['image'], 'grid-hd', '', ['class' => '', 'title' => $data['title']] ); ?>
				</div>
			</div>
			<div class="col-12 col-lg-6 offset-xl-1">
				<div class="d-flex flex-column h-100 justify-content-lg-end">
					<h2 class="<?php echo $baseClass; ?>__title font-size-h-xl mt-8 mt-lg-0 mb-8"><?php echo $data['title']; ?></h2>

					<?php if (isset($data['steps']) && !empty($data['steps'])) {
						foreach ($data['steps'] as $key => $text_step) { ?>
							<div class="<?php echo $baseClass; ?>__step d-flex">
								<div class="">
									<p class="color-primary-1 font-size-h-xl mb-0 mr-6 mt-n4 mt-lg-n8"><?php echo '0' . $key + 1; ?></p>
								</div>
								<div class="">
									<h2 class="<?php echo $baseClass; ?>__title font-family-secondary font-weight-400 color-tertiary-1 font-size-h-xxs color-black"><?php echo $text_step['step_title']; ?></h2>
									<div class="<?php echo $baseClass; ?>__text font-size-b-s"><?php echo $text_step['step_text']; ?></div>
								</div>
							</div>
						<?php }
					} ?>

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

				</div>
			</div>
		</div>
	</div>
</section>
