 <!-- Begin Page Content -->
 <div class="container-fluid">
    <div class="row">
     <!-- Page Heading -->
     <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->

     <!-- DataTales Example -->

     <div class="card shadow mb-6 col-xl-7 col-lg-4">
         <div class="card-header py-6">
             <h6 class="m-0 font-weight-bold" style="color: #D7552A;">Biodata Masjid</h6>
         </div>

         <div class="card-body">
             
                 
                             <form action="<?= base_url('tempatdistribusi/update/') ?>" method="POST">
                             <input type="text" name="id_tempatdistribusi" placeholder="Nama Tempat" class="form-control" value="<?= $profil['id_tempatdistribusi'] ?>" hidden="" required>
                                 <div class="form-group">
                                     <label>Nama Tempat Distribusi</label>
                                     <input type="text" name="nama_tempat" placeholder="Nama Tempat" class="form-control" value="<?= $profil['nama_tempat'] ?>" required>
                                 </div>
                                 <div class="form-group">
                                     <label>Alamat Tempat Distribusi </label>
                                     <input type="text" name="alamat" placeholder="Alamat " class="form-control" value="<?= $profil['alamat'] ?>" required>
                                     </input>
                                 </div>
                                 <div class="form-group row">
                                     <div class="col-sm-6 mb-3 mb-sm-0">
                                         <input type="text" class="form-control form-control-user" name="kota" id="kota" value="<?= $profil['kota'] ?>" placeholder="Kota">
                                     </div>
                                     <div class="col-sm-6">
                                         <input type="text" class="form-control form-control-user" name="provinsi" id="provinsi" value="<?= $profil['provinsi'] ?>" placeholder="Provinsi">
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label>No. Telepon</label>
                                     <input type="text" class="form-control form-control-user" id="notlp" name="notelp" value="<?= $profil['notelp'] ?>" placeholder="No. Telepon">
                                 </div>
                                 <button type="submit" class="btn btn-user btn-block" style="background-color: #d7552a; color:white;">
                                     Simpan Perubahan
                                 </button>
                             </form>
                             <script>
                              CKEDITOR.replace('deskripsi');
                            </script>
                     </div>
                 </div>
                 <!-- Pie Chart -->
                 <!-- Pie Chart -->
            <div class="col-xl-5 col-lg-7 col-sm-6">
               <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold " style="color: #d7552a;">Foto Tempat Distribusi</h6>
                </div>

                <!-- Card Body -->
                  <div class="card-body">
                    <form action="<?= base_url('tempatdistribusi/update_foto_tempat/'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="id_tempatdistribusi" name="id_tempatdistribusi" value="<?= $profil['id_tempatdistribusi']; ?>">
                        <div class="col 1 mt-2 mb-4" align="center">
                            <img src=" <?= base_url('uploads/foto/') . $profil['foto_tempat']; ?>" class="card-img" alt="...">
                        </div>
                        <div class="form-group">
                            <input type="file" name="foto_tempat" class="form-control">
                            
                        </div>
                        <button type="submit" class="btn btn-sm" style="width: 100%; background-color: #D7552A; color: white;" aria-haspopup="true" aria-expanded="false">
                            Update Foto
                        </button>
                    </form>
                </div>
                <script>
                    CKEDITOR.replace('deskripsi');
                </script>
            </div>
        </div>
    </div>
</div>


            