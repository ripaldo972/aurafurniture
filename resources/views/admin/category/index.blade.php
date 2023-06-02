@extends('admin.layouts.general')

@section('content')
<div class="col-md-12 mb-3">
    <h1>CATEGORIES</h1>
</div>

<div class="col-md-4 mb-3">
    <h3>Add New Category</h3>
    <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Astro Cloud" name="name" required>
            <span class="text-muted"><i>The name is how appears on your site.</i></span> <br>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" placeholder="Astro Cloud Software Developer" style="height:100px;"></textarea>
            <span class="text-muted"><i>Descriptions will help Google index websites by category.</i></span>
        </div>
        <div class="mb-3">
            <label class="form-lable">Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" accept="image/*">
            <span class="text-muted"><i>We recommend an image size for categories of <b>100 x 100 pixels</b>.</i></span>
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <button class="btn btn-primary">Add New Category</button>
        </div>
    </form>
</div>

<div class="col-md-8 mb-3">
    <div class="d-flex justify-content-end">
        <div class="card card-95">
            <div class="table-responsive">
                <table class="table table-borderless table-striped align-middle">
                    <thead>
                        <th style="width: 5%;">
                            Trash
                        </th>
                        <th style="width: 37.5%">Name</th>
                        <th>Slug</th>
                        <th class="text-center" style="width: 5%;">Count</th>
                        <th class="text-center" style="width: 15%;">Action</th>
                    </thead>
                    <tbody>
                        @if (count($categories) == 0)
                            <tr>
                                <td colspan="5" class="text-center">Data is Empty</td>
                            </tr>
                        @endif
                        @foreach ($categories as $result => $key)
                            <tr>
                                <td class="text-center">
                                    <form action="{{route('category.destroy', Crypt::encrypt($key->id))}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-icon btn-trash">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M4 7l16 0"></path>
                                                <path d="M10 11l0 6"></path>
                                                <path d="M14 11l0 6"></path>
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                                <td>{{ $key->name }}</td>
                                <td>{{ $key->slug }}</td>
                                <td class="text-center">{{ $key->count }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="" class="btn btn-dribbble btn-sm"  data-bs-toggle="modal" data-bs-target="#modal-show_{{$key->slug}}">
                                            View
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <div class="modal modal-blur fade" id="modal-show_{{$key->slug}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">View - {{ $key->name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{route('category.update', Crypt::encrypt($key->id))}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('patch')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" class="form-control" name="name" placeholder="Astro Cloud" value="{{ $key->name }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Description</label>
                                                    <textarea name="description" class="form-control" placeholder="Astro Cloud Software Developer" style="height: 100px;">{{ $key->description }}</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">
                                                        <div class="d-flex justify-content-between">
                                                            <span>Image</span>
                                                            @if ($key->image !== null)
                                                                <a href="{{asset('uploads/category/'.$key->image)}}" target="_blank">View image</a>
                                                            @endif
                                                        </div>
                                                    </label>
                                                    <input type="file" class="form-control" name="image" accept="image/*">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mb-3">
                {{$categories->links()}}
            </div>
            <div class="ms-3 mb-3">
                <span>
                    <b><i>Note :</i></b>
                </span> <br>
                <span class="text-muted">
                    <i>Deleting a category does not delete the product. Instead, product that were only assigned to
                        the deleted category are set to the category <b>Uncategorized</b></i>
                </span>
            </div>
        </div>
    </div>
</div>
@endsection

