<div class="social_channels d-flex flex-column h-100 justify-content-center align-self-md-end">
	<div class="social_channels-icons_wrap d-flex flex-wrap justify-content-center justify-content-md-end">

		<?php if ( get_field( 'facebook_profile_url', 'options' ) ) : ?>
			<div class="social_channels-icons_wrap-icon">
				<a href="<?php the_field( 'facebook_profile_url', 'options' ); ?>" class="social_channels-icons_wrap-icon-link social_channels-facebook d-block" target="_blank"aria-label="<?php _e('Facebook', 'sfwed'); ?>">
					<div class="social_channels-icons_wrap-back d-flex justify-content-center align-items-center">
						<?php echo sfwed_render_svg( 'icon-facebook', 'icons' ); ?>
					</div>
				</a>
			</div>
		<?php endif; ?>

		<?php /* if ( get_field( 'youtube_profile_url', 'options' ) ) : ?>
			<div class="social_channels-icons_wrap-icon">
				<a href="<?php the_field( 'youtube_profile_url', 'options' ); ?>" class="social_channels-icons_wrap-icon-link social_channels-youtube d-block" target="_blank">
					<div class="social_channels-icons_wrap-back d-flex justify-content-center align-items-center">
						<?php echo sfwed_render_svg( 'icon-youtube', 'icons' ); ?>
					</div>
				</a>
			</div>
		<?php endif; */ ?>

		<?php if ( get_field( 'linkedin_profile_url', 'options' ) ) : ?>
			<div class="social_channels-icons_wrap-icon">
				<a href="<?php the_field( 'linkedin_profile_url', 'options' ); ?>" class="social_channels-icons_wrap-icon-link social_channels-linkedin d-block" target="_blank"aria-label="<?php _e('LinkedIn', 'sfwed'); ?>">
					<div class="social_channels-icons_wrap-back d-flex justify-content-center align-items-center">
						<?php echo sfwed_render_svg( 'icon-linkedin', 'icons' ); ?>
					</div>
				</a>
			</div>
		<?php endif; ?>

		<?php /* if ( get_field( 'instagram_profile_url', 'options' ) ) : ?>
			<div class="social_channels-icons_wrap-icon">
				<a href="<?php the_field( 'instagram_profile_url', 'options' ); ?>" class="social_channels-icons_wrap-icon-link social_channels-instagram d-block" target="_blank">
					<div class="social_channels-icons_wrap-back d-flex justify-content-center align-items-center">
						<?php echo sfwed_render_svg( 'icon-instagram', 'icons' ); ?>
					</div>
				</a>
			</div>
		<?php endif; */ ?>

	</div>
</div>
