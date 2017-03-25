<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Penjualan extends MY_Controller {
	var $table = 'view_penjualan';
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_penjualan', 'penjualan');
	}
	public function index()
	{
		redirect('penjualan/lihat_penjualan/');
	}
	public function lihat_penjualan($id_maskapai = null) 
	{
		if ($id_maskapai == 0 || $id_maskapai == null) {
			$where = array();
		}
		else
			$where = array('id_maskapai' => $id_maskapai);
		$data['no_maskapai'] = $id_maskapai;
		$data['header']      = "Data Penjualan";
		$data['penjualan']   = $this->penjualan->getWhere($this->table, $where);
		$data['maskapai']    = $this->penjualan->getAll('maskapai');
		$this->render_js();
		$this->template->render('penjualan/v_penjualan', $data);
	}
	// public function tambah_penjualan() 
	// {
	// 	$submit = $this->input->post('simpan');
	// 	$this->form_validation->set_rules('q', 'Q', 'trim|required');
	// 	if ($this->form_validation->run()) {
	// 		$tanggal_issued = $this->input->post('tanggal');
	// 		$booking_code   = $this->input->post('booking_code');
	// 		$q              = $this->input->post('q');
	// 		$hpp            = ekstrak_angka($this->input->post('hpp'));
	// 		$invoice        = ekstrak_angka($this->input->post('invoice'));
	// 		$id_maskapai    = $this->input->post('maskapai');
	// 		$id_tc          = $this->input->post('nama_tc');
	// 		$fee          = $this->input->post('fee');
	// 		$persen          = $this->input->post('persen');
	// 		$paramater = array(
	// 			'tanggal' => $tanggal_issued, 
	// 			'booking_code'   => $booking_code,
	// 			'q'              => $q,
	// 			'hpp'            => $hpp,
	// 			'invoice'        => $invoice,
	// 			'id_maskapai'    => $id_maskapai,
	// 			'id_tc'          => $id_tc,
	// 			'fee'          => $fee,
	// 			'persen'          => $persen
	// 			);
	// 		$query = $this->penjualan->insert('penjualan', $paramater);
	// 		if ($this->db->error()['code'] == 1062) {
	// 			echo 'Data Sudah ada duplikat nya ';
	// 			redirect('penjualan/tambah_penjualan');
	// 		}
	// 		else
	// 			redirect('penjualan');
	// 	} else {
	// 		$data['header']   = "Tambah Penjualan";
	// 		$data['konfig']   = $this->penjualan->getAll('konfig')[0];
	// 		$data['maskapai'] = $this->penjualan->getWhere('maskapai', array('status' => 'ACTIVE'));
	// 		$data['tc']       = $this->penjualan->getWhere('tc', array('status' => 'ACTIVE'));
	// 		$this->template->js_add('assets/template/adminLTE/plugins/input-mask/jquery.inputmask.js');
	// 		$this->template->js_add('assets/template/adminLTE/plugins/input-mask/jquery.inputmask.date.extensions.js');
	// 		$this->template->js_add('assets/template/adminLTE/plugins/input-mask/jquery.inputmask.extensions.js');
	// 		$this->template->js_add('assets/jquerypriceformat/jquery.priceformat.min.js', 'import');
	// 		$this->template->js_add('assets/js/penjualan.js', 'import');
	// 		$this->template->render('penjualan/v_tambah_penjualan', $data);
	// 	}
	// }
	public function tambah_penjualan() 
	{
		$data['header']   = "Tambah Penjualan";
		$data['konfig']   = $this->penjualan->getAll('konfig')[0];
		$data['maskapai'] = $this->penjualan->getWhere('maskapai', array('status' => 'ACTIVE'));
		$data['tc']       = $this->penjualan->getWhere('tc', array('status' => 'ACTIVE'));
		$this->template->js_add('assets/template/adminLTE/plugins/input-mask/jquery.inputmask.js');
		$this->template->js_add('assets/template/adminLTE/plugins/input-mask/jquery.inputmask.date.extensions.js');
		$this->template->js_add('assets/template/adminLTE/plugins/input-mask/jquery.inputmask.extensions.js');
		$this->template->js_add('assets/jquerypriceformat/jquery.priceformat.min.js', 'import');
		$this->template->js_add('assets/js/penjualan.js', 'import');
		$this->template->render('penjualan/v_tambah_penjualan', $data);
	}
	public function do_tambah_penjualan()
	{
		if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
			show_404();
		}
		$tanggal_issued = $this->input->post('tanggal');
		$booking_code   = $this->input->post('booking_code');
		$q              = ekstrak_angka($this->input->post('q'));
		$hpp            = ekstrak_angka($this->input->post('hpp'));
		$invoice        = ekstrak_angka($this->input->post('invoice'));
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
		if ($this->db->error()['code'] == 1062) {
			$this->session->set_flashdata('pesan', tampil_pesan('error', 'Duplikat Data Booking Code terdeteksi'));
			redirect('penjualan/tambah_penjualan');
		}
		else if ($query){
			$this->session->set_flashdata('pesan', tampil_pesan('success', 'Berhasil menambah data Penjualan')); 
			redirect('penjualan/lihat_penjualan/');
		}
	}
	// public function edit_penjualan($id = null)
	// { 
	// 	if ($id == null) {
	// 		show_404();
	// 	}
	// 	$this->form_validation->set_rules('q', 'Q', 'trim|required');
	// 	if ($this->form_validation->run()) {
	// 		$booking_code = $this->input->post('booking_code');
	// 		$tanggal_issued = $this->input->post('tanggal');
	// 		$q              = $this->input->post('q');
	// 		$hpp            = ekstrak_angka($this->input->post('hpp'));
	// 		$invoice        = ekstrak_angka($this->input->post('invoice'));
	// 		$id_maskapai    = $this->input->post('maskapai');
	// 		$id_tc          = $this->input->post('nama_tc');
	// 		$parameter = array(
	// 			'tanggal' => $tanggal_issued, 
	// 			'booking_code'   => $booking_code,
	// 			'q'              => $q,
	// 			'hpp'            => $hpp,
	// 			'invoice'        => $invoice,
	// 			'id_maskapai'    => $id_maskapai,
	// 			'id_tc'          => $id_tc
	// 			);
	// 		$result = $this->penjualan->update('penjualan', $parameter, array('booking_code' => $id));
	// 		if ($this->db->error()['code'] == 1062) {
	// 			echo 'Data Sudah ada duplikat nya ';
	// 			// redirect('penjualan');
	// 		}
	// 		else
	// 			redirect('penjualan');
	// 	} else {
	// 		$data['header']    = "Edit Penjualan";
	// 		$data['maskapai']  = $this->penjualan->getAll('maskapai');
	// 		$data['konfig']    = $this->penjualan->getAll('konfig')[0];
	// 		$data['penjualan'] = $this->penjualan->getByID('view_penjualan', array('booking_code' => $id));
	// 		$data['tc']        = $this->penjualan->getWhere('tc', array('status' => 'ACTIVE'));
	// 		$this->template->js_add('assets/template/adminLTE/plugins/input-mask/jquery.inputmask.js');
	// 		$this->template->js_add('assets/template/adminLTE/plugins/input-mask/jquery.inputmask.date.extensions.js');
	// 		$this->template->js_add('assets/template/adminLTE/plugins/input-mask/jquery.inputmask.extensions.js');
	// 		$this->template->js_add('assets/jquerypriceformat/jquery.priceformat.min.js', 'import');
	// 		$this->template->js_add('assets/js/penjualan.js', 'import');
	// 		$this->template->render('penjualan/v_tambah_penjualan', $data);
	// 	}
	// }
	// 
	public function edit_penjualan($id)
	{
		$data['header']    = "Edit Penjualan";
		$data['maskapai']  = $this->penjualan->getAll('maskapai');
		$data['konfig']    = $this->penjualan->getAll('konfig')[0];
		$data['penjualan'] = $this->penjualan->getByID('view_penjualan', array('booking_code' => $id));
		$data['tc']        = $this->penjualan->getWhere('tc', array('status' => 'ACTIVE'));
		$this->template->js_add('assets/template/adminLTE/plugins/input-mask/jquery.inputmask.js');
		$this->template->js_add('assets/template/adminLTE/plugins/input-mask/jquery.inputmask.date.extensions.js');
		$this->template->js_add('assets/template/adminLTE/plugins/input-mask/jquery.inputmask.extensions.js');
		$this->template->js_add('assets/jquerypriceformat/jquery.priceformat.min.js', 'import');
		$this->template->js_add('assets/js/penjualan.js', 'import');
		$this->template->render('penjualan/v_edit_penjualan', $data);
	}
	public function do_edit_penjualan()
	{
		if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
			show_404();
		}
		$booking_code_asal = $this->input->post('booking_code_asal');
		$booking_code = $this->input->post('booking_code');
		$tanggal_issued = $this->input->post('tanggal');
		$q              = ekstrak_angka($this->input->post('q'));
		$hpp            = ekstrak_angka($this->input->post('hpp'));
		$invoice        = ekstrak_angka($this->input->post('invoice'));
		$id_maskapai    = $this->input->post('maskapai');
		$id_tc          = $this->input->post('nama_tc');
		$parameter = array(
			'tanggal' => $tanggal_issued, 
			'booking_code'   => $booking_code,
			'q'              => $q,
			'hpp'            => $hpp,
			'invoice'        => $invoice,
			'id_maskapai'    => $id_maskapai,
			'id_tc'          => $id_tc
			);
		$result = $this->penjualan->update('penjualan', $parameter, array('booking_code' => $booking_code_asal));
		if ($this->db->error()['code'] == 1062) {
			$this->session->set_flashdata('pesan', tampil_pesan('error', 'Duplikat Data Booking Code terdeteksi'));
			redirect('penjualan/edit_penjualan/'.$booking_code_asal);
		}
		else if ($result){
			$this->session->set_flashdata('pesan', tampil_pesan('success', 'Berhasil Merubah data Penjualan')); 
			redirect('penjualan/lihat_penjualan/');
		}
	}
	public function hapus_penjualan($id)
	{
		if ($id == null) {
			redirect('master');
		}
		$result = $this->penjualan->delete('penjualan', array('booking_code' => $id));
		if ($this->db->error()['code']) {
			$this->session->set_flashdata('pesan', tampil_pesan('error', 'Gagal Menghapus data Penjualan'));
			redirect('penjualan');
		}
		else if ($result){
			$this->session->set_flashdata('pesan', tampil_pesan('success', 'Berhasil menghapus data Penjualan'));
			redirect('penjualan/lihat_penjualan/0');
		}
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
				$(\'#dynamic_select\').on(\'change\', function () {
					var url = $(this).val(); // get selected value
					if (url) { // require a URL
						window.location = url; 
					}
					return false;
				});
				$(\'#confirm-delete-penjualan\').on(\'show.bs.modal\', function(e) {
					$(this).find(\'.btn-ok\').attr(\'href\', $(e.relatedTarget).data(\'href\'));
				});
			});
			', 'embed');
	}
}
/* End of file penjualan.php */
/* Location: ./application/controllers/penjualan.php */