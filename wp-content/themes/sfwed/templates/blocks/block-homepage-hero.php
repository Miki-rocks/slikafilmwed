<?php
$data = get_fields();

if (!array_filter($data)) {
	return;
}

$baseClass = 'homepage-hero';
?>
<section class="sfwed-section <?php echo $baseClass; ?> overflow-hidden position-relative d-flex align-items-center" <?php echo (isset($block['anchor']) && !empty($block['anchor'])) ? 'id="' . $block['anchor'] . '"' : '' ; ?>>
	
	<?php echo wp_get_attachment_image($data['background_image'], 'full', '', ['class' => $baseClass . '__background', 'title' => $data['title']] ); ?>
	<div class="<?php echo $baseClass; ?>__gradient"></div>

	<div class="container">
		<div class="row">
			<div class="col-12 col-md-10 offset-md-1 col-lg-12 offset-lg-0">
				<div class="<?php echo $baseClass; ?>__content text-center py-13">
					<div class="d-block mb-6">
						<?php echo sfwed_logo(); ?>
					</div>
					<h1 class="<?php echo $baseClass; ?>__title text-white"><?php echo $data['title']; ?></h1>
				</div>
			</div>
		</div>
	</div>
</section>
