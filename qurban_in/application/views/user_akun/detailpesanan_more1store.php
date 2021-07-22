    <!-- Checkout Start -->
    <div class="checkout">
        <div class="container-fluid">
            <!-- Collapsable Card Example -->
            <?php foreach ($cek_row as $c) : ?>
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseCardExample-<?= $c['nama_hewan']; ?> " class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">Status Pesanan : <?= $c['nama_toko'] ?></h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapseCardExample">
                        <div class="card-body">
                            <!-- Content Row -->
                            <div class="row">
                                <!-- Earnings (Monthly) Card Example -->
                                <a href="" class="col-xl-4 col-md-6 mb-4" data-toggle="modal" data-target="#bayar">
                                    <!-- <div class="col-xl-4 col-md-6 mb-4" data-toggle="modal" data-target="#bayar"> -->
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        Status Pembayaran</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                        <strong>

                                                            <!-- <span class="badge badge-info mb-1">
                                                        <label class="form-check-label">
                                                            
                                                        </label>
                                                    </span> -->

                                                            <span class="badge badge-success mb-1">
                                                                <label class="form-check-label">
                                                                    Sukses
                                                                </label>
                                                            </span>

                                                            <!-- <span class="badge badge-warning mb-1">
                                                        <label class="form-check-label">
                                                            Menunggu Pembayaran
                                                        </label>
                                                    </span> -->

                                                            <!-- <span class="badge badge-danger mb-1">
                                                        <label class="form-check-label">
                                                            
                                                        </label>
                                                    </span> -->

                                                        </strong>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-fw fa-money-bill-wave fa-3x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- </div> -->
                                </a>

                                <div class="col-xl-4 col-md-6 mb-4" data-toggle="modal" data-target="#prosespesanan">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        Proses Pesanan</div>

                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                        <strong>

                                                            <!-- <span class="badge badge-info mb-1">
                                                        <label class="form-check-label">
                                                            Hewan
                                                        </label>
                                                    </span> -->

                                                            <span class="badge badge-success mb-1">
                                                                <label class="form-check-label">
                                                                    Distribusi / Dikirim
                                                                </label>
                                                            </span>

                                                            <!-- <span class="badge badge-danger mb-1">
                                                        <label class="form-check-label">

                                                        </label>
                                                    </span> -->

                                                            <!-- <span class="badge badge-warning mb-1">
                                                        <label class="form-check-label">
                                                            Pending
                                                        </label>
                                                    </span> -->

                                                            <!-- <span class="badge badge-warning mb-1">
                                                        <label class="form-check-label">

                                                        </label>
                                                    </span> -->

                                                        </strong>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-fw fa-truck fa-3x text-gray-300"></i>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="" class="col-xl-4 col-md-6 mb-4" data-toggle="modal" data-target="#finalisasi">
                                    <!-- <div class="col-xl-4 col-md-6 mb-4" data-toggle="modal" data-target="#finalisasi"> -->
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        Finalisasi Dan Bukti Sampai

                                                    </div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"> <strong>

                                                            <!-- <span class="badge badge-warning mb-1">
                                                        <label class="form-check-label">
                                                            
                                                        </label>
                                                    </span> -->

                                                            <span class="badge badge-success mb-1">
                                                                <label class="form-check-label">
                                                                    Sampai Tempat Distribusi
                                                                </label>
                                                            </span>

                                                            <!-- <span class="badge badge-warning mb-1">
                                                        <label class="form-check-label">
                                                            
                                                        </label>
                                                    </span>

                                                    <span class="badge badge-warning mb-1">
                                                        <label class="form-check-label">
                                                            
                                                        </label>
                                                    </span>

                                                    <span class="badge badge-info mb-1">
                                                        <label class="form-check-label">
                                                           
                                                        </label>
                                                    </span>

                                                    <span class="badge badge-danger mb-1">
                                                        <label class="form-check-label">
                                                            
                                                        </label>
                                                    </span>

                                                    <span class="badge badge-danger mb-1">
                                                        <label class="form-check-label">
                                                            
                                                        </label>
                                                    </span> -->

                                                        </strong>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <!-- <i class="fas fa-clipboard-list fa-3x text-gray-300"></i> -->
                                                    <i class="fas fa-clipboard-check fa-3x text-gray-300"></i>
                                                    <i class="fas fa-camera fa-3x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- </div> -->
                                </a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Nama Hewan Qurban</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        $grand_total = 0; ?>
                                        <?php foreach ($tampil_pesanan as $psn) : ?>
                                            <tr>
                                                <td align="center">
                                                    <?= $no; ?>
                                                </td>
                                                <td align="center">
                                                    <?= $psn['nama_hewan']; ?>
                                                </td>
                                                <td align="center">
                                                    <?= $psn['qty']; ?>
                                                </td>
                                                <td align="right">Rp. <?= number_format($psn['harga'], 0, ',', '.') ?>
                                                </td>
                                                <td align="right">Rp. <?= number_format($psn['total_harga'], 0, ',', '.') ?>
                                                </td>
                                            </tr>
                                            <?php $grand_total = $grand_total + $psn['total_harga'] ?>
                                            <?php $no++; ?>
                                        <?php endforeach; ?>
                                        <tr>

                                            <td colspan="4" align="right"><strong>Grand Total</strong></td>
                                            <td align="right"><strong>Rp. <?= number_format($grand_total, 0, ',', '.') ?>
                                                </strong></td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <hr style="border: 2px solid #FF6F61">

            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardpembeli" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="far fa-address-book"></i> Data
                        Pemesan </h6>
                </a>
                <div class="collapse show" id="collapseCardpembeli">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-2 mb-3 mb-sm-0">
                                <label>Nama Pembeli</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                : Diaz Adha Asri Prakoso
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 mb-3 mb-sm-0">
                                <label>Email</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                :
                                diaz.adha@if.uai.ac.id
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 mb-3 mb-sm-0">
                                <label>No. Handphone</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                :
                                081380965243
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 mb-3 mb-sm-0">
                                <label>Tanggal Pemesanan</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                :
                                2021-03-04
                            </div>
                        </div>
                        <!-- <div class="row">
                        <div class="col-sm-2 mb-3 mb-sm-0">
                            <label>Metode Bayar</label>
                        </div>
                        <div class="col-sm-8 mb-3 mb-sm-0">
                            :
                            
                        </div>
                    </div> -->
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCarddistribusi" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-map"></i> Alamat
                        Pendistribusian </h6>
                </a>
                <div class="collapse show" id="collapseCarddistribusi">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-2 mb-3 mb-sm-0">
                                <label>Nama Masjid</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                : Masjid Agung Al-Azhar
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 mb-3 mb-sm-0">
                                <label>Alamat</label>
                            </div>
                            <div class="col-sm-10 mb-3 mb-sm-0" style="text-align: justify;">
                                :
                                Masjid Agung Al-Azhar, Jl. Sisingamangaraja No.1, RT.2/RW.1, Selong, Kec. Kby.
                                Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12110
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 mb-3 mb-sm-0">
                                <label>No. Telepon</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                :
                                (021) 72783683
                            </div>
                        </div>
                        <!-- <div class="row">
                        <div class="col-sm-2 mb-3 mb-sm-0">
                            <label>Tanggal Pemesanan</label>
                        </div>
                        <div class="col-sm-8 mb-3 mb-sm-0">
                            :
                            2021-03-04
                        </div>
                    </div> -->
                        <!-- <div class="row">
                        <div class="col-sm-2 mb-3 mb-sm-0">
                            <label>Metode Bayar</label>
                        </div>
                        <div class="col-sm-8 mb-3 mb-sm-0">
                            :
                            
                        </div>
                    </div> -->
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardPesanan" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-dolly-flatbed"></i> Data
                        Pesanan </h6>
                </a>
                <div class="collapse show" id="collapseCardPesanan">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr align="center">
                                        <th>No</th>
                                        <th>Nama Toko</th>
                                        <th>Nama Hewan Qurban</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <?php $no = 1; ?>
                                    <?php foreach ($data_pesanan as $psn) : ?>
                                        <tr>
                                            <td align="center">
                                                <?= $no; ?>
                                            </td>
                                            <td align="center">
                                                <?= $psn['nama_toko']; ?>
                                            </td>
                                            <td align="center">
                                                <?= $psn['nama_hewan']; ?>
                                            </td>
                                            <td align="center">
                                                <?= $psn['qty']; ?>
                                            </td>
                                            <td align="right">Rp. <?= number_format($psn['total_harga'], 0, ',', '.') ?>
                                            </td>
                                            <td align="right"><strong>Rp. <?= number_format($psn['total_harga'], 0, ',', '.') ?>
                                                </strong></td>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php endforeach; ?> -->
                                    <tr>

                                        <td colspan="5" align="right"><strong>Grand Total</strong></td>
                                        <td align="right"><strong>Rp.
                                                5.000.000
                                            </strong></td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer ml-auto">
                <a href="<?= base_url('user_akun'); ?>">
                    <div class="btn btn-sm btn-secondary">Kembali</div>
                </a>
            </div>
        </div>

    </div>
    <!-- Checkout End -->
    <!-- Modal finalisasi -->
    <div class="modal fade" id="finalisasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog" style="width: 550px">
            <div class="modal-dialog modal-dialog-centered" role="document" style="width: 550px">
                <div class="modal-content" style="width: 550px">
                    <div class="modal-header" style="width: 550px">
                        <h5 class="modal-title" id="exampleModalLongTitle">Finalisasi Dan Bukti Sampai
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-5 mb-3 mb-sm-0">
                                Status Finalisasi
                            </div>
                            <div class="h5 col-md-6">
                                <strong>
                                    <!-- <span class="badge badge-info mb-1">
                                    <label class="form-check-label">
                                        
                                    </label>
                                </span> -->
                                    <span class="badge badge-info mb-1">
                                        <label class="form-check-label">
                                            Sampai Tempat Distribusi
                                        </label>
                                    </span>

                                    <!-- <span class="badge badge-danger mb-1">
                                    <label class="form-check-label">
                                        
                                    </label>
                                </span>

                                <span class="badge badge-warning mb-1">
                                    <label class="form-check-label">
                                        
                                    </label>
                                </span>

                                <span class="badge badge-warning mb-1">
                                    <label class="form-check-label">
                                       
                                    </label>
                                </span> -->

                                </strong>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-5 mb-3 mb-sm-0">
                                Bukti Foto
                            </div>
                            <div class="col-md-6">
                                <img src="img/bukti.jpg" alt="" width="270 px" style="border:2px ridge #0404B4;">
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    <!-- Modal bayar -->
    <div class="modal fade" id="bayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog" style="width: 550px">
            <div class="modal-dialog modal-dialog-centered" role="document" style="width: 550px">
                <div class="modal-content" style="width: 550px">
                    <div class="modal-header" style="width: 550px">
                        <h5 class="modal-title" id="exampleModalLongTitle">Status Pembayaran
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-5 mb-3 mb-sm-0">
                                Status Pembayaran
                            </div>
                            <div class="h5 col-md-6">
                                <strong>
                                    <!-- <span class="badge badge-info mb-1">
                                    <label class="form-check-label">
                                        
                                    </label>
                                </span> -->
                                    <span class="badge badge-info mb-1">
                                        <label class="form-check-label">
                                            Pending
                                        </label>
                                    </span>

                                    <!-- <span class="badge badge-danger mb-1">
                                    <label class="form-check-label">
                                        
                                    </label>
                                </span>

                                <span class="badge badge-warning mb-1">
                                    <label class="form-check-label">
                                        
                                    </label>
                                </span>

                                <span class="badge badge-warning mb-1">
                                    <label class="form-check-label">
                                       
                                    </label>
                                </span> -->

                                </strong>
                            </div>
                        </div>



                        <div class="form-group row">
                            <div class="col-md-5 mb-3 mb-sm-0">
                                Upload Bukti
                            </div>
                            <div class="col-md-6">
                                <input type="file" name="foto_bukti" class="form-control">
                            </div>
                        </div>
                        <input type="hidden" class="form-control" id="id_invoice" name="id_invoice" value="">
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Upload</button>
                        </div>



                    </div>
                </div>
            </div>
        </div>

    </div>