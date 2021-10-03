<?php

namespace App\Models;

use CodeIgniter\Model;

class LembagaModel extends Model
{

    protected $table = 'tblbapel';

    //  protected $db = \Config\Database::connect();

    public function getProfil($id)
    {
        if (session()->get('status_user') == '1') {
            $query = $this->db->query("SELECT * FROM tblbakor where kode_prop = $id");
        } elseif (session()->get('status_user') == '200') {
            $query = $this->db->query("SELECT * FROM tblbapel where kabupaten = $id");
        } elseif (session()->get('status_user') == '300') {
            $query = $this->db->query("SELECT * FROM tblbakor where kecamatan = $id");
        }

        $row   = $query->getRowArray();
        return $row;
    }
}
