<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function index()
	{
		$this->template->render('laporan/v_laporan');
	}

}

/* End of file laporan.php */
/* Location: ./application/controllers/laporan.php */