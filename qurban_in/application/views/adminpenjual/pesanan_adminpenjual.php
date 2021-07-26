 <!-- Begin Page Content -->
 <div class="container-fluid">
     <!-- Page Heading -->
     <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold" style="color: #D7552A;">Riwayat Pemesanan Customer</h6>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr style="text-align: center;">
                             <th>No</th>
                             <th>Tanggal Pemesanan</th>
                             <th>Nama Pembeli</th>
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
                         <?php $no = 1; ?>
                         <?php foreach ($invoice as $i) : ?>
                             <tr>
                                 <td style="text-align: center;"><?= $no; ?></td>
                                 <!-- <td style="text-align: center;"><?= $i['id_invoice']; ?></td> -->
                                 <td style="text-align: center;"> <?= date("d/m/y H:i:s", strtotime($i['order_date'])); ?></td>
                                 <td><?= $i['nama_depan'] ?> <?= $i['nama_belakang']; ?></td>
                                 <td>
                                     <center>
                                         <a href="<?= base_url('penjual/detail_pesanan/') . $i['id_invoice']; ?>" class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></a>
                                         <!-- <div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>
                                                    </div> -->
                                     </center>
                                 </td>
                             </tr>
                             <?php $no++; ?>
                         <?php endforeach; ?>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>

 </div>
 <!-- /.container-fluid -->