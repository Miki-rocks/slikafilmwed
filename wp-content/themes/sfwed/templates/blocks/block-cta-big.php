<?php
$data = get_fields();

if (isset($args) && !empty($args)) {
	$array_defaults = array(
		'title' => '',
		'text' => '',
		'cta_title' => '',
		'button' => array(),
		'image' => '',
	);

	if (isset($args) && !empty($args)) {
		$args = wp_parse_args($args, $array_defaults);
		$data = $args;
	}
}

if (!array_filter($data)) {
	return;
}

$baseClass = 'cta-big';
?>

<section class="sfwed-section <?php echo $baseClass; ?> overflow-hidden my-8 my-lg-10 pb-12 pb-lg-12" <?php echo (isset($block['anchor']) && !empty($block['anchor'])) ? 'id="' . $block['anchor'] . '"' : '' ; ?>>

	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-6 offset-lg-1">
				<h1 class="<?php echo $baseClass; ?>__title font-size-h-xl mb-8"><?php echo $data['title']; ?></h1>
			</div>
			<div class="col-12 col-lg-8 offset-lg-2">
				<div class="<?php echo $baseClass; ?>__text font-size-b-m mb-8 mb-lg-13"><?php echo $data['text']; ?></div>
			</div>
		</div>
		<div class="row bg-el--right">
			<div class="col-12 col-lg-6">
				<div class="<?php echo $baseClass; ?>__background animateOnEnter">
					<?php echo wp_get_attachment_image($data['image'], 'full', '', ['class' => 'homepage-hero-img', 'title' => $data['cta_title']] ); ?>
				</div>
			</div>
			<div class="col-12 col-lg-5">
				<div class="d-flex flex-column h-lg-100 justify-content-lg-center">
					<h2 class="<?php echo $baseClass; ?>__cta_title text-center font-size-h-xl mt-8 mt-lg-0 mb-8"><?php echo $data['cta_title']; ?></h2>
					<?php if (isset($data['button']) && !empty($data['button'])) { ?>
						<div class="text-center">
							<?php get_template_part(
								'templates/components/button',
								null,
								[
									'type' => 'a',
									'classes' => 'btn-secondary',
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
