<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_master', 'master');
	}
	public function index()
	{
		$data['header'] = "Master Data";


		$data['data_maskapai'] = $this->master->getAll('maskapai');
		$data['data_tc']       = $this->master->getAll('tc');
		$this->template->render('master/v_data_master', $data);
	}

	public function tambah_maskapai() 
	{
		$this->template->render('master/v_data_master', $data);

	}

	public function edit_maskapai($id)
	{

	}

	public function tambah_tc() 
	{

	}

	public function edit_td($id)
	{
		
	}
	
}

/* End of file master.php */
/* Location: ./application/controllers/master.php */