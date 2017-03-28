<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Global_CRUD extends MY_Model {

	public function __construct()
	{
		parent::__construct();
		
	}


	public function get_data_grafik($tahun, $id_maskapai)
	{
		$maskapai_selected = '';
		if ($id_maskapai > 0 ) {
			$maskapai_selected = 'AND id_maskapai = ' . $id_maskapai ;
			
		}
		$sql = 'SELECT bulan.nama_bulan, count(view_penjualan.booking_code) jumlah from bulan LEFT JOIN view_penjualan ON ( bulan.id_bulan = MONTH(view_penjualan.tanggal) '. $maskapai_selected.' AND YEAR(tanggal) =  ?) GROUP BY bulan.nama_bulan, MONTH(tanggal) ORDER BY bulan.id_bulan';
		$result = $this->db->query($sql, array($tahun));
		if ($result->num_rows() > 0 ) {
			foreach ($result->result_array() as $barbar) {
				$chart['bulan'][] = $barbar['nama_bulan'];
				$chart['jumlah'][] = (int) $barbar['jumlah'];
			}
		}

		return $chart;
		
	}

	public function get_option_grafik()
	{
		$data['tahun'] = array();
		$result_tahun= $this->db->query("SELECT distinct(YEAR(tanggal)) tahun from view_penjualan order by tanggal");
		if ($result_tahun->num_rows() > 0 ) {
			foreach ($result_tahun->result() as $tahun) {
				$data['tahun'][] = $tahun->tahun;
			}
		}

		$data['maskapai'] = array();
		$result_maskapai= $this->db->query("SELECT maskapai.id_maskapai, view_penjualan.nama_maskapai from maskapai inner join view_penjualan on view_penjualan.id_maskapai = maskapai.id_maskapai group by id_maskapai order by maskapai.nama");
		if ($result_maskapai->num_rows() > 0 ) {
			foreach ($result_maskapai->result_array() as $maskapai) {
				$data['maskapai'][] = $maskapai;
			}
		}
		return $data;
	}
}

/* End of file M_Global_CRUD.php */
/* Location: ./application/models/M_Global_CRUD.php */