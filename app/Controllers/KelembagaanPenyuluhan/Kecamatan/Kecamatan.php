<?php

namespace App\Controllers\KelembagaanPenyuluhan\Kecamatan;

use App\Controllers\BaseController;
use App\Models\KelembagaanPenyuluhan\Kecamatan\KecamatanModel;

class Kecamatan extends BaseController
{
    protected $session;

    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function kecamatan()
    {

        $kec_model = new KecamatanModel;
        $kec_data = $kec_model->getKecTotal($this->session->get('kodebapel'));

        $data = [
            //'jumpns' => $kec_data['jumpns'],
            'nama_kabupaten' => $kec_data['nama_kab'],
            'tabel_data' => $kec_data['table_data'],
            'title' => 'Kecamatan',
            'name' => 'Kecamatan'
        ];

        return view('KelembagaanPenyuluhan/Kecamatan/kecamatan', $data);
    }

    // public function listdesa()
    // {

    //     $data = [


    //         'name' => 'Desa'
    //     ];
    //     return view('KelembagaanPenyuluhan/Desa/listdesa', $data);
    // }
}
