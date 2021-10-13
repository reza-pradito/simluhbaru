<?php

namespace App\Controllers\KelembagaanPelakuUtama\kelembagaanekonomipetani;

use App\Controllers\BaseController;
use App\Models\KelembagaanPelakuUtama\KelembagaanEkonomiPetani\ListKEPModel;

class ListKEP extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this->model = new ListKEPModel();
    }
    public function listkep()
    {
        
        if (session()->get('username') == "") {
            return redirect()->to('login');
        }
        $get_param = $this->request->getGet();

        $kode_kec = $get_param['kode_kec'];
        $listkep_model = new ListKEPModel();
        $listkep_data = $listkep_model->getListKEPTotal($kode_kec);

        $data = [

            'nama_kecamatan' => $listkep_data['nama_kec'],
            'tabel_data' => $listkep_data['table_data'],
            'title' => 'List Kelembagaan Ekonomi Petani',
            'name' => 'List Kelembagaan Ekonomi Petani'
        ];

        return view('KelembagaanPelakuUtama/KelembagaanEkonomiPetani/listkep', $data);
    }
    public function save()
    {
        try {
            $res = $this->model->save([
                'kode_kec' => $this->request->getPost('kode_kec'),
                'kode_kab' => $this->request->getPost('kode_kab'),
                'kode_desa' => $this->request->getPost('kode_desa'),
                'jenis_kep' => $this->request->getPost('jenis_kep'),
                'nama_kep' => $this->request->getPost('nama_kep'),
                'alamat' => $this->request->getPost('alamat'),
                'no_telp' => $this->request->getPost('no_telp'),
                'email' => $this->request->getPost('email'),
                'tahun_bentuk' => $this->request->getPost('tahun_bentuk'),
                'badan_hukum' => $this->request->getPost('badan_hukum'),
                'jum_anggota' => $this->request->getPost('jum_anggota'),
                'jum_poktan' => $this->request->getPost('jum_poktan'),
                'jum_gapoktan' => $this->request->getPost('jum_gapoktan'),
                'nama_direktur' => $this->request->getPost('nama_direktur'),

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
    public function edit($id_kep)
    {
        $kep = $this->model->getDataById($id_kep);
        echo $kep;
    }

    public function update($id_kep)
    {
        
        $kode_kec = $this->request->getPost('kode_kec');
        $kode_kab = $this->request->getPost('kode_kab');
        $kode_desa = $this->request->getPost('kode_desa');
        $nama_kep = $this->request->getPost('nama_kep');
        $jenis_kep = $this->request->getPost('jenis_kep');
        $nama_direktur = $this->request->getPost('nama_direktur');
        $jum_anggota = $this->request->getPost('jum_anggota');
        $jum_poktan = $this->request->getPost('jum_poktan');
        $jum_gapoktan = $this->request->getPost('jum_gapoktan');
        $tahun_bentuk = $this->request->getPost('tahun_bentuk');
        $badan_hukum = $this->request->getPost('badan_hukum');
        $alamat = $this->request->getPost('alamat');
        $no_telp = $this->request->getPost('no_telp');  
        $email = $this->request->getPost('email');
       
        $this->model->save([
            'id_kep' => $id_kep,
            'kode_kec' => $kode_kec,
            'kode_kab' => $kode_kab,
            'kode_desa' => $kode_desa,
            'nama_kep' => $nama_kep,
            'jenis_kep' => $jenis_kep,
            'alamat' => $alamat,
            'tahun_bentuk' => $tahun_bentuk,
            'badan_hukum' => $badan_hukum,
            'jum_anggota' => $jum_anggota,
            'jum_poktan' => $jum_poktan,
            'jum_gapoktan' => $jum_gapoktan,
            'no_telp' => $no_telp,
            'nama_direktur' => $nama_direktur,
            'email' => $email,
        ]);

        //session()->setFlashdata('pesan', 'Data berhasil diubah');

    }
    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to('/listkep');
    }
}
