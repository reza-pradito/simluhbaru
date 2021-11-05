<?php

namespace App\Controllers\profil;

use App\Controllers\BaseController;
use App\Models\KelembagaanPenyuluhan\Kabupaten\FasilitasiBapelModel;
use App\Models\LembagaModel;
use App\Models\WilayahModel;
use App\Models\KelembagaanPenyuluhan\Kabupaten\KabupatenModel;
use App\Models\KodeWilayah\KodeWilModel;

class Lembaga extends BaseController
{
    protected $session;
    protected $modelLembaga;
    protected $modelProv;
    protected $fasModel;

    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        helper('autentikasi');
        $this->modelLembaga = new LembagaModel();
        $this->modelProv = new WilayahModel();
        $this->fasmodel = new FasilitasiBapelModel();
    }

    public function index()
    {

        session();

        if (session()->get('username') == "") {
            return redirect()->to('login');
        }

        if (session()->get('status_user') == '300') {
            return redirect()->to('kelembagaanpenyuluhan/kecamatan/kecamatan/profilkec');
        }

        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM reff_fasilitasi_bpp');
        $query->getResultArray();



        $lembagaModel = new LembagaModel();
        $kabModel = new KabupatenModel();
        $wilModel = new KodeWilModel();
        // if (empty($this->session->get('kodebapel'))) {
        //     return redirect()->to('login');
        // } else {
        $dtlembaga = $lembagaModel->getProfil(session()->get('kodebapel'));
        $penyuluhPNS = $kabModel->getPenyuluhPNS(session()->get('kodebapel'));
        $penyuluhTHL = $kabModel->getPenyuluhTHL(session()->get('kodebapel'));
        $bapel_data = $kabModel->getKabTotal(session()->get('kodebapel'));
        $bapel = $kabModel->getBapel(session()->get('kodebapel'));
        $fasdata = $kabModel->getFas(session()->get('kodebapel'));
        $id_gap = $kabModel->getIdGap(session()->get('kodebapel'));
        $namawil = $wilModel->getNamaWil(session()->get('kodebapel'));


        if (empty(session()->get('status_user')) || session()->get('status_user') == '2') {
            $kode = '00';
        } elseif (session()->get('status_user') == '1') {
            $kode = session()->get('kodebakor');
        } elseif (session()->get('status_user') == '4') {
            $kode = session()->get('kodebapel');
        } elseif (session()->get('status_user') == '200') {
            $kode = session()->get('kodebapel');
        } elseif (session()->get('status_user') == '300') {
            $kode = session()->get('kodebpp');
        }


        $dtlembaga = $this->modelLembaga->getProfil($kode);
        $dtprov = $this->modelProv->getProv();
        //dd($dtlembaga);

        $data = [
            'title' => 'Profil Lembaga',
            'dt' => $dtlembaga,
            'penyuluhPNS' => $penyuluhPNS,
            'penyuluhTHL' => $penyuluhTHL,
            'namaprov' => $namawil['namaprov'],
            'tabel_data' => $bapel_data['table_data'],
            'bapel' => $bapel['bapel_data'],
            'fasdata' => $fasdata['fasdata'],
            'idgap' => $id_gap['idgap'],
            'fotoprofil' => $dtlembaga['foto'],
            'fasilitasi' => $query->getResultArray(),
            'prov' => $dtprov,
            'validation' => \Config\Services::validation()

        ];


        return view('profil/profillembaga', $data);
    }


    public function detailKab($id)
    {
        $kabModel = new KabupatenModel();

        $dataKab = $kabModel->getDetailKab($id);
        echo json_encode($dataKab);
    }

    public function fasilitas($id)
    {
        $kabModel = new KabupatenModel();

        $dataFas = $kabModel->getFasilitasi($id);
        echo json_encode($dataFas);
    }

    public function update($id_gapoktan)
    {
        $nama_bapel = $this->request->getPost('nama_bapel');
        $dasar_hukum = $this->request->getPost('dasar_hukum');
        $no_peraturan = $this->request->getPost('no_peraturan');
        $tgl_berdiri = $this->request->getPost('tgl_berdiri');
        $bln_berdiri = $this->request->getPost('bln_berdiri');
        $thn_berdiri = $this->request->getPost('thn_berdiri');
        $alamat = $this->request->getPost('alamat');
        $telp_kantor = $this->request->getPost('telp_kantor');
        $email = $this->request->getPost('email');
        $website = $this->request->getPost('website');
        $ketua = $this->request->getPost('ketua');
        $telp_hp = $this->request->getPost('telp_hp');
        $telp_hp_koord = $this->request->getPost('telp_hp_koord');
        $email_koord = $this->request->getPost('email_koord');
        $jenis_pertanian = $this->request->getPost('jenis_pertanian');
        $jenis_tp = $this->request->getPost('jenis_tp');
        $jenis_hor = $this->request->getPost('jenis_hor');
        $jenis_bun = $this->request->getPost('jenis_bun');
        $jenis_nak = $this->request->getPost('jenis_nak');
        $jenis_pkh = $this->request->getPost('jenis_pkh');
        $jenis_ketahanan_pangan = $this->request->getPost('jenis_ketahanan_pangan');
        $jenis_pangan = $this->request->getPost('jenis_pangan');
        $bidang_luh = $this->request->getPost('bidang_luh');
        $nama_kabid = $this->request->getPost('nama_kabid');
        $hp_kabid = $this->request->getPost('hp_kabid');
        $seksi_luh = $this->request->getPost('seksi_luh');
        $nama_kasie = $this->request->getPost('nama_kasie');
        $hp_kasie = $this->request->getPost('hp_kasie');
        $uptd_luh = $this->request->getPost('uptd_luh');
        $nama_kauptd = $this->request->getPost('nama_kauptd');
        $hp_kauptd = $this->request->getPost('hp_kauptd');
        $nama_koord_penyuluh = $this->request->getPost('nama_koord_penyuluh');
        $nama_koord_penyuluh_thl = $this->request->getPost('nama_koord_penyuluh_thl');
        $koord_lainya_nip = $this->request->getPost('koord_lainya_nip');
        $koord_lainya_nama = $this->request->getPost('koord_lainya_nama');
        $kode_koord_penyuluh = $this->request->getPost('kode_koord_penyuluh');
        $this->model->save([
            'id_gapoktan' => $id_gapoktan,
            'nama_bapel' => $nama_bapel,
            'dasar_hukum' => $dasar_hukum,
            'no_peraturan' => $no_peraturan,
            'tgl_berdiri' => $tgl_berdiri,
            'bln_berdiri' => $bln_berdiri,
            'thn_berdiri' => $thn_berdiri,
            'telp_kantor' => $telp_kantor,
            'alamat' => $alamat,
            'email' => $email,
            'website' => $website,
            'ketua' => $ketua,
            'telp_hp' => $telp_hp,
            'telp_hp_koord' => $telp_hp_koord,
            'email_koord' => $email_koord,
            'jenis_pertanian' => $jenis_pertanian,
            'jenis_tp' => $jenis_tp,
            'jenis_hor' => $jenis_hor,
            'jenis_bun' => $jenis_bun,
            'jenis_nak' => $jenis_nak,
            'jenis_pkh' => $jenis_pkh,
            'jenis_ketahanan_pangan' => $jenis_ketahanan_pangan,
            'jenis_pangan' => $jenis_pangan,
            'bidang_luh' => $bidang_luh,
            'nama_kabid' => $nama_kabid,
            'hp_kabid' => $hp_kabid,
            'seksi_luh' => $seksi_luh,
            'nama_kasie' => $nama_kasie,
            'hp_kasie' => $hp_kasie,
            'uptd_luh' => $uptd_luh,
            'nama_kauptd' => $nama_kauptd,
            'hp_kauptd' => $hp_kauptd,
            'nama_koord_penyuluh' => $nama_koord_penyuluh,
            'nama_koord_penyuluh_thl' => $nama_koord_penyuluh_thl,
            'koord_lainya_nip' => $koord_lainya_nip,
            'koord_lainya_nama' => $koord_lainya_nama,
            'kode_koord_penyuluh' => $kode_koord_penyuluh
        ]);

        return redirect()->to('/lembaga');
    }

    public function save()
    {
        try {
            $res = $this->fasmodel->save([
                'id_bapel' => $this->request->getPost('id_bapel'),
                'fasilitasi' => $this->request->getPost('fasilitasi'),
                'kegiatan' => $this->request->getPost('kegiatan'),
                'tahun' => $this->request->getPost('tahun')
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

        //return redirect()->to('/daftar_posluhdes?kode_kec=' . $this->request->getPost('kode_kec'));
    }

    public function updatefas($id)
    {
        $id_bapel = $this->request->getPost('id_bapel');
        $tahun = $this->request->getPost('tahun');
        $fasilitasi = $this->request->getPost('fasilitasi');
        $kegiatan = $this->request->getPost('kegiatan');
        $this->fasmodel->save([
            'id' => $id,
            'id_bapel' => $id_bapel,
            'fasilitasi' => $fasilitasi,
            'tahun' => $tahun,
            'kegiatan' => $kegiatan
        ]);

        return redirect()->to('/lembaga');
    }

    public function delete($id)
    {
        $this->fasmodel->delete($id);
        return redirect()->to('/lembaga');
    }

    function editFoto()
    {

        $data = [

            'title' => 'Ganti Foto',
            'validation' => \Config\Services::validation()
        ];

        return view('profil/changefoto', $data);
    }

    function saveProfil()
    {
        if (!$this->validate([
            // 'nameTxt' => 'required|min_length[10]'
            'foto' => [
                'rules' => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]|mime_in[foto,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => 'pilih gambar dulu',
                    'max_size' => 'ukuran gambar terlalu besar',
                    'is_image' => 'bukan gambar',
                    'mime_in' => 'bukan gambar',
                ]
            ]
        ])) {

            return redirect()->to('/profil/lembaga/')->withInput();
        }

        //ambil gambar
        $foto =  $this->request->getFile('foto');

        //pindahkan gambar 
        $foto->move('assets/img');
        $namafoto = $foto->getName();

        //simpan ke database
        $data = [
            'foto' => $namafoto
        ];

        $this->modelLembaga->saveProfil($data);

        return redirect()->to('/profil/lembaga/');
    }
}
