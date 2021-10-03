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
        //$this->model = new PosluhdesModel;
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

        //$output = view('KelembagaanPenyuluhan/Desa/source-pos', $data);
        //echo json_encode($data);
        //$data = json_encode($data);
        return view('KelembagaanPenyuluhan/Desa/daftar_posluhdes', $data);
    }

    public function detailPosluhdes($id)
    {
        $posluhdes_model = new PosluhdesModel;

        $posluh = $posluhdes_model->getPosluhdes($id);
        echo json_encode($posluh);
    }

    public function formaddpos()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('/KelembagaanPenyuluhan/Desa/modaltambah/')
            ];

            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
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
