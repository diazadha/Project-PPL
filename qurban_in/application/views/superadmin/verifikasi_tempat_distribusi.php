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
                        <?php if ($profil['foto_tempat_distribusi']) : ?>
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                <label>Foto</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                <img src="<?= base_url('uploads/dokumentempat/') . $profil['foto_tempat_distribusi']; ?>" alt="" style="width: 270px; border-style:solid; border-color:tomato;">
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
                        <?php if ($profil['foto_ktp']) : ?>
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                <label>Foto</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                <img src="<?= base_url('uploads/ktp_tempat/') . $profil['foto_ktp']; ?>" alt="" style="width: 270px; border-style:solid; border-color:tomato;">
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
                        <?php if ($profil['foto_ktp_wajah']) : ?>
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                <label>Foto</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                <img src="<?= base_url('uploads/ktp_wajah_tempat/') . $profil['foto_ktp_wajah']; ?>" alt="" style="width: 270px; border-style:solid; border-color:tomato;">
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
            <form action="<?= base_url('superadmin/update_verifikasi_tempat_distribusi') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-md-6">
                        <select name="aktif" id="aktif" class="form-control" style="width: 270px">
                            <option value="0">Pilih Status</option>
                            <option value="1">Aktif</option>
                        </select>
                    </div>
                </div>
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
                                    Belum Aktif, Admin Tempat Distribusi <br> Belum Upload Foto
                                </label>
                            </span>
                        </div>
                    <?php endif; ?>
                </div>
                <input type="hidden" class="form-control" id="id_distribusi" name="id_distribusi" value="<?= $profil['id_tempatdistribusi']; ?>">
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Update Status</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer ml-auto">
        <a href="<?= base_url('superadmin/data_tempat_distribusi'); ?>">
            <div class="btn btn-sm btn-secondary">Kembali</div>
        </a>
    </div>

</div>