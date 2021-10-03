<?php

namespace App\Controllers\KelembagaanPelakuUtama\KelembagaanPetaniLainnya;
use App\Controllers\BaseController;
use App\Models\KelembagaanPelakuUtama\KelembagaanPetaniLainnya\TambahKP2LModel;

class TambahKP2L extends BaseController
{
    public function tambahkp2l()
    {
       // $get_param = $this->request->getGet();

      //  $kode_kab = $get_param['kode_kab'];
        $tambahkp2l_model = new TambahKP2LModel();
        $tambahkp2l_data = $tambahkp2l_model->getTambahKP2L(session()->get('kodebapel'));
        $data = [
            
           //'nama_kabupaten' => $tambahkelompoktani_data['nama_kab'],
         // 'nama_kecamatan' => $tambahkelompoktani_data['nama_kec'],
          //'jum_poktan' => $tambahkelompoktani_data['jum_poktan'],
           'tabel_data' => $tambahkp2l_data['table_data'],
            'title' => 'Kelompok Tani',
            'name' => 'Kelompok Tani'
        ];

        return view('KelembagaanPelakuUtama/KelembagaanPetaniLainnya/tambahkp2l', $data);
    }

  
}