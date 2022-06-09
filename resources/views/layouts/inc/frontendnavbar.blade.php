<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">PekenArt</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Beranda</a>
          <a class="nav-link" href="{{ url('kategori-produk') }}">Kategori</a>
          <a class="nav-link" href="{{ url('keranjang') }}">Keranjang</a>
          <a class="nav-link" href="{{ url('pesanan-saya') }}">Pesanan</a>
          {{-- <a class="nav-link disabled">Disabled</a> --}}
            @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}" class="nav-link">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="nav-link">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                        @endif
                    @endauth
                
            @endif
          </div>
        </div>
      </div>
    </div>
  </nav>