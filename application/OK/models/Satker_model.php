<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Satker_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing data
	public function listing() {
		$this->db->select('*');
		$this->db->from('satker');
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Read data
	public function read($slug_satker) {
		$this->db->select('*');
		$this->db->from('satker');
		$this->db->where('slug_satker',$slug_satker);
		$this->db->order_by('id_satker','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail data
	public function detail($id_satker) {
		$this->db->select('*');
		$this->db->from('satker');
		$this->db->where('id_satker',$id_satker);
		$this->db->order_by('id_satker','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data) {
		$this->db->insert('satker',$data);
	}

	// Edit
	public function edit($data) {
		$this->db->where('id_satker',$data['id_satker']);
		$this->db->update('satker',$data);
	}

	// Delete
	public function delete($data) {
		$this->db->where('id_satker',$data['id_satker']);
		$this->db->delete('satker',$data);
	}
}

/* End of file Satker_model.php */
/* Location: ./application/models/Satker_model.php */