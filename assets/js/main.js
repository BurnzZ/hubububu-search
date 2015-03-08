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

				console.log(data);

				$('#repeat-result').html("<span class='bold light right-space'>You have searched:</span>" + data.query);

					console.log(jQuery.type( data.algo_1 ));
				if ( jQuery.type( data.algo_1 ) === "object") {
					/* Populate Algo 1 Results */
					
					var algo_1 = $('#algo-1 table tbody');
					$(algo_1).html("");

					$('#algo-1 .num-results').html("Number of results: " + data.algo_1.string.length);

					for (var i=0; i<data.algo_1.string.length; i++) {
						$(algo_1).append("<tr><td>" + data.algo_1.string[i] + "</td><td>" + data.algo_1.score[i] + "</td></tr>");
					}
				}

				else{
					$('#algo-1 .num-results').html("Number of results: 0");
				}

				if ( jQuery.type( data.algo_2 ) === "object") {
					/* Populate Algo 2 Results */

					var algo_2 = $('#algo-2 table tbody');
					$(algo_2).html("");

					$('#algo-2 .num-results').html("Number of results: " + data.algo_2.string.length);

					for (var i=0; i<data.algo_2.string.length; i++) {
						$(algo_2).append("<tr><td>" + data.algo_2.string[i] + "</td><td>" + data.algo_2.score[i] + "</td></tr>");
					}

				}
				else{
					$('#algo-2 .num-results').html("Number of results: 0");
				}
			},
			error: function(err) {
				console.log(err);
			}
		});
	});
});