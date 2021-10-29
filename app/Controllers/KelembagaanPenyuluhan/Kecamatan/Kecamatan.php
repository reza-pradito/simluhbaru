<?php

namespace App\Controllers\KelembagaanPenyuluhan\Kecamatan;

use App\Controllers\BaseController;
use App\Models\KelembagaanPenyuluhan\Kecamatan\KecamatanModel;
use App\Models\KodeWilayah\KodeWilModel;


class Kecamatan extends BaseController
{
    protected $session;

    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        $this->model = new KecamatanModel();
    }

    public function kecamatan()
    {

        $kec_model = new KecamatanModel;
        $kode_model = new KodeWilModel();
        $kec_data = $kec_model->getKecTotal($this->session->get('kodebapel'));
        $penyuluhPNS = $kec_model->getPenyuluhPNS(session()->get('kodebapel'));
        $penyuluhTHL = $kec_model->getPenyuluhTHL(session()->get('kodebapel'));
        $kec = $kec_model->getKec(session()->get('kodebapel'));
        $kode = $kode_model->getKodeWil2(session()->get('kodebapel'));

        $data = [
            //'jumpns' => $kec_data['jumpns'],
            'nama_kabupaten' => $kec_data['nama_kab'],
            'tabel_data' => $kec_data['table_data'],
            'penyuluhPNS' => $penyuluhPNS,
            'penyuluhTHL' => $penyuluhTHL,
            'title' => 'Kecamatan',
            'name' => 'Kecamatan',
            'kode_prop' => $kode['kode_prop'],
            'kode_kab' => $kode['kode_kab'],
            'kec' => $kec,
            'validation' => \Config\Services::validation()
        ];

        return view('KelembagaanPenyuluhan/Kecamatan/kecamatan', $data);
    }

    public function profilkec()
    {
        $wilModel = new KodeWilModel();
        $kec_model = new KecamatanModel;

        $get_param = $this->request->getGet();
        $kode_kec = $get_param['kode_kec'];

        $profilkec = $kec_model->getProfilKec($kode_kec);
        $namawil = $wilModel->getNamaWil(session()->get('kodebapel'));
        $penyuluhPNS = $kec_model->getPenyuluhPNS(session()->get('kodebapel'));
        $penyuluhTHL = $kec_model->getPenyuluhTHL(session()->get('kodebapel'));
        $kec = $kec_model->getKec(session()->get('kodebapel'));
        $kode = $wilModel->getKodeWil2(session()->get('kodebapel'));

        $data = [
            'title' => 'Profil BPP',
            'dt' => $profilkec,
            'namaprov' => $namawil['namaprov'],
            'namakab' => $namawil['namakab'],
            'penyuluhPNS' => $penyuluhPNS,
            'penyuluhTHL' => $penyuluhTHL,
            'kode_kec' => $kode_kec,
            'kode_prop' => $kode['kode_prop'],
            'kode_kab' => $kode['kode_kab'],
            'kec' => $kec
        ];
        return view('KelembagaanPenyuluhan/Kecamatan/detail_kecamatan', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'foto' => [
                'rules' => 'max_size[foto,3072]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'File yang anda pilih bukan gambar',
                    'mime_in' => 'File yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/kecamatan')->withInput();
        }

        $fileSampul = $this->request->getFile('foto');

        if ($fileSampul->getError() == 4) {
            $namaSampul = 'logo.png';
        } else {
            $fileSampul->move('assets/img');
            $namaSampul = $fileSampul->getName();
        }

        $this->model->save([
            'foto' => $namaSampul,
            'kode_prop' => $this->request->getVar('kode_prop'),
            'satminkal' => $this->request->getVar('satminkal'),
            'bentuk_lembaga' => $this->request->getVar('bentuk_lembaga'),
            'nama_bpp' => $this->request->getVar('nama_bpp'),
            'kecamatan' => $this->request->getVar('kecamatan'),
            'alamat' => $this->request->getVar('alamat'),
            'tgl_berdiri' => $this->request->getVar('tgl_berdiri'),
            'bln_berdiri' => $this->request->getVar('bln_berdiri'),
            'thn_berdiri' => $this->request->getVar('thn_berdiri'),
            'status_gedung' => $this->request->getVar('status_gedung'),
            'kondisi_bangunan' => $this->request->getVar('kondisi_bangunan'),
            'koordinat_lokasi_bpp' => $this->request->getVar('koordinat_lokasi_bpp'),
            'telp_bpp' => $this->request->getVar('telp_bpp'),
            'email' => $this->request->getVar('email'),
            'website' => $this->request->getVar('website'),
            'ketua' => $this->request->getVar('ketua'),
            'kode_koord_penyuluh' => $this->request->getVar('kode_koord_penyuluh'),
            'nama_koord_penyuluh' => $this->request->getVar('nama_koord_penyuluh'),
            'nama_koord_penyuluh_thl' => $this->request->getVar('nama_koord_penyuluh_thl'),
            'koord_lainya_nip' => $this->request->getVar('koord_lainya_nip'),
            'roda_4_apbn' => $this->request->getVar('roda_4_apbn'),
            'roda_4_apbd' => $this->request->getVar('roda_4_apbd'),
            'roda_2_apbn' => $this->request->getVar('roda_2_apbn'),
            'roda_2_apbd' => $this->request->getVar('roda_2_apbd'),
            'pc_apbn' => $this->request->getVar('pc_apbn'),
            'pc_apbd' => $this->request->getVar('pc_apbd'),
            'laptop_apbn' => $this->request->getVar('laptop_apbn'),
            'laptop_apbd' => $this->request->getVar('laptop_apbd'),
            'printer_apbn' => $this->request->getVar('printer_apbn'),
            'printer_apbd' => $this->request->getVar('printer_apbd'),
            'modem_apbn' => $this->request->getVar('modem_apbn'),
            'modem_apbd' => $this->request->getVar('modem_apbd'),
            'lcd_apbn' => $this->request->getVar('lcd_apbn'),
            'lcd_apbd' => $this->request->getVar('lcd_apbd'),
            'soil_apbn' => $this->request->getVar('soil_apbn'),
            'soil_apbd' => $this->request->getVar('soil_apbd'),
            'kios_saprotan' => $this->request->getVar('kios_saprotan'),
            'pedagang_pengepul' => $this->request->getVar('pedagang_pengepul'),
            'gudang_pangan' => $this->request->getVar('gudang_pangan'),
            'perbankan' => $this->request->getVar('perbankan'),
            'industri_penyuluhan' => $this->request->getVar('industri_penyuluhan'),
            'luas_lahan_bp3k' => $this->request->getVar('luas_lahan_bp3k'),
            'luas_lahan_petani' => $this->request->getVar('luas_lahan_petani')
        ]);


        return redirect()->to('/kecamatan');
    }

    public function update($id)
    {
        $fileSampul = $this->request->getFile('foto');
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('fotolama');
        } else {
            $namaSampul = $fileSampul->getName();

            $fileSampul->move('assets/img', $namaSampul);

            unlink('assets/img/' . $this->request->getVar('fotolama'));
        }

        $this->model->save([
            'id' => $id,
            'foto' => $namaSampul,
            'kode_prop' => $this->request->getVar('kode_prop'),
            'satminkal' => $this->request->getVar('satminkal'),
            'bentuk_lembaga' => $this->request->getVar('bentuk_lembaga'),
            'nama_bpp' => $this->request->getVar('nama_bpp'),
            'kecamatan' => $this->request->getVar('kecamatan'),
            'alamat' => $this->request->getVar('alamat'),
            'tgl_berdiri' => $this->request->getVar('tgl_berdiri'),
            'bln_berdiri' => $this->request->getVar('bln_berdiri'),
            'thn_berdiri' => $this->request->getVar('thn_berdiri'),
            'status_gedung' => $this->request->getVar('status_gedung'),
            'kondisi_bangunan' => $this->request->getVar('kondisi_bangunan'),
            'koordinat_lokasi_bpp' => $this->request->getVar('koordinat_lokasi_bpp'),
            'telp_bpp' => $this->request->getVar('telp_bpp'),
            'email' => $this->request->getVar('email'),
            'website' => $this->request->getVar('website'),
            'ketua' => $this->request->getVar('ketua'),
            'kode_koord_penyuluh' => $this->request->getVar('kode_koord_penyuluh'),
            'nama_koord_penyuluh' => $this->request->getVar('nama_koord_penyuluh'),
            'nama_koord_penyuluh_thl' => $this->request->getVar('nama_koord_penyuluh_thl'),
            'koord_lainya_nip' => $this->request->getVar('koord_lainya_nip'),
            'roda_4_apbn' => $this->request->getVar('roda_4_apbn'),
            'roda_4_apbd' => $this->request->getVar('roda_4_apbd'),
            'roda_2_apbn' => $this->request->getVar('roda_2_apbn'),
            'roda_2_apbd' => $this->request->getVar('roda_2_apbd'),
            'pc_apbn' => $this->request->getVar('pc_apbn'),
            'pc_apbd' => $this->request->getVar('pc_apbd'),
            'laptop_apbn' => $this->request->getVar('laptop_apbn'),
            'laptop_apbd' => $this->request->getVar('laptop_apbd'),
            'printer_apbn' => $this->request->getVar('printer_apbn'),
            'printer_apbd' => $this->request->getVar('printer_apbd'),
            'modem_apbn' => $this->request->getVar('modem_apbn'),
            'modem_apbd' => $this->request->getVar('modem_apbd'),
            'lcd_apbn' => $this->request->getVar('lcd_apbn'),
            'lcd_apbd' => $this->request->getVar('lcd_apbd'),
            'soil_apbn' => $this->request->getVar('soil_apbn'),
            'soil_apbd' => $this->request->getVar('soil_apbd'),
            'kios_saprotan' => $this->request->getVar('kios_saprotan'),
            'pedagang_pengepul' => $this->request->getVar('pedagang_pengepul'),
            'gudang_pangan' => $this->request->getVar('gudang_pangan'),
            'perbankan' => $this->request->getVar('perbankan'),
            'industri_penyuluhan' => $this->request->getVar('industri_penyuluhan'),
            'luas_lahan_bp3k' => $this->request->getVar('luas_lahan_bp3k'),
            'luas_lahan_petani' => $this->request->getVar('luas_lahan_petani')
        ]);


        //session()->setFlashdata('pesan', 'Edit data berhasil.');

        return redirect()->to('/detail_kecamatan?kode_kec=' . $this->request->getVar('kecamatan'));
        // dd($this->request->getVar());
    }

    public function delete($id)
    {
        $dt = $this->model->find($id);
        if ($dt['foto'] != 'logo.png') {

            unlink('assets/img/' . $dt['foto']);
        }
        $this->model->delete($id);
        return redirect()->to('/kecamatan');
    }
}
