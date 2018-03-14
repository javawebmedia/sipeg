<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan_fungsional_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing data
	public function listing() {
		$this->db->select('jabatan_fungsional.*,
							pegawai.nama_lengkap,
							satker.nama_satker,
							bagian.nama_bagian,
							pangkat.nama_pangkat,
							pangkat.golongan,
							pangkat.ruang,
							pendidikan.nama_pendidikan');
		$this->db->from('jabatan_fungsional');
		// Join
		$this->db->join('pegawai','pegawai.id_pegawai = jabatan_fungsional.id_pegawai','LEFT');
		$this->db->join('satker','satker.id_satker = jabatan_fungsional.id_satker','LEFT');
		$this->db->join('bagian','bagian.id_bagian = jabatan_fungsional.id_bagian','LEFT');
		$this->db->join('pangkat','pangkat.id_pangkat = jabatan_fungsional.id_pangkat','LEFT');
		$this->db->join('pendidikan','pendidikan.id_pendidikan = jabatan_fungsional.id_pendidikan','LEFT');
		// End join
		$this->db->order_by('tmt','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data perpegawai
	public function pegawai($id_pegawai) {
		$this->db->select('jabatan_fungsional.*,
							pegawai.nama_lengkap,
							satker.nama_satker,
							bagian.nama_bagian,
							pangkat.nama_pangkat,
							pangkat.golongan,
							pangkat.ruang,
							pendidikan.nama_pendidikan');
		$this->db->from('jabatan_fungsional');
		// Join
		$this->db->join('pegawai','pegawai.id_pegawai = jabatan_fungsional.id_pegawai','LEFT');
		$this->db->join('satker','satker.id_satker = jabatan_fungsional.id_satker','LEFT');
		$this->db->join('bagian','bagian.id_bagian = jabatan_fungsional.id_bagian','LEFT');
		$this->db->join('pangkat','pangkat.id_pangkat = jabatan_fungsional.id_pangkat','LEFT');
		$this->db->join('pendidikan','pendidikan.id_pendidikan = jabatan_fungsional.id_pendidikan','LEFT');
		// End join
		$this->db->where('jabatan_fungsional.id_pegawai',$id_pegawai); // Sortir jabatan_fungsional 
		$this->db->order_by('tmt','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail anggota jabatan_fungsional
	public function read($id_jabatan_fungsional) {
		$this->db->select('jabatan_fungsional.*,
							pegawai.nama_lengkap,
							satker.nama_satker,
							bagian.nama_bagian,
							pangkat.nama_pangkat,
							pangkat.golongan,
							pangkat.ruang,
							pendidikan.nama_pendidikan');
		$this->db->from('jabatan_fungsional');
		// Join
		$this->db->join('pegawai','pegawai.id_pegawai = jabatan_fungsional.id_pegawai','LEFT');
		$this->db->join('satker','satker.id_satker = jabatan_fungsional.id_satker','LEFT');
		$this->db->join('bagian','bagian.id_bagian = jabatan_fungsional.id_bagian','LEFT');
		$this->db->join('pangkat','pangkat.id_pangkat = jabatan_fungsional.id_pangkat','LEFT');
		$this->db->join('pendidikan','pendidikan.id_pendidikan = jabatan_fungsional.id_pendidikan','LEFT');
		// End join
		$this->db->where('jabatan_fungsional.id_jabatan_fungsional',$id_jabatan_fungsional); // Sortir jabatan_fungsional 
		$this->db->order_by('tmt','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail data
	public function detail($id_jabatan_fungsional) {
		$this->db->select('*');
		$this->db->from('jabatan_fungsional');
		$this->db->where('id_jabatan_fungsional',$id_jabatan_fungsional);
		$this->db->order_by('tmt','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data) {
		$this->db->insert('jabatan_fungsional',$data);
	}

	// Edit
	public function edit($data) {
		$this->db->where('id_jabatan_fungsional',$data['id_jabatan_fungsional']);
		$this->db->update('jabatan_fungsional',$data);
	}

	// Edit
	public function edit_aktif($data_pegawai) {
		$this->db->where('id_pegawai',$data_pegawai['id_pegawai']);
		$this->db->update('jabatan_fungsional',$data_pegawai);
	}

	// Delete
	public function delete($data) {
		$this->db->where('id_jabatan_fungsional',$data['id_jabatan_fungsional']);
		$this->db->delete('jabatan_fungsional',$data);
	}
}

/* End of file Jabatan_fungsional_model.php */
/* Location: ./application/models/Jabatan_fungsional_model.php */