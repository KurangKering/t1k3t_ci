<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Konfigurasi extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{

		$data['random_number'] = sha1(date("Y-m-d-H-i-s"));
		$data['header'] = "Konfigurasi";
		$data['konfig'] = $this->Global_CRUD->get_data_all('konfig')[0];
		$this->template->render('konfigurasi/v_konfigurasi', $data);
	}
	public function update_konfig()
	{

		$new_fee       = ekstrak_angka($this->input->post('fee'));
		$new_persen    = ekstrak_angka($this->input->post('persen'));
		$new_pass      = $this->input->post('new_pass');
		$new_pass_conf = $this->input->post('new_pass_confirm');
		$konfig_awal   = $this->Global_CRUD->get_data_all('konfig')[0];
		if ($this->isAdmin && ($konfig_awal->fee != $new_fee || ($konfig_awal->persen * 100) != floatval($new_persen)))
		{
			$sql   = 'UPDATE konfig SET ';
			$data  = array();
			$param = array();
			if ($konfig_awal->fee != $new_fee) 
			{
				$data[]  = "fee = ?";
				$param[] = $new_fee; 
				$this->session->set_flashdata('pesan', tampil_pesan('success', 'Berhasil Merubah Data Fee'));
			}
			if (($konfig_awal->persen * 100) != floatval($new_persen)) 
			{
				$data[]  = "persen = ?";
				$param[] = $new_persen / 100;
				$this->session->set_flashdata('pesan', $this->session->flashdata('pesan') . tampil_pesan('success', 'Berhasil Merubah Data Persen'));
			}
			$query_data = implode (", ", $data);
			if ($query_data) 
			{
				$sql     .= $query_data;
				$sql     .= " WHERE fee = ?";
				$param[]  = $konfig_awal->fee;
				$query    = $this->db->query($sql, $param);
			}
		}
		if ($new_pass) {
			if ($new_pass_conf) {
				if ($new_pass != $new_pass_conf) {
					$this->session->set_flashdata('pesan', $this->session->flashdata('pesan') . tampil_pesan('error', 'Password confirmation tidak sama'));
				}
				else
				{
					$sql = 'UPDATE user SET password = ? WHERE id = ?';
					$query = $this->db->query($sql, array($new_pass, $this->session->userdata('id')));
					$this->session->set_flashdata('pesan', $this->session->flashdata('pesan') . tampil_pesan('success', 'Berhasil Merubah Data Password'));
				}
			}
			else {
				$this->session->set_flashdata('pesan', $this->session->flashdata('pesan') . tampil_pesan('error', 'Password confirmation harus diisi'));
			}
		}
		else if ($new_pass_conf)
		{
			$this->session->set_flashdata('pesan', $this->session->flashdata('pesan') . tampil_pesan('error', 'Password harus diisi'));
		}
		redirect('konfigurasi');
	}
	public function export_database($number = null)
	{
		if (!$number) {
			show_404();
		}
		$this->load->dbutil();
		$prefs = array(     
			'format'      => 'zip',             
			'filename'    => 't1k3t.sql'
			);
		$backup  =& $this->dbutil->backup($prefs); 
		$db_name = 'tiket-'. date("Y-m-d-H-i-s") .'.zip';
		$save    = 'pathtobkfolder/'.$db_name;
		$this->load->helper('file');
		write_file($save, $backup); 
		$this->load->helper('download');
		force_download($db_name, $backup); 
	}
}
/* End of file konfigurasi.php */
/* Location: ./application/controllers/konfigurasi.php */