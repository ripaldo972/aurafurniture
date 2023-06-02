$(document).ready(function() {

    $.ajax({

        url: "http://127.0.0.1:8000/api/logo",
        type: 'get',
        success: function(resp)
        {
            var logoIcon =  document.getElementById("logoIcon");

            $("#logoSidebar").html(
                "<img src='"+resp.logo+"'  width='100%' height='80' alt='Logo' class='drop-shadow'></img>"
            );


            logoIcon.setAttribute("href", resp.logo);
        }

    });

});
