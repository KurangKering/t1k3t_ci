<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Penjualan extends MY_Controller {
	var $table = 'view_penjualan';
	public function __construct()
	{
		parent::__construct();

	}
	public function index()
	{
		redirect('penjualan/lihat_penjualan/');
	}
	public function lihat_penjualan($id_maskapai = null)
	{
		$data['isAdmin'] = $this->isAdmin;
		
		$where;
		if ($id_maskapai == 0 || $id_maskapai == null) {
			$where = array();
		}
		else
		{
			$where = array('id_maskapai' => $id_maskapai);
		}
		$data['no_maskapai'] = $id_maskapai;
		$data['header']      = "Data Penjualan";
		$data['penjualan']   = $this->Global_CRUD->get_data_where('view_penjualan', $where);
		$data['maskapai']    = $this->Global_CRUD->get_data_all('maskapai');
		$this->render_js_lihat_penjualan();
		$this->template->render('penjualan/v_penjualan', $data);
	}
	public function tambah_penjualan()
	{
		if (!$this->isAdmin) {
			redirect('penjualan/lihat_penjualan','refresh');
		}
		$data['header']   = "Tambah Penjualan";
		$data['konfig']   = $this->Global_CRUD->get_data_all('konfig')[0];
		$data['maskapai'] = $this->Global_CRUD->get_data_where('maskapai', array('status' => 'ACTIVE'));
		$data['tc']       = $this->Global_CRUD->get_data_where('tc', array('status' => 'ACTIVE'));
		$this->template->js_add('assets/template/adminLTE/plugins/input-mask/jquery.inputmask.js');
		$this->template->js_add('assets/template/adminLTE/plugins/input-mask/jquery.inputmask.date.extensions.js');
		$this->template->js_add('assets/template/adminLTE/plugins/input-mask/jquery.inputmask.extensions.js');
		$this->template->js_add('assets/js/penjualan.js', 'import');
		$this->template->render('penjualan/v_tambah_penjualan', $data);
	}
	public function do_tambah_penjualan()
	{
		if (!$this->isAdmin) {
			redirect('penjualan/lihat_penjualan','refresh');
		}
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
		$fee            = $this->input->post('fee');
		$persen         = $this->input->post('persen');
		$paramater      = array(
			'tanggal'      => $tanggal_issued,
			'booking_code' => $booking_code,
			'q'            => $q,
			'hpp'          => $hpp,
			'invoice'      => $invoice,
			'id_maskapai'  => $id_maskapai,
			'id_tc'        => $id_tc,
			'fee'          => $fee,
			'persen'       => $persen
			);
		$query = $this->Global_CRUD->insert_data('penjualan', $paramater);
		if ($this->db->error()['code'] == 1062) {
			$this->session->set_flashdata('pesan', tampil_pesan('error', 'Duplikat Data Booking Code terdeteksi'));
			redirect('penjualan/tambah_penjualan');
		}
		else if ($query){
			$this->session->set_flashdata('pesan', tampil_pesan('success', 'Berhasil menambah data Penjualan'));
			redirect('penjualan/lihat_penjualan/');
		}
	}
	public function edit_penjualan($id)
	{
		if (!$this->isAdmin) {
			redirect('penjualan/lihat_penjualan','refresh');
		}
		$data['header']    = "Edit Penjualan";
		$data['maskapai']  = $this->Global_CRUD->get_data_all('maskapai');
		$data['konfig']    = $this->Global_CRUD->get_data_all('konfig')[0];
		$data['penjualan'] = $this->Global_CRUD->get_data_single('view_penjualan', array('booking_code' => $id));
		$data['tc']        = $this->Global_CRUD->get_data_where('tc', array('status' => 'ACTIVE'));
		$this->template->js_add('assets/template/adminLTE/plugins/input-mask/jquery.inputmask.js');
		$this->template->js_add('assets/template/adminLTE/plugins/input-mask/jquery.inputmask.date.extensions.js');
		$this->template->js_add('assets/template/adminLTE/plugins/input-mask/jquery.inputmask.extensions.js');
		$this->template->js_add('assets/js/penjualan.js', 'import');
		$this->template->render('penjualan/v_edit_penjualan', $data);
	}
	public function do_edit_penjualan()
	{
		if (!$this->isAdmin) {
			redirect('penjualan/lihat_penjualan','refresh');
		}
		if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
			show_404();
		}
		$booking_code_asal = $this->input->post('booking_code_asal');
		$booking_code      = $this->input->post('booking_code');
		$tanggal_issued    = $this->input->post('tanggal');
		$q                 = ekstrak_angka($this->input->post('q'));
		$hpp               = ekstrak_angka($this->input->post('hpp'));
		$invoice           = ekstrak_angka($this->input->post('invoice'));
		$id_maskapai       = $this->input->post('maskapai');
		$id_tc             = $this->input->post('nama_tc');
		$parameter         = array(
			'tanggal'      => $tanggal_issued,
			'booking_code' => $booking_code,
			'q'            => $q,
			'hpp'          => $hpp,
			'invoice'      => $invoice,
			'id_maskapai'  => $id_maskapai,
			'id_tc'        => $id_tc
			);
		$result = $this->Global_CRUD->update_data('penjualan', $parameter, array('booking_code' => $booking_code_asal));
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
		if (!$this->isAdmin) {
			redirect('penjualan/lihat_penjualan','refresh');
		}
		if ($id == null) {
			redirect('master');
		}
		$result = $this->Global_CRUD->delete_data('penjualan', array('booking_code' => $id));
		if ($this->db->error()['code']) {
			$this->session->set_flashdata('pesan', tampil_pesan('error', 'Gagal Menghapus data Penjualan'));
			redirect('penjualan');
		}
		else if ($result){
			$this->session->set_flashdata('pesan', tampil_pesan('success', 'Berhasil menghapus data Penjualan'));
			redirect('penjualan/lihat_penjualan/0');
		}
	}
	private function render_js_lihat_penjualan()
	{
		
		$btn_action = '';
		if ($this->isAdmin) {
			$btn_action = '{ width: \'60px\', targets: 16, sClass: "text-center" }';
		}

		$this->template->css_add('assets/datatables/media/css/dataTables.bootstrap.min.css');
		$this->template->css_add('assets/datatables/extensions/FixedColumns/css/fixedColumns.bootstrap.min.css');
		$this->template->js_add('assets/datatables/media/js/jquery.dataTables.min.js');
		$this->template->js_add('assets/datatables/media/js/dataTables.bootstrap.min.js');
		$this->template->js_add('assets/datatables/extensions/FixedColumns/js/dataTables.fixedColumns.min.js');
		$this->template->js_add('
			//$(function () {
			var table_penjualan = $("#table_penjualan").DataTable({
				"order": [[2, \'desc\']],
				"scrollX": true,
				fixedColumns: {
					leftColumns: 1,
					rightColumns: 2,
				},
				autoWidth: false,
				columnDefs: [
				{ width: \'100px\', targets: 0 , sClass: "text-center"},
				{ width: \'100px\', targets: 1 },
				{ width: \'100px\', targets: 2 },
				{ width: \'100px\', targets: 3 },
				{ width: \'100px\', targets: 4 },
				{ width: \'100px\', targets: 5 },
				{ width: \'100px\', targets: 6 },
				{ width: \'100px\', targets: 7 },
				{ width: \'100px\', targets: 8 },
				{ width: \'100px\', targets: 9 },
				{ width: \'100px\', targets: 10 },
				{ width: \'100px\', targets: 11 },
				{ width: \'100px\', targets: 12 },
				{ width: \'100px\', targets: 13 },
				{ width: \'100px\', targets: 14 },
				{ width: \'100px\', targets: 15 },'.
				$btn_action .'
				],
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
			//});
			', 'embed');
	}
	public function grafik_penjualan($tahun = null, $id_maskapai = null)
	{
		if ($tahun == null) {
			$tahun = date('Y');
		}
		$data_grafik             = $this->Global_CRUD->get_data_grafik($tahun, $id_maskapai);
		$data_grafik['tahun']    = $tahun;
		$data_grafik['maskapai'] = "Semua Maskapai";
		if ($id_maskapai > 0 ) {
			$data_grafik['maskapai'] = 'Maskapai ' . $this->Global_CRUD->get_data_single('maskapai', array('id_maskapai' => $id_maskapai))->nama;
		}
		$data['options'] = $this->Global_CRUD->get_option_grafik();
		$graph           = $this->generate_bar($data_grafik);
		$this->template->css_add('assets/highcharts/css/highcharts.css');
		$this->template->js_add('assets/highcharts/highcharts.js');
		$this->template->js_add('assets/highcharts/js/modules/exporting.js');
		$this->template->js_add('assets/highcharts/js/modules/offline-exporting.js');
		$this->template->js_add($graph, 'embed');
		$this->template->js_add('
			$(function(){
				function updatebuttongrafik() {
					if (verify()) {
						$(\'#btn-grafik\').prop(\'disabled\', \'\');
					} else {
						$(\'#btn-grafik\').prop(\'disabled\', \'disabled\');
					}
				}
				function verify() {
					if ($(\'#select-tahun\').val() != "" && $(\'#select-maskapai\').val() != "") {
						return true;
					} else {
						return false
					}
				}
				$(\'#select-tahun\').change(updatebuttongrafik);
				$(\'#select-maskapai\').change(updatebuttongrafik);
			});
			$(\'#btn-grafik\').click(function () {
				var tahun = $(\'#select-tahun\').val() == null ? new Date().getFullYear() : $(\'#select-tahun\').val();
				var id_maskapai = $(\'#select-maskapai\').val() == null ? "0" : $(\'#select-maskapai\').val();
				window.location ="'.base_url('penjualan/grafik_penjualan/').'" + tahun +"/"+ id_maskapai;
			})
			$(\'#dynamic_select\').on(\'change\', function () {
				var url = $(this).val(); // get selected value
				if (url) { // require a URL
					window.location = url;
				}
				return false;
			});
			', 'embed');
		$this->template->render('penjualan/v_grafik_penjualan', $data);
	}
	private function generate_bar($data)
	{
		$js = '
		var highchart=  Highcharts.chart({
			chart: {
				renderTo: \'chart-penjualan\',
				type: \'line\',
			},
			title: {
				text: \'Grafik Penjualan Tiket Tahun '. $data['tahun'] . '\',
				x: -20
			},
			subtitle: {
				text: \''.$data['maskapai'].'\',
				x: -20
			},
			xAxis: {
				categories:  ' . json_encode($data['bulan']) . '
			},
			yAxis: {
				title: {
					text: \'Penjualan\'
				}
			},
			series: [{
				name: \'Jumlah Transaksi\',
				data: ' . json_encode($data['jumlah']) . '
			}]
		});
		';
		return $js;
	}
	
}
/* End of file penjualan.php */
/* Location: ./application/controllers/penjualan.php */