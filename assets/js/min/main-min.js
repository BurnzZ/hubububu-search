$(document).ready(function() {
    $(".submit").click(function(e) {
        e.preventDefault();
        var a = $("input#query").val();
        jQuery.ajax({
            type: "POST",
            url: "index.php/homepage/form_submit",
            dataType: "json",
            data: {
                query: a
            },
            success: function(e) {
                $("#repeat-result").html("<span class='bold light right-space'>You have searched:</span>" + e.query);
                if (e) {}
            }
        });
    });
});