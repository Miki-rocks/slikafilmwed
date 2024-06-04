<?php
// Setup defaults
$array_defaults = array(
	'type' => 'a',
	'button-type' => '',
	'classes' => 'btn-primary', // btn is included
	'text-align' => 'align-items-center justify-content-center',
	'id' => '',
	'link' => '#',
	'icon' => false,
	'icon-position' => 'left',
	'size' => '', // sm or lg, md is defauld, no needed
	'text' => 'Click me',
	'target' => '_self',
	'rel' => '',
	'other-data-attributes' => '',
);


$args = wp_parse_args($args, $array_defaults);

$baseClass = esc_html($args['classes']);

$type = '';

if ($args['type'] == 'button') {
	$type = 'type="button"';
}

if (!empty($args['button-type'])) {
	$type = 'type="' . $args['button-type'] . '"';
}
?>

<<?php echo $args['type']; ?> <?php echo ( $args['type'] == 'button' ) ? 'title="' . $args['text'] . '"' : '' ; ?> <?php echo $type; echo ( $args['id'] != '' ) ? ' id="' . $args['id'] . '" ' : ' ' ; echo ($args['type'] == 'a') ? 'href="' . $args['link'] . '"' : ''; ?> class="btn <?php echo $args['classes']; ?> btn-<?php echo $args['size']; ?> <?php echo ($args['icon']) ? 'btn-icon' : ''; ?> <?php echo $args['text-align']; ?>" <?php echo ($args['type'] == 'a') ? ($args['target'] == '_self') ? '' : 'target="' . $args['target'] . '"' : ''; ?> <?php echo ($args['type'] == 'a') ?  ($args['rel'] != '') ? 'rel="' . $args['rel'] . '"' : '' : ''; ?> <?php echo $args['other-data-attributes'] ?>>
	<?php if ($args['icon-position'] == 'left') { ?>
		<?php if ($args['icon']) { ?>
			<span class="icon mr-3 d-flex"><?php echo sfwed_render_svg($args['icon'], 'icons'); ?></span>
		<?php } ?>
		<span class="text"><?php printf('%s', esc_html__($args['text'], 'sfwed')); ?></span>
	<?php } else { ?>
		<span class="text"><?php printf('%s', esc_html__($args['text'], 'sfwed')); ?></span>
		<?php if ($args['icon']) { ?>
			<span class="icon ml-3 d-flex"><?php echo sfwed_render_svg($args['icon'], 'icons'); ?></span>
		<?php } ?>
	<?php } ?>
</<?php echo $args['type']; ?>>
