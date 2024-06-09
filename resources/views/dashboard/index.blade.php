@extends('dashboard.layouts.main')

  <!-- section hero start -->
  <section class="hero" id="home">
   
    <div class="content">
      <h1>Asia<span>Motor</span></h1>
      <p>Temukan Motor Impian Anda di Asia Motor - Tempat Terbaik untuk Jual Beli Motor!</p>
      <a href="/produk" class="button">Pesan Sekarang</a>
    </div>
  </section>
  <!-- section hero end -->

  <!-- section about start -->
  <section class="about" id="about">
    <h2>Tentang <span>Kami</span></h2>

    <div class="row">
      <div class="image-wrapper border-2 border-blue-600 rounded-2xl">
        <img src="img/about.jpg" width="100" alt="tentang kami" class="image rounded-2xl" />
      </div>
      <div class="content">
        <h3>Selamat Datang di Asia Motor</h3>
        <p>
          Kami adalah dealer motor terpercaya yang berkomitmen untuk menyediakan pengalaman jual beli motor terbaik bagi Anda. Dengan bertahun-tahun pengalaman di industri otomotif, kami hadir untuk memenuhi kebutuhan transportasi Anda dengan berbagai pilihan motor berkualitas. 
        </p>
        <p>
         Asia Motor selalu mengutamakan kepuasan pelanggan dengan menyediakan pelayanan ramah, transparan, dan profesional. Kami percaya bahwa setiap pelanggan berhak mendapatkan motor yang sesuai dengan kebutuhan dan gaya hidup mereka.
        </p>
      </div>
    </div>
  </section>
  <!-- section about end -->

  <!-- section menu start -->
  <section class="product" id="product">
    <div class="header">
      <h2>Kategori <span>Motor</span></h2>
      <p>
        Menyediakan Pilihan Motor Terbaik untuk Anda
      </p>
    </div>
    <div class="card-container"></div>
  </section>
  <!-- section menu end -->

  <!-- section contact start -->
  <section class="contact" id="contact">
    <div class="header">
      <h2>Kontak <span>Kami</span></h2>
      <p>
        Jika Anda ingin menjual motor atau memiliki pertanyaan seputar produk kami, jangan ragu untuk menghubungi kami.
      </p>
    </div>
    <div class="row">
      <div class="image-wrapper">
      <img src="img/contact.jpg" width="100" alt="kontak kami" class="image" />
      </div>
      <div class="form-wrapper">
        <form action="form_proses.php" method="POST" class="form">
          <div class="form-group">
            <label for="nama" class="label">Nama</label>
            <input
              type="text" name="nama"
              id="nama_lengkap"
              class="input input-name"
              placeholder="Nama"
              required
            />
          </div>
          <div class="form-group">
            <label for="email" class="label">Alamat email</label>
            <input
              type="text" name="email"
              id="alamat_email"
              class="input input-email"
              placeholder="Alamat email"
              required
            />
          </div>
          <div class="form-group">
            <label for="nomor" class="label">Nomor telepon</label>
            <input
              type="number" name="nomor" 
              id="nomor_telepon"
              class="input input-nomor"
              placeholder="No.telepon"
              required
            />
          </div>
          <button type="submit" class="button btn-submit">Submit</button>
        </form>
      </div>
    </div>
  </section>
  <!-- section contact end -->

  <!-- footer start -->
  <footer class="footer h-24">
    <div class="wrapper">
      <a href="#home">Home</a>
      <div class="w-[2px] bg-white h-full"></div>
      <a href="#about">Tentang Kami</a>
      <div class="w-[2px] bg-white h-full"></div>
      <a href="#product">Paket Kami</a>
      <div class="w-[2px] bg-white h-full"></div>
      <a href="#contact">Kontak</a>
    </div>
    <span>developed by <a href="#" target="_blank">Pemas</a> | © 2024</span>
  </footer>
  <!-- footer end -->

  <!-- search input modal start -->
  <div class="modal" data-id="searchModal">
    <div class="modal-header">
      <h3>Search Modal</h3>
      <i data-feather="x-circle" class="btn-modal-close"></i>
    </div>
    <div class="modal-body">
      <div class="form-group">
        <input
          type="text"
          class="input search-input"
          placeholder="ketikkan nama produk ..."
        />
      </div>
      <!-- product container start -->
      <div class="product-container"></div>
      <!-- product container end -->
    </div>
  </div>
  <!-- search input modal end -->

  <!-- shopping cart modal start -->
  <div class="modal" data-id="tableModal">
    <div class="modal-header">
      <h3>Shopping Cart Modal</h3>
      <i data-feather="x-circle" class="btn-modal-close"></i>
    </div>
    <div class="modal-body">
      <!-- list start -->
      <div class="box-container"></div>
      <!-- list end -->
      <div class="wrapper">
        <h4>Total Biaya :</h4>
        <span class="price">0</span>
      </div>
      <button class="button button-checkout">Checkout</button>
    </div>
  </div>
  <!-- shopping cart modal end -->


