<?php

namespace App\Controllers\Penyuluh;

use App\Controllers\BaseController;
use App\Models\penyuluh\PenyuluhPNSModel;

ini_set("memory_limit", "912M");
class PenyuluhPns extends BaseController
{

    public function __construct()
    {
        $this->session = service('session');
        $this->config = config('Auth');
        $this->auth = service('authentication');

        $this->model = new PenyuluhPNSModel();
    }

    public function penyuluhpns()
    {
        if (empty(session()->get('status_user')) || session()->get('status_user') == '2') {
            $kode = '00';
        } elseif (session()->get('status_user') == '1') {
            $kode = session()->get('kodebakor');
        } elseif (session()->get('status_user') == '200') {
            $kode = session()->get('kodebapel');
        } elseif (session()->get('status_user') == '300') {
            $kode = session()->get('kodebpp');
        }

        //  d($kode);

        $penyuluh_model = new PenyuluhPNSModel();
        $pns_data = $penyuluh_model->getPenyuluhPNSTotal($kode);
        $status = $penyuluh_model->getStatus();

        if (session()->get('username') == "") {
            return redirect()->to('login');
        }
        // if (session()->get('status_user') == '1') {
        //     $kode = substr(session()->get('kodebakor'), 0, 2);
        // } elseif (session()->get('status_user') == '200') {
        //     $kode = session()->get('kodebapel');
        // }

        $penyuluh_model = new PenyuluhPNSModel();
        $pns_data = $penyuluh_model->getPenyuluhPNSTotal($kode);
        $status = $penyuluh_model->getStatus();
        // dd($pns_data);
        // $namaprop = $penyuluh_model->getPropvinsi();
        // $pendidikan = $penyuluh_model->getPendidikan();
        // $tugas = $penyuluh_model->getTugas($kode);


        $data = [
            'jml_data' => $pns_data['jum'],
            'nama_kabupaten' => $pns_data['nama_kab'],
            'tabel_data' => $pns_data['table_data'],
            'status' => $status,
            'title' => 'Penyuluh PNS',
            'name' => 'PNS'
        ];

        return view('kab/penyuluh/penyuluhpns', $data);
    }

    public function editstatus($idpns)
    {
        $pns = $this->model->getDetailEditStatus($idpns);
        echo $pns;
    }

    public function updatestatus($idpns)
    {
        //$id = $this->request->getVar('idjab');
        $nama = $this->request->getPost('nama');
        $nip = $this->request->getPost('nip');
        $nip_lama = $this->request->getPost('nip_lama');
        $gelar_blk = $this->request->getPost('gelar_blk');
        $gelar_dpn = $this->request->getPost('gelar_dpn');
        $status = $this->request->getPost('status');
        $tgl_status = $this->request->getPost('tgl_status');
        $ket_status = $this->request->getPost('ket_status');

        $this->model->save([
            'id' => $idpns,
            'nama' => $nama,
            'nip_lama' => $nip_lama,
            'nip' => $nip,
            'gelar_dpn' => $gelar_dpn,
            'gelar_blk' => $gelar_blk,
            'status' => $status,
            'tgl_status' => $tgl_status,
            'ket_status' => $ket_status
        ]);

        //session()->setFlashdata('pesan', 'Data berhasil diubah');

    }
}
