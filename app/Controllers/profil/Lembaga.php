<?php

namespace App\Controllers\profil;

use App\Controllers\BaseController;
use App\Models\LembagaModel;

class Lembaga extends BaseController
{
    protected $session;

    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        helper('autentikasi');
    }

    public function index()
    {


        if (session()->get('username') == "") {
            return redirect()->to('login');
        }

        $lembagaModel = new LembagaModel();
        // if (empty($this->session->get('kodebapel'))) {
        //     return redirect()->to('login');
        // } else {
        $dtlembaga = $lembagaModel->getProfil(session()->get('kodebapel'));


        $data = [

            'title' => 'Profil Lembaga',
            'dt' => $dtlembaga
        ];

        //dd($data);
        return view('profil/profillembaga', $data);
    }
}
