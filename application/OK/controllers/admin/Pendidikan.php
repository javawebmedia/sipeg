<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pendidikan_model');
	}

	// Halaman utama
	public function index()	{

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_pendidikan','Nama pendidikan','required|is_unique[pendidikan.nama_pendidikan]',
			array(	'required'		=> 'Nama pendidikan harus diisi',
					'is_unique'		=> 'Nama pendidikan sudah ada. Buat Nama pendidikan baru!'));

		$valid->set_rules('urutan','Urutan','required',
			array(	'required'		=> 'Urutan harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'			=> 'Data Pendidikan',
						'pendidikan'	=> $this->pendidikan_model->listing(),
						'isi'			=> 'admin/pendidikan/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;
			$slug 	= url_title($i->post('nama_pendidikan'),'dash',TRUE);

			$data = array(	'nama_pendidikan'	=> $i->post('nama_pendidikan'),
							'slug_pendidikan'	=> $slug,
							'urutan'			=> $i->post('urutan'),
						);
			$this->pendidikan_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/pendidikan'),'refresh');
		}
		// End proses masuk database
	}

	// Edit pendidikan
	public function edit($id_pendidikan)	{

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_pendidikan','Nama pendidikan','required',
			array(	'required'		=> 'Nama pendidikan harus diisi'));

		$valid->set_rules('urutan','Urutan','required',
			array(	'required'		=> 'Urutan harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'			=> 'Edit Data Pendidikan',
						'pendidikan'	=> $this->pendidikan_model->detail($id_pendidikan),
						'isi'			=> 'admin/pendidikan/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;
			$slug 	= url_title($i->post('nama_pendidikan'),'dash',TRUE);

			$data = array(	'id_pendidikan'		=> $id_pendidikan,
							'nama_pendidikan'	=> $i->post('nama_pendidikan'),
							'slug_pendidikan'	=> $slug,
							'urutan'			=> $i->post('urutan'),
						);
			$this->pendidikan_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/pendidikan'),'refresh');
		}
		// End proses masuk database
	}

	// Delete user
	public function delete($id_pendidikan) {
		// Proteksi proses delete harus login
		$this->simple_login->check_login();

		$data = array('id_pendidikan'	=> $id_pendidikan);
		$this->pendidikan_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/pendidikan'),'refresh');
	}
}

/* End of file Pendidikan.php */
/* Location: ./application/controllers/admin/Pendidikan.php */