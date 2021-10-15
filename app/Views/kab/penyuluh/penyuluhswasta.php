<?= $this->extend('layout/main_template') ?>

<?= $this->section('content') ?>


<button type="button" class="btn bg-gradient-primary btn-sm">+ Tambah Data</button>
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
                $i = 1;
                foreach ($tabel_data as $row) {
                ?>
                    <tr>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $i++ ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['noktp'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['nama'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0">Suhartono,SP</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['tempat_lahir'] ?>, <?= $row['tgl_lahir'] ?>-<?= $row['bln_lahir'] ?>-<?= $row['thn_lahir'] ?></p>
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
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
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
                                            <label>Status Penyuluh</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon" disabled>
                                            </div>
                                            <label>No. KTP</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="No. KTP" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Nama Penyuluh</label> <span id="error_nama" class="text-danger ms-3"></span>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Nama" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Tempat, Tanggal Lahir</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Tempat" aria-label="Password" aria-describedby="password-addon">
                                                <input type="date" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Jenis Kelamin</label>
                                            <div class="input-group mb-3">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                    <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                                </div>
                                            </div>
                                            <label>Lokasi Kerja</label>
                                            <div class="input-group mb-3">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>Pilih Lokasi Kerja</option>
                                                    <option value="Kabupaten/Kota">Kabupaten/Kota</option>
                                                    <option value="Kecamatan">Kecamatan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label>Kecamatan Tempat Tugas</label>
                                            <div class="input-group mb-3">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>Pilih Kecamatan</option>
                                                    <option value="Arjosari">Arjosari</option>
                                                    <option value="Bandar">Bandar</option>
                                                    <option value="Donorojo">Donorojo</option>
                                                    <option value="Kebonagung">Kebonagung</option>
                                                    <option value="Nawangan">Nawangan</option>
                                                    <option value="Ngadirojo">Ngadirojo</option>
                                                    <option value="Pacitan">Pacitan</option>
                                                    <option value="Pringkuku">Pringkuku</option>
                                                    <option value="Sudimoro">Sudimoro</option>
                                                    <option value="Tulakan">Tulakan</option>
                                                    <option value="Tegalombo">Tegalombo</option>
                                                    <option value="Punung">Punung</option>
                                                </select>
                                            </div>
                                            <label>Alamat Rumah</label>
                                            <div class="input-group mb-3">
                                                <textarea class="form-control" placeholder="Alamat Rumah" id="floatingTextarea"></textarea>
                                            </div>
                                            <label>Kab./Kota dan Kode Pos</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Kab./Kota" aria-label="Password" aria-describedby="password-addon">

                                                <input type="text" class="form-control" placeholder="| Kode Pos" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Provinsi</label>
                                            <div class="input-group mb-3">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>Pilih Provinsi</option>
                                                    <option value="Aceh">Aceh</option>
                                                    <option value="BALI">BALI</option>
                                                    <option value="BANTEN">BANTEN</option>
                                                    <option value="BENKULU">BENKULU</option>
                                                    <option value="DI YOGYAKARTA">DI YOGYAKARTA</option>
                                                    <option value="DKI JAKARTA">DKI JAKARTA</option>
                                                    <option value="GORONTALO">GORONTALO</option>
                                                    <option value="JAMBI">Kec. Pringkuku</option>
                                                    <option value="JAWA BARAT">JAWA BARAT</option>
                                                    <option value="JAWA TENGAH">JAWA TENGAH</option>
                                                    <option value="JAWA TIMUR">JAWA TIMUR</option>
                                                    <option value="KALIMANTAN BARAT">KALIMANTAN BARAT</option>
                                                    <option value="KALIMANTAN SELATAN">KALIMANTAN SELATAN</option>
                                                    <option value="KALIMANTAN TENGAH">KALIMANTAN TENGAH</option>
                                                    <option value="KALIMANTAN TIMUR">KALIMANTAN TIMUR</option>
                                                    <option value="KALIMANTAN UTARA">KALIMANTAN UTARA</option>
                                                    <option value="KEPULAUAN BANGKA BELITUNG">KEPULAUAN BANGKA BELITUNG</option>
                                                    <option value="KEPULAUAN RIAU">KEPULAUAN RIAU</option>
                                                    <option value="MALUKU">MALUKU</option>
                                                    <option value="MALUKU UTARA">MALUKU UTARA</option>
                                                    <option value="NUSA TENGGARA BARAT">NUSA TENGGARA BARAT</option>
                                                    <option value="NUSA TENGGARA TIMUR">NUSA TENGGARA TIMUR</option>
                                                    <option value="PAPUA">PAPUA</option>
                                                    <option value="PAPUA BARAT">PAPUA BARAT</option>
                                                    <option value="RIAU">RIAU</option>
                                                    <option value="SULAWESI BARAT">SULAWESI BARAT</option>
                                                    <option value="SULAWESI SELATAN">SULAWESI SELATAN</option>
                                                    <option value="SULAWESI TENGAH">SULAWESI TENGAH</option>
                                                    <option value="SULAWESI TENGGARA">SULAWESI TENGGARA</option>
                                                    <option value="SULAWESI UTARA">SULAWESI UTARA</option>
                                                    <option value="SUMATERA BARAT">SUMATERA BARAT</option>
                                                    <option value="SUMATERA SELATAN">SUMATERA SELATAN</option>
                                                    <option value="SUMATERA UTARA">SUMATERA UTARA</option>
                                                </select>
                                            </div>
                                            <label>No.Telepon/HP</label>
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Email</label>
                                            <div class="input-group mb-3">
                                                <input type="email" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                        </div>
                                        <h5>Perusahaan</h5>
                                        <div class="col">

                                            <label>Nama Perusahaan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="No. KTP" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>
                                                Jabatan Dalam Perusahaan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Nama" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Alamat Perusahaan</label>
                                            <div class="input-group mb-3">
                                                <textarea class="form-control" placeholder="Alamat Rumah" id="floatingTextarea"></textarea>
                                            </div>
                                            <label>No.Telepon</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Nama" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <center><button type="button" class="btn btn-round bg-gradient-warning btn-lg">Simpan Data</button></center>
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
                                                    // foreach ($tugas as $row2) {
                                                    //     echo '<option value="' . $row2["id_daerah"] . '">' . $row2["deskripsi"] . '</option>';
                                                    // }
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
                                                    // foreach ($namaprop as $row) {
                                                    //     echo '<option value="' . $row["id_prop"] . '">' . $row["nama_prop"] . '</option>';
                                                    // }
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