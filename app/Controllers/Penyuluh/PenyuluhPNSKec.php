<?php

namespace App\Controllers\Penyuluh;

use App\Controllers\BaseController;
use App\Models\penyuluh\PenyuluhPNSKecModel;

class PenyuluhPNSKec extends BaseController
{


    public function penyuluhpnskec()
    {
        if (session()->get('username') == "") {
            return redirect()->to('login');
        }
        $penyuluh_model = new PenyuluhPNSKecModel();
        $pnskec_data = $penyuluh_model->getPenyuluhPNSKecTotal(session()->get('koedbpp'));

        $data = [
            'jml_data' => $pnskec_data['jum'],
            // 'nama_kabupaten' => $pnskec_data['nama_kab'],
            'nama_kecamatan' => $pnskec_data['nama_kec'],
            'tabel_data' => $pnskec_data['table_data'],
            'title' => 'Penyuluh PNS',
            'name' => 'PNS'
        ];

        // var_dump($data);
        // die();

        return view('kab/penyuluh/penyuluhpnskec', $data);
    }
}
