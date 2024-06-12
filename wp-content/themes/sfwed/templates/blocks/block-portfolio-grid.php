<?php
$data = get_fields();

if (isset($args) && !empty($args)) {
	$array_defaults = array(
		'title' => '',
	);

	if (isset($args) && !empty($args)) {
		$args = wp_parse_args($args, $array_defaults);
		$data = $args;
	}
}

if (!array_filter($data)) {
	return;
}

$baseClass = 'portfolio-grid';

if (is_singular('portfolio')) {
	$related = get_posts(
		array(
			'post_type' => 'portfolio',
			'category__in' => wp_get_post_categories($post->ID),
			'numberposts' => 9,
			'post__not_in' => array($post->ID),
			'orderby'    => 'date',
			'sort_order' => 'asc',
		)
	);
} else {
	$related = get_posts(
		array(
			'post_type' => 'portfolio',
			// 'category__in' => wp_get_post_categories($post->ID),
			'numberposts' => 9,
			// 'post__not_in' => array($post->ID),
			'orderby'    => 'date',
			'sort_order' => 'asc',
		)
	);
}

$portfolio_categories = get_terms( array(
    'taxonomy' => 'portfolio-category',
    'orderby' => 'count', // Order by the number of posts
    'order' => 'DESC', // Descending order
    'hide_empty' => true, // Only get categories with posts
    'object_ids' => get_posts( array(
        'post_type' => 'portfolio',
        'posts_per_page' => -1, // Get all posts
        'fields' => 'ids', // Only get post IDs
    ) ),
    // 'number' => 5, // Limit the number of categories
) );
?>

<section class="sfwed-section <?php echo $baseClass; ?> my-8 my-lg-10" <?php echo (isset($block['anchor']) && !empty($block['anchor'])) ? 'id="' . $block['anchor'] . '"' : '' ; ?>>
	<div class="container">
		<div class="row">
			<div class="col-12">

				<h2 class="<?php echo $baseClass; ?>__title text-center mb-8"><?php echo $data['title']; ?></h2>

				<?php if ( !empty( $portfolio_categories ) && !is_wp_error( $portfolio_categories ) ) { ?>
					<div class="d-flex flex-wrap justify-content-center mb-8">
						<?php foreach ( $portfolio_categories as $category ) { ?>
							<a href="<?php echo get_term_link( $category ); ?>" title="<?php echo $category->name; ?>" class="btn btn-secondary btn-sm mx-4 my-3"><?php echo $category->name; ?></a>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</div>

		<div class="row">
			<?php
			if (isset($related) && !empty($related)) { ?>
				<?php foreach ($related as $key => $post) { ?>
					<div class="col-12 col-lg-4">
					
						<?php setup_postdata($post);

						$term_links = array();
						$terms = get_the_terms( $post->ID, 'portfolio-category' );
						if ( $terms && ! is_wp_error( $terms ) ) :
							foreach ( $terms as $term ) {
								$term_links[] = $term->name;
							}
						endif;

						$args = array(
							'id' => $post->ID,
							'title' => $post->post_title,
							'text' => join( ', ', $term_links ),
							'link' => get_permalink($post->ID),
							'image_id' => get_post_thumbnail_id($post->ID),
							'color' => 'color-tertiary-1',
						);

						get_template_part('templates/cards/card-portfolio', null, $args); ?>
					</div>
				<?php } ?>
				<?php wp_reset_postdata();
			} ?>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="d-flex justify-content-center">
					<?php get_template_part(
						'templates/components/button',
						null,
						[
							'type' => 'a',
							'classes' => 'btn-primary mt-8',
							'text' => __('View portfolio', 'sfwed'),
							'link' => get_post_type_archive_link('portfolio'),
							// 'target' => '',
							'size' => '',
							'icon' => 'icon-chevron-right',
							'icon-position' => 'right',
						]
					); ?>
				</div>
			</div>
		</div>
	</div>
</section>
