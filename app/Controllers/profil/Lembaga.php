<?php

namespace App\Controllers\profil;

use App\Controllers\BaseController;
use App\Models\LembagaModel;
// use PharIo\Manifest\Library;

class Lembaga extends BaseController
{
    protected $session;

    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        //helper('autentikasi');

    }

    public function index()
    {

        if (session()->get('username') == "") {
            return redirect()->to('login');
        }
        $lembagaModel = new LembagaModel();

        if (session()->get('status_user') == '1') {
            $dtlembaga = $lembagaModel->getProfil(session()->get('kodebakor'));
        } elseif (session()->get('status_user') == '200') {
            $dtlembaga = $lembagaModel->getProfil(session()->get('kodebapel'));
        } elseif (session()->get('status_user') == '300') {
            $dtlembaga = $lembagaModel->getProfil(session()->get('kodebpp'));
        }

        $data = [

            'title' => 'Profil Lembaga',
            'dt' => $dtlembaga
        ];

        //dd($data);
        return view('profil/profillembaga', $data);
    }
}
