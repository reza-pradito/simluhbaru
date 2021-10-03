<?php

namespace App\Models\KelembagaanPelakuUtama\KelompokTani;

use CodeIgniter\Model;
use \Config\Database;

class TambahKelompokTaniModel extends Model
{
    protected $table      = 'penyuluh';
    //protected $primaryKey = 'id';


    //protected $returnType     = 'array';
    //protected $useSoftDeletes = true;

    //protected $allowedFields = ['nama', 'alamat', 'telpon'];


    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    
    public function getTambahKelompokTani($kode_kec)
    {
       $db = Database::connect();
   /*     $query = $db->query("select deskripsi as nama_kec from tbldaerah where id_daerah='$kode_kab'");
       $row   = $query->getRow();
       $query1 = $db->query("select nama_dati2 as nama_kab from tbldati2 where id_dati2='$kode_kab'");
       $row1   = $query1->getRow();*/
     
        
       $query3   = $db->query("select id_desa,nm_desa
                             from tbldesa where id_daerah='$kode_kec'");
        $results = $query3->getResultArray();

        $data =  [
           // 'nama_kab' => $row->nama_kab,
           // 'nama_kec' => $row1->nama_kec,
           'table_data' => $results,
        ];

       return $data;
    }
}
