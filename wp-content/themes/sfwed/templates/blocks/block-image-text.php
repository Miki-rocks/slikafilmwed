<?php
$data = get_fields();

if (isset($args) && !empty($args)) {
	$array_defaults = array(
		'order' => 'text-image',
		'title' => '',
		'image' => '',
		'button' => array(),
		'text' => '',
	);

	if (isset($args) && !empty($args)) {
		$args = wp_parse_args($args, $array_defaults);
		$data = $args;
	}
}

if (!array_filter($data)) {
	return;
}

$baseClass = 'image-text';

if (isset($data['order']) && !empty($data['order']) && $data['order'] == 'text-image') {
	$bgElementClass = 'bg-el--left light';
	$rowClass = 'flex-row-reverse';
	$col1Class = 'col-12 col-lg-6 offset-lg-1';
	$col2Class = 'col-12 col-lg-5';
} else {
	$bgElementClass = 'bg-el--right light';
	$rowClass = '';
	$col1Class = 'col-12 col-lg-6';
	$col2Class = 'col-12 col-lg-5 offset-lg-1';
}
?>

<section class="sfwed-section <?php echo $baseClass; ?> my-8 my-lg-8 py-12 py-lg-14" <?php echo (isset($block['anchor']) && !empty($block['anchor'])) ? 'id="' . $block['anchor'] . '"' : '' ; ?>>

	<div class="container">
		<div class="row <?php echo $bgElementClass . ' ' . $rowClass; ?>">
			<div class="<?php echo $col1Class; ?>">
				<div class="<?php echo $baseClass; ?>__background d-flex flex-column h-lg-100 justify-content-lg-center animateOnEnter">
					<?php echo wp_get_attachment_image($data['image'], 'full', '', ['class' => '', 'title' => $data['title']] ); ?>
				</div>
			</div>
			<div class="<?php echo $col2Class; ?>">
				<div class="d-flex flex-column h-lg-100 justify-content-lg-center">
					<h2 class="<?php echo $baseClass; ?>__title font-size-h-xl mt-8 mt-lg-0 mb-8"><?php echo $data['title']; ?></h2>
					<div class="<?php echo $baseClass; ?>__content mb-8"><?php echo $data['text']; ?></div>
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
