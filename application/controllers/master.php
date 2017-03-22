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
		$this->render_js();
		$data['data_maskapai'] = $this->master->getAll('maskapai');
		$data['data_tc']       = $this->master->getAll('tc');
		$this->template->render('master/v_data_master', $data);
	}
	public function tambah_maskapai() 
	{
		$this->form_validation->set_rules('nama', 'Nama Maskapai', 'required|is_unique[maskapai.nama]',
			array('is_unique' => 'Nama Maskapai Sudah Ada'));
		if ($this->form_validation->run()) {
			$nama = $this->input->post('nama');
			$status = $this->input->post('status');
			$this->session->set_flashdata('status', 'Sukses');
			$arr = array('nama' => $nama, 'status' => $status );
			$query = $this->master->insert('maskapai', $arr );
			redirect('master');
		} else {
			$this->template->render('master/v_tambah_maskapai');
		}
	}
	public function edit_maskapai($id)
	{
		$this->form_validation->set_rules('nama', 'Nama Maskapai', 'required');
		if ($this->form_validation->run()) {
			$nama = $this->input->post('nama');
			$status = $this->input->post('status');
			$arr = array('nama' => $nama, 'status' => $status );
			$this->master->update('maskapai', $arr, array('id_maskapai' => $id));
			redirect('master');
		} else {
			$data['maskapai'] = $this->master->getByID('maskapai',array('id_maskapai' => $id ));
			$this->template->render('master/v_edit_maskapai', $data);
		}
	}

	public function hapus_maskapai($id) 
	{

	}
	public function tambah_tc() 
	{
		$this->form_validation->set_rules('nama', 'Nama tc', 'required|is_unique[tc.nama]',
			array('is_unique' => 'Nama tc Sudah Ada'));
		if ($this->form_validation->run()) {
			$nama = $this->input->post('nama');
			$status = $this->input->post('status');
			$this->session->set_flashdata('status', 'Sukses');
			$arr = array('nama' => $nama, 'status' => $status );
			$query = $this->master->insert('tc', $arr );
			redirect('master');
		} else {
			$this->template->render('master/v_tambah_tc');
		}
	}
	public function edit_tc($id)
	{
		$this->form_validation->set_rules('nama', 'Nama tc', 'required');
		if ($this->form_validation->run()) {
			$nama = $this->input->post('nama');
			$status = $this->input->post('status');
			$arr = array('nama' => $nama, 'status' => $status );
			$this->master->update('tc', $arr, array('id_tc' => $id));
			redirect('master');
		} else {
			$data['tc'] = $this->master->getByID('tc',array('id_tc' => $id ));
			$this->template->render('master/v_edit_tc', $data);
		}
	}
	public function hapus_tc($id) 
	{

	}
	private function render_js() 
	{
		$this->template->css_add('assets/template/adminLTE/plugins/datatables/dataTables.bootstrap.css');
		$this->template->css_add('assets/template/adminLTE/plugins/datatables/extensions/FixedColumns/css/dataTables.fixedColumns.min.css');
		$this->template->js_add('assets/template/adminLTE/plugins/datatables/jquery.dataTables.min.js');
		$this->template->js_add('assets/template/adminLTE/plugins/datatables/dataTables.bootstrap.min.js');
		$this->template->js_add('assets/template/adminLTE/plugins/datatables/extensions/FixedColumns/js/dataTables.fixedColumns.min.js');
		$this->template->js_add('
			$(document).ready(function() {
				var t = $("#table-maskapai").DataTable( {
					"columnDefs": [ {
						"searchable": false,
						"orderable": false,
						"targets": 0,
					} ],
					"searching": false,
					"pageLength": 5,
					"bLengthChange": false,
					"order": [[ 1, "asc" ]]
				} );
				t.on( "order.dt search.dt", function () {
					t.column(0, {search:"applied", order:"applied"}).nodes().each( function (cell, i) {
						cell.innerHTML = i+1;
					} );
				} ).draw();
				var y = $("#table-tc").DataTable( {
					"columnDefs": [ {
						"searchable": false,
						"orderable": false,
						"targets": 0
					} ],
					"searching": false,
					"pageLength": 5,
					"bLengthChange": false,
					"order": [[ 1, "asc" ]]
				} );
				y.on( "order.dt search.dt", function () {
					y.column(0, {search:"applied", order:"applied"}).nodes().each( function (cell, i) {
						cell.innerHTML = i+1;
					} );
				} ).draw();
			} );'
			,'embed');
	}
}
/* End of file master.php */
/* Location: ./application/controllers/master.php */