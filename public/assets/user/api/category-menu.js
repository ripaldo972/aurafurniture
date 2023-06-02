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

                    html += "<li class='onhover-category-list'>\
                                <a href='http://127.0.0.1:8000/product/category/"+categories[i]['slug']+"' class='category-name'>\
                                    <img src='"+categories[i]['image']+"' alt=''>\
                                    <h6>"+categories[i]['name']+"</h6>\
                                </a>\
                            </li>";

                }
            } else {

                html += "<a href='{{url('/product/category', $category->slug)}}' class='item'>\
                            <img src='{{asset('uploads/category/'.$category->image)}}'>\
                            <h6 class='small-text-overlay text-center'>{{$category->name}}</h6>\
                        </a>";

            }

            $("#categories").html(html);


        }

    });

});
