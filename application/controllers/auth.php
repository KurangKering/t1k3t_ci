<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
	}
	public function index()
	{

		$this->login();
		$this->load->view('auth/login');

	}

	public function login() {
		$this->form_validation->set_rules('username', 'User', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');

		if ($this->form_validation->run()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$result = $this->auth_model->cek_login($username, $password);

			if ($result) {
				$sess_user = array(
					'username' => $result[0]->username
					);

				$this->session->set_userdata( $sess_user );

				redirect('dashboard');

			}

		} 
	}
	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->sess_destroy();

		redirect('auth');
	}
}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */