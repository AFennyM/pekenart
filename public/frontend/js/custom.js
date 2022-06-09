$(document).ready(function () {

    $('.addToCartBtn').click(function (e) {
        e.preventDefault();

        var produk_id = $(this).closest('.produk_data').find('.produk_id').val();
        var produk_kuantitas = $(this).closest('.produk_data').find('.kuantitas-input').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "/tambah-ke-keranjang",
            data: {
                'produk_id': produk_id,
                'produk_kuantitas': produk_kuantitas,
            },
            success: function (response) {
                swal(response.status);
            }
        });
        // alert(produk_id);
        // alert(produk_kuantitas);
    });

    $('.increment-btn').click(function (e) {
        e.preventDefault();

        // var inc_value = $('.kuantitas-input').val();
        var inc_value = $(this).closest('.produk_data').find('.kuantitas-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value < 10)
        {
            value++;
            // $('.kuantitas-input').val(value);
            $(this).closest('.produk_data').find('.kuantitas-input').val(value);
        }
    });

});

$(document).ready(function () {
    $('.decrement-btn').click(function (e) {
        e.preventDefault();

        // var dec_value = $('.kuantitas-input').val();
        var dec_value = $(this).closest('.produk_data').find('.kuantitas-input').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value > 1)
        {
            value--;
            // $('.kuantitas-input').val(value);
            $(this).closest('.produk_data').find('.kuantitas-input').val(value);
        }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.hapus-keranjang-item').click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var produk_id = $(this).closest('.produk_data').find('.produk_id').val();
        $.ajax({
            method: "POST",
            url: "hapus-keranjang-item",
            data: {
                'produk_id': produk_id,
            },
            success: function(response) {
                window.location.reload();
                swal('', response.status, 'success');
            }
        });
    });

    $('.changeQuantity').click(function (e) {
        e.preventDefault();

        var produk_id = $(this).closest('.produk_data').find('.produk_id').val();
        var kuantitas = $(this).closest('.produk_data').find('.kuantitas-input').val();
        data = {
            'produk_id': produk_id,
            'produk_kuantitas': kuantitas,
        }
        $.ajax({
            method: "POST",
            url: "update-keranjang",
            data: data,
            success: function (response) {
                window.location.reload();
            }
        });
    
    });
  
});
