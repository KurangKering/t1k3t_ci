<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends MY_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_data_grafik($tahun, $id_maskapai)
	{
		$sql = 'SELECT bulan.nama_bulan, count(view_penjualan.booking_code) jumlah from bulan LEFT JOIN view_penjualan ON ( bulan.id_bulan = MONTH(view_penjualan.tanggal)  AND id_maskapai = ? AND YEAR(tanggal) =  ?) GROUP BY bulan.nama_bulan, MONTH(tanggal) ORDER BY bulan.id_bulan';

		$chart = false;
		$result = $this->db->query($sql, array($id_maskapai, $tahun));
		if ($result->num_rows() > 0 ) {
			foreach ($result->result_array() as $barbar) {
				$chart[] = array($barbar['nama_bulan'], $barbar['jumlah']);
			}
		}

		return json_encode($chart);
		
	}

}

/* End of file M_dashboard.php */
/* Location: ./application/models/M_dashboard.php */