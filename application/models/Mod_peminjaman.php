<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_peminjaman extends CI_Model
{

    private $table = "transaksi";
    private $tmp   = "tmp";

    function AutoNumbering()
    {
        $today = date('Ymd');

        $data = $this->db->query("SELECT MAX(id_transaksi) AS last FROM $this->table ")->row_array();

        $lastNoFaktur = $data['last'];

        $lastNoUrut   = substr($lastNoFaktur,8,3);

        $nextNoUrut   = $lastNoUrut+1;

        $nextNoTransaksi = $today.sprintf('%03s',$nextNoUrut);

        return $nextNoTransaksi;
    }

    function getTmp()
    {
        return $this->db->get("tmp");
    }

    function cekTmp($kode)
    {
        $this->db->where("kode_barang",$kode);
        return $this->db->get("tmp");
    }

    function InsertTmp($data,$kode,$jmlhbrng)
    {

        $this->db->insert($this->tmp, $data);
		$this->db->select('jumlah');
        $this->db->from('barang');
        $this->db->where('kode_barang', $kode);
        $barang = $this->db->get()->result();
        $data_barang = array('jumlah' => $barang[0]->jumlah-$jmlhbrng);

        $this->db->where('kode_barang', $kode);
        $this->db->update('barang', $data_barang);

    }
    function InsertTransaksi($data)
    {
        $this->db->insert($this->table, $data);
    }

    function jumlahTmp()
    {
        return $this->db->count_all("tmp");
    }

    function deleteTmp($kode_barang)
    {
        $this->db->where("kode_barang",$kode_barang);
        $this->db->delete($this->tmp);
    }

    function getTransaksi()
    {
        return $this->db->get($this->table);
    }

	public function getTransaksi1($pinjam,$kembali){
		$query=$this->db->query("SELECT * FROM transaksi
		LEFT JOIN barang ON barang.kode_barang = transaksi.kode_barang
		where transaksi.tanggal_pinjam='".$pinjam."' and  transaksi.tanggal_kembali='".$kembali."' ");
        return $query;
	}

  public function getTransaksi2($pinjam1,$pinjam2){
    $query=$this->db->query("SELECT * FROM transaksi
    LEFT JOIN barang ON barang.kode_barang = transaksi.kode_barang
    where transaksi.tanggal_pinjam between '".$pinjam1."' and  '".$pinjam2."' ");
        return $query;
  }
}

/* End of file Mod_peminjaman.php */
