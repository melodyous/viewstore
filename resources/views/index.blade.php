@extends('login.partials.main')

@section('container')
<div class="row justify-content-center" style="margin-top: 100px">
    <div class="col-lg-4 border-light shadow p-4 rounded" style="background-color: rgb(250, 250, 250)">
        <main class="form-signin w-100 m-auto p-4">
            <form action="/" method="post">
                @csrf
                <h3 class="text-center mb-5" style="font-weight: 800; color: #183153">VIEWSTORE</h3>
                @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                    <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="{{ old('username') }}">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                </div>

            
                <button class="w-100 btn btn-lg text-white" type="submit" style="background-color: #183153">Login</button>
            </form>
        </main>
    </div>
</div>
@endsection