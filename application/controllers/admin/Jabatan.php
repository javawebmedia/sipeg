<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pegawai_model');
		$this->load->model('jabatan_model');
		$this->load->model('satker_model');
		$this->load->model('bagian_model');
		$this->load->model('pendidikan_model');
		$this->load->model('pangkat_model');
	}

	// Main page
	public function index()
	{
		if($this->session->userdata('akses_level')=="Pegawai") {
			$id_pegawai = $this->session->userdata('id_pegawai');
			$jabatan 	= $this->jabatan_model->pegawai($id_pegawai);
		}else{
			$jabatan 	= $this->jabatan_model->listing();
		}
		$jumlah 	= count($jabatan);

		$data = array(	'title'		=> 'Data Jabatan Pegawai ('.$jumlah.')',
						'jabatan'	=> $jabatan,
						'isi'		=> 'admin/jabatan/list'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Detail page
	public function read($id_jabatan)
	{
		$jabatan = $this->jabatan_model->read($id_jabatan);
		$id_pegawai = $jabatan->id_pegawai;
		$pegawai 	= $this->pegawai_model->detail($id_pegawai);

		$data = array(	'title'			=> 'Detail: '.$jabatan->nama_jabatan,
						'jabatan'	=> $jabatan,
						'pegawai'		=> $pegawai,
						'isi'			=> 'admin/jabatan/read'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Cetak page
	public function cetak($id_jabatan)
	{
		// Proteksi
		$this->simple_login->check_login();
		
		$jabatan 	= $this->jabatan_model->read($id_jabatan);
		$id_pegawai = $jabatan->id_pegawai;
		$pegawai 	= $this->pegawai_model->detail($id_pegawai);

		$data = array(	'title'		=> 'Detail: '.$jabatan->nama_jabatan,
						'jabatan'	=> $jabatan,
						'pegawai'	=> $pegawai,
						);
		$this->load->view('admin/jabatan/cetak', $data, FALSE);
	}

	// Tambah Pegawai
	public function tambah()
	{
		$pegawai 	= $this->pegawai_model->listing();
		$jumlah 	= count($pegawai);

		$data = array(	'title'		=> 'Data Pegawai ('.$jumlah.')',
						'pegawai'	=> $pegawai,
						'isi'		=> 'admin/jabatan/list_pegawai'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Kelola jabatan pegawai
	public function pegawai($id_pegawai)
	{
		$jabatan 	= $this->jabatan_model->pegawai($id_pegawai);
		$jumlah 	= count($jabatan);
		$pegawai 	= $this->pegawai_model->detail($id_pegawai);
		$satker 	= $this->satker_model->listing();
		$bagian 	= $this->bagian_model->listing();
		$pangkat 	= $this->pangkat_model->listing();
		$pendidikan = $this->pendidikan_model->pegawai_formal($id_pegawai);

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_jabatan','Nama Jabatan','required',
			array(	'required'		=> '%s harus diisi'));

		
		if($valid->run()) {

			if(!empty($_FILES['gambar']['name'])) {

			$config['upload_path'] 		= './assets/upload/file/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg|doc|docx|pdf|zip';
			$config['max_size']  		= '2400'; // KB
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
				
		// End validasi

		$data = array(	'title'		=> 'Jabatan: '.$pegawai->nama_lengkap.
									' ('.$jumlah.')',
						'jabatan'	=> $jabatan,
						'pegawai'	=> $pegawai,
						'satker'	=> $satker,
						'bagian'	=> $bagian,
						'pangkat'	=> $pangkat,
						'pendidikan'=> $pendidikan,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/jabatan/pegawai'
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
				$this->jabatan_model->edit_aktif($data_pegawai);
			}

			$data = array(	'id_satker'			=> $i->post('id_satker'),
							'id_bagian'			=> $i->post('id_bagian'),
							'id_pangkat'		=> $i->post('id_pangkat'),
							'id_pendidikan'		=> $i->post('id_pendidikan'),
							'id_pegawai'		=> $id_pegawai,
							'nrk'				=> $pegawai->nrk,
							'nip'				=> $pegawai->nip,
							'nama_jabatan'		=> $i->post('nama_jabatan'),
							'tmt'				=> $i->post('tmt'),
							'no_sk'				=> $i->post('no_sk'),
							'tanggal_sk'		=> $i->post('tanggal_sk'),
							'nip_pjt'			=> $i->post('nip_pjt'),
							'nama_pjt'			=> $i->post('nama_pjt'),
							'keterangan'		=> $i->post('keterangan'),
							'urutan'			=> $i->post('urutan'),
							'status_jabatan'	=> $i->post('status_jabatan'),
							'gambar'			=> $upload_data['uploads']['file_name'],
							'posted_by'			=> $this->session->userdata('id_pegawai'),
							'tanggal_post'		=> date('Y-m-d H:i:s')
						);
			$this->jabatan_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah tambah');
			redirect('admin/jabatan/pegawai/'.$id_pegawai,'refresh');
		}}else{
			$i = $this->input;

			$status_jabatan 	= $i->post('status_jabatan');

			if($status_jabatan == "Aktif")
			{
				$data_pegawai = array(	'id_pegawai'		=> $id_pegawai,
										'status_jabatan'	=> 'Non Aktif');
				$this->jabatan_model->edit_aktif($data_pegawai);
			}

			$data = array(	'id_satker'			=> $i->post('id_satker'),
							'id_bagian'			=> $i->post('id_bagian'),
							'id_pangkat'		=> $i->post('id_pangkat'),
							'id_pendidikan'		=> $i->post('id_pendidikan'),
							'id_pegawai'		=> $id_pegawai,
							'nrk'				=> $pegawai->nrk,
							'nip'				=> $pegawai->nip,
							'nama_jabatan'		=> $i->post('nama_jabatan'),
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
			$this->jabatan_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah tambah');
			redirect('admin/jabatan/pegawai/'.$id_pegawai,'refresh');
		}}
		// End masuk database
		$data = array(	'title'		=> 'Jabatan: '.	$pegawai->nama_lengkap.
										' ('.$jumlah.')',
						'jabatan'	=> $jabatan,
						'pegawai'	=> $pegawai,
						'satker'	=> $satker,
						'bagian'	=> $bagian,
						'pangkat'	=> $pangkat,
						'pendidikan'=> $pendidikan,
						'isi'		=> 'admin/jabatan/pegawai'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Edit data jabatan
	public function edit($id_jabatan)
	{
		$jabatan 	= $this->jabatan_model->detail($id_jabatan);
		$id_pegawai	= $jabatan->id_pegawai;
		$pegawai 	= $this->pegawai_model->detail($id_pegawai);
		$satker 	= $this->satker_model->listing();
		$bagian 	= $this->bagian_model->listing();
		$pangkat 	= $this->pangkat_model->listing();
		$pendidikan = $this->pendidikan_model->pegawai_formal($id_pegawai);

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_jabatan','Nama Jabatan','required',
			array(	'required'		=> '%s harus diisi'));

		
		if($valid->run()) {

			if(!empty($_FILES['gambar']['name'])) {

			$config['upload_path'] 		= './assets/upload/file/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg|doc|docx|pdf|zip';
			$config['max_size']  		= '2400'; // KB
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
				
		// End validasi

		$data = array(	'title'		=> 'Edit jabatan: '.$jabatan->nama_jabatan,
						'jabatan'	=> $jabatan,
						'pegawai'	=> $pegawai,
						'satker'	=> $satker,
						'bagian'	=> $bagian,
						'pangkat'	=> $pangkat,
						'pendidikan'=> $pendidikan,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/jabatan/edit'
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
				$this->jabatan_model->edit_aktif($data_pegawai);
			}

			$data = array(	'id_jabatan'		=> $id_jabatan,
							'id_satker'			=> $i->post('id_satker'),
							'id_bagian'			=> $i->post('id_bagian'),
							'id_pangkat'		=> $i->post('id_pangkat'),
							'id_pendidikan'		=> $i->post('id_pendidikan'),
							'id_pegawai'		=> $id_pegawai,
							'nrk'				=> $pegawai->nrk,
							'nip'				=> $pegawai->nip,
							'nama_jabatan'		=> $i->post('nama_jabatan'),
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
			$this->jabatan_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect('admin/jabatan/pegawai/'.$id_pegawai,'refresh');
		}}else{
			$i = $this->input;

			$status_jabatan 	= $i->post('status_jabatan');
			
			if($status_jabatan == "Aktif")
			{
				$data_pegawai = array(	'id_pegawai'		=> $id_pegawai,
										'status_jabatan'	=> 'Non Aktif');
				$this->jabatan_model->edit_aktif($data_pegawai);
			}

			$data = array(	'id_jabatan'		=> $id_jabatan,
							'id_satker'			=> $i->post('id_satker'),
							'id_bagian'			=> $i->post('id_bagian'),
							'id_pangkat'		=> $i->post('id_pangkat'),
							'id_pendidikan'		=> $i->post('id_pendidikan'),
							'id_pegawai'		=> $id_pegawai,
							'nrk'				=> $pegawai->nrk,
							'nip'				=> $pegawai->nip,
							'nama_jabatan'		=> $i->post('nama_jabatan'),
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
			$this->jabatan_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect('admin/jabatan/pegawai/'.$id_pegawai,'refresh');
		}}
		// End masuk database
		$data = array(	'title'		=> 'Edit jabatan: '.$jabatan->nama_jabatan,
						'jabatan'	=> $jabatan,
						'pegawai'	=> $pegawai,
						'satker'	=> $satker,
						'bagian'	=> $bagian,
						'pangkat'	=> $pangkat,
						'pendidikan'=> $pendidikan,
						//'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/jabatan/edit'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Delete
	public function delete()
	{
		// proteksi
		$this->simple_login->check_login();

		$id_jabatan 	= $this->uri->segment(4);
		$id_pegawai		= $this->uri->segment(5);
		$jabatan 		= $this->jabatan_model->detail($id_jabatan);

		// Hapus gambar jika ada
		$gambar 		= $jabatan->gambar;
		if($gambar != "") 
		{
			unlink('./assets/upload/file/'.$gambar);
		}

		// Hapus data
		$data = array(	'id_jabatan'	=> $id_jabatan);
		
		$this->jabatan_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect('admin/jabatan/pegawai/'.$id_pegawai,'refresh');
	}

}

/* End of file Jabatan.php */
/* Location: ./application/controllers/admin/Jabatan.php */