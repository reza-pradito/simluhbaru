<?php

namespace App\Controllers\Penyuluh;

use App\Controllers\BaseController;
use App\Models\penyuluh\PenyuluhPNSModel;

class PenyuluhPns extends BaseController
{


    public function penyuluhpns()
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

        //  d($kode);

        $penyuluh_model = new PenyuluhPNSModel();
        $pns_data = $penyuluh_model->getPenyuluhPNSTotal($kode);

        if (session()->get('username') == "") {
            return redirect()->to('login');
        }
        // if (session()->get('status_user') == '1') {
        //     $kode = substr(session()->get('kodebakor'), 0, 2);
        // } elseif (session()->get('status_user') == '200') {
        //     $kode = session()->get('kodebapel');
        // }

        $penyuluh_model = new PenyuluhPNSModel();
        $pns_data = $penyuluh_model->getPenyuluhPNSTotal($kode);
        // dd($pns_data);
        // $namaprop = $penyuluh_model->getPropvinsi();
        // $pendidikan = $penyuluh_model->getPendidikan();
        // $tugas = $penyuluh_model->getTugas($kode);


        $data = [
            'jml_data' => $pns_data['jum'],
            'nama_kabupaten' => $pns_data['nama_kab'],
            'tabel_data' => $pns_data['table_data'],
            'title' => 'Penyuluh PNS',
            'name' => 'PNS'
        ];

        return view('kab/penyuluh/penyuluhpns', $data);
    }
}
