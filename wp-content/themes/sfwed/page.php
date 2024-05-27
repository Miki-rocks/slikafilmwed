<div class="entry-content">
  <div class="wp-content">
    <?php
    if ( ! have_posts() ) :
      _e( 'Nothing to display here', 'nsk' );
    endif; ?>
    <?php while ( have_posts() ) :
      the_post(); ?>

      <div class="post-content">
        <?php the_content(); ?>
      </div>

      <?php
    endwhile;
    the_posts_navigation();
    ?>
  </div>
</div>
