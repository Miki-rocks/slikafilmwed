$('.wpcf7-form .custom-control .custom-control-label').on('click', function() {
	$('.wpcf7-acceptance > .wpcf7-list-item > label').click();
	$('.sfwed_custom_submit').toggleClass('disabled');
})

document.addEventListener( 'wpcf7mailsent', function( event ) {
	setTimeout(() => {
		location = '/thank-you';
	}, 2000);
}, false );
