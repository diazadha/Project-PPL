        <!-- Footer Start -->
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Get in Touch</h2>
                            <div class="contact-info">
                                <p><i class="fa fa-map-marker"></i>Masjid Agung Al-Azhar, Jl. Sisingamangaraja No.2, RT.2/RW.1, Selong, Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12110</p>
                                <p><i class="fa fa-envelope"></i>qurban.in24@gmail.com</p>
                                <p><i class="fa fa-phone"></i>(021) 72792753</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Footer Bottom Start -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 copyright">
                        <p>Copyright &copy; <a href="https://htmlcodex.com">HTML Codex</a>. All Rights Reserved</p>
                    </div>

                    <div class="col-md-6 template-by">
                        <p>Template By <a href="https://htmlcodex.com">HTML Codex</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->

        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src=" <?= base_url('assets/'); ?>lib/easing/easing.min.js"></script>
        <script src="<?= base_url('assets/'); ?>lib/slick/slick.min.js"></script>

        <!-- Template Javascript -->
        <script src="<?= base_url('assets/'); ?>js/main.js"></script>
        <script src="<?= base_url('assets/'); ?>js/pilihdistribusi.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src=" <?= base_url('assets/'); ?>js/proses_pesanan.js"></script>
        <script>
            $(document).on('click', '.bayar', function() {
                let nama_depan = $('#nama_depan').val();
                let nama_belakang = $('#nama_belakang').val();
                let email = $('#email').val();
                let nohp = $('#nohp').val();
                let id_tempatdistribusi = $('#id_distribusi').val();

                // console.log(nama_depan);
                // console.log(nama_belakang);
                // console.log(email);
                // console.log(nohp);
                // console.log(id_tempatdistribusi);


                $.ajax({
                    url: '<?= base_url('marketplace/pesanan'); ?>',
                    data: {
                        nama_depan: nama_depan,
                        nama_belakang: nama_belakang,
                        email: email,
                        nohp: nohp,
                        id_tempatdistribusi: id_tempatdistribusi
                    },
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data);
                        Swal.fire({
                            title: 'Sukses!',
                            html: "Pesanan Berhasil, Tagihan Pembayaran telah dikirimkan ke Halaman Akun Anda.",
                            icon: 'success',
                            timer: 3000,
                            showCancelButton: false,
                            showConfirmButton: false,
                            buttons: true,
                        });
                        setTimeout(function() {
                            window.location.href = "<?= base_url('user_akun'); ?>";
                        }, 3000);

                        // // console.log('sukses update');
                        // let harga = data.harga;
                        // console.log('harga : ', +harga);
                        // let total_harga = (qty_new) * parseInt(harga);
                        // $('#total_harga_' + id_keranjang).html('Rp. ' + total_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));

                        // let grand_total_before = $('#grand').val();
                        // console.log('grand_total_before : ' + grand_total_before)

                        // let grand_total = parseInt(harga) + parseInt(grand_total_before);
                        // $('#grand_total').html('Rp. ' + grand_total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
                        // console.log('grand : ', grand_total);
                        // console.log('total_harga : ' + total_harga);
                        // $('#grand').val(grand_total);
                    }
                });
            });
        </script>
        </body>

        </html>