<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cart</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
</head>

<body>
 <!-- Navbar start -->
 <nav class="navbar navbar-expand-md navbar-light" style="background-color: #6495ed;">
    <a class="navbar-brand" href="/dashboard"><img src="img/loog.png" width="80" />&nbsp;&nbsp;</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ">
        <li class="nav-item">
          <a class="nav-link" style="font-weight: bold" href="/dashboard">Home</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="/produk"><i class="fas fa-th-list mr-2"></i>Paket</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/cart"><i class="fas fa-shopping-cart"></i> 
            <span id="cart-item" class="badge badge-danger">
                {{ session('cartItemCount', 0) }}
            </span>
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Navbar end -->

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        @if (session()->has('successCart'))
          <div class="alert alert-success mt-3">
            <p class="fw-bold">{{ session('successCart') }}</p>
          </div>
        @endif
        <div class="table-responsive mt-2">
          <table class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <td colspan="6">
                  <h4 class="text-center text-info m-0">Pesanan di keranjang Anda!</h4>
                </td>
              </tr>
              <tr>
                <th>Gambar</th>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>
                  <form action="/cart/clear" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="badge-danger badge p-1" onclick="return confirm('Hapus seluruh isi keranjang anda?');"><i class="fas fa-trash"></i>&nbsp;&nbsp;Bersihkan</button>
                  </form>
                </th>
              </tr>
            </thead>
            <tbody>

              @php
                $grand_total = 0;
              @endphp
              @foreach ($datas as $data)
              <tr>
                <input type="hidden" class="pid" value="<?= $data['id'] ?>">
                <td><img src="<?= $data['product_image'] ?>" width="50"></td>
                <td><?= $data['product_name'] ?></td>
                <td>
                  Rp. <?= number_format($data['product_price'],2); ?>
                  </td>
                  <input type="hidden" class="pprice" value="<?= $data['product_price'] ?>">
                  <td>
                    <input type="number" class="form-control itemQty" value="<?= $data['qty']?>" max="<?= $data['qty']?>" min="1" style="width:75px;">
                    </td>
                    <td>Rp. <?= number_format($data['total_price'],2); ?></td>
                    <td>
                      <form action="/cart/remove" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="cart_item_id" value="{{ $data->id }}">
                        <button type="submit" class="text-danger lead" onclick="return confirm('Apa kamu ingin menghapus');"><i class="fas fa-trash-alt"></i></button>
                      </form>
                </td>
                </tr>
                @php
                  $grand_total += $data['total_price'];
                @endphp 
                @endforeach
                <tr>
                  <td colspan="2">
                    <a href="/produk" class="btn btn-outline-primary"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Tambah
                      Produk</a>
                      </td>
                      <td colspan="2"><b>Jumlah Bayar</b></td>
                      <td><b>Rp. <?= number_format($grand_total,2); ?></b></td>
                      <td>
                        <a href="/checkout" class="btn btn-success <?= ($grand_total > 1) ? '' : 'disabled'; ?>"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Bayar</a>
                      </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

</body>

</html>