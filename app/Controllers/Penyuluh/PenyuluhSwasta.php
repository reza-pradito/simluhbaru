<?php

namespace App\Controllers\Penyuluh;

use App\Controllers\BaseController;
use App\Models\penyuluh\PenyuluhSwastaModel;

class PenyuluhSwasta extends BaseController
{
    public function __construct()
    {
        $this->session = service('session');
        $this->config = config('Auth');
        $this->auth = service('authentication');

        $this->model = new PenyuluhSwastaModel();
    }

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
        try {
            $res = $this->model->save([
                'jenis_penyuluh' => $this->request->getPost('jenis_penyuluh'),
                'noktp' => $this->request->getPost('noktp'),
                'nama' => $this->request->getPost('nama'),
                'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                'bln_lahir' => $this->request->getPost('bln_lahir'),
                'thn_lahir' => $this->request->getPost('thn_lahir'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'satminkal' => $this->request->getPost('satminkal'),
                'lokasi_kerja' => $this->request->getPost('lokasi_kerja'),
                'alamat' => $this->request->getPost('alamat'),
                'dati2' => $this->request->getPost('dati2'),
                'kodepos' => $this->request->getPost('kodepos'),
                'kode_prop' => $this->request->getPost('kode_prop'),
                'telp' => $this->request->getPost('telp'),
                'email' => $this->request->getPost('email'),
                'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
                'alamat_perush' => $this->request->getPost('alamat_perush'),
                'telp_perush' => $this->request->getPost('telp_perush'),
                'jabatan_di_perush' => $this->request->getPost('jabatan_di_perush'),
                'tempat_tugas' => $this->request->getPost('tempat_tugas')
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
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to('/penyuluhswasta');
    }

    public function edit($id_swa)
    {
        $swasta = $this->model->getDetailEdit($id_swa);
        echo $swasta;
    }

    public function update($id_swa)
    {
        //$id = $this->request->getVar('idjab');
        $jenis_penyuluh = $this->request->getPost('jenis_penyuluh');
        $noktp = $this->request->getPost('noktp');
        $nama = $this->request->getPost('nama');
        $tgl_lahir = $this->request->getPost('tgl_lahir');
        $bln_lahir = $this->request->getPost('bln_lahir');
        $thn_lahir = $this->request->getPost('thn_lahir');
        $tempat_lahir = $this->request->getPost('tempat_lahir');
        $jenis_kelamin = $this->request->getPost('jenis_kelamin');
        $satminkal = $this->request->getPost('satminkal');
        $lokasi_kerja = $this->request->getPost('lokasi_kerja');
        $alamat = $this->request->getPost('alamat');
        $dati2 = $this->request->getPost('dati2');
        $kodepos = $this->request->getPost('kodepos');
        $kode_prop = $this->request->getPost('kode_prop');
        $telp = $this->request->getPost('telp');
        $email = $this->request->getPost('email');
        $nama_perusahaan = $this->request->getPost('nama_perusahaan');
        $alamat_perush = $this->request->getPost('alamat_perush');
        $telp_perush = $this->request->getPost('telp_perush');
        $jabatan_di_perush = $this->request->getPost('jabatan_di_perush');
        $tempat_tugas = $this->request->getPost('tempat_tugas');

        $this->model->save([
            'id_swa' => $id_swa,
            'jenis_penyuluh' => $jenis_penyuluh,
            'noktp' => $noktp,
            'nama' => $nama,
            'tgl_lahir' => $tgl_lahir,
            'bln_lahir' => $bln_lahir,
            'thn_lahir' => $thn_lahir,
            'tempat_lahir' => $tempat_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'satminkal' => $satminkal,
            'lokasi_kerja' => $lokasi_kerja,
            'alamat' => $alamat,
            'dati2' => $dati2,
            'kodepos' => $kodepos,
            'kode_prop' => $kode_prop,
            'telp' => $telp,
            'email' => $email,
            'nama_perusahaan' => $nama_perusahaan,
            'alamat_perush' => $alamat_perush,
            'telp_perush' => $telp_perush,
            'jabatan_di_perush' => $jabatan_di_perush,
            'tempat_tugas' => $tempat_tugas
        ]);

        //session()->setFlashdata('pesan', 'Data berhasil diubah');

    }

    // public function DetailEdit($id)
    // {
    //     $penyuluh_model = new PenyuluhSwastaModel;

    //     $penyuswa = $penyuluh_model->getDetailEdit($id);
    //     echo json_encode($penyuswa);
    // }

    // public function update()
    // {
    //     $penyuluh_model = new PenyuluhSwastaModel;
    //     $id_swa = $this->request->getPost('id_swa');
    //     $data = [
    //         'jenis_penyuluh' => $this->request->getPost('jenis_penyuluh'),
    //         'noktp' => $this->request->getPost('noktp'),
    //         'nama' => $this->request->getPost('nama'),
    //         'tgl_lahir' => $this->request->getPost('tgl_lahir'),
    //         'bln_lahir' => $this->request->getPost('bln_lahir'),
    //         'thn_lahir' => $this->request->getPost('thn_lahir'),
    //         'tempat_lahir' => $this->request->getPost('tempat_lahir'),
    //         'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
    //         'satminkal' => $this->request->getPost('satminkal'),
    //         'lokasi_kerja' => $this->request->getPost('lokasi_kerja'),
    //         'alamat' => $this->request->getPost('alamat'),
    //         'dati2' => $this->request->getPost('dati2'),
    //         'kodepos' => $this->request->getPost('kodepos'),
    //         'kode_prop' => $this->request->getPost('kode_prop'),
    //         'telp' => $this->request->getPost('telp'),
    //         'email' => $this->request->getPost('email'),
    //         'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
    //         'alamat_perush' => $this->request->getPost('alamat_perush'),
    //         'telp_perush' => $this->request->getPost('telp_perush'),
    //         'jabatan_di_perush' => $this->request->getPost('jabatan_di_perush'),
    //         'tempat_tugas' => $this->request->getPost('tempat_tugas')
    //     ];
    //     $penyuluh_model->update($id_swa, $data);

    //     $message = ['status' => 'Data berhasil di update'];
    //     return $this->response->setJSON($message);
    // }
}
