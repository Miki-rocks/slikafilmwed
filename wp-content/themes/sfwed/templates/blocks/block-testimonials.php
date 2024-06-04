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

        <div class="row">
            
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
					<button class="<?php echo $baseClass; ?>__arrow prevArrow"><</button>
					<button class="<?php echo $baseClass; ?>__arrow nextArrow">></button>
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
                            <p class="mb-0"><?php echo $testimonial_author; ?></p>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>

    </div>
</section>
