 <!-- Begin Page Content -->
 <div class="container-fluid">
     <div class="card shadow mb-4">
         <div class="card-header">
             <h6 class="m-0 font-weight-bold text-primary">
                 <button class='btn btn-sm ' data-toggle="modal" data-target="#tambah_hewan" style="background-color: #d7552a; color: white;"><i class="fas fa-plus fa-sm"></i>
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
             <h6 class="m-0 font-weight-bold" style="color: #d7552a;">Data Hewan Qurban</h6>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr style="text-align: center;">
                             <th>No</th>
                             <th>Nama Hewan</th>
                             <th>Harga</th>
                             <th>Stok</th>
                             <th>Kategori</th>
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
                        <?php $no=1;
                        foreach($hewan as $hwn) : ?>
                         <tr>
                             <td style="text-align: center;"><?php echo $no++ ?></td>
                             <td><?php echo $hwn->nama_hewan ?></td>
                             <td><?php echo $hwn->harga?></td>
                             <td><?php echo $hwn->berat?></td>
                             <td><?php echo $hwn->stok?></td>
                             <td><?php echo $hwn->kategori?></td>
                             
                             <td>
                                 <center>
                                     <a href="<?= base_url('penjual/detailhewan'); ?>" class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></a>
                                     <!-- <div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>
                                                    </div> -->
                                     <a href="<?= base_url('penjual/hapus/').$hwn->id_hewan; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                     
                                 </center>
                             </td>
                         </tr>
                     <?php endforeach; ?>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>

 </div>
 <!-- /.container-fluid -->
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
                      <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                 Kategori
                                 <div class="input-group flex-nowrap">
                                     
                                     <input type="text" name="kategori" class="form-control" aria-label="kategori" aria-describedby="addon-wrapping">
                                 </div>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                 Kelas
                                <div class="input-group flex-nowrap">
                                     
                                     <input type="text" name="kelas" class="form-control" aria-label="kelas" aria-describedby="addon-wrapping">
                                 </div>
                             </div>
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

                         </div>
                         <input type="hidden" class="form-control" id="admin" name="admin" value="">
                         <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                             <button type="submit" class="btn " style="background-color: #D7552A; color: white;">Tambah</button>
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
