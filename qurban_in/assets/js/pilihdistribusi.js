function pilih_distribusi(id_tempatdistribusi) {
    let id_distribusi = id_tempatdistribusi;
    console.log(id_distribusi);

    $.ajax({
        url: 'http://localhost/Project-PPL/qurban_in/marketplace/get_tempat_distribusi',
        data: {
            id_distribusi: id_distribusi
        },
        method: 'post',
        dataType: 'json',
        success: function (data) {
            console.log(data);
            $('#nama_masjid').html(data.nama_tempat);
            $('#alamat').html(data.alamat);
            $('#provinsi').html(data.provinsi);
            $('#id_distribusi').val(data.id_tempatdistribusi);
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

}