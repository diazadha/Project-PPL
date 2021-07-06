<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Qurban.In - <?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="" style="background-image: url('<?= base_url('assets/') ?>img/qurban_ani.jpg');  background-position: center; background-size:100%;">

    <div class="container">
        <center>
            <div class="card o-hidden border-0 shadow-lg my-5 col-md-6">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Registrasi Toko</h1>
                                </div>
                                <form class="user" method="post" action="<?= base_url('penjual/register'); ?>">
                                    <div class="form-group">

                                        <input type="text" class="form-control form-control-user" id="namatoko" name="namatoko" placeholder="Nama Toko">

                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="alamattoko" name="alamattoko" placeholder="Alamat Toko">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="notlp" name="notlp" placeholder="No. Telepon">
                                    </div>
                                    <!-- <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password">
                                    </div>
                                </div> -->
                                <button href="<?= base_url('tempatdistribusi/inputhewan') ?>"type="submit" class="btn btn-user btn-block" style="background-color: #d7552a; color:white;">
                                    Register Account
                                </button>
                                    <!-- <hr> -->
                                    <a href="<?= base_url('marketplace/') ?>" class="btn btn-secondary btn-user btn-block">
                                        <i class="fas fa-store"></i> Back To Home
                                    </a>
                                    <!-- <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a> -->
                                </form>
                                <hr>
                                <!-- <div class="text-center">
                                <a class="small" href="index.html">Back To Store</a>
                            </div> -->
                                <!-- <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
                            </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </center>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

</body>

</html>
