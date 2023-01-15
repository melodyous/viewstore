@extends('home.partials.main')

@section('container')
<section>
    <div class="row justify-content-center">

        @foreach ($products as $product)    
        <div class="col-lg-3 rounded">
            <div class="card text-black">
            <img src="{{ $product->image }}" class="card-img-top img-fluid border-0 m-auto mt-3 rounded" alt="{{ $product->name }}" style="height: auto; width: 60%">
            <div class="card-body">
                <div class="text-center">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="text-muted mb-4">{{ $product->category->name }}</p>
                </div>
                <div>
                <div class="d-flex justify-content-between">
                    <span>Price</span><span>@currency($product->price)</span>
                </div>
                </div>
            </div>
            </div>
        </div>
        @endforeach

        
    </div>
</section>
@endsection