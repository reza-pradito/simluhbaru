<?= $this->extend('layout/main_template') ?>

<?= $this->section('content') ?>


<center><h4> Daftar Gapoktan di Kecamatan <?= ucwords(strtolower($nama_kecamatan)) ?> </h4></center>
<center><h4>Data ditemukan <?= ucwords(strtolower($jum)) ?> </h2></center>
<button type="button" data-bs-toggle="modal" data-bs-target="#modal-form" class="btn bg-gradient-primary btn-sm ">+ Tambah Data</button>
<div class="card">
    <div class="table-responsive">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Nama Desa</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Nama Gapoktan</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Nama Ketua</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Nama Bendahara</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Alamat Sekretariat</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Anggota Poktan</th>
                    <th class="text-secondary opacity-7"></th>
                </tr>
            </thead>
            <tbody>
            <?php
            $i = 1;
            foreach ($tabel_data as $key => $row) {
            ?>
            
                <tr>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $i++ ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['nm_desa'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['nama_gapoktan'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['ketua_gapoktan'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['simluh_bendahara'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['alamat'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                    <a href="<?=('listgapoktandesa?kode_desa=' .$row['id_desa'])?>"> <p class="text-xs font-weight-bold mb-0"><?= $row['jumpok'] ?></p>
                    </td></a>
                    
                    <td class="align-middle text-center text-sm">
                            <a href="#">
                                <button type="button" id="btn-edit" data-bs-toggle="modal" data-bs-target="#modal-edit" data-id_gap="<?= $row['id_gap'] ?>" class="btn bg-gradient-warning btn-sm">
                                    <i class="fas fa-edit"></i> Ubah
                                </button>
                            </a>
                            <a href="">
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
                  <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <div class="card card-plain">
                                        <div class="card-header pb-0 text-left">
                                            <h4 class="font-weight-bolder text-warning text-gradient">Tambah Data</h4>
                                        </div>
                                        <div class="card-body">
                                      <form role="form text-left"
                                            <? csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-5" mt-5>
                                            <label>Kecamatan</label>
                                            <div class="input-group mb-5">
                                            <input type="text" class="form-control deskripsi" id="deskripsi" name="deskripsi" placeholder="Kecamatan" value="<?= $nama_kecamatan; ?>" disabled>
                                            </div>
                                            <label>Desa</label>
                                            <div class="input-group mb-3">
                                               <select name="kode_desa"  class="form-control desa input-lg">
                                                            <option value="">Pilih Desa</option>
                                                            <?php
                                                            foreach ($desa as $row2) {
                                                                echo '<option value="' . $row2["id_desa"] . '">' . $row2["nm_desa"] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                            </div>
                                            <label>Nama Gapoktan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control nama_gapoktan" id="nama_gapoktan" name="nama_gapoktan" placeholder="Nama Gapoktan" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Nama Ketua</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control ketua_gapoktan" id="ketua_gapoktan" name="ketua_gapoktan" placeholder="Nama Ketua" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Nama Bendahara</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control simluh_bendahara" id="simluh_bendahara" name="simluh_bendahara" placeholder="Nama Bendahara" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Nama Sekretaris</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control simluh_sekretaris" id="simluh_sekretaris" name="simluh_sekretaris" placeholder="Nama Sekretaris" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Alamat Lengkap Sekretariat</label>
                                                <textarea class="form-control alamat" id="alamat" placeholder="Alamat" name="alamat" aria-label="Password" aria-describedby="password-addon"></textarea>
                                            <label>Tahun Pembentukan</label>
                                            <div class="input-group mb-3">
                                                <select id="year" class="form-select simluh_tahun_bentuk"  aria-label="Default select example" name="simluh_tahun_bentuk">
                                                    <option selected>Pilih Tahun</option>
                                                    
                                                </select>
                                            </div>
                                            <label>SK Pengukuhan</label>
                                            <div class="input-group mb-3">
                                                <select class="form-select simluh_sk_pengukuhan" id="simluh_sk_pengukuhan" name="simluh_sk_pengukuhan" aria-label="Default select example">
                                                    <option selected>Pilih  </option>
                                                    <option value="ada">ada</option>
                                                    <option value="tidak">tidak</option>
                                                   
                                                </select>
                                            </div>
                                            <input type="hidden" class="form-control kode_kec" name="kode_kec" value="<?= $row['id_daerah'] ?>">
                                                <input type="hidden" class="form-control kode_kab" name="kode_kab" value="<?= $row['id_dati2'] ?>" >
                                                <input type="hidden" class="form-control id_gap" name="kode_kab" value="<?= $row['id_dati2'] ?>" >
                                             
                                                    <div class="text-center">
                                                        <button type="button" class="btn btn-round bg-gradient-warning btn-sm ajax-save">Simpan Data</button>
                                                    </div>
                                                </div>
                                         
                                        </div>
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
                                            <h4 class="font-weight-bolder text-warning text-gradient">Tambah Data</h4>
                                        </div>
                                        <div class="card-body">
                                        
                                    <div class="row">
                                        <div class="col-5" mt-5>
                                            <label>Kecamatan</label>
                                            <div class="input-group mb-5">
                                            <input type="text" class="form-control deskripsi" id="deskripsi" name="deskripsi" placeholder="Kecamatan" value="<?= $nama_kecamatan; ?>" disabled>
                                            </div>
                                            <label>Desa</label>
                                            <div class="input-group mb-3">
                                               <select name="kode_desa" id="kode_desa" class="form-control desa input-lg">
                                                            <option value="">Pilih Desa</option>
                                                            <?php
                                                            foreach ($desa as $row2) {
                                                                echo '<option value="' . $row2["id_desa"] . '">' . $row2["nm_desa"] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                            </div>
                                            <label>Nama Gapoktan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control nama_gapoktan" id="nama_gapoktan" name="nama_gapoktan"  ">
                                            </div>
                                            <label>Nama Ketua</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control ketua_gapoktan" id="ketua_gapoktan" name="ketua_gapoktan" ">
                                            </div>
                                            <label>Nama Bendahara</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control simluh_bendahara" id="simluh_bendahara" name="simluh_bendahara" ">
                                            </div>
                                            <label>Nama Sekretaris</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control simluh_sekretaris" id="simluh_sekretaris" name="simluh_sekretaris" ">
                                            </div>
                                            <label>Alamat Lengkap Sekretariat</label>
                                                <textarea class="form-control alamat" id="alamat" placeholder="Alamat" name="alamat""></textarea>
                                            <label>Tahun Pembentukan</label>
                                            <div class="input-group mb-3">
                                                <select id="selectElementId" class="form-select simluh_tahun_bentuk"  aria-label="Default select example" name="simluh_tahun_bentuk">
                                                    <option selected>Pilih Tahun</option>
                                                    
                                                </select>
                                            </div>
                                            <label>SK Pengukuhan</label>
                                            <div class="input-group mb-3">
                                                <select class="form-select simluh_sk_pengukuhan" id="simluh_sk_pengukuhan" name="simluh_sk_pengukuhan" aria-label="Default select example">
                                                    <option selected>Pilih  </option>
                                                    <option value="ada">ada</option>
                                                    <option value="tidak">tidak</option>
                                                   
                                                </select>
                                            </div>
                                                <input type="hidden" class="form-control kode_kec" name="kode_kec" value="<?= $row['id_daerah'] ?>">
                                                <input type="hidden" class="form-control kode_kab" name="kode_kab" value="<?= $row['id_dati2'] ?>" >
                                                <input type="hidden" class="form-control id_gap" name="id_gap" value="<?= $row['id_gap'] ?>" >
                                             
                                                    <div class="text-center">
                                                        <button type="button" class="btn btn-round bg-gradient-warning btn-sm ajax-save">Simpan Data</button>
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
                    </div 
    </div>
</div>
</div>
</tbody>
</table>
</div>

</div>
<?php echo view('layout/footer'); ?>
<br>

<?= $this->endSection() ?>

<?php $this->section('script') ?>


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
                    'kode_kab': $('.kode_kab').val(),
                    'kode_desa': $('.kode_desa').val(),
                    'kode_kec': $('.kode_kec').val(),
                    'ketua_gapoktan': $('.nama').val(),
                    'nama_gapoktan': $('.nama_gapoktan').val(),
                    'simluh_bendahara': $('.simluh_bendahara').val(),
                    'simluh_sekretaris': $('.simluh_sekretaris').val(),
                    'alamat': $('.alamat').val(),
                    'simluh_sk_bentuk': $('.simluh_sk_bentuk').val(),
                    'simluh_sk_pengukuhan': $('.simluh_sk_pengukuhan').val(),
                    

                };
                $.ajax({
                    method: "POST",
                    url: "KelembagaanPelakuUtama/Gapoktan/ListGaapoktan/save",
                    data: data,
                    success: function(response) {
                        $('#modal-form').modal('hide');
                        $('#modal-form').find('input').val('');

                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(response.status);
                    }
                });
            }

        });
    });
</script>


<?php $this->endSection() ?>