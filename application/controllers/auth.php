<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('m_auth', 'auth');

	}
	public function index()
	{
		if ($this->session->userdata('logged_in')) {
			redirect('dashboard');
		}
		$this->login();
	}

	public function login() 
	{

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('auth/login');
		} else {
			$validasi = $this->auth->cek_login();
			if ($validasi) {

				$array = array(
					'username' => $validasi->username,
					'logged_in' => true
					);
				$this->session->set_userdata( $array );

				redirect('dashboard');
			}

			else {
				$this->session->set_flashdata('pesan', $this->pesanGagal('Username / Password Salah'));
				redirect('auth');
			}
			
		}
	}

	public function logout()
	{

		$this->session->sess_destroy();
		redirect('auth');
	}

	private function pesanGagal($message)
	{
		$pesan = '
		<script>

			toastr.options = {
				"closeButton": false,
				"debug": false,
				"newestOnTop": true,
				"progressBar": false,
				"positionClass": "toast-top-right",
				"preventDuplicates": false,
				"onclick": null,
				"showDuration": "5000",
				"hideDuration": "5000",
				"timeOut": "3000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			},
			toastr["error"]("'.$message.'")

		</script>
		';

		return $pesan;
	}
	
}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */