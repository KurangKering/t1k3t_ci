<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends MY_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}


	public function getLaporan($tahun, $bulan)
	{

		$sql = 'SELECT YEAR(tanggal) Tahun, MONTH(tanggal) Bulan, nama_maskapai, tanggal, SUM(jumlah) jumlah from view_penjualan WHERE YEAR(tanggal) = ? and MONTH(tanggal) = ? group by tanggal, id_maskapai order by tanggal asc' ;
		$result = $this->db->query($sql, array($tahun, $bulan));
		if ($result->num_rows() > 0 ) {
		return $result->result_array();
		}

		// $sql2 = 'SELECT sum(jumlah) total from view_penjualan where YEAR(tanggal) = ? AND MONTH(tanggal) = ?';
		// $result2 = $this->db->query($sql2, array($tahun, $bulan));
		// $total_bulanan = $result2->row();

		// if ($data_laporan) {
		// 	$arr3 = array('data' => $data_laporan, 'total' => $total_bulanan);
			
		// 	return $arr3;
		// }
		
		return array();
	}

	public function getMaskapaiOftheMonth($tahun, $bulan) 
	{
		$sql = 'SELECT distinct(nama_maskapai) nama_maskapai from view_penjualan WHERE YEAR(tanggal) = ? AND MONTH(tanggal) = ?';

	}
	public function getHari($year, $month) 
	{
		$list=array();
		for($d=1; $d<=31; $d++)
		{
			$time=mktime(12, 0, 0, $month, $d, $year);          
			if (date('m', $time)==$month)       
				$list[]=date('Y-m-d', $time);
		}

		return $list;
	}

}

/* End of file m_laporan.php */
/* Location: ./application/models/m_laporan.php */