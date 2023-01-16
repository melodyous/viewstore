@extends('home.partials.main')

@section('container')
@if( session()->has('success') )
    @include('home.partials.modalNotif')
@endif

<section>
    <div class="row">
        <div class="col-md-7 px-4">
            <form action="/home/orders" method="POST">
                @csrf

                <h3 class="fw-bold">Make New Order</h3>
                <hr class="mb-4">

                <div class="input-group flex-nowrap mb-2">
                    <span class="input-group-text @error('customer_name') border border-danger @enderror" id="addon-wrapping" style="width: 150px">Customer Name</span>
                    <input type="text" name="customer_name" id="floatingInput" class="form-control @error('customer_name') is-invalid @enderror" placeholder="Name" aria-label="Username" aria-describedby="addon-wrapping" value="{{ old('customer_name') }}">
                </div>

                <div class="input-group flex-nowrap mb-2">
                    <span class="input-group-text @error('customer_phone') border border-danger @enderror" id="addon-wrapping" style="width: 150px">Phone Number</span>
                    <input type="text" name="customer_phone" id="floatingInput" class="form-control @error('customer_phone') is-invalid @enderror" placeholder="+62xxxxx" aria-label="Username" aria-describedby="addon-wrapping" value="{{ old('customer_phone') }}">
                </div>

                <div class="input-group flex-nowrap mb-2">
                    <span class="input-group-text @error('stock') border border-danger @enderror" id="addon-wrapping" style="width: 150px">Email</span>
                    <input type="text" name="name" id="floatingInput" class="form-control @error('name') is-invalid @enderror" placeholder="Email" aria-label="Username" aria-describedby="addon-wrapping" value="{{ old('name') }}">
                </div>

                <div class="input-group mb-2">
                    <span class="input-group-text @error('order1') border border-danger @enderror" id="addon-wrapping" style="width: 150px">Category</span>
                    <select class="form-select @error('order1') is-invalid @enderror" id="productCategory" name="order1">
                        <option value="" disabled="true" selected>No category chosen</option>
                        @foreach ($categories as $caregory)
                            <option value="{{ $caregory->id }}">{{ $caregory->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group mb-2">
                    <span class="input-group-text @error('order1') border border-danger @enderror" id="addon-wrapping" style="width: 150px">Product</span>
                    <select class="form-select @error('order1') is-invalid @enderror" id="productName" name="order_item">
                        <option value="" disabled="true" selected>No product chosen</option>
                    </select>
                </div>


                <div class="input-group flex-nowrap mb-2">
                    <span class="input-group-text bg-white border-0" id="addon-wrapping" style="width: 150px"></span>
                    <input type="text" class="form-control" aria-describedby="addon-wrapping" id="productPrice" @disabled(true)>
                    <input name="total" id="total" type="hidden">
                </div>



                <button class="btn text-white" type="submit" style="background-color: #183153">Add Order</button>
            </form>
        </div>
        <div class="col-md-5 px-4">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo reiciendis veniam nostrum odio veritatis in molestiae laudantium? Quibusdam eligendi libero consequuntur aliquid, iusto laborum, atque sit obcaecati ipsum illo vel doloremque nobis recusandae neque placeat ex rem. Similique magni quidem corporis itaque incidunt deserunt mollitia quas, quod possimus commodi at cum ipsa eum doloribus ex id pariatur nisi, veritatis ab exercitationem, quibusdam odit vero temporibus repellat? Vitae quod sint, in amet illum modi autem aut, nesciunt quibusdam nobis nulla? Exercitationem, minus placeat earum laudantium tenetur illum animi sequi voluptates dolor maiores molestias amet dignissimos nemo saepe velit neque unde impedit quisquam, natus quia aliquam consequatur. Cupiditate distinctio iusto eveniet numquam sunt blanditiis doloribus odio dignissimos impedit omnis voluptate ut deserunt dolorum rem magnam voluptatem exercitationem et maiores totam quis, amet officia non quisquam? Nisi placeat ex ducimus! Sunt voluptate pariatur commodi accusamus et quas reprehenderit quaerat ea minus facilis repellat cupiditate a consectetur, vero molestiae fugiat maiores possimus ut hic ipsa non amet exercitationem! Quia veritatis in, rerum hic soluta corrupti ea architecto deserunt tenetur odio molestias quae nemo quos totam aut et sequi dignissimos! Laborum deleniti rerum numquam quas neque, quidem incidunt, vero rem tempore repudiandae voluptates, dignissimos corrupti.</p>
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