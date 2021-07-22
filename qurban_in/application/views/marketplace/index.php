<!-- Main Slider Start -->
<div class="header">
    <div class="container-fluid">
        <center>
            <div class="col-md-12">
                <div class="header-slider normal-slider">
                    <div class="header-slider-item">
                        <img src=" <?= base_url('assets/') ?>img/sapi_bali.jpg" alt="Slider Image" style="width:960px; height:560px;" />
                        <!-- <div class="header-slider-caption">
                                <p>Some text goes here that describes the image</p>
                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Shop Now</a>
                            </div> -->
                    </div>
                    <div class="header-slider-item">
                        <img src=" <?= base_url('assets/') ?>img/kambing.jpeg" alt="Slider Image" style="width:960px; height:560px;" />
                        <!-- <div class="header-slider-caption">
                                <p>Some text goes here that describes the image</p>
                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Shop Now</a>
                            </div> -->
                    </div>
                    <div class="header-slider-item">
                        <img src=" <?= base_url('assets/') ?>img/kambing3.jpg" alt="Slider Image" style="width:960px; height:560px;" />
                        <!-- <div class="header-slider-caption">
                                <p>Some text goes here that describes the image</p>
                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Shop Now</a>
                            </div> -->
                    </div>
                </div>
            </div>
        </center>
        <!-- <div class="col-md-3">
                    <div class="header-img">
                        <div class="img-item">
                            <img src="img/category-1.jpg" />
                            <a class="img-text" href="">
                                <p>Some text goes here that describes the image</p>
                            </a>
                        </div>
                        <div class="img-item">
                            <img src="img/category-2.jpg" />
                            <a class="img-text" href="">
                                <p>Some text goes here that describes the image</p>
                            </a>
                        </div>
                    </div>
                </div> -->
        <!-- </div> -->
    </div>
</div>
<!-- Main Slider End -->

<!-- Brand Start -->
<div class="brand">
    <div class="container-fluid">
        <div class="brand-slider">
            <div class="brand-item"><img src="<?= base_url('assets/'); ?>img/brand-1.png" alt=""></div>
            <div class="brand-item"><img src="<?= base_url('assets/'); ?>img/brand-2.png" alt=""></div>
            <div class="brand-item"><img src="<?= base_url('assets/'); ?>img/brand-3.png" alt=""></div>
            <div class="brand-item"><img src="<?= base_url('assets/'); ?>img/brand-4.png" alt=""></div>
            <div class="brand-item"><img src="<?= base_url('assets/'); ?>img/brand-5.png" alt=""></div>
            <div class="brand-item"><img src="<?= base_url('assets/'); ?>img/brand-6.png" alt=""></div>
        </div>
    </div>
</div>
<!-- Brand End -->

<!-- Call to Action Start -->
<!-- <div class="call-to-action">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1>call us for any queries</h1>
                </div>
                <div class="col-md-6">
                    <a href="tel:0123456789">+012-345-6789</a>
                </div>
            </div>
        </div>
    </div> -->
<!-- Call to Action End -->

<div class="container-fluid" style="background-color: white;">
    <div class="section-header">
        <p style="color:black; font-weight:bold; text-align:center; font-size:large;"> <span style="font-size: x-large; color:tomato;"> Qurban.In </span> adalah sebuah marketplace yang khusus untuk penjualan dan pendistribusian hewan qurban. <br> Latar belakang diciptakanya marketplace ini adalah karena kami sebagai tim developer merasa bahwa masih ada beberapa wilayah yang pembagianya tidak merata. Maka dari itu pada marketplace ini disediakan juga salah satu fitur bagi user untuk bisa mendaftar menjadi mitra tempat distribusi, sehingga pembeli hewan qurban bisa mendistribusikan hewanya ke tempat distribusi tersebut. Pada saat mendaftar menjadi mitra tempat distribusi tentu saja ada beberapa validasi yang harus dilakukan oleh pendaftar, contohnya seperti dokumen tempat, foto yang mendukung, dll. </p>
        <p style="color:black; font-weight:bold; text-align:center; font-size:large;">Sampai saat ini, sistem ini masih dalam tahap pengembangan dan penyelesaian. <br> Sistem ini juga merupakan tugas besar dari salah satu mata kuliah di Universitas Al-Azhar Indonesia Prodi Informatika yaitu Proyek Perangkat Lunak.</p>
        <center>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">

                        <img src=" <?= base_url('assets/') ?>img/UAI.png" alt="" style="width: 250px; height:130px;">

                    </div>
                    <div class="col-lg-4">

                        <img src=" <?= base_url('assets/') ?>img/IF_UAI.png" alt="" style="width: 210px; height:120px;">

                    </div>
                    <div class="col-lg-4">

                        <img src=" <?= base_url('assets/') ?>img/six_go.png" alt="" style="width:250x; height:110px;">
                    </div>
                </div>
            </div>
        </center>
    </div>
