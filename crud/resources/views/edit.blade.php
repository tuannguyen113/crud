@extends('master')

@section('content')

    <div class="card">
        <div class="card-header">Edit Product</div>
        <div class="card-body">
            <form method="post" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form">Product Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" value="{{ $product->name }}" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form">Description</label>
                    <div class="col-sm-10">
                        <textarea rows="4" cols="50" name="description" class="form-control" >{{ $product->description }}</textarea>
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-label-form">Price</label>
                    <div class="col-sm-10">
                        <input type="number" name="price" class="form-control" value="{{ $product->price }}" />

                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-label-form">Quantity</label>
                    <div class="col-sm-10">
                        <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}" />
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-label-form">Image</label>
                    <div class="col-sm-10">
                        <input type="file" name="image" />
                        <br />
                        <img src="{{ asset('images/' . $product->image) }}" width="100" class="img-thumbnail" />
                        <input type="hidden" name="hidden_image" value="{{ $product->image }}" />
                    </div>
                </div>
                <div class="text-center">
                    <input type="hidden" name="hidden_id" value="{{ $product->id }}" />
                    <input type="submit" class="btn btn-primary" value="Edit" />
                </div>
            </form>
        </div>
    </div>


@endsection('content')
