<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/fontawesome/css/all.css">
    <link rel="icon" href="https://w7.pngwing.com/pngs/842/19/png-transparent-logo-graphic-design-logo-v-logo-monochrome-black.png">
  </head>
  <body>
    
    @include('home.partials.navbar')
    @include('home.partials.modalAddUser')


    <div class="container" style="margin-top: 100px">
        @yield('container')
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>
      // tutup modal notifikasi
      document.querySelector('#modalAddUser_show').addEventListener('click', evt => {
          if( !evt.target.matches('button') ) return;
          var modal = document.getElementById("#modalAddUser");
          modal.classList.add('d-block');
      })

      const myModal = document.getElementById('#modalAddUser_show')
      const myInput = document.getElementById('modalAddUser')

      myModal.addEventListener('shown.bs.modal', () => {
        myInput.focus()
      })
    </script>

  </body>

</html>