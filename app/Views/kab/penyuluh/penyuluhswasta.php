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
            <tbody>
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
                                <button type="button" data-bs-toggle="modal" data-bs-target="#modal-edit" id="btn-edit" class="btn bg-gradient-warning btn-sm" data-id_swa="<?= $row['id_swa']; ?>" data-jenis_penyuluh="<?= $row['jenis_penyuluh']; ?>" data-noktp="<?= $row['noktp']; ?>" data-nama="<?= $row['nama']; ?>" data-tgl_lahir="<?= $row['tgl_lahir']; ?>" data-bln_lahir="<?= $row['bln_lahir']; ?>" data-thn_lahir="<?= $row['thn_lahir']; ?>" data-tempat_lahir="<?= $row['tempat_lahir']; ?>" data-jenis_kelamin="<?= $row['jenis_kelamin']; ?>" data-satminkal="<?= $row['satminkal']; ?>" data-lokasi_kerja="<?= $row['lokasi_kerja']; ?>" data-alamat="<?= $row['alamat']; ?>" data-dati2="<?= $row['dati2']; ?>" data-kodepos="<?= $row['kodepos']; ?>" data-kode_prop="<?= $row['kode_prop']; ?>" data-telp="<?= $row['telp']; ?>" data-email="<?= $row['email']; ?>" data-nama_perusahaan="<?= $row['nama_perusahaan']; ?>" data-alamat_perush="<?= $row['alamat_perush']; ?>" data-telp_perush="<?= $row['telp_perush']; ?>" data-jabatan_di_perush="<?= $row['jabatan_di_perush']; ?>" data-tempat_tugas="<?= $row['tempat_tugas']; ?>">
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
                                <form role="form text-left" action="<?= base_url('Penyuluh/PenyuluhSwasta/save'); ?>" method="post" enctype="multipart/form-data">
                                    <? csrf_field(); ?>
                                    <div class="row">
                                        <div class="col">
                                            <input type="hidden" name="jenis_penyuluh" class="form-control" value="4">
                                            <input type="hidden" name="satminkal" class="form-control" value="<?= $row['kode'] ?>">

                                            <label>No. KTP</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="noktp" class="form-control" placeholder="No. KTP" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Nama Penyuluh</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="nama" class="form-control" placeholder="Nama" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Tempat, Tanggal Lahir</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                                                <select id="year" name="thn_lahir" class="form-select" aria-label="Default select example">
                                                    <option value="">Tahun</option>
                                                </select>
                                                <select id="month" name="bln_lahir" class="form-select" aria-label="Default select example">
                                                    <option value="">Bulan</option>
                                                </select>
                                                <select id="day" name="tgl_lahir" class="form-select" aria-label="Default select example">
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
                                                <select name="lokasi_kerja" class="form-select" aria-label="Default select example">
                                                    <option selected>Pilih Lokasi Kerja</option>
                                                    <option value="3">Kabupaten/Kota</option>
                                                    <option value="4">Kecamatan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label>Kecamatan Tempat Tugas</label>
                                            <div class="input-group mb-3">
                                                <select name="tempat_tugas" id="tempat_tugas" class="form-control input-lg">
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
                                                <textarea class="form-control" placeholder="Alamat Rumah" name="alamat" id="floatingTextarea"></textarea>
                                            </div>
                                            <label>Kab./Kota dan Kode Pos</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="dati2" placeholder="Kab./Kota">

                                                <input type="text" class="form-control" name="kodepos" placeholder="| Kode Pos">
                                            </div>
                                            <label>Provinsi</label>
                                            <div class="input-group mb-3">
                                                <select name="kode_prop" id="kode_prop" class="form-control input-lg">
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
                                                <input type="number" name="telp" class="form-control" placeholder="No.Telepon/HP">
                                            </div>
                                            <label>Email</label>
                                            <div class="input-group mb-3">
                                                <input type="email" name="email" class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                        <h5>Perusahaan</h5>
                                        <div class="col">

                                            <label>Nama Perusahaan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="nama_perusahaan" class="form-control" placeholder="Nama Perusahaan">
                                            </div>
                                            <label>
                                                Jabatan Dalam Perusahaan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="jabatan_di_perush" class="form-control" placeholder="Jabatan Dalam Perusahaan">
                                            </div>
                                            <label>Alamat Perusahaan</label>
                                            <div class="input-group mb-3">
                                                <textarea class="form-control" name="alamat_perush" placeholder="Alamat Perusahaan" id="floatingTextarea"></textarea>
                                            </div>
                                            <label>No.Telepon</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="telp_perush" class="form-control" placeholder="No.Telepon">
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <center><button type="submit" class="btn btn-round bg-gradient-warning btn-lg">Simpan Data</button></center>
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