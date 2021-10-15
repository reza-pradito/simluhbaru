<?php

namespace App\Controllers\KelembagaanPelakuUtama\Gapoktan;

use App\Controllers\BaseController;
use App\Models\KelembagaanPelakuUtama\Gapoktan\GapoktanModel;

class Gapoktan extends BaseController
{
    public function gapoktan()
    {
        $get_param = $this->request->getGet();

        //$kode_kab = $get_param['kode_kab'];
        if (empty(session()->get('status_user')) || session()->get('status_user') == '2') {
            $kode = '00';
        } elseif (session()->get('status_user') == '1') {
            $kode = session()->get('kodebakor');
        } elseif (session()->get('status_user') == '200') {
            $kode = session()->get('kodebapel');
        } elseif (session()->get('status_user') == '300') {
            $kode = session()->get('kodebpp');
        }
        $gapoktan_model = new GapoktanModel;
        $gapoktan_data = $gapoktan_model->getGapoktanTotal($kode);

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
