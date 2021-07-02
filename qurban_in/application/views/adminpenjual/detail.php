 <!-- Begin Page Content -->
 <div class="container-fluid">
     <div class="card shadow mb-4 mt-3">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold" style="color: #d7552a;">Detail Hewan Qurban</h6>
         </div>
         <!-- Card Body -->
         <div class="card-body text-left">
             <div class="form-group row">
                 <div class="col-sm-6 mb-3 mb-sm-0">
                     Nama Hewan Qurban
                     <input type="text" name="nama_barang" class="form-control" readonly>
                 </div>
                 <div class="col-sm-6 mb-3 mb-sm-0">
                     Berat
                     <div class="input-group flex-nowrap">
                         <div class="input-group-prepend">
                             <span class="input-group-text" id="addon-wrapping">Kg</span>
                         </div>
                         <input type="number" min="1" max="1000" name="berat" class="form-control" aria-label="stok_barang" aria-describedby="addon-wrapping" readonly>
                     </div>
                 </div>
             </div>
             <div class="form-group row">
                 <div class="col-sm-6 mb-3 mb-sm-0">
                     Harga
                     <div class="input-group flex-nowrap">
                         <div class="input-group-prepend">
                             <span class="input-group-text" id="addon-wrapping">Rp.</span>
                         </div>
                         <input type="text" name="harga_barang" class="form-control" aria-label="harga_barang" aria-describedby="addon-wrapping" readonly>
                     </div>
                 </div>
                 <div class="col-sm-6 mb-3 mb-sm-0">
                     Stok
                     <div class="input-group flex-nowrap">
                         <div class="input-group-prepend">
                             <span class="input-group-text" id="addon-wrapping">Qty</span>
                         </div>
                         <input type="number" min="1" max="1000" name="stok_barang" class="form-control" aria-label="stok_barang" aria-describedby="addon-wrapping" readonly>
                     </div>
                 </div>
             </div>
             <div class="form-group">
                 Deskripsi
                 <textarea class="form-control" id="" rows="3" name="" readonly></textarea>
             </div>
             <div class="form-group">
                 <label>Foto Hewan</label>
                 <div class="col-sm-12 mb-3 mb-sm-0">
                     <div class="col-xl-4 col-lg-5">
                         <div class="card shadow mb-4">
                             <div class="card-body">
                                 <img src=" <?= base_url('assets/'); ?>img/sapi.jpg" class="card-img" alt="...">
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- <input type="file" name="foto_barang" class="form-control"> -->
             </div>
             <div class="modal-footer">
                 <a href="<?= base_url('penjual/inputhewan'); ?>">
                     <div class="btn btn-sm btn-secondary">Kembali</div>
                 </a>
                 <button type="submit" class="btn  btn-sm" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#updatehewan" style="background-color: #D7552A; color: white;">
                     Update
                 </button>
             </div>
         </div>
     </div>
     <!-- Pie Chart -->
     <!-- /.container-fluid -->

 </div>
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