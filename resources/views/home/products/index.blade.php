@extends('home.partials.main')

@section('container')
@if( session()->has('success') )
    @include('home.partials.modalNotif')
@endif

<section>
    <div class="row justify-content-center">

        @foreach ($products as $product)    
        <div class="col-md-2 rounded mt-3">
            <div class="card text-black h-100 shadow">
            <img src="{{ $product->image }}" class="card-img-top img-fluid border-0 m-auto mt-3 rounded" alt="{{ $product->name }}" style="height: auto; width: 50%">
            <div class="card-body d-flex flex-column">
                <div class="text-center">
                <h5 class="card-title" style="font-size: 15px; font-weight: 600">{{ $product->name }}</h5>
            </div>

                <div class="mt-auto" style="margin-bottom: -25px">
                    <p class="text-muted mb-3 text-center">{{ $product->category->name }}</p>
                    <div class="d-flex justify-content-between" style="font-size: 14px">
                        <span>Price</span><span>@currency($product->price)</span>
                    </div>
                    <div class="d-flex justify-content-center mt-2" style="font-size: 12px">
                        <a href="/home/products/{{ $product->product_id }}" class="nav-link badge p-2 m-1" style="background-color: #183153"><i class="fa-solid fa-eye"></i> Details</a>
                        <a href="/home/products/{{ $product->product_id }}/edit" class="nav-link badge p-2 m-1 bg-warning"><i class="fa-solid fa-pencil"></i> edit</a>
                        <form action="/home/products/{{ $product->product_id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="nav-link badge bg-danger border-0 p-2 m-1" onclick="return confirm('Are you sure ?')"><i class="fa-solid fa-ban"></i> Delete</button>
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