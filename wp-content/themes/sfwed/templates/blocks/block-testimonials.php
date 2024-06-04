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

				<?php if (isset($data['testimonials']) && !empty($data['testimonials'])) { ?>
					<div>
						<pre><?php print_r($data); ?></pre>
					</div>
				<?php } ?>

			</div>
		</div>

		<div class="row">
			<div class="col-12 col-lg-6 order-lg-2">
				fotke
			</div>
			<div class="col-12 col-lg-6 order-lg-1">
				text
			</div>
		</div>
	</div>
</section>
