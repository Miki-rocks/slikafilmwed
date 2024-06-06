<?php
if ( is_post_type_archive( 'portfolio' ) ) {
    // Custom logic for Portfolio post type archive
    $page_title = 'Portfolio';
	$taxonomy = 'portfolio-category';
    $args = array(
        'post_type' => 'portfolio',
        'posts_per_page' => -1,
    );
	$bottomCtaLink = '/contact-us';
	$bottomCtaText = __('Get in touch', 'sfwed');
	$additionalCardClass = '';
} elseif (is_home()) {
    // Custom logic for Post post type archive
    $page_title = 'Stories';
	$taxonomy = 'category';
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
    );
	$bottomCtaLink = '/contact-us';
	$bottomCtaText = __('Get in touch', 'sfwed');
	$additionalCardClass = 'post';
} elseif ( is_category() ) {
    // Custom logic for Category taxonomy
    $page_title = "Story: " . single_cat_title( '', false );
	$taxonomy = 'category';
    $args = array(
        'category_name' => single_cat_title('', false),
        'posts_per_page' => -1,
    );
	$bottomCtaLink = get_post_type_archive_link('post');
	$bottomCtaText = __('View all stories', 'sfwed');
	$additionalCardClass = 'post';
} elseif ( is_tax( 'portfolio-category' ) ) {
    // Custom logic for Portfolio Category custom taxonomy
    $page_title = "Portfolio: " . single_term_title( '', false );
	$taxonomy = 'portfolio-category';
    $args = array(
        'post_type' => 'portfolio',
        'tax_query' => array(
            array(
                'taxonomy' => 'portfolio-category',
                'field' => 'slug',
                'terms' => single_term_title('', false),
            ),
        ),
        'posts_per_page' => -1,
    );
	$bottomCtaLink = get_post_type_archive_link('portfolio');
	$bottomCtaText = __('View portfolio', 'sfwed');
	$additionalCardClass = '';
} elseif ( is_tag() ) {
    // Custom logic for Tag taxonomy
    $page_title = "Tag: " . single_tag_title( '', false );
	$taxonomy = 'post_tag';
    $args = array(
		'post_type' => 'post',
        'tag' => get_query_var('tag'),
        'posts_per_page' => -1,
    );
	$bottomCtaLink = get_post_type_archive_link('post');
	$bottomCtaText = __('View all stories', 'sfwed');
	$additionalCardClass = 'post';
} else {
    // Default logic for other cases
    $page_title = 'Archive';
	$taxonomy = 'category';
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
    );
	$bottomCtaLink = '/contact-us';
	$bottomCtaText = __('Get in touch', 'sfwed');
	$additionalCardClass = 'post';
}
$all_query = new WP_Query( $args );

$postType = get_post_type();
$taxonomies = get_terms( array(
    'taxonomy' => $taxonomy,
    'orderby' => 'count', // Order by the number of posts
    'order' => 'DESC', // Descending order
    'hide_empty' => true, // Only get categories with posts
    'object_ids' => get_posts( array(
        'post_type' => $postType,
        'posts_per_page' => -1, // Get all posts
        'fields' => 'ids', // Only get post IDs
    ) ),
    // 'number' => -1, // Limit the number of categories
) );
?>

<div class="overflow-hidden">
	<section class="sfwed-section mt-17 mb-8">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div>
						<h1 class=""><?php echo $page_title; ?></h1>

						<?php if ( !empty( $taxonomies ) && !is_wp_error( $taxonomies ) ) { ?>
							<div class="d-flex flex-wrap justify-content-start mt-8 mb-8 mx-n4">
								<?php foreach ( $taxonomies as $category ) { ?>
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
	if ( $all_query->have_posts() ) : ?>

		<?php if ($additionalCardClass == 'post') {
			$rowClass = 'row no-gutters';
			$colClass = 'col-12 col-lg-3';
		} else {
			$rowClass = 'row';
			$colClass = 'col-12 col-lg-4';
		} ?>

		<section class="sfwed-section archive-grid position-relative animateOnEnter my-12">
			<div class="container">
				<div class="<?php echo $rowClass; ?>">
					<?php // Start the Loop
					while ( $all_query->have_posts() ) : $all_query->the_post(); ?>

						

						<div class="<?php echo $colClass; ?>">
							<?php
							$post_id = get_the_ID();

							$term_links = array();
							$terms = get_the_terms( get_the_ID(), $taxonomy );
							if ( $terms && ! is_wp_error( $terms ) ) :
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
								'classes' => $additionalCardClass,
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
		<p><?php _e( 'No posts found.', 'sfwed' ); ?></p>
	<?php endif; ?>

	<section class="sfwed my-12">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="d-flex justify-content-center">
						<?php get_template_part(
							'templates/components/button',
							null,
							[
								'type' => 'a',
								'classes' => 'btn-primary',
								'text' => $bottomCtaText,
								'link' => $bottomCtaLink,
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
</div>
