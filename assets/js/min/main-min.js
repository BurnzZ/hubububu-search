$(document).ready(function() {
    $(".submit").click(function(e) {
        e.preventDefault();
        var o = $("input#query").val();
        jQuery.ajax({
            type: "POST",
            url: "index.php/homepage/form_submit",
            dataType: "json",
            data: {
                query: o
            },
            success: function(e) {
                console.log(e.algo_1);
            },
            error: function(e) {
                console.log(e);
            }
        });
    });
});