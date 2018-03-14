<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Data yang mau pensiun (di umur 58 tahun)
	public function pensiun_58()
	{
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->where('DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), tanggal_lahir)), "%Y")+0 >=',57);
		$this->db->where('DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), tanggal_lahir)), "%Y")+0 <=',58);
		$this->db->order_by('tanggal_lahir', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Data usulan naik jabatan struktural
	public function struktural()
	{
		$this->db->select('jabatan.*,
							pegawai.nama_lengkap,
							pegawai.gelar_depan,
							pegawai.gelar_belakang,
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
		$this->db->where('DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), tmt)), "%Y")+0 >=',4);
		$this->db->where('jabatan.status_jabatan','Aktif');
		// group
		$this->db->group_by('jabatan.id_pegawai','jabatan.tmt');
		$this->db->order_by('tmt','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Data usulan naik jabatan fungsional
	public function fungsional()
	{
		$this->db->select('jabatan_fungsional.*,
							pegawai.nama_lengkap,
							pegawai.gelar_depan,
							pegawai.gelar_belakang,
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
		$this->db->where('DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), tmt)), "%Y")+0 >=',2.5);
		$this->db->where('jabatan_fungsional.status_jabatan','Aktif');
		// group
		$this->db->group_by('jabatan_fungsional.id_pegawai','jabatan_fungsional.tmt');
		$this->db->order_by('tmt','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Panggil data satker
	public function satker()
	{
		$this->db->select('COUNT(jabatan.id_jabatan) AS total_pegawai,
							satker.nama_satker');
		$this->db->from('jabatan');
		// JOIN
		$this->db->join('satker', 'satker.id_satker = jabatan.id_satker');
		// END JOIN
		$this->db->where('jabatan.status_jabatan', 'Aktif');
		$this->db->group_by('jabatan.id_satker','jabatan.id_pegawai');
		$this->db->order_by('satker.urutan', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Panggil data satker
	public function satker_excel()
	{
		$this->db->select('COUNT(jabatan.id_jabatan) AS total_pegawai,
							satker.nama_satker');
		$this->db->from('jabatan');
		// JOIN
		$this->db->join('satker', 'satker.id_satker = jabatan.id_satker');
		// END JOIN
		$this->db->where('jabatan.status_jabatan', 'Aktif');
		$this->db->group_by('jabatan.id_satker','jabatan.id_pegawai');
		$this->db->order_by('satker.urutan', 'ASC');
		$query = $this->db->get();
		return $query;
	}

	// Listing semua pegawai
	public function pegawai_excel()
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
		return $query;
	}
}

/* End of file Dasbor_model.php */
/* Location: ./application/models/Dasbor_model.php */