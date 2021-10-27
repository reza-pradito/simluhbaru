<?php

namespace App\Controllers\KelembagaanPenyuluhan\Kecamatan;

use App\Controllers\BaseController;
use App\Models\KelembagaanPenyuluhan\Kecamatan\KecamatanModel;
use App\Models\KodeWilayah\KodeWilModel;


class Kecamatan extends BaseController
{
    protected $session;

    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        $this->model = new KecamatanModel();
    }

    public function kecamatan()
    {

        $kec_model = new KecamatanModel;
        $kode_model = new KodeWilModel();
        $kec_data = $kec_model->getKecTotal($this->session->get('kodebapel'));
        $penyuluhPNS = $kec_model->getPenyuluhPNS(session()->get('kodebapel'));
        $penyuluhTHL = $kec_model->getPenyuluhTHL(session()->get('kodebapel'));
        $kec = $kec_model->getKec(session()->get('kodebapel'));
        $kode = $kode_model->getKodeWil2(session()->get('kodebapel'));

        $data = [
            //'jumpns' => $kec_data['jumpns'],
            'nama_kabupaten' => $kec_data['nama_kab'],
            'tabel_data' => $kec_data['table_data'],
            'penyuluhPNS' => $penyuluhPNS,
            'penyuluhTHL' => $penyuluhTHL,
            'title' => 'Kecamatan',
            'name' => 'Kecamatan',
            'kode_prop' => $kode['kode_prop'],
            'kode_kab' => $kode['kode_kab'],
            'kec' => $kec
        ];

        return view('KelembagaanPenyuluhan/Kecamatan/kecamatan', $data);
    }

    public function profilkec()
    {
        $wilModel = new KodeWilModel();
        $kec_model = new KecamatanModel;

        $get_param = $this->request->getGet();
        $kode_kec = $get_param['kode_kec'];

        $profilkec = $kec_model->getProfilKec($kode_kec);
        $namawil = $wilModel->getNamaWil(session()->get('kodebapel'));
        $penyuluhPNS = $kec_model->getPenyuluhPNS(session()->get('kodebapel'));
        $penyuluhTHL = $kec_model->getPenyuluhTHL(session()->get('kodebapel'));
        $kec = $kec_model->getKec(session()->get('kodebapel'));
        $kode = $wilModel->getKodeWil2(session()->get('kodebapel'));

        $data = [
            'title' => 'Profil BPP',
            'dt' => $profilkec,
            'namaprov' => $namawil['namaprov'],
            'namakab' => $namawil['namakab'],
            'penyuluhPNS' => $penyuluhPNS,
            'penyuluhTHL' => $penyuluhTHL,
            'kode_kec' => $kode_kec,
            'kode_prop' => $kode['kode_prop'],
            'kode_kab' => $kode['kode_kab'],
            'kec' => $kec
        ];
        return view('KelembagaanPenyuluhan/Kecamatan/detail_kecamatan', $data);
    }

    public function save()
    {
        try {
            $fileSampul = $this->request->getFile('foto');
            $fileSampul->move('/assets/img/');
            $namaSampul = $fileSampul->getName();
            $res = $this->model->save([
                'foto' => $namaSampul,
                'kode_prop' => $this->request->getPost('kode_prop'),
                'satminkal' => $this->request->getPost('satminkal'),
                'bentuk_lembaga' => $this->request->getPost('bentuk_lembaga'),
                'nama_bpp' => $this->request->getPost('nama_bpp'),
                'kecamatan' => $this->request->getPost('kecamatan'),
                'alamat' => $this->request->getPost('alamat'),
                'tgl_berdiri' => $this->request->getPost('tgl_berdiri'),
                'bln_berdiri' => $this->request->getPost('bln_berdiri'),
                'thn_berdiri' => $this->request->getPost('thn_berdiri'),
                'status_gedung' => $this->request->getPost('status_gedung'),
                'kondisi_bangunan' => $this->request->getPost('kondisi_bangunan'),
                'koord_lu_ls' => $this->request->getPost('koord_lu_ls'),
                'lu_ls' => $this->request->getPost('lu_ls'),
                'koord_bt' => $this->request->getPost('koord_bt'),
                'telp_bpp' => $this->request->getPost('telp_bpp'),
                'email' => $this->request->getPost('email'),
                'website' => $this->request->getPost('website'),
                'ketua' => $this->request->getPost('ketua'),
                'kode_koord_penyuluh' => $this->request->getPost('kode_koord_penyuluh'),
                'nama_koord_penyuluh' => $this->request->getPost('nama_koord_penyuluh'),
                'nama_koord_penyuluh_thl' => $this->request->getPost('nama_koord_penyuluh_thl'),
                'koord_lainya_nip' => $this->request->getPost('koord_lainya_nip'),
                'roda_4_apbn' => $this->request->getPost('roda_4_apbn'),
                'roda_4_apbd' => $this->request->getPost('roda_4_apbd'),
                'roda_2_apbn' => $this->request->getPost('roda_2_apbn'),
                'roda_2_apbd' => $this->request->getPost('roda_2_apbd'),
                'pc_apbn' => $this->request->getPost('pc_apbn'),
                'pc_apbd' => $this->request->getPost('pc_apbd'),
                'laptop_apbn' => $this->request->getPost('laptop_apbn'),
                'laptop_apbd' => $this->request->getPost('laptop_apbd'),
                'printer_apbn' => $this->request->getPost('printer_apbn'),
                'printer_apbd' => $this->request->getPost('printer_apbd'),
                'modem_apbn' => $this->request->getPost('modem_apbn'),
                'modem_apbd' => $this->request->getPost('modem_apbd'),
                'lcd_apbn' => $this->request->getPost('lcd_apbn'),
                'lcd_apbd' => $this->request->getPost('lcd_apbd'),
                'kios_saprotan' => $this->request->getPost('kios_saprotan'),
                'pedagang_pengepul' => $this->request->getPost('pedagang_pengepul'),
                'gudang_pangan' => $this->request->getPost('gudang_pangan'),
                'perbankan' => $this->request->getPost('perbankan'),
                'industri_penyuluhan' => $this->request->getPost('industri_penyuluhan'),
                'luas_lahan_bp3k' => $this->request->getPost('luas_lahan_bp3k'),
                'luas_lahan_petani' => $this->request->getPost('luas_lahan_petani')
            ]);
            if ($res == false) {
                $data = [
                    "value" => false,
                    "message" => 'data tidak lengkap'
                ];
            } else {
                $data = [
                    "value" => true
                ];
            }
            return json_encode($data);
        } catch (\Exception $e) {
            $data = [
                "value" => false,
                "message" => $e->getMessage()
            ];
            return json_encode($data);
        }

        //return redirect()->to('/daftar_posluhdes?kode_kec=' . $this->request->getPost('kode_kec'));
    }
}
