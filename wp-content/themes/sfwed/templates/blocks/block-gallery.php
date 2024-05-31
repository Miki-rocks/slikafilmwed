<?php
$data = get_fields();

if (isset($args) && !empty($args)) {
	$array_defaults = array(
		'title' => '',
		'gallery' => array(),
	);

	if (isset($args) && !empty($args)) {
		$args = wp_parse_args($args, $array_defaults);
		$data = $args;
	}
}

if (!array_filter($data)) {
	return;
}

$baseClass = 'gallery';
?>

<section class="sfwed-section <?php echo $baseClass; ?> overflow-hidden my-8 my-lg-10 pb-12 pb-lg-12" <?php echo (isset($block['anchor']) && !empty($block['anchor'])) ? 'id="' . $block['anchor'] . '"' : '' ; ?>>
	<div class="container">
		<div class="row">
			<div class="col-12">

				<?php if (isset($data['gallery']) && !empty($data['gallery'])) { ?>
					<div class="masonry-grid" id="masonry-grid-lightgallery">
						<div class="grid-sizer"></div>
						<?php foreach ($data['gallery'] as $key => $image): ?>
							<div class="grid-item" data-src="<?php echo esc_url($image['url']); ?>">
								<?php echo wp_get_attachment_image($image['ID'], 'grid-hd', '', ['class' => 'nolazy grid-img', 'title' => $data['title'] . ' - img ' . $key] ); ?>
							</div>
						<?php endforeach; ?>
					</div>
				<?php } ?>

			</div>
		</div>
	</div>
</section>
