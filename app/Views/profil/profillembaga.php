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
                    <button class="nav-link" id="nav-penyuluh-tab" data-bs-toggle="tab" data-bs-target="#nav-penyuluh" type="button" role="tab" aria-controls="nav-penyuluh" aria-selected="false">Wilayah Kerja</button>
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
                                        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> <a href="/editbapel"><i class="fas fa-edit" style="float: right;"></i></a></h1>
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
                                        <h1 class="h3 mb-4 text-gray-800">Wilayah Kerja</h1>
                                        <div class="col-lg-8">



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



    </div>

</div>
<?php echo view('layout/footer'); ?>

</div>
</div>

<?= $this->endSection() ?>