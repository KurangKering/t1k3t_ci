<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {
	var $table = 'view_penjualan';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_penjualan', 'penjualan');
		$this->load->helper('penjualan_helper');
		$this->template->js_add('assets/js/priceFormat.js', 'import');
		$this->template->js_add('assets/jquerypriceformat/jquery.priceformat.min.js', 'import');
		
	}
	public function index()
	{
		$this->lihat_penjualan();
	}

	private function lihat_penjualan() 
	{
		$data['header'] = "Data Penjualan";

		$data['penjualan'] = $this->penjualan->getAll($this->table);


		$this->render_js();
		$this->template->render('penjualan/v_penjualan', $data);
	}

	public function tambah_penjualan() 
	{
		
		$data['header'] = "Tambah Penjualan";
		$this->template->render('penjualan/v_form_penjualan', $data);
	}


	public function edit_penjualan()
	{ 
		$data['header'] = "Edit Penjualan";
		$this->template->render('penjualan/v_form_penjualan', $data);
	}

	

	private function render_js() 
	{
		$this->template->css_add('assets/template/adminLTE/plugins/datatables/dataTables.bootstrap.css');
		$this->template->css_add('assets/template/adminLTE/plugins/datatables/extensions/FixedColumns/css/dataTables.fixedColumns.min.css');
		$this->template->js_add('assets/template/adminLTE/plugins/datatables/jquery.dataTables.min.js');
		$this->template->js_add('assets/template/adminLTE/plugins/datatables/dataTables.bootstrap.min.js');
		$this->template->js_add('assets/template/adminLTE/plugins/datatables/extensions/FixedColumns/js/dataTables.fixedColumns.min.js');
		$this->template->js_add('
			$(function () {
				$("#table_penjualan").DataTable({
					"paging": true,
					"scrollX": true,
					"dom" : "frtip",


				});

			});
			', 'embed');
	}

}

/* End of file penjualan.php */
/* Location: ./application/controllers/penjualan.php */