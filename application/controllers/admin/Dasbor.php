<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {
	
	// Load database
	public function __construct(){
		parent::__construct();
		$this->load->model('konfigurasi_model');
		$this->load->model('pegawai_model');
		$this->load->model('dasbor_model');
		// load helper
		$this->load->helper('string');
	}
	
	// Index
	public function index() {
		$site 		= $this->konfigurasi_model->listing();
		$pegawai 	= $this->pegawai_model->listing();
		$pensiun 	= $this->dasbor_model->pensiun_58();
		$struktural	= $this->dasbor_model->struktural();
		$fungsional	= $this->dasbor_model->fungsional();
		// DATA UNTUK GRAFIK
		$grafik 	= $this->dasbor_model->satker();

		$data = array(	'title'			=> $site['namaweb'].' - '.$site['tagline'],
						'pegawai'		=> $pegawai,
						'site'			=> $site,
						'pensiun'		=> $pensiun,
						'struktural'	=> $struktural,
						'fungsional'	=> $fungsional,
						'grafik'		=> $grafik,
						'isi'			=> 'admin/dasbor/list');
		$this->load->view('admin/layout/wrapper',$data);
	}
	
	// Profil
	public function profil() {
		$site = $this->konfigurasi_model->listing();
		$id_pegawai= $this->session->userdata('id');
		$user	= $this->user_model->detail($id_pegawai);
		
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama','Website name','required');
		$valid->set_rules('email','Email','required|valid_email');
		
		if($valid->run() === FALSE) {
			
		$data = array(	'title'	=> 'Update Profil - '.$site['namaweb'],
						'user'	=> $user,
						'isi'	=> 'admin/dasbor/profil');
		$this->load->view('admin/layout/wrapper',$data);	
		}else{
			$i = $this->input;
			$password = $i->post('password');
			if(strlen($password) < 6 || strlen($password) > 32 ) {
				$data = array(	'id_pegawai'	=> $i->post('id_pegawai'),
								'nama'		=> $i->post('nama'),
								'email'		=> $i->post('email'),
								'level'		=> $i->post('level'));
				$this->user_model->edit($data);		
				$this->session->set_flashdata('sukses','User updated and password changed');				
			}else{
				$data = array(	'id_pegawai'	=> $i->post('id_pegawai'),
								'nama'		=> $i->post('nama'),
								'email'		=> $i->post('email'),
								'password'	=> sha1($i->post('password')),
								'level'		=> $i->post('level'));
				$this->user_model->edit($data);		
				$this->session->set_flashdata('sukses','User updated successfully');
			}
			redirect(base_url('admin/dasbor/profil'));
		}	
	}
	
	// General Configuration
	public function konfigurasi() {
		$site = $this->konfigurasi_model->listing();
		
		// Validasi 
		$this->form_validation->set_rules('namaweb','Website name website','required');
		$this->form_validation->set_rules('email','Email','valid_email');
		
		if($this->form_validation->run() === FALSE) {
			
		$data = array(	'title'	=> 'General Configuration',
						'site'	=> $site,
						'isi'	=> 'admin/dasbor/umum');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
			$i = $this->input;
			$data = array(	'id_konfigurasi'	=> $i->post('id_konfigurasi'),
							'namaweb'			=> $i->post('namaweb'),
							'tagline'			=> $i->post('tagline'),
							'tentang'			=> $i->post('tentang'),
							'website'			=> $i->post('website'),
							'email'				=> $i->post('email'),
							'alamat'			=> $i->post('alamat'),
							'telepon'			=> $i->post('telepon'),
							'hp'				=> $i->post('hp'),
							'fax'				=> $i->post('fax'),
							'keywords'			=> $i->post('keywords'),
							'metatext'			=> $i->post('metatext'),
							'facebook'			=> $i->post('facebook'),
							'twitter'			=> $i->post('twitter'),
							'instagram'			=> $i->post('instagram'),
							'google_map'		=> $i->post('google_map'),
							'id_pegawai'			=> $this->session->userdata('id'));
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses','Site configuration updated successfully');
			redirect(base_url('admin/dasbor/konfigurasi'));
		}
	}
	
	// New logo
	public function logo() {
		$site = $this->konfigurasi_model->listing();
		
		$v = $this->form_validation;
		$v->set_rules('id_konfigurasi','ID Konfigurasi','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '12000'; // KB	
$this->load->library('upload', $config);
			if(! $this->upload->do_upload('logo')) {
				
		$data = array(	'title'	=> 'New logo',
						'site'	=> $site,
						'error'	=> $this->upload->display_errors(),
						'isi'	=> 'admin/dasbor/logo');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 150; // Pixel
				$config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				// Hapus gambar lama
				unlink('./assets/upload/image/'.$site['logo']);
				unlink('./assets/upload/image/thumbs/'.$site['logo']);
				// End hapus gambar lama
				// Masuk ke database
				$i = $this->input;
				$data = array(	'id_konfigurasi'=> $i->post('id_konfigurasi'),
								'logo'			=> $upload_data['uploads']['file_name'],
								'id_pegawai'			=> $this->session->userdata('id'));
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses','Logo changed');
				redirect(base_url('admin/dasbor/logo'));
		}}
		// Default page
		$data = array(	'title'	=> 'New logo',
						'site'	=> $site,
						'isi'	=> 'admin/dasbor/logo');
		$this->load->view('admin/layout/wrapper',$data);
	}
	
	// Konfigurasi Icon
	public function icon() {
		$site = $this->konfigurasi_model->listing();
		
		$v = $this->form_validation;
		$v->set_rules('id_konfigurasi','ID Konfigurasi','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '12000'; // KB	
$this->load->library('upload', $config);
			if(! $this->upload->do_upload('icon')) {
				
		$data = array(	'title'	=> 'New Icon',
						'site'	=> $site,
						'error'	=> $this->upload->display_errors(),
						'isi'	=> 'admin/dasbor/icon');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 150; // Pixel
				$config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				// Hapus gambar lama
				unlink('./assets/upload/image/'.$site['icon']);
				unlink('./assets/upload/image/thumbs/'.$site['icon']);
				// End hapus gambar lama
				$this->image_lib->resize();
				// Masuk ke database
				$i = $this->input;
				$data = array(	'id_konfigurasi'=> $i->post('id_konfigurasi'),
								'icon'			=> $upload_data['uploads']['file_name'],
								'id_pegawai'			=> $this->session->userdata('id'));
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses','Icon changed');
				redirect(base_url('admin/dasbor/icon'));
		}}
		// Default page
		$data = array(	'title'	=> 'New Icon',
						'site'	=> $site,
						'isi'	=> 'admin/dasbor/icon');
		$this->load->view('admin/layout/wrapper',$data);
	}

	// New banner
	public function banner() {
		$site = $this->konfigurasi_model->listing();
		
		$v = $this->form_validation;
		$v->set_rules('id_konfigurasi','ID Konfigurasi','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '12000'; // KB	
$this->load->library('upload', $config);
			if(! $this->upload->do_upload('banner')) {
				
		$data = array(	'title'	=> 'New banner',
						'site'	=> $site,
						'error'	=> $this->upload->display_errors(),
						'isi'	=> 'admin/dasbor/banner');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 150; // Pixel
				$config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				// Hapus gambar lama
				unlink('./assets/upload/image/'.$site['banner']);
				unlink('./assets/upload/image/thumbs/'.$site['banner']);
				// End hapus gambar lama
				// Masuk ke database
				$i = $this->input;
				$data = array(	'id_konfigurasi'=> $i->post('id_konfigurasi'),
								'banner'			=> $upload_data['uploads']['file_name'],
								'id_pegawai'			=> $this->session->userdata('id'));
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses','Logo changed');
				redirect(base_url('admin/dasbor/banner'));
		}}
		// Default page
		$data = array(	'title'	=> 'New banner',
						'site'	=> $site,
						'isi'	=> 'admin/dasbor/banner');
		$this->load->view('admin/layout/wrapper',$data);
	}
	
	// Quote
	public function quote() {
		$site = $this->konfigurasi_model->listing();
		
		// Validasi 
		$this->form_validation->set_rules('judul_1','Judul Quote 1','required');
		$this->form_validation->set_rules('pesan_1','Pesan Quote 1','required');
		$this->form_validation->set_rules('judul_2','Judul Quote 2','required');
		$this->form_validation->set_rules('pesan_2','Pesan Quote 2','required');
		$this->form_validation->set_rules('judul_3','Judul Quote 3','required');
		$this->form_validation->set_rules('pesan_3','Pesan Quote 3','required');
		$this->form_validation->set_rules('judul_4','Judul Quote 4','required');
		$this->form_validation->set_rules('pesan_4','Pesan Quote 4','required');
		
		if($this->form_validation->run() === FALSE) {
			
		$data = array(	'title'	=> 'General Configuration - Quote Front End',
						'site'	=> $site,
						'isi'	=> 'admin/dasbor/quote');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
			$i = $this->input;
			$data = array(	'id_konfigurasi'	=> $i->post('id_konfigurasi'),
							'judul_1'			=> $i->post('judul_1'),
							'pesan_1'			=> $i->post('pesan_1'),
							'judul_2'			=> $i->post('judul_2'),
							'pesan_2'			=> $i->post('pesan_2'),
							'judul_3'			=> $i->post('judul_3'),
							'pesan_3'			=> $i->post('pesan_3'),
							'judul_4'			=> $i->post('judul_4'),
							'pesan_4'			=> $i->post('pesan_4'),
							'judul_5'			=> $i->post('judul_5'),
							'pesan_5'			=> $i->post('pesan_5'),
							'judul_6'			=> $i->post('judul_6'),
							'pesan_6'			=> $i->post('pesan_6'),
							'id_pegawai'			=> $this->session->userdata('id'));
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses','Site configuration updated successfully');
			redirect(base_url('admin/dasbor/quote'));
		}
	}
	
	// New javawebmedia
	public function javawebmedia() {
		$site = $this->konfigurasi_model->listing();
		
		$v = $this->form_validation;
		$v->set_rules('id_konfigurasi','ID Konfigurasi','required');
		
		if($v->run()) {
			if(!empty($_FILES['gambar']['name'])) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '12000'; // KB	
$this->load->library('upload', $config);
			if(! $this->upload->do_upload('gambar')) {
				
		$data = array(	'title'	=> $site['namaweb'].' Information',
						'site'	=> $site,
						'error'	=> $this->upload->display_errors(),
						'isi'	=> 'admin/dasbor/javawebmedia');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 150; // Pixel
				$config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				// Hapus gambar lama
				unlink('./assets/upload/image/'.$site['gambar']);
				unlink('./assets/upload/image/thumbs/'.$site['gambar']);
				// End hapus gambar lama
				// Masuk ke database
				$i = $this->input;
				$data = array(	'id_konfigurasi'=> $i->post('id_konfigurasi'),
								'gambar'		=> $upload_data['uploads']['file_name'],
								'video'			=> $i->post('video'),
								'javawebmedia'			=> $i->post('javawebmedia'),
								'id_pegawai'		=> $this->session->userdata('id'));
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses',$site['namaweb'].' information changed');
				redirect(base_url('admin/dasbor/javawebmedia'));
		}}else{
				$i = $this->input;
				$data = array(	'id_konfigurasi'=> $i->post('id_konfigurasi'),
								'video'			=> $i->post('video'),
								'javawebmedia'			=> $i->post('javawebmedia'),
								'id_pegawai'		=> $this->session->userdata('id'));
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses',$site['namaweb'].' information changed');
				redirect(base_url('admin/dasbor/javawebmedia'));
		}}
		// Default page
		$data = array(	'title'	=> $site['namaweb'].' Information',
						'site'	=> $site,
						'isi'	=> 'admin/dasbor/javawebmedia');
		$this->load->view('admin/layout/wrapper',$data);
	}

	// Download semua satker
	public function excel()
	{
		$this->load->dbutil();
		$this->load->helper('download');
		$this->load->helper('file');
		$rekap 		= $this->dasbor_model->satker_excel();
		$filename 	= 'rekap-'.date('Y-m-d').'.csv';
		$delimiter = ",";
        $newline 	= "\r\n";

		$data = $this->dbutil->csv_from_result($rekap, $delimiter, $newline);
        force_download($filename, $data);
	}

	// Download data pegawai
	public function pegawai()
	{
		$this->load->dbutil();
		$this->load->helper('download');
		$this->load->helper('file');
		$rekap 		= $this->dasbor_model->pegawai_excel();
		$filename 	= 'rekap-pegawai-'.date('Y-m-d').'.csv';
		$delimiter = ",";
        $newline 	= "\r\n";

		$data = $this->dbutil->csv_from_result($rekap, $delimiter, $newline);
        force_download($filename, $data);
	}
	
}