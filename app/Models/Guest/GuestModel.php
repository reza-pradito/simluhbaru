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
        $query = $db->query("select *, a.kode_prop, a.alamat, b.nama as namapen, c.nama_prop as namaprov  
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
        $sql = "select *,a.kode_prop, b.id_dati2 as kode_kab, b.nama_dati2, c.nama as namapns, d.nama as namathl
                from tblbapel a 
                left join tbldati2 b on a.kabupaten=b.id_dati2
                left join tbldasar c on a.nama_koord_penyuluh=c.nip and nip !=''
                left join tbldasar_thl d on a.nama_koord_penyuluh_thl=d.noktp
                where a.kode_prop='$kode_prop' ";
        // dd($sql);
        $query = $db->query($sql);
        $results   = $query->getResultArray();

        $data =  [
            'rlkab' => $results,
        ];

        return $data;
    }

    public function getDaftarKelembagaanKec($kode_kab)
    {
        $db = Database::connect();
        $sql = "select *,a.satminkal, c.deskripsi as namakec
         from tblbpp a
        left join tblbpp_wil_kec b on a.kode_bp3k=b.kode_bp3k
        left join tbldaerah c on b.kecamatan=c.id_daerah
        where a.satminkal='$kode_kab' ";
        // dd($sql);
        $query = $db->query($sql);
        $results   = $query->getResultArray();

        $data =  [
            'rlkec' => $results,
        ];

        return $data;
    }

    public function getProfilBPP($kode_kec)
    {
        $db = Database::connect();
        $query  = $db->query("select * , d.nama_dati2 as namakab, e.nama_prop as namaprov
                                from tblbpp a 
                                left join tbldasar b on a.nama_koord_penyuluh=b.nip
                                left join tbldaerah c on a.kecamatan=c.id_daerah 
                                left join tbldati2 d on a.satminkal=d.id_dati2
                                left join tblpropinsi e on a.kode_prop=e.id_prop 
                                left join tblbpp_wil_kec j on a.kode_bp3k = j.kode_bp3k
                                where a.kecamatan='$kode_kec' and a.kecamatan !='0'  
                                order by nama_bpp");
        $row   = $query->getRowArray();
        return $row;
    }

    public function getRekapKeluh()
    {
        $db = Database::connect();
        $query  = $db->query("
                                SELECT a.id_prop as kode_prop, a.nama_prop AS namaprov, b.nama_bapel, IFNULL(b.bakor,0) AS jum_bakor, c.dinas,
                                IFNULL(d.kab_bapeluh,0) AS jum_bapeluh, e.kab_dinas, f.kec_bp3k, IFNULL(g.posluhdes,0) AS posluhdes
                                FROM tblpropinsi a
                                LEFT JOIN                            
                                (SELECT id_bakor, COUNT(id_bakor) AS bakor,nama_bapel,kode_prop FROM  tblbakor WHERE nama_bapel='10' OR nama_bapel='21' GROUP BY kode_prop) b
                                ON a.id_prop=b.kode_prop LEFT JOIN
                                (SELECT id_bakor, COUNT(id_bakor) AS dinas,nama_bapel,kode_prop FROM tblbakor WHERE nama_bapel='22' GROUP BY kode_prop) c
                                ON a.id_prop=c.kode_prop
                                LEFT JOIN (SELECT kode_prop, COUNT(id_gapoktan) AS kab_bapeluh,nama_bapel FROM tblbapel WHERE nama_bapel='10' OR nama_bapel='20' OR
                                nama_bapel='31' GROUP BY kode_prop) d
                                ON a.id_prop=d.kode_prop
                                LEFT JOIN (SELECT kode_prop, COUNT(id_gapoktan) AS kab_dinas,nama_bapel FROM tblbapel WHERE nama_bapel='32' OR nama_bapel='33' 
                                GROUP BY kode_prop) e ON a.id_prop=e.kode_prop
                                LEFT JOIN (SELECT kode_prop, COUNT(id) AS kec_bp3k FROM tblbpp GROUP BY kode_prop) f
                                ON a.id_prop=f.kode_prop
                                LEFT JOIN (SELECT kode_prop, COUNT(idpos) AS posluhdes FROM tb_posluhdes GROUP BY kode_prop) g
                                ON a.id_prop=g.kode_prop
                                GROUP BY a.`nama_prop` ORDER BY a.nama_prop
                            ");
        $results = $query->getResultArray();

        $data =  [
            'rkeluh' => $results
        ];

        return $data;
    }

    public function getRekapKeluhKec($kode_prop)
    {
        $db = Database::connect();
        $query  = $db->query("select a.id_dati2,a.nama_dati2 as namakab, b.jumbpp FROM (SELECT COUNT(id) as jumbpp,satminkal from tblbpp where kode_prop='$kode_prop' group by satminkal) b join 
        (SELECT * from tbldati2 where id_prop='$kode_prop') a on a.id_dati2=b.satminkal group by a.id_dati2");

        $results = $query->getResultArray();



        $data =  [
            'rkeluhkec' => $results
        ];

        return $data;
    }
}
