<?php foreach ($detail_toko as $t) : ?>
<?php endforeach; ?>
<!-- Product Detail Start -->
<div class="product-detail">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="product-detail-top">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <!-- <center> -->
                            <div class="header normal">
                                <div class="header">
                                    <img src="<?= base_url('assets/'); ?>img/toko.jpg" alt="Slider Image" style="height:100%; width: 100%; border-style:solid; border-color:tomato" />
                                </div>
                            </div>
                            <!-- </center> -->
                        </div>
                        <div class="col-md-7">
                            <div class="product-content">
                                <div class="title">
                                    <h2><?= $t->nama_toko; ?></h2>
                                </div>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="price">
                                    <div class="title">
                                    <h4>Alamat</h4>
                                    <br>
                                    <p style="color:grey; font-size:medium"><?= $t->alamat; ?></p>
                                    </div>
                                </div>
                                <div class="price">
                                    <div class="title">
                                    <h4>Kota</h4>
                                    <br>
                                    <p style="color:grey; font-size:medium"><?= $t->kota; ?></p>
                                </div>
                                </div>
                                <div class="price">
                                    <div class="title">
                                    <h4>Provinsi</h4>
                                    <br>
                                    <p style="color:grey; font-size:medium"><?= $t->provinsi; ?></p>
                                </div>
                                </div>
                                <div class="price">
                                    <div class="title">
                                    <h4>No. Telepon</h4>
                                    <br>
                                    <p style="color:grey; font-size:medium"><?= $t->notelp; ?></p>
                                </div>
                                </div>
                            </div>
                            <div class="modal-footer ml-auto">
                                <a href="<?= base_url('marketplace/toko'); ?>">
                                    <div class="btn btn-sm btn-secondary">Kembali</div>
                                </a>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="product">
                    <div class="featured-product product">
                        <div class="section-header">
                            <h1>Hewan Qurban</h1>
                        </div>

                        <div class="row align-items-center product product-3">
                            <div class="col-lg-4 mb-4">
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#">Product Name</a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="<?= base_url('marketplace/detail_produk'); ?>">
                                            <img src=" <?= base_url('assets/') ?>img/domba_garut.jpg" alt="Product Image" style="width: 500px; height: 300px;">
                                        </a>
                                        <!-- <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div> -->
                                    </div>
                                    <div class="product-price">
                                        <h3><span>$</span>99</h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>



            <!-- Side Bar Start -->
            <div class="col-lg-4 sidebar">
                <div class="sidebar-widget category">
                    <h2 class="title">Kategori</h2>
                    <nav class="navbar bg-light">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-female"></i>Fashion & Beauty</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-child"></i>Kids & Babies Clothes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-tshirt"></i>Men & Women Clothes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-mobile-alt"></i>Gadgets &
                                    Accessories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-microchip"></i>Electronics &
                                    Accessories</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- Side Bar End -->
        </div>
    </div>
</div>
<!-- Product Detail End -->
