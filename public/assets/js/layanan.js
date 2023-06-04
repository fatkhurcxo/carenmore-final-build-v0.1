$(function () {
    $('.for-cuci-dirumah').hide();
    $('#jenis_layanan').change(function () {
        if ($('#cuci_dirumah').is(":selected")) {
            $('.for-cuci-dirumah').show();
        } else if ($('#cuci_ditempat').is(":selected")) {
            $('.for-cuci-dirumah').hide();
        }
    }).trigger('change');
})
