<?php

namespace App\Controllers\KelembagaanPelakuUtama\Gapoktan;

use App\Controllers\BaseController;
use App\Models\KelembagaanPelakuUtama\Gapoktan\ListGapoktanModel;

class ListGapoktan extends BaseController
{
    public function listgapoktan()
    {
        if (session()->get('username') == "") {
            return redirect()->to('login');
        }
        $get_param = $this->request->getGet();

        $kode_kec = $get_param['kode_kec'];
        $listgapoktan_model = new ListGapoktanModel();
        $desa = $listgapoktan_model->getDesa($kode_kec);
        $listgapoktan_data = $listgapoktan_model->getListGapoktanTotal($kode_kec);

        $data = [

            'nama_kecamatan' => $listgapoktan_data['nama_kec'],
            'jum' => $listgapoktan_data['jum'],
            //  'jumpok' => $listgapoktan_data['jumpok'],
            'tabel_data' => $listgapoktan_data['table_data'],
            'title' => 'List Gabungan Kelompok Tani',
            'name' => 'List Gabungan Kelompok Tani',
            'desa' => $desa

        ];

        return view('KelembagaanPelakuUtama/Gapoktan/listgapoktan', $data);
    }
    public function save()
    {
        $this->listgapoktan_model->save([
            'kode_kec' => $this->request->getPost('kode_kec'),
            'kode_kab' => $this->request->getPost('kode_kab'),
            'kode_desa' => $this->request->getPost('kode_desa'),
            'ketua_gapoktan' => $this->request->getPost('ketua_gapoktan'),
            'nama_gapoktan' => $this->request->getPost('nama_gapoktan'),
            'alamat' => $this->request->getPost('alamat'),
            'simluh_sekretaris' => $this->request->getPost('simluh_sekretaris'),
            'simluh_bendahara' => $this->request->getPost('simluh_bendahara'),
            'simluh_sk_bentuk' => $this->request->getPost('simluh_sk_bentuk'),
            'simluh_sk_pengukuhan' => $this->request->getPost('simluh_sk_pengukuhan'),
        ]);

        return redirect()->to('KelembagaanPelakuUtama/Gapoktan/listgapoktan');
    }
}
