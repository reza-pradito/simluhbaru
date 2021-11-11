<?= $this->extend('layout/main_template') ?>

<?= $this->section('content') ?>
<?php $sessnama = session()->get('nama'); ?>
<?php
if (empty(session()->get('status_user')) || session()->get('status_user') == '2') {
    $kode = '00';
} elseif (session()->get('status_user') == '1') {
    $kode = session()->get('kodebakor');
} elseif (session()->get('status_user') == '200') {
    $kode = session()->get('kodebapel');
} elseif (session()->get('status_user') == '300') {
    $kode = session()->get('kodebpp');
}

$api = 'https://api.pertanian.go.id/api/simantap/dashboard/list?&api-key=f13914d292b53b10936b7a7d1d6f2406&kode=' . $kode;
$result = file_get_contents($api, false);
$json = json_decode($result, true);
$data = $json[0];
?>
<div class="container-fluid py-4">
    <div class="row">
        <!-- Page Heading -->
        <div class="row mt-3 mb-4">

            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah BPP</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        <?= number_format($data['jumbpp']); ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="far fa-building"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Poktan</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        <?= number_format($data['jumpoktan']); ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Gapoktan</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        <?= number_format($data['jumgapoktan']); ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Penyuluh PNS</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        <?= number_format($data['jumpenyuluhpns']); ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Penyuluh THL APBN</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        <?= number_format($data['jumpenyuluhthlapbn']); ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Penyuluh THL APBD</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        <?= number_format($data['jumpenyuluhthlapbd']); ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Penyuluh Swadaya</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        <?= number_format($data['jumpenyuluhswadaya']); ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Penyuluh Swasta</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        <?= number_format($data['jumpenyuluhswasta']); ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="row">

            <nav class="col-lg-12">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Profil</button>
                    <button class="nav-link" id="nav-penyuluh-tab" data-bs-toggle="tab" data-bs-target="#nav-penyuluh" type="button" role="tab" aria-controls="nav-penyuluh" aria-selected="false">Daftar Penyuluh</button>
                    <button class="nav-link" id="nav-lahancth-tab" data-bs-toggle="tab" data-bs-target="#nav-kegiatan" type="button" role="tab" aria-controls="nav-kegiatan" aria-selected="false">Kegiatan</button>
                    <!-- <button class="nav-link" id="nav-sarpras-tab" data-bs-toggle="tab" data-bs-target="#nav-sarpras" type="button" role="tab" aria-controls="nav-sarpras" aria-selected="false">Sarana & Prasarana</button>
                    <button class="nav-link" id="nav-pokom-tab" data-bs-toggle="tab" data-bs-target="#nav-pokom" type="button" role="tab" aria-controls="nav-pokom" aria-selected="false">Potensi Ekonomi</button>
                    <button class="nav-link" id="nav-powil-tab" data-bs-toggle="tab" data-bs-target="#nav-powil" type="button" role="tab" aria-controls="nav-powil" aria-selected="false">Potensi Wilayah</button> -->
                </div>
            </nav>
            <div class="tab-content " id="nav-tabContent">
                <div class="tab-pane  fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        <div class="col-lg-9 mb-lg-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">



                                        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?><i class="fas fa-edit" style="float: right;" data-bs-toggle="modal" data-bs-target="#modal-form" id="btn-edit" data-id_gapoktan="<?php
                                                                                                                                                                                                                            if (session()->get('status_user') == '200') {
                                                                                                                                                                                                                                echo $dt['id_gapoktan'];
                                                                                                                                                                                                                            } elseif (session()->get('status_user') == '300') {
                                                                                                                                                                                                                                echo $dt['id'];
                                                                                                                                                                                                                            }


                                                                                                                                                                                                                            ?>"></i></a></h1>

                                        <div class="col-lg-12">
                                            <?php if (session()->get('status_user') == '1') { ?>
                                                <table class="table">

                                                    <tbody>
                                                        <tr>
                                                            <td>Nama Kelembagaan</td>
                                                            <td>:</td>
                                                            <td><?= $dt['deskripsi_lembaga_lain']; ?> <?= $sessnama; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tanggal Pembentukan</td>
                                                            <td>:</td>
                                                            <td><?= $dt['tgl_berdiri'] . '-' . $dt['bln_berdiri'] . '-' . $dt['thn_berdiri']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Alamat</td>
                                                            <td>:</td>
                                                            <td> <?= $dt['alamat']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Provinsi</td>
                                                            <td>:</td>
                                                            <td><?= $namaprov; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>No Telepon/Fax</td>
                                                            <td>:</td>
                                                            <td><?= $dt['telp_kantor']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Alamat Email</td>
                                                            <td>:</td>
                                                            <td><?= $dt['email']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Alamat Website</td>
                                                            <td>:</td>
                                                            <td><?= $dt['website']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nama Pimpinan</td>
                                                            <td>:</td>
                                                            <td><?= $dt['ketua']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>No HP Pimpinan</td>
                                                            <td>:</td>
                                                            <td><?= $dt['telp_hp']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nama Koordinator PP</td>
                                                            <td>:</td>
                                                            <td><?= $dt['namakoord']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            <?php } elseif (session()->get('status_user') == '200') { ?>
                                                <table class="table">

                                                    <tbody>
                                                        <tr>
                                                            <td>Nama Kelembagaan</td>
                                                            <td>:</td>
                                                            <td><?= $dt['deskripsi_lembaga_lain']; ?> <?= $sessnama; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tanggal Pembentukan</td>
                                                            <td>:</td>
                                                            <td><?= $dt['tgl_berdiri'] . '-' . $dt['bln_berdiri'] . '-' . $dt['thn_berdiri']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Alamat</td>
                                                            <td>:</td>
                                                            <td> <?= $dt['alamat']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Provinsi</td>
                                                            <td>:</td>
                                                            <td><?= $namaprov; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>No Telepon/Fax</td>
                                                            <td>:</td>
                                                            <td><?= $dt['telp_kantor']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Alamat Email</td>
                                                            <td>:</td>
                                                            <td><?= $dt['email']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Alamat Website</td>
                                                            <td>:</td>
                                                            <td><?= $dt['website']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nama Pimpinan</td>
                                                            <td>:</td>
                                                            <td><?= $dt['ketua']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>No HP Pimpinan</td>
                                                            <td>:</td>
                                                            <td><?= $dt['telp_hp']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nama Koordinator PP</td>
                                                            <td>:</td>
                                                            <td><?php if ($dt['kode_koord_penyuluh'] == "1") {
                                                                    echo $dt['namapns'];
                                                                } elseif ($dt['kode_koord_penyuluh'] == "2") {
                                                                    echo $dt['namathl'];
                                                                } elseif ($dt['kode_koord_penyuluh'] == "3") {
                                                                    echo $dt['koord_lainnya_nama'];
                                                                } ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            <?php } elseif (session()->get('status_user') == '300') { ?>

                                                <table class="table">

                                                    <tbody>
                                                        <tr>
                                                            <td>Nama BPP</td>
                                                            <td>:</td>
                                                            <td><?= $dt['nama_bpp']; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Klasifikasi BPP</td>
                                                            <td>:</td>
                                                            <td><?= $dt['klasifikasi']; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Alamat</td>
                                                            <td>:</td>
                                                            <td> <?= $dt['alamat']; ?>, Kec: , Kab/Kota: , Provinsi: </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tanggal Pembentukan</td>
                                                            <td>:</td>
                                                            <td><?= $dt['tgl_berdiri'] . '-' . $dt['bln_berdiri'] . '-' . $dt['thn_berdiri']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Status Bangunan</td>
                                                            <td>:</td>
                                                            <td><?= $dt['status_gedung']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kondisi Bangunan</td>
                                                            <td>:</td>
                                                            <td><?= $dt['kondisi_bangunan']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nama Kepala/Koordinator</td>
                                                            <td>:</td>
                                                            <td><?= $dt['ketua']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nomor HP</td>
                                                            <td>:</td>
                                                            <td><?= $dt['telp_hp']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Email</td>
                                                            <td>:</td>
                                                            <td><?= $dt['email']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            <?php } ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>



            </div>

            <div class="tab-pane fade" id="nav-penyuluh" role="tabpanel" aria-labelledby="nav-penyuluh-tab">
                <div class="row">

                    <div class="col-lg-12 mb-lg-0 mb-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <h4 class="h3 mb-4 text-gray-800">Daftar Penyuluh Yang Bertugas di Provinsi</h4>
                                    <div class="col-sm-4">
                                        <h5><span>Jumlah Penyuluh PNS</span></h5>
                                    </div>
                                    <div class="col-sm-4"><span>(<?= $jum_pns; ?> Orang)</span></div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <table class="table align-items-center mb-0">
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    foreach ($datapns as $row => $pns) {
                                                    ?>
                                                        <tr>
                                                            <td class="align-middle text-center text-sm">
                                                                <p class="text-xs font-weight-bold mb-0"><?= $i++ ?></p>
                                                            </td>
                                                            <td class="align-middle text-sm">
                                                                <p class="text-xs font-weight-bold mb-0"><?= $pns['nama'] ?></p>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
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
    <?php echo view('layout/footer'); ?>

</div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script type="text/javascript">
    function loadNamaKoordinator() {
        if ($('#inlineRadio1').is(':checked')) {
            $("#divPNS").show();
        } else {
            $("#divPNS").hide();
        }
        if ($('#inlineRadio2').is(':checked')) {
            $("#divTHL").show();
        } else {
            $("#divTHL").hide();
        }
        if ($('#inlineRadio3').is(':checked')) {
            $("#divST").show();
        } else {
            $("#divST").hide();
        }
    }

    $(document).ready(function() {
        loadNamaKoordinator();

        $(document).delegate('#inlineRadio1', 'click', function() {
            loadNamaKoordinator();
        });
        $(document).delegate('#inlineRadio2', 'click', function() {
            loadNamaKoordinator();
        });
        $(document).delegate('#inlineRadio3', 'click', function() {
            loadNamaKoordinator();
        });
    });

    var min = 2010,
        max = 2030,
        select = document.getElementById('tahun');

    for (var i = min; i <= max; i++) {
        var opt = document.createElement('option');
        opt.value = i;
        opt.innerHTML = i;
        select.appendChild(opt);
    }

    select.value = new Date().getFullYear();

    $(document).ready(function() {
        $(document).delegate('#btn-edit', 'click', function() {
            //var myModal = new bootstrap.Modal(document.getElementById('modal-edit'), options);
            // alert(id);
            $.ajax({
                url: '<?= base_url() ?>/profil/Lembaga/detailKab/' + $(this).data('id_gapoktan'),
                type: 'GET',
                dataType: 'JSON',
                success: function(res) {
                    // $(".daftpos").html(res)
                    //console.log(res);
                    //res = JSON.parse(res);

                    $('#id_gapoktan').val(res[0].id_gapoktan);
                    $('#nama_bapel').val(res[0].nama_bapel);
                    $('#dasar_hukum').val(res[0].dasar_hukum);
                    $('#no_peraturan').val(res[0].no_peraturan);
                    $('#day').val(res[0].tgl_berdiri);
                    $('#month').val(res[0].bln_berdiri);
                    $('#year').val(res[0].thn_berdiri);
                    $('#alamat').val(res[0].alamat);
                    $('#deskripsi_lembaga_lain').val(res[0].deskripsi_lembaga_lain);
                    $('#telp_kantor').val(res[0].telp_kantor);
                    $('#email').val(res[0].email);
                    $('#website').val(res[0].website);
                    $('#ketua').val(res[0].ketua);
                    $('#koord').val(res[0].koord);
                    $('#telp_hp').val(res[0].telp_hp);
                    $('#telp_hp_koord').val(res[0].telp_hp_koord);
                    $('#email_koord').val(res[0].email_koord);
                    if (res[0].jenis_pertanian == "1") {
                        $("#jenis_pertanian").prop("checked", true);
                    } else {
                        $("#jenis_pertanian").prop("checked", false);
                    }
                    if (res[0].jenis_tp == "2") {
                        $("#jenis_tp").prop("checked", true);
                    } else {
                        $("#jenis_tp").prop("checked", false);
                    }
                    if (res[0].jenis_hor == "3") {
                        $("#jenis_hor").prop("checked", true);
                    } else {
                        $("#jenis_hor").prop("checked", false);
                    }
                    if (res[0].jenis_bun == "4") {
                        $("#jenis_bun").prop("checked", true);
                    } else {
                        $("#jenis_bun").prop("checked", false);
                    }
                    if (res[0].jenis_nak == "5") {
                        $("#jenis_nak").prop("checked", true);
                    } else {
                        $("#jenis_nak").prop("checked", false);
                    }
                    if (res[0].jenis_ketahanan_pangan == "6") {
                        $("#jenis_ketahanan_pangan").prop("checked", true);
                    } else {
                        $("#jenis_ketahanan_pangan").prop("checked", false);
                    }
                    if (res[0].jenis_pkh == "7") {
                        $("#jenis_pkh").prop("checked", true);
                    } else {
                        $("#jenis_pkh").prop("checked", false);
                    }
                    if (res[0].jenis_pangan == "8") {
                        $("#jenis_pangan").prop("checked", true);
                    } else {
                        $("#jenis_pangan").prop("checked", false);
                    }
                    $('#bidang_luh').val(res[0].bidang_luh);
                    $('#nama_kabid').val(res[0].nama_kabid);
                    $('#hp_kabid').val(res[0].hp_kabid);
                    $('#seksi_luh').val(res[0].seksi_luh);
                    $('#nama_kasie').val(res[0].nama_kasie);
                    $('#hp_kasie').val(res[0].hp_kasie);
                    $('#uptd_luh').val(res[0].uptd_luh);
                    $('#nama_kauptd').val(res[0].nama_kauptd);
                    $('#hp_kauptd').val(res[0].hp_kauptd);
                    $('#nama_koord_penyuluh').val(res[0].nama_koord_penyuluh);
                    $('#nama_koord_penyuluh_thl').val(res[0].nama_koord_penyuluh_thl);
                    $('#koord_lainya_nip').val(res[0].koord_lainya_nip);
                    $('#koord_lainya_nama').val(res[0].koord_lainya_nama);
                    $('#kode_koord_penyuluh').val(res[0].kode_koord_penyuluh);
                    $("#btnSave").attr("id", "btnDoEdit");

                    $(document).delegate('#btnDoEdit', 'click', function() {
                        console.log('ok');

                        var id_gapoktan = $('#id_gapoktan').val();
                        var deskripsi_lembaga_lain = $('#deskripsi_lembaga_lain').val();
                        var nama_bapel = $('#nama_bapel').val();
                        var dasar_hukum = $('#dasar_hukum').val();
                        var no_peraturan = $('#no_peraturan').val();
                        var tgl_berdiri = $('#day').val();
                        var bln_berdiri = $('#month').val();
                        var thn_berdiri = $('#year').val();
                        var alamat = $('#alamat').val();
                        var telp_kantor = $('#telp_kantor').val();
                        var email = $('#email').val();
                        var website = $('#website').val();
                        var ketua = $('#ketua').val();
                        var telp_hp = $('#telp_hp').val();
                        var koord = $('#koord').val();

                        var telp_hp_koord = $('#telp_hp_koord').val();
                        var email_koord = $('#email_koord').val();
                        var jenis_pertanian = $(".jenis_pertanian")[0].checked ? $(".jenis_pertanian").val() : "";
                        var jenis_tp = $(".jenis_tp")[0].checked ? $(".jenis_tp").val() : "";
                        var jenis_hor = $(".jenis_hor")[0].checked ? $(".jenis_hor").val() : "";
                        var jenis_bun = $(".jenis_bun")[0].checked ? $(".jenis_bun").val() : "";
                        var jenis_nak = $(".jenis_nak")[0].checked ? $(".jenis_nak").val() : "";
                        var jenis_pkh = $(".jenis_pkh")[0].checked ? $(".jenis_pkh").val() : "";
                        var jenis_ketahanan_pangan = $(".jenis_ketahanan_pangan")[0].checked ? $(".jenis_ketahanan_pangan").val() : "";
                        var jenis_pangan = $(".jenis_pangan")[0].checked ? $(".jenis_pangan").val() : "";
                        var bidang_luh = $('#bidang_luh').val();
                        var nama_kabid = $('#nama_kabid').val();
                        var hp_kabid = $('#hp_kabid').val();
                        var seksi_luh = $('#seksi_luh').val();
                        var nama_kasie = $('#nama_kasie').val();
                        var hp_kasie = $('#hp_kasie').val();
                        var uptd_luh = $('#uptd_luh').val();
                        var nama_kauptd = $('#nama_kauptd').val();
                        var hp_kauptd = $('#hp_kauptd').val();
                        var nama_koord_penyuluh = $('#nama_koord_penyuluh').val();
                        var nama_koord_penyuluh_thl = $('#nama_koord_penyuluh_thl').val();
                        var koord_lainya_nip = $('#koord_lainya_nip').val();
                        var koord_lainya_nama = $('#koord_lainya_nama').val();
                        var kode_koord_penyuluh = $('.pen:checked').val();

                        let formData = new FormData();
                        formData.append('id_gapoktan', id_gapoktan);
                        formData.append('nama_bapel', nama_bapel);
                        formData.append('deskripsi_lembaga_lain', deskripsi_lembaga_lain);
                        formData.append('dasar_hukum', dasar_hukum);
                        formData.append('no_peraturan', no_peraturan);
                        formData.append('tgl_berdiri', tgl_berdiri);
                        formData.append('bln_berdiri', bln_berdiri);
                        formData.append('thn_berdiri', thn_berdiri);
                        formData.append('alamat', alamat);
                        formData.append('telp_kantor', telp_kantor);
                        formData.append('email', email);
                        formData.append('website', website);
                        formData.append('ketua', ketua);
                        formData.append('koord', koord);
                        formData.append('telp_hp', telp_hp);
                        formData.append('telp_hp_koord', telp_hp_koord);
                        formData.append('email_koord', email_koord);
                        formData.append('jenis_pertanian', jenis_pertanian);
                        formData.append('jenis_tp', jenis_tp);
                        formData.append('jenis_hor', jenis_hor);
                        formData.append('jenis_bun', jenis_bun);
                        formData.append('jenis_nak', jenis_nak);
                        formData.append('jenis_pkh', jenis_pkh);
                        formData.append('jenis_ketahanan_pangan', jenis_ketahanan_pangan);
                        formData.append('jenis_pangan', jenis_pangan);
                        formData.append('bidang_luh', bidang_luh);
                        formData.append('nama_kabid', nama_kabid);
                        formData.append('hp_kabid', hp_kabid);
                        formData.append('seksi_luh', seksi_luh);
                        formData.append('nama_kasie', nama_kasie);
                        formData.append('hp_kasie', hp_kasie);
                        formData.append('uptd_luh', uptd_luh);
                        formData.append('nama_kauptd', nama_kauptd);
                        formData.append('hp_kauptd', hp_kauptd);
                        formData.append('nama_koord_penyuluh', nama_koord_penyuluh);
                        formData.append('nama_koord_penyuluh_thl', nama_koord_penyuluh_thl);
                        formData.append('koord_lainya_nip', koord_lainya_nip);
                        formData.append('koord_lainya_nama', koord_lainya_nama);
                        formData.append('kode_koord_penyuluh', kode_koord_penyuluh);

                        $.ajax({
                            url: '<?= base_url() ?>/profil/Lembaga/update/' + id_gapoktan,
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


        $(document).delegate('#btnSimpan', 'click', function() {
            var id_bapel = $('#id_bapel').val();
            var tahun = $('#tahun').val();
            var fasilitasi = $('#fasilitasi').val();
            var kegiatan = $('#kegiatan').val();

            $.ajax({
                url: '<?= base_url() ?>/profil/Lembaga/save/',
                type: 'POST',
                data: {
                    'id_bapel': id_bapel,
                    'tahun': tahun,
                    'fasilitasi': fasilitasi,
                    'kegiatan': kegiatan,
                },
                success: function(result) {
                    result = JSON.parse(result);
                    if (result.value) {
                        Swal.fire({
                            title: 'Sukses',
                            text: "Sukses tambah data",
                            type: 'success',
                        }).then((result) => {

                            if (result.value) {
                                location.reload();
                            }
                        });
                    } else {
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


        $(document).delegate('#btn-edit-fas', 'click', function() {
            //var myModal = new bootstrap.Modal(document.getElementById('modal-edit'), options);
            // alert(id);
            $.ajax({
                url: '<?= base_url() ?>/profil/Lembaga/fasilitas/' + $(this).data('id'),
                type: 'GET',
                dataType: 'JSON',
                success: function(res) {
                    // $(".daftpos").html(res)
                    //console.log(res);
                    //res = JSON.parse(res);

                    $('#id').val(res[0].id);
                    $('#id_bapel').val(res[0].id_bapel);
                    $('#fasilitasi').val(res[0].fasilitasi);
                    $('#kegiatan').val(res[0].kegiatan);
                    $('#tahun').val(res[0].tahun);
                    $('#judul-form').text('Edit Data');
                    $('#modal-fk').modal("show");
                    $("#btnSimpan").attr("id", "btnUbah");

                    $(document).delegate('#btnUbah', 'click', function() {
                        console.log('ok');

                        var id = $('#id').val();
                        var id_bapel = $('#id_bapel').val();
                        var fasilitasi = $('#fasilitasi').val();
                        var kegiatan = $('#kegiatan').val();
                        var tahun = $('#tahun').val();

                        let formData = new FormData();
                        formData.append('id', id);
                        formData.append('fasilitasi', fasilitasi);
                        formData.append('id_bapel', id_bapel);
                        formData.append('kegiatan', kegiatan);
                        formData.append('tahun', tahun);
                        $.ajax({
                            url: '<?= base_url() ?>/profil/Lembaga/updatefas/' + id,
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

        $(document).delegate('#btn-hapus', 'click', function() {
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
                    var id = $(this).data('id');

                    $.ajax({
                        url: '<?= base_url() ?>/profil/Lembaga/delete/' + id,
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
    });
</script>




<script type="text/javascript">
    function loadingproses() {
        $('.backDrop').show();
        $('.backDrop_content').fadeIn('slow');
    }

    function loadingproses_close() {
        $('.backDrop').hide();
        $('.backDrop_content').fadeOut('slow');
    }

    $('#prov').on('change', function() {
        $('#kec').html('');
        $('#desa').html('');
        const id = $('#prov').val();
        var kdprov = id.substring(0, 2);

        $.ajax({
            url: "<?= base_url() ?>/master/wilayah/showKab/" + kdprov + "",
            success: function(response) {
                console.log(response);
                $("#kab").html(response);
            },
            dataType: "html"
        });
        return false;
    });


    $('#kab').on('change', function() {
        $('#desa').html('');
        const id = $('#kab').val();
        var kdkab = id.substring(0, 4);

        $.ajax({
            url: "<?= base_url() ?>/master/wilayah/showKec/" + kdkab + "",
            success: function(response) {
                console.log(response);
                $("#kec").html(response);
            },
            dataType: "html"
        });
        return false;
    });

    $('#kec').on('change', function() {

        const id = $('#kec').val();
        var kdkec = id.substring(0, 6);

        $.ajax({
            url: "<?= base_url() ?>/master/wilayah/showDesa/" + kdkec + "",
            success: function(response) {
                $("#desa").html(response);
            },
            dataType: "html"
        });
        return false;
    });
</script>

<?= $this->endSection() ?>