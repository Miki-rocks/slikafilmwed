<?php
// Setup defaults
$array_defaults = array(
	'id' => '',
	'title' => '',
	'text' => '',
	'link' => '',
	'image_id' => '',
	'color' => 'color-tertiary-1', // all the classes for title
	'classes' => '',
);

$args = wp_parse_args($args, $array_defaults);

$baseClass = 'card-portfolio';

$imgSize = 'card-sm';
if ($args['classes'] == 'post') {
	$imgSize = 'card-vertical';
}
?>

<div class="<?php echo $baseClass . ' ' . $args['classes']; ?> h-100 position-relative pb-7">
	<div>
		<div class="<?php echo $baseClass; ?>__image position-image__wrap position-relative overflow-hidden">
			<?php echo wp_get_attachment_image($args['image_id'], $imgSize, '', ['class' => 'position-image__wrap__image', 'title' => $args['title']]); ?>
		</div>
	</div>
	<a href="<?php echo $args['link']; ?>" aria-label="<?php echo $args['title']; ?>" class="<?php echo $baseClass; ?>__link stretched-link font-size-h-m d-flex justify-content-center mt-3 <?php echo $args['color']; ?>"><?php echo $args['title']; ?></a>
	<?php if (isset($args['text']) && !empty($args['text'])) { ?>
		<p class="<?php echo $baseClass; ?>__text <?php echo $args['color']; ?> font-size-b-s text-center"><?php echo $args['text']; ?></p>
	<?php } ?>
</div>
