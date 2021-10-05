<?php

namespace App\Controllers\Penyuluh;

use App\Controllers\BaseController;
use App\Models\penyuluh\PenyuluhPPPKKecModel;

class PenyuluhPPPKKec extends BaseController
{


    public function penyuluhpppkkec()
    {
        if (session()->get('username') == "") {
            return redirect()->to('login');
        }
        $penyuluh_model = new PenyuluhPPPKKecModel();
        $pppkkec_data = $penyuluh_model->getPenyuluhPPPKKecTotal(session()->get('kodebpp'));

        $data = [
            'jml_data' => $pppkkec_data['jum'],
            // 'nama_kabupaten' => $pppkkec_data['nama_kab'],
            'nama_kecamatan' => $pppkkec_data['nama_kec'],
            'tabel_data' => $pppkkec_data['table_data'],
            'title' => 'Penyuluh PNS',
            'name' => 'PNS'
        ];

        // var_dump($data);
        // die();

        return view('kab/penyuluh/penyuluhpppkkec', $data);
    }
}
