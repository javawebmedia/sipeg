<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluarga extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pegawai_model');
		$this->load->model('jenjang_model');
		$this->load->model('referensi_model');
		$this->load->model('hubkel_model');
		$this->load->model('keluarga_model');
	}

	// Main page
	public function index()
	{
		if($this->session->userdata('akses_level')=="Pegawai") {
			$id_pegawai = $this->session->userdata('id_pegawai');
			$keluarga 	= $this->keluarga_model->pegawai($id_pegawai);
		}else{
			$keluarga 	= $this->keluarga_model->listing();
		}
		$jumlah 	= count($keluarga);

		$data = array(	'title'		=> 'Data Keluarga Pegawai ('.$jumlah.')',
						'keluarga'	=> $keluarga,
						'isi'		=> 'admin/keluarga/list'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Detail page
	public function read($id_keluarga)
	{
		$keluarga 	= $this->keluarga_model->read($id_keluarga);
		$id_pegawai = $keluarga->id_pegawai;
		$pegawai 	= $this->pegawai_model->detail($id_pegawai);

		$data = array(	'title'		=> 'Detail: '.$keluarga->nama_lengkap,
						'keluarga'	=> $keluarga,
						'pegawai'	=> $pegawai,
						'isi'		=> 'admin/keluarga/read'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Cetak page
	public function cetak($id_keluarga)
	{
		// Proteksi
		$this->simple_login->check_login();
		
		$keluarga 	= $this->keluarga_model->read($id_keluarga);
		$id_pegawai = $keluarga->id_pegawai;
		$pegawai 	= $this->pegawai_model->detail($id_pegawai);

		$data = array(	'title'		=> 'Detail: '.$keluarga->nama_lengkap,
						'keluarga'	=> $keluarga,
						'pegawai'	=> $pegawai,
						);
		$this->load->view('admin/keluarga/cetak', $data, FALSE);
	}

	// Tambah Pegawai
	public function tambah()
	{
		$pegawai 	= $this->pegawai_model->listing();
		$jumlah 	= count($pegawai);

		$data = array(	'title'		=> 'Data Pegawai ('.$jumlah.')',
						'pegawai'	=> $pegawai,
						'isi'		=> 'admin/keluarga/list_pegawai'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Kelola keluarga pegawai
	public function pegawai()
	{
		if($this->session->userdata('akses_level')=="Pegawai") {
			$id_pegawai = $this->session->userdata('id_pegawai');
			$keluarga 	= $this->keluarga_model->pegawai($id_pegawai);
		}else{
			$id_pegawai = $this->uri->segment(4);
			$keluarga 	= $this->keluarga_model->pegawai($id_pegawai);
		}
		$jumlah 	= count($keluarga);
		$pegawai 	= $this->pegawai_model->detail($id_pegawai);
		$hubkel 	= $this->hubkel_model->listing();
		$jenjang = $this->jenjang_model->listing();
		$agama 		= $this->referensi_model->listing_agama();

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_lengkap','Nama lengkap','required',
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

		$data = array(	'title'		=> 'Keluarga: '.$pegawai->nama_lengkap.' ('.$jumlah.')',
						'keluarga'	=> $keluarga,
						'pegawai'	=> $pegawai,
						'hubkel'	=> $hubkel,
						'jenjang'	=> $jenjang,
						'agama'		=> $agama,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/keluarga/pegawai'
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
			$data = array(	'id_pegawai'		=> $id_pegawai,
							'id_jenjang'		=> $i->post('id_jenjang'),
							'id_agama'			=> $i->post('id_agama'),
							'id_hubkel'			=> $i->post('id_hubkel'),
							'nrk'				=> $pegawai->nrk,
							'nama_lengkap'		=> $i->post('nama_lengkap'),
							'jenis_kelamin'		=> $i->post('jenis_kelamin'),
							'tempat_lahir'		=> $i->post('tempat_lahir'),
							'tanggal_lahir'		=> $i->post('tanggal_lahir'),
							'gambar'			=> $upload_data['uploads']['file_name'],
							'keterangan'		=> $i->post('keterangan'),
							'posted_by'			=> $this->session->userdata('id_pegawai'),
							'tanggal_post'		=> date('Y-m-d H:i:s')
						);
			$this->keluarga_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah tambah');
			redirect('admin/keluarga/pegawai/'.$id_pegawai,'refresh');
		}}else{
			$i = $this->input;
			$data = array(	'id_pegawai'		=> $id_pegawai,
							'id_jenjang'		=> $i->post('id_jenjang'),
							'id_agama'			=> $i->post('id_agama'),
							'id_hubkel'			=> $i->post('id_hubkel'),
							'nrk'				=> $pegawai->nrk,
							'nama_lengkap'		=> $i->post('nama_lengkap'),
							'jenis_kelamin'		=> $i->post('jenis_kelamin'),
							'tempat_lahir'		=> $i->post('tempat_lahir'),
							'tanggal_lahir'		=> $i->post('tanggal_lahir'),
							//'gambar'			=> $upload_data['uploads']['file_name'],
							'keterangan'		=> $i->post('keterangan'),
							'posted_by'			=> $this->session->userdata('id_pegawai'),
							'tanggal_post'		=> date('Y-m-d H:i:s')
						);
			$this->keluarga_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah tambah');
			redirect('admin/keluarga/pegawai/'.$id_pegawai,'refresh');
		}}
		// End masuk database
		$data = array(	'title'		=> 'Keluarga: '.$pegawai->nama_lengkap.' ('.$jumlah.')',
						'keluarga'	=> $keluarga,
						'pegawai'	=> $pegawai,
						'hubkel'	=> $hubkel,
						'jenjang'	=> $jenjang,
						'agama'		=> $agama,
						// 'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/keluarga/pegawai'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Edit data keluarga
	public function edit($id_keluarga)
	{
		$keluarga 	= $this->keluarga_model->detail($id_keluarga);
		$id_pegawai	= $keluarga->id_pegawai;
		$pegawai 	= $this->pegawai_model->detail($id_pegawai);
		$hubkel 	= $this->hubkel_model->listing();
		$jenjang = $this->jenjang_model->listing();
		$agama 		= $this->referensi_model->listing_agama();

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_lengkap','Nama lengkap','required',
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

		$data = array(	'title'		=> 'Edit: '.$keluarga->nama_lengkap,
						'keluarga'	=> $keluarga,
						'pegawai'	=> $pegawai,
						'hubkel'	=> $hubkel,
						'jenjang'	=> $jenjang,
						'agama'		=> $agama,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/keluarga/edit'
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
			$data = array(	'id_keluarga'		=> $id_keluarga,
							'id_pegawai'		=> $id_pegawai,
							'id_jenjang'		=> $i->post('id_jenjang'),
							'id_agama'			=> $i->post('id_agama'),
							'id_hubkel'			=> $i->post('id_hubkel'),
							'nrk'				=> $pegawai->nrk,
							'nama_lengkap'		=> $i->post('nama_lengkap'),
							'jenis_kelamin'		=> $i->post('jenis_kelamin'),
							'tempat_lahir'		=> $i->post('tempat_lahir'),
							'tanggal_lahir'		=> $i->post('tanggal_lahir'),
							'gambar'			=> $upload_data['uploads']['file_name'],
							'keterangan'		=> $i->post('keterangan'),
							'updated_by'		=> $this->session->userdata('id_pegawai'),
						);
			$this->keluarga_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diperbarui');
			redirect('admin/keluarga/pegawai/'.$id_pegawai,'refresh');
		}}else{
			$i = $this->input;
			$data = array(	'id_keluarga'		=> $id_keluarga,
							'id_pegawai'		=> $id_pegawai,
							'id_jenjang'		=> $i->post('id_jenjang'),
							'id_agama'			=> $i->post('id_agama'),
							'id_hubkel'			=> $i->post('id_hubkel'),
							'nrk'				=> $pegawai->nrk,
							'nama_lengkap'		=> $i->post('nama_lengkap'),
							'jenis_kelamin'		=> $i->post('jenis_kelamin'),
							'tempat_lahir'		=> $i->post('tempat_lahir'),
							'tanggal_lahir'		=> $i->post('tanggal_lahir'),
							//'gambar'			=> $upload_data['uploads']['file_name'],
							'keterangan'		=> $i->post('keterangan'),
							'updated_by'		=> $this->session->userdata('id_pegawai'),
						);
			$this->keluarga_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diperbarui');
			redirect('admin/keluarga/pegawai/'.$id_pegawai,'refresh');
		}}
		// End masuk database
		$data = array(	'title'		=> 'Edit: '.$keluarga->nama_lengkap,
						'keluarga'	=> $keluarga,
						'pegawai'	=> $pegawai,
						'hubkel'	=> $hubkel,
						'jenjang'	=> $jenjang,
						'agama'		=> $agama,
						//'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/keluarga/edit'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);;
	}

	// Delete
	public function delete()
	{
		// proteksi
		$this->simple_login->check_login();

		$id_keluarga 	= $this->uri->segment(4);
		$id_pegawai		= $this->uri->segment(5);
		$keluarga 		= $this->keluarga_model->detail($id_keluarga);

		// Hapus gambar jika ada
		$gambar 		= $keluarga->gambar;
		if($gambar != "") 
		{
			unlink('./assets/upload/image/'.$gambar);
			unlink('./assets/upload/image/thumbs/'.$gambar);
		}

		// Hapus data
		$data = array(	'id_keluarga'	=> $id_keluarga);
		
		$this->keluarga_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect('admin/keluarga/pegawai/'.$id_pegawai,'refresh');
	}

}

/* End of file Keluarga.php */
/* Location: ./application/controllers/admin/Keluarga.php */