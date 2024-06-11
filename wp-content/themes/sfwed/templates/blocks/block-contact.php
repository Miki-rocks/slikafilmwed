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

$baseClass = 'contact';
?>
<pre style="padding-top: 200px;"><?php // print_r($data); ?></pre>
<section class="sfwed-section <?php echo $baseClass; ?> overflow-hidden my-8 my-lg-10 pb-12 pb-lg-12" <?php echo (isset($block['anchor']) && !empty($block['anchor'])) ? 'id="' . $block['anchor'] . '"' : '' ; ?>>

	<div class="<?php echo $baseClass; ?>__background animateOnEnter">
		<?php echo wp_get_attachment_image($data['hero_image'], 'full', '', ['class' => '', 'title' => 'Contact hero image'] ); ?>
	</div>

	<div class="container">
		<div class="row bg-el--right wide light">
			<div class="col-12 col-lg-4 col-xl-3 offset-lg-1">
				<p class="<?php echo $baseClass; ?>__small_title font-size-h-xxs mb-4"><?php echo $data['small_title']; ?></p>
				<h1 class="<?php echo $baseClass; ?>__title font-size-h-xl mb-8"><?php echo $data['title']; ?></h1>
				<div class="<?php echo $baseClass; ?>__text font-size-b-m mb-8 mb-lg-15"><?php echo $data['text']; ?></div>
			</div>
			<div class="col-12 col-lg-5 offset-lg-1">
				<div class="mx-n4">
					<?php echo do_shortcode($data['contact_form_shortcode']); ?>
				</div>
			</div>
		</div>
	</div>
</section>
