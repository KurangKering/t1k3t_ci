<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends MY_Model {

	var $table = 'user';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function cek_login() {
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$result = $this->db->get('user');

		if ($result->num_rows() > 0 ) {
			return $result->row();
		}

		return false;
	}
}

/* End of file auth_model.php */
/* Location: ./application/models/auth_model.php */