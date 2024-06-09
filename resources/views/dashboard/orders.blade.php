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
      @if (session()->has('message'))
        {!! html_entity_decode(session('message')) !!}
      @endif
    </div>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
</body>

</html>