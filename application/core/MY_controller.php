<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_controller extends CI_Controller {

	public $isAdmin;
	public function __construct()
	{
		parent::__construct();
		$this->obj =& get_instance();

		if (!$this->obj->session->userdata('logged_in')) {
			redirect('auth');
		}

		$this->isAdmin = $this->obj->session->userdata('role_name') == 'admin';
	}

}

/* End of file MY_controller.php */
/* Location: ./application/core/MY_controller.php */