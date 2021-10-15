<?php

namespace App\Controllers\KelembagaanPelakuUtama\KelembagaanPetaniLainnya;

use App\Controllers\BaseController;
use App\Models\KelembagaanPelakuUtama\KelembagaanPetaniLainnya\ListKEP2LModel;


class ListKEP2L extends BaseController
{
    public function listkep2l()
    {
        if (session()->get('username') == "") {
            return redirect()->to('login');
        }
        $get_param = $this->request->getGet();
     
        $kode_kec = $get_param['kode_kec'];
        $listkep2l_model = new ListKEP2LModel();
        $desa = $listkep2l_model->getDesa($kode_kec);
        $komoditas = $listkep2l_model->getKomoditas();
        $listkep2l_data = $listkep2l_model->getListKEP2LTotal($kode_kec);


        $data = [

            'nama_kecamatan' => $listkep2l_data['nama_kec'],
            'jum' => $listkep2l_data['jum'],
            'tabel_data' => $listkep2l_data['table_data'],
            'title' => 'List Kelompok Petani Lainnya',
            'name' => 'List Kelompok Petani Lainnya',
            'desa' => $desa,
            'komoditas' => $komoditas,
            'kode_kec' => $kode_kec

        ];

        return view('KelembagaanPelakuUtama/KelembagaanPetaniLainnya/listkep2l', $data);
    }
    public function save()
    {
        try {
            $res = $this->model->save([
                'kode_kec' => $this->request->getPost('kode_kec'),
                'kode_kab' => $this->request->getPost('kode_kab'),
                'kode_desa' => $this->request->getPost('kode_desa'),
                'nama_poktan' => $this->request->getPost('nama_poktan'),
                'no_sk_cpl' => $this->request->getPost('no_sk_cpl'),
                'no_urut_sk' => $this->request->getPost('no_urut_sk'),
                'nama_poktan' => $this->request->getPost('nama_poktan'),
                'nama_ketua' => $this->request->getPost('nama_ketua'),
                'nama_sekretaris' => $this->request->getPost('nama_sekretaris'),
                'nama_bendahara' => $this->request->getPost('nama_bendahara'),
                'alamat' => $this->request->getPost('alamat'),
                'tanggal_bentuk' => $this->request->getPost('tanggal_bentuk'),
                'status' => $this->request->getPost('status'),
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
    public function edit($id_p2l)
    {
        $p2l = $this->model->getDataById($id_p2l);
        echo $p2l;
    }

    public function update($id_p2l)
    {
        
        $kode_kec = $this->request->getPost('kode_kec');
        $kode_kab = $this->request->getPost('kode_kab');
        $kode_desa = $this->request->getPost('kode_desa');
        $no_sk_cpl = $this->request->getPost('no_sk_cpl');
        $no_urut_sk = $this->request->getPost('no_urut_sk');
        $nama_poktan = $this->request->getPost('nama_poktan');
        $nama_ketua = $this->request->getPost('nama_ketua');
        $nama_sekretaris = $this->request->getPost('nama_sekretaris');
        $nama_bendahara = $this->request->getPost('nama_bendahara');
        $alamat = $this->request->getPost('alamat');
        $tanggal_bentuk = $this->request->getPost('tanggal_bentuk');
        $kode_komoditas_hor = $this->request->getPost('kode_komoditas_hor');
        $status = $this->request->getPost('status');
        $this->model->save([
            'id_p2l' => $id_p2l,
            'kode_kec' => $kode_kec,
            'kode_kab' => $kode_kab,
            'kode_desa' => $kode_desa,
            'no_sk_cpl' => $no_sk_cpl,
            'no_urut_sk' => $no_urut_sk,
            'nama_poktan' => $nama_poktan,
            'nama_ketua' => $nama_ketua,
            'nama_bendahara' => $nama_bendahara,
            'nama_sekretaris' => $nama_sekretaris,
            'alamat' => $alamat,
            'tanggal_bentuk' => $tanggal_bentuk,
            'kode_komoditas_hor' => $kode_komoditas_hor,
            'status' => $status,
        ]);

        //session()->setFlashdata('pesan', 'Data berhasil diubah');

    }
    public function delete($id_p2l)
    {
        $this->model->delete($id_p2l);
        return redirect()->to('/listkep2l');
    }
}