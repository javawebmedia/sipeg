<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing data
	public function listing() {
		$this->db->select('*');
		$this->db->from('pendidikan');
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Read data
	public function read($slug_pendidikan) {
		$this->db->select('*');
		$this->db->from('pendidikan');
		$this->db->where('slug_pendidikan',$slug_pendidikan);
		$this->db->order_by('id_pendidikan','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail data
	public function detail($id_pendidikan) {
		$this->db->select('*');
		$this->db->from('pendidikan');
		$this->db->where('id_pendidikan',$id_pendidikan);
		$this->db->order_by('id_pendidikan','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data) {
		$this->db->insert('pendidikan',$data);
	}

	// Edit
	public function edit($data) {
		$this->db->where('id_pendidikan',$data['id_pendidikan']);
		$this->db->update('pendidikan',$data);
	}

	// Delete
	public function delete($data) {
		$this->db->where('id_pendidikan',$data['id_pendidikan']);
		$this->db->delete('pendidikan',$data);
	}
}

/* End of file Pendidikan_model.php */
/* Location: ./application/models/Pendidikan_model.php */