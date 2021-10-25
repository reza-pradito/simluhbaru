<?php

namespace App\Models;

use \Config\Database;
use CodeIgniter\Model;

class LembagaModel extends Model
{

    protected $table = 'tblbapel';

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
        } elseif (session()->get('status_user') == '200') {
            $query = $this->db->query("SELECT * FROM tblbapel where kabupaten = $id");
        } elseif (session()->get('status_user') == '300') {
            $query = $this->db->query("SELECT * FROM tblbpp where kecamatan = $id");
        }

        $row   = $query->getRowArray();
        return $row;
    }
}
