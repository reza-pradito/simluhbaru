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
        $komoditas = $listpoktananggota_model->getKomoditas();
        $komoditas2 = $listpoktananggota_model->getKomoditas2();
        $komoditas3 = $listpoktananggota_model->getKomoditas3();
        $listpoktananggota_data = $listpoktananggota_model->getListPoktanAnggotaTotal($ip);

        $data = [
            
            'nama_poktan' => $listpoktananggota_data['nama_poktan'],
            'tabel_data' => $listpoktananggota_data['table_data'],
            'title' => 'List Kelompok Tani',
            'name' => 'List Kelompok Tani',
            'komoditas' => $komoditas,
             'komoditas2' => $komoditas2,
             'komoditas3' => $komoditas3,
        ];

        return view('KelembagaanPelakuUtama/KelompokTani/listpoktananggota', $data);
    }
    public function save()
    {
        try {
            $res = $this->model->save([
                'kode_kab' => $this->request->getPost('kode_kab'),
                'kode_kec' => $this->request->getPost('kode_kec'),
                'kode_desa' => $this->request->getPost('kode_desa'),
                'kode_prop' => $this->request->getPost('kode_prop'),
                'nama_anggota' => $this->request->getPost('nama_anggota'),
                'nama_ktp' => $this->request->getPost('nama_ktp'),
                'thn_lahir' => $this->request->getPost('thn_lahir'),
                'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                'bln_lahir' => $this->request->getPost('bln_lahir'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'kode_komoditas' => $this->request->getPost('kode_komoditas'),
                'volume' => $this->request->getPost('volume'),
                'alamat' => $this->request->getPost('alamat'),
                'no_ktp' => $this->request->getPost('no_ktp'),
                'no_hp' => $this->request->getPost('no_hp'),
                'status_anggota' => $this->request->getPost('status_anggota'),
                'kode_komoditas2' => $this->request->getPost('kode_komoditas2'),
                'volume2' => $this->request->getPost('volume2'),
                'kode_komoditas3' => $this->request->getPost('kode_komoditas3'),
                'volume3' => $this->request->getPost('volume3'),
                'lainnya' => $this->request->getPost('lainnya'),
                'luas_lahan_ternak_diusahakan' => $this->request->getPost('luas_lahan_ternak_diusahakan'),
                'luas_lahan_ternak_dimiliki' => $this->request->getPost('luas_lahan_ternak_dimiliki'),
                'titik_koordinat_lahan' => $this->request->getPost('titik_koordinat_lahan'),
                'kategori_petani_penggarap' => $this->request->getPost('kategori_petani_penggarap'),
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
    public function edit($id_anggota)
    {
        $anggota = $this->model->getDataById($id_anggota);
        echo $anggota;
    }

    public function update($id_anggota)
    {
       
       
        $nama_anggota = $this->request->getPost('nama_anggota');
        $kode_desa = $this->request->getPost('kode_desa');
        $kode_kec = $this->request->getPost('kode_kec');
        $kode_kab = $this->request->getPost('kode_kab');
        $kode_prop = $this->request->getPost('kode_prop');
        $nama_ktp = $this->request->getPost('nama_ktp');
        $tgl_lahir = $this->request->getPost('tgl_lahir');
        $bln_lahir = $this->request->getPost('bln_lahir');
        $thn_lahir = $this->request->getPost('thn_lahir');
        $jenis_kelamin = $this->request->getPost('jenis_kelamin');
        $kode_komoditas = $this->request->getPost('kode_komoditas');
        $volume = $this->request->getPost('volume');
        $alamat = $this->request->getPost('alamat');
        $no_ktp = $this->request->getPost('no_ktp');
        $no_hp = $this->request->getPost('no_hp');
        $status_anggota = $this->request->getPost('status_anggota');
        $kode_komoditas2 = $this->request->getPost('kode_komoditas2');
        $volume2 = $this->request->getPost('volume2');
        $kode_komoditas3 = $this->request->getPost('kode_komoditas3');
        $volume3 = $this->request->getPost('volume3');
        $lainnya = $this->request->getPost('lainnya');
        $luas_lahan_yang_diusahakan = $this->request->getPost('luas_lahan_yang_diuashakan');
        $luas_lahan_yang_dimiliki = $this->request->getPost('luas_lahan_yang_dimiliki');
        $titik_koordinat_lahan = $this->request->getPost('titik_koordinat_lahan');
        $kategori_petani_penggarap = $this->request->getPost('kategori_petani_penggarap');
        $this->model->save([
            
            'id_anggota' => $id_anggota,
            'nama_anggota' => $nama_anggota,
            'kode_desa' => $kode_desa,
            'kode_kab' => $kode_kab,
            'kode_kec' => $kode_kec,
            'kode_prop' => $kode_prop,
            'nama_ktp' => $nama_ktp,
            'tgl_lahir' => $tgl_lahir,
            'bln_lahir' => $bln_lahir,
            'thn_lahir' => $thn_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'alamat' => $alamat,
            'kode_komoditas' => $kode_komoditas,
            'volume' => $volume,
            'no_ktp' => $no_ktp,
            'no_hp' => $no_hp,
            'status_anggota' => $status_anggota,
            'kode_komoditas2' => $kode_komoditas2,
            'volume2' => $volume2,
            'kode_komoditas3' => $kode_komoditas3,
            'volume3' => $volume3,
            'lainnya' => $lainnya,
            'luas_lahan_yang_diusahakan' => $luas_lahan_yang_diusahakan,
            'luas_lahan_yang_dimiliki' => $luas_lahan_yang_dimiliki,
            'titik_koordinat_lahan' => $titik_koordinat_lahan,
            'kategori_petani_penggarap' => $kategori_petani_penggarap,
        ]);

        //session()->setFlashdata('pesan', 'Data berhasil diubah');

    }
    public function delete($id_anggota)
    {
        $this->model->delete($id_anggota);
        return redirect()->to('/listpoktaanggota');
    }
}