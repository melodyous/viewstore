@extends('home.partials.main')

@section('container')
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
                    <span class="input-group-text @error('order1') border border-danger @enderror" id="addon-wrapping" style="width: 150px">Item</span>
                    <select class="form-select @error('order1') is-invalid @enderror" name="order1">
                        <option value="" selected>No item chosen</option>
                        @php
                            
                        @endphp
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" @selected(true)>{{ $product->name }}</option>
                            @endforeach
                        </select>
                        <input type="text" name="name" id="floatingInput" class="form-control @error('name') is-invalid @enderror" placeholder="Rp. " aria-label="Username" aria-describedby="addon-wrapping" value="@currency($product['price'])">
                </div>
                @error('order1')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror

                <button class="btn text-white" type="submit" style="background-color: #183153">Add Order</button>
            </form>
        </div>
        <div class="col-md-5 px-4">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo reiciendis veniam nostrum odio veritatis in molestiae laudantium? Quibusdam eligendi libero consequuntur aliquid, iusto laborum, atque sit obcaecati ipsum illo vel doloremque nobis recusandae neque placeat ex rem. Similique magni quidem corporis itaque incidunt deserunt mollitia quas, quod possimus commodi at cum ipsa eum doloribus ex id pariatur nisi, veritatis ab exercitationem, quibusdam odit vero temporibus repellat? Vitae quod sint, in amet illum modi autem aut, nesciunt quibusdam nobis nulla? Exercitationem, minus placeat earum laudantium tenetur illum animi sequi voluptates dolor maiores molestias amet dignissimos nemo saepe velit neque unde impedit quisquam, natus quia aliquam consequatur. Cupiditate distinctio iusto eveniet numquam sunt blanditiis doloribus odio dignissimos impedit omnis voluptate ut deserunt dolorum rem magnam voluptatem exercitationem et maiores totam quis, amet officia non quisquam? Nisi placeat ex ducimus! Sunt voluptate pariatur commodi accusamus et quas reprehenderit quaerat ea minus facilis repellat cupiditate a consectetur, vero molestiae fugiat maiores possimus ut hic ipsa non amet exercitationem! Quia veritatis in, rerum hic soluta corrupti ea architecto deserunt tenetur odio molestias quae nemo quos totam aut et sequi dignissimos! Laborum deleniti rerum numquam quas neque, quidem incidunt, vero rem tempore repudiandae voluptates, dignissimos corrupti.</p>
        </div>
    </div>
</section>
@endsection