<?php

namespace App\Models;

use \Config\Database;
use CodeIgniter\Model;

class LembagaModel extends Model
{

    // protected $table = 'tblbapel';

    //  protected $db = \Config\Database::connect();

    public function getProfil($id)
    {

        $query = $this->db->query("select *, a.id_gapoktan, a.alamat, a.ketua, a.tgl_update, a.nama_bapel, a.email, b.nama
                                from tblbapel a
                                left join tbldasar b on a.nama_koord_penyuluh 
                                =b.nip and nip !=''
                                where kabupaten='$id'
                                ");


        if (session()->get('status_user') == '1') {
            $query = $this->db->query("SELECT * FROM tblbakor where kode_prop = $id");
        } elseif (session()->get('status_user') == '4') {
            $query = $this->db->query("SELECT * FROM tblbapel where kabupaten = " . $id);
        } elseif (session()->get('status_user') == '200') {
            $query = $this->db->query("SELECT * FROM tblbapel where kabupaten = " . $id);
        } elseif (session()->get('status_user') == '300') {
            $query = $this->db->query("SELECT * FROM tblbpp where kecamatan = $id");
        }

        $row   = $query->getRowArray();
        return $row;
    }

    public function saveProfil($data)
    {
        $db = db_connect();

        if (session()->get('status_user') == '200') {
            $builder = $db->table('tblbapel');
            $builder->where('kabupaten', session()->get('kodebapel'))->update($data);
        } elseif (session()->get('status_user') == '300') {
            $builder = $db->table('tblbpp');
            $builder->where('kecamatan', session()->get('kodebpp'))->update($data);
        }
    }

    public function getKoordinatBpp()
    {

        $query = $this->db->query("SELECT id, kecamatan, nama_bpp, alamat, ketua, email, koordinat_lokasi_bpp FROM tblbpp WHERE koordinat_lokasi_bpp <> '' ORDER BY id");

        $row   = $query->getResultArray();
        return $row;
    }
}
