 <!-- Begin Page Content -->
 <div class="container-fluid">
     <div class="card shadow mb-4">
         <div class="card-header">
             <h6 class="m-0 font-weight-bold text-primary">
                 <button class='btn btn-sm ' data-toggle="modal" data-target="#tambah_hewan" style="color: white; background-color: #d7552a;"><i class="fas fa-plus fa-sm"></i>
                     Tambah
                     Hewan</button>
             </h6>
         </div>
     </div>
     <!-- Page Heading -->
     <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->

     <!-- DataTales Example -->
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
                         <tr>
                             <td style="text-align: center;">1</td>
                             <td>Sapi</td>

                             <td>
                                 <center><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#updatehewan"><i class="fas fa-search-plus"></i></button> </center>
                             </td>

                         </tr>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>

     </>
     <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->
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
                                 Status

                                 <select name="status" class="form-control" aria-label="stok_barang" aria-describedby="addon-wrapping">
                                     <option value="1">Aktif</option>
                                     <option value="2">Tidak Aktif</option>
                                 </select>
                             </div>
                         </div>

                         <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                             <button type="submit" class="btn " style="background-color: #d7552a; color: white;">Update</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Modal tambah hewan qurban -->
 <div class="modal fade" id="tambah_hewan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
             <div class="modal-content modal-lg">
                 <div class="modal-header modal-lg">
                     <h5 class="modal-title" id="exampleModalLongTitle">Tambah Hewan Qurban</h5>
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
                                 Status

                                 <select name="status" class="form-control" aria-label="stok_barang" aria-describedby="addon-wrapping">
                                     <option value="1">Aktif</option>
                                     <option value="2">Tidak Aktif</option>
                                 </select>
                             </div>
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                             <button type="submit" class="btn" style="background-color: #d7552a; color: white;">Tambah</button>
                         </div>
                     </form>
                 </div>
                 <script>
                     CKEDITOR.replace('desc');
                 </script>
             </div>
         </div>
     </div>
 </div>