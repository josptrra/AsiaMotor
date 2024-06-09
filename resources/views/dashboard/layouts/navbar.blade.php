  <!-- navbar start -->
  <nav class="navbar ">
    <a href="/dashboard" class="w-[9%]">
      <img src="img/loog.png" width="80" />
    </a>
    <div class="navbar-list-group">
      <a href="#home" class="navbar-list">Home</a>
      <a href="#about" class="navbar-list">Tentang Kami</a>
      <a href="/produk" class="navbar-list">Produk</a>
      <a href="#product" class="navbar-list">Kategori</a>
      <a href="#contact" class="navbar-list">Kontak</a>
    </div>
      <div class="navbar-icon flex items-center">
      <form action="/logout" method="post"  onclick="alert('Apakah Yakin Ingin Logout?')">
        @csrf
        <button type="submit" class="button">Logout</button>
      </form>
      <i data-feather="search" class="icon btn-modal" id="search" data-modal="searchModal"></i>
      <a href="/cart">
        <i data-feather="shopping-cart" class="icon" id="shopping-cart"></i>
      </a>
      <i data-feather="menu" class="icon" id="hamburger"></i>
    </div>
  </nav>
  <!-- navbar end -->