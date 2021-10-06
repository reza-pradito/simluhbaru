<?php

namespace App\Controllers\Penyuluh;

use App\Controllers\BaseController;
use App\Models\penyuluh\PenyuluhSwastaModel;

class PenyuluhSwasta extends BaseController
{
    public function __construct()
    {
        $this->model = new PenyuluhSwastaModel();
    }

    // public function get_items()
    // {
    //     $penyuluh_model = new PenyuluhSwastaModel();
    //     $swasta_data = $penyuluh_model->getPenyuluhSwastaTotal(session()->get('kodebapel'));
    //     $namaprop = $penyuluh_model->getPropvinsi();
    //     $tugas = $penyuluh_model->getTugas(session()->get('kodebapel'));
    //     $data = [
    //         'jml_data' => $swasta_data['jum'],
    //         'nama_kabupaten' => $swasta_data['nama_kab'],
    //         'tabel_data' => $swasta_data['table_data'],
    //         'namaprop' => $namaprop,
    //         'tugas' => $tugas,
    //         'title' => 'Penyuluh Swasta',
    //         'name' => 'Swasta'
    //     ];

    //     $output = view('kab/penyuluh/penyuluhswasta', $data);
    //     echo json_encode($output);
    // }

    public function penyuluhswasta()
    {

        // $get_param = $this->request->getGet();

        // $kode_kab = $get_param['kode_kab'];
        if (session()->get('username') == "") {
            return redirect()->to('login');
        }
        $penyuluh_model = new PenyuluhSwastaModel();
        $swasta_data = $penyuluh_model->getPenyuluhSwastaTotal(session()->get('kodebapel'));
        $namaprop = $penyuluh_model->getPropvinsi();
        $tugas = $penyuluh_model->getTugas(session()->get('kodebapel'));

        $data = [
            'jml_data' => $swasta_data['jum'],
            'nama_kabupaten' => $swasta_data['nama_kab'],
            'tabel_data' => $swasta_data['table_data'],
            'namaprop' => $namaprop,
            'tugas' => $tugas,
            'title' => 'Penyuluh Swasta',
            'name' => 'Swasta'
        ];

        return view('kab/penyuluh/penyuluhswasta', $data);
    }

    public function save()
    {
        $this->luhswasta->save([
            'jenis_penyuluh' => $this->request->getVar('jenis_penyuluh'),
            'noktp' => $this->request->getVar('noktp'),
            'nama' => $this->request->getVar('nama'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'bln_lahir' => $this->request->getVar('bln_lahir'),
            'thn_lahir' => $this->request->getVar('thn_lahir'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'satminkal' => $this->request->getVar('satminkal'),
            'lokasi_kerja' => $this->request->getVar('lokasi_kerja'),
            'alamat' => $this->request->getVar('alamat'),
            'dati2' => $this->request->getVar('dati2'),
            'kodepos' => $this->request->getVar('kodepos'),
            'kode_prop' => $this->request->getVar('kode_prop'),
            'telp' => $this->request->getVar('telp'),
            'email' => $this->request->getVar('email'),
            'nama_perusahaan' => $this->request->getVar('nama_perusahaan'),
            'alamat_perush' => $this->request->getVar('alamat_perush'),
            'telp_perush' => $this->request->getVar('telp_perush'),
            'jabatan_di_perush' => $this->request->getVar('jabatan_di_perush'),
            'tempat_tugas' => $this->request->getVar('tempat_tugas')
        ]);

        return redirect()->to('/penyuluhswasta');
    }
}
