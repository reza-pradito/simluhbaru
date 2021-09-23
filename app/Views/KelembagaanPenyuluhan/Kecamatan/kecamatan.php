<?= $this->extend('layout/main_template') ?>

<?= $this->section('content') ?>
<?php $sessnama = session()->get('kodebapel'); ?>


<center>
    <h5> Daftar Kelembagaan Penyuluhan Pertanian Tingkat Kecamatan <br>Kab <?= ucwords(strtolower($nama_kabupaten)) ?> </h5>
</center>
<a href="#"><button type="button" data-bs-toggle="modal" data-bs-target="#modal-form" class="btn-kec bg-gradient-primary">+ Tambah Data</button></a>
<a href="#"><button type="button" data-bs-toggle="modal" data-bs-target="#modal-form" class="btn-kec bg-gradient-primary">+ Lahan Percontohan</button></a>
<a href="#"><button type="button" data-bs-toggle="modal" data-bs-target="#modal-form" class="btn-kec bg-gradient-primary">+ Sarana & Prasarana</button></a>
<a href="#"><button type="button" data-bs-toggle="modal" data-bs-target="#modal-form" class="btn-kec bg-gradient-primary">+ Potensi Ekonomi</button></a>
<a href="#"><button type="button" data-bs-toggle="modal" data-bs-target="#modal-form" class="btn-kec bg-gradient-primary">+ Potensi Wilayah</button></a>
<div class="card">
    <div class="table-responsive">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <td width="5" class="text-uppercase text-secondary text-xxs font-weight-bolder">No</td>
                    <td width="180" class="text-uppercase text-secondary text-xxs font-weight-bolder">Nama Lembaga</td>
                    <td width="180" class="text-uppercase text-secondary text-xxs font-weight-bolder">Alamat</td>
                    <td width="300" class="text-uppercase text-secondary text-xxs font-weight-bolder">Wilayah<br>(Kecamatan)</td>
                    <td width="150" class="text-uppercase text-secondary text-xxs font-weight-bolder">Nama<br>Pimpinan</td>
                    <td width="150" class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Jumlah<br>Penyuluh<br>PNS</td>
                    <td width="150" class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Jumlah<br>Penyuluh<br>THL</td>
                    <td width="150" class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Jumlah<br>Penyuluh<br>Swadaya</td>
                    <td width="150" class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Jumlah<br>Poktan</td>
                    <td width="150" class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Jumlah<br>Gapoktan</td>
                    <td width="150" class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Jumlah<br>KEP</td>
                    <td width="190" class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Update<br>Terakhir</td>
                    <td width="160" class="text-secondary opacity-7"></td>
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
                        <td>
                            <p class="text-xs font-weight-bold mb-0"><?= $row['nama_bpp'] ?></p>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0"><?= $row['alamat'] ?></p>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">- <?= $row['deskripsi'] ?> .</p>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0"><?= $row['ketua'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['jumpns'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['jumthl'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['jumswa'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['jumpok'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['jumgap'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['jumkep'] ?></p>
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
                                                    <label>Upload Foto BPP</label>
                                                    <div class="input-group mb-3">
                                                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                                        <label>Tipe file yang diizinkan diupload adalah .JPEG</label>
                                                    </div>
                                                    <label>Bentuk Kelembagaan</label>
                                                    <div class="input-group mb-3">
                                                        <select class="form-select" aria-label="Default select example">
                                                            <option selected>Pilih Bentuk Kelembagaan</option>
                                                            <option value="bpp">Balai Penyuluhan Pertanian</option>
                                                            <option value="uptd">UPTD</option>
                                                        </select>
                                                    </div>
                                                    <label>Nama Kelembagaan</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Nama Kelembagaan" aria-label="Nama" aria-describedby="nama-addon">
                                                    </div>
                                                    <label>Alamat Kantor</label>
                                                    <div class="input-group mb-3">
                                                        <textarea class="form-control" placeholder="Alamat Kantor" id="floatingTextarea"></textarea>
                                                    </div>
                                                    <label>Kecamatan (lokasi BPP)</label>
                                                    <div class="input-group mb-3">
                                                        <select class="form-select" aria-label="Default select example">
                                                            <option selected>Pilih Kecamatan</option>
                                                            <option value="arjosari">Kec. Arjosari</option>
                                                            <option value="banjar">Kec. Banjar</option>
                                                            <option value="donorejo">Kec. Donorejo</option>
                                                        </select>
                                                    </div>
                                                    <label>Wilayah Kecamatan</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="No. SK Penetapan" aria-label="Password" aria-describedby="password-addon">
                                                    </div>
                                                    <label>Tanggal Pembentukan</label>
                                                    <div class="input-group mb-3">
                                                        <input type="date" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                                                    </div>
                                                    <label>Klasifikasi BPP</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="No. SK Penetapan" aria-label="Password" aria-describedby="password-addon">
                                                    </div>
                                                    <label>Status Gedung</label>
                                                    <div class="input-group mb-3">
                                                        <select class="form-select" aria-label="Default select example">
                                                            <option selected>Pilih Status</option>
                                                            <option value="milik">Milik sendiri</option>
                                                            <option value="pinjam">Sewa/Pinjam</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col">
                                                    <label>kondisi Bangunan</label>
                                                    <div class="input-group mb-3">
                                                        <select class="form-select" aria-label="Default select example">
                                                            <option selected>Pilih Kondisi</option>
                                                            <option value="baik">Baik</option>
                                                            <option value="rusak">Rusak</option>
                                                        </select>
                                                    </div>
                                                    <label>GPS Point</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="GPS Point" aria-label="gps" aria-describedby="nama-addon">
                                                        <select class="form-select" aria-label="Default select example">
                                                            <option selected value="lu">LU</option>
                                                            <option value="ls">LS</option>
                                                        </select>
                                                        <input type="text" class="form-control" placeholder="GPS Point" aria-label="gps" aria-describedby="nama-addon">
                                                        &nbsp; &nbsp;<label>BT</label>&nbsp; &nbsp;
                                                    </div>
                                                    <label>No.Telepon/Fax</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="No. SK Penetapan" aria-label="Password" aria-describedby="password-addon">
                                                    </div>
                                                    <label>Alamat Email</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="No. SK Penetapan" aria-label="Password" aria-describedby="password-addon">
                                                    </div>
                                                    <label>Alamat Website/Blog</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="No. SK Penetapan" aria-label="Password" aria-describedby="password-addon">
                                                    </div>
                                                    <label>Nama Pimpinan</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="No. SK Penetapan" aria-label="Password" aria-describedby="password-addon">
                                                    </div>
                                                    <label>Koordinator Penyuluh</label>
                                                    <div class="input-group mb-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                            <label class="form-check-label" for="inlineRadio1">PNS</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                            <label class="form-check-label" for="inlineRadio2">THL</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                            <label class="form-check-label" for="inlineRadio2">Struktural</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="text-center">
                                                    <center><button type="button" class="btn btn-round bg-gradient-warning btn-lg w-100 mt-4 mb-0">Simpan Data</button></center>
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

<?= $this->endSection() ?>