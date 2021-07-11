<!-- Cart Start -->
<div class="cart-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="cart-page-inner">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Hewan</th>
                                    <th>Nama Toko</th>
                                    <th>Harga</th>
                                    <th>QTY</th>
                                    <th>Total Harga</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <?php if ($total_cart['total_cart'] != 0) : ?>
                                <tbody class="align-middle">
                                    <?php $grand_total = 0;
                                    $no = 1; ?>
                                    <?php foreach ($tampil_keranjang as $k) : ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td>
                                                <div class="img">
                                                    <hr>
                                                    <a href="#"><img src="<?= base_url('uploads/hewan/') . $k['foto_hewan']; ?>" alt="Image" style="width: 500px; height: 100px;"></a>
                                                    <p><?= ucwords($k['nama_hewan']);  ?></p>
                                                </div>
                                            </td>
                                            <td style="text-align: left;"><?= ucwords($k['nama_toko']); ?></td>
                                            <td style="text-align: right;">Rp. <?= number_format($k['harga'], 0, ',', '.') ?></td>
                                            <td>
                                                <div class="qty">
                                                    <button class="btn-minus" onclick="kurang_qty(<?= $k['id_keranjang']; ?>)"><i class="fa fa-minus"></i></button>
                                                    <input type="text" id="qty_<?= $k['id_keranjang']; ?>" value=" <?= $k['qty']; ?>" min="1" readonly>
                                                    <button class="btn-plus" onclick="tambah_qty(<?= $k['id_keranjang']; ?>)"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </td>
                                            <td style="text-align: right;"> <span id="total_harga_<?= $k['id_keranjang']; ?>">Rp. <?= number_format($k['total_harga'], 0, ',', '.') ?></span> </td>
                                            <td><a href=" <?= base_url('marketplace/hapus_item_keranjang/') . $k['id_keranjang']; ?> "><i class="fa fa-trash"></i></a></td>
                                            <?php $no++; ?>
                                        </tr>
                                        <?php $grand_total = $grand_total + $k['total_harga']; ?>
                                    <?php endforeach; ?>
                                </tbody>
                        </table>
                        <div class="modal-footer ml-auto">
                            <a href="<?= base_url('marketplace'); ?>">
                                <div class="btn btn-sm btn-secondary">Kembali</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart-page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="cart-summary">
                                <form action=" <?= base_url('marketplace/checkout') ?> " method="POST">
                                    <div class="cart-content">
                                        <h1>Cost</h1>
                                        <!-- <p>Sub Total<span></span></p> -->
                                        <!-- <p>Shipping Cost<span>$1</span></p> -->
                                        <h2>Total<span id="grand_total">Rp. <?= number_format($grand_total, 0, ',', '.'); ?> </span></h2>

                                        <input type="hidden" id="grand" name="grand" value="<?= $grand_total; ?>">
                                    </div>
                                    <center>
                                        <div class="cart-btn">
                                            <button type="submit" class="btn btn-primary">Checkout</button>
                                        </div>
                                    </center>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php else : ?>
    <tbody class="align-middle">
        <tr>
            <td colspan="7">Belum ada barang di keranjang</td>
        </tr>
    </tbody>
    </table>
    <div class="modal-footer ml-auto">
        <a href="<?= base_url('marketplace'); ?>">
            <div class="btn btn-sm btn-secondary">Kembali</div>
        </a>
    </div>
    </div>
    </div>
    </div>
    <div class="col-lg-4">
        <div class="cart-page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-summary">
                        <div class="cart-content">
                            <h1>Cost</h1>
                            <!-- <p>Sub Total<span></span></p> -->
                            <!-- <p>Shipping Cost<span>$1</span></p> -->
                            <h2>Total<span>Rp. 0 </span></h2>
                        </div>
                        <center>
                            <div class="row">
                                <div class="col-lg-6 mb-4 col-sm-8">
                                    <div class="cart-btn">
                                        <button type="update" class="btn btn-primary">Update Cart</button>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4 col-sm-8">
                                    <div class="cart-btn">
                                        <a href="<?= base_url('marketplace/checkout'); ?>"> <button type="submit" class="btn btn-primary">Checkout</button> </a>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-sm-8">

                                    </div>
                                    <div class="col-sm-8">
                                        <div class="cart-btn">
                                            <a href="<?= base_url('marketplace/checkout'); ?>"> <button type="submit" class="btn btn-primary">Checkout</button> </a>
                                        </div>
                                    </div> -->
                        </center>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
<?php endif; ?>