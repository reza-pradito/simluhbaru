<?php

namespace App\Controllers\KelembagaanPelakuUtama\kelompoktani;

use App\Controllers\BaseController;
use App\Models\KelembagaanPelakuUtama\KelompokTani\KelompokTaniModel;
use App\Models\KelembagaanPelakuUtama\KelompokTani\ListPoktanModel;
use App\Models\KodeWilayah\KodeWilModel;

class KelompokTani extends BaseController
{
    public function kelompoktani()
    {
        $get_param = $this->request->getGet();

        if (empty(session()->get('status_user')) || session()->get('status_user') == '2') {
            $kode = '00';
        } elseif (session()->get('status_user') == '1') {
            $kode = session()->get('kodebakor');
        } elseif (session()->get('status_user') == '200') {
            $kode = session()->get('kodebapel');
        } elseif (session()->get('status_user') == '300') {
            $kode = session()->get('kodebpp');
        }
        $kelompoktani_model = new KelompokTaniModel();
        $kelompoktani_data = $kelompoktani_model->getKelompokTaniTotal($this->session->get('kodebapel'));

        $data = [

            'nama_kabupaten' => $kelompoktani_data['nama_kab'],
            'jum_poktan' => $kelompoktani_data['jum_poktan'],
            'tabel_data' => $kelompoktani_data['table_data'],
            'title' => 'Kelompok Tani',
            'name' => 'Kelompok Tani'
        ];

        return view('KelembagaanPelakuUtama/KelompokTani/kelompoktani', $data);
    }

    public function listpoktan()
    {
        $get_param = $this->request->getGet();
        $kode_kec = $get_param['kode_kec'];
        $listpoktan_model = new ListPoktanModel();
        $kodewil_model = new KodeWilModel();
        $desa = $listpoktan_model->getDesa($kode_kec);
        $listpoktan_data = $listpoktan_model->getKelompokTaniTotal($kode_kec);
        $kode_data = $kodewil_model->getKodeWil($kode_kec);
        

        $data = [

            'nama_kecamatan' => $listpoktan_data['nama_kec'],
            'jum' => $listpoktan_data['jum'],
            'tabel_data' => $listpoktan_data['table_data'],
            'title' => 'List Kelompok Tani',
            'name' => 'List Kelompok Tani',
            'desa' => $desa,
            'kode_kec' => $kode_kec,
            'kode_prop' => $kode_data['kode_prop']
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
