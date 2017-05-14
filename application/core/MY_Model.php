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
		return $this->db->get($table) ? $this->db->get($table)->result() : '';
	}
	public function get_data_where($table, $where)
	{
		return $this->db->get_where($table, $where) ? $this->db->get_where($table, $where)->result() : '';
	}
	public function get_data_single($table, $where)
	{
		return $this->db->get_where($table, $where) ? $this->db->get_where($table, $where)->row() : '';
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
		return $this->db->delete($table, $where);
	}
}
/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */