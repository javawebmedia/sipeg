<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kategori_model');
	}

	// Main page: this will display all of the kategoris data
	public function index()
	{
		
		$kategori = $this->kategori_model->listing();

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_kategori','Nama kategori','required',
			array(	'required'		=> '%s harus diisi'));

		
		if($valid->run()=== FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Data Kategori ('.count($kategori).' data)',
						'kategori'	=> $kategori,
						'isi'		=> 'admin/kategori/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$i = $this->input;
			$data = array(	'slug_kategori'	=> url_title($i->post('nama_kategori','dash',true)),
							'nama_kategori'	=> $i->post('nama_kategori'),
							'urutan'		=> $i->post('urutan'),
						);
			$this->kategori_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect('admin/kategori','refresh');
		}
		// End masuk database
	}

	// Fungsi edit kategori
	public function edit($id_kategori)
	{
		$kategori = $this->kategori_model->detail($id_kategori);

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_kategori','Nama kategori','required',
			array(	'required'		=> '%s harus diisi'));

		if($valid->run()=== FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Edit Kategori: '.$kategori->nama_kategori,
						'kategori'	=> $kategori,
						'isi'		=> 'admin/kategori/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$i = $this->input;
			$data = array(	'id_kategori'	=> $id_kategori,
							'slug_kategori'	=> url_title($i->post('nama_kategori','dash',true)),
							'nama_kategori'	=> $i->post('nama_kategori'),
							'urutan'		=> $i->post('urutan'),
						);
			$this->kategori_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect('admin/kategori','refresh');
		}
		// End masuk database
	}


	// Delete kategori
	public function delete($id_kategori)
	{
		// PROTEKSI DELETE
		$this->simple_login->check_login();

		$data = array(	'id_kategori'		=> $id_kategori);
		$this->kategori_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect('admin/kategori','refresh');
	}
}

/* End of file Kategori.php */
/* Location: ./application/controllers/admin/Kategori.php */