<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {
	var $table = 'view_penjualan';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_penjualan', 'penjualan');
		$this->load->helper('penjualan_helper');
		$this->output->enable_profiler(TRUE);
	}
	public function index()
	{
		$this->lihat_penjualan();
	}

	private function lihat_penjualan() 
	{
		$data['header']    = "Data Penjualan";
		$data['penjualan'] = $this->penjualan->getAll($this->table);
		
		
		$this->render_js();
		$this->template->render('penjualan/v_penjualan', $data);
	}

	public function tambah_penjualan() 
	{
		$submit = $this->input->post('simpan');

		$this->form_validation->set_rules('q', 'Q', 'trim|required');
		if ($this->form_validation->run()) {

			$tanggal_issued = $this->input->post('tanggal');
			$booking_code   = $this->input->post('booking_code');
			$q              = $this->input->post('q');
			$hpp            = $this->input->post('hpp');
			$invoice        = $this->input->post('invoice');
			$id_maskapai    = $this->input->post('maskapai');
			$id_tc          = $this->input->post('nama_tc');
			$fee          = $this->input->post('fee');
			$persen          = $this->input->post('persen');

			$paramater = array(
				'tanggal' => $tanggal_issued, 
				'booking_code'   => $booking_code,
				'q'              => $q,
				'hpp'            => $hpp,
				'invoice'        => $invoice,
				'id_maskapai'    => $id_maskapai,
				'id_tc'          => $id_tc,
				'fee'          => $fee,
				'persen'          => $persen
				);
			

			$query = $this->penjualan->insert('penjualan', $paramater);
			var_dump($this->db->error()['code']);

			

		} else {
			$data['header']   = "Tambah Penjualan";
			$data['konfig']   = $this->penjualan->getAll('konfig')[0];
			$data['maskapai'] = $this->penjualan->getWhere('maskapai', array('status' => 'ACTIVE'));
			$data['tc']       = $this->penjualan->getWhere('tc', array('status' => 'ACTIVE'));

			$this->template->js_add('assets/jquerypriceformat/jquery.priceformat.min.js', 'import');
			$this->template->js_add('assets/js/penjualan.js', 'import');
			$this->template->js_add('count()', 'embed');
			$this->template->render('penjualan/v_tambah_penjualan', $data);
		}
		
	}


	public function edit_penjualan()
	{ 
		$data['header'] = "Edit Penjualan";


		$this->template->js_add('assets/jquerypriceformat/jquery.priceformat.min.js', 'import');
		$this->template->js_add('assets/js/penjualan.js', 'import');
		$this->template->js_add('count()', 'embed');
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