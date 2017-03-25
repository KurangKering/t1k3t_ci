<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Konfigurasi extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_konfigurasi', 'konfigurasi');
		$this->load->model('m_auth', 'auth');
		$this->output->enable_profiler(true);
	}
	public function index()
	{
		$data['header'] = "Konfigurasi";
		$this->template->js_add('assets/js/priceFormat.js', 'import');
		$this->template->js_add('assets/jquerypriceformat/jquery.priceformat.min.js', 'import');
		$data['konfig'] = $this->konfigurasi->getAll('konfig')[0];
		$this->template->render('konfigurasi/v_konfigurasi', $data);
	}
	public function update_konfig() 
	{ 
		$new_fee       = ekstrak_angka($this->input->post('fee'));
		$new_persen    = $this->input->post('persen');
		$new_pass      = $this->input->post('new_pass');
		$new_pass_conf = $this->input->post('new_pass_confirm');
		$konfig_awal   = $this->konfigurasi->getAll('konfig')[0];
		if (ekstrak_angka($konfig_awal->fee) != $new_fee || ($konfig_awal->persen * 100) != floatval($new_persen))
		{
			$sql   = 'UPDATE konfig SET ';
			$data  = array();
			$param = array();
			if (ekstrak_angka($konfig_awal->fee) != $new_fee) 
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
				$param[]  = ekstrak_angka($konfig_awal->fee);
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
					$sql = 'UPDATE user SET password = ?';
					$query = $this->db->query($sql, $new_pass);
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
		redirect('konfigurasi', 'refresh');
	}
}
/* End of file konfigurasi.php */
/* Location: ./application/controllers/konfigurasi.php */