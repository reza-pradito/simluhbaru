<?php

namespace App\Controllers\profil;

use App\Controllers\BaseController;
use App\Models\Guest\GuestModel;
use App\Models\KelembagaanPenyuluhan\Kecamatan\KecamatanModel;

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
        $get_param = $this->request->getGet();
        $kode_prop = $get_param['kode_prop'];

        $rlkab = $gmodel->getDaftarKelembagaanKab($kode_prop);
        $data = [
            'title' => 'Rekap Kelembagaan Kabupaten',
            'rlkab' => $rlkab['rlkab']
        ];
        // dd($data);
        return view('guest/daftarkelembagaankab', $data);
    }

    public function daftarkelembagaankec()
    {
        $gmodel = new GuestModel();
        $get_param = $this->request->getGet();
        $kode_kab = $get_param['kode_kab'];

        $rlkec = $gmodel->getDaftarKelembagaanKec($kode_kab);
        $data = [
            'title' => 'Rekap Kelembagaan Kabupaten',
            'rlkec' => $rlkec['rlkec']
        ];
        // dd($data);
        return view('guest/daftarkelembagaankec', $data);
    }

    public function profilbpp()
    {
        $kec_model = new KecamatanModel();
        $gmodel = new GuestModel();

        // $kode_kab = session()->get('kodebapel');
        // 


        $get_param = $this->request->getGet();
        $kode_bpp = $get_param['kodebpp'];
        $kode_kec = $get_param['kode_kec'];

        $profilkec = $gmodel->getProfilBPP($kode_kec, $kode_bpp);
        $wilkec = $kec_model->getWIlkec($kode_kec, $kode_bpp);;
        $penyuluhPNS = $kec_model->getPenyuluhPNS(session()->get('kodebapel'));
        $penyuluhTHL = $kec_model->getPenyuluhTHL(session()->get('kodebapel'));
        $kec = $kec_model->getKec(session()->get('kodebapel'));
        $fasdata = $kec_model->getFas($kode_kec, $kode_bpp);
        $klas = $kec_model->getKlasifikasi($kode_kec, $kode_bpp);
        $award = $kec_model->getAward($kode_kec, $kode_bpp);
        $dana = $kec_model->getDana($kode_kec, $kode_bpp);
        $potensi = $kec_model->getPotensiWilayah($kode_kec, $kode_bpp);
        $jenis_komoditas = $kec_model->getJenisKomoditas();
        $penyuluh = $kec_model->getPenyuluh($kode_kec);
        $bp = $kec_model->getBP3K($kode_kec);

        $data = [
            'title' => 'Profil BPP',
            'bp' => $bp['kode_bp3k'],
            'dt' => $profilkec,
            'wilkec' => $wilkec['wilkec'],
            'fasdata' => $fasdata['fasdata'],
            'penyuluhPNS' => $penyuluhPNS,
            'penyuluhTHL' => $penyuluhTHL,
            'jenis_komoditas' => $jenis_komoditas,
            'kode_kec' => $kode_kec,
            'klas' => $klas['klas'],
            'penghargaan' => $award['penghargaan'],
            'dana' => $dana['dana'],
            'potensi' => $potensi['potensi'],
            'pns_kec' => $penyuluh['pns_kec'],
            'thl_kec' => $penyuluh['thl_kec'],
            'swa_kec' => $penyuluh['swa_kec'],
            'p3k_kec' => $penyuluh['p3k_kec'],
            'swasta_kec' => $penyuluh['swasta_kec'],
            'kec' => $kec
        ];
        return view('guest/profilebpp', $data);
    }

    public function rekapkeluh()
    {
        $gmodel = new GuestModel();

        $rekapluh = $gmodel->getRekapKeluh();
        $data = [
            'title' => 'Rekap Kelembagaan Penyuluhan',
            'rkeluh' => $rekapluh['rkeluh'],
        ];
        return view('guest/rekap_keluh', $data);
    }

    public function rekapkeluhkec()
    {
        $gmodel = new GuestModel();

        $get_param = $this->request->getGet();
        $kode_prop = $get_param['kode_prop'];

        $rekapluhkec = $gmodel->getRekapKeluhKec($kode_prop);
        $data = [
            'title' => 'Rekap Kelembagaan Penyuluhan',
            'namaprov' => $rekapluhkec['namaprov'],
            'rkeluhkec' => $rekapluhkec['rkeluhkec']
        ];
        return view('guest/rekap_keluhkec', $data);
    }

    public function rekapkelembagaan()
    {

        $gmodel = new GuestModel();

        $rlprov = $gmodel->getRekapKelembagaan();
        $data = [
            'title' => 'Rekap Kelembagaan Provinsi',
            'rlprov' => $rlprov['rlprov']
        ];
        // dd($data);

        return view('guest/rekapkelembagaan', $data);
    }

    public function rekapbpp()
    {
        $gmodel = new GuestModel();

        $get_param = $this->request->getGet();
        $kode_prop = $get_param['kode_prop'];

        $rkbpp = $gmodel->getRekapBPP($kode_prop);
        $data = [
            'title' => 'Rekap Profil BPP',
            'namaprov' => $rkbpp['namaprov'],
            'rkbpp' => $rkbpp['rkbpp']
        ];
        return view('guest/rekap_bpp', $data);
    }

    public function rekapprofbpp()
    {
        $gmodel = new GuestModel();

        $get_param = $this->request->getGet();
        $kode_kab = $get_param['kode_kab'];

        $rpbpp = $gmodel->getRekapProfBPP($kode_kab);
        $data = [
            'title' => 'Rekap Profil BPP',
            'namaprov' => $rpbpp['namaprov'],
            'namakab' => $rpbpp['namakab'],
            'rpbpp' => $rpbpp['rpbpp']
        ];
        return view('guest/rekap_profbpp', $data);
    }

    public function rekapexcbpp()
    {
        $gmodel = new GuestModel();

        // $get_param = $this->request->getGet();
        // $kode_kab = $get_param['kode_kab'];

        $prov = $gmodel->getProv();
        $data = [
            'title' => 'Rekap Profil BPP',
            'prov' => $prov
        ];
        return view('guest/rekapbpp_excel', $data);
    }
}
