<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenjang extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('jenjang_model');
	}

	// Halaman utama
	public function index()	{

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_jenjang','Nama jenjang','required|is_unique[jenjang.nama_jenjang]',
			array(	'required'		=> 'Nama jenjang harus diisi',
					'is_unique'		=> 'Nama jenjang sudah ada. Buat Nama jenjang baru!'));

		$valid->set_rules('urutan','Urutan','required',
			array(	'required'		=> 'Urutan harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'			=> 'Data Jenjang',
						'jenjang'	=> $this->jenjang_model->listing(),
						'isi'			=> 'admin/jenjang/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;
			$slug 	= url_title($i->post('nama_jenjang'),'dash',TRUE);

			$data = array(	'nama_jenjang'	=> $i->post('nama_jenjang'),
							'slug_jenjang'	=> $slug,
							'urutan'			=> $i->post('urutan'),
						);
			$this->jenjang_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/jenjang'),'refresh');
		}
		// End proses masuk database
	}

	// Edit jenjang
	public function edit($id_jenjang)	{

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_jenjang','Nama jenjang','required',
			array(	'required'		=> 'Nama jenjang harus diisi'));

		$valid->set_rules('urutan','Urutan','required',
			array(	'required'		=> 'Urutan harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'			=> 'Edit Data Jenjang',
						'jenjang'	=> $this->jenjang_model->detail($id_jenjang),
						'isi'			=> 'admin/jenjang/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;
			$slug 	= url_title($i->post('nama_jenjang'),'dash',TRUE);

			$data = array(	'id_jenjang'		=> $id_jenjang,
							'nama_jenjang'	=> $i->post('nama_jenjang'),
							'slug_jenjang'	=> $slug,
							'urutan'			=> $i->post('urutan'),
						);
			$this->jenjang_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/jenjang'),'refresh');
		}
		// End proses masuk database
	}

	// Delete user
	public function delete($id_jenjang) {
		// Proteksi proses delete harus login
		$this->simple_login->check_login();

		$data = array('id_jenjang'	=> $id_jenjang);
		$this->jenjang_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/jenjang'),'refresh');
	}
}

/* End of file Jenjang.php */
/* Location: ./application/controllers/admin/Jenjang.php */