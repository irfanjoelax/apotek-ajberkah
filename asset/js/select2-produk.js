$('.select2-produk').select2({
    theme: 'bootstrap-5',
    placeholder: 'Ketikkan nama barang/produk',
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    minimumInputLength: 1,
    ajax: {
        dataType: 'json',
        url: './app/produk/select2.php',
        data: function (params) {
            return {
                search: params.term
            }
        },
        processResults: function (data, page) {
            return {
                results: data
            };
        },
    }
}).on('select2:select', function (evt) {
    var data = $(".select2-produk option:selected").val();
});