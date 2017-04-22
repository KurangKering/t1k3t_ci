<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->render_js_lihat_master();
		$data['header']        = "Master Data";
		$data['data_maskapai'] = $this->Global_CRUD->get_data_all('maskapai');
		$data['data_tc']       = $this->Global_CRUD->get_data_all('tc');
		$this->template->render('master/v_data_master', $data);
	}
	public function tambah_maskapai() 
	{
		$this->template->render('master/v_tambah_maskapai');
	}
	public function do_tambah_maskapai() 
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|is_unique[maskapai.nama]',
			array('is_unique' => 'Nama maskapai sudah ada' ));
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan', tampil_pesan('error', form_error('nama')));
			redirect('master/tambah_maskapai');
		} else {
			$nama = $this->input->post('nama');
			$status = $this->input->post('status');
			$arr = array('nama' => $nama, 'status' => $status );
			$query = $this->Global_CRUD->insert_data('maskapai', $arr);
			$this->session->set_flashdata('pesan', tampil_pesan('success', 'Berhasil Menambah Data Maskapai'));
			redirect('master');
		}
	}
	public function edit_maskapai($id = null) 
	{
		$id_maskapai      = $id;
		$data['maskapai'] = $this->Global_CRUD->get_data_single('maskapai', array('id_maskapai' => $id_maskapai));
		$this->template->render('master/v_edit_maskapai', $data);
	}
	public function do_edit_maskapai()
	{
		if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
			show_404();
		}
		$id_maskapai = $this->input->post('id_maskapai');
		$nama        = $this->input->post('nama');
		$status      = $this->input->post('status');
		$result      = $this->Global_CRUD->update_data('maskapai', array('nama' => $nama, 'status' => $status), array('id_maskapai' => $id_maskapai));
		if ($result) {
			$this->session->set_flashdata('pesan', tampil_pesan('success', 'Berhasil Merubah data Maskapai'));
			redirect('master');
		}
		else
		{
			$this->session->set_flashdata('pesan', tampil_pesan('error', 'Maskapai telah ada'));
			redirect('master/edit_maskapai/'.$id_maskapai);
		}
	}
	public function hapus_maskapai($id = null) 
	{
		if ($id == null) {
			redirect('master');
		}
		$result = $this->Global_CRUD->delete_data('maskapai', array('id_maskapai' => $id));
		if ($this->db->error()['code']) {
			$this->session->set_flashdata('pesan', tampil_pesan('error', 'Data Maskapai Telah digunakan pada Transaksi Penjualan'));
			redirect('master');
		}
		else {
			$this->session->set_flashdata('pesan', tampil_pesan('success', 'Berhasil menghapus data maskapai'));
			redirect('master');
		}
	}
	public function tambah_tc() 
	{
		$this->template->render('master/v_tambah_tc');
	}
	public function do_tambah_tc() 
	{
		$this->form_validation->set_rules('nama', 'Nama TC', 'required|is_unique[tc.nama]',
			array('is_unique' => 'Nama tc sudah ada' ));
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan', tampil_pesan('error', form_error('nama')));
			redirect('master/tambah_tc');
		} else {
			$nama = $this->input->post('nama');
			$status = $this->input->post('status');
			$arr = array('nama' => $nama, 'status' => $status );
			$query = $this->Global_CRUD->insert_data('tc', $arr );
			$this->session->set_flashdata('pesan', tampil_pesan('success', 'Berhasil Menambah Data TC'));
			redirect('master');
		}
	}
	public function edit_tc($id = null) 
	{
		$id_tc = $id;
		$data['tc'] = $this->Global_CRUD->get_data_single('tc', array('id_tc' => $id_tc));
		$this->template->render('master/v_edit_tc', $data);
	}
	public function do_edit_tc()
	{
		if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
			show_404();
		}
		$id_tc  = $this->input->post('id_tc');
		$nama   = $this->input->post('nama');
		$status = $this->input->post('status');
		$result = $this->Global_CRUD->update_data('tc', array('nama' => $nama, 'status' => $status), array('id_tc' => $id_tc));
		if ($result) {
			$this->session->set_flashdata('pesan', tampil_pesan('success', 'Berhasil Merubah data tc'));
			redirect('master');
		}
		else
		{
			$this->session->set_flashdata('pesan', tampil_pesan('error', 'tc telah ada'));
			redirect('master/edit_tc/'.$id_tc);
		}
	}
	public function hapus_tc($id = null) 
	{
		if ($id == null) {
			redirect('master');
		}
		$result = $this->Global_CRUD->delete_data('tc', array('id_tc' => $id));
		if ($this->db->error()['code']) {
			$this->session->set_flashdata('pesan', tampil_pesan('error', 'Data Maskapai Telah digunakan pada Transaksi Penjualan'));
			redirect('master');
		}
		else
		{
			$this->session->set_flashdata('pesan', tampil_pesan('success', 'Berhasil menghapus data maskapai'));
			redirect('master');
		}
	}
	private function render_js_lihat_master() 
	{
		$this->template->css_add('assets/template/adminLTE/plugins/datatables/dataTables.bootstrap.css');
		$this->template->css_add('assets/template/adminLTE/plugins/datatables/extensions/FixedColumns/css/dataTables.fixedColumns.min.css');
		$this->template->js_add('assets/template/adminLTE/plugins/datatables/jquery.dataTables.min.js');
		$this->template->js_add('assets/template/adminLTE/plugins/datatables/dataTables.bootstrap.min.js');
		$this->template->js_add('assets/template/adminLTE/plugins/datatables/extensions/FixedColumns/js/dataTables.fixedColumns.min.js');
		$this->template->js_add('
			//$(document).ready(function() {
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
				$(\'#confirm-delete-maskapai\').on(\'show.bs.modal\', function(e) {
					$(this).find(\'.btn-ok\').attr(\'href\', $(e.relatedTarget).data(\'href\'));
				});
				$(\'#confirm-delete-tc\').on(\'show.bs.modal\', function(e) {
					$(this).find(\'.btn-ok\').attr(\'href\', $(e.relatedTarget).data(\'href\'));
				});
			//} );'
			,'embed');
	}
}
/* End of file master.php */
/* Location: ./application/controllers/master.php */