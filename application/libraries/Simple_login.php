<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        // Load data pegawai
        $this->CI->load->model('pegawai_model');
	}

	// Login
	public function login($username,$password)
	{
		$check = $this->CI->pegawai_model->login($username,$password);
		// Kalau ada record/data yang cocok, maka login
		if($check) 
		{
			// Set session
			$this->CI->session->set_userdata('id_pegawai',$check->id_pegawai);
			$this->CI->session->set_userdata('nrk',$check->nrk);
			$this->CI->session->set_userdata('nama_lengkap',$check->nama_lengkap);
			$this->CI->session->set_userdata('akses_level',$check->akses_level);
			// Notifikasi
			$this->CI->session->set_flashdata('sukses','Anda berhasil login');
			redirect(base_url('admin/dasbor'),'refresh');
		}else{
			// Kalo ga ada yg cocok
			$this->CI->session->set_flashdata('sukses','Username/password salah');
			redirect(base_url('login'),'refresh');
		}
	}

	// Fungsi check login (Pegawai sudah login apa belum)
	public function check_login()
	{
		if($this->CI->session->userdata('nrk') == "" && 
			$this->CI->session->userdata('akses_level') == "")
		{
			// Lempar ke halaman login lagi jika belum login
			$this->CI->session->set_flashdata('sukses','Silakan login');
			redirect(base_url('login'),'refresh');
		}
	}

	// Fungsi logout pegawai
	public function logout()
	{
		// Unset session
		$this->CI->session->unset_userdata('id_pegawai');
		$this->CI->session->unset_userdata('nrk');
		$this->CI->session->unset_userdata('nama_lengkap');
		$this->CI->session->unset_userdata('akses_level');
		// Notifikasi
		$this->CI->session->set_flashdata('sukses','Anda berhasil logout');
		redirect(base_url('login'),'refresh');
	}

}

/* End of file Simple_login.php */
/* Location: ./application/libraries/Simple_login.php */
