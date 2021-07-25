 <!-- Begin Page Content -->
 <div class="container-fluid">
     <div class="card shadow mb-4">
         <div class="card-header">
             <h6 class="m-0 font-weight-bold text-primary">
                 <button class='btn btn-sm tambahdata' onclick="tambah()" data-toggle="modal" data-target="#modal" style="color: white; background-color: #d7552a;"><i class="fas fa-plus fa-sm"></i>
                     Tambah
                     Kategori</button>
             </h6>
         </div>
         <?= form_error('nama_barang', '<div class="alert alert-danger" role="alert">', '</div>');   ?>
         <?= $this->session->flashdata('message'); ?>
     </div>
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
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold " style="color: #d7552a;">Kategori</h6>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="table-layout: auto; width: 50%;">
                     <thead>
                         <tr style="text-align: center;">
                             <th>No</th>
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
                         <?php $i = 1;  ?>
                         <?php foreach ($kategori as $k) : ?>
                             <tr>
                                 <td scope="row" style="text-align: center;"><?= $i; ?></td>
                                 <td><?php echo $k['kategori']; ?></td>
                                 <td>
                                     <center>
                                         <a href=" " class=" btn btn-success btn-sm tampilmodalubah" onclick="edit(<?= $k['id_kategori']; ?>)" data-toggle="modal" data-target="#modal"><i class="fas fa-search-plus"></i></a>
                                         <a href="<?= base_url('superadmin/delete_kategori/') . $k['id_kategori']; ?>" class=" btn btn-danger btn-sm" onclick="return confirm('Apakah Kamu Yakin?');"><i class="fas fa-trash-alt"></i></a>
                                     </center>
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
                     <h5 class="modal-title" id="exampleModalLongTitle">Tambah Kategori</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <form id="form" action=" <?= base_url('superadmin/tambahkategori'); ?> " method="post" enctype="multipart/form-data">
                         <div class="form-group">

                             Nama Kategori
                             <input type="text" name="kategori" id="kategori" class="form-control" required>

                             <input type="hidden" name="id_kategori" id="id_kategori" required>
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
 <script>
     function edit(id_kategori) {
         //  $('.tambahdata').on('Click', function() {
         //      $('#exampleModalLongTitle').html('Tambah Kategori');
         //      $('.button_tambah').html('Tambah');
         //  })
         $('#exampleModalLongTitle').html('Edit Kategori');
         $('.button_tambah').html('Edit');
         $('.modal-body form').attr('action', '<?= base_url('superadmin/') ?>updatekategori');

         //  const id_kategori = $(this).data('id'); //data('id') -> ini diambil dari data-id yang ada di HTML
         console.log(id_kategori);

         $.ajax({
             url: '<?= base_url('superadmin/') ?>getubah',
             data: {
                 id_kategori: id_kategori
             },
             method: 'post',
             dataType: 'json',
             success: function(data) {
                 console.log(data);
                 $('#kategori').val(data.kategori);
                 $('#id_kategori').val(data.id_kategori);
             }
         });

     };

     function tambah() {
         $('#exampleModalLongTitle').html('Tambah Kategori');
         $('.button_tambah').html('Tambah');
         $('#kategori').val('');
         $('.modal-body form').attr('action', '<?= base_url('superadmin/') ?>tambahkategori');
     }
 </script>