<?= $this->extend('layout/main_template') ?>

<?= $this->section('content') ?>

                            <div class="card-body">
                                <form role="form text-left">
                                    <div class="row">
                                        <div class="col-5" mt-5>
                                            <label>Kecamatan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Arjosari" aria-label="Email" aria-describedby="email-addon" disabled>
                                            </div>
                                            <label>Desa</label>
                                            <div class="input-group mb-3">
                                            <select name="id_desa" id="id_desa" class="form-control input-lg">
                                                            <option value="">Pilih Desa</option>
                                                            <?php
                                                            foreach ($tabel_data as $row) {
                                                                echo '<option value="' . $row["id_desa"] . '">' . $row["nm_desa"] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                            </div>
                                            <label>N0 SK CPL</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="No. KTP" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>No Urut Dalam SK</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Nama" aria-label="Password" aria-describedby="password-addon">
                                            </div> 
                                            <label>Nama Kelompok</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Nama" aria-label="Password" aria-describedby="password-addon">
                                            </div> 
                                            <label>Nama Ketua</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Nama" aria-label="Password" aria-describedby="password-addon">
                                            </div> 
                                            <label>Nama Sekretaris</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Nama" aria-label="Password" aria-describedby="password-addon">
                                            </div> 
                                            <label>Nama Bendahara</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Nama" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Alamat Lengkap Sekretariat</label>
                                                <textarea class="form-control" placeholder="" aria-label="Password" aria-describedby="password-addon"></textarea>
                                            <label>Tahun Pembentukan</label>
                                            <div class="input-group mb-3">
                                                <input type="date" class="form-control" placeholder="" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Komoditas Yang Diusahakan</label>
                                            <div class="input-group mb-3">
                                                <select class="form-select" id="status" aria-label="Default select example">
                                                    <option selected>Pilih Status</option>
                                                </select>
                                            </div>
                                            <label>Status</label>
                                            <div class="input-group mb-3">
                                                <select class="form-select" id="status" aria-label="Default select example">
                                                    <option selected>Pilih Status</option>
                                                    <option value="Aktif">Aktif</option>
                                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                                    <option value="Bergabung Dengan Kelompok Lain">Bergabung Dengan Kelompok Lain</option>
                                                </select>
                                            </div>

                                            <div class="text-center">
                                                <center><button type="button" class="btn btn-round bg-gradient-warning btn-lg w-100 mt-4 mb-0">Simpan Data</button></center>
                                            </div>
                                        </div>
                                </form>
                  
<?php echo view('layout/footer'); ?>
<br>

<?= $this->endSection() ?>