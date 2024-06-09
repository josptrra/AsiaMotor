@php
use App\Models\Cart;

    $initial_payment_percentage = 5; 
    $grand_total = 0;
	$items = [];

    $cartItems = Cart::selectRaw('CONCAT(product_name, "(", qty, ")") AS ItemQty, total_price')->get();

    foreach ($cartItems as $cartItem) {
        $grand_total += $cartItem->total_price;
        $items[] = $cartItem->ItemQty;
    }
    $allItems = implode(', ', $items);

    // Calculate initial payment and remaining payment
    $initial_payment = ($initial_payment_percentage / 100) * $grand_total;
    $remaining_payment = $grand_total - $initial_payment;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Asia Motor</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
</head>

<body>
  <!-- Navbar start -->
  <nav class="navbar navbar-expand-md navbar-light" style="background-color: #6495ed;">
    <a class="navbar-brand" href="menu.php"><img src="img/loog.png" width="60" />&nbsp;&nbsp;</a>
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
          <a class="nav-link" href="/produk"><i class="fas fa-th-list mr-2"></i>Produk</a>
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
      <div class="col-lg-6 px-4 pb-4" id="order">
        <h4 class="text-center text-info p-2">Selesaikan Pesanan Anda!</h4>
        <div class="jumbotron p-3 mb-2 text-center">
          <h6 class="lead"><b>Paket: </b><?= $allItems; ?></h6>
          <h6 class="lead"><b>Ongkos Kirim : </b>Gratis</h6>
          <h5><b>Total Bayar : </b><?= number_format($grand_total,2) ?>/-</h5>
          <h5><b>Bayar Awal : </b><?= number_format($initial_payment, 2) ?>/-</h5>
          <h5><b>Sisa Bayar : </b><?= number_format($remaining_payment, 2) ?>/-</h5>
        </div>
        <form action="/order" method="post">
          @csrf
          <input type="hidden" name="products" value="<?= $allItems; ?>">
          <input type="hidden" name="amount_paid" value="<?= $grand_total; ?>">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter E-Mail" required>
          </div>
          <div class="form-group">
            <input type="tel" name="phone" class="form-control" placeholder="Enter Phone" required>
          </div>
          <div class="form-group">
            <textarea name="address" class="form-control" rows="3" cols="10" placeholder="Enter Delivery Address Here..."></textarea>
          </div>
          <h6 class="text-center lead">Metode Pembayaran</h6>
          <div class="form-group">
            <select name="pmode" class="form-control">
              <option value="" selected disabled>-Pilih Metode Pembayaran-</option>
              <option value="cod">Cash On Delivery</option>
              <option value="Dana">Dana/QRIS</option>
            </select>
           
          </div>
          <div class="form-group"> 
             <img src="img/dana.jpg" width="100" alt="qris" class="image"/>
            <input type="submit" value="Place Order" class="btn btn-primary btn-block">
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

</body>

</html>