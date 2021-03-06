<!-- Product Detail Start -->
<div class="product-detail">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="product-detail-top">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <center>
                                <div class="header normal">
                                    <div class="header-slider-item">
                                        <img src="<?= base_url('./uploads/hewan/') . $tampil_hewan->foto_hewan; ?>" alt="Slider Image" style="height: 100%; width: 100%; border-color:tomato; border-style:solid;" />
                                    </div>
                                </div>
                                <!-- <div class="product-slider-single normal-slider">
                                        <img src="img/sapi.jpg" alt="Product Image"
                                            style="height: 400px; width: 300px;">
                                        <img src="img/sapi_bali.jpg" alt="Product Image"
                                            style="height: 400px; width: 300px;">
                                        <img src="img/sapi_limosin.jpg" alt="Product Image"
                                            style="height: 400px; width: 300px;">
                                    </div> -->
                            </center>
                        </div>
                        <div class="col-md-7">
                            <div class="product-content">
                                <div class="title">
                                    <h1><?= ucwords($tampil_hewan->nama_hewan); ?></h1>
                                </div>
                                <!-- <div class="ratting">
                                    <?php for ($i = 1; $i <= $tampil_hewan->kelas; $i++) : ?>
                                        <i class="fa fa-star"></i>
                                    <?php endfor; ?>
                                </div> -->
                                <div class="price">
                                    <h4>Harga:</h4>
                                    <!-- <span>$149</span> -->
                                    <p style="font-size: large;">Rp. <?= number_format($tampil_hewan->harga, 0, ',', '.') ?> </p> <br>
                                    <h4>Jenis: </h4>
                                    <p style="font-size: large;"><?= $tampil_hewan->jenis; ?></p> <br>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h4>Kode Hewan: </h4>
                                            <p style="font-size: large;"> <?= $tampil_hewan->kode_hewan; ?> </p>
                                        </div>
                                        <div class="col-lg-6">
                                            <h4>Berat:</h4>
                                            <p style="font-size: large;"> <?= $tampil_hewan->berat . ' Kg' ?> </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="quantity">
                                    <div class="row">
                                        <div class="price col-lg-6">
                                            <h4>Jumlah:</h4>
                                            <p style="font-size: large;">1</p>
                                            <div class="qty">
                                                <!-- <button class="btn-minus"><i class="fa fa-minus"></i></button> -->
                                                <!-- <input type="text" value="1" readonly> -->

                                                <!-- <button class="btn-plus"><i class="fa fa-plus"></i></button> -->
                                            </div>
                                        </div>
                                        <div class="price col-lg-6">
                                            <h4>Kategori:</h4>
                                            <p style="font-size: large;"> <?= $tampil_hewan->kategori; ?> </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="p-size">
                                        <h4>Size:</h4>
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn">S</button>
                                            <button type="button" class="btn">M</button>
                                            <button type="button" class="btn">L</button>
                                            <button type="button" class="btn">XL</button>
                                        </div>
                                    </div>
                                    <div class="p-color">
                                        <h4>Color:</h4>
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn">White</button>
                                            <button type="button" class="btn">Black</button>
                                            <button type="button" class="btn">Blue</button>
                                        </div>
                                    </div> -->
                                <div class="action">
                                    <a class="btn" href="<?= base_url('marketplace/tambah_ke_keranjang/') . $tampil_hewan->id_hewan; ?>"><i class="fa fa-shopping-cart"></i>Tambah ke Keranjang</a>
                                    <!-- <a class="btn" href="#"><i class="fa fa-shopping-bag"></i>Buy Now</a> -->
                                </div>

                            </div>
                            <div class="modal-footer ml-auto">
                                <a href="<?= base_url('marketplace'); ?>">
                                    <div class="btn btn-sm btn-secondary">Kembali</div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row product-detail-bottom">
                    <div class="col-lg-12">
                        <ul class="nav nav-pills nav-justified">
                            <li class="nav-item">
                                <p class="nav-link active" style="color:white; font-size:medium; font-weight:bold; margin-top:1px; margin-bottom:1px;">Deskripsi Hewan Qurban</p>
                            </li>
                            <!-- <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#specification">Specification</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#reviews">Reviews (1)</a>
                                </li> -->
                        </ul>

                        <div class="tab-content">
                            <div id="description" class="container tab-pane active">
                                <!-- <h4>Deskripsi Hewan Qurban</h4> -->
                                <p>
                                    <?= $tampil_hewan->deskripsi; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Bar Start -->

            <div class="col-lg-4 sidebar">
                <div class="sidebar-widget category">
                    <h2 class="title"> <?= $tampil_hewan->nama_toko; ?> </h2>

                    <img src=" <?= base_url('uploads/toko/') . $tampil_hewan->foto_toko; ?>" alt="" style="width: 100%; height:250px; border-style:solid; border-color:tomato ">

                    <div class="modal-footer ml-auto">
                        <a href="<?= base_url('marketplace/detail_toko'); ?>">
                            <div class="btn btn-sm " style="background-color: tomato; color:white">Kunjungi Toko</div>
                        </a>
                    </div>
                </div>

                <!-- Side Bar End -->
            </div>

        </div>
    </div>
    <!-- Product Detail End -->