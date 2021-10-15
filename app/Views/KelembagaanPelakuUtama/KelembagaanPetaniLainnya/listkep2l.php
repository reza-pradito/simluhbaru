<?= $this->extend('layout/main_template') ?>

<?= $this->section('content') ?>


<?php $kode_kec = session()->get('kode_bpp'); ?>
<center><h2> Daftar Kelompok P2L di Kec <?= ucwords(strtolower($nama_kecamatan)) ?> </h2></center>
<center>Data ditemukan <?= ucwords(strtolower($jum)) ?> </center>

<button type="button" data-bs-toggle="modal" data-bs-target="#modal-form" class="btn bg-gradient-primary btn-sm">+ Tambah Data</button>
<div class="card">
    <div class="table-responsive">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Nama Desa</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Nama Kelompok</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Nama Ketua</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Nama Sekretaris</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Nama Bendahara</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Alamat Sekretariat</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Tanggal Pembentukan</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Komodias Yang <br> Diusahakan</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Status</th>
                  
                   
                    <th class="text-secondary opacity-7"></th>
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
                        <p class="text-xs font-weight-bold mb-0"><?= $row['nm_desa'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['nama_poktan'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['nama_ketua'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['nama_sekretaris'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['nama_bendahara'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['alamat_sekretariat'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['tanggal_bentuk'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['kode_komoditas_hor'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['status'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                    <button type="button"  data-id_kep2l=""="<?= $row['id_kep2l'] ?>" id="btnEditP2l" class="btn bg-gradient-warning btn-sm">
                                    <i class="fas fa-edit"></i> Ubah
                                </button>
                            
                           
                                <button class="btn btn-danger btn-sm" id="btnHapus" data-id_kep2l="<?= $row['id_kep2l'] ?>" type="submit" onclick="return confirm('Are you sure ?')">Hapus</button>
                                <i class="fas fa-trash"></i> 
                            </button>
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
                                        <form role="form text-left" action="<?= base_url('/KelembagaanPelakuUtama/KelembagaanPetaniLainnya/ListKEP2L/save'); ?>" method="post" enctype="multipart/form-data">
                                            <? csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-5" mt-5>
                                            <label>Kecamatan</label>
                                            <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Kecamatan" value="<?= $nama_kecamatan; ?>" disabled>
                                            </div>
                                            <label>Desa</label>
                                            <div class="input-group mb-3">
                                               <select name="kode_desa" id="kode_desa"  class="form-control input-lg">
                                                            <option value="">Pilih Desa</option>
                                                            <?php
                                                            foreach ($desa as $row2) {
                                                                echo '<option value="' . $row2["id_desa"] . '">' . $row2["id_desa"].'-' . $row2["nm_desa"] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                            </div>
                                            <label>No SK CPL</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="no_sk_cpl" name="no_sk_cpl"  aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>No Urut Dalam SK</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="no_urut_sk" name="no_urut_sk" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Nama Kelompok</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="nama_poktan" name="nama_poktan" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Nama Ketua (ISIKAN NIK)</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="nama_ketua" name="nama_ketua" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Nama Sekretaris (ISIKAN NIK)</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="nama_sekretaris" name="nama_sekretaris" aria-label="Password" aria-describedby="password-addon">
                                            </div> 
                                            <label>Nama Bendahara (ISIKAN NIK)</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="nama_bendahara" name="nama_bendahara" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Alamat Lengkap Sekretariat</label>
                                                <textarea class="form-control" id="alamat" placeholder="Alamat" name="alamat" aria-label="Password" aria-describedby="password-addon"></textarea>
                                            <label>Tanggal Pembentukan</label>
                                            <div class="input-group mb-3">
                                                <input type="date" class="form-control" id="tanggal_bentuk" name="tanggal_bentuk"  aria-label="Default select example" name="simluh_tahun_bentuk">
                                                   
                                                </select>
                                            </div>
                                            <label>Desa</label>
                                            <div class="input-group mb-3">
                                               <select name="kode_komoditas_hor" id="kode_komoditas_hor"  class="form-control input-lg">
                                                            <option value="">Pilih Komodias</option>
                                                            <?php
                                                            foreach ($komoditas as $row2) {
                                                                echo '<option value="' . $row2["kode_komoditas"] . '' . $row2["nama_subsektor"] . '">' . $row2["nama_komoditas"] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                            </div>
                                            <label>Status</label>
                                            <div class="input-group mb-3">
                                                <select class="form-select" id="status" name="status" aria-label="Default select example">
                                                    <option selected>Pilih  </option>
                                                    <option value="1">Aktif</option>
                                                    <option value="2">Tidak aktif</option>
                                                </select>
                                            </div>
                                            <input type="hidden" id="kode_kec" name="kode_kec" value="<?= $kode_kec; ?>" >
                                                
                                                <input type="hidden" id="id_kep2l" name="id_kep2l" >
                                               
                                                    <div class="text-center">
                                                        <button type="button" id="btnSave" class="btn btn-round bg-gradient-warning btn-sm">Simpan Data</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div 
    </div>
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


<?= $this->section('script') ?>

<script>
    $(document).ready(function() {

        $(document).delegate('#btnSave', 'click', function() {

            var kode_kec = $('#kode_kec').val();
            var kode_kab = $('#kode_kab').val();
            var kode_desa = $('#kode_desa').val();
            var $no_sk_cpl = $('#no_sk_cpl').val();
            var no_urut_sk = $('#no_urut_sk').val();
            var nama_ketua = $('#nama_ketua').val();
            var nama_sekretaris = $('#nama_sekretaris').val();
            var nama_bendahara = $('#nama_bendahara').val();
            var alamat = $('#alamat').val();
            var tanggal_bentuk = $('#tanggal_bentuk').val();
            var kode_komoditas_hor = $('#kode_komoditas_hor').val();
            var status = $('#status').val();

            $.ajax({
                url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelembagaanPetaniLainnya/ListKEP2L/save/',
                type: 'POST',
                data: {
                    'kode_kec': kode_kec,
                    'kode_kab': kode_kab,
                    'kode_desa': kode_desa,
                    'no_sk_cpl': no_sk_cpl,
                    'no_urut_sk': no_urut_sk,
                    'nama_ketua': nama_ketua,
                    'nama_sekretaris': nama_sekretaris,
                    'nama_bendahara': nama_bendahara,
                    'alamat': alamat,
                    'tanggal_bentuk': tanggal_bentuk,
                    'kode_komoditas_hor': kode_komoditas_hor,
                    'status': status,
                },
                success: function(result) {
                    result = JSON.parse(result);
                    if(result.value){
                        Swal.fire({
                            title: 'Sukses',
                            text: "Sukses tambah data",
                            type: 'success',
                        }).then((result) => {

                            if (result.value) {
                                location.reload();
                            }
                        });
                    }else{
                        Swal.fire({
                            title: 'Error',
                            text: "Gagal tambah data. " + result.message,
                            type: 'error',
                        }).then((result) => {
                            
                        });
                    }
                },
                error: function(jqxhr, status, exception) {
                    Swal.fire({
                        title: 'Error',
                        text: "Gagal tambah data",
                        type: 'error',
                    }).then((result) => {
                        if (result.value) {
                            location.reload();
                        }
                    });
                }
            });

        });
      
     
        $('.modal').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
        });
    });
    
    
</script>
<?= $this->endSection() ?>