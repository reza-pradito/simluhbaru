<?php

namespace App\Models\KelembagaanPelakuUtama\KelembagaanPetaniLainnya;

use CodeIgniter\Model;
use \Config\Database;

class TambahKP2LModel extends Model
{
    protected $table      = 'tb_poktan_p2l';
    protected $allowedFields = ['id_p2l','kode_prop', 'kode_kec', 'kode_kab', 'kode_desa', 'no_sc_cpcl', 'no_urut_sk',
     'nama_poktan', 'nama_ketua', 'nama_sekretaris','nama_bendahara','alamat_sekretariat','tanggal_bentuk',
     'kode_komoditas_hor','status','created_at'];
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

    
    public function getTambahKP2L($kode_kec)
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
