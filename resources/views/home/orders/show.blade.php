@extends('home.partials.main')

@section('container')
@if( session()->has('success') )
    @include('home.partials.modalNotif')
@endif

@php
    if ($orderShow->customer_phone == NULL) {
        $orderShow->customer_phone = '-';
    }
@endphp

@php
    if ($orderShow->customer_email == NULL) {
        $orderShow->customer_email = '-';
    }
@endphp

<section>
    <div class="row">
        <div class="col-md-7 px-4 py-3">
            <form action="/home/orders" method="POST">
                @csrf

                <h3 class="fw-bold">Details Order</h3>
                <hr class="mb-4">

                <div class="input-group flex-nowrap mb-2">
                    <span class="input-group-text @error('customer_name') border border-danger @enderror" id="addon-wrapping" style="width: 150px">Customer Name</span>
                    <input type="text" name="customer_name" id="floatingInput" class="form-control @error('customer_name') is-invalid @enderror" placeholder="Name" aria-label="Username" aria-describedby="addon-wrapping" value="{{ $orderShow->customer_name }}">
                </div>

                <div class="input-group flex-nowrap mb-2">
                    <span class="input-group-text @error('customer_phone') border border-danger @enderror" id="addon-wrapping" style="width: 150px">Phone Number</span>
                    <input type="text" name="customer_phone" id="floatingInput" class="form-control @error('customer_phone') is-invalid @enderror" aria-label="Username" aria-describedby="addon-wrapping" value="{{ $orderShow->customer_phone }}">
                </div>

                <div class="input-group flex-nowrap mb-2">
                    <span class="input-group-text @error('stock') border border-danger @enderror" id="addon-wrapping" style="width: 150px">Email</span>
                    <input type="text" name="name" id="floatingInput" class="form-control @error('name') is-invalid @enderror" placeholder="Email" aria-label="Username" aria-describedby="addon-wrapping" value="{{ $orderShow->customer_email }}">
                </div>

                <div class="input-group flex-nowrap mb-2">
                    <span class="input-group-text @error('stock') border border-danger @enderror" id="addon-wrapping" style="width: 150px">Product</span>
                    <input type="text" name="name" id="floatingInput" class="form-control @error('name') is-invalid @enderror" placeholder="Email" aria-label="Username" aria-describedby="addon-wrapping" value="{{ $orderShow->order_item }}">
                </div>

                <div class="input-group flex-nowrap mb-2">
                    <span class="input-group-text @error('stock') border border-danger @enderror" id="addon-wrapping" style="width: 150px">Amount</span>
                    <input type="text" name="name" id="floatingInput" class="form-control" placeholder="Email" aria-label="Username" aria-describedby="addon-wrapping" value="{{ $orderShow->amount }}">
                </div>

                <div class="input-group flex-nowrap mb-2">
                    <span class="input-group-text @error('stock') border border-danger @enderror" id="addon-wrapping" style="width: 150px">Price</span>
                    <input type="text" name="name" id="floatingInput" class="form-control @error('name') is-invalid @enderror" placeholder="Email" aria-label="Username" aria-describedby="addon-wrapping" value="@currency($orderShow['total'])">
                </div>

                <div class="input-group flex-nowrap mb-2">
                    <span class="input-group-text @error('stock') border border-danger @enderror" id="addon-wrapping" style="width: 150px">Order Time</span>
                    <input type="text" name="name" id="floatingInput" class="form-control @error('name') is-invalid @enderror" placeholder="Email" aria-label="Username" aria-describedby="addon-wrapping" value="{{ ($orderShow->created_at)->format('d-m-Y       H:i') }}">
                </div>

                <div class="input-group flex-nowrap mb-2">
                    <span class="input-group-text @error('stock') border border-danger @enderror" id="addon-wrapping" style="width: 150px">Update Time</span>
                    <input type="text" name="name" id="floatingInput" class="form-control @error('name') is-invalid @enderror" placeholder="Email" aria-label="Username" aria-describedby="addon-wrapping" value="{{ ($orderShow->updated_at)->format('d-m-Y       H:i') }}">
                </div>

                <div class="input-group flex-nowrap mb-2">
                    <span class="input-group-text @error('stock') border border-danger @enderror" id="addon-wrapping" style="width: 150px">Status</span>
                    <input type="text" name="name" id="floatingInput" class="form-control" placeholder="Email" aria-label="Username" aria-describedby="addon-wrapping" value="{{ $orderShow->order_status }}">
                </div>
                
            </form>
        </div>
        <div class="col-md-5 px-4 py-3">
            <h4 class="fw-bold">Order List</h4>
            <hr class="mb-4">
            <section>
                <div class="table-responsive text-nowrap">
                    <!--Table-->
                    <table class="table table-striped" style="height: 60vh">
                
                        <!--Table head-->
                        <thead>
                        <tr>
                            <th>No</th>
                            <th class="text-center"><i class="fa-solid fa-gear"></i></th>
                            <th>Customer</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <!--Table head-->
                
                        <!--Table body-->
                        <tbody>
                        @foreach ($orders as $order)    
                        <tr>
                            <td scope="row">{{ $loop->iteration . "." }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-bars"></i></button>
                                    <ul class="dropdown-menu position-absolute">
                                        <li><a class="dropdown-item" href="/home/orders/{{ $order->id }}"><i class="fa-regular fa-eye"></i> Show</a></li>
                                        <li><a class="dropdown-item" href="/home/orders/{{ $order->id }}/edit"><i class="fa-regular fa-pen-to-square"></i> Edit</a></li>
                                        <form action="/home/orders/{{ $order->id }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button class="dropdown-item" onclick="return confirm('Are you sure ?')"><i class="fa-solid fa-ban"></i> Delete</button>
                                        </form>
                                    </ul>
                                </div>
                            </td>
                            <td>{{ $order->customer_name }}</td>
                            <td>@currency($order['total'])</td>
                            <td>{{ $order->order_status }}</td>
                        </tr>
                        @endforeach
                
                        </tbody>
                        <!--Table body-->
                
                
                    </table>
                    <!--Table-->
                </div>
            </section>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="/js/autoNumeric/autoNumeric.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

        // start find product name from category
        $(document).on('change', '#productCategory', function(){
            // console.log('berhasil milih');

            var category_id = $(this).val();
            // console.log(category_id);


            var div = $(this).parent().parent();
            var op = " ";
            // send request with ajax
            $.ajax({
                type: 'get',
                url: '{!! URL::to('findProductName') !!}',
                data: {'id': category_id},
                success: function(data){
                    // console.log('success');
                    // console.log(data);

                    op += '<option value="" disabled="true" selected>Choose a product</option>';
                    for(var i = 0; i < data.length; i++){
                        op += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                    }

                    div.find('#productName').html(" ");
                    div.find('#productName').append(op);

                },
                error: function(){

                }
            });
        });
        // end find product name from category

        // start find product price from product
        $(document).on('change', '#productName', function(){
            
            var product_id = $(this).val();

            var a = $(this).parent().parent();
            // console.log(product_id);

            var op = "";

            $.ajax({
                type: 'get',
                url: '{!! URL::to('findPrice') !!}',
                data: {'id': product_id},
                dataType: 'json',
                success: function(data){
                    console.log(data.price);
                    a.find('#productPrice').val(data.price).autoNumeric('init');
                    a.find('#total').val(data.price);
                },
                error: function(){

                }
            });
        });
        // end find product price from product

    });

    // tutup modal notifikasi
    document.querySelector('#notification-modal').addEventListener('click', evt => {
        if( !evt.target.matches('button') ) return;
        const button = document.querySelector('#notification-modal');
        button.classList.remove('show', 'd-block');
    })

</script>
@endsection