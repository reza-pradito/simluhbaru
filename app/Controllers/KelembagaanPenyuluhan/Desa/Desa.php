<?php

namespace App\Controllers\KelembagaanPenyuluhan\Desa;

use App\Controllers\BaseController;
use App\Models\KelembagaanPenyuluhan\Desa\DesaModel;
use App\Models\KelembagaanPenyuluhan\Desa\PosluhdesModel;


class Desa extends BaseController
{
    protected $session;

    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
    }
    public function desa()
    {

        $desa_model = new DesaModel;
        $desa_data = $desa_model->getDesaTotal($this->session->get('kodebapel'));
        $data = [
            'jum_des' => $desa_data['jum_des'],
            'nama_kabupaten' => $desa_data['nama_kab'],
            'tabel_data' => $desa_data['table_data'],
            'title' => 'Desa',
            'name' => 'Desa'
        ];

        return view('KelembagaanPenyuluhan/Desa/desa', $data);
    }

    public function listdesa()
    {

        $get_param = $this->request->getGet();

        $kode_kec = $get_param['kode_kec'];
        $posluhdes_model = new PosluhdesModel;
        $pen_swa = $posluhdes_model->getPenyuluhSwadaya($kode_kec);
        $desa = $posluhdes_model->getDesa($kode_kec);
        //dd($pen_swa);
        // $data['desa'] = $posluhdes_model->orderBy('nm_desa', 'ASC')->findAll();
        $posluhdes_data = $posluhdes_model->getPosluhdesTotal($kode_kec);

        $data = [
            'jum_kec' => $posluhdes_data['jum_kec'],
            'nama_kecamatan' => $posluhdes_data['nama_kec'],
            'tabel_data' => $posluhdes_data['table_data'],
            'desa' => $desa,
            'pen_swa' => $pen_swa,
            'title' => 'Daftar Posluhdes',
            'name' => 'Posluhdes'
        ];

        return view('KelembagaanPenyuluhan/Desa/daftar_posluhdes', $data);
    }

    public function add_pos()
    {
        $get_param = $this->request->getGet();

        $kode_kec = $get_param['kode_kec'];
        session();
        $posluhdes_model = new PosluhdesModel;
        $pen_swa = $posluhdes_model->getPenyuluhSwadaya($kode_kec);
        $desa = $posluhdes_model->getDesa($kode_kec);
        $posluhdes_data = $posluhdes_model->getPosluhdesTotal($kode_kec);

        $data = [
            'title' => 'Form Add Posluhdes',
            'nama_kecamatan' => $posluhdes_data['nama_kec'],
            'tabel_data' => $posluhdes_data['table_data'],
            'desa' => $desa,
            'pen_swa' => $pen_swa,
            'validation' => \Config\Services::validation()
        ];
        return view('KelembagaanPenyuluhan/Desa/add_pos', $data);
    }

    public function save()
    {
        $this->posModel->save([
            'kode_kab' => $this->request->getVar('kode_kab'),
            'kode_kec' => $this->request->getVar('kode_kec'),
            'kode_desa' => $this->request->getVar('kode_desa'),
            'nama' => $this->request->getVar('nama'),
            'ketua' => $this->request->getVar('ketua'),
            'bendahara' => $this->request->getVar('bendahara'),
            'sekretaris' => $this->request->getVar('sekretaris'),
            'jum_anggota' => $this->request->getVar('jum_anggota'),
            'alamat' => $this->request->getVar('alamat'),
            'tahun_berdiri' => $this->request->getVar('tahun_berdiri'),
            'penyuluh_swadaya' => $this->request->getVar('penyuluh_swadaya')
        ]);

        return redirect()->to('/desa');
    }

    public function edit()
    {
        $idpos = $this->request->getVar('idpos');
        $data = [
            //'idpos' => $idpos,
            'kode_kab' => $this->request->getVar('kode_kab'),
            'kode_kec' => $this->request->getVar('kode_kec'),
            'kode_desa' => $this->request->getVar('kode_desa'),
            'nama' => $this->request->getVar('nama'),
            'ketua' => $this->request->getVar('ketua'),
            'bendahara' => $this->request->getVar('bendahara'),
            'sekretaris' => $this->request->getVar('sekretaris'),
            'jum_anggota' => $this->request->getVar('jum_anggota'),
            'alamat' => $this->request->getVar('alamat'),
            'tahun_berdiri' => $this->request->getVar('tahun_berdiri'),
            'penyuluh_swadaya' => $this->request->getVar('penyuluh_swadaya')
        ];

        $this->posModel->ubah($data, $idpos);

        return redirect()->to('/desa');
    }

    public function delete($idpos)
    {
        $this->posModel->delete($idpos);
        return redirect()->to('/desa');
    }
}
