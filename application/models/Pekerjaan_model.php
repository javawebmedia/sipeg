<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing data
	public function listing() {
		$this->db->select('*');
		$this->db->from('pekerjaan');
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Read data
	public function read($slug_pekerjaan) {
		$this->db->select('*');
		$this->db->from('pekerjaan');
		$this->db->where('slug_pekerjaan',$slug_pekerjaan);
		$this->db->order_by('id_pekerjaan','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail data
	public function detail($id_pekerjaan) {
		$this->db->select('*');
		$this->db->from('pekerjaan');
		$this->db->where('id_pekerjaan',$id_pekerjaan);
		$this->db->order_by('id_pekerjaan','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data) {
		$this->db->insert('pekerjaan',$data);
	}

	// Edit
	public function edit($data) {
		$this->db->where('id_pekerjaan',$data['id_pekerjaan']);
		$this->db->update('pekerjaan',$data);
	}

	// Delete
	public function delete($data) {
		$this->db->where('id_pekerjaan',$data['id_pekerjaan']);
		$this->db->delete('pekerjaan',$data);
	}
}

/* End of file Pekerjaan_model.php */
/* Location: ./application/models/Pekerjaan_model.php */