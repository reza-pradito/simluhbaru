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
                                        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?><i class="fas fa-edit" style="float: right;" data-bs-toggle="modal" data-bs-target="#modal-form"></i></a></h1>
                                        <div class="col-lg-12">

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
                                                        <td><?= $dt['kode_prop']; ?></td>
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
                                                        <td><?= $dt['hp_kabid']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Koordinator PP</td>
                                                        <td>:</td>

                                                        <td><?= $dt['nama_koord_penyuluh']; ?></td>

                                                    </tr>

                                                </tbody>

                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 mb-lg-0 mb-4 text-center">
                            <div class="card">
                                <div class="card-body p-3 ">
                                    <img src="<?= base_url('assets/img/logo.png'); ?>" width="150px" class="img-thumbnail" alt="profil">
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
                                        <h1 class="h3 mb-4 text-gray-800">Daftar Penyuluh yang bertugas di Kab/Kota</h1>
                                        <div class="col-lg-8">

                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td>Penyuluh PNS</td>
                                                        <td>:</td>
                                                        <td>dadasas</td>
                                                    </tr>
                                                    <tr>
                                                        <td>THL-TBPP (APBN)</td>
                                                        <td>:</td>
                                                        <td>dadasas</td>
                                                    </tr>
                                                    <tr>
                                                        <td>THL-TB PP (APBD)</td>
                                                        <td>:</td>
                                                        <td>dadasas</td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>



                    </div>
                </div>

                <div class="tab-pane fade" id="nav-kegiatan" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        <div class="col-lg-9 mb-lg-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <h1 class="h3 mb-4 text-gray-800">Kegiatan yang dilakukan <a href="/editkegiatan"><i class="fas fa-edit" style="float: right;"></i></a></h1>
                                        <div class="col-lg-12">

                                            <!-- <table class="table">

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
                                                        <td><?= $dt['kode_prop']; ?></td>
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
                                                        <td><?= $dt['nama_kabid']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>No HP Pimpinan</td>
                                                        <td>:</td>
                                                        <td><?= $dt['hp_kabid']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Koordinator PP</td>
                                                        <td>:</td>
                                                        <td><?= $dt['nama_koord_penyuluh']; ?></td>
                                                    </tr>

                                                </tbody>

                                            </table> -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-lahancth" role="tabpanel" aria-labelledby="nav-lahancth-tab">
                    <div class="row">
                        <div class="col-lg-12 mb-lg-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <a href="#">
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#modal-lahancth" class="btn bg-gradient-primary">+ Tambah Data</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-sarpras" role="tabpanel" aria-labelledby="nav-sarpras-tab">
                    <div class="row">
                        <div class="col-lg-12 mb-lg-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <a href="#">
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#modal-sarpras" class="btn bg-gradient-primary">+ Tambah Data</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-pokom" role="tabpanel" aria-labelledby="nav-pokom-tab">
                    <div class="row">
                        <div class="col-lg-12 mb-lg-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <a href="#">
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#modal-sarpras" class="btn bg-gradient-primary">+ Tambah Data</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-powil" role="tabpanel" aria-labelledby="nav-powil-tab">
                    <div class="row">
                        <div class="col-lg-12 mb-lg-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <a href="#">
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#modal-lahancth" class="btn bg-gradient-primary">+ Tambah Data</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>


        <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-left">
                                <h4 class="font-weight-bolder text-warning text-gradient" id="judul_form">Tambah Data</h4>
                            </div>
                            <div class="card-body">

                                <form role="form text-left" action="<?= base_url('KelembagaanPenyuluhan/Desa/desa/save'); ?>">
                                    <div class="row">
                                        <div class="col">
                                            <input type="hidden" name="id_gapoktan" id="id_gapoktan">
                                            <label for="prov">Propinsi</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="prov" value=" " disabled>
                                            </div>
                                            <label for="prov">Kabupaten</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="kab" value=" " disabled>
                                            </div>
                                            <label for="kode_desa">Jenis Kelembagaan</label>
                                            <div class="input-group mb-3">
                                                <select name="kode_desa" id="kode_desa" class="form-control input-lg">
                                                    <option value=""></option>
                                                    <OPTION value="31">Badan<BR>
                                                    <OPTION value="32">Dinas<BR>
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <label>Nomenklatur : </label>
                                                <input type="text" class="form-control" id="deskripsi_lembaga_lain" placeholder="deskripsi_lembaga_lain" name="deskripsi_lembaga_lain"><br>
                                                <label>Pilih Sesuai nomenklatur :</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="ahli_tp" name="ahli_tp" value="1">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Pertanian
                                                    </label>
                                                    <input class="form-check-input" type="checkbox" id="ahli_tp" name="ahli_tp" value="1">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Tanaman Pangan
                                                    </label>
                                                    <input class="form-check-input" type="checkbox" id="ahli_tp" name="ahli_tp" value="1">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Hortikultura
                                                    </label>
                                                    <input class="form-check-input" type="checkbox" id="ahli_tp" name="ahli_tp" value="1">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Perkenbunan
                                                    </label>
                                                    <input class="form-check-input" type="checkbox" id="ahli_tp" name="ahli_tp" value="1">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Peternakan
                                                    </label>
                                                    <input class="form-check-input" type="checkbox" id="ahli_tp" name="ahli_tp" value="1">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Kesehatan Pangan
                                                    </label>
                                                    <input class="form-check-input" type="checkbox" id="ahli_tp" name="ahli_tp" value="1">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Kesehatan Hewan
                                                    </label>
                                                    <input class="form-check-input" type="checkbox" id="ahli_tp" name="ahli_tp" value="1">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Pangan
                                                    </label>
                                                </div>
                                            </div>
                                            <label for="alamat">Dasar Hukum Pembentukan</label>
                                            <select name="kode_desa" id="kode_desa" class="form-control input-lg">
                                                <option value="perda">Perda</option>
                                            </select>
                                            <label for="ketua">No Peraturan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="ketua" placeholder="ketua" name="ketua">
                                            </div>
                                            <label for="ketua">Ketua</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="ketua" placeholder="ketua" name="ketua">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="ketua">Tanggal Pembentukan</label>
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
                                            <label for="bendahara">Nama Pimpinan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="bendahara" placeholder="bendahara" name="bendahara">
                                                <label>No.HP</label>
                                                <input type="text" class="form-control" id="bendahara" placeholder="bendahara" name="bendahara">
                                            </div>
                                            <label> Nama Koordinator Penyuluh</label>
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
                                                </div><br>
                                                <label>PNS:</label>
                                                <select name="kode_desa" id="kode_desa" class="form-control input-lg">
                                                    <option value=""></option>
                                                    <OPTION value="31">PNS<BR>
                                                    <OPTION value="32">THL<BR>
                                                    <OPTION value="32">THL<BR>
                                                </select>
                                            </div>
                                            <label for="tahun_beridiri">tahun Berdiri</label>
                                            <div class="input-group mb-3">
                                                <select name="tahun_berdiri" id="year" class="form-control input-lg">
                                                    <option value="">Tahun</option>
                                                </select>
                                            </div>
                                            <label for="alamat">Alamat Kantor</label>
                                            <div class="input-group mb-3">
                                                <textarea type="text" class="form-control" id="alamat" placeholder="alamat" name="alamat"></textarea>
                                            </div>
                                            <label for="jum_anggota">Jumlah Anggota</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="jum_anggota" placeholder="jumlah anggota" name="jum_anggota">
                                            </div>
                                            <label for="penyuluh_swadaya">Penyuluh Swadaya</label>
                                            <div class="input-group mb-3">
                                                <select name="penyuluh_swadaya" id="penyuluh_swadaya" class="form-control input-lg">
                                                    <option value="">Penyuluh Swadaya</option>

                                                </select>
                                            </div>
                                            <input type="hidden" name="kode_kab" id="kode_kab" value="<?= $kode; ?>">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" id="btnSave" class="btn bg-gradient-primary">Simpan Data</button>
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
<?php echo view('layout/footer'); ?>

</div>
</div>

<?= $this->endSection() ?>