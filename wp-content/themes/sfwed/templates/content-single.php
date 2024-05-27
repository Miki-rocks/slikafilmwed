<?php while ( have_posts() ) : the_post(); ?>

<?php
$share_post_title = get_the_title();
$share_img = get_the_post_thumbnail_url( get_the_id(), 'hero-hd' );
$share_excerpt = get_the_excerpt();
?>

<section class="single_content" style="overflow: hidden;">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-10 offset-lg-1">
				<div class="container">
					<div class="row">
						<div class="col-12 col-lg-10 offset-lg-1 mt-3">

							<?php the_content(); ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<?php endwhile; ?>
