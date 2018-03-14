<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bagian_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing data
	public function listing() {
		$this->db->select('bagian.*,
							satker.nama_satker');
		$this->db->from('bagian');
		// Join 2 table
		$this->db->join('satker','satker.id_satker = bagian.id_satker');
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Satker data
	public function satker($id_satker) {
		$this->db->select('*');
		$this->db->from('bagian');
		$this->db->where('id_satker',$id_satker);
		$this->db->order_by('id_bagian','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail data
	public function detail($id_bagian) {
		$this->db->select('*');
		$this->db->from('bagian');
		$this->db->where('id_bagian',$id_bagian);
		$this->db->order_by('id_bagian','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data) {
		$this->db->insert('bagian',$data);
	}

	// Edit
	public function edit($data) {
		$this->db->where('id_bagian',$data['id_bagian']);
		$this->db->update('bagian',$data);
	}

	// Delete
	public function delete($data) {
		$this->db->where('id_bagian',$data['id_bagian']);
		$this->db->delete('bagian',$data);
	}
}

/* End of file Bagian_model.php */
/* Location: ./application/models/Bagian_model.php */