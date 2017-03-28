<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	public function insert_data($table, $data)
	{
		return $this->db->insert($table, $data);
	}
	public function get_data_all($table)
	{
		$result = $this->db->get($table);
		if ($result->num_rows() > 0 ) {
			return $result->result();
		}
		return array();
	}
	public function get_data_where($table, $where)
	{
		$result = $this->db->get_where($table, $where);
		if ($result->num_rows() > 0 ) {
			return $result->result();
		}
		return array();
	}
	public function get_data_single($table, $where)
	{
		$result = $this->db->get_where($table, $where);
		if ($result->num_rows() > 0 ) {
			return $result->row();
		}
		return array();
	}
	public function update_data($table, $set, $where)
	{
		$this->db->set($set);
		$this->db->where($where);
		$result = $this->db->update($table);
		return $result;
	}
	public function delete_data($table, $where)
	{
		$result = $this->db->delete($table, $where);
		return $result;
	}
	
}
/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */