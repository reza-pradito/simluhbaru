<?php

namespace App\Controllers\Penyuluh;

use App\Controllers\BaseController;
use App\Models\penyuluh\PenyuluhSwadayaModel;

class PenyuluhSwadaya extends BaseController
{

    public function penyuluhswadaya()
    {
        if (session()->get('username') == "") {
            return redirect()->to('login');
        }


        $penyuluh_model = new PenyuluhSwadayaModel();
        $swadaya_data = $penyuluh_model->getPenyuluhSwadayaTotal(session()->get('kodebapel'));
        $namaprop = $penyuluh_model->getPropvinsi();
        $tugas = $penyuluh_model->getTugas(session()->get('kodebapel'));
        $unitkerja = $penyuluh_model->getUnitKerja(session()->get('kodebapel'));

        $data = [
            'jml_data' => $swadaya_data['jum'],
            'nama_kabupaten' => $swadaya_data['nama_kab'],
            'tabel_data' => $swadaya_data['table_data'],
            'tugas' => $tugas,
            'unitkerja' => $unitkerja,
            'namaprop' => $namaprop,
            'title' => 'Penyuluh Swadaya',
            'name' => 'Swadaya'
        ];

        // var_dump($data);
        // die();

        return view('kab/penyuluh/penyuluhswadaya', $data);
    }

    function action()
    {
        if ($this->request->getVar('action')) {
            $action = $this->request->getVar('action');

            if ($action == 'get_wil_kerja') {
                $penyuluh_model = new PenyuluhSwadayaModel();

                $wilkerdata = $penyuluh_model->getDesa->where('id_daerah', $this->request->getVar('id_daerah'));

                echo json_encode($wilkerdata);
            }
        }
    }

    // public function getWilKer($tempat_tugas = null)
    // {
    //     $penyuluh_model = new PenyuluhSwadayaModel();
    //     $tugas = $penyuluh_model->getTugas(session()->get('kodebapel'));
    //     $data = [
    //         'tugas' => $tugas
    //     ];
    //     return json_encode($data);
    // }

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
                'status_kel' => $this->request->getPost('status_kel'),
                'agama' => $this->request->getPost('agama'),
                'ahli_tp' => $this->request->getPost('ahli_tp'),
                'detail_tp' => $this->request->getPost('detail_tp'),
                'ahli_nak' => $this->request->getPost('ahli_nak'),
                'detail_nak' => $this->request->getPost('detail_nak'),
                'ahli_bun' => $this->request->getPost('ahli_bun'),
                'detail_bun' => $this->request->getPost('detail_bun'),
                'ahli_hor' => $this->request->getPost('ahli_hor'),
                'detail_hor' => $this->request->getPost('detail_hor'),
                'ahli_lainnya' => $this->request->getPost('ahli_lainnya'),
                'detail_lainnya' => $this->request->getPost('detail_lainnya'),
                'instansi_pembina' => $this->request->getPost('instansi_pembina'),
                'satminkal' => $this->request->getPost('satminkal'),
                'prop_satminkal' => $this->request->getPost('prop_satminkal'),
                'unit_kerja' => $this->request->getPost('unit_kerja'),
                'kode_kab' => $this->request->getPost('kode_kab'),
                'tempat_tugas' => $this->request->getPost('tempat_tugas'),
                'wil_kerja' => $this->request->getPost('wil_kerja'),
                'alamat' => $this->request->getPost('alamat'),
                'dati2' => $this->request->getPost('dati2'),
                'kodepos' => $this->request->getPost('kodepos'),
                'kode_prop' => $this->request->getPost('kode_prop'),
                'telp' => $this->request->getPost('telp'),
                'email' => $this->request->getPost('email'),
                'no_sk_penetapan' => $this->request->getPost('no_sk_penetapan'),
                'pejabat_menetapkan' => $this->request->getPost('pejabat_menetapkan'),
                'tingkat' => $this->request->getPost('tingkat'),
                'tahun_pelatihan1' => $this->request->getPost('tahun_pelatihan1'),
                'nm_pelatihan1' => $this->request->getPost('nm_pelatihan1'),
                'tahun_pelatihan2' => $this->request->getPost('tahun_pelatihan2'),
                'nm_pelatihan2' => $this->request->getPost('nm_pelatihan2'),
                'tahun_pelatihan3' => $this->request->getPost('tahun_pelatihan3'),
                'nm_pelatihan3' => $this->request->getPost('nm_pelatihan3'),
                'tahun_pelatihan4' => $this->request->getPost('tahun_pelatihan4'),
                'nm_pelatihan4' => $this->request->getPost('nm_pelatihan4'),
                'tahun_pelatihan5' => $this->request->getPost('tahun_pelatihan5'),
                'nm_pelatihan5' => $this->request->getPost('nm_pelatihan5'),
                'tahun_pelatihan6' => $this->request->getPost('tahun_pelatihan6'),
                'nm_pelatihan6' => $this->request->getPost('nm_pelatihan6'),
                'tgl_update' => $this->request->getPost('tgl_update'),
                'wil_kerja2' => $this->request->getPost('wil_kerja2'),
                'wil_kerja3' => $this->request->getPost('wil_kerja3'),
                'wil_kerja4' => $this->request->getPost('wil_kerja4'),
                'wil_kerja5' => $this->request->getPost('wil_kerja5'),
                'kecamatan_tugas' => $this->request->getPost('kecamatan_tugas'),
                'mapping' => $this->request->getPost('mapping'),
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
}
