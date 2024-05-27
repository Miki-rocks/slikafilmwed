$(document).ready(function() {
	var width   = 981;
	var height  = 461;
	var left    = (screen.width / 2) - (width / 2);
	var top     = (screen.height / 2) - (height / 2);
	$('.js-share-link').click(function(e) {
		e.preventDefault();
		window.open(
		$(this).attr('href'),
		'',
		'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,width=' + width + ',height=' + height + ',top=' + top + ',left=' + left
		);
	});
});
