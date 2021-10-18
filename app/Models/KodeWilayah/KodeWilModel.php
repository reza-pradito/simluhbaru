<?php

namespace App\Models\KodeWilayah;

use CodeIgniter\Model;
use \Config\Database;

class KodeWilModel extends Model
{
    public function getKodeWil($kode_kec)
    {
        $db = Database::connect();
        $query = $this->db->query("select id_prop as kode_prop from tbldesa where id_daerah='$kode_kec'");
        $row   = $query->getRow();
        $query2 = $this->db->query("select id_daerah as kode_kec from tbldesa where id_daerah='$kode_kec'");
        $row2   = $query2->getRow();
        $query3 = $this->db->query("select id_dati2 as kode_kab from tbldesa where id_daerah='$kode_kec'");
        $row3   = $query3->getRow();

        $data =  [
            'kode_prop' => $row->kode_prop,
            'kode_kab' => $row3->kode_kab,
            'kode_kec' => $row2->kode_kec
        ];

        return $data;
    }

    public function getKodeWil2($kode_kab)
    {
        $db = Database::connect();
        $query = $this->db->query("select id_prop as kode_prop from tbldesa where id_dati2='$kode_kab'");
        $row   = $query->getRow();
        $query2 = $this->db->query("select id_daerah as kode_kec from tbldesa where id_dati2='$kode_kab'");
        $row2   = $query2->getRow();
        $query3 = $this->db->query("select id_dati2 as kode_kab from tbldesa where id_dati2='$kode_kab'");
        $row3   = $query3->getRow();

        $data =  [
            'kode_prop' => $row->kode_prop,
            'kode_kab' => $row3->kode_kab,
            'kode_kec' => $row2->kode_kec
        ];

        return $data;
    }
    
}



