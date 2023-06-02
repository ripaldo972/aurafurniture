function permalink()
{
    var name = document.getElementById("nameProduct").value;

    var slug = name.toLowerCase()
                    .trim()
                    .replace(/[^\w\s-]/g, '')
                    .replace(/[\s_-]+/g, '-')
                    .replace(/^-+|-+$/g, '');

    $("#setName").html(slug);
}
