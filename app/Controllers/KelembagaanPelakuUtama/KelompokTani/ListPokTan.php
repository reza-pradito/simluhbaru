<?php

namespace App\Controllers\KelembagaanPelakuUtama\kelompoktani;

use App\Controllers\BaseController;
use App\Models\KelembagaanPelakuUtama\KelompokTani\ListPoktanModel;

class ListPoktan extends BaseController
{
    public function listpoktan()
    {
        if (session()->get('username') == "") {
            return redirect()->to('login');
        }
        $get_param = $this->request->getGet();

        $kode_kec = $get_param['kode_kec'];
        $listpoktan_model = new ListPoktanModel();
        $desa = $listpoktan_model->getDesa($kode_kec);
        $listpoktan_data = $listpoktan_model->getKelompokTaniTotal($kode_kec);

        $data = [

            'nama_kecamatan' => $listpoktan_data['nama_kec'],
            'jum' => $listpoktan_data['jum'],
            // 'jumangg' => $listpoktan_data['jumangg'],
            // 'jup' => $listpoktan_data['jup'],
            'tabel_data' => $listpoktan_data['table_data'],
            'title' => 'List Kelompok Tani',
            'name' => 'List Kelompok Tani',
            'desa' => $desa
        ];

        return view('KelembagaanPelakuUtama/KelompokTani/listpoktan', $data);
    }
}
