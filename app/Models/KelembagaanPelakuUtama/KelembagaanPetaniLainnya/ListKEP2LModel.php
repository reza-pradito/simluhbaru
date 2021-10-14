<?php

namespace App\Models\KelembagaanPelakuUtama\KelembagaanPetaniLainnya;

use CodeIgniter\Model;
use \Config\Database;

class ListKEP2LModel extends Model
{

    protected $table      = 'tb_poktan';
    protected $primaryKey = 'id_poktan';
    protected $allowedFields = ['no_reg', 'kode_prop', 'kode_kab',
     'kode_kec', 'kode_desa', 'nama_poktan', 'ketua_poktan', 'alamat', 'jum_anggota','simluh_tahun_bentuk','status'];

    protected $useTimestamps = false;
 
    public function getListKEP2LTotal($kode_kec)
    {
        $db = Database::connect();
        $query = $db->query("select deskripsi as nama_kec from tbldaerah where id_daerah='$kode_kec'");
        $row   = $query->getRow();
        
        $query2 = $db->query("SELECT count(id_p2l)  as jum FROM tb_poktan_p2l where kode_kec ='$kode_kec'");
        $row2   = $query2->getRow();
        
        $query3   = $db->query("select * , b.nm_desa from tb_poktan_p2l a
                                left join tbldesa b on a.kode_desa=b.id_desa 
                                where kode_kec='$kode_kec'
                               
                                order by kode_desa,nama_poktan");
        $results = $query3->getResultArray();

        $data =  [
            'jum' => $row2->jum,
            'nama_kec' => $row->nama_kec,
            'table_data' => $results,
        ];

        return $data;
    }
}
