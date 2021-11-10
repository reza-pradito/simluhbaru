<?php

namespace App\Models;

use \Config\Database;
use CodeIgniter\Model;

class LembagaModel extends Model
{

    // protected $table = 'tblbapel';

    //  protected $db = \Config\Database::connect();

    public function getProfil($id)
    {


        if (session()->get('status_user') == '1') {
            $query = $this->db->query("select *, a.alamat, a.email, a.ketua, a.tgl_update, a.kode_prop, a.nama_bapel, b.nama as namakoord  
                                        from tblbakor a
                                        left join tbldasar b on a.nama_koord_penyuluh=b.nip 
                                        where a.kode_prop='$id' 
                                        ");
        } elseif (session()->get('status_user') == '4') {
            $query = $this->db->query("SELECT * FROM tblbapel where kabupaten = " . $id);
        } elseif (session()->get('status_user') == '200') {
            $query = $this->db->query("select *, a.id_gapoktan, a.alamat, a.ketua, a.tgl_update, a.nama_bapel, a.email, b.nama as namapns, c.nama as namathl
            from tblbapel a
            left join tbldasar b on a.nama_koord_penyuluh=b.nip and nip !=''
            left join tbldasar_thl c on a.nama_koord_penyuluh_thl=c.noktp and penyuluh_di='kabupaten' and sumber_dana='apbn'
            where kabupaten='$id'
            ");
        } elseif (session()->get('status_user') == '300') {
            $query = $this->db->query("select * , a.id, a.email, a.roda_4_apbn, a.tgl_update, a.alamat,  b.nama, c.deskripsi, f.jumgap,f.kode_bp3k,g.jumkep,d.jumpok,e.jumthl,h.jumpns,i.unit_kerja, k.nama_prop as namaprov, k.id_prop, l.nama_dati2 as namakab, l.id_dati2
                                    from tblbpp a
                                    left join tbldasar b on a.nama_koord_penyuluh=b.nip
                                    left join tbldaerah c on a.kecamatan=c.id_daerah  
                                    left join (select kode_bp3k, count(id_poktan) as jumpok from tb_poktan GROUP BY kode_bp3k)d on a.kode_bp3k=d.kode_bp3k
                                    left join(select unit_kerja,count(id_thl) as jumthl from tbldasar_thl GROUP BY unit_kerja) e on  a.id=e.unit_kerja
                                    left join(select kode_bp3k, count(id_gap) as jumgap from tb_gapoktan GROUP BY kode_bp3k)f on a.kode_bp3k=f.kode_bp3k
                                    left join(select kode_kec,count(id_kep) as jumkep from tb_kep GROUP BY kode_kec )g on a.kecamatan=g.kode_kec
                                    left join (select unit_kerja,count(id) as jumpns from tbldasar GROUP BY unit_kerja) h on a.id=h.unit_kerja and kode_kab='4' and status !='1' and status !='2' and status !='3'
                                    left join(select unit_kerja,count(id_swa) as jumswa from tbldasar_swa GROUP BY unit_kerja) i on a.id=i.unit_kerja
                                    left join tblbpp_wil_kec j on a.kode_bp3k = j.kode_bp3k
                                    left join tblpropinsi k on a.kode_prop = k.id_prop
                                    left join tbldati2 l on a.satminkal = l.id_dati2
                                    where a.kecamatan='$id' and a.kecamatan !='0'  
                                    order by nama_bpp");
        }

        $row   = $query->getRowArray();
        return $row;
    }

    public function saveProfil($data)
    {
        $db = db_connect();

        if (session()->get('status_user') == '200') {
            $builder = $db->table('tblbapel');
            $builder->where('kabupaten', session()->get('kodebapel'))->update($data);
        } elseif (session()->get('status_user') == '300') {
            $builder = $db->table('tblbpp');
            $builder->where('kecamatan', session()->get('kodebpp'))->update($data);
        }
    }

    public function getKoordinatBpp()
    {

        $query = $this->db->query("SELECT id, kecamatan, nama_bpp, alamat, ketua, email, koordinat_lokasi_bpp FROM tblbpp WHERE koordinat_lokasi_bpp <> '' ORDER BY id");

        $row   = $query->getResultArray();
        return $row;
    }
}
