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
                foreach ($tabel_data as $row) {
                ?>
                    <tr>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $i++ ?></p>
                        </td>
                        <td width="50">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['nm_desa'] ?></p>
                        </td>
                        <td class="align-middle text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['nama'] ?></p>
                        </td>
                        <td class="align-middle text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['alamat'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['ketua'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['sekretaris'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['bendahara'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['tahun_berdiri'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['jum_anggota'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['penyuluh_swadaya'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <a href="#">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#modal-form" id="btn-edit" class="btn bg-gradient-warning btn-sm" data-kecamatan="<?= $row['deskripsi']; ?>" data-nm_desa="<?= $row['nm_desa']; ?>" data-nama="<?= $row['nama']; ?>" data-alamat="<?= $row['alamat']; ?>" data-ketua="<?= $row['ketua']; ?>" data-sekretaris="<?= $row['sekretaris']; ?>" data-bendahara="<?= $row['bendahara']; ?>" data-tahun_berdiri="<?= $row['tahun_berdiri']; ?>" data-jum_anggota="<?= $row['jum_anggota']; ?>" data-nama="<?= $row['penyuluh_swadaya']; ?>">
                                    <i class="fas fa-edit"></i> Ubah
                                </button>
                            </a>
                            <a href="#">
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
                                                    <label for="deskripsi">Kecamatan</label>
                                                    <div class="input-group mb-3">
                                                        <input type="email" class="form-control" id="deskripsi" name="deskripsi" placeholder="Kecamatan" aria-label="Email" aria-describedby="email-addon" value="<?= $row['deskripsi']; ?>" disabled>
                                                    </div>
                                                    <label for="nm_desa">Desa</label>
                                                    <div class="input-group mb-3">
                                                        <select class="form-select" aria-label="Default select example" id="nm_desa" name="nm_desa">
                                                            <option selected>Pilih Desa</option>
                                                            <option value="arjosari" <?php if ($row["nm_desa"] == "arjosari") echo "selected"; ?>>Arjosari</option>
                                                            <option value="banjar">Gorang</option>
                                                            <option value="donorejo">Gayuhan</option>
                                                            <option value="donorejo">Gegeran</option>
                                                            <option value="donorejo">Gembong</option>
                                                        </select>
                                                    </div>
                                                    <label for="nama">Nama Posluhdes</label>
                                                    <div class="input-group mb-3">
                                                        <input type="email" class="form-control" placeholder="nama posluhdes" id="nama" name="nama" value="<?= $row['nama']; ?>">
                                                    </div>
                                                    <label for="alamat">Alamat</label>
                                                    <div class="input-group mb-3">
                                                        <input type="email" class="form-control" placeholder="alamat" id="alamat" name="alamat" value="<?= $row['alamat']; ?>">
                                                    </div>
                                                    <label for="ketua">Ketua</label>
                                                    <div class="input-group mb-3">
                                                        <input type="email" class="form-control" placeholder="ketua" id="ketua" name="ketua" value="<?= $row['ketua']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label for="sekretaris">Sekretaris</label>
                                                    <div class="input-group mb-3">
                                                        <input type="email" class="form-control" placeholder="sekretaris" id="sekretaris" name="sekretaris" value="<?= $row['sekretaris']; ?>">
                                                    </div>
                                                    <label for="bendahara">Bendahara</label>
                                                    <div class="input-group mb-3">
                                                        <input type="email" class="form-control" placeholder="bendahara" id="bendahara" name="bendahara" value="<?= $row['bendahara']; ?>">
                                                    </div>
                                                    <label for="tahun_beridiri">tahun Berdiri</label>
                                                    <div class="input-group mb-3">
                                                        <input type="email" class="form-control" placeholder="tahun berdiri" id="tahun_berdiri" name="tahun_berdiri" value="<?= $row['tahun_berdiri']; ?>">
                                                    </div>
                                                    <label for="jum_anggota">Jumlah Anggota</label>
                                                    <div class="input-group mb-3">
                                                        <input type="email" class="form-control" placeholder="jumlah anggota" id="jum_anggota" name="jum_anggota" value="<?= $row['jum_anggota']; ?>">
                                                    </div>
                                                    <label for="penyuluh_swadaya">Penyuluh Swadaya</label>
                                                    <div class="input-group mb-3">
                                                        <input type="email" class="form-control" placeholder="Penyuluh swadaya" id="penyuluh_swadaya" name="penyuluh_swadaya" value="<?= $row['penyuluh_swadaya']; ?>">
                                                    </div>
                                                    <!-- <input type="hidden" name="kode_kec" value=""> -->
                                                </div>
                                                <div class="text-center">
                                                    <button type="button" class="btn btn-round bg-gradient-warning btn-lg w-100 mt-4 mb-0">Simpan Data</button>
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