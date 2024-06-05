<?php
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
    // 'number' => -1, // Limit the number of categories
) );

$term = get_queried_object();
if (is_category()) {
	$page_title = $term->name;
	$category_id = $term->term_id;

	// Custom query to get all portfolio posts
	$args = array(
		'post_type' => 'portfolio',
		'posts_per_page' => -1, // Retrieve all posts
		'tax' => $category_id,
	);
} else {
	$page_title = $term->label;

	// Custom query to get all portfolio posts
	$args = array(
		'post_type' => 'portfolio',
		'posts_per_page' => -1, // Retrieve all posts
	);
}

$portfolio_query = new WP_Query( $args );
?>

<section class="sfwed-section mt-17 mb-8">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div>
					<h1 class=""><?php echo $page_title; ?></h1>

					<?php if ( !empty( $portfolio_categories ) && !is_wp_error( $portfolio_categories ) ) { ?>
						<div class="d-flex flex-wrap justify-content-start mt-8 mb-8 mx-n4">
							<?php foreach ( $portfolio_categories as $category ) { ?>
								<a href="<?php echo get_term_link( $category ); ?>" title="<?php echo $category->name; ?>" class="btn btn-secondary btn-sm mx-4 my-3"><?php echo $category->name; ?></a>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
// Check if there are any posts
if ( $portfolio_query->have_posts() ) : ?>
	<section class="sfwed-section my-12">
		<div class="container">
			<div class="row">
				<?php // Start the Loop
				while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post(); ?>
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
				<?php endwhile;
				// Reset post data
				wp_reset_postdata(); ?>
			</div>
		</div>
	</section>
<?php else : ?>
	<p><?php _e( 'No portfolio items found.', 'sfwed' ); ?></p>
<?php endif; ?>


<?php  ?>

<section class="sfwed my-12">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="d-flex justify-content-center">
					<?php if (is_category()) {
						get_template_part(
							'templates/components/button',
							null,
							[
								'type' => 'a',
								'classes' => 'btn-primary',
								'text' => __('View all stories', 'sfwed'),
								'link' => get_post_type_archive_link('portfolio'),
								// 'target' => '',
								'size' => '',
								'icon' => 'icon-chevron-right',
								'icon-position' => 'right',
							]
						);
					} else {
						get_template_part(
							'templates/components/button',
							null,
							[
								'type' => 'a',
								'classes' => 'btn-primary',
								'text' => __('Get in touch', 'sfwed'),
								'link' => '/contact-us',
								// 'target' => '',
								'size' => '',
								'icon' => 'icon-chevron-right',
								'icon-position' => 'right',
							]
						);
					} ?>
				</div>
			</div>
		</div>
	</div>
</section>
