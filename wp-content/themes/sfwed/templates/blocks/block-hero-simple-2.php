<?php
$data = get_fields();

if (isset($args) && !empty($args)) {
	$array_defaults = array(
		'title' => '',
		'hero_image' => '',
	);

	if (isset($args) && !empty($args)) {
		$args = wp_parse_args($args, $array_defaults);
		$data = $args;
	}
}

if (!array_filter($data)) {
	return;
}

$baseClass = 'hero-simple-2';
?>

<section class="sfwed-section <?php echo $baseClass; ?> position-relative mb-8 mb-lg-13" <?php echo (isset($block['anchor']) && !empty($block['anchor'])) ? 'id="' . $block['anchor'] . '"' : '' ; ?>>

	<div class="<?php echo $baseClass; ?>__background">
		<?php if (isset($data['hero_image']) && !empty($data['hero_image'])) {
			echo wp_get_attachment_image($data['hero_image'], 'full', '', ['class' => '', 'title' => $data['title']] );
		} ?>
	</div>
	
	<div class="<?php echo $baseClass; ?>__wrap">
		<div class="container h-100">
			<div class="row h-100">
				<div class="col-12">

					<div class="<?php echo $baseClass; ?>__content d-flex h-100 justify-content-center align-items-center">
						<h1 class="<?php echo $baseClass; ?>__title color-white font-size-h-xl mb-0">
							<?php if (isset($data['title']) && !empty($data['title'])) {
								echo $data['title'];
							} ?>
						</h1>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>
