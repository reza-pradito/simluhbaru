<?php

namespace App\Controllers\KelembagaanPelakuUtama\KelembagaanEkonomiPetani;
use App\Controllers\BaseController;
use App\Models\KelembagaanPelakuUtama\KelembagaanEkonomiPetani\KelembagaanEkonomiPetaniModel;

class KelembagaanEkonomiPetani extends BaseController
{
    public function kelembagaanekonomipetani()
    {
        if (empty(session()->get('status_user')) || session()->get('status_user') == '2') {
            $kode = '00';
        } elseif (session()->get('status_user') == '1') {
            $kode = session()->get('kodebakor');
        } elseif (session()->get('status_user') == '200') {
            $kode = session()->get('kodebapel');
        } elseif (session()->get('status_user') == '300') {
            $kode = session()->get('kodebpp');
        }
        $kelembagaanekonomipetani_model = new KelembagaanEkonomiPetaniModel();
        $kelembagaanekonomipetani_data = $kelembagaanekonomipetani_model->getKelembagaanEkonomiPetaniTotal($kode);

        $data = [
            
            'nama_kabupaten' => $kelembagaanekonomipetani_data['nama_kab'],
            'tabel_data' => $kelembagaanekonomipetani_data['table_data'],
            'title' => 'Kelembagaan Ekonomi Petani',
            'name' => 'Kelembagaan Ekonomi Petani'
        ];

        return view('KelembagaanPelakuUtama/KelembagaanEkonomiPetani/kelembagaanekonomipetani', $data);
    }
  
   
}