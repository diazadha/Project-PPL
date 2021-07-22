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
                                <form action=" <?= base_url('marketplace/checkout') ?> " method="GET">
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
<script>
    function tambah_qty(id_keranjang) {
        let qty = $('#qty_' + id_keranjang).val();
        let qty_new = parseInt(qty) + 1;
        console.log('QTY 1 : ' + qty_new);
        console.log('id keranjang : ' + id_keranjang);


        $.ajax({
            url: '<?= base_url('marketplace/updatekeranjang'); ?>',
            data: {
                id_keranjang: id_keranjang,
                qty: qty_new
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                // console.log('sukses update');
                let harga = data.harga;
                console.log('harga : ', +harga);
                let total_harga = (qty_new) * parseInt(harga);
                $('#total_harga_' + id_keranjang).html('Rp. ' + total_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));

                let grand_total_before = $('#grand').val();
                console.log('grand_total_before : ' + grand_total_before)

                let grand_total = parseInt(harga) + parseInt(grand_total_before);
                $('#grand_total').html('Rp. ' + grand_total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
                console.log('grand : ', grand_total);
                console.log('total_harga : ' + total_harga);
                $('#grand').val(grand_total);
            }
        });
    }

    function kurang_qty(id_keranjang) {
        let qty = $('#qty_' + id_keranjang).val();
        let qty_new = parseInt(qty) - 1;
        console.log('QTY 1 : ' + qty_new);
        console.log('id keranjang : ' + id_keranjang);


        $.ajax({
            url: '<?= base_url('marketplace/updatekeranjang'); ?>',
            data: {
                id_keranjang: id_keranjang,
                qty: qty_new
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                // console.log('sukses update');
                let harga = data.harga;
                console.log('harga : ', +harga);
                let total_harga = (qty_new) * parseInt(harga);
                $('#total_harga_' + id_keranjang).html('Rp. ' + total_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));

                let grand_total_before = $('#grand').val();
                console.log('grand_total_before : ' + grand_total_before)

                let grand_total = parseInt(grand_total_before) - parseInt(harga);
                $('#grand_total').html('Rp. ' + grand_total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
                console.log('grand : ', grand_total);
                console.log('total_harga : ' + total_harga);
                $('#grand').val(grand_total);
            }
        });
    }
</script>