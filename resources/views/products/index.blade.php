@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <strong>List Product</strong>
                 <div class="row my-2">
                    @foreach ($productsView as $item)
                    <div class="col-3">
                        <div class="card mt-4" style="width: 20rem; ">
                            <img src="https://images.pexels.com/photos/13428021/pexels-photo-13428021.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="container my-2">
                                    <div class="fw-bolder">
                                        <h4 class="text-dark">{{ $item->name }}</h4>
                                    </div>
                                    <div class="fw-light">
                                        <p class="text-dark">{{ $item->details }}</p>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="fw-bold">
                                            <p>{{ $item->price }} Baht</p>
                                        </div>
                                        <div class="row mt-2">
                                            <form action="{{ route('products.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
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