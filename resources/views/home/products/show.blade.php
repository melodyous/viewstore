@extends('home.partials.main')

@section('container')

@if( session()->has('success') )
    @include('home.partials.modalNotif')
@endif

<div class="row">
    <aside class="col-lg-4 px-3 pt-4">
        <form action="/home/products/{{ $productShow->product_id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h3 class="fw-bold">Product Details</h3>
            <hr class="mb-4">

            <div class="text-center mb-4">
                <img src="{{ $productShow->image }}" alt="{{ $productShow->name }}" class="img-fluid" style="height: 200px; width: auto">
            </div>

            <div class="input-group flex-nowrap mb-2">
                <span class="input-group-text @error('stock') border border-danger @enderror" id="addon-wrapping" style="width:100px">Name</span>
                <input type="text" name="name" id="floatingInput" class="form-control @error('name') is-invalid @enderror" placeholder="Product Name" aria-label="Username" aria-describedby="addon-wrapping" value="{{ old('name', $productShow->name) }}" @disabled(true)>
            </div>


            <div class="input-group flex-nowrap mb-2">
                <span class="input-group-text @error('stock') border border-danger @enderror" id="addon-wrapping" style="width:100px">Product Id</span>
                <input type="text" name="name" id="floatingInput" class="form-control @error('name') is-invalid @enderror" placeholder="Product Name" aria-label="Username" aria-describedby="addon-wrapping" value="{{ old('name', $productShow->product_id) }}" @disabled(true)>
            </div>

            <div class="input-group flex-nowrap mb-2">
                <span class="input-group-text @error('stock') border border-danger @enderror" id="addon-wrapping" style="width:100px">Price</span>
                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Rp.1234" aria-label="Username" aria-describedby="addon-wrapping" value="@currency($productShow['price'])" @disabled(true)>
            </div>


            <div class="input-group flex-nowrap mb-2">
                <span class="input-group-text @error('stock') border border-danger @enderror" id="addon-wrapping" style="width:100px">Stock</span>
                <input type="text" name="stock" class="form-control @error('stock') is-invalid @enderror" placeholder="1234" aria-label="Username" aria-describedby="addon-wrapping" value="{{ old('stock', $productShow->stock) }}" @disabled(true)>
            </div>

            <div class="input-group flex-nowrap mb-2">
                <span class="input-group-text @error('stock') border border-danger @enderror" id="addon-wrapping" style="width:100px">Category</span>
                <input type="text" name="stock" class="form-control @error('stock') is-invalid @enderror" placeholder="1234" aria-label="Username" aria-describedby="addon-wrapping" value="{{ old('stock', $productShow->category->name) }}" @disabled(true)>
            </div>


            <div class="input-group flex-nowrap mb-2">
                <span class="input-group-text @error('stock') border border-danger @enderror" id="addon-wrapping" style="width:100px">Added at</span>
                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Rp.1234" aria-label="Username" aria-describedby="addon-wrapping" value="{{ ($productShow->created_at)->format('d-m-Y') }}" @disabled(true)>
            </div>

            <div class="input-group flex-nowrap mb-2">
                <span class="input-group-text @error('stock') border border-danger @enderror" id="addon-wrapping" style="width: 100px">Last update</span>
                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Rp.1234" aria-label="Username" aria-describedby="addon-wrapping" value="{{ ($productShow->updated_at)->format('d-m-Y') }}" @disabled(true)>
            </div>
            
        </form>
    </aside>
    <section class="col-lg-8 px-3">
        <div class="row justify-content-center">
    
            @foreach ($products as $product)    
            <div class="col-lg-4 rounded mt-3">
                <div class="card text-black">
                <img src="{{ $product->image }}" class="card-img-top img-fluid border-0 m-auto mt-3 rounded" alt="{{ $product->name }}" style="height: auto; width: 60%">
                <div class="card-body">
                    <div class="text-center">
                    <h5 class="card-title fs-6">{{ $product->name }}</h5>
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
</div>

<script>

    // tutup modal notifikasi
    document.querySelector('#notification-modal').addEventListener('click', evt => {
        if( !evt.target.matches('button') ) return;
        const button = document.querySelector('#notification-modal');
        button.classList.remove('show', 'd-block');
    })

</script>
@endsection