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

				var algo_1 = $('#algo-1 table tbody');
				$(algo_1).html("");

				console.log();

				for (var i=0; i<data.algo_1.length; i++) {
					$(algo_1).append("<tr><td>" + data.algo_1[i].coursedesc + "</td><td>1.0</td></tr>");
				}


				if (data) {

				}
			},
			error: function(err) {
				console.log(err);
			}
		});
	});
});