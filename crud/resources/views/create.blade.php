@extends('master')

@section('content')

    @if($errors->any())

        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach
            </ul>
        </div>

    @endif

    <div class="card">
        <div class="card-header">Add Product</div>
        <div class="card-body">
            <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form">Product Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form">Description</label>
                    <div class="col-sm-10">
                       <textarea name="description" rows="4" cols="50" class="form-control"></textarea>
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-label-form">Price</label>
                    <div class="col-sm-10">
                       <input type="number" name="price" class="form-control" />
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-label-form">Quantity</label>
                    <div class="col-sm-10">
                       <input type="number" name="quantity" class="form-control" />
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-label-form"> Image</label>
                    <div class="col-sm-10">
                        <input type="file" name="image" />
                    </div>
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Add" />
                </div>
            </form>
        </div>
    </div>

@endsection('content')
