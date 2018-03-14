<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing data
	public function listing() {
		$this->db->select('jabatan.*,
							pegawai.nama_lengkap,
							satker.nama_satker,
							bagian.nama_bagian,
							pangkat.nama_pangkat,
							pangkat.golongan,
							pangkat.ruang,
							pendidikan.nama_pendidikan');
		$this->db->from('jabatan');
		// Join
		$this->db->join('pegawai','pegawai.id_pegawai = jabatan.id_pegawai','LEFT');
		$this->db->join('satker','satker.id_satker = jabatan.id_satker','LEFT');
		$this->db->join('bagian','bagian.id_bagian = jabatan.id_bagian','LEFT');
		$this->db->join('pangkat','pangkat.id_pangkat = jabatan.id_pangkat','LEFT');
		$this->db->join('pendidikan','pendidikan.id_pendidikan = jabatan.id_pendidikan','LEFT');
		// End join
		$this->db->order_by('tmt','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data perpegawai
	public function pegawai($id_pegawai) {
		$this->db->select('jabatan.*,
							pegawai.nama_lengkap,
							satker.nama_satker,
							bagian.nama_bagian,
							pangkat.nama_pangkat,
							pangkat.golongan,
							pangkat.ruang,
							pendidikan.nama_pendidikan');
		$this->db->from('jabatan');
		// Join
		$this->db->join('pegawai','pegawai.id_pegawai = jabatan.id_pegawai','LEFT');
		$this->db->join('satker','satker.id_satker = jabatan.id_satker','LEFT');
		$this->db->join('bagian','bagian.id_bagian = jabatan.id_bagian','LEFT');
		$this->db->join('pangkat','pangkat.id_pangkat = jabatan.id_pangkat','LEFT');
		$this->db->join('pendidikan','pendidikan.id_pendidikan = jabatan.id_pendidikan','LEFT');
		// End join
		$this->db->where('jabatan.id_pegawai',$id_pegawai); // Sortir jabatan 
		$this->db->order_by('id_jabatan','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail anggota jabatan
	public function read($id_jabatan) {
		$this->db->select('jabatan.*,
							pegawai.nama_lengkap,
							satker.nama_satker,
							bagian.nama_bagian,
							pangkat.nama_pangkat,
							pangkat.golongan,
							pangkat.ruang,
							pendidikan.nama_pendidikan');
		$this->db->from('jabatan');
		// Join
		$this->db->join('pegawai','pegawai.id_pegawai = jabatan.id_pegawai','LEFT');
		$this->db->join('satker','satker.id_satker = jabatan.id_satker','LEFT');
		$this->db->join('bagian','bagian.id_bagian = jabatan.id_bagian','LEFT');
		$this->db->join('pangkat','pangkat.id_pangkat = jabatan.id_pangkat','LEFT');
		$this->db->join('pendidikan','pendidikan.id_pendidikan = jabatan.id_pendidikan','LEFT');
		// End join
		$this->db->where('jabatan.id_jabatan',$id_jabatan); // Sortir jabatan 
		$this->db->order_by('id_jabatan','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail data
	public function detail($id_jabatan) {
		$this->db->select('*');
		$this->db->from('jabatan');
		$this->db->where('id_jabatan',$id_jabatan);
		$this->db->order_by('id_jabatan','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data) {
		$this->db->insert('jabatan',$data);
	}

	// Edit
	public function edit($data) {
		$this->db->where('id_jabatan',$data['id_jabatan']);
		$this->db->update('jabatan',$data);
	}

	// Delete
	public function delete($data) {
		$this->db->where('id_jabatan',$data['id_jabatan']);
		$this->db->delete('jabatan',$data);
	}
}

/* End of file Jabatan_model.php */
/* Location: ./application/models/Jabatan_model.php */