<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pegawai_model');
		$this->load->model('referensi_model');
		// Load helper string
		$this->load->helper('string');
	}

	// Main page profil
	public function index()
	{
		$id_pegawai = $this->session->userdata('id_pegawai');
		$pegawai 	= $this->pegawai_model->detail($id_pegawai);

		$provinsi 	= $this->referensi_model->listing_provinsi();
		$kota 		= $this->referensi_model->listing_kabupaten();
		$jenis 		= $this->referensi_model->listing_jenis_pegawai();
		$agama 		= $this->referensi_model->listing_agama();

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_lengkap','Nama','required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('nrk','NRK','required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('nip','NIP','required',
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

		$data = array(	'title'		=> 'Perbaharui Profil: '.$pegawai->nama_lengkap,
						'pegawai'	=> $pegawai, // Data pegawai yg diedit
						'provinsi'	=> $provinsi,
						'kota'		=> $kota,
						'jenis'		=> $jenis,
						'agama'		=> $agama,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/profil/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Validasi lolos dan masuk database
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

			$i 	= $this->input;
			$data = array(	'id_pegawai'		=> $id_pegawai, // Dari URL
							//'id_jenis_pegawai'	=> $i->post('id_jenis_pegawai'),
							'tmt_cpns'			=> $i->post('tmt_cpns'),
							'tmt_pns'			=> $i->post('tmt_pns'),
							'updated_by'		=> $this->session->userdata('id_pegawai'),
							//'nip'				=> $i->post('nip'),
							//'nrk'				=> $i->post('nrk'),
							'nama_lengkap'		=> $i->post('nama_lengkap'),
							'gelar_depan'		=> $i->post('gelar_depan'),
							'gelar_belakang'	=> $i->post('gelar_belakang'),
							'tempat_lahir'		=> $i->post('tempat_lahir'),
							'tanggal_lahir'		=> $i->post('tanggal_lahir'),
							'jenis_kelamin'		=> $i->post('jenis_kelamin'),
							'agama'				=> $i->post('agama'),
							'status_kawin'		=> $i->post('status_kawin'),
							'provinsi'			=> $i->post('provinsi'),
							'kota'				=> $i->post('kota'),
							'kecamatan'			=> $i->post('kecamatan'),
							'kelurahan'			=> $i->post('kelurahan'),
							'alamat'			=> $i->post('alamat'),
							'telepon'			=> $i->post('telepon'),
							'email'				=> $i->post('email'),
							'nik'				=> $i->post('nik'),
							'npwp'				=> $i->post('npwp'),
							'nomor_bpjs'		=> $i->post('nomor_bpjs'),
							'nomor_rekening'	=> $i->post('nomor_rekening'),
							'nama_bank'			=> $i->post('nama_bank'),
							//'akses_level'		=> $i->post('akses_level'),
							'keterangan'		=> $i->post('keterangan'),
							'gambar'			=> $upload_data['uploads']['file_name'],
							'urutan'			=> $i->post('urutan')
						);
			$this->pegawai_model->edit($data);
			$this->session->set_flashdata('sukses','Profil telah diperbaharui');
			redirect(base_url('admin/profil'),'refresh');
		}}else{
			$i 	= $this->input;
			$data = array(	'id_pegawai'		=> $id_pegawai, // Dari URL
							//'id_jenis_pegawai'	=> $i->post('id_jenis_pegawai'),
							'tmt_cpns'			=> $i->post('tmt_cpns'),
							'tmt_pns'			=> $i->post('tmt_pns'),
							'updated_by'		=> $this->session->userdata('id_pegawai'),
							//'nip'				=> $i->post('nip'),
							//'nrk'				=> $i->post('nrk'),
							'nama_lengkap'		=> $i->post('nama_lengkap'),
							'gelar_depan'		=> $i->post('gelar_depan'),
							'gelar_belakang'	=> $i->post('gelar_belakang'),
							'tempat_lahir'		=> $i->post('tempat_lahir'),
							'tanggal_lahir'		=> $i->post('tanggal_lahir'),
							'jenis_kelamin'		=> $i->post('jenis_kelamin'),
							'agama'				=> $i->post('agama'),
							'status_kawin'		=> $i->post('status_kawin'),
							'provinsi'			=> $i->post('provinsi'),
							'kota'				=> $i->post('kota'),
							'kecamatan'			=> $i->post('kecamatan'),
							'kelurahan'			=> $i->post('kelurahan'),
							'alamat'			=> $i->post('alamat'),
							'telepon'			=> $i->post('telepon'),
							'email'				=> $i->post('email'),
							'nik'				=> $i->post('nik'),
							'npwp'				=> $i->post('npwp'),
							'nomor_bpjs'		=> $i->post('nomor_bpjs'),
							'nomor_rekening'	=> $i->post('nomor_rekening'),
							'nama_bank'			=> $i->post('nama_bank'),
							//'akses_level'		=> $i->post('akses_level'),
							'keterangan'		=> $i->post('keterangan'),
							// 'gambar'			=> $upload_data['uploads']['file_name'],
							'urutan'			=> $i->post('urutan')
						);
			$this->pegawai_model->edit($data);
			$this->session->set_flashdata('sukses','Profil telah diperbaharui');
			redirect(base_url('admin/profil'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'		=> 'Perbaharui Profil: '.$pegawai->nama_lengkap,
						'pegawai'	=> $pegawai, // Data pegawai yg diedit
						'provinsi'	=> $provinsi,
						'kota'		=> $kota,
						'jenis'		=> $jenis,
						'agama'		=> $agama,
						'isi'		=> 'admin/profil/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Ganti Password 
	public function password()
	{
		$id_pegawai = $this->session->userdata('id_pegawai');
		$pegawai 	= $this->pegawai_model->detail($id_pegawai);

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('password','Password','required|min_length[6]|max_length[32]|trim',
			array(	'required'		=> '%s harus diisi',
					'min_length'	=> '%s minmal 6 karakter',
					'max_length'	=> '%s maksimal 32 karakter'
					));

		$valid->set_rules('konfirmasi_password','Konfirmasi Password','required|matches[password]',
			array(	'required'		=> '%s harus diisi',
					'matches'		=> '%s tidak sama'
				));

		if($valid->run()=== FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Ganti Password: '.$pegawai->nama_lengkap,
						'pegawai'	=> $pegawai, // Data pegawai yg diedit
						'isi'		=> 'admin/profil/password'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Validasi lolos dan masuk database
		}else{
			$i 	= $this->input;
			$data = array(	'id_pegawai'	=> $id_pegawai, // Dari URL
							'password'		=> sha1($i->post('password'))
						);
			$this->pegawai_model->edit($data);
			$this->session->set_flashdata('sukses','Password berhasil diganti');
			redirect(base_url('admin/profil/password'),'refresh');
		}
		// End masuk database
	}

}

/* End of file Profil.php */
/* Location: ./application/controllers/admin/Profil.php */