<?php

namespace App\Controllers\profil;

use App\Controllers\BaseController;
use App\Models\Guest\GuestModel;

class Guest extends BaseController
{
    protected $session;

    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        helper('autentikasi');
    }

    public function daftarkelembagaan()
    {

        $gmodel = new GuestModel();

        $rlprov = $gmodel->getDaftarKelembagaanProv();
        $data = [
            'title' => 'Rekap Kelembagaan Provinsi',
            'rlprov' => $rlprov['rlprov']
        ];
        // dd($data);

        return view('guest/daftarkelembagaan', $data);
    }

    public function daftarkelembagaankab()
    {
        $gmodel = new GuestModel();
        $kode_kab = session()->get('kodebapel');
        $get_param = $this->request->getGet();
        $kode_prop = $get_param['kode_prop'];

        $rlkab = $gmodel->getDaftarKelembagaanKab($kode_prop);
        $data = [
            'title' => 'Rekap Kelembagaan Provinsi',
            'rlkab' => $rlkab['rlkab']
        ];
        dd($data);
        return view('guest/daftarkelembagaankab', $data);
    }

    public function rekapkeluh()
    {
        $gmodel = new GuestModel();

        $rekapluh = $gmodel->getRekapKeluh();
        $data = [
            'title' => 'Rekap Kelembagaan Provinsi',
            'rkeluh' => $rekapluh['rkeluh'],
        ];
        return view('guest/rekap_keluh', $data);
    }
}
