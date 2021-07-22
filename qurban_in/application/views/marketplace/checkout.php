    <!-- Checkout Start -->
    <div class="checkout">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-inner">
                        <div class="billing-address">
                            <h2 style="font-size:x-large;">Biodata Pengqurban</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nama Depan</label>
                                    <input class="form-control" type="text" id="nama_depan" onkeyup="nama_depan()" placeholder="First Name" name="nama_depan" value=" <?= $user['nama_depan']; ?> " style="color:black" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Nama Belakang</label>
                                    <input class="form-control" type="text" id="nama_belakang" onkeyup="nama_belakang()" placeholder="Last Name" name="nama_belakang" value=" <?= $user['nama_belakang']; ?> " style="color:black" required>
                                </div>
                                <div class="col-md-6">
                                    <label>E-mail</label>
                                    <input class="form-control" type="text" id="email" placeholder="E-mail" onkeyup="email()" name="email" value="<?= $user['email']; ?>" style="color:black" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Mobile No</label>
                                    <input class="form-control" type="text" id="nohp" placeholder="Mobile No" onkeyup="nohp()" name="nohp" value="<?= $user['nohp']; ?>" style="color:black" required>
                                </div>
                                <!-- <div class="col-md-12">
                                    <label>Alamat Pengqurban</label>
                                    <textarea class="form-control" type="text" placeholder="Address"> </textarea>
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
                                </div> -->
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

                        <h2 style="font-size:x-large;">Pilih Lokasi Distribusi</h2>
                        <div class="product-view">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="product-view-top">
                                                <div class="row">
                                                    <div class="col-lg-12 md-4">
                                                        <div class="product-price-range">
                                                            <div class="dropdown">
                                                                <div class="dropdown-toggle" data-toggle="dropdown">
                                                                    Provinsi
                                                                </div>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a href="<?= base_url('marketplace/checkout?grand=') . $grand_total ?>" class="dropdown-item">Tampil Semua</a>
                                                                    <a href="<?= base_url('marketplace/filter_distribusi_provinsi?provinsi=Jakarta Barat&grand=') . $grand_total ?>" class="dropdown-item">Jakarta Barat</a>
                                                                    <a href="<?= base_url('marketplace/filter_distribusi_provinsi?provinsi=Jakarta Timur&grand=') . $grand_total ?>" class="dropdown-item">Jakarta Timur</a>
                                                                    <a href="<?= base_url('marketplace/filter_distribusi_provinsi?provinsi=Jakarta Selatan&grand=') . $grand_total ?>" class="dropdown-item">Jakarta Selatan</a>
                                                                    <a href="<?= base_url('marketplace/filter_distribusi_provinsi?provinsi=Jakarta Utara&grand=') . $grand_total ?>" class="dropdown-item">Jakarta Utara</a>
                                                                    <a href="<?= base_url('marketplace/filter_distribusi_provinsi?provinsi=Jakarta Pusat&grand=') . $grand_total ?>" class="dropdown-item">Jakarta Pusat</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php foreach ($tampil_distribusi as $d) : ?>
                                            <div class="col-lg-4 md-4">
                                                <div class="product-item">
                                                    <div class="card-deck">
                                                        <div class="card" style="width: 18rem; border-color:tomato; border-width: 1px; ">
                                                            <img src="<?= base_url('assets/img/masjid_distribusi.jpg')  ?>" class="card-img-top" alt="..." style=" height:250px;">
                                                            <div class="card-body">
                                                                <h3 class="card-title" style="font-weight: bold;"><?= ucwords($d['nama_tempat']); ?></h3>
                                                                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                                                <!-- <h4 style="text-align: right; font-weight:bolder;">Rp. <?= number_format($h->harga, 0, ',', '.') ?> </h4> -->
                                                                <!-- <h4 style="text-align: right; font-size:medium; font-weight:bolder;"><?= $d['kota']; ?> </h4> -->
                                                                <h4 style="text-align: left; font-size:medium; font-weight:bolder;"><?= $d['provinsi']; ?> </h4>
                                                                <div class="row">
                                                                    <div class="col-lg-6 mb-1">
                                                                        <!-- <a class="btn" style="text-align: center; left: 18px; position:absolute;"><i class="fas fa-shopping-cart"></i> Tambah </a> -->
                                                                        <h4 style="text-align: right; font-size:small; font-weight:bolder; left: 18px; top:1px; position:absolute;">Total Hewan : <span id="total_hewan_<?= $d['id_tempatdistribusi']; ?>"></span></h4>
                                                                    </div>

                                                                    <div class="col-lg-6 mb-1" style="text-align:right;">
                                                                        <button class="btn btn-secondary btn-sm" id="t_<?= $d['id_tempatdistribusi']; ?>" style="text-align: center; background-color:tomato; color:white; left: 1px; top:5px; position:relative;" onclick="pilih_total(<?= $d['id_tempatdistribusi']; ?>)"><i class="fas fa-eye"></i> Show </button>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <button class="btn" style="text-align: center;" onclick="pilih_distribusi(<?= $d['id_tempatdistribusi']; ?>)"> <i class="fas fa-check"></i> Pilih</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>

                                        <!-- Pagination Start -->
                                        <!-- <div class="col-md-12">
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
                                        </div> -->
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
                            <h1>Ringkasan Pemesanan</h1>
                            <?php foreach ($tampil_keranjang as $t) : ?>
                                <p><?= $t['nama_hewan']; ?><span>Rp. <?= number_format($t['total_harga'], 0, ',', '.'); ?></span></p>
                            <?php endforeach; ?>
                            <!-- <p class="sub-total">Sub Total<span>$99</span></p> -->
                            <!-- <p class="ship-cost">Shipping Cost<span>$1</span></p> -->
                            <h2>Grand Total<span>Rp. <?= number_format($grand_total, 0, ',', '.'); ?> </span></h2>
                        </div>

                        <div class="checkout-payment">
                            <div class="payment-methods">
                                <h1>Metode Pembayaran</h1>
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
                                <h1>Pilihan Tempat Pendistribusian</h1>
                                <div class="payment-method">
                                    <!-- <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="payment-1" name="payment">
                                        <label class="custom-control-label" for="payment-1">BNI</label>
                                    </div> -->
                                    <div class="row">
                                        <div class="col-lg-4 mb-1">
                                            <p>Nama </p>
                                        </div>
                                        <div class="col-lg-6 mb-1">
                                            : <span id="nama_masjid"> ... </span>
                                        </div>
                                        <div class="col-lg-4 mb-1">
                                            <p>Alamat </p>
                                        </div>
                                        <div class="col-lg-6 mb-1">
                                            : <span id="alamat"> ... </span>
                                        </div>
                                        <div class="col-lg-4 mb-1">
                                            <p>Provinsi </p>
                                        </div>
                                        <div class="col-lg-6 mb-1">
                                            : <span id="provinsi"> ... </span>
                                        </div>
                                    </div>
                                    <!-- <p>Nama : <span id="nama_masjid"> ... </span></p>
                                    <p>Alamat : <span id="alamat"> ... </span></p>
                                    <p>Provinsi : <span id="provinsi"> ... </span></p> -->
                                    <input type="hidden" id="id_distribusi" name="id_distribusi" required>

                                </div>
                            </div>
                            <div class="checkout-btn">
                                <button type="submit" class="bayar">Process</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Checkout End -->
        <script>
            function pilih_total(id_tempatdistribusi) {
                let id_distribusi = id_tempatdistribusi;
                console.log(id_distribusi);

                $.ajax({
                    url: 'http://localhost/Project-PPL/qurban_in/marketplace/get_tempat_distribusi',
                    data: {
                        id_distribusi: id_distribusi
                    },
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#total_hewan_' + id_tempatdistribusi).html(data.total_hewan);
                        $('#t_' + id_tempatdistribusi).hide("slow");
                        // // console.log('sukses update');
                        // let harga = data.harga;
                        // console.log('harga : ', +harga);
                        // let total_harga = (qty_new) * parseInt(harga);
                        // $('#total_harga_' + id_keranjang).html('Rp. ' + total_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));

                        // let grand_total_before = $('#grand').val();
                        // console.log('grand_total_before : ' + grand_total_before)

                        // let grand_total = parseInt(harga) + parseInt(grand_total_before);
                        // $('#grand_total').html('Rp. ' + grand_total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
                        // console.log('grand : ', grand_total);
                        // console.log('total_harga : ' + total_harga);
                        // $('#grand').val(grand_total);
                    }
                });
            }
        </script>