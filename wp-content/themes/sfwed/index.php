<div class="entry-content">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="content">
          <div class="wp-content">
            <?php
            if ( ! have_posts() ) :
              _e( 'Nema rezultata.', 'sfwed' );
            endif; ?>
            <?php while ( have_posts() ) :
              the_post(); ?>

              <div class="card-post">
                <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php the_post_thumbnail(); ?>
              </div>

              <?php
            endwhile;
            the_posts_navigation();
            ?>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
