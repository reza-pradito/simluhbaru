<?= $this->extend('layout/main_template') ?>

<?= $this->section('content') ?>


<?php
if (empty(session()->get('status_user')) || session()->get('status_user') == '2') {
    $kode = '00';
} elseif (session()->get('status_user') == '1') {
    $kode = session()->get('kodebakor');
} elseif (session()->get('status_user') == '200') {
    $kode = session()->get('kodebapel');
} elseif (session()->get('status_user') == '300') {
    $kode = session()->get('kodebpp');
}
?>
<center>
    <h4> Daftar Gapoktan di Kecamatan <?= ucwords(strtolower($nama_kecamatan)) ?> </h4>
</center>
<center>
    <h4>Data ditemukan <?= ucwords(strtolower($jum)) ?> </h2>
</center>
<button type="button" data-bs-toggle="modal" data-bs-target="#modal-form" class="btn bg-gradient-primary btn-sm ">+ Tambah Data</button>
<div class="card">
    <div class="table-responsive">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Nama Desa</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Nama Gapoktan</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Nama Ketua</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Nama Bendahara</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Alamat Sekretariat</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Anggota Poktan</th>
                    <th class="text-secondary opacity-7"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($tabel_data as $key => $row) {
                ?>

                    <tr>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $i++ ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['nm_desa'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['nama_gapoktan'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['ketua_gapoktan'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['simluh_bendahara'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['alamat'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <a href="<?= ('listgapoktandesa?kode_desa=' . $row['id_desa']) ?>">
                                <p class="text-xs font-weight-bold mb-0"><?= $row['jumpok'] ?></p>
                        </td></a>

                        <td class="align-middle text-center text-sm">

                            <button type="button" data-id_gap="<?= $row['id_gap'] ?>" id="btnEditGap" class="btn bg-gradient-warning btn-sm">
                                <i class="fas fa-edit"></i> Ubah
                            </button>

                            <button class="btn btn-danger btn-sm" id="btnHapus" data-id_gap="<?= $row['id_gap'] ?>" type="button">
                                <i class="fas fa-trash"></i> Hapus
                            </button>

                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>

        </table>
        <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-left">
                                <h4 class="font-weight-bolder text-warning text-gradient">Tambah Data</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="<?= base_url('KelembagaanPelakuUtama/Gapoktan/ListGapoktan/save'); ?>">
                                    <? csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-5" mt-5>
                                            <label>Kecamatan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Kecamatan" value="<?= $nama_kecamatan; ?>" disabled>
                                            </div>
                                            <label>Desa</label>
                                            <div class="input-group mb-3">
                                                <select name="kode_desa" id="kode_desa" class="form-control  input-lg" required>
                                                    <option value="">Pilih Desa</option>
                                                    <?php
                                                    foreach ($desa as $row2) {
                                                        echo '<option value="' . $row2["id_desa"] . '">' . $row2["nm_desa"] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <label>Nama Gapoktan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control " id="nama_gapoktan" name="nama_gapoktan" placeholder="Nama Gapoktan" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Nama Ketua</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="ketua_gapoktan" name="ketua_gapoktan" placeholder="Nama Ketua" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Nama Bendahara</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control " id="simluh_bendahara" name="simluh_bendahara" placeholder="Nama Bendahara" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Nama Sekretaris</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control " id="simluh_sekretaris" name="simluh_sekretaris" placeholder="Nama Sekretaris" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Alamat Lengkap Sekretariat</label>
                                            <textarea class="form-control " id="alamat" placeholder="Alamat" name="alamat" aria-label="Password" aria-describedby="password-addon"></textarea>
                                            <label>Tahun Pembentukan</label>
                                            <div class="input-group mb-3">
                                                <select id="year" class="form-select " aria-label="Default select example" name="simluh_tahun_bentuk">
                                                    <option selected>Pilih Tahun</option>

                                                </select>
                                            </div>
                                            <label>SK Pengukuhan</label>
                                            <div class="input-group mb-3">
                                                <select class="form-select" id="simluh_sk_pengukuhan" name="simluh_sk_pengukuhan" aria-label="Default select example">
                                                    <option selected>Pilih </option>
                                                    <option value="ada">ada</option>
                                                    <option value="tidak">tidak</option>

                                                </select>
                                            </div>
                                            <input type="hidden" name="kode_kab" id="kode_kab" value="<?= $kode; ?>">
                                            <input type="hidden" name="kode_kec" id="kode_kec" value="<?= $kode_kec; ?>">
                                            <input type="hidden" class="form-control" id="id_gap" name="id_gap" value="<?= $row['id_gap'] ?>">

                                            <div class="text-center">
                                                <button type="button" id="btnSave" class="btn btn-round bg-gradient-warning btn-sm ">Simpan Data</button>
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
</div>

</div>
</div>
</div>
</tbody>
</table>
</div>

</div>
<?php echo view('layout/footer'); ?>
<br>

<?= $this->endSection() ?>

<?php $this->section('script') ?>


<script>
    $(document).ready(function() {

        $(document).delegate('#btnSave', 'click', function() {

            var kode_prop = $('#kode_prop').val();
            var kode_kec = $('#kode_kec').val();
            var kode_kab = $('#kode_kab').val();
            var kode_desa = $('#kode_desa').val();
            var ketua_gapoktan = $('#ketua_gapoktan').val();
            var nama_gapoktan = $('#nama_gapoktan').val();
            var alamat = $('#alamat').val();
            var simluh_sekretaris = $('#simluh_sekretaris').val();
            var simluh_bendahara = $('#simluh_bendahara').val();
            var simluh_tahun_bentuk = $('#year').val();
            var simluh_sk_pengukuhan = $('#simluh_sk_pengukuhan').val();
            $.ajax({
                url: '<?= base_url() ?>/KelembagaanPelakuUtama/Gapoktan/ListGapoktan/save/',
                type: 'POST',
                data: {
                    'kode_prop': kode_prop,
                    'kode_kec': kode_kec,
                    'kode_kab': kode_kab,
                    'kode_desa': kode_desa,
                    'nama_gapoktan': nama_gapoktan,
                    'ketua_gapoktan': ketua_gapoktan,
                    'alamat': alamat,
                    'simluh_sekretaris': simluh_sekretaris,
                    'simluh_bendahara': simluh_bendahara,
                    'simluh_tahun_bentuk': simluh_tahun_bentuk,
                    'simluh_sk_pengukuhan': simluh_sk_pengukuhan
                },
                success: function(result) {
                    result = JSON.parse(result);
                    if (result.value) {
                        Swal.fire({
                            title: 'Sukses',
                            text: "Sukses tambah data",
                            type: 'success',
                        }).then((result) => {

                            if (result.value) {
                                location.reload();
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: "Gagal tambah data. " + result.message,
                            type: 'error',
                        }).then((result) => {

                        });
                    }
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
            Swal.fire({
                title: 'Apakah anda yakin',
                text: "Data akan dihapus ?",
                type: 'warning',
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus Data!'
            }).then((result) => {
                if (result.value) {
                    var id_gap = $(this).data('id_gap');

                    $.ajax({
                        url: '<?= base_url() ?>/KelembagaanPelakuUtama/Gapoktan/ListGapoktan/delete/' + id_gap,
                        type: 'POST',

                        success: function(result) {
                            Swal.fire({
                                title: 'Sukses',
                                text: "Sukses hapus data",
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
                                text: "Gagal hapus data",
                                type: 'error',
                            }).then((result) => {
                                if (result.value) {
                                    location.reload();
                                }
                            });
                        }
                    });
                }
            });

        });

        $(document).delegate('#btnEditGap', 'click', function() {
            $.ajax({
                url: '<?= base_url() ?>/KelembagaanPelakuUtama/Gapoktan/ListGapoktan/edit/' + $(this).data('id_gap'),
                type: 'GET',
                dataType: 'JSON',
                success: function(result) {
                    // console.log(result);

                    $('#id_gap').val(result.id_gap);
                    $('#kode_kec').val(result.kode_kec);
                    $('#kode_prop').val(result.kode_prop);
                    $('#kode_desa').val(result.kode_desa);
                    $('#kode_kab').val(result.kode_kab);
                    $('#nama_gapoktan').val(result.nama_gapoktan);
                    $('#ketua_gapoktan').val(result.ketua_gapoktan);
                    $('#alamat').val(result.alamat);
                    $('#year').val(result.simluh_tahun_bentuk);
                    $('#simluh_bendahara').val(result.simluh_bendahara);
                    $('#simluh_sekretaris').val(result.simluh_sekretaris);
                    $('#simluh_sk_pengukuhan').val(result.simluh_sk_pengukuhan);


                    $('#modal-form').modal('show');
                    $("#btnSave").attr("id", "btnDoEdit");

                    $(document).delegate('#btnDoEdit', 'click', function() {


                        var id_gap = $('#id_gap').val();
                        var kode_prop = $('#kode_prop').val();
                        var kode_kec = $('#kode_kec').val();
                        var kode_kab = $('#kode_kab').val();
                        var kode_desa = $('#kode_desa').val();
                        var nama_gapoktan = $('#nama_gapoktan').val();
                        var ketua_gapoktan = $('#ketua_gapoktan').val();
                        var alamat = $('#alamat').val();
                        var simluh_tahun_bentuk = $('#year').val();
                        var simluh_sk_pengukuhan = $('#simluh_sk_pengukuhan').val();
                        var simluh_bendahara = $('#simluh_bendahara').val();
                        var simluh_sekretaris = $('#simluh_sekretaris').val();

                        let formData = new FormData();
                        formData.append('id_gap', id_gap);
                        formData.append('kode_prop', kode_prop);
                        formData.append('kode_kec', kode_kec);
                        formData.append('kode_kab', kode_kab);
                        formData.append('kode_desa', kode_desa);
                        formData.append('nama_gapoktan', nama_gapoktan);
                        formData.append('ketua_gapoktan', ketua_gapoktan);
                        formData.append('alamat', alamat);
                        formData.append('simluh_tahun_bentuk', simluh_tahun_bentuk);
                        formData.append('simluh_sk_pengukuhan', simluh_sk_pengukuhan);
                        formData.append('simluh_bendahara', simluh_bendahara);
                        formData.append('simluh_sekretaris', simluh_sekretaris);

                        $.ajax({
                            url: '<?= base_url() ?>/KelembagaanPelakuUtama/Gapoktan/ListGapoktan/update/' + id_gap,
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
<?php $this->endSection() ?>