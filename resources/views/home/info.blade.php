@extends('home.partials.main')

@section('container')
@if( session()->has('success') )
    @include('home.partials.modalNotif')
@endif

<section style="background-color: rgb(255, 255, 255);margin-top: 30px" class="shadow rounded">
<div class="container py-5 px-5">

    {{-- left column > img --}}
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    {{-- <img src="/storage/images/rahmat.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;"> --}}
                    <i class="fa-regular fa-user" style="font-size: 64px"></i>
                    <h4 class="my-3 fw-bold">Siska</h4>
                    <p class="text-muted mb-1">Student of Informatics Engineering</p>
                    <p class="text-muted mb-1">at</p>
                    <p class="text-muted mb-1 fw-bold">Raden Rahmat Malang Islamic University</p>
                    <div class="d-flex justify-content-center mb-2">
                </div>
            </div>
        </div>
    </div>

      {{-- right column --}}
      <div class="col-lg-8">
          <div class="card mb-4">
              <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0"><i class="fa-regular fa-user"></i> Full Name</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">Siska Rahmawati</p>
                    </div>
                  </div>
                  
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0"><i class="fa-regular fa-envelope"></i> Email</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">siskarahmawati@gmail.com</p>
                    </div>
                  </div>
                  
                  <hr>
                  <div class="row">
                      <div class="col-sm-3">
                          <p class="mb-0"><i class="fa-regular fa-map"></i> Address</p>
                      </div>
                      <div class="col-sm-9">
                          <p class="text-muted mb-0">Kepanjen, Kab. Malang</p>
                      </div>
                  </div>

                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0"><i class="fa-solid fa-chalkboard-user"></i> Lecturer</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">Sonhaji Akbar, S.Pd., M.Kom</p>
                    </div>
                  </div>

                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0"><i class="fa-solid fa-code-compare"></i> web Version</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">Beta</p>
                    </div>
                  </div>

              </div>
          </div>
      </div>
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