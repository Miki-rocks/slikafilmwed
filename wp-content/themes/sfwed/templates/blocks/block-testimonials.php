<?php
$data = get_fields();

if (isset($args) && !empty($args)) {
	$array_defaults = array(
		'title' => '',
		'testimonials' => array(),
	);

	if (isset($args) && !empty($args)) {
		$args = wp_parse_args($args, $array_defaults);
		$data = $args;
	}
}

if (!array_filter($data)) {
	return;
}

if (!isset($data['testimonials']) || empty($data['testimonials'])) {
	return;
}

$baseClass = 'testimonials';
?>

<section class="sfwed-section <?php echo $baseClass; ?> overflow-hidden my-8 my-lg-10 pb-12 pb-lg-12" <?php echo (isset($block['anchor']) && !empty($block['anchor'])) ? 'id="' . $block['anchor'] . '"' : '' ; ?>>
    <div class="container">

		<div class="row">
			<div class="col-12">
				<div class="d-lg-none">
					<h2 class="mb-8"><?php echo $data['title']; ?></h2>
				</div>
			</div>
		</div>

        <div class="row bg-el--left low wide">
            
            <div class="col-12 col-lg-4 offset-lg-2 order-lg-2">
                <div class="<?php echo $baseClass; ?>__slider-photo mb-8 mb-lg-0">
                    <?php foreach ($data['testimonials'] as $testimonialKey => $testimonial) { ?>
                        <div class="">
							<?php
							$testimonial_photo = get_field('testimonial_photo', $testimonial);
							if (!$testimonial_photo) {
								$testimonial_photo = get_post_thumbnail_id($testimonial);
							} ?>
                            <?php echo wp_get_attachment_image($testimonial_photo, 'grid-hd', '', ['class' => '', 'title' => get_the_title($testimonial) . ' testimonial'] ); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="col-12 col-lg-4 offset-lg-1 order-lg-1">

				<div class="d-none d-lg-flex">
					<h2 class="mb-8"><?php echo $data['title']; ?></h2>
				</div>

				<div class="<?php echo $baseClass; ?>__arrows mb-8">
					<div class="position-relative d-flex justify-content-center justify-content-lg-start ml-lg-n6">
						<?php get_template_part(
							'templates/components/button',
							null,
							[
								'type' => 'button',
								'classes' => $baseClass . '__arrow prevArrow btn',
								'text' => 'Previous testimonial',
								'size' => '',
								'icon' => 'icon-chevron-left',
								'icon-position' => 'right',
							]
						); ?>

						<div class="button-dot position-relative mx-4"></div>

						<?php get_template_part(
							'templates/components/button',
							null,
							[
								'type' => 'button',
								'classes' => $baseClass . '__arrow nextArrow btn',
								'text' => 'Next testimonial',
								'size' => '',
								'icon' => 'icon-chevron-right',
								'icon-position' => 'right',
							]
						); ?>
					</div>
				</div>

                <div class="<?php echo $baseClass; ?>__slider-text">
                    <?php foreach ($data['testimonials'] as $testimonialKey => $testimonial) { ?>
                        <div class="">
							<?php
							$testimonial_author = get_field('testimonial_author', $testimonial);
							if (!$testimonial_author) {
								$testimonial_author = get_the_title($testimonial);
							}
							?>
                            <div class=""><?php echo get_field('testimonial_text', $testimonial); ?></div>
                            <p class="font-weight-200 font-family-secondary mt-4 mt-lg-10 mb-4"><?php echo $testimonial_author; ?></p>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>

		<?php if (isset($data['button']) && !empty($data['button'])) { ?>
			<div class="row">
				<div class="col-12">
					<div class="text-center">
						<?php get_template_part(
							'templates/components/button',
							null,
							[
								'type' => 'a',
								'classes' => 'btn-primary mt-8 mt-lg-12',
								'text' => $data['button']['title'],
								'link' => $data['button']['url'],
								'target' => $data['button']['target'],
								'size' => '',
								'icon' => 'icon-chevron-right',
								'icon-position' => 'right',
							]
						); ?>
					</div>
				</div>
			</div>
		<?php } ?>

    </div>
</section>
