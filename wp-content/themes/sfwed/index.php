<?php
if (is_category()) {
	get_template_part('archive-portfolio');
} else {
	$post_categories = get_terms( array(
		'taxonomy' => 'category',
		'orderby' => 'count', // Order by the number of posts
		'order' => 'DESC', // Descending order
		'hide_empty' => true, // Only get categories with posts
		'object_ids' => get_posts( array(
			'post_type' => 'post',
			'posts_per_page' => -1, // Get all posts
			'fields' => 'ids', // Only get post IDs
		) ),
		// 'number' => -1, // Limit the number of categories
	) );

	$term = get_queried_object();
	if (isset($term->name) && !empty($term->name)) {
		$page_title = $term->name;
	} elseif (isset($term->post_title) && !empty($term->post_title)) {
		$page_title = $term->post_title;
	} else {
		$page_title = $term->label;
	}
	?>
	<section class="sfwed-section mt-17 mb-8">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div>
						<h1 class=""><?php echo $page_title; ?></h1>

						<?php if ( !empty( $post_categories ) && !is_wp_error( $post_categories ) ) { ?>
							<div class="d-flex flex-wrap justify-content-start mt-8 mb-8 mx-n4">
								<?php foreach ( $post_categories as $category ) { ?>
									<a href="<?php echo get_term_link( $category ); ?>" title="<?php echo $category->name; ?>" class="btn btn-secondary btn-sm mx-4 my-3"><?php echo $category->name; ?></a>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="sfwed-section my-12">
		<div class="container">
			<div class="row">
				<?php
				if ( ! have_posts() ) :
					_e( 'Nema rezultata.', 'sfwed' );
				endif; ?>
				<?php while ( have_posts() ) :
					the_post(); ?>

					<div class="col-12 col-lg-4">
						<?php
						$post_id = get_the_ID();

						$terms = get_the_terms( get_the_ID(), 'category' );
						if ( $terms && ! is_wp_error( $terms ) ) :
							$term_links = array();
							foreach ( $terms as $term ) {
								$term_links[] = $term->name;
							}
						endif;

						$args = array(
							'id' => $post_id,
							'title' => get_the_title($post_id),
							'link' => get_permalink($post_id),
							'text' => join( ', ', $term_links ),
							'image_id' => get_post_thumbnail_id($post_id),
							'color' => 'color-tertiary-1',
						);

						get_template_part('templates/cards/card-portfolio', null, $args); ?>
					</div>

					<?php
				endwhile;
				the_posts_navigation();
				?>
			</div>
		</div>
	</section>
<?php } ?>
