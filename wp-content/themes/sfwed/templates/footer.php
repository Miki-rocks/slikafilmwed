<?php $site_name = get_bloginfo(); ?>
<?php $current_year = date( 'Y' ); ?>

<footer class="footer bg-blue-5 text-white py-7 py-md-6" id="site-footer">
	<div class="container">
		<div class="row">

			<div class="col-12 col-md-3">
				<div class="footer__logo-wrap d-flex h-md-100 align-items-md-center">
					<a href="<?php echo get_home_url(); ?>" class="footer__logo-wrap__logo d-block mx-auto ml-md-0 mb-5 mb-md-0"aria-label="<?php _e('Homepage', 'sfwed'); ?>">
						<?php echo sfwed_logo(); ?>
					</a>
				</div>
			</div>

			<div class="col-12 col-md-3 order-md-3">
				<div class="footer-social_icons_wrap mb-5 mb-md-0 h-md-100">
					<?php echo sfwed_social_channels_bar( false ); ?>
				</div>
			</div>

			<div class="col-12 col-md-6 order-md-2">
				<div class="footer-copyright_wrap d-md-flex h-md-100 justify-content-sm-center align-items-sm-center">
					<p class="footer-copyright_wrap-copyright text-center mb-0"><?php echo sprintf( __( 'Copyright &copy; %d <strong>%s</strong>', 'sfwed' ), $current_year, $site_name ); ?></p>
				</div>
			</div>

		</div>
	</div>
</footer>
