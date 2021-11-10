<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <style>
        @media only screen and (min-width: 992px) {
            .login-custom{
                 margin-top: 85px;
                 margin-bottom: 85px;
            }
        }
    </style>
    <title>LOGIN ADMIN - INFORMASI PERPUSTAKAAN</title>

    <link href="<?php echo base_url("assets/admin/"); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="<?php echo base_url("assets/admin/"); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-secondary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6 login-custom">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">SELAMAT DATANG, ADMIN!</h1>
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Masukan username...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Masukan password...">
                                        </div>
                                        <?php if ($this->session->flashdata("gagal_login")): ?>
                                            <div class="alert alert-warning small text-center">
                                                Gagal login, silahkan cek username dan password!
                                            </div>
                                        <?php endif; ?>
                                        <input type="submit" name="login" class="btn btn-secondary btn-user btn-block" value="LOGIN">

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <p class="small text-muted">DIBUAT DENGAN <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill text-danger" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/></svg> ICWR-TEAM &copy; 2021</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script src="<?php echo base_url("assets/admin/"); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url("assets/admin/"); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url("assets/admin/"); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?php echo base_url("assets/admin/"); ?>js/sb-admin-2.min.js"></script>

</body>

</html>
