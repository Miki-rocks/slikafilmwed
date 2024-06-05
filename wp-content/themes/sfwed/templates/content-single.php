<?php while ( have_posts() ) : the_post(); ?>

<?php
$share_post_title = get_the_title();
$share_img = get_the_post_thumbnail_url( get_the_id(), 'hero-hd' );
$share_img_id = get_post_thumbnail_id();
$share_excerpt = get_the_excerpt();
?>

<section class="single_content">
	
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-8">
				
				<article>
					<?php if (is_singular('post')) {
						get_template_part(
							'templates/blocks/block-hero-simple',
							null,
							[
								'image_id' => $share_img_id,
								'image_url' => $share_img,
								'title' => $share_post_title,
								'excerpt' => $share_excerpt,
							]
						);
					} ?>

					<?php the_content(); ?>
				</article>

				<?php 
                $post_tags = get_the_tags();
                if ($post_tags) : ?>
                    <div class="tag-cloud">
                        <h3 class="font-size-h-s mb-4"><?php _e('Similar by tags', 'sfwed'); ?></h3>
                        <?php foreach($post_tags as $tag) : ?>
                            <a href="<?php echo get_tag_link($tag->term_id); ?>" class="tag-link-<?php echo $tag->term_id; ?> btn btn-primary btn-sm" title="<?php echo $tag->name; ?>">
                                <?php echo $tag->name; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

				<div class="my-8 my-lg-13">
					<div class="horizontal-brake mb-13"></div>
					<div class="post-prev-next-nav d-flex flex-column flex-lg-row justify-content-between">
						<div class="">
							<?php 
							$prev_post = get_previous_post();
							if (!empty($prev_post)): ?>
								<a href="<?php echo get_permalink($prev_post->ID); ?>" class="d-flex flex-column text-center text-lg-left mb-8 mb-lg-0">
									<span class="post-prev-next-nav-label font-size-b-s">Older post:</span>
									<span class="post-prev-next-nav-title font-size-b-xl"><?php echo get_the_title($prev_post->ID); ?></span>
								</a>
							<?php endif; ?>
						</div>
						<div class="">
							<?php 
							$next_post = get_next_post();
							if (!empty($next_post)): ?>
								<a href="<?php echo get_permalink($next_post->ID); ?>" class="d-flex flex-column text-center text-lg-right">
									<span class="post-prev-next-nav-label font-size-b-s">Newer post:</span>
									<span class="post-prev-next-nav-title font-size-b-xl"><?php echo get_the_title($next_post->ID); ?></span>
								</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-3 offset-lg-1">
				<div class="position-sticky pt-13 my-13">
					<div class="related-posts">
						<h3 class="font-size-h-m mb-4 mb-lg-8"><?php _e('More love', 'sfwed'); ?></h3>
						<?php
						// Get the current post ID
						$post_id = get_the_ID();

						// Get categories or tags of the current post
						$categories = wp_get_post_categories( $post_id );

						// Set up the query arguments
						$args = array(
							'post__not_in' => array( $post_id ),
							'posts_per_page' => 5, // Number of related posts to display
							'ignore_sticky_posts' => 1,
							'orderby' => 'date', // Random order
							'tax_query' => array(
								'relation' => 'OR',
								array(
									'taxonomy' => 'category',
									'field'    => 'term_id',
									'terms'    => $categories,
								)
							),
						);

						// The Query
						$related_posts = new WP_Query( $args );

						// The Loop
						if ( $related_posts->have_posts() ) {
							while ( $related_posts->have_posts() ) {
								$related_posts->the_post();

								$args = array(
									'id' => $post_id,
									'title' => get_the_title($post_id),
									'link' => get_permalink($post_id),
									// 'text' => join( ', ', $term_links ),
									'image_id' => get_post_thumbnail_id($post_id),
									'color' => 'color-tertiary-1',
								);
		
								get_template_part('templates/cards/card-portfolio', null, $args);
							}
						}

						// Restore original Post Data
						wp_reset_postdata();
						?>
					</div><!-- .related-posts -->
				</div>
			</div>
		</div>
	</div>

</section>


<?php endwhile; ?>
