<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                <h6 class="m-0 font-weight-bold" style="color: #d7552a;">Upload Dokumen Verifikasi Tempat Distribusi</h6>
            </h6>
        </div>
    </div> -->
    <?php if ($this->session->flashdata('message1')) : ?>
        <?php $message = $this->session->flashdata('message1'); ?>
        <?= '<div class="alert alert-success">' . $message . '</div>'; ?>
        <?php $this->session->unset_userdata('message1'); ?>
    <?php endif; ?>
    <div class="row">
        <div class="card shadow mb-4 col-sm-3 mr-2">
            <!-- Card Header - Accordion -->
            <div class="d-block card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-camera"></i> Foto Kandang </h6>
            </div>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    <div class="form-group row">
                        <form action=" <?= base_url('penjual/update_foto_kandang') ?>" method="POST" enctype="multipart/form-data">
                            <div class="col-lg-8 mb-4 mb-sm-2">
                                <input type="hidden" name="id_tempat" class="form-control-file" value="<?= $profil['id_toko'] ?>">
                                <input type="file" name="foto_kandang" class="form-control-class">
                            </div>
                            <div class="col-lg-8 mb-2 mb-sm-0">
                                <button type="submit" class="btn btn-sm" style="width: 100%; background-color: #D7552A; color: white;" aria-haspopup="true" aria-expanded="false">
                                    Upload Foto
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="form-group row">
                        <?php if ($profil['foto_kandang']) : ?>
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                <label>Foto</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                <img src="<?= base_url('uploads/dokumen_toko/') . $profil['foto_kandang']; ?>" alt="" style="width: 270px; border-style:solid; border-color:tomato;">
                            </div>
                        <?php else : ?>
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                <label>Foto</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                : Belum Upload Foto
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4 col-sm-3 mr-2">
            <!-- Card Header - Accordion -->
            <div class="d-block card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-camera"></i> Foto KTP </h6>
            </div>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardKTP">
                <div class="card-body">
                    <div class="form-group row">
                        <form action=" <?= base_url('penjual/update_foto_ktp') ?>" method="POST" enctype="multipart/form-data">
                            <div class="col-lg-8 mb-4 mb-sm-2">
                                <input type="hidden" name="id_tempat" class="form-control-file" value="<?= $profil['id_toko'] ?>">
                                <input type="file" name="foto_ktp" class="form-control-class">
                            </div>
                            <div class="col-lg-8 mb-2 mb-sm-0">
                                <button type="submit" class="btn btn-sm" style="width: 100%; background-color: #D7552A; color: white;" aria-haspopup="true" aria-expanded="false">
                                    Upload Foto
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="form-group row">
                        <?php if ($profil['foto_ktp']) : ?>
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                <label>Foto</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                <img src="<?= base_url('uploads/ktp/') . $profil['foto_ktp']; ?>" alt="" style="width: 270px; border-style:solid; border-color:tomato;">
                            </div>
                        <?php else : ?>
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                <label>Foto</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                : Belum Upload Foto
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4 col-sm-3">
            <!-- Card Header - Accordion -->
            <div class="d-block card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-camera"></i> Foto KTP dengan Wajah </h6>
            </div>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardKTP">
                <div class="card-body">
                    <div class="form-group row">
                        <form action=" <?= base_url('penjual/update_foto_orang_ktp') ?>" method="POST" enctype="multipart/form-data">
                            <div class="col-lg-8 mb-4 mb-sm-2">
                                <input type="hidden" name="id_tempat" class="form-control-file" value="<?= $profil['id_toko'] ?>">
                                <input type="file" name="foto_orangktp" class="form-control-class">
                            </div>
                            <div class="col-lg-8 mb-2 mb-sm-0">
                                <button type="submit" class="btn btn-sm" style="width: 100%; background-color: #D7552A; color: white;" aria-haspopup="true" aria-expanded="false">
                                    Upload Foto
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="form-group row">
                        <?php if ($profil['foto_orangktp']) : ?>
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                <label>Foto</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                <img src="<?= base_url('uploads/ktp_wajah/') . $profil['foto_orangktp']; ?>" alt="" style="width: 270px; border-style:solid; border-color:tomato;">
                            </div>
                        <?php else : ?>
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                <label>Foto</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                : Belum Upload Foto
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <hr>
    <div class="card shadow mb-1 col-sm-4">
        <div class="card-body">
            <div class="form-group row">
                <div class="col-sm-3 mb-3 mb-sm-0">
                    Status Toko
                </div>
                <?php if ($profil['foto_kandang'] && $profil['foto_ktp'] && $profil['foto_orangktp'] && $profil['is_active'] == 1) : ?>
                    <div class="h5 col-md-4">
                        <span class="badge badge-success mb-1">
                            <label class="form-check-label">
                                Aktif
                            </label>
                        </span>
                    </div>
                <?php elseif ($profil['foto_kandang'] && $profil['foto_ktp'] && $profil['foto_orangktp']) : ?>
                    <div class="h5 col-md-4">
                        <span class="badge badge-info mb-1">
                            <label class="form-check-label">
                                Menunggu Konfirmasi
                            </label>
                        </span>
                    </div>
                <?php else : ?>
                    <div class="h5 col-md-4">
                        <span class="badge badge-info mb-1">
                            <label class="form-check-label">
                                Belum Aktif, Silahkan Upload Foto
                            </label>
                        </span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>