</div>


<!-- Featured Product Start -->
<div class="product-view">
    <div class="featured-product product">
        <div class="container-fluid">
            <div class="section-header">
                <h1>Hewan Qurban</h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-view-top">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="product-search">
                                            <form action="<?= base_url('marketplace/search') ?>" method="POST">
                                                <input type="text" name="key" id="key" style="color: black;">
                                                <button type="submit"><i class="fa fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="product-short">
                                            <div class="dropdown">
                                                <div class="dropdown-toggle" data-toggle="dropdown">Berat (Kg. )
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href=" <?= base_url('marketplace'); ?> " class="dropdown-item" style="font-weight: bolder;">Semua Berat</a>
                                                    <a href=" <?= base_url('marketplace/filter_berat?from=20&until=81'); ?> " class="dropdown-item" style="font-weight: bolder;">20 Kg - 80 Kg</a>
                                                    <a href="<?= base_url('marketplace/filter_berat?from=81&until=100'); ?>" class="dropdown-item" style="font-weight: bolder;">81 Kg - 99 Kg</a>
                                                    <a href="<?= base_url('marketplace/filter_berat_diatas?val=100'); ?>" class="dropdown-item" style="font-weight: bolder;">>= 100 Kg</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="product-price-range">
                                            <div class="dropdown">
                                                <div class="dropdown-toggle" data-toggle="dropdown">Harga (Rp. )
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href=" <?= base_url('marketplace'); ?> " class="dropdown-item" style="font-weight: bolder;">Semua Harga</a>
                                                    <a href=" <?= base_url('marketplace/filter_harga?from=1000000&until=11000000'); ?> " class="dropdown-item" style="font-weight: bolder;">1 Jt - 10 Jt</a>
                                                    <a href="<?= base_url('marketplace/filter_harga?from=11000000&until=51000000'); ?>" class="dropdown-item" style="font-weight: bolder;">11 Jt - 50 Jt</a>
                                                    <a href="<?= base_url('marketplace/filter_harga_diatas?val=50000000'); ?>" class="dropdown-item" style="font-weight: bolder;">>= 50 Jt</a>
                                                    <!-- <a href="#" class="dropdown-item">$151 to $200</a>
                                                    <a href="#" class="dropdown-item">$201 to $250</a>
                                                    <a href="#" class="dropdown-item">$251 to $300</a>
                                                    <a href="#" class="dropdown-item">$301 to $350</a>
                                                    <a href="#" class="dropdown-item">$351 to $400</a>
                                                    <a href="#" class="dropdown-item">$401 to $450</a>
                                                    <a href="#" class="dropdown-item">$451 to $500</a> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center product product-4">
                <!-- <div class="col-lg-3 mb-4">
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
                            <a href="">
                                <img src=" <?= base_url('assets/') ?>img/domba_garut.jpg" alt="Product Image" style="width: 500px; height: 300px;">
                            </a>
                            <div class="product-action">
                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                                <a href="#"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="product-price">
                            <h3><span>$</span>99</h3>
                            <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                        </div>
                    </div>
                </div> -->
                <?php foreach ($tampil_hewan as $h) : ?>
                    <div class="col-lg-3 mb-4">
                        <div class="product-item">
                            <div class="card-deck">
                                <div class="card" style="border-color:tomato; border-width: 1px; ">
                                    <img src="<?= base_url('uploads/hewan/') . $h->foto_hewan; ?>" class="card-img-top" alt="..." style=" height:250px;">
                                    <div class="card-body">
                                        <h3 class="card-title" style="font-weight: bold;"><?= ucwords($h->nama_hewan); ?></h3>
                                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <h4 style="text-align: right; font-weight:bolder;">Rp. <?= number_format($h->harga, 0, ',', '.') ?> </h4>
                                        <h4 style="text-align: right; font-size:medium; font-weight:bolder;"><?= $h->nama_toko; ?> </h4>
                                        <h4 style="text-align: right; font-size:medium; font-weight:bolder;"><?= $h->berat . ' Kg' ?> </h4>
                                        <hr>
                                        <div class="card-footer">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-6 mb-4">
                                                        <a class="btn" href="<?= base_url('marketplace/detail_produk/') . $h->id_hewan; ?>" style="text-align: center; background-color:tomato; color:white; "><i class="fas fa-door-open"></i> Detail </a>
                                                    </div>
                                                    <div class="col-lg-6 mb-4" style="text-align: right;">
                                                        <a class="btn" href=" <?= base_url('marketplace/tambah_ke_keranjang/') . $h->id_hewan; ?> " style="text-align: center; position:relative; "><i class="fas fa-shopping-cart"></i> Tambah </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- Pagination Start -->
        <!-- <div class="col-md-12">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div> -->
    </div>
    <!-- Pagination Start -->
</div>
<!-- Featured Product End -->