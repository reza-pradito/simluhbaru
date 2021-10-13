<?php

namespace App\Controllers\KelembagaanPelakuUtama\GapoktanBersama;

use App\Controllers\BaseController;
use App\Models\KelembagaanPelakuUtama\GapoktanBersama\GapoktanBersamaModel;

class GapoktanBersama extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this->model = new GapoktanBersamaModel();
    }
    public function gapoktanbersama()
    {
        //  $get_param = $this->request->getGet();

        //  $kode_kab = $get_param['kode_kab'];
        if (session()->get('username') == "") {
            return redirect()->to('login');
        }
        $gapoktanbersama_model = new GapoktanBersamaModel;
        $gapoktanbersama_data = $gapoktanbersama_model->getGapoktanBersamaTotal(session()->get('kodebapel'));

        $data = [

            'nama_kabupaten' => $gapoktanbersama_data['nama_kab'],
            'jum' => $gapoktanbersama_data['jum'],
            'tabel_data' => $gapoktanbersama_data['table_data'],
            'title' => 'Gapoktan Bersama',
            'name' => 'Gapoktan Bersama'
        ];

        return view('KelembagaanPelakuUtama/GapoktanBersama/gapoktanbersama', $data);
    }
    public function save()
    {
        try {
            $res = $this->model->save([
                'kode_kec' => $this->request->getPost('kode_kec'),
                'kode_kab' => $this->request->getPost('kode_kab'),
                'kode_desa' => $this->request->getPost('kode_desa'),
                'namagapoktan' => $this->request->getPost('nama_gapoktan'),
                'ketua_gapoktan' => $this->request->getPost('ketua_gapoktan'),
                'alamat' => $this->request->getPost('alamat'),
                'simluh_tahun_bentuk' => $this->request->getPost('simluh_tahun_bentuk'),
                'simluh_sk_pengukuhan' => $this->request->getPost('simluh_sk_pengukuhan'),
                'simluh_bendahara' => $this->request->getPost('simluh_bendahara'),
                'simluh_sekretaris' => $this->request->getPost('simluh_sekretaris'),
                
            ]);
            if($res == false){
                $data = [
                    "value" => false,
                    "message" => 'data tidak lengkap'
                ];
            }else{
                $data = [
                    "value" => true
                ];
            }
            return json_encode($data);
        } catch (\Exception $e){
            $data = [
                "value" => false,
                "message" => $e->getMessage() 
            ];
            return json_encode($data);
        }
        // return redirect()->to('/listpoktan?kode_kec=' . $this->request->getPost('kode_kec'));
    }
    public function edit($id_gapber)
    {
        $poktan = $this->model->getDataById($id_gapber);
        echo $poktan;
    }

    public function update($id_gapber)
    {
        
        $kode_kec = $this->request->getPost('kode_kec');
        $kode_kab = $this->request->getPost('kode_kab');
        $kode_desa = $this->request->getPost('kode_desa');
        $nama_gapoktan = $this->request->getPost('nama_gapoktan');
        $ketua_gapoktan = $this->request->getPost('ketua_gapoktan');
        $alamat = $this->request->getPost('alamat');
        $simluh_tahun_bentuk = $this->request->getPost('simluh_tahun_bentuk');
        $simluh_sk_pengukuhan = $this->request->getPost('simluh_sk_pengukuhan');
        $simluh_bendahara = $this->request->getPost('simluh_bendahara');
        $simluh_sekretaris = $this->request->getPost('simluh_sekretaris');
        $this->model->save([
            'id_gapber' => $id_gapber,
            'kode_kec' => $kode_kec,
            'kode_kab' => $kode_kab,
            'kode_desa' => $kode_desa,
            'nama_gapoktan' => $nama_gapoktan,
            'ketua_gapoktan' => $ketua_gapoktan,
            'alamat' => $alamat,
            'simluh_tahun_bentuk' => $simluh_tahun_bentuk,
            'simluh_sk_pengukuhan' => $simluh_sk_pengukuhan,
            'simluh_sekretaris' => $simluh_sekretaris,
            'simluh_bendahara' => $simluh_bendahara,
        ]);

        //session()->setFlashdata('pesan', 'Data berhasil diubah');

    }
    public function delete($id_gapber)
    {
        $this->model->delete($id_gapber);
        return redirect()->to('/gapoktanbersama');
    }
}
