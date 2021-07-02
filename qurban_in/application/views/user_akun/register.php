 <!-- Login Start -->
 <div class="login">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12">
                 <div class="register-form">
                     <form class="user" method="POST" action="<?= base_url('user_akun/register'); ?>">
                         <div class="row">
                             <div class="col-md-6">
                                 <label>Nama Depan</label>
                                 <?= form_error('namadepan', '<small class="text-danger pl-3">', '</small>'); ?>
                                 <input class="form-control" type="text" placeholder="Nama Depan" id="namadepan" name="namadepan">

                             </div>
                             <div class="col-md-6">
                                 <label>Nama Belakang</label>
                                 <?= form_error('namabelakang', '<small class="text-danger pl-3">', '</small>'); ?>
                                 <input class="form-control" type="text" placeholder="Nama Belakang" id="namabelakang" name="namabelakang">

                             </div>
                             <div class="col-md-6">
                                 <label>E-mail</label>
                                 <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                 <input class="form-control" type="text" placeholder="E-mail" id="email" name="email">

                             </div>
                             <div class="col-md-6">
                                 <label>No. HP</label>
                                 <?= form_error('nohp', '<small class="text-danger pl-3">', '</small>'); ?>
                                 <input class="form-control" type="text" placeholder="No. HP" id="nohp" name="nohp">

                             </div>
                             <div class="col-md-6">
                                 <label>Password</label>
                                 <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                 <input class="form-control" type="password" placeholder="Password" id="password1" name="password1">

                             </div>
                             <div class="col-md-6">
                                 <label>Ulangi Password</label>
                                 <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                 <input class="form-control" type="password" placeholder="Ulangi Password" id="password2" name="password2">

                             </div>
                             <div class="col-md-12">
                                 <button type="submit" class="btn">Register</button>
                             </div>
                         </div>
                     </form>
                     <hr>
                     <center>
                         <div class="col-md-12">
                             <p>Sudah Punya Akun? <a href="<?= base_url('user_akun/login'); ?>">Klik Disini</a> </p>
                         </div>
                     </center>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Login End -->
 <?php for ($x = 1; $x <= 3; $x++) {
        echo '<br>';
    } ?>