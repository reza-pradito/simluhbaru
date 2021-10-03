<?php

namespace App\Controllers\KelembagaanPelakuUtama\kelompoktani;
use App\Controllers\BaseController;
use App\Models\KelembagaanPelakuUtama\KelompokTani\ListPoktanModel;

class ListPoktan extends BaseController
{
    public function listpoktan()
    {
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
    public function save()
    {
        $this->addpoktanmodel->save([
            
            'kode_desa' => $this->request->getVar('kode_desa'),
            'kode_kab' => $this->request->getVar('kode_kab'),
            'kode_kec' => $this->request->getVar('kode_kec'),
            'nama_poktan' => $this->request->getVar('nama_poktan'),
            'ketua_poktan' => $this->request->getVar('ketua_poktan'),
            'alamat' => $this->request->getVar('alamat'),
            'simluh_tahun_bentuk' => $this->request->getVar('simluh_tahun_bentuk'),
            'status' => $this->request->getVar('status')
        ]);
    //   var_dump($this->addpoktanmodel->save);
      // die();

        return redirect()->to('/kelompoktani');
    }
}