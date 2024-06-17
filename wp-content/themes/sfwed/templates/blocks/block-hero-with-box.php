<?php
$data = get_fields();

if (isset($args) && !empty($args)) {
	$array_defaults = array(
		'text_box' => '',
		'section_background' => '',
		'textbox_background' => '',
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

$baseClass = 'hero-with-box';
?>

<section class="sfwed-section <?php echo $baseClass; ?> position-relative mb-8 mb-lg-13" <?php echo (isset($block['anchor']) && !empty($block['anchor'])) ? 'id="' . $block['anchor'] . '"' : '' ; ?>>

	<div class="<?php echo $baseClass; ?>__background">
		<?php if (isset($data['section_background']) && !empty($data['section_background'])) {
			echo wp_get_attachment_image($data['section_background'], 'full', '', ['class' => '', 'title' => 'Packages'] );
		} ?>
	</div>
	
	<div class="<?php echo $baseClass; ?>__wrap">
		<div class="container-fluid h-100">
			<div class="row h-100">
				<div class="col-12">

					<div class="<?php echo $baseClass; ?>__content d-flex h-100 justify-content-lg-end align-items-end align-items-lg-center pb-8 pb-lg-0 mr-lg-13">
						<div class="<?php echo $baseClass; ?>__textbox position-relative overflow-hidden px-6 py-4 px-lg-10 py-lg-8">
							<?php if (isset($data['textbox_background']) && !empty($data['textbox_background'])) {
								echo wp_get_attachment_image($data['textbox_background'], 'full', '', ['class' => $baseClass . '__textbox_background', 'title' => 'Packages content'] );
							} ?>
							<div class="<?php echo $baseClass; ?>__textbox_content position-relative">
								<?php if (isset($data['text_box']) && !empty($data['text_box'])) {
									echo $data['text_box'];
								} ?>
								<?php if (isset($data['button']) && !empty($data['button'])) { ?>
									<div class="text-left">
										<?php get_template_part(
											'templates/components/button',
											null,
											[
												'type' => 'a',
												'classes' => 'btn-primary mt-4 mt-lg-8',
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
			</div>
		</div>
	</div>
</section>
