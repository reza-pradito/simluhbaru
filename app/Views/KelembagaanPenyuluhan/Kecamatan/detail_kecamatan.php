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

$api = 'https://api.pertanian.go.id/api/simantap/dashboard/list?&api-key=f13914d292b53b10936b7a7d1d6f2406&kode=' . $kode_kec;
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
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Penyuluh Swatahuna</p>
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
                    <button class="nav-link" id="nav-wilkec-tab" data-bs-toggle="tab" data-bs-target="#nav-wilkec" type="button" role="tab" aria-controls="nav-wilkec" aria-selected="false">Wilayah Kecamatan</button>
                    <button class="nav-link" id="nav-klas-tab" data-bs-toggle="tab" data-bs-target="#nav-klas" type="button" role="tab" aria-controls="nav-klas" aria-selected="false">Klasifikasi BPP</button>
                    <button class="nav-link" id="nav-kegiatan-tab" data-bs-toggle="tab" data-bs-target="#nav-kegiatan" type="button" role="tab" aria-controls="nav-kegiatan" aria-selected="false">Kegiatan</button>
                    <button class="nav-link" id="nav-lahan-tab" data-bs-toggle="tab" data-bs-target="#nav-lahan" type="button" role="tab" aria-controls="nav-lahan" aria-selected="false">Lahan</button>
                    <button class="nav-link" id="nav-penghargaan-tab" data-bs-toggle="tab" data-bs-target="#nav-penghargaan" type="button" role="tab" aria-controls="nav-penghargaan" aria-selected="false">Penghargaan</button>
                    <button class="nav-link" id="nav-dana-tab" data-bs-toggle="tab" data-bs-target="#nav-dana" type="button" role="tab" aria-controls="nav-dana" aria-selected="false">Dana Alokasi Khusus</button>
                    <button class="nav-link" id="nav-powil-tab" data-bs-toggle="tab" data-bs-target="#nav-powil" type="button" role="tab" aria-controls="nav-powil" aria-selected="false">Potensi Wilayah</button>
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
                                        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?><i class="fas fa-edit" style="float: right;" data-bs-toggle="modal" data-bs-target="#modal-form" id="btn-edit" data-id="<?= $dt['id']; ?>"></i></a></h1>
                                        <div class="col-lg-12">

                                            <table class="table">

                                                <tbody>
                                                    <input type="hidden" name="id" value="<?= $dt['id']; ?>">
                                                    <tr>
                                                        <td>Nama Kelembagaan</td>
                                                        <td>:</td>
                                                        <td><?= $dt['nama_bpp']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Klasifikasi BP3K</td>
                                                        <td>:</td>
                                                        <td><?= $dt['klasifikasi']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat</td>
                                                        <td>:</td>
                                                        <td> <?= $dt['alamat']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kecamatan</td>
                                                        <td>:</td>
                                                        <td><?= $dt['deskripsi']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kabupaten/Kota</td>
                                                        <td>:</td>
                                                        <td><?= $namakab; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Provinsi</td>
                                                        <td>:</td>
                                                        <td><?= $namaprov; ?></td>
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
                                                        <td>Nama Kepala / Koordinator</td>
                                                        <td>:</td>
                                                        <td><?= $dt['ketua']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>No HP Pimpinan</td>
                                                        <td>:</td>
                                                        <td><?= $dt['telp_hp']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td>:</td>
                                                        <td><?= $dt['email']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kecamatan wilayah Kerja</td>
                                                        <td>:</td>
                                                        <td>- <?= $dt['deskripsi'];  ?></td>
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
                                    <img src="<?= base_url('assets/img/' . $dt['foto']) ?>" width="150px" class="img-thumbnail" alt="profil">
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

                <div class="tab-pane fade" id="nav-wilkec" role="tabpanel" aria-labelledby="nav-wilkec-tab">
                    <div class="row">
                        <div class="col-lg-12 mb-lg-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <h1 class="h3 mb-4 text-gray-800">Wilayah Kecamatan<i class="fas fa-edit" style="float: right;" data-bs-toggle="modal" data-bs-target="#modal-wilkec" id="btn-edit" data-id="<?= $dt['id']; ?>"></i></a></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-klas" role="tabpanel" aria-labelledby="nav-klas-tab">
                    <div class="row">
                        <div class="col-lg-12 mb-lg-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <h1 class="h3 mb-4 text-gray-800">Klasifikasi BPP<i class="fas fa-edit" style="float: right;" data-bs-toggle="modal" data-bs-target="#modal-form" id="btn-edit" data-id="<?= $dt['id']; ?>"></i></a></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-kegiatan" role="tabpanel" aria-labelledby="nav-kegiatan-tab">
                    <div class="row">
                        <div class="col-lg-12 mb-lg-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <h1 class="h3 mb-4 text-gray-800">Kegiatan yang dilaksanakan oleh BPP<i class="fas fa-edit" style="float: right;" data-bs-toggle="modal" data-bs-target="#modal-form" id="btn-edit" data-id="<?= $dt['id']; ?>"></i></a></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-lahan" role="tabpanel" aria-labelledby="nav-lahan-tab">
                    <div class="row">
                        <div class="col-lg-12 mb-lg-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <h1 class="h3 mb-4 text-gray-800">Lahan Percontohan<i class="fas fa-edit" style="float: right;" data-bs-toggle="modal" data-bs-target="#modal-form" id="btn-edit" data-id="<?= $dt['id']; ?>"></i></a></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-penghargaan" role="tabpanel" aria-labelledby="nav-penghargaan-tab">
                    <div class="row">
                        <div class="col-lg-12 mb-lg-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <h1 class="h3 mb-4 text-gray-800">Penghargaan yang pernah diterima<i class="fas fa-edit" style="float: right;" data-bs-toggle="modal" data-bs-target="#modal-form" id="btn-edit" data-id="<?= $dt['id']; ?>"></i></a></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-dana" role="tabpanel" aria-labelledby="nav-dana-tab">
                    <div class="row">
                        <div class="col-lg-12 mb-lg-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <h1 class="h3 mb-4 text-gray-800">Mendapatkan Dana Alokasi Khusus (DAK)<i class="fas fa-edit" style="float: right;" data-bs-toggle="modal" data-bs-target="#modal-form" id="btn-edit" data-id="<?= $dt['id']; ?>"></i></a></h1>
                                    </div>
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
                                    <div class="row">
                                        <h1 class="h3 mb-4 text-gray-800">Potensi Wilayah<i class="fas fa-edit" style="float: right;" data-bs-toggle="modal" data-bs-target="#modal-form" id="btn-edit" data-id="<?= $dt['id']; ?>"></i></a></h1>
                                    </div>
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
                                <h4 class="font-weight-bolder text-warning text-gradient">Edit Data</h4>
                            </div>
                            <div class="card-body">
                                <form role="form text-left" action="<?= base_url('KelembagaanPenyuluhan/Kecamatan/Kecamatan/edit'); ?>" method="post" enctype="multipart/form-data">
                                    <? csrf_field(); ?>
                                    <div class=" row">
                                        <div class="col">
                                            <input type="hidden" name="kode_prop" id="kode_prop" value="<?= $kode_prop; ?>">
                                            <input type="hidden" name="satminkal" id="satminkal" value="<?= $kode_kab; ?>">
                                            <input type="hidden" name="id" value="<?= $dt['id']; ?>">
                                            <input type="hidden" name="fotolama" value="<?= $dt['foto']; ?>">
                                            <label>Upload Foto BPP</label>
                                            <div class="input-group mb-3">
                                                <div class="col-lg-4">
                                                    <img src="<?= base_url('/assets/img/' . $dt['foto']); ?>" class="img-thumbnail img-preview">
                                                </div>
                                                <input type="file" class="custom-file-input" id="foto" name="foto" onchange="previewImg()">
                                                <label class="custom-file-label" for="foto"><?= $dt['foto']; ?></label>
                                            </div>
                                            <label>Bentuk Kelembagaan</label>
                                            <div class="input-group mb-3">
                                                <select class="form-select" name="bentuk_lembaga" id="bentuk_lembaga" aria-label="Default select example">
                                                    <option selected value="<?= $dt['bentuk_lembaga']; ?>"><?php if ($dt['bentuk_lembaga'] == "20") {
                                                                                                                echo "Balai Penyuluhan Pertanian";
                                                                                                            } elseif ($dt['bentuk_lembaga'] == "40") {
                                                                                                                echo "UPTD";
                                                                                                            } ?></option>
                                                    <option value="20">Balai Penyuluhan Pertanian</option>
                                                    <option value="40">UPTD</option>
                                                </select>
                                            </div>
                                            <label>Nama Kelembagaan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Nama Kelembagaan" name="nama_bpp" id="nama_bpp" value="<?= $dt['nama_bpp']; ?>">
                                            </div>
                                            <label>Alamat Kantor</label>
                                            <div class="input-group mb-3">
                                                <textarea class="form-control" placeholder="Alamat Kantor" id="alamat" name="alamat"><?= $dt['alamat']; ?></textarea>
                                            </div>
                                            <label>Kecamatan (lokasi BPP)</label>
                                            <div class="input-group mb-3">
                                                <select name="kecamatan" id="kecamatan" class="form-control input-lg">
                                                    <option value="<?= $dt['kecamatan']; ?>">Kec. <?= $dt['deskripsi']; ?></option>
                                                    <?php
                                                    foreach ($kec as $row) {
                                                        echo '<option value="' . $row["id_daerah"] . '">' . 'Kec. ' . $row["deskripsi"] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <label for="ketua">Tanggal Pembentukan</label>
                                            <div class="input-group mb-3">
                                                <select id="day" name="tgl_berdiri" class="form-select tgl_berdiri" aria-label="Default select example">
                                                    <option value="<?= $dt['tgl_berdiri']; ?>"><?= $dt['tgl_berdiri']; ?></option>
                                                </select>
                                                <select id="month" name="bln_berdiri" class="form-select bln_berdiri" aria-label="Default select example">
                                                    <option value="<?= $dt['bln_berdiri']; ?>"><?php
                                                                                                if ($dt['bln_berdiri'] == "1") {
                                                                                                    echo "Januari";
                                                                                                } elseif ($dt['bln_berdiri'] == "2") {
                                                                                                    echo "Pebruari";
                                                                                                } elseif ($dt['bln_berdiri'] == "3") {
                                                                                                    echo "Maret";
                                                                                                } elseif ($dt['bln_berdiri'] == "4") {
                                                                                                    echo "April";
                                                                                                } elseif ($dt['bln_berdiri'] == "5") {
                                                                                                    echo "Mei";
                                                                                                } elseif ($dt['bln_berdiri'] == "6") {
                                                                                                    echo "Juni";
                                                                                                } elseif ($dt['bln_berdiri'] == "7") {
                                                                                                    echo "Juli";
                                                                                                } elseif ($dt['bln_berdiri'] == "8") {
                                                                                                    echo "Agustus";
                                                                                                } elseif ($dt['bln_berdiri'] == "9") {
                                                                                                    echo "September";
                                                                                                } elseif ($dt['bln_berdiri'] == "10") {
                                                                                                    echo "Oktober";
                                                                                                } elseif ($dt['bln_berdiri'] == "11") {
                                                                                                    echo "Nopember";
                                                                                                } elseif ($dt['bln_berdiri'] == "12") {
                                                                                                    echo "Desember";
                                                                                                }
                                                                                                ?></option>
                                                </select>
                                                <select id="year" name="thn_berdiri" class="form-select thn_berdiri" aria-label="Default select example">
                                                    <option value="<?= $dt['thn_berdiri']; ?>"><?= $dt['thn_berdiri']; ?></option>
                                                </select>
                                            </div>
                                            <label>Status Gedung</label>
                                            <div class="input-group mb-3">
                                                <select class="form-select" name="status_gedung" id="status_gedung" aria-label="Default select example">
                                                    <option selected value="<?= $dt['status_gedung']; ?>"><?= $dt['status_gedung']; ?></option>
                                                    <option value="milik sendiri">Milik sendiri</option>
                                                    <option value="sewa/pinjam">Sewa/Pinjam</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label>kondisi Bangunan</label>
                                            <div class="input-group mb-3">
                                                <select class="form-select" name="kondisi_bangunan" id="kondisi_bangunan" aria-label="Default select example">
                                                    <option selected value="<?= $dt['kondisi_bangunan']; ?>"><?= $dt['kondisi_bangunan']; ?></option>
                                                    <option value="baik">Baik</option>
                                                    <option value="rusak">Rusak</option>
                                                </select>
                                            </div>
                                            <label>GPS Point</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="koord_lu_ls" id="koord_lu_ls" value="<?= $dt['koord_lu_ls']; ?>">
                                                <select class="form-select" name="lu_ls" id="lu_ls" aria-label="Default select example">
                                                    <option selected value="<?= $dt['lu_ls']; ?>"><?= $dt['lu_ls']; ?></option>
                                                    <option value="LU">LU</option>
                                                    <option value="LS">LS</option>
                                                </select>
                                                <input type="text" class="form-control" name="koord_bt" id="koord_bt" value="<?= $dt['koord_bt']; ?>">
                                                &nbsp; &nbsp;<label style="margin-top: 10px;">BT</label>&nbsp; &nbsp;
                                            </div>
                                            <label>No.Telepon/Fax</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="No. Telepon" name="telp_bpp" id="telp_bpp" value="<?= $dt['telp_bpp']; ?>">
                                            </div>
                                            <label>Alamat Email</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Email" name="email" id="email" value="<?= $dt['email']; ?>">
                                            </div>
                                            <label>Alamat Website/Blog</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Website" name="website" id="website" value="<?= $dt['website']; ?>">
                                            </div>
                                            <label>Nama Pimpinan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Nama" name="ketua" id="ketua" value="<?= $dt['ketua']; ?>">
                                                &nbsp; &nbsp;<label style="margin-top: 10px;">No. HP</label>&nbsp; &nbsp;
                                                <input type="text" class="form-control" name="telp_hp" id="telp_hp" placeholder="No. HP" value="<?= $dt['telp_hp']; ?>">
                                            </div>
                                            <label>Koordinator Penyuluh</label>
                                            <div class="input-group mb-3">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input pen" type="radio" name="kode_koord_penyuluh" id="inlineRadio1" value="1" <?php echo ($dt["kode_koord_penyuluh"] == "1" ? 'checked="checked"' : '') ?>>
                                                    <label class="form-check-label" for="inlineRadio1">PNS</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input pen" type="radio" name="kode_koord_penyuluh" id="inlineRadio2" value="2" <?php echo ($dt["kode_koord_penyuluh"] == "2" ? 'checked="checked"' : '') ?>>
                                                    <label class="form-check-label" for="inlineRadio2">THL</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input pen" type="radio" name="kode_koord_penyuluh" id="inlineRadio3" value="3" <?php echo ($dt["kode_koord_penyuluh"] == "3" ? 'checked="checked"' : '') ?>>
                                                    <label class="form-check-label" for="inlineRadio2">Struktural</label>
                                                </div><br>
                                            </div>
                                            <div class="input-group mb-3" id="divPNS">
                                                <label style="margin-top: 10px;">PNS:</label>
                                                <select name="nama_koord_penyuluh" id="nama_koord_penyuluh" class="form-control input-lg" style="margin-left: 15px;">
                                                    <option value="">-</option>
                                                    <?php
                                                    foreach ($penyuluhPNS as $row) {
                                                        echo '<option value="' . $row["nip"] . '">' . $row["nip"] . ' - ' . $row["nama"] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="input-group mb-3" id="divTHL">
                                                <label>THL:</label>
                                                <select name="nama_koord_penyuluh_thl" id="nama_koord_penyuluh_thl" class="form-control input-lg" style="margin-left: 5px;">
                                                    <option value="">-</option>
                                                    <?php
                                                    foreach ($penyuluhTHL as $row2) {
                                                        echo '<option value="' . $row2["noktp"] . '">' . $row2["noktp"] . ' - ' . $row2["nama"] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="input-group mb-3" id="divST">
                                                <label style="margin-top: 10px;">NIP:</label>
                                                <input type="text" class="form-control" style="margin-left: 10px;" id="koord_lainya_nip" placeholder="ketua" name="koord_lainya_nip" value="<?= $dt['koord_lainya_nip']; ?>">
                                                <label style="margin-top: 10px;">Nama</label>
                                                <input type="text" class="form-control" style="margin-left: 10px;" id="koord_lainya_nama" placeholder="ketua" name="koord_lainya_nama" value="<?= $dt['koord_lainya_nama']; ?>">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <h5>Sarana & Prasarana</h5>
                                            <label>Kendaraan Roda 4</label>
                                            <div class="input-group mb-3">
                                                <label style="margin-top: 10px;">APBN</label>
                                                <input type="text" style="margin-left: 10px;" class="form-control" name="roda_4_apbn" id="roda_4_apbn" placeholder="" avalue="<?= $dt['roda_4_apbn']; ?>">
                                                &nbsp; &nbsp;<label style="margin-top: 10px;">Unit</label>&nbsp; &nbsp;
                                                <label style="margin-top: 10px;">APBD</label>
                                                <input type="text" style="margin-left: 10px;" class="form-control" name="roda_4_apbd" id="roda_4_apbd" placeholder="" value="<?= $dt['roda_4_apbd']; ?>">
                                                &nbsp; &nbsp;<label style="margin-top: 10px;">Unit</label>&nbsp; &nbsp;
                                            </div>
                                            <label>Kendaraan Roda 2</label>
                                            <div class="input-group mb-3">
                                                <label style="margin-top: 10px;">APBN</label>
                                                <input type="text" style="margin-left: 10px;" class="form-control" name="roda_2_apbn" id="roda_2_apbn" placeholder="" value="<?= $dt['roda_2_apbn']; ?>">
                                                &nbsp; &nbsp;<label style="margin-top: 10px;">Unit</label>&nbsp; &nbsp;
                                                <label style="margin-top: 10px;">APBD</label>
                                                <input type="text" style="margin-left: 10px;" class="form-control" name="roda_2_apbd" id="roda_2_apbd" placeholder="" value="<?= $dt['roda_2_apbd']; ?>">
                                                &nbsp; &nbsp;<label style="margin-top: 10px;">Unit</label>&nbsp; &nbsp;
                                            </div>
                                            <label>Alat Pengolah Data (PC)</label>
                                            <div class="input-group mb-3">
                                                <label style="margin-top: 10px;">APBN</label>
                                                <input type="text" style="margin-left: 10px;" class="form-control" name="pc_apbn" id="pc_apbn" placeholder="" value="<?= $dt['pc_apbn']; ?>">
                                                &nbsp; &nbsp;<label style="margin-top: 10px;">Unit</label>&nbsp; &nbsp;
                                                <label style="margin-top: 10px;">APBD</label>
                                                <input type="text" style="margin-left: 10px;" class="form-control" name="pc_apbd" id="pc_apbd" placeholder="" value="<?= $dt['pc_apbd']; ?>">
                                                &nbsp; &nbsp;<label style="margin-top: 10px;">Unit</label>&nbsp; &nbsp;
                                            </div>
                                            <label>Alat Pengolah Data (Laptop)</label>
                                            <div class="input-group mb-3">
                                                <label style="margin-top: 10px;">APBN</label>
                                                <input type="text" style="margin-left: 10px;" class="form-control" name="laptop_apbn" id="laptop_apbn" placeholder="" value="<?= $dt['laptop_apbn']; ?>">
                                                &nbsp; &nbsp;<label style="margin-top: 10px;">Unit</label>&nbsp; &nbsp;
                                                <label style="margin-top: 10px;">APBD</label>
                                                <input type="text" style="margin-left: 10px;" class="form-control" name="laptop_apbd" id="laptop_apbd" placeholder="" value="<?= $dt['laptop_apbd']; ?>">
                                                &nbsp; &nbsp;<label style="margin-top: 10px;">Unit</label>&nbsp; &nbsp;
                                            </div>
                                            <label>Alat Pengolah Data (Printer)</label>
                                            <div class="input-group mb-3">
                                                <label style="margin-top: 10px;">APBN</label>
                                                <input type="text" style="margin-left: 10px;" class="form-control" name="printer_apbn" id="printer_apbn" placeholder="" value="<?= $dt['printer_apbn']; ?>">
                                                &nbsp; &nbsp;<label style="margin-top: 10px;">Unit</label>&nbsp; &nbsp;
                                                <label style="margin-top: 10px;">APBD</label>
                                                <input type="text" style="margin-left: 10px;" class="form-control" name="printer_apbd" id="printer_apbd" placeholder="" value="<?= $dt['printer_apbd']; ?>">
                                                &nbsp; &nbsp;<label style="margin-top: 10px;">Unit</label>&nbsp; &nbsp;
                                            </div>
                                            <label>Alat Pengolah Data (Modem)</label>
                                            <div class="input-group mb-3">
                                                <label style="margin-top: 10px;">APBN</label>
                                                <input type="text" style="margin-left: 10px;" class="form-control" name="modem_apbn" id="modem_apbn" placeholder="" value="<?= $dt['modem_apbn']; ?>">
                                                &nbsp; &nbsp;<label style="margin-top: 10px;">Unit</label>&nbsp; &nbsp;
                                                <label style="margin-top: 10px;">APBD</label>
                                                <input type="text" style="margin-left: 10px;" class="form-control" name="modem_apbd" id="modem_apbd" placeholder="" value="<?= $dt['modem_apbd']; ?>">
                                                &nbsp; &nbsp;<label style="margin-top: 10px;">Unit</label>&nbsp; &nbsp;
                                            </div>
                                            <label>LCD Proyektor</label>
                                            <div class="input-group mb-3">
                                                <label style="margin-top: 10px;">APBN</label>
                                                <input type="text" style="margin-left: 10px;" class="form-control" name="lcd_apbn" id="lcd_apbn" placeholder="" value="<?= $dt['lcd_apbn']; ?>">
                                                &nbsp; &nbsp;<label style="margin-top: 10px;">Unit</label>&nbsp; &nbsp;
                                                <label style="margin-top: 10px;">APBD</label>
                                                <input type="text" style="margin-left: 10px;" class="form-control" name="lcd_apbd" id="lcd_apbd" placeholder="" value="<?= $dt['lcd_apbd']; ?>">
                                                &nbsp; &nbsp;<label style="margin-top: 10px;">Unit</label>&nbsp; &nbsp;
                                            </div>
                                            <label>Soil Tester</label>
                                            <div class="input-group mb-3">
                                                <label style="margin-top: 10px;">APBN</label>
                                                <input type="text" style="margin-left: 10px;" class="form-control" name="soil_apbn" id="soil_apbn" placeholder="" value="<?= $dt['soil_apbn']; ?>">
                                                &nbsp; &nbsp;<label style="margin-top: 10px;">Unit</label>&nbsp; &nbsp;
                                                <label style="margin-top: 10px;">APBD</label>
                                                <input type="text" style="margin-left: 10px;" class="form-control" name="soil_apbd" id="soil_apbd" placeholder="" value="<?= $dt['soil_apbd']; ?>">
                                                &nbsp; &nbsp;<label style="margin-top: 10px;">Unit</label>&nbsp; &nbsp;
                                            </div>
                                        </div>
                                        <div class="col">
                                            <h5>Potensi Ekonomi</h5>
                                            <label>Kios saprotan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" style="margin-left: 10px;" class="form-control" name="kios_saprotan" id="kios_saprotan" placeholder="" value="<?= $dt['kios_saprotan']; ?>">
                                                &nbsp; &nbsp;<label style="margin-top: 10px;">Unit</label>&nbsp; &nbsp;
                                            </div>
                                            <label>Pedagang pengepul</label>
                                            <div class="input-group mb-3">
                                                <input type="text" style="margin-left: 10px;" class="form-control" name="pedagang_pengepul" id="pedagang_pengepul" placeholder="" value="<?= $dt['pedagang_pengepul']; ?>">
                                                &nbsp; &nbsp;<label style="margin-top: 10px;">Unit</label>&nbsp; &nbsp;
                                            </div>
                                            <label>Gudang pangan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" style="margin-left: 10px;" class="form-control" name="gudang_pangan" id="gudang_pangan" placeholder="" value="<?= $dt['gudang_pangan']; ?>">
                                                &nbsp; &nbsp;<label style="margin-top: 10px;">Unit</label>&nbsp; &nbsp;
                                            </div>
                                            <label>Perbankan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" style="margin-left: 10px;" class="form-control" name="perbankan" id="perbankan" placeholder="" value="<?= $dt['perbankan']; ?>">
                                                &nbsp; &nbsp;<label style="margin-top: 10px;">Unit</label>&nbsp; &nbsp;
                                            </div>
                                            <label>Industri Pertanian</label>
                                            <div class="input-group mb-3">
                                                <input type="text" style="margin-left: 10px;" class="form-control" name="industri_penyuluhan" id="industri_penyuluhan" placeholder="" value="<?= $dt['industri_penyuluhan']; ?>">
                                                &nbsp; &nbsp;<label style="margin-top: 10px;">Unit</label>&nbsp; &nbsp;
                                            </div>
                                            <h5>Lahan Percontohan</h5>
                                            <label>Di BPP</label>
                                            <div class="input-group mb-3">
                                                <input type="text" style="margin-left: 10px;" class="form-control" name="luas_lahan_bp3k" id="luas_lahan_bp3k" placeholder="" value="<?= $dt['luas_lahan_bp3k']; ?>">
                                                &nbsp; &nbsp;<label style="margin-top: 10px;">Ha</label>&nbsp; &nbsp;
                                            </div>
                                            <label>Di Petani</label>
                                            <div class="input-group mb-3">
                                                <input type="text" style="margin-left: 10px;" class="form-control" name="luas_lahan_petani" id="luas_lahan_petani" placeholder="" value="<?= $dt['luas_lahan_petani']; ?>">
                                                &nbsp; &nbsp;<label style="margin-top: 10px;">Ha</label>&nbsp; &nbsp;
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" id="btnSave" class="btn bg-gradient-primary">Simpan Data</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-wilkec" tabindex="-1" role="dialog" aria-labelledby="modal-wilkec" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-l" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-left">
                                <h4 class="font-weight-bolder text-warning text-gradient" id="judul_form">Tambah Data</h4>
                            </div>
                            <div class="card-body">

                                <form role="form text-left" action="<?= base_url('profil/Lembaga/save'); ?>">
                                    <div class="row">
                                        <div class="col">
                                            <input type="hidden" name="kode_prop" id="kode_prop" value="<?= $dt['kode_prop']; ?>">
                                            <input type="hidden" name="satminkal" id="satminkal" value="<?= $dt['satminkal']; ?>">

                                            <label for="penyuluh_swadaya">Nama Kecamatan</label>
                                            <div class="input-group mb-3">
                                                <select name="kecamatan" id="kecamatan" class="form-control input-lg">
                                                    <option value="">Pilih Kecamatan</option>
                                                    <?php
                                                    foreach ($kec as $row) {
                                                        echo '<option value="' . $row["id_daerah"] . '">' . 'Kec. ' . $row["deskripsi"] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <label for="alamat">Jumlah Petani</label>
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control" id="jum_petani" placeholder="Jumlah Petani" name="jum_petani">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" id="btnSimpan" class="btn bg-gradient-primary">Simpan Data</button>
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



<?= $this->section('script') ?>
<script>
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
                    $('#jenis_pertanian').val(res[0].jenis_pertanian);
                    $('#jenis_tp').val(res[0].jenis_tp);
                    $('#jenis_hor').val(res[0].jenis_hor);
                    $('#jenis_bun').val(res[0].jenis_bun);
                    $('#jenis_nak').val(res[0].jenis_nak);
                    $('#jenis_pkh').val(res[0].jenis_pkh);
                    $('#jenis_ketahanan_pangan').val(res[0].jenis_ketahanan_pangan);
                    $('#jenis_pangan').val(res[0].jenis_pangan);
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
                    $('#nama_koord_penyuluh_thp').val(res[0].nama_koord_penyuluh_thp);
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
                        var jenis_pertanian = $('#jenis_pertanian').val();
                        var jenis_tp = $('#jenis_tp').val();
                        var jenis_hor = $('#jenis_hor').val();
                        var jenis_bun = $('#jenis_bun').val();
                        var jenis_nak = $('#jenis_nak').val();
                        var jenis_pkh = $('#jenis_pkh').val();
                        var jenis_ketahanan_pangan = $('#jenis_ketahanan_pangan').val();
                        var jenis_pangan = $('#jenis_pangan').val();

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
                        var kode_koord_penyuluh = $('#kode_koord_penyuluh').val();

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
</script>

<?= $this->endSection() ?>