<!-- My Account Start -->
<div class="my-account">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i class="fa fa-shopping-bag"></i>Riwayat Pemesanan</a>
                    <a class="nav-link" id="dashboard-nav" data-toggle="pill" href="#dashboard-tab" role="tab"><i class="fa fa-tachometer-alt"></i>Dashboard</a>
                    <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Account Details</a>
                    <a class="nav-link" href="<?= base_url('user_akun/logout'); ?>"><i class="fa fa-sign-out-alt"></i>Logout</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Hewan</th>
                                        <th>Date</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Product Name</td>
                                        <td>01 Jan 2020</td>
                                        <td>$99</td>
                                        <td>Approved</td>
                                        <td> <a href="<?= base_url('user_akun/detail'); ?>"> <button class="btn">Detail</button> </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="dashboard-tab" role="tabpanel" aria-labelledby="address-nav">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="register-form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3>Toko</h3>
                                            <h5>Alamat : </h5>
                                            <p>JL. Melawai</p>
                                            <p>Tel: 012-345-6789</p>
                                            <a href="inputhewanqurban.html"> <button class="btn">Visit Admin
                                                    Toko</button> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="login-form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3>Masjid</h3>
                                            <h5>Alamat :</h5>
                                            <p>JL. Melawai</p>
                                            <p>Tel: 012-345-6789</p>
                                            <a href="adminmasjid.html"> <button class="btn">Visit Admin
                                                    Masjid</button> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                        <h4>Account Details</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="First Name">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="Last Name">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="Mobile">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="Email">
                            </div>
                            <div class="col-md-12">
                                <input class="form-control" type="text" placeholder="Address">
                            </div>
                            <div class="col-md-12">
                                <button class="btn">Update Account</button>
                                <br><br>
                            </div>
                        </div>
                        <h4>Password change</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <input class="form-control" type="password" placeholder="Current Password">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="New Password">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="Confirm Password">
                            </div>
                            <div class="col-md-12">
                                <button class="btn">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- My Account End -->
<?php for ($x = 1; $x <= 6; $x++) {
    echo '<br>';
} ?>