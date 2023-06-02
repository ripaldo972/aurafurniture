$(document).ready(function() {

    $.ajax({
        url: "http://127.0.0.1:8000/api/medsos",
        type: "get",
        success: function(resp)
        {
            var medsos = resp.data;

            if (medsos['facebook'] !== null) {
                var link_facebook = medsos['facebook'];
            } else {
                var link_facebook = "#";
            }
            if (medsos['instagram'] !== null) {
                var link_instagram = medsos['instagram'];
            } else {
                var link_instagram = "#";
            }
            if (medsos['youtube'] !== null) {
                var link_youtube = medsos['youtube'];
            } else {
                var link_youtube = "#";
            }
            if (medsos['tiktok'] !== null) {
                var link_tiktok = medsos['tiktok'];
            } else {
                var link_tiktok = "#";
            }

            var facebook = document.getElementById("facebook");
            var instagram = document.getElementById("instagram");
            var youtube = document.getElementById("youtube");
            var tiktok = document.getElementById("tiktok");


            facebook.setAttribute("href", link_facebook)
            instagram.setAttribute("href", link_instagram)
            youtube.setAttribute("href", link_youtube)
            tiktok.setAttribute("href", link_tiktok)
        }
    });

});
