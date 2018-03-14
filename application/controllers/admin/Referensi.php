<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Referensi extends CI_Controller {

	// Load model database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('referensi_model');
	}

	// Main page
	public function index()
	{
		redirect(base_url('admin/dasbor'));
	}

	// Listing agama
	public function agama()
	{
		$agama = $this->referensi_model->listing_agama();

		$data = array(	'title'		=> 'Referensi agama ('.count($agama).')',
						'agama'		=> $agama,
						'isi'		=> 'admin/referensi/agama'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Listing jenis
	public function jenis()
	{
		$jenis_pegawai = $this->referensi_model->listing_jenis_pegawai();

		$data = array(	'title'				=> 'Referensi Jenis Pegawai ('.
												count($jenis_pegawai).')',
						'jenis_pegawai'		=> $jenis_pegawai,
						'isi'				=> 'admin/referensi/jenis_pegawai'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Listing provinsi
	public function provinsi()
	{
		$provinsi = $this->referensi_model->listing_provinsi();

		$data = array(	'title'			=> 'Referensi Provinsi ('.
												count($provinsi).')',
						'provinsi'		=> $provinsi,
						'isi'			=> 'admin/referensi/provinsi'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Listing kabupaten
	public function kabupaten()
	{
		$kabupaten = $this->referensi_model->listing_kabupaten();

		$data = array(	'title'			=> 'Referensi kabupaten ('.
												count($kabupaten).')',
						'kabupaten'		=> $kabupaten,
						'isi'			=> 'admin/referensi/kabupaten'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Listing kecamatan
	public function kecamatan()
	{
		$kecamatan = $this->referensi_model->listing_kecamatan();

		$data = array(	'title'			=> 'Referensi kecamatan ('.
												count($kecamatan).')',
						'kecamatan'		=> $kecamatan,
						'isi'			=> 'admin/referensi/kecamatan'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

}

/* End of file Referensi.php */
/* Location: ./application/controllers/admin/Referensi.php */