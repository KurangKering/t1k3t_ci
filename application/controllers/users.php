<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!$this->isAdmin) {
			redirect('penjualan/lihat_penjualan','refresh');
		}
	}

	public function index()
	{
		redirect('users/lihat_users');
	}

	public function lihat_users()
	{

		$data['users'] = $this->Global_CRUD->get_data_all('user');
		$this->render_js_users();
		$this->template->render('users/vw_lihat_users', $data);
	}


	public function tambah_users()
	{

		$this->template->render('users/vw_tambah_users');
	}

	public function do_tambah_users()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]',
			array('is_unique' => 'Username sudah ada yang menggunakan' ));
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan', tampil_pesan('error', form_error('username')));
			redirect('users/tambah_users');
		}

		else {
			$username = $this->input->post('username');
			$pass      = $this->input->post('pass');
			$pass_conf = $this->input->post('pass_conf');
			$role_name = $this->input->post('role_name');

			if ($pass) {
				if ($pass_conf) {
					if ($pass != $pass_conf) {
						$this->session->set_flashdata('pesan', $this->session->flashdata('pesan') . tampil_pesan('error', 'Password confirmation tidak sama'));
						redirect('users/tambah_users');
					}
					else
					{
						$container = array(
							'username' => $username,
							'password' => $pass,
							'role_name' => $role_name
							);

						$this->Global_CRUD->insert_data('user', $container);
						$this->session->set_flashdata('pesan', $this->session->flashdata('pesan') . tampil_pesan('success', 'Berhasil Menambah Users Baru'));
						redirect('users/lihat_users');
					}
				}
				else {
					$this->session->set_flashdata('pesan', $this->session->flashdata('pesan') . tampil_pesan('error', 'Password confirmation harus diisi'));
					redirect('users/tambah_users');

				}
			}
			else if ($new_pass_conf)
			{
				$this->session->set_flashdata('pesan', $this->session->flashdata('pesan') . tampil_pesan('error', 'Password harus diisi'));
				redirect('users/tambah_users');

			}
		}


	}

	public function edit_users($id = null)
	{
		if ($id == null) {
			show_404();
		}
		$data['user'] = $this->Global_CRUD->get_data_single('user', array('id' => $id));
		$this->template->render('users/vw_edit_users', $data);

	}

	public function do_edit_users()
	{
		if ($this->input->post()) {
			$id            = $this->input->post('id');
			$new_pass      = $this->input->post('new_pass');
			$new_pass_conf = $this->input->post('new_pass_confirm');
			$role_name     = $this->input->post('role_name');
			// var_dump($this->input->post());
			// exit();
			$sql = 'UPDATE user SET role_name = ? ';
			$parameter = array($role_name);
			if ($new_pass) {
				if ($new_pass_conf) {
					if ($new_pass != $new_pass_conf) {
						$this->session->set_flashdata('pesan', $this->session->flashdata('pesan') . tampil_pesan('error', 'Password confirmation tidak sama'));
						redirect('users/edit_users/'.$id);
					}
					else
					{
						$sql .= ', password = ? ';
						array_push($parameter, $new_pass);
					}
				}
				else {
					$this->session->set_flashdata('pesan', $this->session->flashdata('pesan') . tampil_pesan('error', 'Password confirmation harus diisi'));
					redirect('users/edit_users/'.$id);
				}
			}
			else if ($new_pass_conf)
			{
				$this->session->set_flashdata('pesan', $this->session->flashdata('pesan') . tampil_pesan('error', 'Password harus diisi'));
				redirect('users/edit_users/'.$id);
			}
			$sql .= 'WHERE  id = ?';
			array_push($parameter, $id);
			
			$query = $this->db->query($sql, $parameter);
			$this->session->set_flashdata('pesan', $this->session->flashdata('pesan') . tampil_pesan('success', 'Berhasil Merubah Data User'));
			redirect('users/lihat_users');

		}
	}

	public function hapus_users($id)
	{
		if ($id == null) {
			redirect('users');
		}
		$result = $this->Global_CRUD->delete_data('user', array('id' => $id));
		if ($this->db->error()['code']) {
			$this->session->set_flashdata('pesan', tampil_pesan('error', 'Gagal Menghapus data User'));
			redirect('users');
		}
		else if ($result){
			$this->session->set_flashdata('pesan', tampil_pesan('success', 'Berhasil menghapus data User'));
			redirect('users/lihat_users');
		}
	}



	private function render_js_users()
	{

		$this->template->css_add('assets/datatables/media/css/dataTables.bootstrap.min.css');
		$this->template->js_add('assets/datatables/media/js/jquery.dataTables.min.js');
		$this->template->js_add('assets/datatables/media/js/dataTables.bootstrap.min.js');
		$this->template->js_add('
			//$(function () {
			var table_users = $("#table_users").DataTable({

				autoWidth: false,
				columnDefs: [
				{ width: \'100px\', targets: 0 , sClass: "text-center"},
				{ width: \'100px\', targets: 1 },
				{ width: \'100px\', targets: 2 },
				{ width: \'100px\', targets: 3 },

				],
			});

			$(\'#dynamic_select\').on(\'change\', function () {
				var url = $(this).val(); // get selected value
				if (url) { // require a URL
					window.location = url;
				}
				return false;
			});
			$(\'#confirm-delete-users\').on(\'show.bs.modal\', function(e) {
				$(this).find(\'.btn-ok\').attr(\'href\', $(e.relatedTarget).data(\'href\'));
			});
			//});
			', 'embed');

	}



}

/* End of file users.php */
/* Location: ./application/controllers/users.php */