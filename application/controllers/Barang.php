<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class barang extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_barang');
    }


    public function index()
    {
        $data['barang']      = $this->Mod_barang->getAll();


        if($this->uri->segment(3)=="create-success") {
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Disimpan...!</p></div>";
            $this->template->load('layoutbackend', 'barang/barang_data', $data);
        }
        else if($this->uri->segment(3)=="update-success"){
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Diubah...!</p></div>";
            $this->template->load('layoutbackend', 'barang/barang_data', $data);
        }
        else if($this->uri->segment(3)=="delete-success"){
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Dihapus...!</p></div>";
            $this->template->load('layoutbackend', 'barang/barang_data', $data);
        }
        else{
            $data['message'] = "";
            $this->template->load('layoutbackend', 'barang/barang_data', $data);
        }

    }

    public function create()
    {
        $this->template->load('layoutbackend', 'barang/barang_create');
    }

    public function insert()
    {
        if(isset($_POST['save'])) {

            //function validasi
            $this->_set_rules();

            //apabila user mengkosongkan form input
            if($this->form_validation->run()==true){
                // echo "masuk"; die();
                $kode_barang = $this->input->post('kode_barang');
                $cek = $this->Mod_barang->cekbarang($kode_barang);
                //cek nik yg sudah digunakan
                if($cek->num_rows() > 0){
                    $data['message'] = "<div class='alert alert-block alert-danger'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <p><strong><i class='icon-ok'></i>Kode barang</strong> Sudah Digunakan...!</p></div>";
                    $this->template->load('layoutbackend', 'barang/barang_create', $data);
                }
                else{
                    $nama_barang = slug($this->input->post('nama_barang'));
                    $date=new DateTime(); //this returns the current date time
					$tgl = $date->format('Y-m-d');
					$time = $date->format('H-i-s');
					$jam = explode('-',$time);
					$waktu = implode("",$jam);
					$krr = explode('-',$tgl);
					$tanggal = implode("",$krr);
					$file_userfile = $_FILES['userfile']['name'];
					$ukuran_file_userfile = $_FILES['userfile']['size'];
					$tipe_file_userfile = $_FILES['userfile']['type'];
					$tmp_file_userfile = $_FILES['userfile']['tmp_name'];
					$path_file_userfile = "./assets/img/barang/";
					$file_userfile_basename = substr($file_userfile, 0, strripos($file_userfile, '.')); // get file extention
					$file_userfile_ext = substr($file_userfile, strripos($file_userfile, '.')); // get file name
					$newfile_userfile = ("file_skppkom_".$tanggal."_".$waktu."_".md5($file_userfile_basename)) . $file_userfile_ext;
					if($tipe_file_userfile == "image/jpg" || $tipe_file_userfile == "image/jpeg" || $tipe_file_userfile == "image/png"  )
					{
						if(move_uploaded_file($tmp_file_userfile, $path_file_userfile . $newfile_userfile))
						{
							$save  = array(
								'kode_barang'   => $this->input->post('kode_barang'),
								'nama_barang'   => $this->input->post('nama_barang'),
								'jenis_barang'  => $this->input->post('jenis_barang'),
								'jumlah'        => $this->input->post('jumlah'),
								'keterangan'    => $this->input->post('keterangan'),
								'gambar'        => $newfile_userfile
							);
							$this->Mod_barang->insertbarang("barang", $save);
							// echo "berhasil"; die();
							redirect('barang/index/create-success');
						}

					}
                    //apabila tidak ada gambar yg diupload
                    else{
                        $data['message'] = "<div class='alert alert-block alert-danger'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <p><strong><i class='icon-ok'></i>Gambar</strong> Masih Kosong...!</p></div>";
                        $this->template->load('layoutbackend', 'barang/barang_create', $data);


                    }
                }

            }
            //jika tidak mengkosongkan form
            else{
                $data['message'] = "";
                $this->template->load('layoutbackend', 'barang/barang_create', $data);
            }

        }
    }

    public function edit()
    {
        $kode_barang = $this->uri->segment(3);

        $data['edit']    = $this->Mod_barang->cekbarang($kode_barang)->row_array();

        $this->template->load('layoutbackend', 'barang/barang_edit', $data);
    }

    public function update()
    {
        if(isset($_POST['update'])) {

            //apabila ada gambar yg diupload
            if(!empty($_FILES['userfile']['name'])) {

                $this->_set_rules();

                //apabila user mengkosongkan form input
                if($this->form_validation->run()==true){

                    $kode_barang = $this->input->post('kode_barang');

                    $nama_barang = slug($this->input->post('nama_barang'));
                    $config['upload_path']   = './assets/img/barang/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size']	     = '1000';
                    $config['max_width']     = '2000';
                    $config['max_height']    = '1024';
                    $config['file_name']     = $nama_barang;

                    $this->upload->initialize($config);

                        //apabila ada gambar yg diupload
                    if ($this->upload->do_upload('userfile')){

                        $gambar = $this->upload->data();

                        $save  = array(
                            'kode_barang'   => $this->input->post('kode_barang'),
                            'nama_barang'   => $this->input->post('nama_barang'),
                            'jenis_barang'  => $this->input->post('jenis_barang'),
                            'jumlah'        => $this->input->post('jumlah'),
                            'keterangan'    => $this->input->post('keterangan'),
                            'gambar'        => $gambar['file_name']
                        );

                        $g = $this->Mod_barang->getGambar($kode_barang)->row_array();

                        //hapus gambar yg ada diserver
                        unlink('assets/img/barang/'.$g['gambar']);

                        $this->Mod_barang->updatebarang($kode_barang, $save);
                        redirect('barang/index/update-success');

                    }
                    //apabila tidak ada gambar yg diupload
                    else{
                        $data['message'] = "<div class='alert alert-block alert-danger'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <p><strong><i class='icon-ok'></i>Gambar</strong> Masih Kosong...!</p></div>";
                        $this->template->load('layoutbackend', 'barang/barang_edit', $data);
                    }


                }
                //jika tidak mengkosongkan
                else{

                    $kode_barang = $this->input->post('kode_barang');
                    $data['edit']    = $this->Mod_barang->cekbarang($kode_barang)->row_array();
                    $data['message'] = "";
                    $this->template->load('layoutbackend', 'barang/barang_edit', $data);
                }

            }
            //jika tidak ada gambar yg diupload
            else{
                $this->_set_rules();

                //apabila user mengkosongkan form input
                if($this->form_validation->run()==true){

                    $kode_barang = $this->input->post('kode_barang');

                    $save  = array(
                        'kode_barang'   => $this->input->post('kode_barang'),
                        'nama_barang'   => $this->input->post('nama_barang'),
                        'jenis_barang'  => $this->input->post('jenis_barang'),
                        'jumlah'        => $this->input->post('jumlah'),
                        'keterangan'    => $this->input->post('keterangan')
                    );
                    $this->Mod_barang->updatebarang($kode_barang, $save);

                    redirect('barang/index/update-success');
                }
                //jika tidak mengkosongkan
                else{
                    $kode_barang = $this->input->post('kode_barang');
                    $data['edit']    = $this->Mod_barang->cekbarang($kode_barang)->row_array();
                    $data['message'] = "";
                    $this->template->load('layoutbackend', 'barang/barang_edit', $data);
                }

            } //end empty $_FILES

        } // end $_POST['update']

    }

    public function delete()
    {

        $kode_barang = $this->input->post('kode_barang');

        $g = $this->Mod_barang->getGambar($kode_barang)->row_array();

        //hapus gambar yg ada diserver
        unlink('assets/img/barang/'.$g['gambar']);

        $this->Mod_barang->deletebarang($kode_barang, 'barang');

        redirect('barang/index/delete-success');
    }

    //function global buat validasi input
    public function _set_rules()
    {
        $this->form_validation->set_rules('kode_barang','Kode Barang','required|max_length[5]');
        $this->form_validation->set_rules('nama_barang','Nama Narang','required|max_length[100]');
        $this->form_validation->set_rules('jenis_barang','Jenis Barang','required|max_length[50]');
        $this->form_validation->set_rules('jumlah','Jumlah','required|max_length[200]');
        $this->form_validation->set_rules('keterangan','Keterangan','required|max_length[200]');
        $this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert'>&times;</a>","</div>");
    }

}

/* End of file barang.php */
