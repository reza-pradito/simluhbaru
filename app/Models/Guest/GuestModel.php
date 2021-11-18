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

    public function getProfilBPP($kode_kec, $kode_bpp)
    {
        $db = Database::connect();
        $query  = $db->query("select * , d.nama_dati2 as namakab, e.nama_prop as namaprov
                                from tblbpp a 
                                left join tbldasar b on a.nama_koord_penyuluh=b.nip
                                left join tbldaerah c on a.kecamatan=c.id_daerah 
                                left join tbldati2 d on a.satminkal=d.id_dati2
                                left join tblpropinsi e on a.kode_prop=e.id_prop 
                                left join tblbpp_wil_kec j on a.kode_bp3k = j.kode_bp3k
                                where a.kecamatan='" . $kode_kec . "' and a.kecamatan !='0' and a.id = '" . $kode_bpp . "' 
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
        $query = $db->query("select nama_prop as namaprov from tblpropinsi where id_prop='$kode_prop'");
        $row   = $query->getRow();
        $query  = $db->query("select a.id_dati2,a.nama_dati2 as namakab, b.jumbpp FROM 
        (SELECT COUNT(id) as jumbpp,satminkal from tblbpp where kode_prop='$kode_prop' group by satminkal) b join 
        (SELECT * from tbldati2 where id_prop='$kode_prop') a on a.id_dati2=b.satminkal group by a.id_dati2");

        $results = $query->getResultArray();

        $data =  [
            'namaprov' => $row->namaprov,
            'rkeluhkec' => $results
        ];

        return $data;
    }

    public function getRekapKelembagaan()
    {
        $db = Database::connect();
        $query = $db->query("select a.kode_prop, a.alamat, a.deskripsi_lembaga_lain, a.dasar_hukum, a.no_peraturan, a.tgl_berdiri, a.bln_berdiri, a.thn_berdiri, a.alamat, b.nama_prop as namaprov  
                            from tblbakor a
                            left join tblpropinsi b on a.kode_prop = b.id_prop 
                            ORDER BY b.nama_prop
                            ");
        $results   = $query->getResultArray();

        $data =  [
            'rlprov' => $results,
        ];

        return $data;
    }

    public function getRekapBPP($kode_prop)
    {
        $db = Database::connect();
        $query = $db->query("select nama_prop as namaprov from tblpropinsi where id_prop='$kode_prop'");
        $row   = $query->getRow();
        $query = $db->query("select a.id_prop as kode_prop, a.id_dati2 as kode_kab, a.nama_dati2, b.nama_bapel, b.deskripsi_lembaga_lain, 
        c.jumkec, d.jumbpp, ifnull(e.klasprat,0) as klasprat, ifnull(f.klasmad,0) as klasmad, ifnull(g.klasut,0) as klasut, ifnull(h.klasad,0) as klasad, ifnull(i.klasno,0) as klasno,ifnull(j.milik,0) as milik, 
        ifnull(k.sewa,0) as sewa, ifnull(l.noket,0) as noket, ifnull(m.baik,0) as baik, ifnull(n.rusak,0) as rusak, ifnull(o.tk,0) as tk, ifnull(p.lahan_bp3k,0) as lahan_bp3k, ifnull(q.lahan_petani,0) as lahan_petani
        from tbldati2 a 
        left join tblbapel b on a.id_dati2=b.kabupaten
        left join (select id_dati2, count(id_daerah) as jumkec from tbldaerah group by id_dati2) c on a.id_dati2=c.id_dati2
        left join (select satminkal, count(satminkal) as jumbpp from tblbpp group by satminkal) d on a.id_dati2=d.satminkal
        left join (select satminkal, count(klasifikasi) as klasprat,klasifikasi from tblbpp where klasifikasi='pratama' group by satminkal) e on a.id_dati2=e.satminkal 
        left join (select satminkal, count(klasifikasi) as klasmad,klasifikasi from tblbpp where klasifikasi='madya' group by satminkal) f on a.id_dati2=f.satminkal 
        left join (select satminkal, count(klasifikasi) as klasut,klasifikasi from tblbpp where klasifikasi='utama' group by satminkal) g on a.id_dati2=g.satminkal 
        left join (select satminkal, count(klasifikasi) as klasad,klasifikasi from tblbpp where klasifikasi='aditama' group by satminkal) h on a.id_dati2=h.satminkal
        left join (select satminkal, count(klasifikasi) as klasno,klasifikasi from tblbpp where klasifikasi='' group by satminkal) i on a.id_dati2=i.satminkal 
        left join (select satminkal, count(status_gedung) as milik,status_gedung from tblbpp where status_gedung='milik sendiri' group by satminkal) j on a.id_dati2=j.satminkal
        left join (select satminkal, count(status_gedung) as sewa,status_gedung from tblbpp where status_gedung='sewa/pinjam' group by satminkal) k on a.id_dati2=k.satminkal
        left join (select satminkal, count(status_gedung) as noket,status_gedung from tblbpp where status_gedung='' group by satminkal) l on a.id_dati2=l.satminkal 
        left join (select satminkal, count(kondisi_bangunan) as baik,kondisi_bangunan from tblbpp where kondisi_bangunan='baik' group by satminkal) m on a.id_dati2=m.satminkal
        left join (select satminkal, count(kondisi_bangunan) as rusak,kondisi_bangunan from tblbpp where kondisi_bangunan='rusak' group by satminkal) n on a.id_dati2=n.satminkal
        left join (select satminkal, count(kondisi_bangunan) as tk,kondisi_bangunan from tblbpp where kondisi_bangunan='' group by satminkal) o on a.id_dati2=o.satminkal
        left join (select satminkal, sum(luas_lahan_bp3k) as lahan_bp3k,luas_lahan_bp3k from tblbpp group by satminkal) p on a.id_dati2=p.satminkal
        left join (select satminkal, sum(luas_lahan_petani) as lahan_petani,luas_lahan_petani from tblbpp group by satminkal) q on a.id_dati2=q.satminkal
        where a.id_prop = '$kode_prop'");
        $results   = $query->getResultArray();

        $data =  [
            'namaprov' => $row->namaprov,
            'rkbpp' => $results
        ];

        return $data;
    }

    public function getRekapProfBPP($kode_kab)
    {
        $db = Database::connect();
        $query = $db->query("select b.nama_prop as namaprov from tblbpp a
        left join tblpropinsi b on a.kode_prop=b.id_prop where satminkal='$kode_kab'");
        $row   = $query->getRow();
        $query = $db->query("select nama_dati2 as namakab from tbldati2 where id_dati2='$kode_kab'");
        $row2   = $query->getRow();
        $query = $db->query("select a.satminkal as kode_kab, a.nama_bpp, c.deskripsi as namakec,  a.klasifikasi, a.status_gedung, a.kondisi_bangunan, a.luas_lahan_bp3k, a.luas_lahan_petani
        from tblbpp a
        left join tblbpp_wil_kec b on a.kode_bp3k = b.kode_bp3k
        left join tbldaerah c on b.kecamatan=c.id_daerah
        where a.satminkal='$kode_kab'");
        $results   = $query->getResultArray();

        $data =  [
            'namaprov' => $row->namaprov,
            'namakab' => $row2->namakab,
            'rpbpp' => $results
        ];

        return $data;
    }
    public function getProv()
    {
        $db = Database::connect();
        $query = $db->query("select * from tblpropinsi");
        $row   = $query->getResultArray();

        return $row;
    }
}
