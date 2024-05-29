<?php $baseClass = "header"; ?>
<header class="<?php echo $baseClass; ?> header__settings">
  <div class="container-fluid">
    <div class="row justify-content-between justify-content-xl-center">
      <div class="col-0 col-lg-5 d-none d-lg-flex justify-content-end">
        <div class="site-navigation d-flex flex-column justify-content-lg-center">
          <nav class="d-flex flex-column flex-lg-row align-items-lg-center w-100 h-100 h-lg-auto">
            <ul class="site-navigation-list d-flex flex-column flex-lg-row justify-content-start align-items-lg-center list-unstyled mb-lg-0 px-3 px-lg-0">
              <?php
              $top_menu = wp_nav_menu(
                [
                  'theme_location' => 'primary_navigation_l',
                  'fallback_cb'    => 'notice_no_menu',
                  'echo'           => false,
                  'container'      => false,
                  'items_wrap'     => '%3$s',
                  'walker'         => new sfwed_walker( 'primary-navigation' ),
                ]
              );

              echo $top_menu;
              ?>
            </ul>
          </nav>
        </div>
      </div>
      <div class="col-10 col-lg-2 col-xl-1 px-lg-0">
        <div class="<?php echo $baseClass; ?>-logo_wrap">
          <a href="<?php echo get_home_url(); ?>" class="<?php echo $baseClass; ?>-logo_wrap-logo d-block py-4 py-lg-5" aria-label="<?php _e('Homepage', 'sfwed'); ?>">
            <span class="<?php echo $baseClass; ?>-logo_wrap-logo-inner_wrap text-lg-center">
              <?php echo sfwed_logo(); ?>
            </span>
          </a>
        </div>
      </div>
      <div class="col-2 col-lg-5 d-flex justify-content-start">
        <div class="site-navigation d-flex flex-column justify-content-lg-center">
          <div class="<?php echo $baseClass; ?>-logo_wrap px-4 d-lg-none">
            <a href="<?php echo get_home_url(); ?>" class="<?php echo $baseClass; ?>-logo_wrap-logo d-block py-4 py-lg-5" aria-label="<?php _e('Homepage', 'sfwed'); ?>">
              <span class="<?php echo $baseClass; ?>-logo_wrap-logo-inner_wrap">
                <?php echo sfwed_logo(); ?>
              </span>
            </a>
          </div>
          <nav class="d-flex flex-column flex-lg-row align-items-lg-center w-100 h-100 h-lg-auto">
            <ul class="site-navigation-list d-flex d-lg-none flex-column flex-lg-row justify-content-start align-items-lg-center list-unstyled mb-lg-0 px-3 px-lg-0">
              <?php
              $top_menu = wp_nav_menu(
                [
                  'theme_location' => 'primary_navigation_l',
                  'fallback_cb'    => 'notice_no_menu',
                  'echo'           => false,
                  'container'      => false,
                  'items_wrap'     => '%3$s',
                  'walker'         => new sfwed_walker( 'primary-navigation' ),
                ]
              );

              echo $top_menu;
              ?>
            </ul>
            <ul class="site-navigation-list d-flex flex-column flex-lg-row justify-content-start align-items-lg-center list-unstyled mb-lg-0 px-3 px-lg-0">
              <?php
              $top_menu = wp_nav_menu(
                [
                  'theme_location' => 'primary_navigation_r',
                  'fallback_cb'    => 'notice_no_menu',
                  'echo'           => false,
                  'container'      => false,
                  'items_wrap'     => '%3$s',
                  'walker'         => new sfwed_walker( 'primary-navigation' ),
                ]
              );

              echo $top_menu;
              ?>
            </ul>
          </nav>
        </div>
        <div class="navbar-mobile_close_btn d-flex d-lg-none h-100 align-items-center">
          <button class="navbar-toggler btn-navbar" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="navbar-toggler-icon">
              <div class="nav-icon">
                <div class="nav-icon-line"></div>
              </div>
            </div>
          </button>
        </div>
      </div>
    </div>
  </div>
</header>
