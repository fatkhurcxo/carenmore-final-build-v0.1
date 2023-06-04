$(function () {
    'use strict';

    $("#wizard").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "slideLeft"
    });

    $("#wizardVertical").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        stepsOrientation: 'vertical'
    });

    /* FORM VALIDATION */
    $('#dataProviderForm').validate({
        rules: {
            nama_provider: {
                required: true,
                minlength: 5
            },
            nama_pemilik: {
                required: true,
                minlength: 3
            },
            kontak: {
                required: true,
                number: true
            },
            alamat_jalan: {
                required: true,
                minlength: 5
            },
            alamat_rtrw: {
                required: true,
                maxlength: 5
            },
            alamat_kecamatan: {
                required: true,
                minlength: 3
            },
            alamat_kabupaten: {
                required: true,
                minlength: 3
            },
            alamat_provinsi: {
                required: true,
                minlength: 5
            },
            alamat_kodepos: {
                required: true,
                maxlength: 5,
                minlength: 5,
                digits: true
            },
            upload_ktp: {
                required: true,
                accept: "image/*",
                extension: "jpg|jpeg|png|HEIF"
            },
            upload_ktp_selfie: {
                required: true,
                accept: "image/*",
                extension: "jpg|jpeg|png|HEIF"
            },
            // termofservice: {
            //     required: true
            // }
        },
        messages: {
            nama_provider: {
                required: "Anda harus mengisi kolom nama layanan",
                minlength: "Nama layanan setidaknya harus lebih dari 5 karakter"
            },
            nama_pemilik: {
                required: "Anda harus mengisi kolom nama pemilik",
                minlength: "Nama pemilik setidaknya harus lebih dari 3 karakter"
            },
            kontak: {
                required: "Anda harus mengisi kolom nomor aktif",
                number: "Mohon gunakan angka yang valid"
            },
            alamat_jalan: {
                required: "Anda harus mengisi alamat nama jalan",
                minlength: "Alamat nama jalan setidaknya harus lebih dari 5 karakter"
            },
            alamat_rtrw: {
                required: "Anda harus mengisi alamat RT dan RW",
                maxlength: "Format RT dan RW tidak boleh lebih dari 5 karakter ( format: rt/rw | contoh: 03/01 )"
            },
            alamat_kecamatan: {
                required: "Anda harus mengisi alamat kecamatan",
                minlength: "Alamat kecamatan setidaknya harus lebih dari 3 karakter"
            },
            alamat_kabupaten: {
                required: "Anda harus mengisi alamat kabupaten",
                minlength: "Alamat kabupaten setidaknya harus lebih dari 3 karakter"
            },
            alamat_provinsi: {
                required: "Anda harus mengisi alamat provinsi",
                minlength: "Alamat provinsi setidaknya harus lebih dari 5 karakter"
            },
            alamat_kodepos: {
                required: "Anda harus mengisi alamat kodepos",
                minlength: "Masukkan 5 digit kodepos",
                maxlength: "Alamat kodepos tidak boleh lebih dari 5 digit",
                digits: "Anda hanya diperbolehkan menggunakan digit angka"
            },
            upload_ktp: {
                required: "Anda harus mengunggah foto KTP sebagai syarat untuk verifikasi",
                accept: "File yang anda unggah tidak sesuai, file hanya berupa gambar",
                extension: "Format file anda tidak sesuai, format yang diperbolehkan jpg, jpeg, png, dan HEIF"
            },
            upload_ktp_selfie: {
                required: "Anda harus mengunggah foto selfie dengan KTP sebagai syarat untuk verifikasi",
                accept: "File yang anda unggah tidak sesuai, file hanya berupa gambar",
                extension: "Format file anda tidak sesuai, format yang diperbolehkan jpg, jpeg, png, dan HEIF"
            },
            // termofservice: {
            //     required: "Anda diharuskan untuk menyetujui persyaratan layanan kami untuk melanjutkan proses pendaftaran"
            // }
        },
        errorPlacement: function (label, element) {
            $('.form-control').css({
                'background-color': 'transparent',
                'box-shadow': 'none'
            });
            label.addClass('mt-2 ml-0 text-danger');
            /* For Uploaded File Error
            label.css({
                'position': 'absolute',
                'bottom': '5px',
                'left': '5px',
                'width': '100%'
            })
            */
            $('input').css({
                'opacity': '1'
            })
            // label.css({
            //     'position': 'absolute'
            // })
            label.insertAfter(element);
        }
    })
});
