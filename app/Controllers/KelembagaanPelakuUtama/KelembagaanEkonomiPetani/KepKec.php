<?php

namespace App\Controllers\KelembagaanPelakuUtama\KelembagaanEkonomiPetani;
use App\Controllers\BaseController;
use App\Models\KelembagaanPelakuUtama\KelembagaanEkonomiPetani\KepKecModel;

class KepKec extends BaseController
{
    public function kepkec()
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
        $kepkec_model = new KepKecModel();
        $kepkec_data = $kepkec_model->getKepKecTotal(session()->get('kodebpp'));

        $data = [
            'jum' => $kepkec_data['jum'],
            'nama_bp3k' => $kepkec_data['nama_bpp'],
           'tabel_data' => $kepkec_data['table_data'],
            'title' => 'Gapoktan Kecamatan',
            'name' => 'Gapoktan Kecamatan' 
        ];

        return view('KelembagaanPelakuUtama/KelembagaanEkonomiPetani/kepkec', $data);
    }
  
    
}