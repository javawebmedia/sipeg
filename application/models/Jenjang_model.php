<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenjang_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing data
	public function listing() {
		$this->db->select('*');
		$this->db->from('jenjang');
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Read data
	public function read($slug_jenjang) {
		$this->db->select('*');
		$this->db->from('jenjang');
		$this->db->where('slug_jenjang',$slug_jenjang);
		$this->db->order_by('id_jenjang','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail data
	public function detail($id_jenjang) {
		$this->db->select('*');
		$this->db->from('jenjang');
		$this->db->where('id_jenjang',$id_jenjang);
		$this->db->order_by('id_jenjang','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data) {
		$this->db->insert('jenjang',$data);
	}

	// Edit
	public function edit($data) {
		$this->db->where('id_jenjang',$data['id_jenjang']);
		$this->db->update('jenjang',$data);
	}

	// Delete
	public function delete($data) {
		$this->db->where('id_jenjang',$data['id_jenjang']);
		$this->db->delete('jenjang',$data);
	}
}

/* End of file Jenjang_model.php */
/* Location: ./application/models/Jenjang_model.php */