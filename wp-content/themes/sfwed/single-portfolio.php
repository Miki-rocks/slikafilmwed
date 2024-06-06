<?php $data = get_fields(); ?>

<section class="sfwed-section pt-14 pt-lg-17">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-6">
				<h1 class="post-title mb-8"><?php the_title(); ?></h1>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-lg-7 offset-lg-1">
				<div><?php echo $data['description'] ?></div>
			</div>
		</div>
	</div>
</section>

<?php if (isset($data['gallery']) && !empty($data['gallery'])) {
	$args['gallery'] = $data['gallery'];
	$args['title'] = get_the_title();
	get_template_part('templates/blocks/block-gallery', null, $args);
} ?>

<?php
$args['title'] = __('Similar elopement experiences', 'sfwed');
get_template_part('templates/blocks/block-portfolio-grid', null, $args);
?>
