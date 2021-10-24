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
                                                                <h4 style="text-align: left; font-size:medium; font-weight:bolder;"><?= $d['provinsi']; ?> </h4>
                                                                <div class="row">
                                                                    <div class="col-lg-6 mb-1">
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
                            <h2>Grand Total<span>Rp. <?= number_format($grand_total, 0, ',', '.'); ?> </span></h2>
                        </div>

                        <div class="checkout-payment">
                            <div class="payment-methods">
                                <h1>Metode Pembayaran</h1>
                                <div class="payment-method">
                                    <p>
                                        Transfer to <br> BNI : 109230190302391 A/N Rani
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="checkout-payment">
                            <div class="payment-methods">
                                <h1>Pilihan Tempat Pendistribusian</h1>
                                <div class="payment-method">
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
                    }
                });
            }
        </script>