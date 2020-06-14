<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mod_laporan','Mod_barang','Mod_karyawan','Mod_peminjaman','Mod_pengembalian'));
    }


    public function karyawan()
    {
        $data['karyawan']      = $this->Mod_karyawan->getAll();
        $this->template->load('layoutbackend', 'laporan/karyawan_data', $data);
    }

    public function barang()
    {
        $data['barang']      = $this->Mod_barang->getAll();
        $this->template->load('layoutbackend', 'laporan/barang_data', $data);
    }

    public function peminjaman()
    {
        $data['title']="Laporan Peminjaman";
        $this->template->load('layoutbackend', 'laporan/peminjaman_data', $data);
    }
    public function cetak_karyawan()
    {
        $data['karyawan'] = $this->Mod_karyawan->getAll();
        $this->load->view('laporan/laporan_print_karyawan', $data);
    }
    public function cetak_barang()
    {

        $data['barang'] = $this->Mod_barang->getAll();
        $this->load->view('laporan/laporan_print_barang', $data);
    }

    public function cetak()
    {
        $tanggal_pinjam1 = $this->input->post('hidd_tanggal1');
		$tanggal_pinjam2 = $this->input->post('hidd_tanggal2');


		$object= $this->Mod_peminjaman->getTransaksi2($tanggal_pinjam1 ,$tanggal_pinjam2)->result();

       $data['object'] = $object;
		//var_dump($data);

        $this->load->view('laporan/laporan_print', $data);
		$html = $this->output->get_output();

		// Load library
		$this->load->library('dompdf_gen');

		// Convert to PDF
		$customPaper = array(0, 0, 612.00, 905.00);
		$this->dompdf->load_html($html);
		$this->dompdf->set_paper($customPaper, 'portrait');
		$this->dompdf->render();
		$canvas = $this->dompdf->get_canvas();
		$font = Font_Metrics::get_font("helvetica");
		$canvas->page_text(300,889, "{PAGE_NUM}", $font, 9, array(0,0,0));
		$canvas->get_cpdf()->setEncryption('',$axs,array('print'));

		$this->dompdf->stream("laporan_peminjaman.pdf");

    }
    public function cetakPengembalian()
    {
		$tanggal_pinjam = $this->input->post('hidd_tanggal1');
		$tanggal_kembali = $this->input->post('hidd_tanggal2');


		$object= $this->Mod_pengembalian->getTransaksi2($tanggal_pinjam,$tanggal_kembali)->result();


        $data['object'] = $object;
        // var_dump($data);

        $this->load->view('laporan/laporan_print', $data);
		$html = $this->output->get_output();

		// Load library
		$this->load->library('dompdf_gen');

		// Convert to PDF
		$customPaper = array(0, 0, 612.00, 905.00);
		$this->dompdf->load_html($html);
		$this->dompdf->set_paper($customPaper, 'portrait');
		$this->dompdf->render();
		$canvas = $this->dompdf->get_canvas();
		$font = Font_Metrics::get_font("helvetica");
		$canvas->page_text(300,889, "{PAGE_NUM}", $font, 9, array(0,0,0));
		$canvas->get_cpdf()->setEncryption('',$axs,array('print'));


			$this->dompdf->stream("laporan_peminjaman.pdf");
    }

    public function cari_pinjaman()
    {

        $tanggal1 = $this->input->post('tanggal1');
        $tanggal2 = $this->input->post('tanggal2');
        $data['hasil_search'] = $this->Mod_laporan->searchPinjaman($tanggal1,$tanggal2);
        $this->load->view('laporan/peminjaman_search', $data);
    }

    public function detail_pinjam()
    {

        $id_transaksi = $this->input->post('id_transaksi');

        $data['title']        = "Detail Peminjaman";
        $data['pinjam']       = $this->Mod_laporan->detailPinjaman($id_transaksi)->row_array();
        $data['detailpinjam'] = $this->Mod_laporan->detailPinjaman($id_transaksi)->result();
        $this->load->view('laporan/peminjaman_detail', $data);


    }

    public function pengembalian()
    {
        $data['title']="Laporan Pengembalian";
        $this->template->load('layoutbackend', 'laporan/pengembalian_data', $data);
    }

    public function cari_pengembalian()
    {

        $tanggal1 = $this->input->post('tanggal1');
        $tanggal2 = $this->input->post('tanggal2');
        $data['hasil_search'] = $this->Mod_laporan->searchPengembalian($tanggal1,$tanggal2);
        $this->load->view('laporan/pengembalian_search', $data);

    }

    public function detail_pengembalian()
    {
        $id_transaksi = $this->input->post('id_transaksi');
        $data['title']               = "Detail Pengembalian";
        $data['pengembalian']        = $this->Mod_laporan->detailPengembalian($id_transaksi)->row_array();
        $data['detailjpengembalian'] = $this->Mod_laporan->detailPengembalian($id_transaksi)->result();
        $this->load->view('laporan/pengembalian_detail', $data);

    }



}

/* End of file Laporan.php */
