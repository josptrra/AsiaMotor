<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Akun</title>
</head>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

<body>
    <!-- Daftar -->
    <section class="vh-100" style="background-color: #64cbed;">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
              <div class="row g-0">
                <div class="col-md-6 col-lg-5 d-none d-md-block">
                  <img src="img/login.png"
                    alt="daftar form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                </div>
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                  <div class="card-body p-4 p-lg-5 text-black">

                    <form action="/daftar" method="post">
                    @csrf
                      <div class="d-flex align-items-center mb-3 pb-1">
                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                        <span class="h1 fw-bold mb-0">Daftar</span>
                      </div>

                      <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Buat Akun Baru</h5>

                      <div class="form-outline mb-4">
                      <label class="form-label">Nama</label>  
                      <input type="text" name="name" class="form-control form-control-lg" required />
                        
                      </div>

                      <div class="form-outline mb-4">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control form-control-lg" required/>
                        
                      </div>

                      <div class="form-outline mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control form-control-lg" required/>
                        
                      </div>

                      <div class="pt-1 mb-4">
                        <button class="btn btn-primary btn-block" type="submit" >Daftar</button>
                       
                        <a class="btn btn-danger btn-user btn-block" href="/">
                          Kembali
                       </a>

                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</body>
</html>
