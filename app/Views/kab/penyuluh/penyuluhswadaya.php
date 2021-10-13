<?= $this->extend('layout/main_template') ?>

<?= $this->section('content') ?>


<button type="button" class="btn bg-gradient-primary btn-sm">+ Tambah Data</button>
<br>
<b>Daftar Penyuluh Swadaya Kab <?= ucwords(strtolower($nama_kabupaten)) ?></b>
<p>Ditemukan <?= $jml_data ?> data</p>
<div class="card">
    <div class="table-responsive">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">No KTP</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Nama</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Unit Kerja (BP3k)</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Tempat Tugas<br>(Kecamatan)</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Wilayah Kerja</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Terakhir<br>Update</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Aksi</th>
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
                            <p class="text-xs font-weight-bold mb-0"><a href="<?= base_url('profil/penyuluhswadaya/detail/' . $row['noktp']) ?>"><?= $row['noktp'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['nama'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['nama_bpp'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['deskripsi'] ?></p>
                        </td>
                        <td class="align-middle text-sm">
                            <p class="text-xs font-weight-bold mb-0">1. <?= $row['wil_ker'] ?><br>
                                2. <?= $row['wil_ker2'] ?><br>
                                3. <?= $row['wil_ker3'] ?><br>
                                4. <?= $row['wil_ker4'] ?><br>
                                5. <?= $row['wil_ker5'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['tgl_update'] ?></p>
                        </td>
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

                <!-- <tr>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">1</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">BPP ARJOSARI</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">Arjosari</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">Suhartono,SP</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">4</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">0</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">5</p>
                    </td>
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

                <tr>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">1</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">BPP ARJOSARI</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">Arjosari</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">Suhartono,SP</p> -->
                <!-- </td>
                <td class="align-middle text-center text-sm">
                    <p class="text-xs font-weight-bold mb-0">4</p>
                </td>
                <td class="align-middle text-center text-sm">
                    <p class="text-xs font-weight-bold mb-0">0</p>
                </td>
                <td class="align-middle text-center text-sm">
                    <p class="text-xs font-weight-bold mb-0">5</p>
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
                </tr> -->

                <!-- <tr>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">1</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">BPP ARJOSARI</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">Arjosari</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">Suhartono,SP</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">4</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">0</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">5</p>
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
                </tr> -->
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
                                    <div class="row">
                                        <div class="col">
                                            <input type="hidden" name="id_swa" id="id_swa" class="form-control id_swa">
                                            <input type="hidden" name="jenis_penyuluh" id="jenis_penyuluh" class="form-control jenis_penyuluh" value="4">
                                            <input type="hidden" name="satminkal" id="satminkal" class="form-control satminkal" value="<?= $row['kode'] ?>">
                                            <label>Status Penyuluh</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" value="Swadaya" disabled>
                                            </div>
                                            <label>No. KTP</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="noktp" id="noktp" class="form-control noktp" placeholder="No. KTP">
                                            </div>
                                            <label>Nama</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="nama" id="nama" class="form-control nama" placeholder="Nama">
                                            </div>
                                            <label>Tempat, Tanggal Lahir</label>
                                            <div class="input-group mb-1">
                                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control tempat_lahir" placeholder="Tempat Lahir">
                                            </div>
                                            <div class="input-group mb-3">
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
                                                <div class="form-check form-check-inline" id="jenis_kelamin">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                                                </div>
                                                <div class="form-check form-check-inline" id="jenis_kelamin">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="2">
                                                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                                </div>
                                            </div>
                                            <label>Status Pernikahan</label>
                                            <div class="input-group mb-3">
                                                <select id="status_kel" name="status_kel" class="form-select" aria-label="Default select example">
                                                    <option selected>Pilih Status Pernikahan</option>
                                                    <option value="1">Menikah</option>
                                                    <option value="2">Belum Menikah</option>
                                                    <option value="3">Janda</option>
                                                    <option value="4">Duda</option>
                                                </select>
                                            </div>
                                            <label>Agama</label>
                                            <div class="input-group mb-3">
                                                <select id="agama" name="agama" class="form-select" aria-label="Default select example">
                                                    <option selected>Pilih Agama</option>
                                                    <option value="1">Islam</option>
                                                    <option value="2">Kristen Protestan</option>
                                                    <option value="3">Khatolik</option>
                                                    <option value="4">Hindu</option>
                                                    <option value="5">Budha</option>
                                                </select>
                                            </div>
                                            <label>Tingkat Pendidikan</label>
                                            <div class="input-group mb-3">
                                                <select id="tingkat" name="tingkat" class="form-select" aria-label="Default select example">
                                                    <option selected>Pilih Tingkat Pendidikan</option>
                                                    <option value="01">S3 (Setara)</option>
                                                    <option value="02">S2 (Setara)</option>
                                                    <option value="03">S1 (Setara)</option>
                                                    <option value="04">D4</option>
                                                    <option value="05">SM</option>
                                                    <option value="06">D3</option>
                                                    <option value="07">D2</option>
                                                    <option value="08">D1</option>
                                                    <option value="09">SLTA</option>
                                                    <option value="10">SLTP</option>
                                                    <option value="11">D3</option>
                                                </select>
                                            </div>
                                            <label>No. SK Penetapan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" id="no_sk_penetapan" name="no_sk_penetapan" class="form-control" placeholder="No. SK Penetapan" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                        </div>
                                        <div class="col">


                                            <label>Pejabat Yang Menetapkan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" id="pejabat_menetapkan" name="pejabat_menetapkan" class="form-control" placeholder="Pejabat Yang Menetapkan" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Keahlian Bidang Teknis</label>
                                            <div class="input-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="ahli_tp" name="ahli_tp" value="1">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Tanaman Pangan
                                                    </label>
                                                </div>
                                            </div><input type="text" class="form-control" id="detail_tp" name="detail_tp" aria-label="Password" aria-describedby="password-addon">
                                            <div class="input-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="ahli_nak" name="ahli_nak" value="2">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Peternakan
                                                    </label>
                                                </div>
                                            </div><input type="text" class="form-control" id="detail_nak" name="detail_nak" aria-label="Password" aria-describedby="password-addon">
                                            <div class="input-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="ahli_bun" name="ahli_bun" value="3">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Perkebunan
                                                    </label>
                                                </div>
                                            </div><input type="text" class="form-control" id="detail_bun" name="detail_bun" aria-label="Password" aria-describedby="password-addon">
                                            <div class="input-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="ahli_hor" name="ahli_hor" value="4">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Hortikultura
                                                    </label>
                                                </div>
                                            </div><input type="text" class="form-control" id="detail_hor" name="detail_hor" aria-label="Password" aria-describedby="password-addon">
                                            <div class="input-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="ahli_lainnya" name="ahli_lainnya" value="5">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Lainnya
                                                    </label>
                                                </div>
                                            </div><input type="text" class="form-control" id="detail_lainnya" name="detail_lainnya" aria-label="Password" aria-describedby="password-addon">
                                            <label>Unit Kerja (BPP Kecamatan)</label>
                                            <div class="input-group mb-3">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>Pilih Unit Kerja</option>
                                                    <option value="Bpp Arjosari">Bpp Arjosari</option>
                                                    <option value="Bpp Bandar">Bpp Bandar</option>
                                                    <option value="Bpp Donorojo">Bpp Donorojo</option>
                                                    <option value="Bpp Kebonagung">Bpp Kebonagung</option>
                                                    <option value="Bpp Nawangan">Bpp Nawangan</option>
                                                    <option value="Bpp Ngadirojo">Bpp Ngadirojo</option>
                                                    <option value="Bpp Pacitan">Bpp Pacitan</option>
                                                    <option value="Bpp Pringkuku">Bpp Pringkuku</option>
                                                    <option value="Bpp Sudimoro">Bpp Sudimoro</option>
                                                    <option value="Bpp Tulakan">Bpp Tulakan</option>
                                                    <option value="Bpp Kec. Tegalombo">Bpp Kec. Tegalombo</option>
                                                    <option value="Bpp Punung">Bpp Punung</option>
                                                </select>
                                            </div>
                                            <label>Tempat Tugas</label>
                                            <div class="input-group mb-3">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>Pilih Kecamatan</option>
                                                    <option value="Kec. Arjosari">Kec. Arjosari</option>
                                                    <option value="Kec. Bandar">Kec. Bandar</option>
                                                    <option value="Kec. Donorojo">Kec. Donorojo</option>
                                                    <option value="Kec. Kebonagung">Kec. Kebonagung</option>
                                                    <option value="Kec. Nawangan">Kec. Nawangan</option>
                                                    <option value="Kec. Ngadirojo">Kec. Ngadirojo</option>
                                                    <option value="Kec. Pacitan">Kec. Pacitan</option>
                                                    <option value="Kec. Pringkuku">Kec. Pringkuku</option>
                                                    <option value="Kec. Sudimoro">Kec. Sudimoro</option>
                                                    <option value="Kec. Tulakan">Kec. Tulakan</option>
                                                    <option value="Kec. Tegalombo">Kec. Tegalombo</option>
                                                    <option value="Kec. Punung">Kec. Punung</option>
                                                </select>
                                            </div>
                                            <label>Wilayah Kerja 1</label>
                                            <div class="input-group mb-3">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>Pilih Desa</option>x
                                                </select>
                                            </div>
                                            <label>Wilayah Kerja 2</label>
                                            <div class="input-group mb-3">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>Pilih Desa</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">

                                            <label>Wilayah Kerja 3</label>
                                            <div class="input-group mb-3">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>Pilih Desa</option>
                                                </select>
                                            </div>
                                            <label>Wilayah Kerja 4</label>
                                            <div class="input-group mb-3">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>Pilih Desa</option>
                                                </select>
                                            </div>
                                            <label>Wilayah Kerja 5</label>
                                            <div class="input-group mb-3">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>Pilih Desa</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label>Alamat Rumah</label>
                                                <div class="input-group mb-3">
                                                    <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat Rumah"></textarea>
                                                </div>
                                                <label>Kab./Kota dan Kode Pos</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" id="dati2" name="dati2" placeholder="Kab./Kota">

                                                    <input type="text" class="form-control" id="kodepos" name="kodepos" placeholder="| Kode Pos">
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
                                                    <input type="number" id="telp" name="telp" class="form-control">
                                                </div>
                                                <label>Email</label>
                                                <div class="input-group mb-3">
                                                    <input type="email" id="email" name="email" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label>Tahun Pelatihan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" id="tahun_pelatihan1" name="tahun_pelatihan1" class="form-control">
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" id="tahun_pelatihan2" name="tahun_pelatihan2" class="form-control">
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" id="tahun_pelatihan3" name="tahun_pelatihan3" class="form-control">
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" id="tahun_pelatihan4" name="tahun_pelatihan4" class="form-control">
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" id="tahun_pelatihan5" name="tahun_pelatihan5" class="form-control">
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" id="tahun_pelatihan6" name="tahun_pelatihan6" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label>Nama Pelatihan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" id="nm_pelatihan1" name="nm_pelatihan1" class="form-control">
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" id="nm_pelatihan2" name="nm_pelatihan2" class="form-control">
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" id="nm_pelatihan3" name="nm_pelatihan3" class="form-control">
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" id="nm_pelatihan4" name="nm_pelatihan4" class="form-control">
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" id="nm_pelatihan5" name="nm_pelatihan5" class="form-control">
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" id="nm_pelatihan6" name="nm_pelatihan6" class="form-control">
                                            </div>

                                        </div>

                                        <div class="text-center">
                                            <center><button type="button" class="btn btn-round bg-gradient-warning btn-lg w-100 mt-4 mb-0">Simpan Data</button></center>
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

<?= $this->endSection() ?>