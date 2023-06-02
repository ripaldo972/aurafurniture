@extends('admin.layouts.general')

@section('content')
<div class="col-md-12">
    <h1>PRODUCTS</h1>
</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive mb-3">
                <table class="table table-striped align-middle">
                    <thead>
                        <th style="width: 5%;">More</th>
                        <th style="width:30%">Name</th>
                        <th style="width:20%">Category</th>
                        <th style="width:20%">Price</th>
                        <th>Status</th>
                        <th class="text-center" style="10%;">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($products as $result => $key)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <form action="{{ route('product.destroy', Crypt::encrypt($key->id)) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-icon btn-trash" title="Delete Data">
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
                                        <a href="{{ route('product.edit',Crypt::encrypt($key->id) ) }}" class="text-success" title="Edit Data">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                                <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                                <path d="M16 5l3 3"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                                <td>{{ $key->name }}</td>
                                <td>
                                    @if ($key->product_category_id !== 0)
                                        {{ $key->productCategory->name }}
                                    @else
                                        Uncategorized
                                    @endif
                                </td>
                                <td>
                                    Rp. {{ number_format($key->price,0,',','.') }}
                                </td>
                                <td>
                                    @if ($key->status == 1)
                                        <span class="badge bg-green">In stock</span>
                                    @else
                                        <span class="badge bg-warning">Out of stock</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('product.show', Crypt::encrypt($key->id)) }}" class="btn btn-dribbble">View</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
