$(document).ready(function() {

    $.ajax({
        url: "http://127.0.0.1:8000/api/contact-information",
        type: "get",
        success: function(resp)
        {
            var address = resp.data;

            $("#address").html(address['address'])
            $("#phone").html(address['phone'])
        }
    });

});
