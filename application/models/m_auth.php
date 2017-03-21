<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends MY_Model {

	var $table = 'user';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function cek_login($username, $password) {
		$where = array('username' => $username,  'password' => $password);
		$result = $this->db->get_where($this->table, $where);
		return $result->result();
	}
}

/* End of file auth_model.php */
/* Location: ./application/models/auth_model.php */