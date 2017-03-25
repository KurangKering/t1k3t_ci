<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master extends MY_Controller {
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
			$query = $this->master->insert('maskapai', $arr );
			$this->session->set_flashdata('pesan', tampil_pesan('success', 'Berhasil Menambah Data Maskapai'));
			redirect('master');
		}
	}

	public function edit_maskapai($id = null) 
	{
		$id_maskapai = $id;
		$data['maskapai'] = $this->master->getByID('maskapai',array('id_maskapai' => $id_maskapai ));
		$this->template->render('master/v_edit_maskapai', $data);
	}
	public function do_edit_maskapai()
	{
		if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
			show_404();
		}
		$id_maskapai = $this->input->post('id_maskapai');
		$result = $this->master->update_maskapai($id_maskapai);
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
		$result = $this->master->delete('maskapai', array('id_maskapai' => $id));
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
			$query = $this->master->insert('tc', $arr );
			$this->session->set_flashdata('pesan', tampil_pesan('success', 'Berhasil Menambah Data TC'));
			redirect('master');
		}
	}
	public function edit_tc($id = null) 
	{
		$id_tc = $id;
		$data['tc'] = $this->master->getByID('tc',array('id_tc' => $id_tc ));
		$this->template->render('master/v_edit_tc', $data);
	}
	public function do_edit_tc()
	{
		if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
			show_404();
		}
		$id_tc = $this->input->post('id_tc');
		$result = $this->master->update_tc($id_tc);
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
		$result = $this->master->delete('tc', array('id_tc' => $id));
		if ($this->db->error()['code'] == 1451) {
			echo 'Tidak dapat menghapus data master yang telah digunakan pada penjualan';
		}
		else
			redirect('master');
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
				$(\'#confirm-delete-maskapai\').on(\'show.bs.modal\', function(e) {
					$(this).find(\'.btn-ok\').attr(\'href\', $(e.relatedTarget).data(\'href\'));
				});
				$(\'#confirm-delete-tc\').on(\'show.bs.modal\', function(e) {
					$(this).find(\'.btn-ok\').attr(\'href\', $(e.relatedTarget).data(\'href\'));
				});
			} );'
			,'embed');
	}
}
/* End of file master.php */
/* Location: ./application/controllers/master.php */