  <!-- navbar start -->
  <nav class="navbar">
    <a href="/dashboard">
      <img src="img/loog.png" width="80" />
    </a>
    <a href="#" class="navbar-logo"><span>Rias Lenty</span></a>
    <div class="navbar-list-group">
      <a href="#home" class="navbar-list">Home</a>
      <a href="#about" class="navbar-list">Tentang Kami</a>
      <a href="#product" class="navbar-list">Kategori</a>
      <a href="/produk" class="navbar-list">Produk</a>
      <a href="#contact" class="navbar-list">Kontak</a>
    </div>
    <div class="navbar-list-group">
      <form action="/logout" method="post"  onclick="alert('Apakah Yakin Ingin Logout?')">
        @csrf
        <button type="submit" class="button">Logout</button>
      </form>
    </div>
    <div class="navbar-icon">
     
      <i data-feather="search" class="icon btn-modal" id="search" data-modal="searchModal"></i>
      <a href="/cart">
        <i data-feather="shopping-cart" class="icon" id="shopping-cart"></i>
      </a>
      <i data-feather="menu" class="icon" id="hamburger"></i>
    </div>
  </nav>
  <!-- navbar end -->