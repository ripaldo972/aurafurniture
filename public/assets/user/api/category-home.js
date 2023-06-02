$(document).ready(function() {

    // Category Menu
    $.ajax({
        url: "http://127.0.0.1:8000/categories",
        type: "get",
        success: function(resp)
        {
            var categories = resp.data;
            var html = "";

            if (categories.length > 0) {
                for (var i = 0; i < categories.length; i++) {

                    html += "<div>\
                                <div class='shop-category-box border-0 wow fadeIn'>\
                                    <a href='http://127.0.0.1:8000/product/category/"+categories[i]['slug']+"' class='circle-2'>\
                                        <img src='"+categories[i]['image']+"' style='height: 97px;width:86px;' class='rounded img-fluid blur-up lazyload' alt=''>\
                                    </a>\
                                    <div class='category-name'>\
                                        <h6>"+categories[i]['name']+"</h6>\
                                    </div>\
                                </div>\
                            </div>";

                }
            } else {

                html += "<a href='{{url('/product/category', $category->slug)}}' class='item'>\
                            <img src='{{asset('uploads/category/'.$category->image)}}'>\
                            <h6 class='small-text-overlay text-center'>{{$category->name}}</h6>\
                        </a>";

            }

            $("#home_categories").html(
                "<div class='category-slider arrow-slider'>\
                    "+html+"\
                </div>"
            );

            categorySlider();

        }

    });

});


function categorySlider()
{
    $('.category-slider').slick({
        arrows: true,
        infinite: true,
        slidesToShow: 8,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1745,
                settings: {
                    slidesToShow: 7,
                }
            },
            {
                breakpoint: 1399,
                settings: {
                    slidesToShow: 6,
                }
            },
            {
                breakpoint: 1124,
                settings: {
                    slidesToShow: 5,
                }
            },
            {
                breakpoint: 900,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 692,
                settings: {
                    slidesToShow: 3,
                }
            }, {
                breakpoint: 482,
                settings: {
                    slidesToShow: 2,
                }
            },
        ]
    });
}
