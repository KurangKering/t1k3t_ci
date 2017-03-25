<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_master extends MY_Model {

	public function __construct()
	{
		parent::__construct();
	//Do your magic here
	}

	public function update_maskapai($id)
	{
		$table = 'maskapai';
		$nama = $this->input->post('nama');
		$status = $this->input->post('status');
		$query = $this->db->update('maskapai', array('nama' => $nama, 'status' => $status), array('id_maskapai' => $id));
		return $query;
	}
	public function update_tc($id)
	{
		$table = 'tc';
		$nama = $this->input->post('nama');
		$status = $this->input->post('status');
		$query = $this->db->update('tc', array('nama' => $nama, 'status' => $status), array('id_tc' => $id));
		return $query;
	}

}

/* End of file m_master.php */
/* Location: ./application/models/m_master.php */