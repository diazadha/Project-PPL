<!-- Product Detail Start -->
<div class="product-detail">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="product-detail-top">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <center>
                                <div class="header-slider normal-slider">
                                    <div class="header-slider-item">
                                        <img src="<?= base_url('assets/'); ?>img/sapi_limosin.jpg" alt="Slider Image" style="height: 400px; width: 400px;" />
                                    </div>
                                    <div class="header-slider-item">
                                        <img src="<?= base_url('assets/'); ?>img/kambing.jpeg" alt="Slider Image" style="height: 400px; width: 400px;" />
                                    </div>
                                    <div class="header-slider-item">
                                        <img src="<?= base_url('assets/'); ?>img/kambing3.jpg" alt="Slider Image" style="height: 400px; width: 400px;" />
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
                                    <h2>Sapi Bali</h2>
                                </div>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="price">
                                    <h4>Harga:</h4>
                                    <p>$99 <span>$149</span></p> <br>
                                    <h4>Kategori: </h4>
                                    <p>Simental</p> <br>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h4>Kelas: </h4>
                                            <p>4</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <h4>Berat:</h4>
                                            <p>10 Kg</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="quantity">
                                    <h4>Jumlah:</h4>
                                    <div class="qty">
                                        <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                        <input type="text" value="1">
                                        <button class="btn-plus"><i class="fa fa-plus"></i></button>
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
                                    <a class="btn" href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                    <a class="btn" href="#"><i class="fa fa-shopping-bag"></i>Buy Now</a>
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
                                <a class="nav-link active" data-toggle="pill" href="#description">Description</a>
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
                                <h4>Deskripsi Hewan Qurban</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac
                                    mi viverra dictum. In efficitur ipsum diam, at dignissim lorem tempor in.
                                    Vivamus tempor hendrerit finibus. Nulla tristique viverra nisl, sit amet
                                    bibendum ante suscipit non. Praesent in faucibus tellus, sed gravida lacus.
                                    Vivamus eu diam eros. Aliquam et sapien eget arcu rhoncus scelerisque.
                                    Suspendisse sit amet neque neque. Praesent suscipit et magna eu iaculis. Donec
                                    arcu libero, commodo ac est a, malesuada finibus dolor. Aenean in ex eu velit
                                    semper fermentum. In leo dui, aliquet sit amet eleifend sit amet, varius in
                                    turpis. Maecenas fermentum ut ligula at consectetur. Nullam et tortor leo.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Bar Start -->

            <div class="col-lg-4 sidebar">
                <div class="sidebar-widget category">
                    <h2 class="title">Nama Toko</h2>
                    <img src=" <?= base_url('assets/'); ?>img/toko.jpg " alt="" style="width: 100%; height:100%; border-style:solid; border-color:tomato ">
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