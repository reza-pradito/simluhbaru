<?php

namespace App\Controllers\KelembagaanPelakuUtama\Gapoktan;
use App\Controllers\BaseController;
use App\Models\KelembagaanPelakuUtama\Gapoktan\ListGapoktanModel;

class ListGapoktan extends BaseController
{
    public function listgapoktan()
    {
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
        $this->addgapmodel->save([
            'kode_desa' => $this->request->getVar('kode_desa'),
            'kode_kab' => $this->request->getVar('kode_kab'),
            'kode_kec' => $this->request->getVar('kode_kec'),
            'nama_gapoktan' => $this->request->getVar('nama_gapoktan'),
            'ketua_gapoktan' => $this->request->getVar('ketua_gapoktan'),
            'simluh_bendahara' => $this->request->getVar('simluh_bendahara'),
            'simluh_sekretaris' => $this->request->getVar('simluh_sekretaris'),
            'alamat' => $this->request->getVar('alamat'),
            'simluh_tahun_bentuk' => $this->request->getVar('simluh_tahun_bentuk'),
            'simluh_sk_pengukuhan' => $this->request->getVar('simluh_sk_pengukuhan')
        ]);

        return redirect()->to('/gapoktan');
    }
}