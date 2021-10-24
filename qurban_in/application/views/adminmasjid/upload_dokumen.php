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
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-camera"></i> Foto Tempat Distribusi </h6>
            </div>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    <div class="form-group row">
                        <form action=" <?= base_url('tempatdistribusi/update_foto_tempat_distribusi') ?>" method="POST" enctype="multipart/form-data">
                            <div class="col-lg-8 mb-4 mb-sm-2">
                                <input type="hidden" name="id_tempat" class="form-control-file" value="<?= $profil['id_tempatdistribusi'] ?>">
                                <input type="file" name="foto_tempat_distribusi" class="form-control-class">
                            </div>
                            <div class="col-lg-8 mb-2 mb-sm-0">
                                <button type="submit" class="btn btn-sm" style="background-color: #D7552A; color: white;" aria-haspopup="true" aria-expanded="false">
                                    Upload Foto
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="form-group row">
                        <?php if ($profil['foto_tempat_distribusi']) : ?>
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                <label>Foto</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                <img class="img-fluid" alt="Responsive image" src="<?= base_url('uploads/dokumentempat/') . $profil['foto_tempat_distribusi']; ?>" style="width: 270px; border-style:solid; border-color:tomato;">
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
                        <form action=" <?= base_url('tempatdistribusi/update_foto_ktp') ?>" method="POST" enctype="multipart/form-data">
                            <div class="col-lg-8 mb-4 mb-sm-2">
                                <input type="hidden" name="id_tempat" class="form-control-file" value="<?= $profil['id_tempatdistribusi'] ?>">
                                <input type="file" name="foto_ktp" class="form-control-class">
                            </div>
                            <div class="col-lg-8 mb-2 mb-sm-0">
                                <button type="submit" class="btn btn-sm" style="background-color: #D7552A; color: white;" aria-haspopup="true" aria-expanded="false">
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
                                <img class="img-fluid" alt="Responsive image" src="<?= base_url('uploads/ktp_tempat/') . $profil['foto_ktp']; ?>" style="width: 270px; border-style:solid; border-color:tomato;">
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
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-camera"></i> Foto KTP dengan Wajah </h6>
            </div>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardKTP">
                <div class="card-body">
                    <div class="form-group row">
                        <form action=" <?= base_url('tempatdistribusi/update_foto_ktp_wajah') ?>" method="POST" enctype="multipart/form-data">

                            <div class="col-lg-8 mb-4 mb-sm-2">
                                <input type="hidden" name="id_tempat" class="form-control-file" value="<?= $profil['id_tempatdistribusi'] ?>">
                                <input type="file" name="foto_ktp_wajah" class="form-control-class">
                            </div>


                            <div class="col-lg-8 mb-2 mb-sm-0">
                                <button type="submit" class="btn btn-sm" style="background-color: #D7552A; color: white;" aria-haspopup="true" aria-expanded="false">
                                    Upload Foto
                                </button>
                            </div>

                        </form>
                    </div>
                    <div class="form-group row">
                        <?php if ($profil['foto_ktp_wajah']) : ?>
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                <label>Foto</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                <img class="img-fluid" alt="Responsive image" src="<?= base_url('uploads/ktp_wajah_tempat/') . $profil['foto_ktp_wajah']; ?>" style="width: 270px; border-style:solid; border-color:tomato;">
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
                    Status Tempat Distribusi
                </div>

                <?php if ($profil['foto_tempat_distribusi'] && $profil['foto_ktp'] && $profil['foto_ktp_wajah'] && $profil['is_active'] == 1) : ?>
                    <div class="h5 col-md-4">
                        <span class="badge badge-success mb-1">
                            <label class="form-check-label">
                                Aktif
                            </label>
                        </span>
                    </div>
                <?php elseif ($profil['foto_tempat_distribusi'] && $profil['foto_ktp'] && $profil['foto_ktp_wajah']) : ?>
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