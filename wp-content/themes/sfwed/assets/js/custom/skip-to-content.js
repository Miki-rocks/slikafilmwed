$(document).ready(function() {
	$("#skipper").click(function() {
		$('#mainContent').attr('tabIndex', -1).focus();
	})
});
