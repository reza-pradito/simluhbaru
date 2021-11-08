<?= $this->extend('layout/main_template') ?>

<?= $this->section('content') ?>
<?php $seskab = session()->get('kodebapel'); ?>
<div class="container-fluid py-4">
    <div class="row">
        <!-- Map -->
        <div class="col-xs-12 col-md-12 col-lg-12 mb-4">
            <button type="button" class="btn bg-gradient-primary btn-sm">+ Tambah Data</button><br>
            <b>Daftar Penyuluh PNS Kab <?= ucwords(strtolower($nama_kabupaten)) ?></b>
            <p>Ditemukan <?= $jml_data ?> data</p>
            <div class="card">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NIK</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIP</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Unit<br>Kerja</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tempat<br>Tugas</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Wilayah<br>Kerja</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jabatan<br>Terakhir</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Terakhir<br>Update</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data<br>Dasar</th>
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
                                        <p class="text-xs font-weight-bold mb-0"><a href="<?= base_url('profil/penyuluh/detail/' . $row['noktp']) ?>"><?= $row['noktp'] ?></a></p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0"><a href="<?= base_url('penyuluh/PendInFormalPns/detail/' . $row['nip']) ?>"><?= $row['nip'] ?></p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0"><?= $row['gelar_dpn'] ?> <?= $row['nama'] ?> <?= $row['gelar_blk'] ?></p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0"><?= $row['nama_bapel'] ?></p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">Kec.<?= ucwords(strtolower($row['kecamatan_tugas'])) ?></p>
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0"><?= $row['status_kel'] ?></p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0"></p>
                                    </td>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0"><?= $row['tgl_update'] ?></p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <a href="#">
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#modal-form" class="btn bg-gradient-warning btn-sm">
                                                <i class="fas fa-edit"></i> Ubah
                                            </button>
                                        </a>
                                        <button type="button" class="btn bg-gradient-danger btn-sm">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                        </a>
                                        <a href="#">
                                            <button type="button" id="btnEditStatus" data-id="<?= $row['id']; ?>" class="btn bg-gradient-warning btn-sm">
                                                <i class="fas fa-edit"></i> Manajemen Status
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                    <!-- Modal -->
                    <div class="modal fade" id="modal-form-edit" tabindex="-1" role="dialog" aria-labelledby="modal-form-edit" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <div class="card card-plain">
                                        <div class="card-header pb-0 text-left">
                                            <h4 class="font-weight-bolder text-warning text-gradient">Tambah Data</h4>
                                        </div>
                                        <div class="card-body">
                                            <form method="POST" action="<?= base_url('Penyuluh/PenyuluhPns/save'); ?>">
                                                <? csrf_field(); ?>
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="hidden" name="id" id="id" class="form-control id">

                                                        <label>NIP</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" name="nip" id="nip" class="form-control nip" disabled>
                                                            <input type="text" name="nip_lama" id="nip_lama" class="form-control nip_lama" disabled>

                                                        </div>
                                                        <label>Nama Penyuluh</label> <span id="error_nama" class="text-danger ms-3"></span>
                                                        <div class="input-group mb-3">
                                                            <input type="text" name="gelar_dpn" id="gelar_dpn" class="form-control gelar_dpn" disabled>
                                                            <input type="text" name="nama" id="nama" class="form-control nama" disabled>
                                                            <input type="text" name="gelar_blk" id="gelar_blk" class="form-control gelar_blk" disabled>
                                                        </div>
                                                        <label>Per tanggal</label>
                                                        <div class="input-group mb-3">
                                                            <select id="day" name="tgl_status" class="form-select tgl_status" aria-label="Default select example">
                                                                <option value="">Tanggal</option>
                                                            </select>
                                                            <select id="month" name="tgl_status" class="form-select tgl_status" aria-label="Default select example">
                                                                <option value="">Bulan</option>
                                                            </select>
                                                            <select id="year" name="tgl_status" class="form-select tgl_status" aria-label="Default select example">
                                                                <option value="">Tahun</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <label>Status</label>
                                                    <div class="input-group mb-3">
                                                        <select name="status" id="status" class="form-control input-lg status">
                                                            <option value="">Pilih Status</option>
                                                            <?php
                                                            foreach ($status as $row2) {
                                                                echo '<option value="' . $row2["kode"] . '">' . $row2["nama_status"] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <label>Keterangan</label>
                                                    <div class="input-group mb-3">
                                                        <textarea class="form-control ket_status" name="ket_status" id="ket_status" placeholder="Keterangan"></textarea>
                                                    </div>
                                                    <div class="text-center">
                                                        <center><button type="button" id="btnSaveStatus" class="btn btn-round bg-gradient-warning btn-lg ajax-save">Simpan Data</button></center>
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
    <?php echo view('layout/footer'); ?>
</div>

<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
    $(document).ready(function() {


        $(document).delegate('#btnEditStatus', 'click', function() {
            $.ajax({
                url: '<?= base_url() ?>/Penyuluh/PenyuluhPns/editstatus/' + $(this).data('id'),
                type: 'GET',
                dataType: 'JSON',
                success: function(result) {
                    // console.log(result);

                    $('#id').val(result.id);
                    $('#nip_lama').val(result.nip_lama);
                    $('#nip').val(result.nip);
                    $('#nama').val(result.nama);
                    $('#gelar_dpn').val(result.gelar_dpn);
                    $('#gelar_blk').val(result.gelar_blk);
                    $('#status').val(result.status);
                    $('#day').val(result.tgl_status);
                    $('#ket_status').val(result.ket_status);


                    $('#modal-form-edit').modal('show');

                    $("#btnSaveStatus").attr("id", "btnDoEditStatus");

                    $(document).delegate('#btnDoEditStatus', 'click', function() {

                        var id = $('#id').val();
                        var nip_lama = $('#nip_lama').val();
                        var nip = $('#nip').val();
                        var nama = $('#nama').val();
                        var gelar_dpn = $('#gelar_dpn').val();
                        var gelar_blk = $('#gelar_blk').val();
                        var status = $('#status').val();
                        var tgl_status = $('#day').val();
                        var ket_status = $('#ket_status').val();

                        let formData = new FormData();
                        formData.append('id', id);
                        formData.append('nip_lama', nip_lama);
                        formData.append('nip', nip);
                        formData.append('nama', nama);
                        formData.append('gelar_dpn', gelar_dpn);
                        formData.append('gelar_blk', gelar_blk);
                        formData.append('status', status);
                        formData.append('tgl_status', tgl_status);
                        formData.append('ket_status', ket_status);


                        $.ajax({
                            url: '<?= base_url() ?>/Penyuluh/PenyuluhPns/updatestatus/' + id,
                            type: "POST",
                            data: formData,
                            cache: false,
                            processData: false,
                            contentType: false,
                            success: function(result) {
                                $('#modal-form-edit').modal('hide');
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