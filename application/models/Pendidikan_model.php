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
		$this->db->select('pendidikan.*,
							jenis_pendidikan.nama_jenis_pendidikan,
							pegawai.nama_lengkap AS nama_pegawai,
							jenjang.nama_jenjang');
		$this->db->from('pendidikan');
		// Join
		$this->db->join('pegawai','pegawai.id_pegawai = pendidikan.id_pegawai','LEFT');
		$this->db->join('jenis_pendidikan','jenis_pendidikan.id_jenis_pendidikan = pendidikan.id_jenis_pendidikan','LEFT');
		$this->db->join('jenjang','jenjang.id_jenjang = pendidikan.id_jenjang','LEFT');
		// End join
		$this->db->order_by('id_pendidikan','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data perpegawai
	public function pegawai($id_pegawai) {
		$this->db->select('pendidikan.*,
							jenis_pendidikan.nama_jenis_pendidikan,
							pegawai.nama_lengkap AS nama_pegawai,
							jenjang.nama_jenjang');
		$this->db->from('pendidikan');
		// Join
		$this->db->join('pegawai','pegawai.id_pegawai = pendidikan.id_pegawai','LEFT');
		$this->db->join('jenis_pendidikan','jenis_pendidikan.id_jenis_pendidikan = pendidikan.id_jenis_pendidikan','LEFT');
		$this->db->join('jenjang','jenjang.id_jenjang = pendidikan.id_jenjang','LEFT');
		// End join
		$this->db->where('pendidikan.id_pegawai',$id_pegawai); // Sortir pendidikan 
		$this->db->order_by('id_pendidikan','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data perpegawai
	public function pegawai_formal($id_pegawai) {
		$this->db->select('pendidikan.*,
							jenis_pendidikan.nama_jenis_pendidikan,
							pegawai.nama_lengkap AS nama_pegawai,
							jenjang.nama_jenjang');
		$this->db->from('pendidikan');
		// Join
		$this->db->join('pegawai','pegawai.id_pegawai = pendidikan.id_pegawai','LEFT');
		$this->db->join('jenis_pendidikan','jenis_pendidikan.id_jenis_pendidikan = pendidikan.id_jenis_pendidikan','LEFT');
		$this->db->join('jenjang','jenjang.id_jenjang = pendidikan.id_jenjang','LEFT');
		// End join
		$this->db->where('pendidikan.id_pegawai',$id_pegawai); // Sortir pendidikan 
		$this->db->where('pendidikan.jenis_pendidikan', 'Formal');
		$this->db->order_by('id_pendidikan','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail anggota pendidikan
	public function read($id_pendidikan) {
		$this->db->select('pendidikan.*,
							jenis_pendidikan.nama_jenis_pendidikan,
							pegawai.nama_lengkap AS nama_pegawai,
							jenjang.nama_jenjang');
		$this->db->from('pendidikan');
		// Join
		$this->db->join('pegawai','pegawai.id_pegawai = pendidikan.id_pegawai','LEFT');
		$this->db->join('jenis_pendidikan','jenis_pendidikan.id_jenis_pendidikan = pendidikan.id_jenis_pendidikan','LEFT');
		$this->db->join('jenjang','jenjang.id_jenjang = pendidikan.id_jenjang','LEFT');
		// End join
		$this->db->where('pendidikan.id_pendidikan',$id_pendidikan); // Sortir pendidikan 
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