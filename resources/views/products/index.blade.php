@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <strong>List Product</strong>
                 <div class="row">
                    @foreach ($productsView as $item)
                    <div class="col-3">
                        <div class="card mt-4">
                            <img src="https://images.pexels.com/photos/139764/pexels-photo-139764.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name}}</h5>
                                <p class="card-text ">{{ $item->details}}</p>
                                <div class="container">
                                    <div class="row align-items-end">
                                        <div class="col">
                                            <p class="card-text">{{ $item->price}} Baht</p>
                                        </div>
                                        <div class="col">
                                            <a href="{{ route('products.edit', $item->id)}}" class="btn btn-outline-primary">Edit</a>
                                        </div>
                                        <div class="col">
                                            <form action="{{ route('products.destroy', $item->id)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                 </div>
            </div>
        </div>
    </div>
@endsection