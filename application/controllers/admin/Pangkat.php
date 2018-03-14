<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pangkat extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pangkat_model');
	}

	// Halaman utama
	public function index()	{
		$pangkat = $this->pangkat_model->listing();

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_pangkat','Nama nama pangkat','required|is_unique[pangkat.nama_pangkat]',
			array(	'required'		=> '%s harus diisi',
					'is_unique'		=> '%s sudah ada. Buat Nama %s baru!'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Data Pangkat dan Golongan ('.count($pangkat).')',
						'pangkat'	=> $pangkat,
						'isi'		=> 'admin/pangkat/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;

			$data = array(	'id_user'		=> $this->session->userdata('id_pegawai'),
							'nama_pangkat'	=> $i->post('nama_pangkat'),
							'golongan'		=> $i->post('golongan'),
							'ruang'			=> $i->post('ruang'),
							'urutan'		=> $i->post('urutan'),
						);
			$this->pangkat_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/pangkat'),'refresh');
		}
		// End proses masuk database
	}

	// Edit pangkat
	public function edit($id_pangkat)	{

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_pangkat','Nama nama pangkat','required',
			array(	'required'		=> '%s harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Edit Data Pangkat dan Golongan',
						'pangkat'	=> $this->pangkat_model->detail($id_pangkat),
						'isi'		=> 'admin/pangkat/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;

			$data = array(	'id_pangkat'	=> $id_pangkat,
							'id_user'		=> $this->session->userdata('id_pegawai'),
							'nama_pangkat'	=> $i->post('nama_pangkat'),
							'golongan'		=> $i->post('golongan'),
							'ruang'			=> $i->post('ruang'),
							'urutan'		=> $i->post('urutan'),
						);
			$this->pangkat_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/pangkat'),'refresh');
		}
		// End proses masuk database
	}

	// Delete user
	public function delete($id_pangkat) {
		// Proteksi proses delete harus login
		$this->simple_login->check_login();

		$data = array('id_pangkat'	=> $id_pangkat);
		$this->pangkat_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/pangkat'),'refresh');
	}
}

/* End of file Pangkat dan Golongan.php */
/* Location: ./application/controllers/admin/Pangkat dan Golongan.php */