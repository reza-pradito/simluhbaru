<?php

namespace App\Controllers\KelembagaanPenyuluhan\Desa;

use App\Controllers\BaseController;
use App\Models\KelembagaanPenyuluhan\Desa\DesaModel;
use App\Models\KelembagaanPenyuluhan\Desa\PosluhdesModel;


class Desa extends BaseController
{
    protected $session;

    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
    }
    public function desa()
    {
        if (session()->get('username') == "") {
            return redirect()->to('login');
        }

        $desa_model = new DesaModel;
        $desa_data = $desa_model->getDesaTotal($this->session->get('kodebapel'));
        $data = [
            'jum_des' => $desa_data['jum_des'],
            'nama_kabupaten' => $desa_data['nama_kab'],
            'tabel_data' => $desa_data['table_data'],
            'title' => 'Desa',
            'name' => 'Desa'
        ];

        return view('KelembagaanPenyuluhan/Desa/desa', $data);
    }

    public function listdesa()
    {
        if (session()->get('username') == "") {
            return redirect()->to('login');
        }

        $get_param = $this->request->getGet();

        $kode_kec = $get_param['kode_kec'];
        $posluhdes_model = new PosluhdesModel;
        $posluhdes_data = $posluhdes_model->getPosluhdesTotal($kode_kec);

        $data = [
            'jum_kec' => $posluhdes_data['jum_kec'],
            'nama_kecamatan' => $posluhdes_data['nama_kec'],
            'tabel_data' => $posluhdes_data['table_data'],
            'title' => 'Daftar Posluhdes',
            'name' => 'Posluhdes'
        ];

        return view('KelembagaanPenyuluhan/Desa/daftar_posluhdes', $data);
    }
}
