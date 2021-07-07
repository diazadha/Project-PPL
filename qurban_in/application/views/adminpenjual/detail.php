<?php foreach ($hewan as $h) : ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="card shadow col-xl-8 col-lg-7">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold" style="color: #d7552a;">Detail Hewan Qurban</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body text-left">

                    <form action="<?= base_url('penjual/update') ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                Nama Hewan Qurban
                                <input type="text" name="nama_hewan" class="form-control" value="<?= $h->nama_hewan; ?>" required>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                Berat
                                <div class="input-group flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">Kg</span>
                                    </div>
                                    <input type="text" min="1" name="berat" class="form-control" aria-label="stok_barang" aria-describedby="addon-wrapping" value="<?= $h->berat; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                Jenis
                                <input type="text" name="jenis" class="form-control" value="<?= $h->jenis; ?>" required>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                Kelas
                                <input type="number" min="1" name="kelas" class="form-control" aria-label="stok_barang" aria-describedby="addon-wrapping" value="<?= $h->kelas; ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                Harga
                                <div class="input-group flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">Rp.</span>
                                    </div>
                                    <input type="text" name="harga" class="form-control" aria-label="harga_barang" aria-describedby="addon-wrapping" value="<?= $h->harga ?>" style="text-align: right;" required>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                Stok
                                <div class="input-group flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">Qty</span>
                                    </div>
                                    <input type="number" min="1" name="stok" class="form-control" aria-label="stok_barang" aria-describedby="addon-wrapping" value="<?= $h->stok; ?>" required>
                                    <input type="hidden" name="id_hewan" value=" <?= $h->id_hewan; ?> ">
                                    <input type="hidden" name="id_toko" value=" <?= $h->id_toko; ?> ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            Deskripsi
                            <textarea class="form-control" id="deskripsi" name="deskripsi" required><?= $h->deskripsi; ?></textarea>
                        </div>

                        <div class="modal-footer">
                            <a href="<?= base_url('penjual/inputhewan'); ?>">
                                <div class="btn btn-sm btn-secondary">Kembali</div>
                            </a>
                            <button type="submit" class="btn  btn-sm" aria-haspopup="true" aria-expanded="false" style="background-color: #D7552A; color: white;">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>

                    <script>
                        CKEDITOR.replace('deskripsi');
                    </script>
                </div>
            </div>
            <!-- Pie Chart -->
            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5 col-sm-4">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold " style="color: #d7552a;">Foto Hewan</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="<?= base_url('penjual/update_foto'); ?>" method="post" enctype="multipart/form-data">
                            <div class="col 1 mt-2 mb-4" align="center">
                                <img src=" <?= base_url('uploads/hewan/') . $h->foto_hewan; ?>" class="card-img" alt="...">
                            </div>
                            <div class="form-group">
                                <input type="file" name="foto_hewan" class="form-control">
                                <input type="hidden" class="form-control" id="id_hewan" name="id_hewan" value="<?= $h->id_hewan; ?>">
                            </div>
                            <button type="submit" class="btn btn-sm" style="width: 100%; background-color: #D7552A; color: white;" aria-haspopup="true" aria-expanded="false">
                                Update Foto
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
<?php endforeach; ?>
<!-- Modal tambah hewan qurban -->
<div class="modal fade" id="updatehewan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content modal-lg">
                <div class="modal-header modal-lg">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Hewan Qurban</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                Nama Hewan Qurban
                                <input type="text" name="nama_barang" class="form-control">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                Berat
                                <div class="input-group flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">Kg</span>
                                    </div>
                                    <input type="number" min="1" max="1000" name="berat" class="form-control" aria-label="stok_barang" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                            <!-- <div class="col-sm-6 mb-3 mb-sm-0">
                                    Kategori
                                    <select name="id_kategori" id="id_kategori" class="form-control">
                                        <?php foreach ($kategori as $k) : ?>
                                        <option value="">
                                        <?= $k['nama_kategori']; ?> 
                                        </option>
                                        <option value="">asdasd</option>
                                        <?php endforeach; ?>
                                    </select>
                                </div> -->
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                Harga
                                <div class="input-group flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">Rp.</span>
                                    </div>
                                    <input type="text" name="harga_barang" class="form-control" aria-label="harga_barang" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                Stok
                                <div class="input-group flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">Qty</span>
                                    </div>
                                    <input type="number" min="1" max="1000" name="stok_barang" class="form-control" aria-label="stok_barang" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                            <!-- <div class="col-sm-6 mb-3 mb-sm-0">
                                    Diskon
                                    <div class="input-group flex-nowrap">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="addon-wrapping">%</span>
                                        </div>
                                        <input type="number" value="0" min="0" max="100" name="diskon"
                                            class="form-control" aria-label="diskon" aria-describedby="addon-wrapping">
                                    </div>
                                </div> -->
                        </div>
                        <div class="form-group">
                            Deskripsi
                            <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Foto Hewan</label>
                            <input type="file" name="foto_barang" class="form-control">
                        </div>
                        <input type="hidden" class="form-control" id="harga_setelahdiskon" name="harga_setelahdiskon" value="0">

                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id_toko" name="id_toko" value="">
                            <!-- <?= form_error('id_toko', '<small class="text-danger pl-3">', '</small>'); ?> -->
                        </div>
                        <input type="hidden" class="form-control" id="admin" name="admin" value="">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn " style="background-color: #D7552A; color: white;">Update</button>
                        </div>
                    </form>
                </div>
                <script>
                    CKEDITOR.replace('deskripsi');
                </script>
            </div>
        </div>
    </div>
</div>