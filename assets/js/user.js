$(document).ready(function() {

	// Typeahead for username.
	$('.username-typeahead').typeahead({
		'source': config.base_url + 'user/typeahead',
		'minLength': 3
	});

	$('#avatar-type').change(function() {
		// Display the correct avatar "view".
		$('.avatar').addClass('hidden');
		$('#avatar-' + $(this).val()).removeClass('hidden');
	});

});