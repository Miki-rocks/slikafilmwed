<?php
$site_name = get_bloginfo();
$current_year = date( 'Y' );
$footer_gallery = get_field('footer_gallery', 'options');
$baseClass = 'footer';
?>

<footer class="<?php echo $baseClass; ?> position-relative text-black py-9 pt-md-13 pb-md-7" id="site-footer">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-3">
				<div class="d-lg-flex flex-lg-column h-lg-100 justify-content-lg-center">
					<h2 class="text-center text-lg-left font-family-secondary font-weight-400 font-size-h-xxs pb-5 pb-lg-11"><?php echo wp_get_nav_menu_name('footer_menu'); ?></h2>
					<nav class="pb-6 pb-lg-12">
						<ul class="list-unstyled text-center text-lg-left font-size-b-m">
							<?php
							$footer_menu = wp_nav_menu(
								[
								'theme_location' => 'footer_menu',
								'fallback_cb'    => 'notice_no_menu',
								'echo'           => false,
								'container'      => false,
								'items_wrap'     => '%3$s',
								'walker'         => new sfwed_walker( 'footer-navigation' ),
								]
							);

							echo $footer_menu;
							?>
						</ul>
					</nav>
				</div>
			</div>
			<div class="col-12 col-lg-3">
				<div class="d-lg-flex flex-lg-column h-lg-100 justify-content-lg-center">
					<h2 class="text-center text-lg-left font-family-secondary font-weight-400 font-size-h-xxs pb-5 pb-lg-11"><?php echo wp_get_nav_menu_name('footer_menu_2'); ?></h2>
					<nav class="pb-6 pb-lg-12">
						<ul class="list-unstyled text-center text-lg-left font-size-b-m">
							<?php
							$footer_menu_2 = wp_nav_menu(
								[
								'theme_location' => 'footer_menu_2',
								'fallback_cb'    => 'notice_no_menu',
								'echo'           => false,
								'container'      => false,
								'items_wrap'     => '%3$s',
								'walker'         => new sfwed_walker( 'footer-navigation' ),
								]
							);

							echo $footer_menu_2;
							?>
						</ul>
					</nav>
				</div>
			</div>
			<div class="col-12 col-lg-6">
				<?php if (isset($footer_gallery) && !empty($footer_gallery)) { ?>
					<div class="<?php echo $baseClass; ?>__gallery d-flex justify-content-space-between flex-wrap pt-10 pb-12 pt-lg-0 pb-lg-12">
						<?php foreach ($footer_gallery as $key => $image) { ?>
							<div class="<?php echo $baseClass; ?>__img-wrap position-relative overflow-hidden">
								<?php echo wp_get_attachment_image($image['ID'], 'footer', '', ['class' => $baseClass . '__img', 'title' => $image['title']] ); ?>
							</div>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="row">

			<div class="col-12">
				<div class="<?php echo $baseClass; ?>__logo-wrap d-flex justify-content-center">
					<a href="<?php echo get_home_url(); ?>" class="<?php echo $baseClass; ?>__logo-wrap__logo d-inline-block text-center mb-5 mb-md-0"aria-label="<?php _e('Homepage', 'sfwed'); ?>">
						<?php echo sfwed_logo(); ?>
					</a>
				</div>
			</div>

			<div class="col-12">
				<div class="<?php echo $baseClass; ?>-social_icons_wrap mb-5 mb-md-0">
					<?php echo sfwed_social_channels_bar( false ); ?>
				</div>
			</div>

			<div class="col-12">
				<div class="<?php echo $baseClass; ?>-copyright_wrap">
					<p class="<?php echo $baseClass; ?>-copyright_wrap-copyright font-size-b-m text-center mb-0"><?php echo sprintf( __( 'Copyright &copy; %d %s. All rights reserved.', 'sfwed' ), $current_year, $site_name ); ?></p>
					<p class="<?php echo $baseClass; ?>-copyright_wrap-copyright font-size-b-m text-center mb-8"><?php echo sprintf( __( 'Developed with passion by <a href="https://curly-code-com/" target="_blank" class="color-black">Curly Code</a>.', 'sfwed' ), $current_year, $site_name ); ?></p>
				</div>
			</div>

		</div>

		<div class="row">
			
		</div>
	</div>
</footer>
