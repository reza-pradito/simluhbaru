<?php

namespace App\Models\KelembagaanPenyuluhan\Provinsi;

use CodeIgniter\Model;
use \Config\Database;

class ProvModel extends Model
{
    //protected $table      = 'penyuluh';
    //protected $primaryKey = 'id';


    //protected $returnType     = 'array';
    //protected $useSoftDeletes = true;

    //protected $allowedFields = ['nama', 'alamat', 'telpon'];


    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;


    public function getProv($kode_prop)
    {
        $db = Database::connect();
        $query = $db->query("select nama_prop from tblpropinsi where id_prop='$kode_prop'");
        $row   = $query->getRow();
        $query2 = $db->query("SELECT count(id_bakor) as jum_prop FROM tblbakor where kode_prop ='$kode_prop'");
        $row2   = $query2->getRow();
        $query3  = $db->query("select *, a.alamat, a.ketua, a.tgl_update, a.kode_prop, a.nama_bapel, h.nama, h.nip, c.jumthl, d.jumswa, e.jumpok, f.jumgap, g.jumkep,
                                    case a.nama_bapel 
                                    when '10' then 'Sekretariat Badan Koordinasi Penyuluhan Pertanian, Perikanan dan Kehutanan'
                                    when '21' then deskripsi_lembaga_lain
                                    when '22' then deskripsi_lembaga_lain
                                    else '' end nama_bapel 
                                from tblbakor a
                                left join tbldasar h on a.nama_koord_penyuluh=h.nip 
                                left join (select satminkal, count(id_thl) as jumthl from tbldasar_thl GROUP BY satminkal) c on a.kode_prop=c.satminkal LIKE '%" . $kode_prop . "%'
                                left join (select satminkal, count(id_swa) as jumswa from tbldasar_swa GROUP BY satminkal) d on a.kode_prop=d.satminkal LIKE '%" . $kode_prop . "%'
                                left join (select kode_prop, count(id_poktan) as jumpok from tb_poktan GROUP BY kode_prop) e on a.kode_prop=e.kode_prop
                                left join (select kode_prop, count(id_gap) as jumgap from tb_gapoktan GROUP BY kode_prop) f on a.kode_prop=f.kode_prop
                                left join (select kode_prop, count(id_kep) as jumkep from tb_kep GROUP BY kode_prop) g on a.kode_prop=g.kode_prop
                                where a.kode_prop='$kode_prop' 
                                ");
        $results = $query3->getResultArray();

        $data =  [
            'jum_prop' => $row2->jum_prop,
            'nama_prop' => $row->nama_prop,
            'table_data' => $results,
        ];

        return $data;
    }
}
