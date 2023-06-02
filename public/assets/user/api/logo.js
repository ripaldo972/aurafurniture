$(document).ready(function() {

    $.ajax({

        url: "http://127.0.0.1:8000/api/logo",
        type: 'get',
        success: function(resp)
        {
            var logoIcon =  document.getElementById("logoIcon");

            $("#logo-header").append(
                "<img src='"+resp.logo+"' class='img-fluid blur-up lazyload' alt=''>"
            );

            $("#logo-footer").append(
                "<img src='"+resp.logo+"' class='img-fluid' alt=''></img>"
            );


            logoIcon.setAttribute("href", resp.logo);
        }

    });

});
