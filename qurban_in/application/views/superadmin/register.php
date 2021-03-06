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
                                    <h1 class="h4 text-gray-900 mb-4">Super Admin (Qurban.In)</h1>
                                </div>
                                <?php if ($this->session->flashdata('message')) : ?>
                                    <?php $message = $this->session->flashdata('message'); ?>
                                    <?= '<div class="alert alert-success">' . $message . '</div>'; ?>
                                    <?php $this->session->unset_userdata('message'); ?>
                                <?php endif; ?>
                                <?php if ($this->session->flashdata('message1')) : ?>
                                    <?php $message = $this->session->flashdata('message1'); ?>
                                    <?= '<div class="alert alert-danger">' . $message . '</div>'; ?>
                                    <?php $this->session->unset_userdata('message1'); ?>
                                <?php endif; ?>
                                <form class="user" method="post" action="<?= base_url('superadmin/register'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" name="namadepan" id="namadepan" placeholder="Nama Depan">
                                            <?= form_error('namadepan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-control-user" name="namabelakang" id="namabelakang" placeholder="Nama Belakang">
                                            <?= form_error('namabelakang', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
                                            <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-user btn-block" style="background-color: #d7552a; color:white;">
                                        Register
                                    </button>
                                    <!-- <hr> -->
                                    <a href="<?= base_url('superadmin/login') ?>" class="btn btn-secondary btn-user btn-block">
                                        Sudah punya akun? Login Disini
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