<?php

namespace App\Models\Guest;

use CodeIgniter\Model;
use \Config\Database;

class GuestModel extends Model
{
    // protected $table      = 'tbldesa';

    public function getDaftarKelembagaanProv()
    {
        $db = Database::connect();
        $query = $db->query("select *, a.kode_prop, a.alamat, b.nama as namapen, b.nip, c.nama_prop as namaprov  
                            from tblbakor a
                            left join tbldasar b on a.nama_koord_penyuluh = b.nip and nip !=''
                            left join tblpropinsi c on a.kode_prop = c.id_prop 
                            ORDER BY c.nama_prop
                            ");
        $results   = $query->getResultArray();

        $data =  [
            'rlprov' => $results,
        ];

        return $data;
    }

    public function getDaftarKelembagaanKab($kode_prop)
    {
        $db = Database::connect();
        $sql = "select a.kode_prop, a.nama_bapel, b.nama as namapns, c.nama as namathl, e.nama_dati2 as namakab, e.id_dati2 
        from tblbapel a
        left join tbldasar b on a.nama_koord_penyuluh=b.nip
        left join tbldasar_thl c on a.nama_koord_penyuluh_thl=c.noktp
        left join tblpropinsi d on a.kode_prop = d.id_prop 
        left join tbldati2 e on a.kode_prop = e.id_prop
        where a.kode_prop='$kode_prop' ";
        dd($sql);
        $query = $db->query($sql);
        $results   = $query->getResultArray();

        $data =  [
            'rlkab' => $results,
        ];

        return $data;
    }

    public function getRekapKeluh()
    {
        $db = Database::connect();
        $query  = $db->query("select *,a.nama_prop as namaprov, b.nama_bapel, b.bakor, c.dinas, d.kab_bapeluh, e.kab_dinas, f.kec_bp3k, g.posluhdes 
                            from tblpropinsi a
                            left join (select kode_prop, count(id_bakor) as bakor from tblbakor GROUP BY kode_prop) b on a.id_prop=b.kode_prop and b.nama_bapel='10' or b.nama_bapel='21'
                            left join (select kode_prop, count(id_bakor) as dinas from tblbakor GROUP BY kode_prop) c on a.id_prop=c.kode_prop and c.nama_bapel='22'
                            left join (select kode_prop, count(id_gapoktan) as kab_bapeluh from tblbapel GROUP BY kode_prop) d on a.id_prop=d.kode_prop and d.nama_bapel='10' or d.nama_bapel='20' or d.nama_bapel='31'
                            left join (select kode_prop, count(id_gapoktan) as kab_dinas FROM tblbapel GROUP BY kode_prop) e on a.id_prop=c.kode_prop and e.nama_bapel='32' or e.nama_bapel='33'
                            left join (select kode_prop, count(id) as kec_bp3k from tblbpp GROUP BY kode_prop) f on a.id_prop=f.kode_prop 
                            left join (select kode_prop, count(idpos) as posluhdes from tb_posluhdes GROUP BY kode_prop) g on a.id_prop=g.kode_prop 
                            ORDER BY a.nama_prop
                            ");
        $results = $query->getResultArray();

        $data =  [
            'rkeluh' => $results
        ];

        return $data;
    }
}
