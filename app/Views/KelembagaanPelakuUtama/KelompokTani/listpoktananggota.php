<?= $this->extend('layout/main_template') ?>

<?= $this->section('content') ?>
<br>
<center><h3> Daftar Anggota Kelompok Tani <?= ucwords(strtolower($nama_poktan)) ?> </h3></center>
<br>
<p> Catatan:</p>
<p>Harap download ulang data petani dalam format excel, dikareakan ada tambahan kolom isian tempa lahir,no HP dan titik koordinat
Penulisan titik koordinat menggunakan format decimal, contoh : -7.303972903946691, 111.19991775514895
</p>
<p> Informasi:</p>
<p>Untuk menjaga kelancaran aliran data dimana telah dimulai input ERDKK pada bulan juni s/d oktober 2021 yang terintegrasi dengan data SIMLUHTAN,
maka perbaikan/input data petani disarankan dilakukan melalui form input diatas
    </p>
<button type="button" data-bs-toggle="modal" data-bs-target="#modal-form" class="btn bg-gradient-primary btn-sm">+ Tambah Anggota Kelompok</button>
<div class="card">
    <div class="table-responsive">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Nama</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">NIK</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Tempat/Tgl Lahir</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Alamat<br>(Sesuai KTP)</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Jenis Kelamin</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">No Hp</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Status<br>Kenggotaan</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Komoditas<br>Yang<br>Diusahakan(1)</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Volume<br>(Ha,Ekor,unit)</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Komoditas<br>Yang<br>Diusahakan(2)</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Volume<br>(Ha,Ekor,unit)</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Komoditas<br>Yang<br>Diusahakan(3)</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Volume<br>(Ha,Ekor,unit)</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Komoditas<br>Lainnya</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Total Luas<br>Lahan Yang<br>Diuasahakan<br>(Ha)</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Total Luas<br>Lahan Yang<br>Dimiliki (Ha)</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Kategori Petani</th>     
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Titik Koordinat</th>
                   
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
                        <p class="text-xs font-weight-bold mb-0"><?= $row['nama_anggota'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['no_ktp'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['tempat_lahir'] ?>, <?= $row['tgl_lahir'] ?>-<?= $row['bln_lahir'] ?>-<?= $row['thn_lahir'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['alamat_ktp'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['jenis_kelamin'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['no_hp'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['status_anggota'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['kode_komoditas1'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['volume'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['kode_komoditas2'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['volume2'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['kode_komoditas3'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['volume3'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['lainnya'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['luas_lahan_ternak_diusahakan'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['luas_lahan_ternak_dimiliki'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['kategori_petani_penggarap'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['titik_koordinat_lahan'] ?></p>
                    </td>
                    
                    <td class="align-middle text-center text-sm">
                    <button type="button"  data-id_anggota="<?= $row['id_anggota'] ?>" id="btnEditAnggota" class="btn bg-gradient-warning btn-sm">
                                    <i class="fas fa-edit"></i> Ubah
                                </button>
                            
                           
                                <button class="btn btn-danger btn-sm" id="btnHapus" data-id_anggota="<?= $row['id_anggota'] ?>" type="button" >
                                <i class="fas fa-trash"></i> Hapus
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
                                        <form role="form text-left" action="<?= base_url('/KelembagaanPelakuUtama/KelompokTani/ListPoktanAnggota/save'); ?>" method="post" enctype="multipart/form-data">
                                            <? csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-5" mt-5>
                                            <label>Nama Anggota</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" placeholder="Nama Anggota" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Nama Anggota (Sesuai KTP)</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="nama_ktp" name="nama_ktp" placeholder="Nama Anggota" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            
                                            <label>NO KTP</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="no_ktp" name="no_ktp" placeholder="No KTP" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Tempat, Tanggal Lahir</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control tempat_lahir" placeholder="Tempat Lahir">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <select id="day" name="tgl_lahir" class="form-select tgl_lahir" aria-label="Default select example">
                                                        <option value="">Tanggal</option>
                                                    </select>
                                                    <select id="month" name="bln_lahir" class="form-select bln_lahir" aria-label="Default select example">
                                                        <option value="">Bulan</option>
                                                    </select>
                                                    <select id="year" name="thn_lahir" class="form-select thn_lahir" aria-label="Default select example">
                                                        <option value="">Tahun</option>
                                                    </select>
                                                </div>
                                                <label>No HP</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No HP" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Alamat Lengkap Sekretariat</label>
                                                <textarea class="form-control" id="alamat" placeholder="Alamat" name="alamat" aria-label="Password" aria-describedby="password-addon"></textarea>
                                          
                                            <label>Status</label>
                                            <div class="input-group mb-3">
                                                <select class="form-select" id="status_anggota" name="status_anggota" aria-label="Default select example">
                                                    <option selected>Pilih  </option>
                                                    <option value="1">Sebagai Anggota</option>
                                                    <option value="2">Calon Anggota</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                           
                                            <label>Komoditas Yang Di Usahakan (1)</label>
                                            <div class="input-group mb-3">
                                               <select name="kode_komoditas" id="kode_komoditas"  class="form-control input-lg">
                                                            <option value="">Pilih Komoditas</option>
                                                            <?php
                                                            foreach ($komoditas as $row2) {
                                                                echo '<option value="' . $row2["nama_subsektor"] . '">' . $row2["nama_subsektor"] . '-' . $row2["nama_komoditas"] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                            </div>
                                           <label>Komoditas Yang Diusahakan (2)</label>
                                           <div class="input-group mb-3">
                                              <select name="kode_komoditas2" id="kode_komoditas2"  class="form-control input-lg">
                                                           <option value="">Pilih Komoditas</option>
                                                           <?php
                                                           foreach ($komoditas as $row2) {
                                                               echo '<option value="' . $row2["nama_subsektor"] . '">' . $row2["nama_subsektor"] . '-' . $row2["nama_komoditas"] . '</option>';
                                                           }
                                                           ?>
                                                       </select>
                                           </div>
                                           <label>Komoditas Yang Diusahakan (3)</label>
                                           <div class="input-group mb-3">
                                              <select name="kode_komoditas3" id="kode_komoditas3"  class="form-control input-lg">
                                                           <option value="">Pilih Komoditas</option>
                                                           <?php
                                                           foreach ($komoditas as $row2) {
                                                               echo '<option value="' . $row2["nama_subsektor"] . '">' . $row2["nama_subsektor"] . '-' . $row2["nama_komoditas"] . '</option>';
                                                           }
                                                           ?>
                                                       </select>
                                           </div>
                                           <label>Jika Lainnya, Isikan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="lainnya" name="lainnya"  aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Total luas lahan yang diusahakan (ha) </label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="luas_lahan_ternak_diusahakan" name="luas_lahan_ternak_diusahakan" placeholder="diisi dengan angka" aria-label="Password" aria-describedby="password-addon"> 
                                            </div>
                                            <label>Total luas lahan yang dimiliki (ha) </label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="luas_lahan_ternak_dimiliki" name="luas_lahan_ternak_dimiliki" placeholder="diisi dengan angka" aria-label="Password" aria-describedby="password-addon"> 
                                            </div>
                                            <label>Titik Koordinat Lahan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="titik_koordinat_lahan" name="titik_koordinat_lahan" placeholder="Penulisan dengan format decimal degree" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Status</label>
                                            <div class="input-group mb-3">
                                                <select class="form-select" id="kategori_petani_penggarap" name="kategori_petani_penggarap" aria-label="Default select example">
                                                    <option selected>Kategori Petani  </option>
                                                    <option value="1">Pemilik Lahan</option>
                                                    <option value="2">Penggarap dan Pemilik Lahan</option>
                                                    <option value="3">Penggarap</option>
                                                    <option value="4">Buruh</option>
                                                </select>
                                            </div>
                                       </div>

                                        <div class="col">
                                        <label>Volume 1</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="volume" name="volume" placeholder="Volume (Ha,Ekor,Unit)" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Volume 2</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="volume2" name="volume2" placeholder="Volume (Ha,Ekor,Unit)" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Volume 3</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="volume3" name="volume3" placeholder="Volume (Ha,Ekor,Unit)" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            
                                        </div>
                                                <input type="hidden" id="id_poktan" name="id_poktan" >
                                               
                                                    <div class="text-center">
                                                        <button type="button" id="btnSave" class="btn btn-round bg-gradient-warning btn-sm">Simpan Data</button>
                                                    </div>
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
           
            
           
            var nama_anggota = $('#nama_anggota').val();
            var nama_ktp = $('#nama_ktp').val();
            var no_ktp = $('#no_ktp').val();
            var alamat = $('#alamat').val();
            var no_hp = $('#no_hp').val();
            var jenis_kelamin = $('#simluh_sk_pengukuhan').val();
            var tgl_lahir = $('#day').val();
            var bln_lahir = $('#month').val();
            var thn_lahir = $('#year').val();
            var status_anggota = $('#status_anggota').val();
            var kode_komoditas = $('#kode_komoditas').val();
            var kode_komoditas2 = $('#kode_komoditas2').val();
            var kode_komoditas3 = $('#kode_komoditas3').val();
            var volume = $('#volume').val();
            var volume2 = $('#volume2').val();
            var $volume3 = $('#volume3').val();
            var lainnya = $('#lainnya').val();
            var luas_lahan_ternak_diusahakan = $('#luas_lahan_ternak_diusahakan').val();
            var luas_lahan_ternak_dimiliki = $('#volume2').val();
            var titik_koordinat_lahan = $('#titik_koordinat_lahan').val();
            var kategori_petani_penggarap = $('#kategori_petani_penggarap').val();

            $.ajax({
                url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelompokTani/ListPoktanAnggota/save/',
                type: 'POST',
                data: {
                   
                   
                    'nama_anggota': nama_anggota,
                    'nama_ktp': nama_ktp,
                    'no_ktp': no_ktp,
                    'jenis_kelamin': jenis_kelamin,
                    'no_ktp': no_ktp,
                    'alamat': alamat,
                    'status_anggota': status_anggota,
                    'tgl_lahir': tgl_lahir,
                    'bln_lahir': bln_lahir,
                    'thn_lahir': thn_lahir,
                    'kode_komoditas': kode_komoditas,
                    'kode_komoditas2': kode_komoditas2,
                    'kode_komoditas3': kode_komoditas3,
                    'volume': volume,
                    'volume2': volume2,
                    'volume3': volume3,
                    'lainnya': lainnya,
                    'luas_lahan_ternak_diusahakan': luas_lahan_ternak_diusahakan,
                    'luas_lahan_ternak_dimiliki': luas_lahan_ternak_dimiliki,
                    'titik_koordinat_lahan': titik_koordinat_lahan,
                    'kategori_petani_penggarap': kategori_petani_penggarap,
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
            Swal.fire({
                title: 'Apakah anda yakin',
                text: "Data akan dihapus ?",
                type: 'warning',
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus Data!'
            }).then((result) => {
                if (result.value) {
                    var id_anggota = $(this).data('id_anggota');

                    $.ajax({
                        url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelompokTani/ListPoktanAnggota/delete/' + id_anggota,
                        type: 'POST',

                        success: function(result) {
                            Swal.fire({
                                title: 'Sukses',
                                text: "Sukses hapus data",
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
                                text: "Gagal hapus data",
                                type: 'error',
                            }).then((result) => {
                                if (result.value) {
                                    location.reload();
                                }
                            });
                        }
                    });
                }
            });

        });
        $(document).delegate('#btnEditAnggota', 'click', function() {
            $.ajax({
                url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelompokTani/ListPoktanAnggota/edit/' + $(this).data('id_anggota'),
                type: 'GET',
                dataType: 'JSON',
                success: function(result) {
                    // console.log(result);
                
                    $('#id_anggota').val(result.id_anggota);
                    $('#nama_anggota').val(result.nama_anggota);
                    $('#nama_ktp').val(result.ketua_gapoktan);
                    $('#alamat').val(result.alamat);
                    $('#year').val(result.thn_lahir);
                    $('#month').val(result.bln_lahir);
                    $('#day').val(result.tgl_lahir);
                    $('#no_ktp').val(result.no_ktp);
                    $('#jenis_kelamin').val(result.jenis_kelamin);
                    $('#status_anggota').val(result.status_anggota);
                    $('#kode_komoditas').val(result.kode_komoditas);
                    $('#kode_komoditas2').val(result.kode_komoditas2);
                    $('#kode_komoditas3').val(result.kode_komoditas3);
                    $('#volume').val(result.volume);
                    $('#volume2').val(result.volume2);
                    $('#volume3').val(result.volume3);
                    $('#lainnya').val(result.lainnya);
                    $('#luas_lahan_ternak_diusahakan').val(result.luas_lahan_ternak_diusahakan);
                    $('#luas_lahan_ternak_dimiliki').val(result.luas_lahan_ternak_dimiliki);
                    $('#titik_koordinat_lahan').val(result.titik_koordinat_lahan);
                    $('#kategori_petani_penggarap').val(result.kategori_petani_penggarap);


                    $('#modal-form').modal('show');
                    $("#btnSave").attr("id", "btnDoEdit");

                    $(document).delegate('#btnDoEdit', 'click', function() {
                     
                      
                        var id_anggota = $('#id_anggota').val();
                        var nama_anggota = $('#nama_anggota').val();
                        var nama_ktp = $('#ketua_gapoktan').val();
                        var alamat = $('#alamat').val();
                        var thn_lahir = $('#year').val();
                        var tgl_lahir = $('#day').val();
                        var bln_lahir = $('#bln_lahir').val();
                        var no_ktp = $('#no_ktp').val();
                        var jenis_kelamin = $('#jenis_kelamin').val();
                        var status_anggota = $('#status_anggota').val();
                        var kode_komoditas = $('#kode_komoditas').val();
                        var kode_komoditas2 = $('#kode_komoditas2').val();
                        var kode_komoditas3 = $('#kode_komoditas3').val();
                        var volume = $('#volume').val();
                        var volume2 = $('#volume2').val();
                        var volume3 = $('#volume3').val();
                        var lainnya = $('#lainnya').val();
                        var luas_lahan_ternak_dimiliki = $('#luas_lahan_ternak_dimiliki').val();
                        var luas_lahan_ternak_diusahakan = $('#luas_lahan_ternak_diusahakan').val();
                        var titik_koordinat_lahan = $('#titik_koordinat_lahan').val();
                        var kategori_petani_penggarap = $('#kategori_petani_penggarap').val();

                        let formData = new FormData();

                        formData.append('id_anggota', id_anggota);
                        formData.append('nama_anggota', nama_anggota);
                        formData.append('nama_ktp', nama_ktp);
                        formData.append('alamat', alamat);
                        formData.append('thn_lahir', thn_lahir);
                        formData.append('tgl_lahir', tgl_lahir);
                        formData.append('bln_lahir', bln_lahir);
                        formData.append('no_ktp', no_ktp);
                        formData.append('jenis_kelamin', jenis_kelamin);
                        formData.append('status_anggota', status_anggota);
                        formData.append('kode_komoditas', kode_komoditas);
                        formData.append('kode_komoditas2', kode_komoditas2);
                        formData.append('kode_komoditas3', kode_komoditas3);
                        formData.append('volume', volume);
                        formData.append('volume2', volume2);
                        formData.append('volume3', volume3);
                        formData.append('lainnya', lainnya);
                        formData.append('luas_lahan_ternak_dimiliki', luas_lahan_ternak_dimiliki);
                        formData.append('luas_lahan_ternak_diusahakan', luas_lahan_ternak_diusahakan);
                        formData.append('titik_koordinat_lahan', titik_koordinat_lahan);
                        formData.append('kategori_petani_penggarap', kategori_petani_penggarap);

                        $.ajax({
                            url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelompokTani/ListPoktanAnggota/update/' + id_poktan,
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