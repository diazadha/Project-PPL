 <!-- Begin Page Content -->
 <div class="container-fluid">
     <div class="card shadow mb-4">
         <div class="card-header">
             <h6 class="m-0 font-weight-bold text-primary">
                 <button class='btn btn-sm tambahdata' data-toggle="modal" data-target="#modal" style="color: white; background-color: #d7552a;"><i class="fas fa-plus fa-sm"></i>
                     Tambah
                     Hewan</button>
             </h6>
         </div>
         <!-- <?= form_error('nama_barang', '<div class="alert alert-danger" role="alert">', '</div>');   ?>
         <?= $this->session->flashdata('message'); ?> -->
     </div>
     <?php if ($this->session->flashdata('message1')) : ?>
         <?php $message = $this->session->flashdata('message1'); ?>
         <?= '<div class="alert alert-success">' . $message . '</div>'; ?>
         <?php $this->session->unset_userdata('message1'); ?>
     <?php endif; ?>
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold " style="color: #d7552a;">Data Hewan Qurban</h6>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr style="text-align: center;">
                             <th>No</th>
                             <th>Nama Hewan</th>
                             <th>Status</th>
                             <th>Aksi</th>
                         </tr>
                     </thead>
                     <!-- <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot> -->
                     <tbody>
                         <?php $i = 1;  ?>
                         <?php foreach ($distribusi as $d) : ?>
                             <tr>
                                 <td scope="row" style="text-align: center;"><?= $i; ?></td>
                                 <td><?php echo $d->nama_hewan ?></td>
                                 <td><?php echo $d->nama_status ?></td>
                                 <td>
                                     <center><a href=" " class=" btn btn-success btn-sm tampilmodalubah" data-toggle="modal" data-target="#modal" data-id="<?= $d->id_hewan; ?>"><i class="fas fa-search-plus"></i></a> </center>
                                 </td>

                             </tr>
                             <?php $i++; ?>
                         <?php endforeach;  ?>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>


     <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->
 <!-- Modal tambah hewan qurban -->
 <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
             <div class="modal-content modal-lg">
                 <div class="modal-header modal-lg">
                     <h5 class="modal-title" id="exampleModalLongTitle">Tambah Hewan</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <form id="form" action=" <?= base_url('tempatdistribusi/tambahhewan'); ?> " method="post" enctype="multipart/form-data">
                         <div class="form-group row">
                             <div class="col-sm-6 mb-3 mb-sm-0">
                                 Nama Hewan Qurban
                                 <input type="text" name="nama_hewan" id="namahewan" class="form-control" required>
                             </div>
                             <div class="col-sm-6 mb-3 mb-sm-0">
                                 Status
                                 <select name="status" id="status" class="form-control" required>
                                     <option value="">Pilih status</option>
                                     <?php foreach ($status as $s) : ?>
                                         <option value="<?= $s['id_status']; ?>"><?= $s['nama_status']; ?></option>
                                     <?php endforeach;  ?>
                                 </select>
                                 <input type="hidden" name="id_tempatdistribusi" id="id_tempatdistribusi" value=" <?= $profil['id_tempatdistribusi']; ?> " required>
                                 <input type="hidden" name="id_hewan" id="id_hewan" required>
                                 <!-- <input type="hidden" name="status" id="id_status" value="" required> -->
                             </div>
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                             <button type="submit" class="btn button_tambah" style="background-color: #d7552a; color: white;">Tambah</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>