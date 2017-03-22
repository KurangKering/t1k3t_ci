<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler(TRUE);
	}
	public function index()
	{
		$this->load->model('m_dashboard', 'dashboard');

		$data['jual'] = $this->dashboard->getAll('maskapai');
		$data['header'] = "Dashboard";
		$this->template->render('dashboard/v_dashboard', $data);
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */