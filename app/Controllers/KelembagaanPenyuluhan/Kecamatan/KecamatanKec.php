<?php

namespace App\Controllers\KelembagaanPenyuluhan\Kecamatan;

use App\Controllers\BaseController;
use App\Models\KelembagaanPenyuluhan\Kecamatan\KecamatanKecModel;
use App\Models\KodeWilayah\KodeWilModel;

class KecamatanKec extends BaseController
{
    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        $this->model = new KecamatanKecModel();
    }
    public function kecamatan()

    {

        $kec_model = new KecamatanKecModel;
        $kode_model = new KodeWilModel();
        $kec_data = $kec_model->getKecTotal(session()->get('kodebpp'));
        // $penyuluhPNS = $kec_model->getPenyuluhPNS(session()->get('kodebpp'));
        // $penyuluhTHL = $kec_model->getPenyuluhTHL(session()->get('kodebpp'));
        $kode = $kode_model->getKodeWil(session()->get('kodebpp'));

        $data = [
            //'jumpns' => $kec_data['jumpns'],
            'nama_kec' => $kec_data['nama_kec'],
            'tabel_data' => $kec_data['table_data'],
            // 'penyuluhPNS' => $penyuluhPNS,
            // 'penyuluhTHL' => $penyuluhTHL,
            'title' => 'Kecamatan',
            'name' => 'Kecamatan',
            'kode_prop' => $kode['kode_prop'],
            'kode_kab' => $kode['kode_kab']
        ];

        return view('KelembagaanPenyuluhan/Kecamatan/kecamatankec', $data);
    }
}
