    <!-- Checkout Start -->
    <div class="checkout">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-inner">
                        <div class="billing-address">
                            <h2>Biodata Pemesan</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>First Name</label>
                                    <input class="form-control" type="text" placeholder="First Name">
                                </div>
                                <div class="col-md-6">
                                    <label>Last Name"</label>
                                    <input class="form-control" type="text" placeholder="Last Name">
                                </div>
                                <div class="col-md-6">
                                    <label>E-mail</label>
                                    <input class="form-control" type="text" placeholder="E-mail">
                                </div>
                                <div class="col-md-6">
                                    <label>Mobile No</label>
                                    <input class="form-control" type="text" placeholder="Mobile No">
                                </div>
                                <div class="col-md-12">
                                    <label>Address</label>
                                    <input class="form-control" type="text" placeholder="Address">
                                </div>
                                <div class="col-md-6">
                                    <label>Country</label>
                                    <select class="custom-select">
                                        <option selected>United States</option>
                                        <option>Afghanistan</option>
                                        <option>Albania</option>
                                        <option>Algeria</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>City</label>
                                    <input class="form-control" type="text" placeholder="City">
                                </div>
                                <div class="col-md-6">
                                    <label>State</label>
                                    <input class="form-control" type="text" placeholder="State">
                                </div>
                                <div class="col-md-6">
                                    <label>ZIP Code</label>
                                    <input class="form-control" type="text" placeholder="ZIP Code">
                                </div>
                                <!-- <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="newaccount">
                                        <label class="custom-control-label" for="newaccount">Create an account</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="shipto">
                                        <label class="custom-control-label" for="shipto">Ship to different
                                            address</label>
                                    </div>
                                </div> -->
                            </div>
                        </div>

                        <hr>

                        <h2>Pilih Lokasi Distribusi</h2>
                        <div class="product-view">
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
                                                                <div class="dropdown-toggle" data-toggle="dropdown">
                                                                    Place short by
                                                                </div>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a href="#" class="dropdown-item">Newest</a>
                                                                    <a href="#" class="dropdown-item">Popular</a>
                                                                    <!-- <a href="#" class="dropdown-item">Most sale</a> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="product-price-range">
                                                            <div class="dropdown">
                                                                <div class="dropdown-toggle" data-toggle="dropdown">
                                                                    Address
                                                                </div>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a href="#" class="dropdown-item">Bekasi Barat</a>
                                                                    <a href="#" class="dropdown-item">Jakarta Timur</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="product-item">
                                                <div class="product-title">
                                                    <a href="#">Masjid A</a>
                                                    <div class="ratting">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <div class="product-image">
                                                    <img src=" <?= base_url('assets/'); ?>img/masjid_nurul.jpg" alt="Product Image" style="width: 500px; height: 300px;">
                                                    <!-- <div class="product-action">
                                                        <a href="#"><i class="fa fa-cart-plus"></i></a>
                                                        <a href="#"><i class="fa fa-heart"></i></a>
                                                        <a href="#"><i class="fa fa-search"></i></a>
                                                    </div> -->
                                                </div>
                                                <div class="product-price">
                                                    <!-- <h3><span>$</span>99</h3> -->
                                                    <h5 style="color: white;">Total Hewan Qurban : 25</h5>
                                                    <a class="btn" href=""><i class="fas fa-check-circle"></i>Pilih</a>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- Pagination Start -->
                                        <div class="col-md-12">
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination justify-content-center">
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                                    </li>
                                                    <li class="page-item active"><a class="page-link" href="#">1</a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">Next</a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                        <!-- Pagination Start -->
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer ml-auto">
                            <a href="<?= base_url('marketplace/cart'); ?>">
                                <div class="btn btn-sm btn-secondary">Kembali</div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-inner">
                        <div class="checkout-summary">
                            <h1>Cart Total</h1>
                            <p>Product Name<span>$99</span></p>
                            <p class="sub-total">Sub Total<span>$99</span></p>
                            <p class="ship-cost">Shipping Cost<span>$1</span></p>
                            <h2>Grand Total<span>$100</span></h2>
                        </div>

                        <div class="checkout-payment">
                            <div class="payment-methods">
                                <h1>Payment Methods</h1>
                                <div class="payment-method">
                                    <!-- <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="payment-1" name="payment">
                                        <label class="custom-control-label" for="payment-1">BNI</label>
                                    </div> -->
                                    <p>
                                        Transfer to <br> BNI : 109230190302391 A/N Rani
                                    </p>

                                </div>
                            </div>
                            <!-- <div class="checkout-btn">
                                <button>Next</button>
                            </div> -->
                        </div>
                        <div class="checkout-payment">
                            <div class="payment-methods">
                                <h1>Tempat Pendistribusian</h1>
                                <div class="payment-method">
                                    <!-- <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="payment-1" name="payment">
                                        <label class="custom-control-label" for="payment-1">BNI</label>
                                    </div> -->
                                    <p>
                                        Masjid A <br> Alamat : JL. Blok M RT.12 /RW. 13s
                                    </p>

                                </div>
                            </div>
                            <div class="checkout-btn">
                                <button type="button" class="bayar">Process</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Checkout End -->