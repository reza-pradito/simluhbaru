<?= $this->extend('layout/main_template') ?>

<?= $this->section('content') ?>




<button type="button" data-bs-toggle="modal" data-bs-target="#modal-form" class="btn bg-gradient-primary btn-sm">+ Tambah Data</button>
<br>
<b>Daftar Penyuluh Swasta Kab <?= ucwords(strtolower($nama_kabupaten)) ?></b>
<p>Ditemukan <?= $jml_data ?> data</p>
<div class="card">
    <div class="table-responsive">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">No KTP</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Nama</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Satmikal</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Tempat/Tgl Lahir</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Terakhir Update</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody class="swastadata">
                <?php
                foreach ($tabel_data as $key => $row) {
                ?>
                    <tr>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $key + 1; ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['noktp']; ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['nama']; ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0">Suhartono,SP</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['tempat_lahir']; ?>, <?= $row['tgl_lahir']; ?>-<?= $row['bln_lahir']; ?>-<?= $row['thn_lahir']; ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['tgl_update']; ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <a href="#">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#modal-edit" id="btn-edit" class="btn bg-gradient-warning btn-sm" data-id_swa="<?= $row['id_swa']; ?>" data-satminkal="<?= $row['satminkal']; ?>">
                                    <i class="fas fa-edit"></i> Ubah
                                </button>
                            </a>
                            <button type="button" class="btn bg-gradient-danger btn-sm">
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
        <!-- Modal -->
        <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-left">
                                <h4 class="font-weight-bolder text-warning text-gradient">Tambah Data</h4>
                            </div>
                            <div class="card-body">
                                <form role="form text-left">
                                    <? csrf_field(); ?>
                                    <div class="row">
                                        <div class="col">
                                            <input type="hidden" name="jenis_penyuluh" class="form-control jenis_penyuluh" value="4">
                                            <input type="hidden" name="satminkal" class="form-control satminkal" value="<?= $row['kode'] ?>">

                                            <label>No. KTP</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="noktp" class="form-control noktp" placeholder="No. KTP" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Nama Penyuluh</label> <span id="error_nama" class="text-danger ms-3"></span>
                                            <div class="input-group mb-3">
                                                <input type="text" name="nama" class="form-control nama" placeholder="Nama" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Tempat, Tanggal Lahir</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="tempat_lahir" class="form-control tempat_lahir" placeholder="Tempat Lahir">
                                                <select id="year" name="thn_lahir" class="form-select thn_lahir" aria-label="Default select example">
                                                    <option value="">Tahun</option>
                                                </select>
                                                <select id="month" name="bln_lahir" class="form-select bln_lahir" aria-label="Default select example">
                                                    <option value="">Bulan</option>
                                                </select>
                                                <select id="day" name="tgl_lahir" class="form-select tgl_lahir" aria-label="Default select example">
                                                    <option value="">Tanggal</option>
                                                </select>
                                            </div>
                                            <label>Jenis Kelamin</label>
                                            <div class="input-group mb-3">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="2">
                                                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                                </div>
                                            </div>
                                            <label>Lokasi Kerja</label>
                                            <div class="input-group mb-3">
                                                <select name="lokasi_kerja" class="form-select lokasi_kerja" aria-label="Default select example">
                                                    <option selected>Pilih Lokasi Kerja</option>
                                                    <option value="3">Kabupaten/Kota</option>
                                                    <option value="4">Kecamatan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label>Kecamatan Tempat Tugas</label>
                                            <div class="input-group mb-3">
                                                <select name="tempat_tugas" id="tempat_tugas" class="form-control input-lg tempat_tugas">
                                                    <option value="">Pilih Desa</option>
                                                    <?php
                                                    foreach ($tugas as $row2) {
                                                        echo '<option value="' . $row2["id_daerah"] . '">' . $row2["deskripsi"] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <label>Alamat Rumah</label>
                                            <div class="input-group mb-3">
                                                <textarea class="form-control alamat" placeholder="Alamat Rumah" name="alamat" id="floatingTextarea"></textarea>
                                            </div>
                                            <label>Kab./Kota dan Kode Pos</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control dati2" name="dati2" placeholder="Kab./Kota">

                                                <input type="text" class="form-control kodepos" name="kodepos" placeholder="| Kode Pos">
                                            </div>
                                            <label>Provinsi</label>
                                            <div class="input-group mb-3">
                                                <select name="kode_prop" id="kode_prop" class="form-control input-lg kode_prop">
                                                    <option value="">Pilih Provinsi</option>
                                                    <?php
                                                    foreach ($namaprop as $row) {
                                                        echo '<option value="' . $row["id_prop"] . '">' . $row["nama_prop"] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <label>No.Telepon/HP</label>
                                            <div class="input-group mb-3">
                                                <input type="number" name="telp" class="form-control telp" placeholder="No.Telepon/HP">
                                            </div>
                                            <label>Email</label>
                                            <div class="input-group mb-3">
                                                <input type="email" name="email" class="form-control email" placeholder="Email">
                                            </div>
                                        </div>
                                        <h5>Perusahaan</h5>
                                        <div class="col">

                                            <label>Nama Perusahaan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="nama_perusahaan" class="form-control nama_perusahaan" placeholder="Nama Perusahaan">
                                            </div>
                                            <label>
                                                Jabatan Dalam Perusahaan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="jabatan_di_perush" class="form-control jabatan_di_perush" placeholder="Jabatan Dalam Perusahaan">
                                            </div>
                                            <label>Alamat Perusahaan</label>
                                            <div class="input-group mb-3">
                                                <textarea class="form-control alamat_perush" name="alamat_perush" placeholder="Alamat Perusahaan" id="floatingTextarea"></textarea>
                                            </div>
                                            <label>No.Telepon</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="telp_perush" class="form-control telp_perush" placeholder="No.Telepon">
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <center><button type="button" class="btn btn-round bg-gradient-warning btn-lg ajax-save">Simpan Data</button></center>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modal-edit" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-left">
                                <h4 class="font-weight-bolder text-warning text-gradient">Edit Data</h4>
                            </div>
                            <div class="card-body">
                                <form role="form text-left">
                                    <? csrf_field(); ?>
                                    <div class="row">
                                        <div class="col">
                                            <input type="hidden" name="id_swa" class="form-control id_swa" id="id_swa">
                                            <input type="hidden" name="jenis_penyuluh" class="form-control jenis_penyuluh" id="jenis_penyuluh" value="4">
                                            <!-- <input type="hidden" name="satminkal" class="form-control satminkal" id="satminkal"> -->

                                            <label>No. KTP</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="noktp" id="noktp" class="form-control noktp" placeholder="No. KTP" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Nama Penyuluh</label> <span id="error_nama" class="text-danger ms-3"></span>
                                            <div class="input-group mb-3">
                                                <input type="text" name="nama" id="nama" class="form-control nama" placeholder="Nama" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Tempat, Tanggal Lahir</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control tempat_lahir" placeholder="Tempat Lahir">
                                                <select id="year2" name="thn_lahir" class="form-select thn_lahir" aria-label="Default select example">
                                                    <option value="">Tahun</option>
                                                </select>
                                                <select id="month2" name="bln_lahir" class="form-select bln_lahir" aria-label="Default select example">
                                                    <option value="">Bulan</option>
                                                </select>
                                                <select id="day2" name="tgl_lahir" class="form-select tgl_lahir" aria-label="Default select example">
                                                    <option value="">Tanggal</option>
                                                </select>
                                            </div>
                                            <label>Jenis Kelamin</label>
                                            <div class="input-group mb-3">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="2">
                                                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                                </div>
                                            </div>
                                            <label>Lokasi Kerja</label>
                                            <div class="input-group mb-3">
                                                <select name="lokasi_kerja" id="lokasi_kerja" class="form-select lokasi_kerja" aria-label="Default select example">
                                                    <option selected>Pilih Lokasi Kerja</option>
                                                    <option value="3">Kabupaten/Kota</option>
                                                    <option value="4">Kecamatan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label>Kecamatan Tempat Tugas</label>
                                            <div class="input-group mb-3">
                                                <select name="tempat_tugas" id="tempat_tugas" class="form-control input-lg tempat_tugas">
                                                    <option value="">Pilih Desa</option>
                                                    <?php
                                                    foreach ($tugas as $row2) {
                                                        echo '<option value="' . $row2["id_daerah"] . '">' . $row2["deskripsi"] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <label>Alamat Rumah</label>
                                            <div class="input-group mb-3">
                                                <textarea class="form-control alamat" placeholder="Alamat Rumah" name="alamat" id="alamat"></textarea>
                                            </div>
                                            <label>Kab./Kota dan Kode Pos</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control dati2" name="dati2" id="dati2" placeholder="Kab./Kota">

                                                <input type="text" class="form-control kodepos" name="kodepos" id="kodepos" placeholder="| Kode Pos">
                                            </div>
                                            <label>Provinsi</label>
                                            <div class="input-group mb-3">
                                                <select name="kode_prop" id="kode_prop" class="form-control input-lg kode_prop">
                                                    <option value="">Pilih Provinsi</option>
                                                    <?php
                                                    foreach ($namaprop as $row) {
                                                        echo '<option value="' . $row["id_prop"] . '">' . $row["nama_prop"] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <label>No.Telepon/HP</label>
                                            <div class="input-group mb-3">
                                                <input type="number" name="telp" id="telp" class="form-control telp" placeholder="No.Telepon/HP">
                                            </div>
                                            <label>Email</label>
                                            <div class="input-group mb-3">
                                                <input type="email" name="email" id="email" class="form-control email" placeholder="Email">
                                            </div>
                                        </div>
                                        <h5>Perusahaan</h5>
                                        <div class="col">

                                            <label>Nama Perusahaan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control nama_perusahaan" placeholder="Nama Perusahaan">
                                            </div>
                                            <label>
                                                Jabatan Dalam Perusahaan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="jabatan_di_perush" id="jabatan_di_perush" class="form-control jabatan_di_perush" placeholder="Jabatan Dalam Perusahaan">
                                            </div>
                                            <label>Alamat Perusahaan</label>
                                            <div class="input-group mb-3">
                                                <textarea class="form-control alamat_perush" name="alamat_perush" id="alamat_perush" placeholder="Alamat Perusahaan" id="floatingTextarea"></textarea>
                                            </div>
                                            <label>No.Telepon</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="telp_perush" id="telp_perush" class="form-control telp_perush" placeholder="No.Telepon">
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <center><button type="button" class="btn btn-round bg-gradient-warning btn-lg ajax-update">Simpan Data</button></center>
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

        $(document).on('click', '.ajax-save', function() {

            if ($.trim($('.nama').val()).length == 0) {
                error_nama = 'Nama wajib diisi';
                $('#error_nama').text(error_nama);
            } else {
                error_nama = '';
                $('#error_nama').text(error_nama);
            }

            if (error_nama != '') {
                return false;
            } else {
                var data = {
                    'jenis_penyuluh': $('.jenis_penyuluh').val(),
                    'satminkal': $('.satminkal').val(),
                    'noktp': $('.noktp').val(),
                    'nama': $('.nama').val(),
                    'tempat_lahir': $('.tempat_lahir').val(),
                    'thn_lahir': $('.thn_lahir').val(),
                    'bln_lahir': $('.bln_lahir').val(),
                    'tgl_lahir': $('.tgl_lahir').val(),
                    'jenis_kelamin': $('.jenis_kelamin').val(),
                    'lokasi_kerja': $('.lokasi_kerja').val(),
                    'tempat_tugas': $('.tempat_tugas').val(),
                    'alamat': $('.alamat').val(),
                    'dati2': $('.dati2').val(),
                    'kodepos': $('.kodepos').val(),
                    'kode_prop': $('.kode_prop').val(),
                    'telp': $('.telp').val(),
                    'email': $('.email').val(),
                    'nama_perusahaan': $('.nama_perusahaan').val(),
                    'jabatan_di_perush': $('.jabatan_di_perush').val(),
                    'alamat_perush': $('.alamat_perush').val(),
                    'telp_perush': $('.telp_perush').val(),

                };
                $.ajax({
                    method: "POST",
                    url: "Penyuluh/penyuluhswasta/save",
                    data: data,
                    success: function(response) {
                        $('#modal-form').modal('hide');
                        $('#modal-form').find('input').val('');

                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(response.status);
                        location.reload();
                    }
                });
            }

        });
    });
</script>

<script>
    $(document).ready(function() {
        $(document).delegate('#btn-edit', 'click', function() {
            var myModal = new bootstrap.Modal(document.getElementById('modal-edit'), options);
            var id = $(this).data('id_swa');
            var coba = $(this).data('satminkal');
            //var kp = $(this).data('kode_prop');
            // alert(id);
            $.ajax({
                url: '<?= base_url() ?>/Penyuluh/penyuluhswasta/DetailEdit/' + id,
                dataType: 'JSON',
                success: function(res) {
                    // $(".daftpos").html(res)

                    alert(coba);
                    //res = JSON.parse(res);

                    $('#jenis_penyuluh').val(res[0].jenis_penyuluh);
                    $('#noktp').val(res[0].noktp);
                    $('#nama').val(res[0].nama);
                    $('#tempat_lahir').val(res[0].tempat_lahir);
                    $('#year').val(res[0].thn_lahir);
                    $('#month').val(res[0].bln_lahir);
                    $('#satminkal').val(res[0].satminkal);
                    $('#kode_prop').val(res[0].kode_prop);
                    $('#day').val(res[0].tgl_lahir);
                    $('#jenis_kelamin').val(res[0].jenis_kelamin);
                    $('#lokasi_kerja').val(res[0].lokasi_kerja);
                    $('#tempat_tugas').val(res[0].tempat_tugas);
                    $('#alamat').val(res[0].alamat);
                    $('#dati2').val(res[0].dati2);
                    $('#kodepos').val(res[0].kodepos);
                    $('#telp').val(res[0].telp);
                    $('#email').val(res[0].email);
                    $('#kode_prop').val(res[0].id_prop);
                    $('#nama_perusahaan').val(res[0].nama_perusahaan);
                    $('#jabatan_di_perush').val(res[0].jabatan_di_perush);
                    $('#alamat_perush').val(res[0].alamat_perush);
                    $('#telp_perush').val(res[0].telp_perush);
                    $('#judul_form').text("Edit Data");
                    myModal.show();
                }

            })
        })


    })
</script>

<script>
    $(document).ready(function() {

        $(document).on('click', '.ajax-update', function() {
            var data = {
                'id': $('#id_swa').val(),
                'jenis_penyuluh': $('#jenis_penyuluh').val(),
                'satminkal': $('.#satminkal').val(),
                'noktp': $('.#noktp').val(),
                'nama': $('.#nama').val(),
                'tempat_lahir': $('.#tempat_lahir').val(),
                'thn_lahir': $('.#year2').val(),
                'bln_lahir': $('.#month2').val(),
                'tgl_lahir': $('.#day2').val(),
                'jenis_kelamin': $('.#jenis_kelamin').val(),
                'lokasi_kerja': $('.#lokasi_kerja').val(),
                'tempat_tugas': $('.#tempat_tugas').val(),
                'alamat': $('.#alamat').val(),
                'dati2': $('.#dati2').val(),
                'kodepos': $('.#kodepos').val(),
                'kode_prop': $('.#kode_prop').val(),
                'telp': $('.#telp').val(),
                'email': $('.#email').val(),
                'nama_perusahaan': $('.#nama_perusahaan').val(),
                'jabatan_di_perush': $('.#jabatan_di_perush').val(),
                'alamat_perush': $('.#alamat_perush').val(),
                'telp_perush': $('.#telp_perush').val(),
            };

            $.ajax({
                method: "POST",
                url: "Penyuluh/penyuluhswasta/update",
                data: data,
                success: function(response) {
                    $('#modal-edit').modal('hide');
                    $('.swastadata').html("");


                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success(response.status);
                }
            });
        });

    })
</script>

<?= $this->endSection() ?>