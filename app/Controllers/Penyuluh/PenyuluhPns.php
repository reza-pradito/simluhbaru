<?php

namespace App\Controllers\Penyuluh;

use App\Controllers\BaseController;
use App\Models\penyuluh\PenyuluhPNSModel;

class PenyuluhPns extends BaseController
{


    public function penyuluhpns()
    {


        // $get_param = $this->request->getGet();

        // $kode_kab = $get_param['kode_kab'];
        $penyuluh_model = new PenyuluhPNSModel();
        $pns_data = $penyuluh_model->getPenyuluhPNSTotal(session()->get('kodebapel'));

        if (session()->get('username') == "") {
            return redirect()->to('login');
        }
        // if (session()->get('status_user') == '1') {
        //     $kode = substr(session()->get('kodebakor'), 0, 2);
        // } elseif (session()->get('status_user') == '200') {
        //     $kode = session()->get('kodebapel');
        // }


        $penyuluh_model = new PenyuluhPNSModel();
        $pns_data = $penyuluh_model->getPenyuluhPNSTotal(session()->get('kodebapel'));
        // dd($pns_data);
        $namaprop = $penyuluh_model->getPropvinsi();
        $pendidikan = $penyuluh_model->getPendidikan();
        $tugas = $penyuluh_model->getTugas(session()->get('kodebapel'));


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
