<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="card shadow col-xl-8 col-lg-7">
            <div class="card-header py-3">
                <?php if ($this->session->flashdata('message1')) : ?>
                    <?php $message = $this->session->flashdata('message1'); ?>
                    <?= '<div class="alert alert-success">' . $message . '</div>'; ?>
                    <?php $this->session->unset_userdata('message1'); ?>
                <?php endif; ?>
                <h6 class="m-0 font-weight-bold" style="color: #d7552a;">Biodata Toko</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body text-left">

                <form action="<?= base_url('penjual/update_toko/') ?>" method="POST">
                    <input type="hidden" name="id_toko" placeholder="Nama Toko" class="form-control" value="<?= $profil['id_toko'] ?>" required>
                    <div class="form-group">
                        <label>Nama Toko</label>
                        <input type="text" name="nama_toko" placeholder="Nama Toko" class="form-control" value="<?= $profil['nama_toko'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat Toko</label>
                        <input type="text" name="alamat" placeholder="Alamat Toko" class="form-control" value="<?= $profil['alamat'] ?>" required>
                        </input>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Kota</label>
                            <input type="text" class="form-control form-control-user" name="kota" id="kota" value="<?= $profil['kota'] ?>" placeholder="Kota">
                        </div>

                        <div class="col-sm-6">
                            <label>Provinsi</label>
                            <input type="text" class="form-control form-control-user" name="provinsi" id="provinsi" value="<?= $profil['provinsi'] ?>" placeholder="Provinsi">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>No. Telepon</label>
                        <input type="text" class="form-control form-control-user" id="notlp" name="notlp" value="<?= $profil['notelp'] ?>" placeholder="No. Telepon">
                    </div>
                    <button type="submit" class="btn btn-user btn-block" style="background-color: #d7552a; color:white;">
                        Simpan
                    </button>
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
                    <h6 class="m-0 font-weight-bold " style="color: #d7552a;">Foto Toko</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="<?= base_url('penjual/update_foto_toko/'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="id_toko" name="id_toko" value="<?= $profil['id_toko']; ?>">
                        <div class="col 1 mt-2 mb-4" align="center">
                            <?php if ($profil['foto_toko']) : ?>
                                <img src="<?= base_url('uploads/toko/') . $profil['foto_toko']; ?>" class="card-img" alt="..." style="width: 250px; height: 250px;">
                            <?php else : ?>
                                <img src="<?= base_url('uploads/toko/noimg.png') ?>" class="card-img" alt="..." style="width: 250px; height: 250px;">
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <input type="file" name="foto_toko" class="form-control">
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