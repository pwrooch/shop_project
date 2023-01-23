@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-success" href="{{ route('products.create') }}">New Product</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                 <div class="row my-2">
                    @foreach ($productsView as $item)
                    <div class="col-3">
                        <div class="card mt-4" style="width: 20rem; ">
                            <img src="https://images.pexels.com/photos/13428021/pexels-photo-13428021.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="container">
                                    <div class="fw-bolder">
                                        <h4 class="text-dark">{{ $item->name }}</h4>
                                    </div>
                                    <div class="fw-light">
                                        <p class="text-with-dots">{{ $item->details }}</p>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="fw-bold">
                                            <p class="text-start">{{ $item->price }} Baht</p>
                                        </div>
                                        <div class="row mt-2">
                                            <form action="{{ route('products.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('products.show', $item->id)}}" class="btn btn-outline-success">Details</a>
                                                <a href="{{ route('products.edit', $item->id)}}" class="btn btn-outline-primary">Edit</a>
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
                    {!! $productsView->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>    
    </div>
@endsection