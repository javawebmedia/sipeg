<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Referensi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing
	public function listing_agama()
	{
		$this->db->select('*');
		$this->db->from('agama');
		$this->db->order_by('id_agama','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing
	public function listing_jenis_pegawai()
	{
		$this->db->select('*');
		$this->db->from('jenis_pegawai');
		$this->db->order_by('id_jenis_pegawai','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing
	public function listing_provinsi()
	{
		$this->db->select('*');
		$this->db->from('provinsi');
		$this->db->order_by('id_prov','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing
	public function listing_kabupaten()
	{
		$this->db->select('kabupaten.*, provinsi.nama AS nama_provinsi');
		$this->db->from('kabupaten');
		// join
		$this->db->join('provinsi','provinsi.id_prov = kabupaten.id_prov');
		$this->db->order_by('id_kab','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing
	public function listing_kecamatan()
	{
		$this->db->select('kecamatan.*, 
							kabupaten.nama AS nama_kabupaten, 
							provinsi.nama AS nama_provinsi');
		$this->db->from('kecamatan');
		// join
		$this->db->join('kabupaten','kabupaten.id_kab = kecamatan.id_kab');
		$this->db->join('provinsi','provinsi.id_prov = kabupaten.id_prov');
		// end join
		$this->db->order_by('id_kec','ASC');
		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file Referensi_model.php */
/* Location: ./application/models/Referensi_model.php */