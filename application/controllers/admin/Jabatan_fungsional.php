<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan_fungsional extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pegawai_model');
		$this->load->model('jabatan_fungsional_model');
		$this->load->model('satker_model');
		$this->load->model('bagian_model');
		$this->load->model('pendidikan_model');
		$this->load->model('pangkat_model');
	}

	// Main page
	public function index()
	{
		if($this->session->userdata('akses_level')=="Pegawai") {
			$id_pegawai 			= $this->session->userdata('id_pegawai');
			$jabatan_fungsional 	= $this->jabatan_fungsional_model->pegawai($id_pegawai);
		}else{
			$jabatan_fungsional 	= $this->jabatan_fungsional_model->listing();
		}
		$jumlah 		= count($jabatan_fungsional);

		$data = array(	'title'					=> 'Data Jabatan Fungsional Pegawai ('.$jumlah.')',
						'jabatan_fungsional'	=> $jabatan_fungsional,
						'isi'					=> 'admin/jabatan_fungsional/list'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Detail page
	public function read($id_jabatan_fungsional)
	{
		$jabatan_fungsional = $this->jabatan_fungsional_model->read($id_jabatan_fungsional);
		$id_pegawai = $jabatan_fungsional->id_pegawai;
		$pegawai 	= $this->pegawai_model->detail($id_pegawai);

		$data = array(	'title'			=> 'Detail: '.$jabatan_fungsional->nama_jabatan_fungsional,
						'jabatan_fungsional'	=> $jabatan_fungsional,
						'pegawai'		=> $pegawai,
						'isi'			=> 'admin/jabatan_fungsional/read'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Cetak page
	public function cetak($id_jabatan_fungsional)
	{
		// Proteksi
		$this->simple_login->check_login();
		
		$jabatan_fungsional 	= $this->jabatan_fungsional_model->read($id_jabatan_fungsional);
		$id_pegawai = $jabatan_fungsional->id_pegawai;
		$pegawai 	= $this->pegawai_model->detail($id_pegawai);

		$data = array(	'title'		=> 'Detail: '.$jabatan_fungsional->nama_jabatan_fungsional,
						'jabatan_fungsional'	=> $jabatan_fungsional,
						'pegawai'	=> $pegawai,
						);
		$this->load->view('admin/jabatan_fungsional/cetak', $data, FALSE);
	}

	// Tambah Pegawai
	public function tambah()
	{
		$pegawai 	= $this->pegawai_model->listing();
		$jumlah 	= count($pegawai);

		$data = array(	'title'		=> 'Data Pegawai ('.$jumlah.')',
						'pegawai'	=> $pegawai,
						'isi'		=> 'admin/jabatan_fungsional/list_pegawai'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Kelola jabatan_fungsional pegawai
	public function pegawai($id_pegawai)
	{
		$jabatan_fungsional 	= $this->jabatan_fungsional_model->pegawai($id_pegawai);
		$jumlah 	= count($jabatan_fungsional);
		$pegawai 	= $this->pegawai_model->detail($id_pegawai);
		$satker 	= $this->satker_model->listing();
		$bagian 	= $this->bagian_model->listing();
		$pangkat 	= $this->pangkat_model->listing();
		$pendidikan = $this->pendidikan_model->pegawai_formal($id_pegawai);

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_jabatan_fungsional','Nama Jabatan Fungsional','required',
			array(	'required'		=> '%s harus diisi'));

		
		if($valid->run()) {

			if(!empty($_FILES['gambar']['name'])) {

			$config['upload_path'] 		= './assets/upload/file/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg|doc|docx|pdf|zip';
			$config['max_size']  		= '2400'; // KB
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
				
		// End validasi

		$data = array(	'title'		=> 'Jabatan Fungsional: '.$pegawai->nama_lengkap.
									' ('.$jumlah.')',
						'jabatan_fungsional'	=> $jabatan_fungsional,
						'pegawai'	=> $pegawai,
						'satker'	=> $satker,
						'bagian'	=> $bagian,
						'pangkat'	=> $pangkat,
						'pendidikan'=> $pendidikan,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/jabatan_fungsional/pegawai'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$upload_data        		= array('uploads' =>$this->upload->data());
	       

			$i = $this->input;
			$status_jabatan 	= $i->post('status_jabatan');

			if($status_jabatan == "Aktif")
			{
				$data_pegawai = array(	'id_pegawai'		=> $id_pegawai,
										'status_jabatan'	=> 'Non Aktif');
				$this->jabatan_fungsional_model->edit_aktif($data_pegawai);
			}
			$data = array(	'id_satker'			=> $i->post('id_satker'),
							'id_bagian'			=> $i->post('id_bagian'),
							'id_pangkat'		=> $i->post('id_pangkat'),
							'id_pendidikan'		=> $i->post('id_pendidikan'),
							'id_pegawai'		=> $id_pegawai,
							'nrk'				=> $pegawai->nrk,
							'nip'				=> $pegawai->nip,
							'nama_jabatan_fungsional'		=> $i->post('nama_jabatan_fungsional'),
							'tmt'				=> $i->post('tmt'),
							'no_sk'				=> $i->post('no_sk'),
							'tanggal_sk'		=> $i->post('tanggal_sk'),
							'nip_pjt'			=> $i->post('nip_pjt'),
							'nama_pjt'			=> $i->post('nama_pjt'),
							'keterangan'		=> $i->post('keterangan'),
							'status_jabatan'	=> $i->post('status_jabatan'),
							'urutan'			=> $i->post('urutan'),
							'gambar'			=> $upload_data['uploads']['file_name'],
							'posted_by'			=> $this->session->userdata('id_pegawai'),
							'tanggal_post'		=> date('Y-m-d H:i:s')
						);
			$this->jabatan_fungsional_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah tambah');
			redirect('admin/jabatan_fungsional/pegawai/'.$id_pegawai,'refresh');
		}}else{
			$i = $this->input;
			$status_jabatan 	= $i->post('status_jabatan');

			if($status_jabatan == "Aktif")
			{
				$data_pegawai = array(	'id_pegawai'		=> $id_pegawai,
										'status_jabatan'	=> 'Non Aktif');
				$this->jabatan_fungsional_model->edit_aktif($data_pegawai);
			}
			$data = array(	'id_satker'			=> $i->post('id_satker'),
							'id_bagian'			=> $i->post('id_bagian'),
							'id_pangkat'		=> $i->post('id_pangkat'),
							'id_pendidikan'		=> $i->post('id_pendidikan'),
							'id_pegawai'		=> $id_pegawai,
							'nrk'				=> $pegawai->nrk,
							'nip'				=> $pegawai->nip,
							'nama_jabatan_fungsional'		=> $i->post('nama_jabatan_fungsional'),
							'tmt'				=> $i->post('tmt'),
							'no_sk'				=> $i->post('no_sk'),
							'tanggal_sk'		=> $i->post('tanggal_sk'),
							'nip_pjt'			=> $i->post('nip_pjt'),
							'nama_pjt'			=> $i->post('nama_pjt'),
							'keterangan'		=> $i->post('keterangan'),
							'status_jabatan'	=> $i->post('status_jabatan'),
							'urutan'			=> $i->post('urutan'),
							//'gambar'			=> $upload_data['uploads']['file_name'],
							'posted_by'			=> $this->session->userdata('id_pegawai'),
							'tanggal_post'		=> date('Y-m-d H:i:s')
						);
			$this->jabatan_fungsional_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah tambah');
			redirect('admin/jabatan_fungsional/pegawai/'.$id_pegawai,'refresh');
		}}
		// End masuk database
		$data = array(	'title'		=> 'Jabatan Fungsional: '.	$pegawai->nama_lengkap.
										' ('.$jumlah.')',
						'jabatan_fungsional'	=> $jabatan_fungsional,
						'pegawai'	=> $pegawai,
						'satker'	=> $satker,
						'bagian'	=> $bagian,
						'pangkat'	=> $pangkat,
						'pendidikan'=> $pendidikan,
						'isi'		=> 'admin/jabatan_fungsional/pegawai'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Edit data jabatan_fungsional
	public function edit($id_jabatan_fungsional)
	{
		$jabatan_fungsional 	= $this->jabatan_fungsional_model->detail($id_jabatan_fungsional);
		$id_pegawai	= $jabatan_fungsional->id_pegawai;
		$pegawai 	= $this->pegawai_model->detail($id_pegawai);
		$satker 	= $this->satker_model->listing();
		$bagian 	= $this->bagian_model->listing();
		$pangkat 	= $this->pangkat_model->listing();
		$pendidikan = $this->pendidikan_model->pegawai_formal($id_pegawai);

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_jabatan_fungsional','Nama Jabatan Fungsional','required',
			array(	'required'		=> '%s harus diisi'));

		
		if($valid->run()) {

			if(!empty($_FILES['gambar']['name'])) {

			$config['upload_path'] 		= './assets/upload/file/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg|doc|docx|pdf|zip';
			$config['max_size']  		= '2400'; // KB
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
				
		// End validasi

		$data = array(	'title'		=> 'Edit jabatan fungsional: '.$jabatan_fungsional->nama_jabatan_fungsional,
						'jabatan_fungsional'	=> $jabatan_fungsional,
						'pegawai'	=> $pegawai,
						'satker'	=> $satker,
						'bagian'	=> $bagian,
						'pangkat'	=> $pangkat,
						'pendidikan'=> $pendidikan,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/jabatan_fungsional/edit'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$upload_data        		= array('uploads' =>$this->upload->data());
	       

			$i = $this->input;
			$status_jabatan 	= $i->post('status_jabatan');
			if($status_jabatan == "Aktif")
			{
				$data_pegawai = array(	'id_pegawai'		=> $id_pegawai,
										'status_jabatan'	=> 'Non Aktif');
				$this->jabatan_fungsional_model->edit_aktif($data_pegawai);
			}
			$data = array(	'id_jabatan_fungsional'		=> $id_jabatan_fungsional,
							'id_satker'			=> $i->post('id_satker'),
							'id_bagian'			=> $i->post('id_bagian'),
							'id_pangkat'		=> $i->post('id_pangkat'),
							'id_pendidikan'		=> $i->post('id_pendidikan'),
							'id_pegawai'		=> $id_pegawai,
							'nrk'				=> $pegawai->nrk,
							'nip'				=> $pegawai->nip,
							'nama_jabatan_fungsional'		=> $i->post('nama_jabatan_fungsional'),
							'tmt'				=> $i->post('tmt'),
							'no_sk'				=> $i->post('no_sk'),
							'tanggal_sk'		=> $i->post('tanggal_sk'),
							'nip_pjt'			=> $i->post('nip_pjt'),
							'nama_pjt'			=> $i->post('nama_pjt'),
							'keterangan'		=> $i->post('keterangan'),
							'status_jabatan'	=> $i->post('status_jabatan'),
							'urutan'			=> $i->post('urutan'),
							'gambar'			=> $upload_data['uploads']['file_name'],
							'updated_by'		=> $this->session->userdata('id_pegawai'),
						);
			$this->jabatan_fungsional_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect('admin/jabatan_fungsional/pegawai/'.$id_pegawai,'refresh');
		}}else{
			$i = $this->input;
			$status_jabatan 	= $i->post('status_jabatan');
			if($status_jabatan == "Aktif")
			{
				$data_pegawai = array(	'id_pegawai'		=> $id_pegawai,
										'status_jabatan'	=> 'Non Aktif');
				$this->jabatan_fungsional_model->edit_aktif($data_pegawai);
			}
			$data = array(	'id_jabatan_fungsional'		=> $id_jabatan_fungsional,
							'id_satker'			=> $i->post('id_satker'),
							'id_bagian'			=> $i->post('id_bagian'),
							'id_pangkat'		=> $i->post('id_pangkat'),
							'id_pendidikan'		=> $i->post('id_pendidikan'),
							'id_pegawai'		=> $id_pegawai,
							'nrk'				=> $pegawai->nrk,
							'nip'				=> $pegawai->nip,
							'nama_jabatan_fungsional'		=> $i->post('nama_jabatan_fungsional'),
							'tmt'				=> $i->post('tmt'),
							'no_sk'				=> $i->post('no_sk'),
							'tanggal_sk'		=> $i->post('tanggal_sk'),
							'nip_pjt'			=> $i->post('nip_pjt'),
							'nama_pjt'			=> $i->post('nama_pjt'),
							'keterangan'		=> $i->post('keterangan'),
							'status_jabatan'	=> $i->post('status_jabatan'),
							'urutan'			=> $i->post('urutan'),
							//'gambar'			=> $upload_data['uploads']['file_name'],
							'updated_by'		=> $this->session->userdata('id_pegawai'),
						);
			$this->jabatan_fungsional_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect('admin/jabatan_fungsional/pegawai/'.$id_pegawai,'refresh');
		}}
		// End masuk database
		$data = array(	'title'		=> 'Edit jabatan fungsional: '.$jabatan_fungsional->nama_jabatan_fungsional,
						'jabatan_fungsional'	=> $jabatan_fungsional,
						'pegawai'	=> $pegawai,
						'satker'	=> $satker,
						'bagian'	=> $bagian,
						'pangkat'	=> $pangkat,
						'pendidikan'=> $pendidikan,
						//'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/jabatan_fungsional/edit'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Delete
	public function delete()
	{
		// proteksi
		$this->simple_login->check_login();

		$id_jabatan_fungsional 	= $this->uri->segment(4);
		$id_pegawai		= $this->uri->segment(5);
		$jabatan_fungsional 		= $this->jabatan_fungsional_model->detail($id_jabatan_fungsional);

		// Hapus gambar jika ada
		$gambar 		= $jabatan_fungsional->gambar;
		if($gambar != "") 
		{
			unlink('./assets/upload/file/'.$gambar);
		}

		// Hapus data
		$data = array(	'id_jabatan_fungsional'	=> $id_jabatan_fungsional);
		
		$this->jabatan_fungsional_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect('admin/jabatan_fungsional/pegawai/'.$id_pegawai,'refresh');
	}

}

/* End of file Jabatan_fungsional.php */
/* Location: ./application/controllers/admin/Jabatan_fungsional.php */