<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hubkel extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('hubkel_model');
	}

	// Halaman utama
	public function index()	{
		$hubkel = $this->hubkel_model->listing();

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_hubkel','Nama hubungan keluarga','required|is_unique[hubkel.nama_hubkel]',
			array(	'required'		=> '%s harus diisi',
					'is_unique'		=> '%s sudah ada. Buat Nama %s baru!'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Data Hubungan Keluarga ('.count($hubkel).')',
						'hubkel'	=> $hubkel,
						'isi'		=> 'admin/hubkel/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;
			$slug 	= url_title($i->post('nama_hubkel'),'dash',TRUE);

			$data = array(	'nama_hubkel'	=> $i->post('nama_hubkel'),
							'urutan'		=> $i->post('urutan'),
							'aktif'			=> $i->post('aktif')
						);
			$this->hubkel_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/hubkel'),'refresh');
		}
		// End proses masuk database
	}

	// Edit hubkel
	public function edit($id_hubkel)	{

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_hubkel','Nama hubungan keluarga','required',
			array(	'required'		=> '%s harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Edit Data Hubungan Keluarga',
						'hubkel'	=> $this->hubkel_model->detail($id_hubkel),
						'isi'		=> 'admin/hubkel/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;
			$slug 	= url_title($i->post('nama_hubkel'),'dash',TRUE);

			$data = array(	'id_hubkel'		=> $id_hubkel,
							'nama_hubkel'	=> $i->post('nama_hubkel'),
							'urutan'		=> $i->post('urutan'),
							'aktif'			=> $i->post('aktif')
						);
			$this->hubkel_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/hubkel'),'refresh');
		}
		// End proses masuk database
	}

	// Delete user
	public function delete($id_hubkel) {
		// Proteksi proses delete harus login
		$this->simple_login->check_login();

		$data = array('id_hubkel'	=> $id_hubkel);
		$this->hubkel_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/hubkel'),'refresh');
	}
}

/* End of file Hubungan Keluarga.php */
/* Location: ./application/controllers/admin/Hubungan Keluarga.php */