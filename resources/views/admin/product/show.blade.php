@extends('admin.layouts.general')

@section('css')
<style>
    .carousel-indicators-thumb [data-bs-target] {
        border: 1px solid white;
    }

    .carousel-indicators-thumb [data-bs-target]:hover {
        transform: scale(1.08);
    }

    #loading {
        display: none;
        position: absolute;
        z-index: 5;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.404);
    }
    .loading-img {
        display: flex;
        justify-content: center;
    }
    .loading-img img {
        margin-top: 30%;
        width: 100px;
        height: 100px;
    }

    #gallery-delete {
        position: absolute;
        top: 3%;
        right: 3%;
        z-index: 9999;
        cursor: pointer;
    }


</style>
@endsection

@section('content')
<div class="col-md-12 mb-3">
    <div class="d-flex justify-content-between">
        <h1>VIEW PRODUCT</h1>
        <div>
            <a href="{{ route('product.index') }}">Product</a> / <span>{{ $product->name }}</span>
        </div>
    </div>
</div>
<div class="col-md-6 mb-3">
    <div id="carousel-indicators-thumb" class="carousel slide carousel-fade" data-bs-ride="carousel">
       <div id="loading">
            <div class="loading-img">
                <img src="{{ asset('assets/admin/static/loading.gif') }}" alt="">
            </div>
       </div>
        <div class="carousel-indicators carousel-indicators-thumb">
          <button type="button" data-bs-target="#carousel-indicators-thumb" data-bs-slide-to="0" class=" ratio ratio-4x3 active" style="background-image: url({{ asset('uploads/product/'.$product->image) }});"></button>
          @for ($i = 0; $i < count($gallery); $i++)
            @php
                $no = $i + 1;
            @endphp
            <button type="button" data-bs-target="#carousel-indicators-thumb" data-bs-slide-to="{{ $no }}" class=" ratio ratio-4x3" style="background-image: url({{ asset('uploads/gallery/'.$gallery[$i]['image']) }})"></button>
          @endfor
          <button type="button" data-bs-target="#carousel-indicators-thumb" class=" ratio ratio-4x3" id="add_gallery" style="background-image: url({{ asset('assets/admin/static/add_image.jpg') }})"></button>
          <input type="file" hidden name="image" id="file_input">
          <input type="number" hidden  id="product_id" value="{{ $product->id }}">
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block rounded" alt="" src="{{ asset('uploads/product/'.$product->image) }}" width="100%" height="400" style="filter: brightness(60%)">
          </div>
          @foreach ($gallery as $result)
            <div class="carousel-item">
                <img class="d-block rounded" alt="" src="{{ asset('uploads/gallery/'.$result->image) }}" width="100%" height="400" style="filter: brightness(60%)">
                <div id="gallery-delete" title="Delete" onclick="galleryDelete({{$result->id}})">
                    <span class="text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16z" stroke-width="0" fill="currentColor"></path>
                            <path d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z" stroke-width="0" fill="currentColor"></path>
                        </svg>
                    </span>
                </div>
                <input type="number" hidden  id="gallery_id" value="{{ $result->id }}">
            </div>
          @endforeach
        </div>
    </div>
</div>
<div class="col-md-6 mb-3">
    <h1>{{ $product->name }}</h1>
    <h4 class="text-muted">Category: {{ $product->productCategory->name }}</h4>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Name Product</label>
            <input type="text" class="form-control" value="{{ $product->name }}" disabled>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Price</label>
            <input type="text" class="form-control" value="Rp. {{ number_format($product->price,0,',','.') }}" disabled>
        </div>
        <div class="col-md-12 mb-3">
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label">Width</label>
                    <input type="text" class="form-control" value="{{ $product->width }} cm" disabled>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Heigh</label>
                    <input type="text" class="form-control" value="{{ $product->heigh }} cm" disabled>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Wide</label>
                    <input type="text" class="form-control" value="{{ $product->wide }} cm" disabled>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="border border-1 rounded" style="background-color: #f6f8fb;padding:.4375rem .75rem;">
                {!! $product->description !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

<script>

    var addGallery = document.getElementById('add_gallery');
    var fileInput = document.getElementById("file_input");
    var productId = document.getElementById("product_id").value;
    var loading = document.getElementById("loading");


    addGallery.addEventListener("click", function() {
        fileInput.click();
    });

    fileInput.addEventListener("change", function() {

        loading.style.display = "block";

        var file = this.files[0];

        var formData = new FormData();
        formData.append("image", file);
        formData.append("product_id", productId);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('gallery.store') }}",
            type: "post",
            data: formData,
            entype: "multipart/form-data",
            contentType: false,
            processData: false,
            cache: false,
            success: function(resp)
            {
                loading.style.display = "none";

                var status = resp.status;

                if (status === 400) {
                    alert('Data failed to upload, check your file. And the file must be image .png, .jpg, .jpeg');
                    window.location.reload();
                }

                if (status === 201) {
                    alert("Data successfully created");
                    window.location.reload();
                }

            }

        });


    });


</script>

<script>

    function galleryDelete(id)
    {
        var loading = document.getElementById("loading");
        loading.style.display = "block";

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('dashboard/product/gallery/destroy') }}/"+id,
            type: 'delete',
            data: {id:id},
            success: function(resp)
            {
                loading.style.display = "none";

                var status = resp.status;

                if (status === 200) {
                    alert("Data successfully deleted");
                    window.location.reload();
                }
            }


        });
    }

</script>

@endsection
