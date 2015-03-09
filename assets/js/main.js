/**
*	@results - data
*	@id 	 - id of container
*/
function populate(result, id) {
	$(id + ' table tbody').html("");

	$(id + ' .num-results').html("Number of results: " + result.string.length);

	for (var i=0; i<result.string.length; i++) {
		$(id + ' table tbody').append("<tr><td>" + result.string[i] + "</td><td>" + result.score[i] + "</td></tr>");
	}
}

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


				// no results
				if ( data.algo_1 === undefined) {
					$('#results-container > div .num-results').html("Number of results: 0");
					$('#results-container > div table tbody').html("");
					return;
				}

				var words=data.query.split(" ");

				for(var j=0; j<words.length; j++){
					for (var k=0; k<data.algo_1.string.length; k++) {
						data.algo_1.string[k]=data.algo_1.string[k].replace(words[j], "<span class='bold'>"+words[j]+"</span>")
					}
					for (var k=0; k<data.algo_2.string.length; k++) {
						data.algo_2.string[k]=data.algo_2.string[k].replace(words[j], "<span class='bold'>"+words[j]+"</span>")
					}
				}

				populate(data.algo_1, '#algo-1');
				populate(data.algo_2, '#algo-2');
			},
			error: function(err) {
				console.log(err);
			}
		});
	});
});