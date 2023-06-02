$(document).ready(function() {

    $.ajax({

        url: "http://127.0.0.1:8000/api/location",
        type: 'get',
        success: function(resp)
        {
            var location = resp.location;

            $("#location").html(location);
        }

    });

});
