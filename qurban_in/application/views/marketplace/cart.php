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
                                    <th>Nama Hewan</th>
                                    <th>Quantity</th>
                                    <th>Harga</th>
                                    <th>Sub-Total</th>

                                </tr>
                            </thead>
                            <?php
                            $no = 1;
                            foreach ($this->cart->contents() as $items) : ?>
                                <tbody class="align-middle">
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $items['name'] ?></td>
                                        <td><?php echo $items['qty'] ?></td>
                                        <td>Rp. <?php echo number_format($items['price'], 0, ',', '.')  ?></td>
                                        <td>Rp. <?php echo number_format($items['subtotal'], 0, ',', '.')  ?></td>
                                    </tr>
                                <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart-page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="cart-summary">
                                <div class="cart-content">
                                    <h1>Cart Summary</h1>
                                    <p>Sub Total<span>Rp. <?php echo number_format($this->cart->total(), 0, ',', '.') ?></span></p>
                                    <h2>Grand Total<span>Rp. <?php echo number_format($this->cart->total(), 0, ',', '.') ?></span></h2>
                                </div>
                                <center>
                                    <div class="col-sm-8">
                                        <div class="cart-btn">
                                            <button type="update" class="btn btn-primary">Update Cart</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="cart-btn">
                                            <a href="<?= base_url('marketplace/checkout'); ?>"> <button type="submit" class="btn btn-primary">Checkout</button> </a>
                                        </div>
                                    </div>
                                </center>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>