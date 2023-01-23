@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label for="">Product Name</label>
                    <input class="form-control" type="text" name="name" placeholder="Product Name" required value="{{ $product->name }}">
                    <label for="comment">Details:</label>
                    <textarea class="form-control" type="text" name="details" required>{{ $product->details }}</textarea>
                    <label for="">Picture</label>
                    <input class="form-control" type="file" name="image" placeholder="Picture" required value="{{ $product->image }}">
                    <label for="">Price</label>
                    <input class="form-control" type="number" name="price" placeholder="Price" required value="{{ $product->price }}">
                    <button class="btn btn-success mt-3" type="submit" >Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection