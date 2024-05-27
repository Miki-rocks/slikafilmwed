<?php /* Template name: Style guide */ ?>
<section style="padding-top: 120px;">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="type-1 h1 mb-5">h1 Title</h1>
				<h2>h2 Title</h2>
				<h3>h3 Title</h3>
				<h4>h4 Title</h4>
				<h5>h5 Title</h5>
				<h6>h6 Title</h6>
				<p>Lorem ipsum dolor sit amet, <a href="#">consectetur adipiscing</a> elit. Donec eleifend bibendum enim, et facilisis justo iaculis in. Sed sapien ante, eleifend a pulvinar eget, porttitor in nibh. Quisque sollicitudin semper erat quis bibendum. In a leo condimentum, iaculis dui congue, laoreet dui. Nam non leo quis massa fermentum malesuada eu ac sem. Ut tincidunt ligula ex, facilisis iaculis metus convallis ut. Mauris at justo venenatis, vestibulum nulla in, tempus dui. Aliquam felis nibh, ultricies a eleifend eget, viverra ac libero. Quisque sed magna lacus. Donec ac diam vel nibh porttitor fringilla sed ut eros. Duis tincidunt mauris vitae nisl pharetra condimentum. In pulvinar eleifend fringilla. Nunc vitae mattis nisi, vitae pulvinar ligula. Quisque porttitor, ipsum id sollicitudin laoreet, metus quam suscipit diam, eget efficitur velit lacus nec erat.</p>

				<p><span class="eyebrow">Eyebrow text</span><span class="pill">Pill Text</span></p>
				<br><br><br>
				<hr>
				<br><br><br>

				<?php get_template_part(
					'templates/components/button',
					null,
					[
						'type' => 'a',
						'classes' => 'btn-primary btn-sm',
						'text' => 'Button text',
						'link' => '#link',
					]
				); ?>
				<?php get_template_part(
					'templates/components/button',
					null,
					[
						'type' => 'a',
						'classes' => 'btn-primary btn-sm hover',
						'text' => 'Button text',
						'link' => '#link',
					]
				); ?>
				<?php get_template_part(
					'templates/components/button',
					null,
					[
						'type' => 'a',
						'classes' => 'btn-primary btn-sm active',
						'text' => 'Button text',
						'link' => '#link',
					]
				); ?>
				<?php get_template_part(
					'templates/components/button',
					null,
					[
						'type' => 'a',
						'classes' => 'btn-primary btn-sm disabled',
						'text' => 'Button text',
						'link' => '#link',
					]
				); ?>

				<br><br><br>

				<?php get_template_part(
					'templates/components/button',
					null,
					[
						'type' => 'a',
						'classes' => 'btn-primary',
						'text' => 'Button text',
						'link' => '#link',
					]
				); ?>
				<?php get_template_part(
					'templates/components/button',
					null,
					[
						'type' => 'a',
						'classes' => 'btn-primary hover',
						'text' => 'Button text',
						'link' => '#link',
					]
				); ?>
				<?php get_template_part(
					'templates/components/button',
					null,
					[
						'type' => 'a',
						'classes' => 'btn-primary active',
						'text' => 'Button text',
						'link' => '#link',
					]
				); ?>
				<?php get_template_part(
					'templates/components/button',
					null,
					[
						'type' => 'a',
						'classes' => 'btn-primary disabled',
						'text' => 'Button text',
						'link' => '#link',
					]
				); ?>

				<br><br><br>
				<hr>
				<br><br><br>

				<?php get_template_part(
					'templates/components/button',
					null,
					[
						'type' => 'a',
						'classes' => 'btn-secondary btn-sm',
						'text' => 'Button text',
						'link' => '#link',
					]
				); ?>
				<?php get_template_part(
					'templates/components/button',
					null,
					[
						'type' => 'a',
						'classes' => 'btn-secondary btn-sm hover',
						'text' => 'Button text',
						'link' => '#link',
					]
				); ?>
				<?php get_template_part(
					'templates/components/button',
					null,
					[
						'type' => 'a',
						'classes' => 'btn-secondary btn-sm active',
						'text' => 'Button text',
						'link' => '#link',
					]
				); ?>
				<?php get_template_part(
					'templates/components/button',
					null,
					[
						'type' => 'a',
						'classes' => 'btn-secondary btn-sm disabled',
						'text' => 'Button text',
						'link' => '#link',
					]
				); ?>

				<br><br><br>

				<?php get_template_part(
					'templates/components/button',
					null,
					[
						'type' => 'a',
						'classes' => 'btn-secondary',
						'text' => 'Button text',
						'link' => '#link',
					]
				); ?>
				<?php get_template_part(
					'templates/components/button',
					null,
					[
						'type' => 'a',
						'classes' => 'btn-secondary hover',
						'text' => 'Button text',
						'link' => '#link',
					]
				); ?>
				<?php get_template_part(
					'templates/components/button',
					null,
					[
						'type' => 'a',
						'classes' => 'btn-secondary active',
						'text' => 'Button text',
						'link' => '#link',
					]
				); ?>
				<?php get_template_part(
					'templates/components/button',
					null,
					[
						'type' => 'a',
						'classes' => 'btn-secondary disabled',
						'text' => 'Button text',
						'link' => '#link',
					]
				); ?>

				<br><br><br>
				<hr>
				<br><br><br>

			</div>
		</div>
	</div>
</section>
