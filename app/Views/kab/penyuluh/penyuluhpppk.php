<?= $this->extend('layout/main_template') ?>

<?= $this->section('content') ?>


<button type="button" class="btn bg-gradient-primary btn-sm">+ Tambah Data</button>
<div class="card">
    <div class="table-responsive">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">NIK</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">NIP</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Nama</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Unit<br>Kerja</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Tempat<br>Tugas</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Wilayah<br>Kerja</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Status</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Jabatan<br>Terakhir</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Terakhir<br>Update</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Data<br>Dasar</th>
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
                            <p class="text-xs font-weight-bold mb-0"><a href="<?= base_url('profil/penyuluhpppk/detail/' . $row['noktp']) ?>"><?= $row['noktp'] ?></a></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['nip'] ?></p>
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
                        <td class="align-middle text-sm">
                            <p class="text-xs font-weight-bold mb-0">
                                1. <?= $row['wilker'] ?> <br>
                                2. <?= $row['wilker2'] ?> <br>
                                3. <?= $row['wilker3'] ?> <br>
                                4. <?= $row['wilker4'] ?> <br>
                                5. <?= $row['wilker5'] ?> <br>
                                6. <?= $row['wilker6'] ?> <br>
                                7. <?= $row['wilker7'] ?> <br>
                                8. <?= $row['wilker8'] ?> <br>
                                9. <?= $row['wilker9'] ?> <br>
                                10. <?= $row['wilker10'] ?>
                            </p>
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
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <!-- Modal -->
        <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-left">
                                <h4 class="font-weight-bolder text-warning text-gradient">Ubah Data</h4>
                            </div>
                            <div class="card-body">
                                <form role="form text-left">
                                    <div class="row">
                                        <div class="col">
                                            <label>NIP (18 Digit)</label>
                                            <div class="input-group mb-3">
                                                <input type="number" id="nip" name="nip" class="form-control" placeholder="Penulisan NIP disambung (tanpa tanda pemisah)">
                                            </div>
                                            <label>NIK (16 Digit)</label>
                                            <div class="input-group mb-3">
                                                <input type="number" id="noktp" name="noktp" class="form-control" placeholder="Penulisan NIK disambung (tanpa tanda pemisah)" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Nama Penyuluh</label>
                                            <div class="input-group mb-3">
                                                <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" aria-label="Password" aria-describedby="password-addon">
                                            </div>

                                            <label>Gelar depan & Gelar Belakang</label>
                                            <div class="input-group mb-3">
                                                <input type="text" id="gelar_dpn" name="gelar_dpn" class="form-control" placeholder="Gelar Depan" aria-label="Password" aria-describedby="password-addon">

                                                <input type="text" id="gelar_blk" name="gelar_blk" class="form-control" placeholder="| Gelar Belakang" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Tempat, Tanggal Lahir</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Tempat" aria-label="Password" aria-describedby="password-addon">
                                                <input type="date" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Jenis Kelamin</label>
                                            <div class="input-group mb-3">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input jenis_kelamin" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input jenis_kelamin" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="2">
                                                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                                </div>
                                            </div>>
                                            <label>Agama</label>
                                            <div class="input-group mb-3">
                                                <select name="agama" id="agama" class="form-select" aria-label="Default select example">
                                                    <option selected>Pilih Agama</option>
                                                    <option value="1">Islam</option>
                                                    <option value="2">Protestan</option>
                                                    <option value="3">Khatolik</option>
                                                    <option value="4">Hindu</option>
                                                    <option value="5">Budha</option>
                                                </select>
                                            </div>
                                            <label>Bidang Keahlian</label>
                                            <div class="input-group mb-3">
                                                <select name="keahlian" id="keahlian" class="form-select" aria-label="Default select example">
                                                    <option selected>Pilih Bidang Keahlian</option>
                                                    <option value="1">Tanaman Pangan</option>
                                                    <option value="2">Peternakan</option>
                                                    <option value="3">Perkebunan</option>
                                                    <option value="4">Horikultura</option>
                                                </select>
                                            </div>
                                            <label>Tingkat Pendidikan Akhir</label>
                                            <div class="input-group mb-3">
                                                <select name="tingkat_pendidikan" id="tingkat_pendidikan" class="form-control input-lg tingkat_pendidikan">
                                                    <option value="">Pilih Tingkat Pendidikan</option>
                                                    <?php
                                                    foreach ($tingkatpen as $row4) {
                                                        echo '<option value="' . $row4["id"] . '">' . $row4["nama"] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <label>Bidang Pendidikan</label>
                                            <div class="input-group mb-3">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>Pilih Bidang Pendidikan</option>
                                                    <option value="Pertanian">Pertanian</option>
                                                    <option value="Non Pertanian">Non Pertanian</option>
                                                </select>
                                            </div>
                                            <label>Jurusan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="jurusan" id="jurusan" class="form-control" placeholder="Jurusan" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Nama Sekolah/Universitas</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="nama_sekolah" id="nama_sekolah" class="form-control" placeholder="Nama Sekolah/Universitas" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label>Lokasi Kerja</label>
                                            <div class="input-group mb-3">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input rad" type="radio" name="kode_kab" id="kode_kab" value="3">
                                                    <label class="form-check-label" for="inlineRadio1">Kabupaten/Kota</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input rad" type="radio" name="kode_kab" id="kode_kab" value="4">
                                                    <label class="form-check-label" for="inlineRadio2">Kecamatan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label>Tgl SK PPPK</label>
                                            <div class="input-group mb-3">
                                                <input type="date" class="form-control" placeholder="Tgl SK PPPK" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Tgl SPMT</label>
                                            <div class="input-group mb-3">
                                                <input type="date" class="form-control" placeholder="Tgl SPMT" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Jabatan</label>
                                            <div class="input-group mb-3">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>Pilih Jabatan</option>
                                                    <option value="1">PP.TERAMPIL</option>
                                                    <option value="2">PP.AHLI</option>
                                                </select>
                                            </div>
                                            <label>Alamat Rumah</label>
                                            <div class="input-group mb-3">
                                                <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat Rumah"></textarea>
                                            </div>
                                            <label>Kabupaten</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="dati2" id="dati2" class="form-control" placeholder="Kabupaten" aria-label="Password" aria-describedby="password-addon">

                                                <input type="text" name="kodepos" id="kodepos" class="form-control" placeholder="| Kode Pos" aria-label="Password" aria-describedby="password-addon">
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
                                            <label>No.Telepon rumah</label>
                                            <div class="input-group mb-3">
                                                <input type="number" name="telp" id="telp" class="form-control" placeholder="No.Telepon rumah" aria-label="Password" aria-describedby="password-addon">
                                                <input type="number" name="hp" id="hp" class="form-control" placeholder="| HP" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Alamat Email</label>
                                            <div class="input-group mb-3">
                                                <input type="email" name="email" id="email" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="button" class="btn btn-round bg-gradient-warning btn-sm">Simpan Data</button>
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