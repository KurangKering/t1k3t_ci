<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_konfigurasi extends MY_Model {

	var $table = 'konfig';
	public function __construct()
	{
		parent::__construct();
		
	}

	public function edit_data($array) 
	{ 
		$this->db->set($array);
		return $this->db->update($this->table);
	}

}

/* End of file m_konfigurasi.php */
/* Location: ./application/models/m_konfigurasi.php */