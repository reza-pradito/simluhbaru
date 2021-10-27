<?= $this->extend('layout/main_template') ?>

<?= $this->section('content') ?>

<?php $seskab = session()->get('kodebapel'); ?>
<?php $seskec = session()->get('kodebpp'); ?>
<center><h2> Daftar Kelembagaan Ekonomi Petani di Kecamatan <?= ucwords(strtolower($nama_kecamatan)) ?> </h2></center>


<button type="button" data-bs-toggle="modal" data-bs-target="#modal-form" class="btn bg-gradient-primary btn-sm">+ Tambah Data</button>
<div class="card">
    <div class="table-responsive">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Nama Kelembagaan Ekonomi</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Nama Direktur/Ketua</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Alamat</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">No.Telp</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Email</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Tahun Pembentukan</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Akta Badan Hukum</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Jumlah Pemegang Saham</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Jumlah Poktan</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Jumlah Gapoktan</th>
                   
                   
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
                        <p class="text-xs font-weight-bold mb-0"><?= $row['nama_kep'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['nama_direktur'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['alamat'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['no_telp'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['email'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['tahun_bentuk'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['badan_hukum'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['jum_anggota'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['jum_poktan'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['jum_gapoktan'] ?></p>
                    </td>
                   
                    <td class="align-middle text-center text-sm">
                    <button type="button"  data-id_kep="<?= $row['id_kep'] ?>" id="btnEditKEP" class="btn bg-gradient-warning btn-sm">
                                    <i class="fas fa-edit"></i> Ubah
                                </button>
                           
                                <button class="btn btn-danger btn-sm" id="btnHapus" data-id_kep="<?= $row['id_kep'] ?>" type="submit" onclick="return confirm('Are you sure ?')">
                                <i class="fas fa-trash"></i> Hapus</button>
                          
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
                                        <form role="form text-left" action="<?= base_url('/KelembagaanPelakuUtama/KelembagaanEkonomiPetani/ListKEP/save'); ?>" method="post" enctype="multipart/form-data">
                                            <? csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-5" mt-5>
                                            <label>Kecamatan</label>
                                            <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Kecamatan" value="<?= $nama_kecamatan; ?>" disabled>
                                            </div>
                                            <label>Nama Kelembagaan Ekonomi</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="nama_kep" name="nama_kep" placeholder="Nama Poktan" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Jenis Kelembagaan Ekonomi</label>
                                            <div class="input-group mb-3">
                                                <select class="form-select" id="jenis_kep" name="jenis_kep" aria-label="Default select example">
                                                    <option selected>Pilih  </option>
                                                    <option value="kop">Koperasi Tani</option>
                                                    <option value="pt">PT</option>
                                                    <option value="cv">CV</option>
                                                    <option value="kub">Kelompok Usaha Bersama (KUB)</option>
                                                    <option value="mini_kub">Mini Kelompok Usaha Bersama (Mini KUB)</option>
                                                    <option value="bump">Badan Usaha Milik Petani (BUMP)</option>
                                                    <option value="lkma">LKMA</option>
                                                    <option value="lain">Lainnya</option>
                                                </select>
                                            </div>
                                          
                                            <label>Alamat</label>
                                                <textarea class="form-control" id="alamat" placeholder="Alamat" name="alamat" aria-label="Password" aria-describedby="password-addon"></textarea>
                                            <label>No Telp</label>
                                                <div class="input-group mb-3">
                                                     <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="No Telp" aria-label="Password" aria-describedby="password-addon">
                                                </div>
                                                <label>Email</label>
                                                <div class="input-group mb-3">
                                                     <input type="text" class="form-control" id="email" name="email" placeholder="Email" aria-label="Email" aria-describedby="email-addon" >
                                                </div>
                                                <label>Nama Ketua / Direktur</label>
                                                <div class="input-group mb-3">
                                                     <input type="text" class="form-control" id="nama_direktur" name="nama_direktur" placeholder="Nama Ketua / Direktur" aria-label="Password" aria-describedby="password-addon">
                                                </div>
                                                <label>Tahun Pembentukan</label>
                                            <div class="input-group mb-3">
                                                <select id="year" class="form-select"  aria-label="Default select example" name="tahun_bentuk">
                                                    <option selected>Pilih Tahun</option>
                                                    
                                                </select>
                                            </div>
                                            <label>Badan Hukum</label>
                                            <div class="input-group mb-3">
                                                <select class="form-select" id="badan_hukum" name="badan_hukum" aria-label="Default select example">
                                                    <option selected>Pilih  </option>
                                                    <option value="ada">Ada</option>
                                                    <option value="tidak">Tidak Ada</option>
                                                    
                                                </select>
                                            </div>
                                            <label>Jumlah Anggota / Pemegang Saham</label>
                                                <div class="input-group mb-3">
                                                     <input type="text" class="form-control" id="jum_anggota" name="jum_anggota" placeholder="Jumlah Anggota" aria-label="Password" aria-describedby="password-addon">
                                                </div>
                                                <label>Jumlah Poktan</label>
                                                <div class="input-group mb-3">
                                                     <input type="text" class="form-control" id="jum_poktan" name="jum_poktan" placeholder="Jumlah Poktan" aria-label="Password" aria-describedby="password-addon">
                                                </div>
                                                <label>Jumlah Gapoktan</label>
                                                <div class="input-group mb-3">
                                                     <input type="text" class="form-control" id="jum_gapoktan" name="jum_gapoktan" placeholder="Jumlah Gapoktan" aria-label="Password" aria-describedby="password-addon">
                                                </div>
                                            <input type="hidden" id="kode_kec" name="kode_kec" value="<?= $seskec; ?>" >
                                                <input type="hidden" id="kode_kab" name="kode_kab" value="<?= $seskab; ?>">
                                                
                                                <input type="hidden" id="id_kep" name="id_kep" >
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
            var nama_kep = $('#nama_kep').val();
            var jenis_kep = $('#jenis_kep').val();
            var alamat = $('#alamat').val();
            var tahun_bentuk = $('#year').val();
            var email = $('#email').val();
            var no_telp = $('#no_telp').val();
            var jum_anggota = $('#jum_anggota').val();
            var jum_poktan = $('#jum_poktan').val();
            var jum_gapoktan = $('#jum_gapoktan').val();
            var nama_direktur = $('#nama_direktur').val();
            var badan_hukum = $('#badan_hukum').val();

            $.ajax({
                url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelembagaanEkonomiPetani/ListKEP/save/',
                type: 'POST',
                data: {
                    'kode_kec': kode_kec,
                    'kode_kab': kode_kab,
                    'kode_desa': kode_desa,
                    'nama_kep': nama_kep,
                    'jenis_kep': jenis_kep,
                    'no_telp': no_telp,
                    'email': email,
                    'nama_direktur': nama_direktur,
                    'badan_hukum': badan_hukum,
                    'tahun_bentuk': tahun_bentuk,
                    'jum_anggota': jum_anggota,
                    'jum_poktan': jum_poktan,
                    'jum_gapoktan': jum_gapoktan,
                    'alamat': alamat,
                    
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
        $(document).delegate('#btnHapus', 'click', function() {
            var id_kep = $(this).data('id_kep');

            $.ajax({
                url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelembagaanEkonomiPetani/ListKEP/delete/' + id_kep,
                type: 'POST',
                success: function(result) {
                    Swal.fire({
                        title: 'Sukses',
                        text: "Sukses Hapus data",
                        type: 'success',
                    }).then((result) => {

                        if (result.value) {
                            location.reload();
                        }
                    });
                },
                error: function(jqxhr, status, exception) {
                    Swal.fire({
                        title: 'Error',
                        text: "Gagal Hapus data",
                        type: 'error',
                    }).then((result) => {
                        if (result.value) {
                            location.reload();
                        }
                    });
                }

            });
        });
        $(document).delegate('#btnEditKEP', 'click', function() {
            $.ajax({
                url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelembagaanEkonomiPetani/ListKEP/edit/' + $(this).data('id_kep'),
                type: 'GET',
                dataType: 'JSON',
                success: function(result) {
                    // console.log(result);

                    $('#id_kep').val(result.id_kep);
                    $('#kode_kec').val(result.kode_kec);
                    $('#kode_desa').val(result.kode_desa);
                    $('#kode_kab').val(result.kode_kab);
                    $('#nama_kep').val(result.nama_kep);
                    $('#jenis_kep').val(result.jenis_kep);
                    $('#alamat').val(result.alamat);
                    $('#year').val(result.tahun_bentuk);
                    $('#no_telp').val(result.no_telp);
                    $('#email').val(result.email);
                    $('#nama_direktur').val(result.no_telp);
                    $('#jum_anggota').val(result.jum_anggota);
                    $('#badan_hukum').val(result.badan_hukum);
                    $('#jum_poktan').val(result.jum_poktan);
                    $('#jum_gapoktan').val(result.no_telp);


                    $('#modal-form').modal('show');
                    $("#btnSave").attr("id", "btnDoEdit");

                    $(document).delegate('#btnDoEdit', 'click', function() {
                     
                        var id_kep = $('#id_kep').val();
             var kode_kec = $('#kode_kec').val();
            var kode_kab = $('#kode_kab').val();
            var kode_desa = $('#kode_desa').val();
            var nama_kep = $('#nama_kep').val();
            var jenis_kep = $('#jenis_kep').val();
            var alamat = $('#alamat').val();
            var tahun_bentuk = $('#year').val();
            var email = $('#email').val();
            var no_telp = $('#no_telp').val();
            var jum_anggota = $('#jum_anggota').val();
            var jum_poktan = $('#jum_poktan').val();
            var jum_gapoktan = $('#jum_gapoktan').val();
            var nama_direktur = $('#nama_direktur').val();
            var badan_hukum = $('#badan_hukum').val();

                        let formData = new FormData();
                        formData.append('id_kep', id_kep);
                        formData.append('kode_kec', kode_kec);
                        formData.append('kode_kab', kode_kab);
                        formData.append('kode_desa', kode_desa);
                        formData.append('nama_kep', nama_kep);
                        formData.append('jenis_kep', jenis_kep);
                        formData.append('alamat', alamat);
                        formData.append('tahun_bentuk', tahun_bentuk);
                        formData.append('email', email);
                        formData.append('no_telp', no_telp);
                        formData.append('nama_direktur', nama_direktur);
                        formData.append('badan_hukum', badan_hukum);
                        formData.append('jum_poktan', jum_poktan);
                        formData.append('jum_anggota', jum_anggota);
                        formData.append('jum_poktan', jum_poktan);

                        $.ajax({
                            url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelembagaanEkonomiPetani/ListKEP/update/' + id_kep,
                            type: "POST",
                            data: formData,
                            cache: false,
                            processData: false,
                            contentType: false,
                            success: function(result) {
                                $('#modal-form').modal('hide');
                                Swal.fire({
                                    title: 'Sukses',
                                    text: "Sukses edit data",
                                    type: 'success',
                                }).then((result) => {

                                    if (result.value) {
                                        location.reload();
                                    }
                                });

                            },
                            error: function(jqxhr, status, exception) {

                                Swal.fire({
                                    title: 'Error',
                                    text: "Gagal edit data",
                                    type: 'Error',
                                }).then((result) => {

                                    if (result.value) {
                                        location.reload();
                                    }
                                });

                            }
                        });
                    });

                }
            });
     
        $('.modal').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
        });
    });
    });
    
</script>
<?= $this->endSection() ?>