<?php

namespace App\Controllers\KelembagaanPelakuUtama\KelompokTani;

use App\Controllers\BaseController;
use App\Models\KelembagaanPelakuUtama\KelompokTani\KelompokTaniModel;
use App\Models\KelembagaanPelakuUtama\KelompokTani\ListPoktanModel;
use App\Models\KodeWilayah\KodeWilModel2;

class JenisKelompok extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this->model = new ListPoktanModel();
    }

    public function jeniskelompok()
    {
        $get_param = $this->request->getGet();
        $kode_kec = $get_param['kode_kec'];
        $jeniskelompok_model = new ListPoktanModel();
        $kodewil_model = new KodeWilModel2();
        

        $data = [

           
            'title' => 'Jenis Kelompok Tani',
            'name' => 'Jenis Kelompok Tani',
            'kode_kec' => $kode_kec,
            'kode_prop' => $kode_data['kode_prop']
        ];

        return view('KelembagaanPelakuUtama/KelompokTani/jeniskelompok', $data);
    }
    
    public function delete($id_poktan)
    {
        $this->model->delete($id_poktan);
        //return redirect()->to('/listpoktan');
    }
}
