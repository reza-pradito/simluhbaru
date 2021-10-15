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
        if (empty(session()->get('status_user')) || session()->get('status_user') == '2') {
            $kode = '00';
        } elseif (session()->get('status_user') == '1') {
            $kode = session()->get('kodebakor');
        } elseif (session()->get('status_user') == '4') {
            $kode = session()->get('kodebapel');
        } elseif (session()->get('status_user') == '200') {
            $kode = session()->get('kodebapel');
        } elseif (session()->get('status_user') == '300') {
            $kode = session()->get('kodebpp');
        }
        //  d($kode);

        $dtlembaga = $lembagaModel->getProfil($kode);
        //dd($dtlembaga);

        $data = [

            'title' => 'Profil Lembaga',
            'dt' => $dtlembaga
        ];


        return view('profil/profillembaga', $data);
    }
}
