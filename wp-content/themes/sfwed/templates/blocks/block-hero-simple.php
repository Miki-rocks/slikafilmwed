<?php
$data = get_fields();

if (isset($args) && !empty($args)) {
	$array_defaults = array(
		'image_id' => '',
		'image_url' => '',
		'title' => '',
		'excerpt' => '',
	);

	if (isset($args) && !empty($args)) {
		$args = wp_parse_args($args, $array_defaults);
		$data = $args;
	}
}

$baseClass = 'hero-simple';
?>

<section class="sfwed-section <?php echo $baseClass; ?> pt-13 my-13" <?php echo (isset($block['anchor']) && !empty($block['anchor'])) ? 'id="' . $block['anchor'] . '"' : '' ; ?>>
	<div class="container">
		<div class="row">
			<div class="col-12">

				<div class="<?php echo $baseClass; ?>__content">
					<h1 class="<?php echo $baseClass; ?>__title font-size-h-xl <?php echo (is_singular('post')) ? 'mb-0' : 'mb-8 mb-lg-10' ; ?>">
						<?php if (isset($data['title']) && !empty($data['title'])) {
							echo $data['title'];
						} ?>
					</h1>

					<?php if (is_singular('post')) { ?>
						<?php
						$categories = get_the_category();
						if ( !empty( $categories ) ) {
							echo '<div class="post-categories ml-n5 mt-0 mb-8 mb-lg-12">';
							foreach ( $categories as $category ) {
								echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" class="btn btn-link btn-sm font-size-b-s">' . esc_html( $category->name ) . '</a> ';
							}
							echo '</div>';
						} ?>
					<?php } ?>
				</div>

				<div class="<?php echo $baseClass; ?>__background">
					<?php if (isset($data['image_id']) && !empty($data['image_id'])) {
						echo wp_get_attachment_image($data['image_id'], 'full', '', ['class' => 'homepage-hero-img', 'title' => $data['title']] );
					} ?>
				</div>

			</div>
		</div>

		<?php if (is_singular('post')) { ?>
			<div class="row">
				<div class="col-12">
					<div class="mt-10 mt-lg-12">
						<?php global $wp;
						$current_link = home_url( $wp->request );

						get_template_part(
							'templates/modules/module-social-share',
							null,
							[
								'image' => $data['image_url'],
								'title' => $data['title'],
								'excerpt' => $data['excerpt'],
								'link' => $current_link,
							]
						); ?>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</section>
