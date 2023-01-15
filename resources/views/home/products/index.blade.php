@extends('home.partials.main')

@section('container')
@if( session()->has('success') )
    @include('home.partials.modalNotif')
@endif

<section>
    <div class="row justify-content-center">

        @foreach ($products as $product)    
        <div class="col-lg-3 rounded mt-3">
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
                <div class="d-flex justify-content-center mt-2">
                    <a href="/home/products/{{ $product->product_id }}" class="nav-link badge p-2 m-1" style="background-color: #183153"><i class="fa-solid fa-eye"></i> Details</a>
                    <a href="/home/products/{{ $product->product_id }}/edit" class="nav-link badge p-2 m-1 bg-warning"><i class="fa-solid fa-pencil"></i> edit</a>
                    <form action="/home/products/{{ $product->product_id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0 p-2 m-1" onclick="return confirm('Are you sure ?')"><i class="fa-solid fa-ban"></i> Delete</button>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
        @endforeach

        
    </div>
</section>

<script>

    // tutup modal notifikasi
    document.querySelector('#notification-modal').addEventListener('click', evt => {
        if( !evt.target.matches('button') ) return;
        const button = document.querySelector('#notification-modal');
        button.classList.remove('show', 'd-block');
    })

</script>
@endsection