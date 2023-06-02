$(document).ready(function() {

    // Slider
    $.ajax({

        url: "http://127.0.0.1:8000/sliders",
        type: "get",
        success: function(resp)
        {
            var sliders = resp.data;
            var html = "";
            var indicator = "";

            if (sliders.length > 0) {
                for (var i = 0; i < sliders.length; i++) {

                    var no = i+1;

                    if (i == 0) {
                        var active  = 'active';
                    } else {
                        var active = '';
                    }

                    indicator += "<button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='"+i+"' class='"+active+"' aria-current='true' aria-label='Slide "+no+"'></button>";

                    html += "<div class='carousel-item "+active+"'>\
                                <img src='"+sliders[i]['image']+"' class='d-block img-slider' alt='...'>\
                                <div class='caption-slider'>\
                                    <h2>"+sliders[i]['name']+"</h2>\
                                    <span class='text-muted mb-3 caption-title'>"+sliders[i]['description']+"</span>\
                                    <button class='btn btn-animation btn-sm'>Buy Now</button>\
                                </div>\
                            </div>";

                }
            } else {


                indicator += "<button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='0' class='active' aria-current='true' aria-label='Slide 1'></button>";
                html += "<div class='carousel-item active'>\
                                <img src='http://127.0.0.1:8000/default_image/slider-default.jpg' class='d-block img-slider' alt=''>\
                                <div class='caption-slider'>\
                                    <h2>First slide label</h2>\
                                    <span class='text-muted mb-3 caption-title'>Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>\
                                    <button class='btn btn-animation btn-sm'>Buy Now</button>\
                                </div>\
                            </div>";

            }

            $("#slider-indicator").html(indicator);
            $("#sliders").html(html);


        }

    });


});
