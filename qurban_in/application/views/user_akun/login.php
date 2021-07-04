<!-- Login Start -->

<div class="login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <?php if ($this->session->flashdata('message')) : ?>
                    <?php $message = $this->session->flashdata('message'); ?>
                    <?= '<div class="alert alert-danger">' . $message . '</div>'; ?>
                    <?php $this->session->unset_userdata('message'); ?>
                <?php endif; ?>

                <?php if ($this->session->flashdata('message1')) : ?>
                    <?php $message = $this->session->flashdata('message1'); ?>
                    <?= '<div class="alert alert-success">' . $message . '</div>'; ?>
                    <?php $this->session->unset_userdata('message1'); ?>
                <?php endif; ?>

                <?php if ($this->session->flashdata('message2')) : ?>
                    <?php $message = $this->session->flashdata('message2'); ?>
                    <?= '<div class="alert alert-info">' . $message . '</div>'; ?>
                    <?php $this->session->unset_userdata('message2'); ?>
                <?php endif; ?>

                <div class="login-form">
                    <form method="POST" action="<?= base_url('user_akun/login'); ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <label>E-mail</label>
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                <input class="form-control" type="text" placeholder="E-mail" id="email" name="email">
                            </div>
                            <div class="col-md-6">
                                <label>Password</label>
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                <input class="form-control" type="password" placeholder="Password" id="password" name="password">
                            </div>
                            <!-- <div class="col-md-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="newaccount">
                                    <label class="custom-control-label" for="newaccount">Keep me signed in</label>
                                </div>
                            </div> -->

                            <div class="col-md-12">
                                <button type="submit" class="btn">Submit</button>
                            </div>

                        </div>
                    </form>
                    <hr>
                    <center>
                        <div class="col-md-12">
                            <p>Belum Punya Akun? <a href="<?= base_url('user_akun/register'); ?>">Daftar Disini</a> </p>
                        </div>
                    </center>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Login End -->
<?php for ($x = 1; $x <= 8; $x++) {
    echo '<br>';
} ?>