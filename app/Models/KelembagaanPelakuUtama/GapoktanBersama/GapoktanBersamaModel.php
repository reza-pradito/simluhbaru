<?php

namespace App\Models\KelembagaanPelakuUtama\GapoktanBersama;

use CodeIgniter\Model;
use \Config\Database;

class GapoktanBersamaModel extends Model
{
  
    protected $table      = 'tb_gapoktan_bersama';
    protected $primaryKey = 'id_gapber';
    protected $allowedFields = [ 'kode_prop', 'kode_kab',
     'kode_kec', 'kode_desa', 'nama_gapoktan', 'ketua_gapoktan', 'alamat', 'simluh_sk_pengukuhan','simluh_tahun_bentuk','simluh_bendahara','simluh_sekretaris'];
    protected $useTimestamps = false;
  


    public function getGapoktanBersamaTotal($kode_kab)
    {
        $db = Database::connect();
        $query = $db->query("select nama_dati2 as nama_kab from tbldati2 where id_dati2='$kode_kab'");
        $row   = $query->getRow();
        
        $query2 = $db->query("SELECT count(id_gapber) as jum FROM tb_gapoktan_bersama where kode_kab ='$kode_kab'");
        $row2   = $query2->getRow();
        
        $query3   = $db->query("select id_gapber,kode_desa,kode_kec,nama_gapoktan,ketua_gapoktan,simluh_bendahara,alamat, b.nm_desa 
                                from tb_gapoktan_bersama a
                                left join tbldesa b on a.kode_desa=b.id_desa 
                                where kode_kab='$kode_kab'          
                                order by kode_desa");
        $results = $query3->getResultArray();

        $data =  [
            'jum' => $row2->jum,
            'nama_kab' => $row->nama_kab,
            'table_data' => $results,
        ];

        return $data;
    }
    public function getDesa($kode_kec)
    {
        $query = $this->db->query("select * from tbldesa where id_daerah LIKE '" . $kode_kec . "%' ORDER BY nm_desa ASC");
        $row   = $query->getResultArray();
        return $row;
    }
    public function getDataById($id_gapber)
    {
        $query = $this->db->query("select * , b.deskripsi
                                from tb_gapoktan_bersama a
                                left join tbldaerah b on a.kode_kec=b.id_daerah
                                where id_gapber= '" . $id_gapber . "' 
                                ORDER BY nama_gapoktan ");
                                $row = $query->getRow();
                                return json_encode($row);
    }
}
