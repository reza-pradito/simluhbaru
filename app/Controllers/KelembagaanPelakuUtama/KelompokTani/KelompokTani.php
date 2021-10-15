<?php

namespace App\Controllers\KelembagaanPelakuUtama\kelompoktani;

use App\Controllers\BaseController;
use App\Models\KelembagaanPelakuUtama\KelompokTani\KelompokTaniModel;

class KelompokTani extends BaseController
{
    public function kelompoktani()
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
        $kelompoktani_model = new KelompokTaniModel();
        $kelompoktani_data = $kelompoktani_model->getKelompokTaniTotal($kode);

        $data = [

            'nama_kabupaten' => $kelompoktani_data['nama_kab'],
            'jum_poktan' => $kelompoktani_data['jum_poktan'],
            'tabel_data' => $kelompoktani_data['table_data'],
            'title' => 'Kelompok Tani',
            'name' => 'Kelompok Tani'
        ];

        return view('KelembagaanPelakuUtama/KelompokTani/kelompoktani', $data);
    }

    public function listkelompoktani()
    {
        $data = [
            'title' => 'Gapoktan'
        ];

        return view('KelembagaanPelakuUtama/listkelompoktani', $data);
    }
}
