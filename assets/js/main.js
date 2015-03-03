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

				console.log(data.algo_1);

				$('#repeat-result').html("<span class='bold light right-space'>You have searched:</span>" + data.query);

				if (data) {
					var algo_1 = $('#algo-1 table tbody');
					$(algo_1).html("");

					$('#algo-1 .num-results').html("Number of results: " + data.algo_1.length);

					for (var i=0; i<data.algo_1.length; i++) {
						$(algo_1).append("<tr><td>" + data.algo_1[i].coursedesc + "</td><td>1.0</td></tr>");
					}

				}

				if (data.algo_1.length == 0)
					$('#algo-1 .num-results').html("");
				
			},
			error: function(err) {
				console.log(err);
			}
		});
	});
});