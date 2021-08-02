<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                <h6 class="m-0 font-weight-bold" style="color: #d7552a;">Upload Dokumen Verifikasi Tempat Distribusi</h6>
            </h6>
        </div>
    </div>
    <?php if ($this->session->flashdata('message1')) : ?>
        <?php $message = $this->session->flashdata('message1'); ?>
        <?= '<div class="alert alert-success">' . $message . '</div>'; ?>
        <?php $this->session->unset_userdata('message1'); ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('message1')) : ?>
        <?php $message = $this->session->flashdata('message1'); ?>
        <?= '<div class="alert alert-success">' . $message . '</div>'; ?>
        <?php $this->session->unset_userdata('message1'); ?>
    <?php endif; ?>

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->
    <!-- DataTales Example -->
    <div class="row">
    <div class="card shadow mb-4 mr-2 col-sm-3">
        <a href="#collapseCardMasjid" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-camera"></i> Foto Tempat Distribusi </h6>
        </a>

        <form action=" <?= base_url('tempatdistribusi/update_foto_tempat_distribusi') ?> " method="POST" enctype="multipart/form-data">
            <div class="col-sm-2 mb-3 mb-sm-0"></div>
            <div class="col-lg-8 mb-4 mb-sm-2">
                <input type="hidden" name="id_tempat" class="form-control-file" value="<?= $profil['id_tempatdistribusi'] ?>">
            </div>
            <div class="col 1 mt-2 mb-4" align="left">
                <img src=" <?= base_url('uploads/dokumentempat/') . $profil['foto_tempat_distribusi']; ?>" class="card-img" alt="..." style="width: 200px;">
            </div>
            <div class="col-sm-2 mb-3 mb-sm-0"></div>
            <div class="col-lg-8 mb-4 mb-sm-2">
                <input type="file" name="foto_tempat_distribusi" class="form-control-class">
            </div>
            <div class="col-lg-7 mb-4 mb-sm-0">
                <button type="submit" class="btn btn-sm" style="width: 100%; background-color: #D7552A; color: white;" aria-haspopup="true" aria-expanded="false">
                    Upload Foto
                </button>
            </div>
        </form>
    </div>

    <div class="card shadow mb-4 mr-2 col-sm-3 ">
        <a href="#collapseCardMasjid" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-camera"></i> Foto KTP</h6>
        </a>

        <form action=" <?= base_url('tempatdistribusi/update_foto_ktp/') ?> " method="POST" enctype="multipart/form-data">
            <div class="col-sm-2 mb-3 mb-sm-0"></div>
            <div class="col-lg-8 mb-4 mb-sm-2">
                <input type="hidden" name="id_tempat" class="form-control-file" value="<?= $profil['id_tempatdistribusi'] ?>">
            </div>
            <div class="col 1 mt-2 mb-4" align="left">
                <img src=" <?= base_url('uploads/ktp_tempat/') . $profil['foto_ktp']; ?>" class="card-img" alt="..." style="width: 200px;">
            </div>
            <div class="col-sm-2 mb-3 mb-sm-0"></div>
            <div class="col-lg-8 mb-4 mb-sm-2">
                <input type="file" name="foto_ktp" class="form-control-class">
            </div>
            <div class="col-lg-7 mb-4 mb-sm-0">
                <button type="submit" class="btn btn-sm" style="width: 100%; background-color: #D7552A; color: white;" aria-haspopup="true" aria-expanded="false">
                    Upload Foto
                </button>
            </div>
        </form>
    </div>

    <div class="card shadow mb-4 mr-2 col-sm-3">
        <a href="#collapseCardMasjid" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-camera"></i> Foto KTP dengan Wajah </h6>
        </a>

        <form action=" <?= base_url('tempatdistribusi/update_foto_ktp_wajah/') ?> " method="POST" enctype="multipart/form-data">
            <div class="col-sm-2 mb-3 mb-sm-0"></div>
            <div class="col-lg-8 mb-4 mb-sm-2">
                <input type="hidden" name="id_tempat" class="form-control-file" value="<?= $profil['id_tempatdistribusi'] ?>">
            </div>
            <div class="col 1 mt-2 mb-4" align="left">
                <img src=" <?= base_url('uploads/ktp_wajah_tempat/') . $profil['foto_ktp_wajah']; ?>" class="card-img" alt="..." style="width: 200px;">
            </div>
            <div class="col-sm-2 mb-3 mb-sm-0"></div>
            <div class="col-lg-8 mb-4 mb-sm-2">
                <input type="file" name="foto_ktp_wajah" class="form-control-class">
            </div>
            <div class="col-lg-7 mb-4 mb-sm-0">
                <button type="submit" class="btn btn-sm" style="width: 100%; background-color: #D7552A; color: white;" aria-haspopup="true" aria-expanded="false">
                    Upload Foto
                </button>
            </div>
        </form>
    </div>
</div>
</div>