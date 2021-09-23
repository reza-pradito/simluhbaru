<?php

namespace App\Controllers\KelembagaanPelakuUtama\Gapoktan;
use App\Controllers\BaseController;
use App\Models\KelembagaanPelakuUtama\Gapoktan\GapoktanModel;

class Gapoktan extends BaseController
{
    public function gapoktan()
    {
        
        $gapoktan_model = new GapoktanModel;
        $gapoktan_data = $gapoktan_model->getGapoktanTotal(session()->get('kodebapel'));

        $data = [
            
            'nama_kabupaten' => $gapoktan_data['nama_kab'],
            'jum_gapoktan' => $gapoktan_data['jum_gapoktan'],
            'tabel_data' => $gapoktan_data['table_data'],
            'title' => 'Gapoktan',
            'name' => 'Gapoktan'
        ];

        return view('KelembagaanPelakuUtama/Gapoktan/gapoktan', $data);
    }
  
 
}