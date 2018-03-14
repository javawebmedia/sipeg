<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pegawai_model');
		$this->load->model('pendidikan_model');
		$this->load->model('jenis_pendidikan_model');
		$this->load->model('jenjang_model');
	}

	// Main page
	public function index()
	{
		if($this->session->userdata('akses_level')=="Pegawai") {
			$id_pegawai 	= $this->session->userdata('id_pegawai');
			$pendidikan 	= $this->pendidikan_model->pegawai($id_pegawai);
		}else{
			$pendidikan 	= $this->pendidikan_model->listing();
		}
		$jumlah 		= count($pendidikan);

		$data = array(	'title'			=> 'Data Pendidikan Pegawai ('.$jumlah.')',
						'pendidikan'	=> $pendidikan,
						'isi'			=> 'admin/pendidikan/list'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Detail page
	public function read($id_pendidikan)
	{
		$pendidikan = $this->pendidikan_model->read($id_pendidikan);
		$id_pegawai = $pendidikan->id_pegawai;
		$pegawai 	= $this->pegawai_model->detail($id_pegawai);

		$data = array(	'title'			=> 'Detail: '.$pendidikan->nama_pendidikan,
						'pendidikan'	=> $pendidikan,
						'pegawai'		=> $pegawai,
						'isi'			=> 'admin/pendidikan/read'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Cetak page
	public function cetak($id_pendidikan)
	{
		// Proteksi
		$this->simple_login->check_login();
		
		$pendidikan 	= $this->pendidikan_model->read($id_pendidikan);
		$id_pegawai = $pendidikan->id_pegawai;
		$pegawai 	= $this->pegawai_model->detail($id_pegawai);

		$data = array(	'title'		=> 'Detail: '.$pendidikan->nama_pendidikan,
						'pendidikan'=> $pendidikan,
						'pegawai'	=> $pegawai,
						);
		$this->load->view('admin/pendidikan/cetak', $data, FALSE);
	}

	// Tambah Pegawai
	public function tambah()
	{
		$pegawai 	= $this->pegawai_model->listing();
		$jumlah 	= count($pegawai);

		$data = array(	'title'		=> 'Data Pegawai ('.$jumlah.')',
						'pegawai'	=> $pegawai,
						'isi'		=> 'admin/pendidikan/list_pegawai'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Kelola pendidikan pegawai
	public function pegawai()
	{
		if($this->session->userdata('akses_level')=="Pegawai") {
			$id_pegawai 	= $this->session->userdata('id_pegawai');
			$pendidikan 	= $this->pendidikan_model->pegawai($id_pegawai);
		}else{
			$id_pegawai		= $this->uri->segment(4);
			$pendidikan 	= $this->pendidikan_model->listing();
		}
		$jumlah 			= count($pendidikan);
		$pegawai 			= $this->pegawai_model->detail($id_pegawai);
		$jenis_pendidikan 	= $this->jenis_pendidikan_model->listing();
		$jenjang 			= $this->jenjang_model->listing();

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_pendidikan','Nama Pendidikan','required',
			array(	'required'		=> '%s harus diisi'));

		
		if($valid->run()) {

			if(!empty($_FILES['gambar']['name'])) {

			$config['upload_path'] 		= './assets/upload/file/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg|doc|docx|pdf|zip';
			$config['max_size']  		= '2400'; // KB
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
				
		// End validasi

		$data = array(	'title'				=> 'Pendidikan: '.
											$pegawai->nama_lengkap.
											' ('.$jumlah.')',
						'pendidikan'		=> $pendidikan,
						'pegawai'			=> $pegawai,
						'jenis_pendidikan'	=> $jenis_pendidikan,
						'jenjang'			=> $jenjang,
						'error'				=> $this->upload->display_errors(),
						'isi'				=> 'admin/pendidikan/pegawai'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$upload_data        		= array('uploads' =>$this->upload->data());
	       

			$i = $this->input;
			$data = array(	'id_pegawai'		=> $id_pegawai,
							'id_jenjang'		=> $i->post('id_jenjang'),
							'id_jenis_pendidikan'=> $i->post('id_jenis_pendidikan'),
							'jenis_pendidikan'	=> $i->post('jenis_pendidikan'),
							'nrk'				=> $pegawai->nrk,
							'nama_pendidikan'	=> $i->post('nama_pendidikan'),
							'tahun'				=> $i->post('tahun'),
							'tanggal_ijazah'	=> $i->post('tanggal_ijazah'),
							'nomor_ijazah'		=> $i->post('nomor_ijazah'),
							// 'jurusan'			=> $i->post('jurusan'),
							// 'kota'				=> $i->post('kota'),
							'nama_institusi'	=> $i->post('nama_institusi'),
							'gambar'			=> $upload_data['uploads']['file_name'],
							'keterangan'		=> $i->post('keterangan'),
							'posted_by'			=> $this->session->userdata('id_pegawai'),
							'tanggal_post'		=> date('Y-m-d H:i:s')
						);
			$this->pendidikan_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah tambah');
			redirect('admin/pendidikan/pegawai/'.$id_pegawai,'refresh');
		}}else{
			$i = $this->input;
			$data = array(	'id_pegawai'		=> $id_pegawai,
							'id_jenjang'		=> $i->post('id_jenjang'),
							'id_jenis_pendidikan'=> $i->post('id_jenis_pendidikan'),
							'jenis_pendidikan'	=> $i->post('jenis_pendidikan'),
							'nrk'				=> $pegawai->nrk,
							'nama_pendidikan'	=> $i->post('nama_pendidikan'),
							'tahun'				=> $i->post('tahun'),
							'tanggal_ijazah'	=> $i->post('tanggal_ijazah'),
							'nomor_ijazah'		=> $i->post('nomor_ijazah'),
							// 'jurusan'			=> $i->post('jurusan'),
							// 'kota'				=> $i->post('kota'),
							'nama_institusi'	=> $i->post('nama_institusi'),
							//'gambar'			=> $upload_data['uploads']['file_name'],
							'keterangan'		=> $i->post('keterangan'),
							'posted_by'			=> $this->session->userdata('id_pegawai'),
							'tanggal_post'		=> date('Y-m-d H:i:s')
						);
			$this->pendidikan_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah tambah');
			redirect('admin/pendidikan/pegawai/'.$id_pegawai,'refresh');
		}}
		// End masuk database
		$data = array(	'title'				=> 'Pendidikan: '.
												$pegawai->nama_lengkap.
												' ('.$jumlah.')',
						'pendidikan'		=> $pendidikan,
						'pegawai'			=> $pegawai,
						'jenis_pendidikan'	=> $jenis_pendidikan,
						'jenjang'			=> $jenjang,
						'isi'				=> 'admin/pendidikan/pegawai'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Edit data pendidikan
	public function edit($id_pendidikan)
	{
		$pendidikan 		= $this->pendidikan_model->detail($id_pendidikan);
		$id_pegawai			= $pendidikan->id_pegawai;
		$pegawai 			= $this->pegawai_model->detail($id_pegawai);
		$jenis_pendidikan 	= $this->jenis_pendidikan_model->listing();
		$jenjang 			= $this->jenjang_model->listing();

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_pendidikan','Nama Pendidikan','required',
			array(	'required'		=> '%s harus diisi'));

		
		if($valid->run()) {

			if(!empty($_FILES['gambar']['name'])) {

			$config['upload_path'] 		= './assets/upload/file/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg|doc|docx|pdf|zip';
			$config['max_size']  		= '2400'; // KB
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
				
		// End validasi

		$data = array(	'title'				=> 'Edit: '.$pendidikan->nama_pendidikan,
						'pendidikan'		=> $pendidikan,
						'pegawai'			=> $pegawai,
						'jenis_pendidikan'	=> $jenis_pendidikan,
						'jenjang'			=> $jenjang,
						'error'				=> $this->upload->display_errors(),
						'isi'				=> 'admin/pendidikan/edit'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$upload_data        		= array('uploads' =>$this->upload->data());
	       

			$i = $this->input;
			$data = array(	'id_pendidikan'		=> $id_pendidikan,
							'id_pegawai'		=> $id_pegawai,
							'id_jenjang'		=> $i->post('id_jenjang'),
							'id_jenis_pendidikan'=> $i->post('id_jenis_pendidikan'),
							'jenis_pendidikan'	=> $i->post('jenis_pendidikan'),
							'nrk'				=> $pegawai->nrk,
							'nama_pendidikan'	=> $i->post('nama_pendidikan'),
							'tahun'				=> $i->post('tahun'),
							'tanggal_ijazah'	=> $i->post('tanggal_ijazah'),
							'nomor_ijazah'		=> $i->post('nomor_ijazah'),
							// 'jurusan'			=> $i->post('jurusan'),
							// 'kota'				=> $i->post('kota'),
							'nama_institusi'	=> $i->post('nama_institusi'),
							'gambar'			=> $upload_data['uploads']['file_name'],
							'keterangan'		=> $i->post('keterangan'),
							'updated_by'		=> $this->session->userdata('id_pegawai'),
						);
			$this->pendidikan_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diperbarui');
			redirect('admin/pendidikan/pegawai/'.$id_pegawai,'refresh');
		}}else{
			$i = $this->input;
			$data = array(	'id_pendidikan'		=> $id_pendidikan,
							'id_pegawai'		=> $id_pegawai,
							'id_jenjang'		=> $i->post('id_jenjang'),
							'id_jenis_pendidikan'=> $i->post('id_jenis_pendidikan'),
							'jenis_pendidikan'	=> $i->post('jenis_pendidikan'),
							'nrk'				=> $pegawai->nrk,
							'nama_pendidikan'	=> $i->post('nama_pendidikan'),
							'tahun'				=> $i->post('tahun'),
							'tanggal_ijazah'	=> $i->post('tanggal_ijazah'),
							'nomor_ijazah'		=> $i->post('nomor_ijazah'),
							// 'jurusan'			=> $i->post('jurusan'),
							// 'kota'				=> $i->post('kota'),
							'nama_institusi'	=> $i->post('nama_institusi'),
							//'gambar'			=> $upload_data['uploads']['file_name'],
							'keterangan'		=> $i->post('keterangan'),
							'updated_by'		=> $this->session->userdata('id_pegawai'),
						);
			$this->pendidikan_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diperbarui');
			redirect('admin/pendidikan/pegawai/'.$id_pegawai,'refresh');
		}}
		// End masuk database
		$data = array(	'title'				=> 'Edit: '.$pendidikan->nama_pendidikan,
						'pendidikan'		=> $pendidikan,
						'pegawai'			=> $pegawai,
						'jenis_pendidikan'	=> $jenis_pendidikan,
						'jenjang'			=> $jenjang,
						//'error'				=> $this->upload->display_errors(),
						'isi'				=> 'admin/pendidikan/edit'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);;
	}

	// Delete
	public function delete()
	{
		// proteksi
		$this->simple_login->check_login();

		$id_pendidikan 	= $this->uri->segment(4);
		$id_pegawai		= $this->uri->segment(5);
		$pendidikan 		= $this->pendidikan_model->detail($id_pendidikan);

		// Hapus gambar jika ada
		$gambar 		= $pendidikan->gambar;
		if($gambar != "") 
		{
			unlink('./assets/upload/file/'.$gambar);
		}

		// Hapus data
		$data = array(	'id_pendidikan'	=> $id_pendidikan);
		
		$this->pendidikan_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect('admin/pendidikan/pegawai/'.$id_pegawai,'refresh');
	}

}

/* End of file Pendidikan.php */
/* Location: ./application/controllers/admin/Pendidikan.php */