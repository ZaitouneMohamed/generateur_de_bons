@extends('layout.master')

@section('content')
    <h1>Products</h1>
    @if (\App\Models\Product::count() == 0)
        <form action="" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="col-lg-12 py-3">
                <label for="users">Product List</label>
                <input type="file" class="form-control" style="padding: 3px;" name="product" required />
            </div>
            <button type="submit" class="btn btn-success" name="upload">Upload</button>
        </form>
    @endif
    @if (\App\Models\Order::count() != 0)
        <div class="container">
            <a class="btn btn-danger">clear table</a><br>
        </div>
    @endif
    <br><br>
@endsection
