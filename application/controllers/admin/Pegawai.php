<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pegawai_model');
		$this->load->model('referensi_model');
		$this->load->model('jabatan_model');
		$this->load->model('jabatan_fungsional_model');
		$this->load->model('keluarga_model');
		$this->load->model('pendidikan_model');
		$this->load->model('dasbor_model');
		// Load helper string
		$this->load->helper('string');
	}

	// Main page pegawai
	public function index()
	{
		if($this->session->userdata('akses_level')=="Pegawai") {
			$id_pegawai = $this->session->userdata('id_pegawai');
			$pegawai 	= $this->pegawai_model->pegawai_aja($id_pegawai);
		}else{
			$pegawai 	= $this->pegawai_model->listing();
		}
		$jumlah		= count($pegawai);

		$data = array(	'title'		=> 'Data Pegawai ('.$jumlah.')',
						'pegawai'	=> $pegawai,
						'isi'		=> 'admin/pegawai/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Listing usulan jabatan struktural
	public function struktural()
	{
		$jabatan 	= $this->dasbor_model->struktural();
		$jumlah		= count($jabatan);

		$data = array(	'title'		=> 'Data Pegawai ('.$jumlah.')',
						'jabatan'	=> $jabatan,
						'isi'		=> 'admin/pegawai/jabatan_struktural'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Listing usulan jabatan fungsional
	public function fungsional()
	{
		$jabatan 	= $this->dasbor_model->fungsional();
		$jumlah		= count($jabatan);

		$data = array(	'title'		=> 'Data Pegawai ('.$jumlah.')',
						'jabatan'	=> $jabatan,
						'isi'		=> 'admin/pegawai/fungsional'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Data pegawai yang akan pensiun
	public function pensiun()
	{
		$pegawai 	= $this->pegawai_model->pensiun_58();
		$jumlah		= count($pegawai);

		$data = array(	'title'		=> 'Data Pegawai yang Akan Pensiun Periode Tahun Ini ('.$jumlah.')',
						'pegawai'	=> $pegawai,
						'isi'		=> 'admin/pegawai/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Detail pegawai
	public function detail($id_pegawai)
	{
		$pegawai 			= $this->pegawai_model->read($id_pegawai);
		$pendidikan 		= $this->pendidikan_model->pegawai($id_pegawai);
		$keluarga 			= $this->keluarga_model->pegawai($id_pegawai);
		$jabatan 			= $this->jabatan_model->pegawai($id_pegawai);
		$jabatan_fungsional = $this->jabatan_fungsional_model->pegawai($id_pegawai);

		$data = array(	'title'					=> $pegawai->nama_lengkap,
						'pegawai'				=> $pegawai,
						'pendidikan'			=> $pendidikan,
						'keluarga'				=> $keluarga,
						'jabatan'				=> $jabatan,
						'jabatan_fungsional'	=> $jabatan_fungsional,
						'isi'					=> 'admin/pegawai/detail'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Cetak pegawai
	public function cetak($id_pegawai)
	{
		$pegawai 			= $this->pegawai_model->read($id_pegawai);
		$pendidikan 		= $this->pendidikan_model->pegawai($id_pegawai);
		$keluarga 			= $this->keluarga_model->pegawai($id_pegawai);
		$jabatan 			= $this->jabatan_model->pegawai($id_pegawai);
		$jabatan_fungsional = $this->jabatan_fungsional_model->pegawai($id_pegawai);

		$data = array(	'title'					=> $pegawai->nama_lengkap,
						'pegawai'				=> $pegawai,
						'pendidikan'			=> $pendidikan,
						'keluarga'				=> $keluarga,
						'jabatan'				=> $jabatan,
						'jabatan_fungsional'	=> $jabatan_fungsional,
					);
		$this->load->view('admin/pegawai/cetak', $data, FALSE);
	}

	// Tambah pegawai baru
	public function tambah()
	{
		if($this->session->userdata('akses_level') =="Pegawai") {
			redirect(base_url('admin/pegawai'),'refresh');
		}

		$provinsi 	= $this->referensi_model->listing_provinsi();
		$kota 		= $this->referensi_model->listing_kabupaten();
		$jenis 		= $this->referensi_model->listing_jenis_pegawai();
		$agama 		= $this->referensi_model->listing_agama();

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_lengkap','Nama','required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('nrk','NRK','required|is_unique[pegawai.nrk]',
			array(	'required'		=> '%s harus diisi',
					'is_unique'		=> '%s sudah ada.  Masukkan %s baru'));

		$valid->set_rules('nip','NIP','required|is_unique[pegawai.nip]',
			array(	'required'		=> '%s harus diisi',
					'is_unique'		=> '%s sudah ada.  Masukkan %s baru'));

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

		$data = array(	'title'		=> 'Tambah Pegawai Baru',
						'provinsi'	=> $provinsi,
						'kota'		=> $kota,
						'jenis'		=> $jenis,
						'agama'		=> $agama,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/pegawai/tambah'
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
			$data = array(	'id_jenis_pegawai'	=> $i->post('id_jenis_pegawai'),
							'tmt_cpns'			=> $i->post('tmt_cpns'),
							'tmt_pns'			=> $i->post('tmt_pns'),
							'posted_by'			=> $this->session->userdata('id_pegawai'),
							'nip'				=> $i->post('nip'),
							'nrk'				=> $i->post('nrk'),
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
							'akses_level'		=> $i->post('akses_level'),
							'keterangan'		=> $i->post('keterangan'),
							'gambar'			=> $upload_data['uploads']['file_name'],
							'urutan'			=> $i->post('urutan'),
							'tanggal_post'		=> date('Y-m-d H:i:s')
						);
			$this->pegawai_model->tambah($data);
			$this->session->set_flashdata('sukses','Data telah ditambah');
			redirect(base_url('admin/pegawai'),'refresh');
		}}else{
			$i 	= $this->input;
			$data = array(	'id_jenis_pegawai'	=> $i->post('id_jenis_pegawai'),
							'tmt_cpns'			=> $i->post('tmt_cpns'),
							'tmt_pns'			=> $i->post('tmt_pns'),
							'posted_by'			=> $this->session->userdata('id_pegawai'),
							'nip'				=> $i->post('nip'),
							'nrk'				=> $i->post('nrk'),
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
							'akses_level'		=> $i->post('akses_level'),
							'keterangan'		=> $i->post('keterangan'),
							'urutan'			=> $i->post('urutan'),
							'tanggal_post'		=> date('Y-m-d H:i:s')
						);
			$this->pegawai_model->tambah($data);
			$this->session->set_flashdata('sukses','Data telah ditambah');
			redirect(base_url('admin/pegawai'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'		=> 'Tambah Pegawai Baru',
						'provinsi'	=> $provinsi,
						'kota'		=> $kota,
						'jenis'		=> $jenis,
						'agama'		=> $agama,
						'isi'		=> 'admin/pegawai/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Edit data pegawai
	public function edit()
	{
		if($this->session->userdata('akses_level') =="Pegawai") {
			$id_pegawai = $this->session->userdata('id_pegawai');
			$pegawai 	= $this->pegawai_model->detail($id_pegawai);

			if($id_pegawai != $this->uri->segment(4)) {
				redirect(base_url('admin/pegawai'),'refresh');
			}
		}else{
		// Load data pegawai yang akan diedit
			$id_pegawai = $this->uri->segment(4);
			$pegawai 	= $this->pegawai_model->detail($id_pegawai);
		}

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

		$data = array(	'title'		=> 'Edit Pegawai: '.$pegawai->nama_lengkap,
						'pegawai'	=> $pegawai, // Data pegawai yg diedit
						'provinsi'	=> $provinsi,
						'kota'		=> $kota,
						'jenis'		=> $jenis,
						'agama'		=> $agama,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/pegawai/edit'
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
							'id_jenis_pegawai'	=> $i->post('id_jenis_pegawai'),
							'tmt_cpns'			=> $i->post('tmt_cpns'),
							'tmt_pns'			=> $i->post('tmt_pns'),
							'updated_by'		=> $this->session->userdata('id_pegawai'),
							'nip'				=> $i->post('nip'),
							'nrk'				=> $i->post('nrk'),
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
							'akses_level'		=> $i->post('akses_level'),
							'keterangan'		=> $i->post('keterangan'),
							'gambar'			=> $upload_data['uploads']['file_name'],
							'urutan'			=> $i->post('urutan')
						);
			$this->pegawai_model->edit($data);
			$this->session->set_flashdata('sukses','Data telah diedit');
			redirect(base_url('admin/pegawai'),'refresh');
		}}else{
			$i 	= $this->input;
			$data = array(	'id_pegawai'		=> $id_pegawai, // Dari URL
							'id_jenis_pegawai'	=> $i->post('id_jenis_pegawai'),
							'tmt_cpns'			=> $i->post('tmt_cpns'),
							'tmt_pns'			=> $i->post('tmt_pns'),
							'updated_by'		=> $this->session->userdata('id_pegawai'),
							'nip'				=> $i->post('nip'),
							'nrk'				=> $i->post('nrk'),
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
							'akses_level'		=> $i->post('akses_level'),
							'keterangan'		=> $i->post('keterangan'),
							'gambar'			=> $upload_data['uploads']['file_name'],
							'urutan'			=> $i->post('urutan')
						);
			$this->pegawai_model->edit($data);
			$this->session->set_flashdata('sukses','Data telah diedit');
			redirect(base_url('admin/pegawai'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'		=> 'Edit Pegawai: '.$pegawai->nama_lengkap,
						'pegawai'	=> $pegawai, // Data pegawai yg diedit
						'provinsi'	=> $provinsi,
						'kota'		=> $kota,
						'jenis'		=> $jenis,
						'agama'		=> $agama,
						'isi'		=> 'admin/pegawai/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Berikan akses password
	public function akses()
	{
		$data = array(	'id_pegawai'=> $this->input->post('id_pegawai'),
						'password'	=> sha1($this->input->post('password'))
					);

		$this->pegawai_model->edit($data);
		$this->session->set_flashdata('sukses','Password dan akses telah diberikan');
		redirect(base_url('admin/pegawai'),'refresh');
	}

	// Delete
	public function delete()
	{
		if($this->session->userdata('akses_level') =="Pegawai") {
			redirect(base_url('admin/pegawai'),'refresh');
		}
		$this->simple_login->check_login();
		
		$data = array(	'id_pegawai'	=> $this->input->post('id_pegawai'));

		$this->pegawai_model->delete($data);
		$this->session->set_flashdata('sukses','Data telah dihapus');
		redirect(base_url('admin/pegawai'),'refresh');
	}

}

/* End of file Pegawai.php */
/* Location: ./application/controllers/admin/Pegawai.php */