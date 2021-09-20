<?php

namespace App\Controllers\Penyuluh;

use App\Controllers\BaseController;
use App\Models\penyuluh\PenyuluhCPNSModel;

class ListPenyuluh extends BaseController
{


    public function index()
    {
        $data = [
            'title' => 'Daftar Penyuluh',
            'name' => 'Penyuluh'
        ];

        return view('profil/listpenyuluh', $data);
    }
}
