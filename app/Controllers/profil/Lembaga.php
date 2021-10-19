<?php

namespace App\Controllers\profil;

use App\Controllers\BaseController;
use App\Models\LembagaModel;
use App\Models\WilayahModel;

class Lembaga extends BaseController
{
    protected $session;
    protected $modelLembaga;
    protected $modelProv;

    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        helper('autentikasi');
        $this->modelLembaga = new LembagaModel();
        $this->modelProv = new WilayahModel();
    }

    public function index()
    {


        if (session()->get('username') == "") {
            return redirect()->to('login');
        }


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

        $dtlembaga = $this->modelLembaga->getProfil($kode);
        $dtprov = $this->modelProv->getProv();
        //dd($dtlembaga);

        $data = [

            'title' => 'Profil Lembaga',
            'dt' => $dtlembaga,
            'prov' => $dtprov
        ];


        return view('profil/profillembaga', $data);
    }
}
