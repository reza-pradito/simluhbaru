<?php

namespace App\Controllers\KelembagaanPelakuUtama\GapoktanBersama;

use App\Controllers\BaseController;
use App\Models\KelembagaanPelakuUtama\GapoktanBersama\GapoktanBersamaModel;

class GapoktanBersama extends BaseController
{
    public function gapoktanbersama()
    {
        $get_param = $this->request->getGet();

        // $kode_kab = $get_param['kode_kab'];
        if (empty(session()->get('status_user')) || session()->get('status_user') == '2') {
            $kode = '00';
        } elseif (session()->get('status_user') == '1') {
            $kode = session()->get('kodebakor');
        } elseif (session()->get('status_user') == '200') {
            $kode = session()->get('kodebapel');
        } elseif (session()->get('status_user') == '300') {
            $kode = session()->get('kodebpp');
        }
        $gapoktanbersama_model = new GapoktanBersamaModel;
        $gapoktanbersama_data = $gapoktanbersama_model->getGapoktanBersamaTotal($kode);

        $data = [

            'nama_kabupaten' => $gapoktanbersama_data['nama_kab'],
            'jum' => $gapoktanbersama_data['jum'],
            'tabel_data' => $gapoktanbersama_data['table_data'],
            'title' => 'Gapoktan Bersama',
            'name' => 'Gapoktan Bersama'
        ];

        return view('KelembagaanPelakuUtama/GapoktanBersama/gapoktanbersama', $data);
    }
}
