<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pangkat_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing data
	public function listing() {
		$this->db->select('*');
		$this->db->from('pangkat');
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail data
	public function detail($id_pangkat) {
		$this->db->select('*');
		$this->db->from('pangkat');
		$this->db->where('id_pangkat',$id_pangkat);
		$this->db->order_by('id_pangkat','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data) {
		$this->db->insert('pangkat',$data);
	}

	// Edit
	public function edit($data) {
		$this->db->where('id_pangkat',$data['id_pangkat']);
		$this->db->update('pangkat',$data);
	}

	// Delete
	public function delete($data) {
		$this->db->where('id_pangkat',$data['id_pangkat']);
		$this->db->delete('pangkat',$data);
	}
}

/* End of file Pangkat_model.php */
/* Location: ./application/models/Pangkat_model.php */