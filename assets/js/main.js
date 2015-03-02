$(document).ready( function() {

	$(".submit").click(function(event) {
		event.preventDefault();

		var query = $("input#query").val();

		jQuery.ajax({
			type: "POST",
			url: "index.php/homepage/form_submit",
			dataType: 'json',
			data: {query: query},

			success: function(data) {

				$('#repeat-result').html("<span class='bold light right-space'>You have searched:</span>" + data.query);

				if (data) {

				}
			}
		});
	});
});