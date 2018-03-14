<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hubkel_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing data
	public function listing() {
		$this->db->select('*');
		$this->db->from('hubkel');
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail data
	public function detail($id_hubkel) {
		$this->db->select('*');
		$this->db->from('hubkel');
		$this->db->where('id_hubkel',$id_hubkel);
		$this->db->order_by('id_hubkel','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data) {
		$this->db->insert('hubkel',$data);
	}

	// Edit
	public function edit($data) {
		$this->db->where('id_hubkel',$data['id_hubkel']);
		$this->db->update('hubkel',$data);
	}

	// Delete
	public function delete($data) {
		$this->db->where('id_hubkel',$data['id_hubkel']);
		$this->db->delete('hubkel',$data);
	}
}

/* End of file Hubkel_model.php */
/* Location: ./application/models/Hubkel_model.php */