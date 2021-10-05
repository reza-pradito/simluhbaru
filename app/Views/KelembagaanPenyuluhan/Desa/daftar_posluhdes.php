<?= $this->extend('layout/main_template') ?>

<?= $this->section('content') ?>

<center>
    <h4> Daftar Posluhdes di Kecamatan <?= ucwords(strtolower($nama_kecamatan)) ?> </h4>
    <p> Ditemukan <?= ucwords(strtolower($jum_kec)) ?> Data </p>
</center>

<button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#modal-form">+ Tambah Data</button>

<div class="card">
    <div class="table-responsive">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <td width="5" class="text-uppercase text-secondary text-xxs font-weight-bolder">No</td>
                    <td width="100" class="text-uppercase text-secondary text-xxs font-weight-bolder">Desa</td>
                    <td width="100" class="text-uppercase text-secondary text-xxs font-weight-bolder">Nama<br>Posluhdes</td>
                    <td width="120" class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Alamat</td>
                    <td width="100" class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Ketua</td>
                    <td width="100" class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Sekretaris</td>
                    <td width="90" class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Bendahara</td>
                    <td width="10" class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Tahun<br>Berdiri</td>
                    <td width="10" class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Jumlah<br>Anggota</td>
                    <td width="100" class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Penyuluh<br>Swadaya</td>
                    <td width="100" class="text-secondary opacity-7"></td>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($tabel_data as $row => $item) {
                ?>
                    <tr>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $i++ ?></p>
                        </td>
                        <td width="50">
                            <p class="text-xs font-weight-bold mb-0"><?= $item['nm_desa'] ?></p>
                        </td>
                        <td class="align-middle text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $item['nama'] ?></p>
                        </td>
                        <td class="align-middle text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $item['alamat'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $item['ketua'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $item['sekretaris'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $item['bendahara'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $item['tahun_berdiri'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $item['jum_anggota'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $item['penyuluh_swadaya'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <a href="#">
                                <button type="button" id="btn-edit" class="btn bg-gradient-warning btn-sm" data-idpos="<?= $item['idpos'] ?>">
                                    <i class="fas fa-edit"></i> Ubah
                                </button>
                            </a>
                            <a href="">
                                <button type="button" id="btn-hapus" data-idpos="<?= $item['idpos'] ?>" onclick="return confirm('apakah anda ingin menghapus data ini?')" class="btn bg-gradient-danger btn-sm">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>

                <!-- Modal Add  -->
                <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-body p-0">
                                <div class="card card-plain">
                                    <div class="card-header pb-0 text-left">
                                        <h4 class="font-weight-bolder text-warning text-gradient" id="judul_form">Tambah Data</h4>
                                    </div>
                                    <div class="card-body">
                                        <form role="form text-left" action="<?= base_url('KelembagaanPenyuluhan/Desa/desa/save'); ?>" method="post" enctype="multipart/form-data">
                                            <? csrf_field(); ?>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="deskripsi">Kecamatan</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" name="deskripsi" placeholder="Kecamatan" value="<?= $nama_kecamatan; ?>" disabled>
                                                    </div>
                                                    <label for="kode_desa">Desa</label>
                                                    <div class="input-group mb-3">
                                                        <select name="kode_desa" class="form-control input-lg">
                                                            <option value="">Pilih Desa</option>
                                                            <?php
                                                            foreach ($desa as $row2) {
                                                                echo '<option value="' . $row2["id_desa"] .  '">' . $row2["nm_desa"] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <label for="nama">Nama Posluhdes</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="nama posluhdes" name="nama">
                                                    </div>
                                                    <label for="alamat">Alamat</label>
                                                    <div class="input-group mb-3">
                                                        <textarea type="text" class="form-control" placeholder="alamat" name="alamat"></textarea>
                                                    </div>
                                                    <label for="ketua">Ketua</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="ketua" name="ketua">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label for="sekretaris">Sekretaris</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="sekretaris" name="sekretaris">
                                                    </div>
                                                    <label for="bendahara">Bendahara</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="bendahara" name="bendahara">
                                                    </div>
                                                    <label for="tahun_beridiri">tahun Berdiri</label>
                                                    <div class="input-group mb-3">
                                                        <select name="tahun_berdiri" id="tahun_berdiri" class="form-control input-lg">
                                                            <option value="">Tahun</option>
                                                        </select>
                                                    </div>
                                                    <label for="jum_anggota">Jumlah Anggota</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="jumlah anggota" name="jum_anggota">
                                                    </div>
                                                    <label for="penyuluh_swadaya">Penyuluh Swadaya</label>
                                                    <div class="input-group mb-3">
                                                        <select name="penyuluh_swadaya" class="form-control input-lg">
                                                            <option value="">Penyuluh Swadaya</option>
                                                            <?php
                                                            foreach ($pen_swa as $row3) {
                                                                echo '<option value="' . $row3["id_swa"] . '">' . $row3["nama"] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <input type="hidden" name="kode_kab" value="<?= $item['id_dati2']; ?>">
                                                    <input type="hidden" name="kode_kec" value="<?= $item['kode_kec']; ?>">
                                                </div>
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-round bg-gradient-warning btn-lg w-100 mt-4 mb-0">Simpan Data</button>
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
                                        <h4 class="font-weight-bolder text-warning text-gradient" id="judul-form">Ubah Data</h4>
                                    </div>
                                    <div class="card-body">
                                        <form role="form text-left" action="<?= base_url('KelembagaanPenyuluhan/Desa/desa/edit'); ?>" method="post" enctype="multipart/form-data">
                                            <? csrf_field(); ?>
                                            <div class="row">
                                                <div class="col">
                                                    <input type="hidden" name="idpos" id="idpos">
                                                    <label for="deskripsi">Kecamatan</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Kecamatan" disabled>
                                                    </div>
                                                    <label for="kode_desa">Desa</label>
                                                    <div class="input-group mb-3">
                                                        <select name="kode_desa" id="kode_desa" class="form-control input-lg">
                                                            <option value="">Pilih Desa</option>
                                                            <?php
                                                            foreach ($desa as $row2) {
                                                                echo '<option value="' . $row2["id_desa"] .  '">' . $row2["nm_desa"] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <label for="nama">Nama Posluhdes</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="nama posluhdes" id="nama" name="nama">
                                                    </div>
                                                    <label for="alamat">Alamat</label>
                                                    <div class="input-group mb-3">
                                                        <textarea class="form-control" placeholder="alamat" id="alamat" name="alamat"></textarea>
                                                    </div>
                                                    <label for="ketua">Ketua</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="ketua" id="ketua" name="ketua">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label for="sekretaris">Sekretaris</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="sekretaris" id="sekretaris" name="sekretaris">
                                                    </div>
                                                    <label for="bendahara">Bendahara</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="bendahara" id="bendahara" name="bendahara">
                                                    </div>
                                                    <label for="tahun_beridiri">tahun Berdiri</label>
                                                    <div class="input-group mb-3">
                                                        <select name="tahun_berdiri" id="selectElementId2" class="form-control input-lg">
                                                            <option value="">Tahun</option>
                                                        </select>
                                                    </div>
                                                    <label for="jum_anggota">Jumlah Anggota</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="jumlah anggota" id="jum_anggota" name="jum_anggota">
                                                    </div>
                                                    <label for="penyuluh_swadaya">Penyuluh Swadaya</label>
                                                    <div class="input-group mb-3">
                                                        <select name="penyuluh_swadaya" id="penyuluh_swadaya" class="form-control input-lg">
                                                            <option value="">Penyuluh Swadaya</option>
                                                            <?php
                                                            foreach ($pen_swa as $row3) {
                                                                echo '<option value="' . $row3["id_swa"] . '">' . $row3["nama"] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <input type="hidden" name="kode_kab" id="kode_kab" value="<?= $item['id_dati2']; ?>">
                                                    <input type="hidden" name="kode_kec" id="kode_kec" value="<?= $item['kode_kec']; ?>">
                                                </div>
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-round bg-gradient-warning btn-lg w-100 mt-4 mb-0">Ubah Data</button>
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
</tbody>
</table>
</div>
</div>
<!-- <script>
    $(document).ready(function() {

        $.ajax({
            url: "<?= base_url('KelembagaanPenyuluhan/Desa/desa/listdesa') ?>",
            dataType: "json",
            success: function(res) {
                $(".KelembagaanPenyuluhan/Desa/daftar_posluhdes").html(res)
            }
        })
    })
</script> -->

<?= $this->endSection() ?>


<?= $this->section('script') ?>
<script>
    $(document).ready(function() {
        $(document).delegate('#btn-edit', 'click', function() {
            var myModal = new bootstrap.Modal(document.getElementById('modal-edit'), options);
            var id = $(this).data('idpos');
            // alert(id);
            $.ajax({
                url: '<?= base_url() ?>/kelembagaanpenyuluhan/desa/desa/detailPosluhdes/' + id,
                dataType: 'JSON',
                success: function(res) {
                    // $(".daftpos").html(res)
                    console.log(res);
                    //res = JSON.parse(res);

                    $('#idpos').val(res[0].idpos);
                    $('#deskripsi').val(res[0].deskripsi);
                    $('#kode_desa').val(res[0].kode_desa);
                    $('#kode_kab').val(res[0].kode_kab);
                    $('#kode_kec').val(res[0].kode_kec);
                    $('#nama').val(res[0].nama);
                    $('#alamat').val(res[0].alamat);
                    $('#ketua').val(res[0].ketua);
                    $('#sekretaris').val(res[0].sekretaris);
                    $('#bendahara').val(res[0].bendahara);
                    $('#selectElementId2').val(res[0].tahun_berdiri);
                    $('#jum_anggota').val(res[0].jum_anggota);
                    $('#penyuluh_swadaya').val(res[0].penyuluh_swadaya);
                    $('#judul-form').text("Edit Data");
                    myModal.show();
                }
            })
        })

    })
</script>
<script>
    $(document).ready(function() {
        $(document).delegate('#btn-hapus', 'click', function() {
            var id = $($this).data('idpos');

            $.ajax({
                url: '<?= base_url() ?>/kelembagaanpenyuluhan/desa/desa/delete/' + id,
                type: 'POST',
                success: function(res) {
                    console.log(res)
                    location.reload();

                }
            })
        })
    })
</script>
<?= $this->endSection() ?>