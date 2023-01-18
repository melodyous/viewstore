@extends('home.partials.main')

@section('container')
@if( session()->has('success') )
    @include('home.partials.modalNotif')
@endif

<section>
    <div class="row">
        <div class="col-md-7 px-4 py-3">
            <form action="/home/users/{{ $userEdit->id }}" method="POST">
                @method('put')
                @csrf

                <h3 class="fw-bold">{{ $userEdit->name }}</h3>
                <hr class="mb-4">

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1" style="width:100px">Name</span>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name" aria-label="Username" aria-describedby="basic-addon1" name="name" value="{{ old('name', $userEdit->name) }}">
                  </div>
                  @error('name')
                    <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                  @enderror
        
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1" style="width:100px">Username</span>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="username" aria-label="Username" aria-describedby="basic-addon1" name="username" value="{{ old('username', $userEdit->username) }}">
                  </div>
                  @error('username')
                    <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                  @enderror
        
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1" style="width:100px">Email</span>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="User Email" aria-label="email" aria-describedby="basic-addon1" name="email" value="{{ old('email', $userEdit->email) }}">
                  </div>
                  @error('email')
                    <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                  @enderror
        
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1" style="width:100px">Password</span>
                    <input type="text" class="form-control" placeholder="User password" aria-label="password" aria-describedby="basic-addon1" name="password" value="">
                  </div>
                  @error('password')
                    <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                  @enderror
        
                  <div class="input-group mb-2">
                    <span class="input-group-text @error('isAdmin') border border-danger @enderror" id="addon-wrapping" style="width: 100px">Role</span>
                    <select class="form-select @error('isAdmin') is-invalid @enderror" name="isAdmin">
                        @if ($userEdit->isAdmin == 1)
                            <option value="1" selected>Admin</option>
                            <option value="0">Not Admin</option>
                        @else
                            <option value="0" selected>Not Admin</option>
                            <option value="1">Admin</option>
                        @endif
                    </select>
                  </div>
                  @error('isAdmin')
                    <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                  @enderror

                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1" style="width:100px">Join at</span>
                    <input type="text" class="form-control" placeholder="User password" aria-label="password" aria-describedby="basic-addon1" name="password" value="{{ $userEdit->created_at }}" @disabled(true)>
                  </div>

                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1" style="width:100px">Updated at</span>
                    <input type="text" class="form-control" placeholder="User password" aria-label="password" aria-describedby="basic-addon1" name="password" value="{{ $userEdit->updated_at }}" @disabled(true)>
                  </div>


                <button class="btn text-white bg-danger w-100" type="submit" style="background-color: #183153"><i class="fa-solid fa-user-pen"></i> Edit User</button>
            </form>
        </div>
        <div class="col-md-5 px-4 py-3">
            <h4 class="fw-bold">User List</h4>
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
                            <th>Full Name</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <!--Table head-->
                
                        <!--Table body-->
                        <tbody>
                        @foreach ($users as $user)    
                        <tr>
                            <td scope="row">{{ $loop->iteration . "." }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-bars"></i></button>
                                    <ul class="dropdown-menu position-absolute">
                                        <li><a class="dropdown-item" href="/home/users/{{ $user->id }}/edit"><i class="fa-regular fa-eye"></i> Show</a></li>
                                        <li><a class="dropdown-item" href="/home/users/{{ $user->id }}/edit"><i class="fa-regular fa-pen-to-square"></i> Edit</a></li>
                                        <form action="/home/users/{{ $user->id }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button class="dropdown-item" onclick="return confirm('Are you sure ?')"><i class="fa-solid fa-ban"></i> Delete</button>
                                        </form>
                                    </ul>
                                </div>
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->isAdmin == 1 ? "Admin" : "Not Admin" ; }}</td>
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