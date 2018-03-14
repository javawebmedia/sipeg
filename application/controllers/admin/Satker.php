<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Satker extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('satker_model');
		$this->load->model('bagian_model');
	}

	// Halaman utama
	public function index()	{

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_satker','Nama satker','required|is_unique[satker.nama_satker]',
			array(	'required'		=> 'Nama satker harus diisi',
					'is_unique'		=> 'Nama satker sudah ada. Buat Nama satker baru!'));

		$valid->set_rules('urutan','Urutan','required',
			array(	'required'		=> 'Urutan harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Data Satker',
						'satker'	=> $this->satker_model->listing(),
						'isi'		=> 'admin/satker/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;

			$data = array(	'id_user'		=> $this->session->userdata('id_pegawai'),
							'nama_satker'	=> $i->post('nama_satker'),
							'keterangan'	=> $i->post('keterangan'),
							'urutan'		=> $i->post('urutan'),
						);
			// print_r($data);
			$this->satker_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/satker'),'refresh');
		}
		// End proses masuk database
	}

	// Edit satker
	public function edit($id_satker)	{

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_satker','Nama satker','required',
			array(	'required'		=> 'Nama satker harus diisi'));

		$valid->set_rules('urutan','Urutan','required',
			array(	'required'		=> 'Urutan harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'			=> 'Edit Data Satker',
						'satker'	=> $this->satker_model->detail($id_satker),
						'isi'			=> 'admin/satker/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;

			$data = array(	'id_satker'		=> $id_satker,
							'id_user'		=> $this->session->userdata('id_pegawai'),
							'nama_satker'	=> $i->post('nama_satker'),
							'keterangan'	=> $i->post('keterangan'),
							'urutan'		=> $i->post('urutan'),
						);
			$this->satker_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/satker'),'refresh');
		}
		// End proses masuk database
	}

	// Bagian
	public function bagian($id_satker)
	{
		$satker 	= $this->satker_model->detail($id_satker);
		$bagian 	= $this->bagian_model->satker($id_satker);

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_bagian','Nama Bagian','required',
			array(	'required'		=> 'Nama Bagian harus diisi'));

		$valid->set_rules('urutan','Urutan','required',
			array(	'required'		=> 'Urutan harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'SATKER: '.$satker->nama_satker,
						'satker'	=> $satker,
						'bagian'	=> $bagian,
						'isi'		=> 'admin/satker/list_bagian');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;

			$data = array(	'id_user'		=> $this->session->userdata('id_pegawai'),
							'id_satker'		=> $id_satker,
							'nama_bagian'	=> $i->post('nama_bagian'),
							'keterangan'	=> $i->post('keterangan'),
							'urutan'		=> $i->post('urutan'),
						);
			$this->bagian_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/satker/bagian/'.$id_satker),'refresh');
		}
		// End proses masuk database
	}

	// Edit Bagian
	public function edit_bagian($id_bagian)
	{
		
		$bagian 	= $this->bagian_model->detail($id_bagian);
		$id_satker	= $bagian->id_satker;
		$satker 	= $this->satker_model->detail($id_satker);

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_bagian','Nama Bagian','required',
			array(	'required'		=> 'Nama Bagian harus diisi'));

		$valid->set_rules('urutan','Urutan','required',
			array(	'required'		=> 'Urutan harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Edit bagian: '.$bagian->nama_bagian,
						'satker'	=> $satker,
						'bagian'	=> $bagian,
						'isi'		=> 'admin/satker/edit_bagian');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;

			$data = array(	'id_bagian'		=> $id_bagian,
							'id_user'		=> $this->session->userdata('id_pegawai'),
							'id_satker'		=> $id_satker,
							'nama_bagian'	=> $i->post('nama_bagian'),
							'keterangan'	=> $i->post('keterangan'),
							'urutan'		=> $i->post('urutan'),
						);
			$this->bagian_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/satker/bagian/'.$id_satker),'refresh');
		}
		// End proses masuk database
	}

	// Delete bagian
	public function delete_bagian() {
		$id_bagian = $this->uri->segment(4);
		$id_satker = $this->uri->segment(5);
		// Proteksi proses delete harus login
		$this->simple_login->check_login();

		$data = array('id_bagian'	=> $id_bagian);
		$this->bagian_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/satker/bagian/'.$id_satker),'refresh');
	}

	// Delete user
	public function delete($id_satker) {
		// Proteksi proses delete harus login
		$this->simple_login->check_login();

		$data = array('id_satker'	=> $id_satker);
		$this->satker_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/satker'),'refresh');
	}
}

/* End of file Satker.php */
/* Location: ./application/controllers/admin/Satker.php */