<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part( 'templates/head' ); ?>
  <body <?php body_class(); ?>>
    <?php if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) { gtm4wp_the_gtm_tag(); } ?>
    <?php if (!class_exists('ACF')) {
      echo '<h2>Please activate ACF</h2></body></html>';
      return;
    } ?>
    <div class="site">
      <div id="skiptocontent"> 
        <a href="#mainContent" tabindex="0" id="skipper" data-toggle="scroll-to"><?php _e('Skip to main content', 'sfwed') ?></a>
      </div>

      <?php get_template_part( 'templates/header' ); ?>
      <div class="site-content" id="mainContent">
        <?php require wrapper_template_path(); ?>
      </div>

      <?php
      get_template_part( 'templates/footer' );
      wp_footer();
      ?>
    </div>
  </body>
</html>
