$(document).ready(function() {

    $.ajax({
        url: "http://127.0.0.1:8000/api/contact-information",
        type: "get",
        success: function(resp)
        {
            var address = resp.data;

            $("#footer-address").html(address['address'])
            $("#footer-phone").html(address['phone'])
            $("#footer-email").html(address['email'])
            $("#footer-copyright").html("2023 Copyright By "+address['name'])
        }
    });

});
