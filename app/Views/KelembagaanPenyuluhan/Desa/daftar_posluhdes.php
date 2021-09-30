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
                                <button type="button" data-bs-toggle="modal" data-bs-target="#modal-edit" id="btn-edit" class="btn bg-gradient-warning btn-sm" data-idpos="<?= $row['idpos']; ?>" data-kecamatan="<?= $row['deskripsi']; ?>" data-nm_desa="<?= $row['nm_desa']; ?>" data-kode_desa="<?= $row['kode_desa']; ?>" data-kode_kab="<?= $row['kode_kab']; ?>" data-kode_kec="<?= $row['kode_kec']; ?>" data-nama="<?= $row['nama']; ?>" data-alamat="<?= $row['alamat']; ?>" data-ketua="<?= $row['ketua']; ?>" data-sekretaris="<?= $row['sekretaris']; ?>" data-bendahara="<?= $row['bendahara']; ?>" data-tahun_berdiri="<?= $row['tahun_berdiri']; ?>" data-jum_anggota="<?= $row['jum_anggota']; ?>" data-id_swa="<?= $row['id_swa']; ?>" data-penyuluh_swadaya="<?= $row['penyuluh_swadaya']; ?>">
                                    <i class="fas fa-edit"></i> Ubah
                                </button>
                            </a>
                            <a href="<?= base_url('KelembagaanPenyuluhan/Desa/desa/delete/' . $row['idpos']) ?>">
                                <button type="button" onclick="return confirm('apakah anda ingin menghapus data ini?')" class="btn bg-gradient-danger btn-sm">
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
                                        <h4 class="font-weight-bolder text-warning text-gradient">Tambah Data</h4>
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
                                                        <input type="text" class="form-control" placeholder="alamat" name="alamat">
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
                                                        <select name="tahun_berdiri" id="selectElementId" class="form-control input-lg">
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
                                                    <input type="hidden" name="kode_kab" value="<?= $row['id_dati2']; ?>">
                                                    <input type="hidden" name="kode_kec" value="<?= $row['kode_kec']; ?>">
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
                <?php $no = 1;
                foreach ($tabel_data as $row => $value) { ?>
                    <!-- Modal Edit -->
                    <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modal-edit" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <div class="card card-plain">
                                        <div class="card-header pb-0 text-left">
                                            <h4 class="font-weight-bolder text-warning text-gradient">Ubah Data</h4>
                                        </div>
                                        <div class="card-body">
                                            <form role="form text-left" action="<?= base_url('KelembagaanPenyuluhan/Desa/desa/edit'); ?>" method="post" enctype="multipart/form-data">
                                                <? csrf_field(); ?>
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="hidden" name="idpos" id="idpos" value="<?= $value['idpos']; ?>">
                                                        <label for="deskripsi">Kecamatan</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Kecamatan" value="<?= $value['deskripsi']; ?>" disabled>
                                                        </div>
                                                        <label for="nm_desa">Desa</label>
                                                        <div class="input-group mb-3">
                                                            <select name="kode_desa" id="kode_desa" class="form-control input-lg">
                                                                <option value="<?= $value['kode_desa']; ?>"><?= $value['nm_desa']; ?></option>
                                                                <?php
                                                                foreach ($desa as $row2) {
                                                                    echo '<option value="' . $row2["id_desa"] . '">' . $row2["nm_desa"] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <label for="nama">Nama Posluhdes</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" placeholder="nama posluhdes" id="nama" name="nama" value="<?= $value['nama']; ?>">
                                                        </div>
                                                        <label for="alamat">Alamat</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" placeholder="alamat" id="alamat" name="alamat" value="<?= $value['alamat']; ?>">
                                                        </div>
                                                        <label for="ketua">Ketua</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" placeholder="ketua" id="ketua" name="ketua" value="<?= $value['ketua']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <label for="sekretaris">Sekretaris</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" placeholder="sekretaris" id="sekretaris" name="sekretaris" value="<?= $value['sekretaris']; ?>">
                                                        </div>
                                                        <label for="bendahara">Bendahara</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" placeholder="bendahara" id="bendahara" name="bendahara" value="<?= $value['bendahara']; ?>">
                                                        </div>
                                                        <label for="tahun_beridiri">Tahun Berdiri</label>
                                                        <div class="input-group mb-3">
                                                            <select name="tahun_berdiri" id="selectElementId2" class="form-control input-lg">
                                                                <option value="<?= $value['tahun_berdiri']; ?>"><?= $value['tahun_berdiri']; ?></option>
                                                            </select>
                                                        </div>
                                                        <label for="jum_anggota">Jumlah Anggota</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" placeholder="jumlah anggota" id="jum_anggota" name="jum_anggota" value="<?= $value['jum_anggota']; ?>">
                                                        </div>
                                                        <label for="penyuluh_swadaya">Penyuluh Swadaya </label>
                                                        <div class="input-group mb-3">
                                                            <select name="penyuluh_swadaya" id="penyuluh_swadaya" class="form-control input-lg">
                                                                <option value="<?= $value['penyuluh_swadaya']; ?>"><?= $value['penyuluh_swadaya']; ?></option>
                                                                <?php
                                                                foreach ($pen_swa as $row3) {
                                                                    echo '<option value="' . $row3["id_swa"] . '">' . $row3["nama"] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <input type="hidden" name="kode_kab" id="kode_kab" value="<?= $value['id_dati2']; ?>">
                                                        <input type="hidden" name="kode_kec" id="kode_kec" value="<?= $value['kode_kec']; ?>">
                                                        <!-- <input type="hidden" name="kode_kec" value=""> -->
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
                <?php } ?>
    </div>
</div>
</tbody>
</table>
</div>
</div>

<?= $this->endSection() ?>