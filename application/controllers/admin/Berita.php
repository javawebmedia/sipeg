<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('berita_model');
		$this->load->model('kategori_model');
	}

	// Main page berita
	public function index()
	{
		$berita = $this->berita_model->listing();

		$data = array(	'title'		=> 'Data berita ('.count($berita).')',
						'berita'	=> $berita,
						'isi'		=> 'admin/berita/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Tambah berita
	public function tambah()
	{
		
		$kategori = $this->kategori_model->listing();

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('judul_berita','Judul berita','required',
			array(	'required'		=> '%s harus diisi'));

		
		if($valid->run()) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; // KB
			$config['max_width']  		= '3000'; // Pixel
			$config['max_height']  		= '3000'; //Pixel
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
				
		// End validasi

		$data = array(	'title'		=> 'Tambah Berita',
						'kategori'	=> $kategori,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/berita/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$upload_data        		= array('uploads' =>$this->upload->data());
	        // Image Editor
	        $config['image_library']  	= 'gd2';
	        $config['source_image']   	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
	        $config['new_image']     	= './assets/upload/image/thumbs/';
	        $config['create_thumb']   	= TRUE;
	        $config['quality']       	= "100%";
	        $config['maintain_ratio']   = TRUE;
	        $config['width']       		= 360; // Pixel
	        $config['height']       	= 360; // Pixel
	        $config['x_axis']       	= 0;
	        $config['y_axis']       	= 0;
	        $config['thumb_marker']   	= '';
	        $this->load->library('image_lib', $config);
	        $this->image_lib->resize();

			$i = $this->input;
			$data = array(	'id_pegawai'		=> $this->session->userdata('id_pegawai'),
							'id_kategori'	=> $i->post('id_kategori'),
							'slug_berita'	=> url_title($i->post('judul_berita','dash',true)),
							'judul_berita'	=> $i->post('judul_berita'),
							'status_berita'	=> $i->post('status_berita'),
							'jenis_berita'	=> $i->post('jenis_berita'),
							'isi_berita'	=> $i->post('isi_berita'),
							'gambar'		=> $upload_data['uploads']['file_name'],
							'tanggal_post'	=> date('Y-m-d H:i:s')
						);
			$this->berita_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect('admin/berita','refresh');
		}}
		// End masuk database
		$data = array(	'title'		=> 'Tambah Berita',
						'kategori'	=> $kategori,
						'isi'		=> 'admin/berita/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Fungsi edit berita
	public function edit($id_berita)
	{
		$berita = $this->berita_model->detail($id_berita);

		$kategori = $this->kategori_model->listing();

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('judul_berita','Judul berita','required',
			array(	'required'		=> '%s harus diisi'));

		
		if($valid->run()) {

			if(!empty($_FILES['gambar']['name'])) {

			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; // KB
			$config['max_width']  		= '3000'; // Pixel
			$config['max_height']  		= '3000'; //Pixel
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
				
		// End validasi

		$data = array(	'title'		=> 'Edit Berita',
						'berita'	=> $berita,
						'kategori'	=> $kategori,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/berita/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$upload_data        		= array('uploads' =>$this->upload->data());
	        // Image Editor
	        $config['image_library']  	= 'gd2';
	        $config['source_image']   	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
	        $config['new_image']     	= './assets/upload/image/thumbs/';
	        $config['create_thumb']   	= TRUE;
	        $config['quality']       	= "100%";
	        $config['maintain_ratio']   = TRUE;
	        $config['width']       		= 360; // Pixel
	        $config['height']       	= 360; // Pixel
	        $config['x_axis']       	= 0;
	        $config['y_axis']       	= 0;
	        $config['thumb_marker']   	= '';
	        $this->load->library('image_lib', $config);
	        $this->image_lib->resize();

			$i = $this->input;
			$data = array(	'id_berita'		=> $id_berita,
							'id_pegawai'		=> $this->session->userdata('id_pegawai'),
							'id_kategori'	=> $i->post('id_kategori'),
							'slug_berita'	=> url_title($i->post('judul_berita','dash',true)),
							'judul_berita'	=> $i->post('judul_berita'),
							'status_berita'	=> $i->post('status_berita'),
							'jenis_berita'	=> $i->post('jenis_berita'),
							'isi_berita'	=> $i->post('isi_berita'),
							'gambar'		=> $upload_data['uploads']['file_name'],
						);
			$this->berita_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect('admin/berita','refresh');
		}}else{
			$i = $this->input;
			$data = array(	'id_berita'		=> $id_berita,
							'id_pegawai'		=> $this->session->userdata('id_pegawai'),
							'id_kategori'	=> $i->post('id_kategori'),
							'slug_berita'	=> url_title($i->post('judul_berita','dash',true)),
							'judul_berita'	=> $i->post('judul_berita'),
							'status_berita'	=> $i->post('status_berita'),
							'jenis_berita'	=> $i->post('jenis_berita'),
							'isi_berita'	=> $i->post('isi_berita'),
						);
			$this->berita_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect('admin/berita','refresh');
		}}
		// End masuk database
		$data = array(	'title'		=> 'Edit Berita',
						'berita'	=> $berita,
						'kategori'	=> $kategori,
						'isi'		=> 'admin/berita/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}


	// Delete berita
	public function delete($id_berita)
	{
		// PROTEKSI DELETE
		$this->simple_login->check_login();

		// Hapus gambar juga
		$berita = $this->berita_model->detail($id_berita);

		if($berita->gambar != "") {
			unlink('./assets/upload/image/'.$berita->gambar);
			unlink('./assets/upload/image/thumbs/'.$berita->gambar);
		}
		// End hapus

		$data = array(	'id_berita'		=> $id_berita);
		$this->berita_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect('admin/berita','refresh');
	}
}

/* End of file Berita.php */
/* Location: ./application/controllers/admin/Berita.php */