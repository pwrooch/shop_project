@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('products.store')}}" method="POST">
                    @csrf
                    <label for="">Product Name</label>
                    <input class="form-control" type="text" name="name" placeholder="Product Name" required>
                    <label for="comment">Details:</label>
                    <textarea class="form-control" type="text" name="details" required></textarea>
                    <label for="">Picture</label>
                    <input class="form-control" type="file" name="image" placeholder="Picture" required>
                    <label for="">Price</label>
                    <input class="form-control" type="number" name="price" placeholder="Price" required>
                    <button class="btn btn-success mt-3" type="submit" >Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection