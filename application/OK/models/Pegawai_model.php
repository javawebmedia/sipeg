<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing semua pegawai
	public function listing()
	{
		$this->db->select('pegawai.*,
							pendidikan.nama_pendidikan,
							jabatan.nama_jabatan,
							pangkat.nama_pangkat,
							pangkat.golongan,
							pangkat.ruang,
							satker.nama_satker,
							bagian.nama_bagian
							');
		$this->db->from('pegawai');
		// JOIN
		$this->db->join('jabatan','jabatan.id_pegawai = pegawai.id_pegawai','LEFT');
		$this->db->join('satker','satker.id_satker = jabatan.id_satker','LEFT');
		$this->db->join('bagian','bagian.id_bagian = jabatan.id_bagian','LEFT');
		$this->db->join('pangkat','pangkat.id_pangkat = jabatan.id_pangkat','LEFT');
		$this->db->join('pendidikan','pendidikan.id_pendidikan = jabatan.id_pendidikan','LEFT');
		// END JOIN
		$this->db->group_by('pegawai.id_pegawai');
		$this->db->order_by('pegawai.urutan','ASC');
		$this->db->order_by('jabatan.tmt', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Read detail pegawai
	public function read($id_pegawai)
	{
		$this->db->select('pegawai.*,
							pendidikan.nama_pendidikan,
							jabatan.nama_jabatan,
							pangkat.nama_pangkat,
							pangkat.golongan,
							pangkat.ruang,
							satker.nama_satker,
							bagian.nama_bagian,
							jenis_pegawai.nama_jenis_pegawai
							');
		$this->db->from('pegawai');
		// JOIN
		$this->db->join('jenis_pegawai','jenis_pegawai.id_jenis_pegawai = pegawai.id_jenis_pegawai','LEFT');
		$this->db->join('jabatan','jabatan.id_pegawai = pegawai.id_pegawai','LEFT');
		$this->db->join('satker','satker.id_satker = jabatan.id_satker','LEFT');
		$this->db->join('bagian','bagian.id_bagian = jabatan.id_bagian','LEFT');
		$this->db->join('pangkat','pangkat.id_pangkat = jabatan.id_pangkat','LEFT');
		$this->db->join('pendidikan','pendidikan.id_pendidikan = jabatan.id_pendidikan','LEFT');
		// END JOIN
		$this->db->where('pegawai.id_pegawai', $id_pegawai);
		$this->db->group_by('pegawai.id_pegawai');
		$this->db->order_by('pegawai.urutan','ASC');
		$this->db->order_by('jabatan.tmt', 'DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail semua pegawai
	public function detail($id_pegawai)
	{
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->where('id_pegawai',$id_pegawai); // Where
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->row(); // single data
	}

	// Login pegawai
	public function login($username,$password)
	{
		$this->db->select('*');
		$this->db->from('pegawai');
		// Fungsi login dg NRK dan Password
		$this->db->where('nrk',$username); // Where
		$this->db->where('password',sha1($password)); // Where
		// End fungsi login
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->row(); // single data
	}

	// Tambah pegawai
	public function tambah($data)
	{
		$this->db->insert('pegawai',$data);
	}

	// Edit pegawai
	public function edit($data)
	{
		$this->db->where('id_pegawai',$data['id_pegawai']);
		$this->db->update('pegawai',$data);
	}

	// Delete pegawai
	public function delete($data)
	{
		$this->db->where('id_pegawai',$data['id_pegawai']);
		$this->db->delete('pegawai',$data);
	}
}

/* End of file Pegawai_model.php */
/* Location: ./application/models/Pegawai_model.php */