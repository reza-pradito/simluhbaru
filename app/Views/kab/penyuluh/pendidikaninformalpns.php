<?= $this->extend('layout/main_template') ?>

<?= $this->section('content') ?>
<?php $seskab = session()->get('kodebapel'); ?>
<div class="container-fluid py-4">
    <div class="row">
        <!-- Map -->
        <div class="col-xs-12 col-md-12 col-lg-12 mb-4">
            <button type="button" data-bs-toggle="modal" data-bs-target="#modal-form" class="btn bg-gradient-primary btn-sm">+ Tambah Data</button><br>
            <div class="card">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Diklat</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kelompok Diklat</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lokasi</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Penyelenggara</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Terakhir Update</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($tabel_data as $row) {
                            ?>
                                <tr>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0"><?= $i++ ?></p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0"><?= $row['nama'] ?></a></p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0"><?= $row['kelompok'] ?></p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0"><?= $row['lokasi'] ?></p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0"><?= $row['penyelenggara'] ?></p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">Kec.<?= ucwords(strtolower($row['tgl_update'])) ?></p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <a href="#">
                                            <button type="button" id="btnEdit" data-id="<?= $row['id']; ?>" class="btn bg-gradient-warning btn-sm">
                                                <i class="fas fa-edit"></i> Ubah
                                            </button>
                                        </a>
                                        <button class="btn bg-gradient-danger btn-sm" id="btnHapus" data-id="<?= $row['id']; ?>" type="submit" onclick="return confirm('Are you sure ?')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                    <!-- modal -->
                    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <div class="card card-plain">
                                        <div class="card-header pb-0 text-left">
                                            <h4 class="font-weight-bolder text-warning text-gradient">Ubah Data</h4>
                                        </div>
                                        <div class="card-body">
                                            <form method="POST" action="<?= base_url('Penyuluh/PendInFormalPns/save'); ?>">
                                                <? csrf_field(); ?>
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="hidden" name="satminkal" id="satminkal" class="form-control satminkal" value="<?= $seskab; ?>">
                                                        <input type="hidden" id="tgl_update" name="tgl_update" class="form-control">
                                                        <input type="hidden" id="id" name="id">
                                                        <label>Nama Penyuluh</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" id="nip" name="nip" class="form-control">
                                                        </div>
                                                        <label>Nama Diklat Fungsional</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" name="nama" id="nama" class="form-control nama" placeholder="Nama">
                                                        </div>
                                                        <label>Provinsi</label>
                                                        <div class="input-group mb-3">
                                                            <select name="kode_prop" id="kode_prop" class="form-control input-lg kode_prop">
                                                                <option value="">Pilih Provinsi</option>
                                                                <?php
                                                                foreach ($diklat as $row2) {
                                                                    echo '<option value="' . $row2["id"] . '">' . $row2["nama"] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <label>Tahun Diklat</label>
                                                        <div class="input-group mb-3">
                                                            <select id="year" name="thn_lahir" class="form-select thn_lahir" aria-label="Default select example">
                                                                <option value="">Tahun</option>
                                                            </select>
                                                        </div>
                                                        <label>Lembaga Penyelenggara</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" name="penyelenggara" id="penyelenggara" class="form-control" placeholder="Lembaga Penyelenggara">
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <center><button type="button" id="btnSave" class="btn btn-round bg-gradient-warning btn-lg w-100 mt-4 mb-0">Simpan Data</button></center>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <?= $this->endSection() ?>
    <?= $this->section('script') ?>
    <script>
        $(document).ready(function() {

            $(document).delegate('#btnSave', 'click', function() {

                var nip = $('#nip').val();
                var nama = $('#nama').val();
                var kelompok = $('#kelompok').val();
                var lokasi = $('#lokasi').val();
                var tgl_mulai = $('#year').val();
                var penyelenggara = $('#penyelenggara').val();
                var jml_jam = $('#jml_jam').val();
                var satminkal = $('#satminkal').val();
                var tgl_update = $('#tgl_update').val();

                $.ajax({
                    url: '<?= base_url() ?>/Penyuluh/PendInformalPns/save/',
                    type: 'POST',
                    data: {
                        'nip': nip,
                        'nama': nama,
                        'kelompok': kelompok,
                        'lokasi': lokasi,
                        'tgl_mulai': year,
                        'penyelenggara': penyelenggara,
                        'jml_jam': jml_jam,
                        'satminkal': satminkal,
                        'tgl_update': tgl_update
                    },
                    success: function(result) {
                        Swal.fire({
                            title: 'Sukses',
                            text: "Sukses tambah data",
                            type: 'success',
                        }).then((result) => {

                            if (result.value) {
                                location.reload();
                            }
                        });
                    },
                    error: function(jqxhr, status, exception) {
                        Swal.fire({
                            title: 'Error',
                            text: "Gagal tambah data",
                            type: 'error',
                        }).then((result) => {
                            if (result.value) {
                                location.reload();
                            }
                        });
                    }
                });
            });

            $(document).delegate('#btnHapus', 'click', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: '<?= base_url() ?>/Penyuluh/PendInformalPns/delete/' + id,
                    type: 'POST',
                    success: function(result) {
                        Swal.fire({
                            title: 'Sukses',
                            text: "Sukses Hapus data",
                            type: 'success',
                        }).then((result) => {

                            if (result.value) {
                                location.reload();
                            }
                        });
                    },
                    error: function(jqxhr, status, exception) {
                        Swal.fire({
                            title: 'Error',
                            text: "Gagal Hapus data",
                            type: 'error',
                        }).then((result) => {
                            if (result.value) {
                                location.reload();
                            }
                        });
                    }

                });
            });


            $(document).delegate('#btnEdit', 'click', function() {
                $.ajax({
                    url: '<?= base_url() ?>/Penyuluh/PendInformalPns/edit/' + $(this).data('id_thl'),
                    type: 'GET',
                    dataType: 'JSON',
                    success: function(result) {
                        // console.log(result);

                        $('#id_thl').val(result.id_thl);
                        $('#id').val(result.id);
                        $('#jenis_penyuluh').val(result.jenis_penyuluh);
                        $('#noktp').val(result.noktp);
                        $('#nama').val(result.nama);
                        $('#gelar_dpn').val(result.gelar_dpn);
                        $('#gelar_blk').val(result.gelar_blk);
                        $('#day').val(result.tgl_lahir);
                        $('#month').val(result.bln_lahir);
                        $('#year').val(result.thn_lahir);
                        $('#tempat_lahir').val(result.tempat_lahir);
                        if (result.jenis_kelamin == "1") {
                            $("#jenis_kelamin").prop("checked", true);
                        } else {
                            $("#jenis_kelamin").prop("checked", false);
                        }
                        if (result.jenis_kelamin == "2") {
                            $("#jenis_kelamin").prop("checked", true);
                        } else {
                            $("#jenis_kelamin").prop("checked", false);
                        }
                        $('#status_kel').val(result.status_kel);
                        $('#agama').val(result.agama);
                        if (result.ahli_tp == "1") {
                            $("#ahli_tp").prop("checked", true);
                        } else {
                            $("#ahli_tp").prop("checked", false);
                        }
                        $('#detail_tp').val(result.detail_tp);
                        if (result.ahli_nak == "2") {
                            $("#ahli_nak").prop("checked", true);
                        } else {
                            $("#ahli_nak").prop("checked", false);
                        }
                        $('#detail_nak').val(result.detail_nak);
                        if (result.ahli_bun == "3") {
                            $("#ahli_bun").prop("checked", true);
                        } else {
                            $("#ahli_bun").prop("checked", false);
                        }
                        $('#detail_bun').val(result.detail_bun);
                        if (result.ahli_hor == "4") {
                            $("#ahli_hor").prop("checked", true);
                        } else {
                            $("#ahli_hor").prop("checked", false);
                        }
                        $('#detail_hor').val(result.detail_hor);
                        if (result.ahli_lainnya == "5") {
                            $("#ahli_lainnya").prop("checked", true);
                        } else {
                            $("#ahli_lainnya").prop("checked", false);
                        }
                        $('#detail_lainnya').val(result.detail_lainnya);
                        $('#instansi_pembina').val(result.instansi_pembina);
                        $('#satminkal').val(result.satminkal);
                        $('#prop_satminkal').val(result.prop_satminkal);
                        $('#unit_kerja').val(result.unit_kerja);
                        $('#kode_kab').val(result.kode_kab);
                        $('#tempat_tugas').val(result.tempat_tugas);
                        $('#wil_kerja').val(result.wil_kerja);
                        $('#alamat').val(result.alamat);
                        $('#dati2').val(result.dati2);
                        $('#kodepos').val(result.kodepos);
                        $('#kode_prop').val(result.kode_prop);
                        $('#telp').val(result.telp);
                        $('#email').val(result.email);
                        $('#tgl_update').val(result.tgl_update);
                        $('#no_peserta').val(result.no_peserta);
                        $('#angkatan').val(result.angkatan);
                        if (result.penyuluh_di == "kabupaten") {
                            $("#penyuluh_di").prop("checked", true);
                        } else {
                            $("#penyuluh_di").prop("checked", false);
                        }
                        if (result.penyuluh_di == "kecamatan") {
                            $("#penyuluh_di").prop("checked", true);
                        } else {
                            $("#penyuluh_di").prop("checked", false);
                        }
                        $('#tempat_tugas').val(result.kecamatan_tugas);
                        $('#wil_kerja2').val(result.wil_kerja2);
                        $('#wil_kerja3').val(result.wil_kerja3);
                        $('#wil_kerja4').val(result.wil_kerja4);
                        $('#wil_kerja5').val(result.wil_kerja5);
                        $('#wil_kerja6').val(result.wil_kerja6);
                        $('#wil_kerja7').val(result.wil_kerja7);
                        $('#wil_kerja8').val(result.wil_kerja8);
                        $('#wil_kerja9').val(result.wil_kerja9);
                        $('#wil_kerja10').val(result.wil_kerja10);
                        $('#mapping').val(result.mapping);
                        $('#sumber_dana').val(result.sumber_dana);
                        $('#tingkat_pendidikan').val(result.tingkat_pendidikan);
                        $('#bidang_pendidikan').val(result.bidang_pendidikan);
                        $('#jurusan').val(result.jurusan);
                        $('#nama_sekolah').val(result.nama_sekolah);

                        $('#modal-form').modal('show');

                        $("#btnSave").attr("id", "btnDoEdit");

                        $(document).delegate('#btnDoEdit', 'click', function() {

                            var id_thl = $('#id_thl').val();
                            var id = $('#id').val();
                            var jenis_penyuluh = $('#jenis_penyuluh').val();
                            var noktp = $('#noktp').val();
                            var nama = $('#nama').val();
                            var gelar_dpn = $('#gelar_dpn').val();
                            var gelar_blk = $('#gelar_blk').val();
                            var tgl_lahir = $('#day').val();
                            var bln_lahir = $('#month').val();
                            var thn_lahir = $('#year').val();
                            var tempat_lahir = $('#tempat_lahir').val();
                            var jenis_kelamin = $(".jenis_kelamin:checked").val();
                            var status_kel = $('#status_kel').val();
                            var agama = $('#agama').val();
                            var ahli_tp = $(".ahli_tp")[0].checked ? $(".ahli_tp:checked").val() : "";
                            var detail_tp = $('#detail_tp').val();
                            var ahli_nak = $(".ahli_nak")[0].checked ? $(".ahli_nak:checked").val() : "";
                            var detail_nak = $('#detail_nak').val();
                            var ahli_bun = $(".ahli_bun")[0].checked ? $(".ahli_bun:checked").val() : "";
                            var detail_bun = $('#detail_bun').val();
                            var ahli_hor = $(".ahli_hor")[0].checked ? $(".ahli_hor:checked").val() : "";
                            var detail_hor = $('#detail_hor').val();
                            var ahli_lainnya = $(".ahli_lainnya")[0].checked ? $(".ahli_lainnya:checked").val() : "";
                            var detail_lainnya = $('#detail_lainnya').val();
                            var instansi_pembina = $('#instansi_pembina').val();
                            var satminkal = $('#satminkal').val();
                            var prop_satminkal = $('#prop_satminkal').val();
                            var unit_kerja = $('#unit_kerja').val();
                            var kode_kab = $('#kode_kab').val();
                            var tempat_tugas = $('#tempat_tugas').val();
                            var wil_kerja = $('#wil_kerja').val();
                            var alamat = $('#alamat').val();
                            var dati2 = $('#dati2').val();
                            var kodepos = $('#kodepos').val();
                            var kode_prop = $('#kode_prop').val();
                            var telp = $('#telp').val();
                            var email = $('#email').val();
                            var tgl_update = $('#tgl_update').val();
                            var no_peserta = $('#no_peserta').val();
                            var angkatan = $('#angkatan').val();
                            var penyuluh_di = $(".rad:checked").val();
                            var kecamatan_tugas = $('#tempat_tugas').val();
                            var wil_kerja2 = $('#wil_kerja2').val();
                            var wil_kerja3 = $('#wil_kerja3').val();
                            var wil_kerja4 = $('#wil_kerja4').val();
                            var wil_kerja5 = $('#wil_kerja5').val();
                            var wil_kerja6 = $('#wil_kerja6').val();
                            var wil_kerja7 = $('#wil_kerja7').val();
                            var wil_kerja8 = $('#wil_kerja8').val();
                            var wil_kerja9 = $('#wil_kerja9').val();
                            var wil_kerja10 = $('#wil_kerja10').val();
                            var mapping = $('#mapping').val();
                            var sumber_dana = $('#sumber_dana').val();
                            var tingkat_pendidikan = $('#tingkat_pendidikan').val();
                            var bidang_pendidikan = $('#bidang_pendidikan').val();
                            var jurusan = $('#jurusan').val();
                            var nama_sekolah = $('#nama_sekolah').val();

                            let formData = new FormData();
                            formData.append('id_thl', id_thl);
                            formData.append('id', id);
                            formData.append('jenis_penyuluh', jenis_penyuluh);
                            formData.append('noktp', noktp);
                            formData.append('nama', nama);
                            formData.append('gelar_dpn', gelar_dpn);
                            formData.append('gelar_blk', gelar_blk);
                            formData.append('tgl_lahir', tgl_lahir);
                            formData.append('bln_lahir', bln_lahir);
                            formData.append('thn_lahir', thn_lahir);
                            formData.append('tempat_lahir', tempat_lahir);
                            formData.append('jenis_kelamin', jenis_kelamin);
                            formData.append('status_kel', status_kel);
                            formData.append('agama', agama);
                            formData.append('ahli_tp', ahli_tp);
                            formData.append('detail_tp', detail_tp);
                            formData.append('ahli_nak', ahli_nak);
                            formData.append('detail_nak', detail_nak);
                            formData.append('ahli_bun', ahli_bun);
                            formData.append('detail_bun', detail_bun);
                            formData.append('ahli_hor', ahli_hor);
                            formData.append('detail_hor', detail_hor);
                            formData.append('ahli_lainnya', ahli_lainnya);
                            formData.append('detail_lainnya', detail_lainnya);
                            formData.append('instansi_pembina', instansi_pembina);
                            formData.append('satminkal', satminkal);
                            formData.append('prop_satminkal', prop_satminkal);
                            formData.append('unit_kerja', unit_kerja);
                            formData.append('kode_kab', kode_kab);
                            formData.append('tempat_tugas', tempat_tugas);
                            formData.append('wil_kerja', wil_kerja);
                            formData.append('alamat', alamat);
                            formData.append('dati2', dati2);
                            formData.append('kodepos', kodepos);
                            formData.append('kode_prop', kode_prop);
                            formData.append('telp', telp);
                            formData.append('email', email);
                            formData.append('tgl_update', tgl_update);
                            formData.append('no_peserta', no_peserta);
                            formData.append('angkatan', angkatan);
                            formData.append('penyuluh_di', penyuluh_di);
                            formData.append('kecamatan_tugas', kecamatan_tugas);
                            formData.append('wil_kerja2', wil_kerja2);
                            formData.append('wil_kerja3', wil_kerja3);
                            formData.append('wil_kerja4', wil_kerja4);
                            formData.append('wil_kerja5', wil_kerja5);
                            formData.append('wil_kerja6', wil_kerja6);
                            formData.append('wil_kerja7', wil_kerja7);
                            formData.append('wil_kerja8', wil_kerja8);
                            formData.append('wil_kerja9', wil_kerja9);
                            formData.append('wil_kerja10', wil_kerja10);
                            formData.append('mapping', mapping);
                            formData.append('sumber_dana', sumber_dana);
                            formData.append('tingkat_pendidikan', tingkat_pendidikan);
                            formData.append('bidang_pendidikan', bidang_pendidikan);
                            formData.append('jurusan', jurusan);
                            formData.append('nama_sekolah', nama_sekolah);


                            $.ajax({
                                url: '<?= base_url() ?>/Penyuluh/PendInformalPns/update/' + id,
                                type: "POST",
                                data: formData,
                                cache: false,
                                processData: false,
                                contentType: false,
                                success: function(result) {
                                    $('#modal-form').modal('hide');
                                    Swal.fire({
                                        title: 'Sukses',
                                        text: "Sukses edit data",
                                        type: 'success',
                                    }).then((result) => {

                                        if (result.value) {
                                            location.reload();
                                        }
                                    });

                                },
                                error: function(jqxhr, status, exception) {

                                    Swal.fire({
                                        title: 'Error',
                                        text: "Gagal edit data",
                                        type: 'Error',
                                    }).then((result) => {

                                        if (result.value) {
                                            location.reload();
                                        }
                                    });

                                }
                            });
                        });

                    }
                });

                $('.modal').on('hidden.bs.modal', function() {
                    $(this).find('form')[0].reset();
                });

            });

        });
    </script>

    <script>
        var d = new Date();

        // Set the value of the "date" field
        document.getElementById("tgl_update").value = d.toLocaleString('id-ID', {
            day: 'numeric',
            month: 'long',
            year: 'numeric'
        }).split(' ').join(' ');
    </script>


    <script>
        $(document).ready(function() {
            const monthNames = ["Bulan", "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                "Juli", "Agustus", "September", "Oktober", "November", "Desember"
            ];
            let qntYears = 80;
            let selectYear = $("#year");
            let selectMonth = $("#month");
            let selectDay = $("#day");
            let currentYear = new Date().getFullYear();

            for (var y = 0; y < qntYears; y++) {
                let date = new Date(currentYear);
                let yearElem = document.createElement("option");
                yearElem.value = currentYear
                yearElem.textContent = currentYear;
                selectYear.append(yearElem);
                currentYear--;
            }

            for (var m = 1; m <= 12; m++) {
                let month = monthNames[m];
                let monthElem = document.createElement("option");
                monthElem.value = m;
                monthElem.textContent = month;
                selectMonth.append(monthElem);
            }

            var d = new Date();
            var month = d.getMonth();
            var year = d.getFullYear();
            var day = d.getDate();

            selectYear.val(year);
            selectYear.on("change", AdjustDays);
            selectMonth.val(month);
            selectMonth.on("change", AdjustDays);

            AdjustDays();
            selectDay.val(day)

            function AdjustDays() {
                var year = selectYear.val();
                var month = parseInt(selectMonth.val()) + 1;
                selectDay.empty();

                //get the last day, so the number of days in that month
                var days = new Date(year, month, 0).getDate();

                //lets create the days of that month
                for (var d = 1; d <= days; d++) {
                    var dayElem = document.createElement("option");
                    dayElem.value = d;
                    dayElem.textContent = d;
                    selectDay.append(dayElem);
                }
            }
        });
    </script>
    <?= $this->endSection() ?>