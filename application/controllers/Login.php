<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	// Load model database
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	// Halaman login
	public function index()
	{
		// Proses login
		$valid = $this->form_validation;

		$valid->set_rules('username','Username/NRK','required',
			array(	'required'	=> '%s harus diisi'));

		$valid->set_rules('password','Password','required',
			array(	'required'	=> '%s harus diisi'));

		if($valid->run()) {
			// Proses ke library Simple_login.php
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$this->simple_login->login($username,$password);
		}
		// End proses login

		$data = array( 'title'		=> 'Login Administrator');
		$this->load->view('admin/login_view', $data, FALSE);
	}

	// Logout
	public function logout()
	{
		// Ambil dari Simple_login.php di library
		$this->simple_login->logout();
	}

	// Lupa password
	public function lupa()
	{
		$data = array( 'title'		=> 'Lupa password');
		$this->load->view('admin/lupa', $data, FALSE);
	}

	// Reset password
	public function reset()
	{
		$data = array( 'title'		=> 'Reset password');
		$this->load->view('admin/reset', $data, FALSE);
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */