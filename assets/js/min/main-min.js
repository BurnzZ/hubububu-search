$(document).ready(function() {
    $(".submit").click(function(e) {
        e.preventDefault();
        var t = $("input#query").val();
        jQuery.ajax({
            type: "POST",
            url: "index.php/homepage/form_submit",
            dataType: "json",
            data: {
                query: t
            },
            success: function(e) {
                $("#repeat-result").html("<span class='bold light right-space'>You have searched:</span>" + e.query);
                var t = $("#algo-1 table tbody");
                $(t).html("");
                console.log();
                for (var a = 0; a < e.algo_1.length; a++) {
                    $(t).append("<tr><td>" + e.algo_1[a].coursedesc + "</td><td>1.0</td></tr>");
                }
                if (e) {}
            },
            error: function(e) {
                console.log(e);
            }
        });
    });
});