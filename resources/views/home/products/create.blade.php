@extends('home.partials.main')

@section('container')
@if( session()->has('success') )
    @include('home.partials.modalNotif')
@endif

<div class="row">
    <aside class="col-lg-4 px-3 pt-4">
        <form action="/home/products/" method="POST" enctype="multipart/form-data">
            @csrf
            <h3 class="fw-bold">Add Product</h3>
            <hr class="mb-4">
            <div class="input-group flex-nowrap mb-2">
                <span class="input-group-text @error('stock') border border-danger @enderror" id="addon-wrapping" style="width: 90px">Name</span>
                <input type="text" name="name" id="floatingInput" class="form-control @error('name') is-invalid @enderror" placeholder="Product Name" aria-label="Username" aria-describedby="addon-wrapping" value="{{ old('name') }}">
            </div>
            @error('name')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror

            <div class="input-group flex-nowrap mb-2">
                <span class="input-group-text @error('stock') border border-danger @enderror" id="addon-wrapping" style="width: 90px">Price</span>
                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Rp.1234" aria-label="Username" aria-describedby="addon-wrapping" value="{{ old('price') }}">
            </div>
            @error('price')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror

            <div class="input-group flex-nowrap mb-2">
                <span class="input-group-text @error('stock') border border-danger @enderror" id="addon-wrapping" style="width: 90px">Stock</span>
                <input type="text" name="stock" class="form-control @error('stock') is-invalid @enderror" placeholder="1234" aria-label="Username" aria-describedby="addon-wrapping" value="{{ old('stock') }}">
            </div>
            @error('stock')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror

            <div class="input-group mb-2">
                <span class="input-group-text @error('stock') border border-danger @enderror" id="addon-wrapping" style="width: 90px">Category</span>
                <select class="form-select @error('category_id') is-invalid @enderror" name="category_id">
                    <option value="" selected>No category chosen</option>
                    @foreach ($categories as $category)
                        @if ( old('category_id') )
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            @error('category_id')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror

            <div class="input mb-3">
                <input type="file" name="image" id="image" class="form-control form-control @error('image') is-invalid @enderror" placeholder="image">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn w-100 text-white" style="background-color: #183153"><i class="fa-solid fa-file-circle-plus"></i> Add product</button>
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
                        </div>
                            <button class="badge bg-danger border-0 p-2 m-1" onclick="return confirm('Are you sure ?')"><i class="fa-solid fa-ban"></i> Delete</button>
                        </form>
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