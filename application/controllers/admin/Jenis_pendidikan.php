<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_pendidikan extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('jenis_pendidikan_model');
	}

	// Halaman utama
	public function index()	{

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_jenis_pendidikan','Nama Jenis Pendidikan','required|is_unique[jenis_pendidikan.nama_jenis_pendidikan]',
			array(	'required'		=> 'Nama Jenis Pendidikan harus diisi',
					'is_unique'		=> 'Nama Jenis Pendidikan sudah ada. Buat Nama Jenis Pendidikan baru!'));

		$valid->set_rules('urutan','Urutan','required',
			array(	'required'		=> 'Urutan harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'				=> 'Data Jenis Pendidikan',
						'jenis_pendidikan'	=> $this->jenis_pendidikan_model->listing(),
						'isi'				=> 'admin/jenis_pendidikan/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;
			$slug 	= url_title($i->post('nama_jenis_pendidikan'),'dash',TRUE);

			$data = array(	'nama_jenis_pendidikan'	=> $i->post('nama_jenis_pendidikan'),
							'slug_jenis_pendidikan'	=> $slug,
							'urutan'				=> $i->post('urutan'),
						);
			$this->jenis_pendidikan_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/jenis_pendidikan'),'refresh');
		}
		// End proses masuk database
	}

	// Edit jenis_pendidikan
	public function edit($id_jenis_pendidikan)	{

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_jenis_pendidikan','Nama Jenis Pendidikan','required',
			array(	'required'		=> 'Nama Jenis Pendidikan harus diisi'));

		$valid->set_rules('urutan','Urutan','required',
			array(	'required'		=> 'Urutan harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'				=> 'Edit Data Jenis Pendidikan',
						'jenis_pendidikan'	=> $this->jenis_pendidikan_model->detail($id_jenis_pendidikan),
						'isi'				=> 'admin/jenis_pendidikan/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;
			$slug 	= url_title($i->post('nama_jenis_pendidikan'),'dash',TRUE);

			$data = array(	'id_jenis_pendidikan'		=> $id_jenis_pendidikan,
							'nama_jenis_pendidikan'		=> $i->post('nama_jenis_pendidikan'),
							'slug_jenis_pendidikan'		=> $slug,
							'urutan'					=> $i->post('urutan'),
						);
			$this->jenis_pendidikan_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/jenis_pendidikan'),'refresh');
		}
		// End proses masuk database
	}

	// Delete user
	public function delete($id_jenis_pendidikan) {
		// Proteksi proses delete harus login
		$this->simple_login->check_login();

		$data = array('id_jenis_pendidikan'	=> $id_jenis_pendidikan);
		$this->jenis_pendidikan_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/jenis_pendidikan'),'refresh');
	}
}

/* End of file Jenis_pendidikan.php */
/* Location: ./application/controllers/admin/Jenis_pendidikan.php */