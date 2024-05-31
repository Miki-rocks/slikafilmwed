jQuery(document).ready(function($) {
	if ($('.masonry-grid').length) {
		var $grid = $('.masonry-grid').masonry({
			itemSelector: '.grid-item',
			percentPosition: true,
			columnWidth: '.grid-sizer',
		});

		// layout Masonry after each image loads
		$grid.imagesLoaded().progress(function() {
			$grid.masonry('layout');
		});

		const lg = document.getElementById('masonry-grid-lightgallery');
		const title = $('.post-title').html();

		lightGallery(lg, {
			counter: false,
			preload: 2,
			download: false,
			speed: 300,
			selector: '.grid-item',
		});

		lg.addEventListener('lgAfterOpen', () => {
			$('.lg-toolbar').append('<p class="font-size-b-l text-center font-weight-700 color-white m-0 mt-4 px-4">' + title + '</p>');
		});
	}
});
