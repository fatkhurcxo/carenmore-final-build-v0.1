$(function () {
    'use strict';

    /*
    $.validator.setDefaults({
        submitHandler: function () {
            alert("Submit data berhasil!");
        }
    });
    */

    $('#formUpdateProfile').validate({
        rules: {
            nama_layanan: {
                required: true,
                minlength: 3
            },
            pemilik_layanan: {
                required: true,
                minlength: 3
            },
            kontak: {
                required: true,
                digits: true
            }
        },
        messages: {
            nama_layanan: {
                required: "Nama layanan tidak boleh kosong",
                minlength: "Nama layanan setidaknya harus lebih dari 3 karakter"
            },
            pemilik_layanan: {
                required: "Pemilik layanan tidak boleh kosong",
                minlength: "Pemilik layanan setidaknya harus lebih dari 3 karakter"
            },
            kontak: {
                required: "Kontak tidak boleh kosong",
                digits: "Mohon gunakan angka yang valid ( 0-9 )"
            }
        },
        errorPlacement: function (label, element) {
            $('.form-control').css({
                'background-color': 'transparent',
                'box-shadow': 'none'
            });
            label.addClass('mt-2 ml-0 text-danger');
            label.insertAfter(element);
        }
    })

    /* FORM VERIFIKASI DETAIL PROVIDER */
    $('#detailProviderForm').validate({
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
                number: true,
                maxlength: 15
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
            alamat_desa: {
                required: true,
                minlength: 3
            }
            // upload_ktp: {
            //     required: true,
            //     accept: "image/*",
            //     extension: "jpg|jpeg|png|HEIF"
            // },
            // upload_ktp_selfie: {
            //     required: true,
            //     accept: "image/*",
            //     extension: "jpg|jpeg|png|HEIF"
            // },
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
                number: "Mohon gunakan angka yang valid",
                maxlength: "Nomor yang anda gunakan tidak boleh lebih dari 15 digit"
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
            alamat_desa: {
                required: "Anda harus mengisi alamat desa/kelurahan",
                minlength: "Alamat desa/kelurahan setidaknya harus lebih dari 3 karakter"
            }
            // upload_ktp: {
            //     required: "Anda harus mengunggah foto KTP sebagai syarat untuk verifikasi",
            //     accept: "File yang anda unggah tidak sesuai, file hanya berupa gambar",
            //     extension: "Format file anda tidak sesuai, format yang diperbolehkan jpg, jpeg, png, dan HEIF"
            // },
            // upload_ktp_selfie: {
            //     required: "Anda harus mengunggah foto selfie dengan KTP sebagai syarat untuk verifikasi",
            //     accept: "File yang anda unggah tidak sesuai, file hanya berupa gambar",
            //     extension: "Format file anda tidak sesuai, format yang diperbolehkan jpg, jpeg, png, dan HEIF"
            // },
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
            // $('input').css({
            //     'opacity': '1'
            // })
            // label.css({
            //     'background-color': 'green'
            // })
            label.insertAfter(element);
        }
    })
    /* FORM PENGAJUAN LAYANAN BERLANGGANAN */
    $('#berlaggananForm').validate({
        rules: {
            nama_layanan_berlangganan: {
                required: true,
                minlength: 5
            },
            layanan_dipilih: {
                required: true,
            },
            jumlah: {
                required: true,
                number: true
            },
            deepfree: {
                required: true,
                number: true
            },
            voucher: {
                required: true,
                number: true
            },
            harga_berlangganan: {
                required: true
            }
        },
        messages: {
            nama_layanan_berlangganan: {
                required: "Mohon masukkan nama layanan berlangganan anda",
                minlength: "Nama layanan minimum 5 karakter"
            },
            layanan_dipilih: {
                required: "Mohon pilih layanan anda"
            },
            jumlah: {
                required: "Mohon masukkan jumlah pencucian",
                number: "Mohon gunakan angka yang valid"
            },
            deepfree: {
                required: "Mohon masukkan jumlah deepclean",
                number: "Mohon gunakan angka yang valid"
            },
            voucher: {
                required: "Mohon masukkan jumlah voucher",
                number: "Mohon gunakan angka yang valid"
            },
            harga_berlangganan: {
                required: "Mohon masukkan harga layanan berlangganan anda",
            }
        },
        errorPlacement: function (label, element) {
            label.addClass('mt-2 text-danger');
            label.insertAfter(element);
        },
        highlight: function (element, errorClass) {
            $(element).parent().addClass('has-danger')
            $(element).addClass('form-control-danger')
        }
    })
    /* FORM TAMBAH LAYANAN */
    $('#layananForm').validate({
        rules: {
            nama_layanan: {
                required: true,
                minlength: 5
            },
            harga: {
                required: true,
                digits: true
            },
            jenis_kendaraan: {
                required: true
            },
            jenis_layanan: {
                required: true
            }
            /* ,
            tempat: {
                required: true
            },
            air: {
                required: true
            }
            */
        },
        messages: {
            nama_layanan: {
                required: "Mohon masukkan nama layanan anda",
                minlength: "Nama layanan minimum 5 karakter"
            },
            harga: {
                required: "Mohon masukkan harga layanan anda",
                digits: "Mohon gunakan angka untuk harga"
            },
            jenis_kendaraan: {
                required: "Anda harus memilih jenis kendaraan"
            },
            jenis_layanan: {
                required: "Anda harus memilih jenis layanan"
            }
        },
        errorPlacement: function (label, element) {
            label.addClass('mt-2 text-danger');
            label.insertAfter(element);
        },
        highlight: function (element, errorClass) {
            $(element).parent().addClass('has-danger')
            $(element).addClass('form-control-danger')
        }
    })
    /* SET FORM FOR-CUCI-DIRUMAH */
    // $('.for-cuci-dirumah').hide();
    /*
    $('.jenis_layanan').on('change', function () {
        var jenis_layanan = $(this).val();
        if (jenis_layanan === "Cuci Dirumah") {
            $('.for-cuci-dirumah').show();
        } else if (jenis_layanan === 'Cuci Ditempat') {
            $('.for-cuci-dirumah').hide();
        }
    })
    */


    /* FORMAT INPUT HARGA */
    /*
    $("#harga").on({
        keyup: function () {
            let input_val = $(this).val();
            input_val = numberToCurrency(input_val);
            $(this).val(input_val);
        },
        blur: function () {
            let input_val = $(this).val();
            input_val = numberToCurrency(input_val, true, true);
            $(this).val(input_val);
        }
    });
    */
    /* FORMAT HARGA BERLANGGNAN */
    $("#harga_berlangganan").on({
        keyup: function () {
            let input_val = $(this).val();
            input_val = numberToCurrency(input_val);
            $(this).val(input_val);
        },
        blur: function () {
            let input_val = $(this).val();
            input_val = numberToCurrency(input_val, true, true);
            $(this).val(input_val);
        }
    });
    var numberToCurrency = function (input_val, fixed = false, blur = false) {
        // don't validate empty input
        if (!input_val) {
            return "";
        }

        if (blur) {
            if (input_val === "" || input_val == 0) { return 0; }
        }

        if (input_val.length == 1) {
            return parseInt(input_val);
        }

        input_val = '' + input_val;

        let negative = '';
        if (input_val.substr(0, 1) == '-') {
            negative = '-';
        }
        // check for decimal
        if (input_val.indexOf(".") >= 0) {
            // get position of first decimal
            // this prevents multiple decimals from
            // being entered
            var decimal_pos = input_val.indexOf(".");

            // split number by decimal point
            var left_side = input_val.substring(0, decimal_pos);
            var right_side = input_val.substring(decimal_pos);

            // add commas to left side of number
            left_side = left_side.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");

            if (fixed && right_side.length > 3) {
                right_side = parseFloat(0 + right_side).toFixed(2);
                right_side = right_side.substr(1, right_side.length);
            }

            // validate right side
            right_side = right_side.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");

            // Limit decimal to only 2 digits
            if (right_side.length > 2) {
                right_side = right_side.substring(0, 2);
            }

            if (blur && parseInt(right_side) == 0) {
                right_side = '';
            }

            // join number by .
            // input_val = left_side + "." + right_side;

            if (blur && right_side.length < 1) {
                input_val = left_side;
            } else {
                input_val = left_side + "." + right_side;
            }
        } else {
            // no decimal entered
            // add commas to number
            // remove all non-digits
            input_val = input_val.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        if (input_val.length > 1 && input_val.substr(0, 1) == '0' && input_val.substr(0, 2) != '0.') {
            input_val = input_val.substr(1, input_val.length);
        } else if (input_val.substr(0, 2) == '0,') {
            input_val = input_val.substr(2, input_val.length);
        }

        return negative + input_val;
    };
    $(function () {
        // validate signup form on keyup and submit
        $("#signupForm").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                },
                topic: {
                    required: "#newsletter:checked",
                    minlength: 2
                },
                agree: "required"
            },
            messages: {
                name: {
                    required: "Please enter a name",
                    minlength: "Name must consist of at least 3 characters"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                confirm_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
                email: "Please enter a valid email address",
            },
            errorPlacement: function (label, element) {
                label.addClass('mt-2 text-danger');
                label.insertAfter(element);
            },
            highlight: function (element, errorClass) {
                $(element).parent().addClass('has-danger')
                $(element).addClass('form-control-danger')
            }
        });
    });
});
