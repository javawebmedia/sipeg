<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_pendidikan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing data
	public function listing() {
		$this->db->select('*');
		$this->db->from('jenis_pendidikan');
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Read data
	public function read($slug_jenis_pendidikan) {
		$this->db->select('*');
		$this->db->from('jenis_pendidikan');
		$this->db->where('slug_jenis_pendidikan',$slug_jenis_pendidikan);
		$this->db->order_by('id_jenis_pendidikan','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail data
	public function detail($id_jenis_pendidikan) {
		$this->db->select('*');
		$this->db->from('jenis_pendidikan');
		$this->db->where('id_jenis_pendidikan',$id_jenis_pendidikan);
		$this->db->order_by('id_jenis_pendidikan','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data) {
		$this->db->insert('jenis_pendidikan',$data);
	}

	// Edit
	public function edit($data) {
		$this->db->where('id_jenis_pendidikan',$data['id_jenis_pendidikan']);
		$this->db->update('jenis_pendidikan',$data);
	}

	// Delete
	public function delete($data) {
		$this->db->where('id_jenis_pendidikan',$data['id_jenis_pendidikan']);
		$this->db->delete('jenis_pendidikan',$data);
	}
}

/* End of file Jenis_pendidikan_model.php */
/* Location: ./application/models/Jenis_pendidikan_model.php */