<?php

namespace App\Controllers\KelembagaanPelakuUtama\kelompoktani;

use App\Controllers\BaseController;
use App\Models\KelembagaanPelakuUtama\KelompokTani\ListPoktanModel;

class ListPokTan extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this->session = service('session');
        $this->config = config('Auth');
        $this->auth = service('authentication');
        $this->model = new ListPoktanModel();
    }
    public function listpoktan()
    {
       
        if (session()->get('username') == "") {
            return redirect()->to('login');
        }
        $get_param = $this->request->getGet();

        $kode_kec = $get_param['kode_kec'];
        $listpoktan_model = new ListPoktanModel();
        $desa = $listpoktan_model->getDesa($kode_kec);
        $listpoktan_data = $listpoktan_model->getKelompokTaniTotal($kode_kec);

        $data = [

            'nama_kecamatan' => $listpoktan_data['nama_kec'],
            'jum' => $listpoktan_data['jum'],
            'tabel_data' => $listpoktan_data['table_data'],
            'title' => 'List Kelompok Tani',
            'name' => 'List Kelompok Tani',
            'desa' => $desa
        ];

        return view('KelembagaanPelakuUtama/KelompokTani/listpoktan', $data);
    }
    public function save()
    {
        try {
            $res = $this->model->save([
                'kode_kec' => $this->request->getPost('kode_kec'),
                'kode_kab' => $this->request->getPost('kode_kab'),
                'kode_desa' => $this->request->getPost('kode_desa'),
                'nama_poktan' => $this->request->getPost('nama_poktan'),
                'ketua_poktan' => $this->request->getPost('ketua_poktan'),
                'alamat' => $this->request->getPost('alamat'),
                'simluh_tahun_bentuk' => $this->request->getPost('simluh_tahun_bentuk'),
                'status' => $this->request->getPost('status'),
                'simluh_tahun_tap_kelas' => $this->request->getPost('simluh_tahun_tap_kelas'),
                'simluh_kelas_kemampuan' => $this->request->getPost('simluh_kelas_kemampuan'),
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
    public function edit($id_poktan)
    {
        $poktan = $this->model->getDataById($id_poktan);
        echo $poktan;
    }

    public function update($id_poktan)
    {
        
        $kode_kec = $this->request->getPost('kode_kec');
        $kode_kab = $this->request->getPost('kode_kab');
        $kode_desa = $this->request->getPost('kode_desa');
        $nama_poktan = $this->request->getPost('nama_poktan');
        $ketua_poktan = $this->request->getPost('ketua_poktan');
        $alamat = $this->request->getPost('alamat');
        $simluh_tahun_bentuk = $this->request->getPost('simluh_tahun_bentuk');
        $status = $this->request->getPost('status');
        $simluh_tahun_tap_kelas = $this->request->getPost('simluh_tahun_tap_kelas');
        $simluh_kelas_kemampuan = $this->request->getPost('simluh_kelas_kemampuan');
        $this->model->save([
            'id_poktan' => $id_poktan,
            'kode_kec' => $kode_kec,
            'kode_kab' => $kode_kab,
            'kode_desa' => $kode_desa,
            'nama_poktan' => $nama_poktan,
            'ketua_poktan' => $ketua_poktan,
            'alamat' => $alamat,
            'simluh_tahun_bentuk' => $simluh_tahun_bentuk,
            'status' => $status,
            'simluh_tahun_tap_kelas' => $simluh_tahun_tap_kelas,
            'simluh_kelas_kemampuan' => $simluh_kelas_kemampuan,
        ]);

        //session()->setFlashdata('pesan', 'Data berhasil diubah');

    }
    public function delete($id_poktan)
    {
        $this->model->delete($id_poktan);
        return redirect()->to('/kelompoktani');
    }
}
