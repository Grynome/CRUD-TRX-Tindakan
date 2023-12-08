$('.log-out').on('click', function () {
    var getLink = $(this).attr('href');
    window.location.href = getLink;
    jQuery("#formLog").submit();
});
// Store
// Pasien
$('.str-ps').on('click', function () {
    if ($('#Pasien').val() === "" || $('#Alamat').val() === "" || $('#NoHp').val() === "") {
        if ($('#Pasien').val() === "" && $('#Alamat').val() === "" && $('#NoHp').val() === "") {
            Swal.fire({
                title: "Semua Form Kosong!",
                icon: "warning",
                confirmButtonColor: '#d33',
                confirmButtonText: 'OK',
            });
        } else if ($('#Pasien').val() === "") {
            Swal.fire({
                title: "Belum Masukin Nama!",
                icon: "warning",
                confirmButtonColor: '#d33',
                confirmButtonText: 'OK',
            });
        } else if ($('#Alamat').val() === "") {
            Swal.fire({
                title: "Alamat Masih Kosong!",
                icon: "warning",
                confirmButtonColor: '#d33',
                confirmButtonText: 'OK',
            });
        } else if ($('#NoHp').val() === "") {
            Swal.fire({
                title: "NoHp Masih Kosong!",
                icon: "warning",
                confirmButtonColor: '#d33',
                confirmButtonText: 'OK',
            });
        }
    } else {
        Swal.fire({
            title: "Lanjut Simpan Data?",
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Yes',
        }).then((result) => {
            if (result.isConfirmed) {
                jQuery("#str-fm-ps").submit();
            }
        })
    }
    return false;
});
// END Pasien
// Dokter
$('.str-dr').on('click', function () {
    if ($('#Dokter').val() === "") {
        Swal.fire({
            title: "Nama Dokter Kosong!",
            icon: "warning",
            confirmButtonColor: '#d33',
            confirmButtonText: 'OK',
        });
    } else {
        Swal.fire({
            title: "Lanjut Simpan Data?",
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Yes',
        }).then((result) => {
            if (result.isConfirmed) {
                jQuery("#str-fm-dr").submit();
            }
        })
    }
    return false;
});
// END Dokter
// Tindakan
$('.str-td').on('click', function () {
    if ($('#Tindakan').val() === "" && $('#Harga').val() === "") {
        Swal.fire({
            title: "Data Masih Kosong!",
            icon: "warning",
            confirmButtonColor: '#d33',
            confirmButtonText: 'OK',
        });
    } else if ($('#Tindakan').val() === "") {
        Swal.fire({
            title: "Nama Tindakan Kosong!",
            icon: "warning",
            confirmButtonColor: '#d33',
            confirmButtonText: 'OK',
        });
    } else if ($('#Harga').val() === "") {
        Swal.fire({
            title: "Harga Tindakan Kosong!",
            icon: "warning",
            confirmButtonColor: '#d33',
            confirmButtonText: 'OK',
        });
    } else {
        Swal.fire({
            title: "Lanjut Simpan Data?",
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Yes',
        }).then((result) => {
            if (result.isConfirmed) {
                jQuery("#str-fm-td").submit();
            }
        })
    }
    return false;
});
// END Tindakan
// Transaksi
$('.str-trx').on('click', function () {
    var isValid = false;

    $('.tbl-tindakan').each(function () {
        var row = $(this);
        var checkbox = row.find('#check-tindakan');
        var qtyInput = row.find('#qty-tindakan');

        if (checkbox.prop('checked') && qtyInput.val().trim() !== "") {
            isValid = true;
            return false; // Exit the loop early since at least one valid input is found
        }
    });

    // If no valid inputs are found, show the alert
    if (!isValid || $('#id-ps').val() === "" || $('#id-dr').val() === "") {
        Swal.fire({
            title: "Data Belum Lengkap!",
            icon: "warning",
            confirmButtonColor: '#d33',
            confirmButtonText: 'OK',
        });
    }

    // If at least one valid input is found, show the confirmation dialog
    if (isValid && $('#id-ps').val() !== "" && $('#id-dr').val() !== "") {
        Swal.fire({
            title: "Lanjut Simpan Data?",
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Yes',
        }).then((result) => {
            if (result.isConfirmed) {
                jQuery("#str-fm-trx").submit();
            }
        });
    }

    return false;
});
// END Transaksi
// End Store
for (let i = 0; i < 50; i++) {
    // Swal Pasien
    // PATCH
    $('.edt-ps' + i + '').on('click', function () {
        if ($('#Edit-Pasien').val() === "" || $('#Edit-Alamat').val() === "" || $('#Edit-NoHP').val() === "") {
            if ($('#Edit-Pasien').val() === "" && $('#Edit-Alamat').val() === "" && $('#Edit-NoHP').val() === "") {
                Swal.fire({
                    title: "Semua Form Kosong!",
                    icon: "warning",
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'OK',
                });
            } else if ($('#Edit-Pasien').val() === "") {
                Swal.fire({
                    title: "Belum Masukin Nama!",
                    icon: "warning",
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'OK',
                });
            } else if ($('#Edit-Alamat').val() === "") {
                Swal.fire({
                    title: "Alamat Masih Kosong!",
                    icon: "warning",
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'OK',
                });
            } else if ($('#Edit-NoHP').val() === "") {
                Swal.fire({
                    title: "NoHp Masih Kosong!",
                    icon: "warning",
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'OK',
                });
            }
        } else {
            Swal.fire({
                title: "Lanjut Rubah Data?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes',
            }).then((result) => {
                if (result.isConfirmed) {
                    jQuery('#edt-fm-ps' + i + '').submit();
                }
            })
        }
        return false;
    });
    // END PATCH
    // Destroy
    $('.dstr-ps' + i + '').on('click', function () {
        Swal.fire({
            title: "Hapus Data?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
        }).then((result) => {
            if (result.isConfirmed) {
                jQuery('#dstr-ps' + i + '').submit();
            }
        })
        return false;
    });
    // END Destroy
    // End Swal Pasien
    // Swal Dokter
    // PATCH
    $('.edt-dr' + i + '').on('click', function () {
        if ($('#Edit-Dokter').val() === "") {
            Swal.fire({
                title: "Nama Dokter Kosong!",
                icon: "warning",
                confirmButtonColor: '#d33',
                confirmButtonText: 'OK',
            });
        } else {
            Swal.fire({
                title: "Lanjut Rubah Data?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes',
            }).then((result) => {
                if (result.isConfirmed) {
                    jQuery('#edt-fm-dr' + i + '').submit();
                }
            })
        }
        return false;
    });
    // END PATCH
    // Destroy
    $('.dstr-dr' + i + '').on('click', function () {
        Swal.fire({
            title: "Hapus Data?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
        }).then((result) => {
            if (result.isConfirmed) {
                jQuery('#dstr-dr' + i + '').submit();
            }
        })
        return false;
    });
    // END Destroy
    // End Swal Dokter
    // Swal Tindakan
    // PATCH
    $('.edt-td' + i + '').on('click', function () {
        if ($('#Edit-Tindakan').val() === "" && $('#Edit-Harga').val() === "") {
            Swal.fire({
                title: "Data Masih Kosong!",
                icon: "warning",
                confirmButtonColor: '#d33',
                confirmButtonText: 'OK',
            });
        } else if ($('#Edit-Tindakan').val() === "") {
            Swal.fire({
                title: "Nama Tindakan Kosong!",
                icon: "warning",
                confirmButtonColor: '#d33',
                confirmButtonText: 'OK',
            });
        } else if ($('#Edit-Harga').val() === "") {
            Swal.fire({
                title: "Harga Tindakan Kosong!",
                icon: "warning",
                confirmButtonColor: '#d33',
                confirmButtonText: 'OK',
            });
        } else {
            Swal.fire({
                title: "Lanjut Rubah Data?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes',
            }).then((result) => {
                if (result.isConfirmed) {
                    jQuery('#edt-fm-td' + i + '').submit();
                }
            })
        }
        return false;
    });
    // END PATCH
    // Destroy
    $('.dstr-trx' + i + '').on('click', function () {
        Swal.fire({
            title: "Hapus Data?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
        }).then((result) => {
            if (result.isConfirmed) {
                jQuery('#fm-dstr-trx' + i + '').submit();
            }
        })
        return false;
    });
    // END Destroy
    // End Swal Dokter

}
// Mouse Pointer Select List
$('.select-ps').click(function () {
    let id_ps = $(this).closest('tr').find('td:eq(1)').text().trim();
    let nama_ps = $(this).closest('tr').find('td:eq(2)').text().trim();
    $('#id-ps').val(id_ps);
    $('#nama-ps').val(nama_ps);
    $('#list-pasien').modal('hide');
});
$('.select-dr').click(function () {
    let id_dr = $(this).closest('tr').find('td:eq(1)').text().trim();
    let nama_dr = $(this).closest('tr').find('td:eq(2)').text().trim();
    $('#id-dr').val(id_dr);
    $('#nama-dr').val(nama_dr);
    $('#list-dokter').modal('hide');
});
// Clear Select
$('.clear-ps').click(function () {
    $('#id-ps').val('');
    $('#nama-ps').val('');
});
$('.clear-dr').click(function () {
    $('#id-dr').val('');
    $('#nama-dr').val('');
});
// Clear Input QTY
document.addEventListener('DOMContentLoaded', function () {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');

    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            var qtyInput = this.closest('tr').querySelector('input[name^="qty"]');
            if (!this.checked) {
                qtyInput.value = ''; // Clear the quantity input when unchecked
            }
        });
    });
});