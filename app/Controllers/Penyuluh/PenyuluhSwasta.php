<?php

namespace App\Controllers\Penyuluh;

use App\Controllers\BaseController;
use App\Models\penyuluh\PenyuluhSwastaModel;

class PenyuluhSwasta extends BaseController
{


    public function penyuluhswasta()
    {

        // $get_param = $this->request->getGet();

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
        $penyuluh_model = new PenyuluhSwastaModel();
        $swasta_data = $penyuluh_model->getPenyuluhSwastaTotal($kode);
        //  $tugas = $penyuluh_model->getTugas();

        $data = [
            'jml_data' => $swasta_data['jum'],
            'nama_kabupaten' => $swasta_data['nama_kab'],
            'tabel_data' => $swasta_data['table_data'],
            //  'tugas' => $tugas,
            'title' => 'Penyuluh Swasta',
            'name' => 'Swasta'
        ];

        return view('kab/penyuluh/penyuluhswasta', $data);
    }
}
