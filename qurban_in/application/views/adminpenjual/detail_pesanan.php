<!-- Begin Page Content -->
<div class="container-fluid">
    <h4 class="m-0 font-weight-bold text-secondary mb-3 mt-4">Detail Pesanan <div class="btn btn-sm btn-success">INVOICE: <?= $id_invoice; ?>

        </div>
        <a class="btn btn-sm btn-warning" href=""><i class="fa fa-file"></i>
            Export PDF</a>
    </h4>
    <!-- Collapsable Card Example -->
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Status Pesanan & Pembayaran Customer</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
                <!-- Content Row -->
                <div class="row">
                    <!-- Earnings (Monthly) Card Example -->
                    <div href="" class="col-xl-6 col-md-6 mb-4" data-toggle="modal" data-target="#statusbayar">
                        <!-- <div class="col-xl-4 col-md-6 mb-4" data-toggle="modal" data-target="#statusbayar"> -->
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Status Pembayaran</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <strong>
                                                <?php if ($cek_bayar['status_bayar'] != '0' && $cek_bayar['status_bayar'] == 'SUKSES') : ?>
                                                    <span class="badge badge-success mb-1">
                                                        <label class="form-check-label">
                                                            Sukses
                                                        </label>
                                                    </span>
                                                <?php elseif ($cek_bayar['status_bayar'] == 'GAGAL') : ?>
                                                    <span class="badge badge-danger mb-1">
                                                        <label class="form-check-label">
                                                            Gagal
                                                        </label>
                                                    </span>
                                                <?php elseif ($cek_foto['foto_bukti_bayar'] == '0') : ?>
                                                    <span class="badge badge-info mb-1">
                                                        <label class="form-check-label">
                                                            Menunggu Pembayaran
                                                        </label>
                                                    </span>
                                                <?php elseif ($cek_foto['foto_bukti_bayar'] != '0' && $cek_bayar['status_bayar'] == 0) : ?>
                                                    <span class="badge badge-info mb-1">
                                                        <label class="form-check-label">
                                                            Menunggu Konfirmasi
                                                        </label>
                                                    </span>
                                                <?php endif; ?>
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
                    </div>
                    <?php if ($cek_foto['foto_bukti_bayar'] == '0' || $cek_bayar['status_bayar'] == '0') : ?>
                        <div href="" class="col-xl-6 col-md-6 mb-4">
                            <!-- <div class="col-xl-4 col-md-6 mb-4" data-toggle="modal" data-target="#prosespesanan"> -->
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Proses Pesanan</div>

                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <strong>
                                                    <span class="badge badge-info mb-1">
                                                        <label class="form-check-label">
                                                            Pending
                                                        </label>
                                                    </span>
                                                </strong>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-fw fa-truck fa-3x text-gray-300"></i>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- </div> -->
                        </div>
                    <?php else : ?>
                        <a href="" class="col-xl-6 col-md-6 mb-4" data-toggle="modal" data-target="#prosespesanan">
                            <!-- <div class="col-xl-4 col-md-6 mb-4" data-toggle="modal" data-target="#prosespesanan"> -->
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Proses Pesanan</div>

                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <strong>
                                                    <?php if ($status_pesanan['status_pesanan'] == 'PERSIAPAN') : ?>
                                                        <span class="badge badge-info mb-1">
                                                            <label class="form-check-label">
                                                                Persiapan Untuk Dikirim
                                                            </label>
                                                        </span>
                                                    <?php elseif ($status_pesanan['status_pesanan'] == 'DIKIRIM') : ?>
                                                        <span class="badge badge-info mb-1">
                                                            <label class="form-check-label">
                                                                Dikirim ke Tempat Distribusi
                                                            </label>
                                                        </span>
                                                    <?php elseif ($status_pesanan['status_pesanan'] == 'SAMPAI') : ?>
                                                        <span class="badge badge-success mb-1">
                                                            <label class="form-check-label">
                                                                Sampai di Tempat Distribusi
                                                            </label>
                                                        </span>
                                                    <?php else : ?>
                                                        <span class="badge badge-info mb-1">
                                                            <label class="form-check-label">
                                                                Menunggu Konfirmasi dari Penjual
                                                            </label>
                                                        </span>
                                                    <?php endif; ?>
                                                </strong>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-fw fa-truck fa-3x text-gray-300"></i>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- </div> -->
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
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
                        : <?= $pemesan['nama_depan']; ?> <?= $pemesan['nama_belakang']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        <label>Email</label>
                    </div>
                    <div class="col-sm-8 mb-3 mb-sm-0">
                        :
                        <?= $pemesan['email']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        <label>No. Handphone</label>
                    </div>
                    <div class="col-sm-8 mb-3 mb-sm-0">
                        :
                        <?= $pemesan['nohp']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        <label>Tanggal Pemesanan</label>
                    </div>
                    <div class="col-sm-8 mb-3 mb-sm-0">
                        :
                        <?= date("d-m-Y", strtotime($pemesan['order_date'])); ?>
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
                        : <?= $distribusi['nama_tempat']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        <label>Alamat</label>
                    </div>
                    <div class="col-sm-10 mb-3 mb-sm-0" style="text-align: justify;">
                        :
                        <?= $distribusi['alamat']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        <label>No. Telepon</label>
                    </div>
                    <div class="col-sm-8 mb-3 mb-sm-0">
                        :
                        <?= $distribusi['notelp']; ?>
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
                                <th>Nama Hewan Qurban</th>
                                <th>Nama Toko</th>
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
                                        <?= $psn['nama_toko']; ?>
                                    </td>
                                    <td align="center">
                                        <?= $psn['qty']; ?>
                                    </td>
                                    <td align="right">Rp. <?= number_format($psn['harga'], 0, ',', '.') ?>
                                    </td>
                                    <td align="right"><strong>Rp. <?= number_format($psn['total_harga'], 0, ',', '.') ?>
                                        </strong></td>
                                </tr>
                                <?php $no++; ?>
                                <?php $grand_total = $grand_total + $psn['total_harga']; ?>
                            <?php endforeach; ?>
                            <tr>

                                <td colspan="5" align="right"><strong>Grand Total</strong></td>
                                <td align="right"><strong>Rp. <?= number_format($grand_total, 0, ',', '.') ?>
                                    </strong></td>


                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer ml-auto">
        <a href="<?= base_url('penjual/datapesanan'); ?>">
            <div class="btn btn-sm btn-secondary">Kembali</div>
        </a>
    </div>

    <!-- Modal proses pesanan -->
    <div class="modal fade" id="prosespesanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog" style="width: 550px">
            <div class="modal-dialog modal-dialog-centered" role="document" style="width: 550px">
                <div class="modal-content" style="width: 550px">
                    <div class="modal-header" style="width: 550px">
                        <h5 class="modal-title" id="exampleModalLongTitle">Proses Pesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-5 mb-3 mb-sm-0">
                                Status Pesanan
                            </div>
                            <div class="h5 col-md-6">
                                <strong>
                                    <?php if ($status_pesanan['status_pesanan'] == 'PERSIAPAN') : ?>
                                        <span class="badge badge-info mb-1">
                                            <label class="form-check-label">
                                                Persiapan Untuk Dikirim
                                            </label>
                                        </span>
                                    <?php elseif ($status_pesanan['status_pesanan'] == 'DIKIRIM') : ?>
                                        <span class="badge badge-info mb-1">
                                            <label class="form-check-label">
                                                Dikirim ke Tempat Distribusi
                                            </label>
                                        </span>
                                    <?php elseif ($status_pesanan['status_pesanan'] == 'SAMPAI') : ?>
                                        <span class="badge badge-success mb-1">
                                            <label class="form-check-label">
                                                Sampai di Tempat Distribusi
                                            </label>
                                        </span>
                                    <?php else : ?>
                                        <span class="badge badge-info mb-1">
                                            <label class="form-check-label">
                                                Menunggu Konfirmasi dari Penjual
                                            </label>
                                        </span>
                                    <?php endif; ?>
                                </strong>
                            </div>
                        </div>

                        <form action="<?= base_url('penjual/update_proses_pesanan') ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-md-5 mb-3 mb-sm-0">
                                    Proses Pesanan
                                </div>
                                <div class="col-md-6">
                                    <select name="proses_pesanan" id="proses_pesanan" class="form-control" style="width: 270px">
                                        <option value="0">Pilih Status</option>
                                        <option value="PERSIAPAN">Dalam Persiapan</option>
                                        <option value="DIKIRIM">Distribusi / Dikirim</option>
                                        <option value="SAMPAI">Sampai di Tempat Distribusi</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" id="id_invoice" name="id_invoice" value="<?= $id_invoice; ?>">
                            <input type="hidden" class="form-control" id="id_toko" name="id_toko" value="<?= $user['id_toko']; ?>">
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn-sm">Update Proses
                                    Pesanan</button>
                            </div>
                        </form>
                        <!-- <span class="badge badge-success mb-1">
                                        <label class="form-check-label">
                                            Distribusi
                                        </label>
                                    </span> -->

                        <!-- <form action="<?= base_url() . 'toko/invoice/update_prosespesanan'; ?>"
                                        method="post" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <div class="col-md-5 mb-3 mb-sm-0">
                                                Proses Pesanan
                                            </div>
                                            <div class="col-md-6">
                                                <select name="proses_pesanan" id="proses_pesanan" class="form-control"
                                                    style="width: 270px">
                                                    <option value="0">Pilih Status</option>
                                                    <option value="Dikemas">Dikemas</option>
                                                    <option value="Dikirim Penjual">Dikirim Penjual</option>
                                                </select>
                                            </div>
                                        </div>
                                        <input type="hidden" class="form-control" id="id_invoice" name="id_invoice"
                                            value="<?= $p->id_invoice ?>">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary btn-sm">Update Proses
                                                Pesanan</button>
                                        </div>
                                    </form> -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->