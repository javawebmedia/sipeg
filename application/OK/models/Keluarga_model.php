<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluarga_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing data
	public function listing() {
		$this->db->select('keluarga.*,
							hubkel.nama_hubkel,
							pegawai.nama_lengkap AS nama_pegawai,
							jenjang.nama_jenjang');
		$this->db->from('keluarga');
		// Join
		$this->db->join('pegawai','pegawai.id_pegawai = keluarga.id_pegawai','LEFT');
		$this->db->join('hubkel','hubkel.id_hubkel = keluarga.id_hubkel','LEFT');
		$this->db->join('jenjang','jenjang.id_jenjang = keluarga.id_jenjang','LEFT');
		// End join
		$this->db->order_by('id_keluarga','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data perpegawai
	public function pegawai($id_pegawai) {
		$this->db->select('keluarga.*,
							hubkel.nama_hubkel,
							pegawai.nama_lengkap AS nama_pegawai,
							jenjang.nama_jenjang');
		$this->db->from('keluarga');
		// Join
		$this->db->join('pegawai','pegawai.id_pegawai = keluarga.id_pegawai','LEFT');
		$this->db->join('hubkel','hubkel.id_hubkel = keluarga.id_hubkel','LEFT');
		$this->db->join('jenjang','jenjang.id_jenjang = keluarga.id_jenjang','LEFT');
		// End join
		$this->db->where('keluarga.id_pegawai',$id_pegawai); // Sortir keluarga 
		$this->db->order_by('id_keluarga','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail anggota keluarga
	public function read($id_keluarga) {
		$this->db->select('keluarga.*,
							hubkel.nama_hubkel,
							pegawai.nama_lengkap AS nama_pegawai,
							agama.nama_agama,
							jenjang.nama_jenjang');
		$this->db->from('keluarga');
		// Join
		$this->db->join('agama','agama.id_agama = keluarga.id_agama','LEFT');
		$this->db->join('pegawai','pegawai.id_pegawai = keluarga.id_pegawai','LEFT');
		$this->db->join('hubkel','hubkel.id_hubkel = keluarga.id_hubkel','LEFT');
		$this->db->join('jenjang','jenjang.id_jenjang = keluarga.id_jenjang','LEFT');
		// End join
		$this->db->where('keluarga.id_keluarga',$id_keluarga); // Sortir keluarga 
		$this->db->order_by('id_keluarga','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail data
	public function detail($id_keluarga) {
		$this->db->select('*');
		$this->db->from('keluarga');
		$this->db->where('id_keluarga',$id_keluarga);
		$this->db->order_by('id_keluarga','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data) {
		$this->db->insert('keluarga',$data);
	}

	// Edit
	public function edit($data) {
		$this->db->where('id_keluarga',$data['id_keluarga']);
		$this->db->update('keluarga',$data);
	}

	// Delete
	public function delete($data) {
		$this->db->where('id_keluarga',$data['id_keluarga']);
		$this->db->delete('keluarga',$data);
	}
}

/* End of file Keluarga_model.php */
/* Location: ./application/models/Keluarga_model.php */