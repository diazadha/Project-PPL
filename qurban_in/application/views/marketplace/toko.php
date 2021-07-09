<!-- Featured Product Start -->
<div class="product-view">
    <div class="featured-product product">
        <div class="container-fluid">
            <div class="section-header">
                <h1>Daftar Semua Toko</h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-view-top">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="product-search">
                                            <input type="email" value="Search">
                                            <button><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="product-short">
                                            <div class="dropdown">
                                                <div class="dropdown-toggle" data-toggle="dropdown">Toko short by
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item">Newest</a>
                                                    <a href="#" class="dropdown-item">Popular</a>
                                                    <a href="#" class="dropdown-item">Most sale</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="product-price-range">
                                            <div class="dropdown">
                                                <div class="dropdown-toggle" data-toggle="dropdown">Address
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item">Jakarta Selatan</a>
                                                    <a href="#" class="dropdown-item">Jakarta Timur</a>

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
                <?php foreach ($tampil_toko as $t) : ?>
                    <div class="col-lg-3 mb-4">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="#"><?= $t->nama_toko; ?></a>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="product-image">
                                <a href=" <?= base_url('marketplace/detail_toko/') . $t->id_toko ?> ">
                                    <img src="<?= base_url('assets/'); ?>img/toko_a.jpg" alt="Product Image" style="width: 500px; height: 300px;">
                                </a>
                                <!-- <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div> -->
                            </div>
                            <div class="product-price">
                                <i class="fas fa-store text-white"></i>
                                <!-- <h3><span>$</span>99</h3> -->
                                <a class="btn" href="<?= base_url('marketplace/detail_toko/') . $t->id_toko ?>"><i class="fas fa-door-open"></i></i>Kunjungi Toko</a>
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