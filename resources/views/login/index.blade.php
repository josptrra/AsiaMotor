<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jual Beli Motor</title>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        .vh-100 {
            min-height: 100vh;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        .card {
            display: flex;
            flex-direction: row;
            border-radius: 1rem;
            overflow: hidden;
        }
        .card img {
            width: 100%;
            height: auto;
           object-fit: cover;
            display: block;
        }
        .card-body {
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .form-outline {
            margin-bottom: 1rem;
        }
        .alert {
            margin-bottom: 1rem;
        }
        .btn {
            margin-right: 0.5rem;
        }
    </style>
</head>
<body>
<body>
    <!-- Login -->
    <section class="vh-100" style="background-color: #64cbed;">
        <div class="container">
            <div class="card">
                <div class="col-md-6 d-none d-md-block">
                    <img src="img/login.png" alt="login form"/>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div class="card-body text-black">
        
                        <form action="/" method="post">
                            @csrf
                            <div class="d-flex align-items-center mb-3 pb-1">
                                <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                <span class="h1 fw-bold mb-0">Login</span>
                            </div>

                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Login sebelum lihat produk</h5>

                            @if (session()->has('loginError'))
                            <div class="alert alert-danger" role="alert">
                                {{ session("loginError") }}
                            </div>
                            @endif

                            @if (session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session("success") }}
                            </div>
                            @endif

                            <div class="form-outline mb-4">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control form-control-lg" required />
                                
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control form-control-lg" required />
                                
                            </div>

                            <div class="pt-1 mb-4">
                                <button class="btn btn-primary" type="submit">Login</button>
                                <!-- <a class="btn btn-danger btn-user btn-block" href="index.php">Kembali</a> -->
                            </div>
                        </form>

                        <div class="text-center">
                            <p>Belum memiliki akun? <a href="/daftar">Daftar disini</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
