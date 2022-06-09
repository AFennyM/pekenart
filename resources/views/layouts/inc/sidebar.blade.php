<div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper" style="background-color: #e97368">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text">
                PekenArt Shop
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item {{ Request::is('dashboard') ? 'active':'' }}">
                <a class="nav-link" href="{{ url('dashboard') }}">
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('kategori') ? 'active':'' }}">
                <a class="nav-link" href="{{ url('kategori') }}">
                    <p>Data Kategori</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('tambah-kategori') ? 'active':'' }}">
                <a class="nav-link" href="{{ url('tambah-kategori') }}">
                    {{-- <i class="nc-icon nc-circle-09"></i> --}}
                    <p>Tambah Kategori</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('produk') ? 'active':'' }}">
                <a class="nav-link" href="{{ url('produk') }}">
                    
                    <p>Data Produk</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('tambah-produk') ? 'active':'' }}">
                <a class="nav-link" href="{{ url('tambah-produk') }}">
                    
                    <p>Tambah produk</p>
                </a>
            </li>
            {{-- <li>
                <a class="nav-link" href="./table.html">
                    <i class="nc-icon nc-notes"></i>
                    <p>Table List</p>
                </a>
            </li> --}}
        </ul>
    </div>
</div>