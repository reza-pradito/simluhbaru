<?php

namespace App\Controllers\KelembagaanPelakuUtama\KelompokTani;
use App\Controllers\BaseController;
use App\Models\KelembagaanPelakuUtama\KelompokTani\ListPoktanAnggotaModel;

class ListPoktanAnggota extends BaseController
{
    public function listpoktananggota()
    {
        $get_param = $this->request->getGet();

        $ip = $get_param['ip'];
        $listpoktananggota_model = new ListPoktanAnggotaModel();
        $listpoktananggota_data = $listpoktananggota_model->getListPoktanAnggotaTotal($ip);

        $data = [
            
            'nama_poktan' => $listpoktananggota_data['nama_poktan'],
            'tabel_data' => $listpoktananggota_data['table_data'],
            'title' => 'List Kelompok Tani',
            'name' => 'List Kelompok Tani'
        ];

        return view('KelembagaanPelakuUtama/KelompokTani/listpoktananggota', $data);
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
        ]);

        //session()->setFlashdata('pesan', 'Data berhasil diubah');

    }
    public function delete($id_poktan)
    {
        $this->model->delete($id_poktan);
        return redirect()->to('/listpoktan');
    }
}