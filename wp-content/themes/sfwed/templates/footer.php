<?php $site_name = get_bloginfo(); ?>
<?php $current_year = date( 'Y' ); ?>

<footer class="footer bg-secondary-1 text-black py-7 py-md-6" id="site-footer">
	<div class="container">
		<div class="row">

			<div class="col-12">
				<div class="footer__logo-wrap d-flex justify-content-center">
					<a href="<?php echo get_home_url(); ?>" class="footer__logo-wrap__logo d-inline-block text-center mb-5 mb-md-0"aria-label="<?php _e('Homepage', 'sfwed'); ?>">
						<?php echo sfwed_logo(); ?>
					</a>
				</div>
			</div>

			<div class="col-12">
				<div class="footer-social_icons_wrap mb-5 mb-md-0">
					<?php echo sfwed_social_channels_bar( false ); ?>
				</div>
			</div>

			<div class="col-12">
				<div class="footer-copyright_wrap">
					<p class="footer-copyright_wrap-copyright font-size-b-s text-center mb-0"><?php echo sprintf( __( 'Copyright &copy; %d %s. All rights reserved.', 'sfwed' ), $current_year, $site_name ); ?></p>
					<p class="footer-copyright_wrap-copyright font-size-b-s text-center mb-8"><?php echo sprintf( __( 'Developed with passion by <a href="https://curly-code-com/" target="_blank" class="color-black">Curly Code</a>.', 'sfwed' ), $current_year, $site_name ); ?></p>
				</div>
			</div>

		</div>

		<div class="row">
			
		</div>
	</div>
</footer>
