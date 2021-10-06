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
        $listgapoktan_model = new ListGapoktanModel();
        $data = [
            'kode_desa' => $this->request->getPost('kode_desa'),
            'kode_kab' => $this->request->getPost('kode_kab'),
            'kode_kec' => $this->request->getPost('kode_kec'),
            'nama_gapoktan' => $this->request->getPost('nama_gapoktan'),
            'ketua_gapoktan' => $this->request->getPost('ketua_gapoktan'),
            'simluh_bendahara' => $this->request->getPost('simluh_bendahara'),
            'simluh_sekretaris' => $this->request->getPost('simluh_sekretaris'),
            'alamat' => $this->request->getPost('alamat'),
            'simluh_tahun_bentuk' => $this->request->getPost('simluh_tahun_bentuk'),
            'simluh_sk_pengukuhan' => $this->request->getPost('simluh_sk_pengukuhan')
        ];
      

        $listgapoktan_model->save($data);
        $data = ['status' => 'Data Berhasil Ditambah'];
        return $this->response->setJson[$data];
    }
    public function DetailEdit($id_gap)
    { $listgapoktan_model = new ListGapoktanModel();

        $gapoktan = $listgapoktan_model->getGapoktan($id_gap);
        echo json_encode($gapoktan);
    }
}