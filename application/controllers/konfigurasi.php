<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('penjualan_helper');
		$this->load->model('m_konfigurasi', 'konfigurasi');
		$this->load->model('m_auth', 'auth');

	}
	public function index()
	{
		$data['header'] = "Konfigurasi";
		$this->template->js_add('assets/js/priceFormat.js', 'import');
		$this->template->js_add('assets/jquerypriceformat/jquery.priceformat.min.js', 'import');


		
		
		$data['konfig'] = $this->konfigurasi->getAll('konfig')[0];

		$this->template->render('konfigurasi/v_konfigurasi', $data);

	}
	public function dump() {
		echo ekstrak_angka('10.000');
	}

	public function update_konfig() 
	{ 

		$new_fee    = $this->input->post('fee');
		$new_persen = $this->input->post('persen');
		$new_pass = $this->input->post('new_pass');
		$new_pass_conf = $this->input->post('new_pass_confirm');

		$konfig_awal = $this->konfigurasi->getAll('konfig')[0];

		if ($konfig_awal->fee != $new_fee || ($konfig_awal->persen * 100) != floatval($new_persen))
		{
			$sql         = 'UPDATE konfig SET ';
			$data        = array();
			$param       = array();
			if ($old_fee != $new_fee) 
			{
				$data[]      = "fee = :new_fee";
				$param[':new_fee'] = $new_fee; 
				$_SESSION['message'] .= '<script type="text/javascript">';
				$_SESSION['message'] .= '$.notify({message: "Berhasil Merubah Fee" },';
				$_SESSION['message'] .= '{type: "success",delay: 2000});';
				$_SESSION['message'] .= '</script>';
			}
			if (($old_persen * 100) != floatval($new_persen)) 
			{
				$data[] = "persen = :new_persen";
				$param[':new_persen'] = $new_persen / 100;
				$_SESSION['message'] .= '<script type="text/javascript">';
				$_SESSION['message'] .= '$.notify({message: "Berhasil Merubah Data Persen" },';
				$_SESSION['message'] .= '{type: "success",delay: 2000});';
				$_SESSION['message'] .= '</script>';
			}
			$query_data             = implode (", ", $data);
			if ($query_data) 
			{
				$sql                    .= $query_data;
				$sql                    .= " WHERE fee = :old_fee";
				$param[':old_fee'] = $old_fee;
				$query                  = $db->prepare($sql);
				$query->execute($param);
			}
		}
		if ($new_pass) {
			if ($new_pass_confirm) {
				if ($new_pass != $new_pass_confirm) {
					$_SESSION['message'] .= '<script type="text/javascript">';
					$_SESSION['message'] .= '$.notify({message: "Password baru dengan password repeat tidak sama !" },';
					$_SESSION['message'] .= '{type: "danger",delay: 2000});';
					$_SESSION['message'] .= '</script>';
				}
				else
				{
					$sql = 'UPDATE user SET password = :new_password';
					$query = $db->prepare($sql);
					$query->bindParam(':new_password', $new_pass);
					$query->execute();
					$_SESSION['message'] .= '<script type="text/javascript">';
					$_SESSION['message'] .= '$.notify({message: "Berhasil Merubah Password" },';
					$_SESSION['message'] .= '{type: "success",delay: 2000});';
					$_SESSION['message'] .= '</script>';
				}
			}
			else {
				$_SESSION['message'] .= '<script type="text/javascript">';
				$_SESSION['message'] .= '$.notify({message: "New Password repeat harus diisi !" },';
				$_SESSION['message'] .= '{type: "danger",delay: 2000});';
				$_SESSION['message'] .= '</script>';
			}

		}




	}
}


/* End of file konfigurasi.php */
/* Location: ./application/controllers/konfigurasi.php */