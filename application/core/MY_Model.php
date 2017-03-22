<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll($table) {

		$result = $this->db->get($table);

		if ($result->num_rows() > 0 ) {
			return $result->result();
		}
		return array();
		
	}

	public function getWhere($table, $where) 
	{
		$result = $this->db->get_where($table, $where);
		if ($result->num_rows() > 0 ) {
			return $result->result();
		}
		return array();
	}
	public function getByID($table, $where) {
		$result = $this->db->get_where($table, $where);
		if ($result->num_rows() > 0 ) {
			return $result->row();
		}

		return array();
	}

	public function delete($table, $where) {
		$result = $this->db->delete($table, $where);
		return $result;
	}

	public function insert($table, $data) 
	{
		return $this->db->insert($table, $data);
	}

	public function update($table, $set, $where) 
	{
		$this->db->set($set);
		$this->db->where($where);
		$this->db->update($table);
	}

}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */