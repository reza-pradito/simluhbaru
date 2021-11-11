<?php

namespace App\Models\KelembagaanPelakuUtama\KelompokTani;

use CodeIgniter\Model;
use \Config\Database;

class ListBantuModel extends Model
{
    protected $table      = 'mast_kegiatan';
    protected $primaryKey = 'idmast';
    protected $allowedFields = ['idkeg','desckeg','iditem','subitem','kegiatan'];


    protected $useTimestamps = false;
 
    public function getListBantu($ip)
    {
        $db = Database::connect();
        $query = $db->query("select nama_poktan,kode_prop,kode_kab,kode_kec,kode_desa from tb_poktan where id_poktan='$ip'");
        $row   = $query->getRow();
        
        
        
        $query3   = $db->query(" select * from tb_bantuan where idban= $ip");

        $results = $query3->getResultArray();


        $data =  [
            
            'nama_poktan' => $row->nama_poktan,
            'table_data' => $results,
           
          //  'jup' => $row4->jup
        ];

        return $data;
    }
    public function getDataById($ip)
    {
        $query = $this->db->query("select * from tb_bantuan where idban= '" . $ip . "' 
                                ORDER BY tahun ");
                                $row = $query->getRow();
                                return json_encode($row);
    }
   public function getKegiatan()
   {
        $query = $this->db->query("select * from mast_kegiatan");
                                $row2= $query->getResultArray();
                                return($row2);
    }
   }

