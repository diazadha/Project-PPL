<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Qurban.In - <?= $title ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="eCommerce HTML Template Free Download" name="keywords">
    <meta content="eCommerce HTML Template Free Download" name="description">

    <!-- Favicon -->
    <link href=" <?= base_url('assets/') ?> img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href=" <?= base_url('assets/') ?>lib/slick/slick.css" rel="stylesheet">
    <link href=" <?= base_url('assets/') ?>lib/slick/slick-theme.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- Template Stylesheet -->
    <link href=" <?= base_url('assets/') ?>css/style.css" rel="stylesheet">

</head>

<body>
    <!-- Top bar Start -->
    <div class="top-bar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <i class="fa fa-envelope"></i>
                    support@email.com
                </div>
                <div class="col-sm-6">
                    <i class="fa fa-phone-alt"></i>
                    +012-345-6789
                </div>
            </div>
        </div>
    </div>
    <!-- Top bar End -->

    <!-- Nav Bar Start -->
    <div class="nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                <a href="#" class="navbar-brand">MENU</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto">
                        <?php if ($title === 'Home') : ?>
                            <a href="<?= base_url('marketplace') ?>" class="nav-item nav-link active">
                                Home
                            </a>
                            <a href="<?= base_url('marketplace/toko') ?>" class="nav-item nav-link ">
                                Toko
                            </a>
                        <?php elseif ($title === 'Toko') : ?>
                            <a href="<?= base_url('marketplace') ?>" class="nav-item nav-link">
                                Home
                            </a>
                            <a href="<?= base_url('marketplace/toko') ?>" class="nav-item nav-link active">
                                Toko
                            </a>
                        <?php else : ?>
                            <a href="<?= base_url('marketplace') ?>" class="nav-item nav-link">
                                Home
                            </a>
                            <a href="<?= base_url('marketplace/toko') ?>" class="nav-item nav-link">
                                Toko
                            </a>
                        <?php endif; ?>
                        <!-- <a href="checkout.html" class="nav-item nav-link">Checkout</a> -->
                        <!-- <a href="my-account.html" class="nav-item nav-link">My Account</a> -->
                        <div class="nav-item dropdown">
                            <?php if ($this->session->userdata('namadepan')) : ?>
                                <a href="#" class="nav-link dropdown-toggle " data-toggle="dropdown">
                                    Hai, <?= $this->session->userdata('namadepan') ?>
                                </a>
                                <div class="dropdown-menu">
                                    <a href="<?= base_url('user_akun') ?>" class="dropdown-item">My Account</a>
                                </div>
                            <?php else : ?>
                                <a href="#" class="nav-link dropdown-toggle " data-toggle="dropdown">
                                    More
                                </a>
                                <div class="dropdown-menu">
                                    <!-- <a href="<?= base_url('user_akun') ?>" class="dropdown-item">My Account</a> -->
                                    <a href="<?= base_url('user_akun/login') ?>" class="dropdown-item">Login</a>
                                    <a href="<?= base_url('user_akun/register') ?>" class="dropdown-item">Register</a>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            Daftar Sebagai Mitra
                        </a>
                        <div class="dropdown-menu">
                            <a href="<?= base_url('penjual/register') ?>" class="dropdown-item">Mitra Penjual</a>
                            <a href="<?= base_url('tempatdistribusi/register') ?>" class="dropdown-item">Mitra Tempat Distribusi</a>
                        </div>
                    </div>
                    <!-- <div class="navbar-nav ml-auto">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">User Account</a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Login</a>
                                <a href="#" class="dropdown-item">Register</a>
                            </div>
                        </div>
                    </div> -->
                </div>
            </nav>
        </div>
    </div>
    <!-- Nav Bar End -->

    <!-- Bottom Bar Start -->
    <div class="bottom-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="logo">
                        <a href="<?= base_url('marketplace') ?>">
                            <img src=" <?= base_url('assets/') ?>img/qurban.in.png" alt="Logo">
                        </a>
                    </div>
                </div>
                <!-- <div class="col-md-6">
                    <div class="search">
                        <input type="text" placeholder="Search">
                        <button><i class="fa fa-search"></i></button>
                    </div>
                </div> -->
                <div class="col-md-9">
                    <div class="user">
                        <!-- <a href="wishlist.html" class="btn wishlist">
                            <i class="fa fa-heart"></i>
                            <span>(0)</span>
                        </a> -->
                        <a href="<?= base_url('marketplace/cart'); ?>" class="btn cart">
                            <i class="fa fa-shopping-cart"></i>
                            <span>(0)</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom Bar End -->