<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Paket</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' />


</head>

<body>
  <!-- Navbar start -->
  <nav class="navbar navbar-expand-md navbar-light" style="background-color: #6495ed;">
    <a class="navbar-brand" href="index.php"><img src="img/loog.png" width="80" />&nbsp;&nbsp;</a>
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
          <a class="nav-link" href="#"><i class="fas fa-th-list mr-2"></i>Produk</a>
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

  <!-- Displaying Products Start -->
  <div class="container">
    @if (session()->has('successCart'))
    <div class="alert alert-success mt-3">
      <p class="fw-bold">{{ session('successCart') }}</p>
    </div>
    @endif

    @if (session()->has('failCart'))
    <div class="alert alert-danger mt-3">
      <p class="fw-bold">{{ session('failCart') }}</p>
    </div>
    @endif

    <div class="row mt-2 pb-3">

      @foreach ($datas as $data)

      <!-- <div class="col-md-4 col-lg-4 mb-3"> -->
      <div class="col-sm-6 col-md-4 col-lg-4 mb-2">
        <div class="card-deck">
          <div class="card p-2 border-secondary mb-2">
            <img src="<?= $data['product_image'] ?>" class="card-img-top" height="250">

            <div class="card-body p-1">
              <h4 class="card-title text-center text-info"><?= $data['product_name'] ?></h4>
              <h5 class="card-text text-center text-danger">Rp. <?= number_format(intval($data['product_price']), 0, ',', '.') ?></h5>
              <button class="btn btn-outline-primary btn-block viewDetailBtn" data-toggle="modal" data-target="#detailModal" data-detail="<?= htmlspecialchars($data['detail']) ?>">Lihat Detail</button>
            </div>

            <div class="card-footer p-1">
              <form action="/cart" method="post" class="form-submit">
                @csrf
                <div class="row p-2">
                  <div class="col-md-6 py-1 pl-4">
                    <b>Stok: </b><?= $data['product_qty'] ?>
                  </div>
                  <div class="col-md-6">
                    <input type="number" name="pqty" class="form-control pqty" value="1">
                  </div>
                </div>
                <input type="hidden" name="pname" class="pname" value="<?= $data['product_name'] ?>">
                <input type="hidden" name="pprice" class="pprice" value="<?= $data['product_price'] ?>">
                <input type="hidden" name="pimg" class="pimage" value="<?= $data['product_image'] ?>">
                <input type="hidden" name="pcode" class="pcode" value="<?= $data['product_code'] ?>">
                <button class="btn btn-success btn-block addItemBtn" type="submit"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Pesan</button>
              </form>

            </div>
          </div>
        </div>
      </div>

      @endforeach
    </div>
  </div>
  <!-- Displaying Products End -->

  <!-- Modal -->
  <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="detailModalLabel">Detail Produk</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p id="detailContent"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
  <!--END MODAL -->

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
    // Display product detail in the modal
    $(".viewDetailBtn").click(function() {
      var detail = $(this).data('detail');
      $("#detailContent").text(detail);
    });
  </script>

</body>

</html>