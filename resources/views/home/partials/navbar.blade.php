<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #183153">
    <div class="container">
      <a class="navbar-brand" style="font-weight: 800" href="/home">VIEWSTORE</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
  
        <ul class="navbar-nav ms-auto">
            {{-- <li class="nav-item">
                <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="/home"><i class="fa-solid fa-house"></i> Home</a>
            </li> --}}

            <li class="nav-item">
                <a class="nav-link {{ Request::is('home/orders*') ? 'active' : '' }} {{ Request::is('home') ? 'active' : '' }}" href="/home/orders"><i class="fa-solid fa-hard-drive"></i> Orders</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ Request::is('home/products*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-box"></i> Products
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/home/products"><i class="fa-solid fa-box-open"></i> All Products</a></li>
                  <li><a class="dropdown-item" href="/home/products/create"><i class="fa-solid fa-file-circle-plus"></i> Add Product</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="/home/categories"><i class="fa-solid fa-layer-group"></i> All Products Category</a></li>
                  <li><a class="dropdown-item" href="/home/categories/create"><i class="fa-solid fa-file-circle-plus"></i> Add Products Category</a></li>
                </ul>
            </li>

            @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ Request::is('home/users*') ? 'active' : '' }} {{ Request::is('home/info') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-user"></i> {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/dashboard/users/{{ auth()->user()->id }}"><i class="fa-solid fa-user-gear"></i> Settings</a></li>
                <li><a class="dropdown-item" href="/home/info"><i class="fa-solid fa-bullhorn"></i> Info</a></li>
                <li><hr class="dropdown-divider"></li>
                <li class="dropdown-item">
                    <form action="/logout" method="POST">
                      @csrf
                      <button type="submit" class="nav-link border-0" style="background-color: white; color: inherit;"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
                    </form>
                </li>
                </ul>
            </li>
            
            @endauth
        </ul>
      </div>
    </div>
  </nav>