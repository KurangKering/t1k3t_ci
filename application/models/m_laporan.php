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
		$sql = 'SELECT YEAR(tanggal) Tahun, MONTH(tanggal) Bulan, nama_maskapai, tanggal, SUM(hpp) jumlah, (SELECT sum(a.q) from view_penjualan a where view_penjualan.tanggal = a.tanggal) jumlah_q, (SELECT sum(a.adm_fee) from view_penjualan a where view_penjualan.tanggal = a.tanggal) adm_fee from view_penjualan WHERE YEAR(tanggal) = ? and MONTH(tanggal) = ? group by tanggal, id_maskapai order by tanggal asc' ;
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
	public function get_nama_maskapai() 
	{
		$this->db->select('nama');
		$this->db->order_by('nama', 'asc');
		$result = $this->db->get('maskapai');
		$nama = array();
		foreach ($result->result_array() as $key => $value) {
			$nama[] = $value['nama'];
		}
		return $nama;
	}
	public function get_data_laporan($tahun, $bulan) 
	{
		$laporan = $this->getLaporan($tahun, $bulan);
		$new_laporan = false;
		$sum_laporan = false;
		if ($laporan) {
			$hasil = false;
			$data_laporan = false;
			$currdate = false;
			$maskapai = $this->get_nama_maskapai();
			$new_laporan = [];
			$sum_laporan['maskapai'] = false;
			$sum_laporan['jumlah_q'] = false;
			$sum_laporan['adm_fee'] = false;
			foreach ($maskapai as $key => $value) {
				$sum_laporan['maskapai'][] = array('nama' => $value, 'sum' => '0');
			}
			foreach ($laporan as $index => $penjualan) {
				if ($penjualan['tanggal'] != $currdate) {
					$currdate = $penjualan['tanggal'];
				}
				$data_laporan[$penjualan['tanggal']]['data'][] = array('maskapai' => $penjualan['nama_maskapai'], 'jumlah' =>  $penjualan['jumlah']);
				$data_laporan[$penjualan['tanggal']]['jumlah_q'][] = $penjualan['jumlah_q'];
				$data_laporan[$penjualan['tanggal']]['adm_fee'][] = $penjualan['adm_fee'];
			}
			foreach ($data_laporan as $tanggal => $data) {
				for ($i=0; $i < sizeof($maskapai); $i++) { 
					$new_laporan['isi'][$tanggal]['data'][$i] = array('maskapai' => $maskapai[$i], 'jumlah' => '0');
				}
				$new_laporan['isi'][$tanggal]['jumlah_q'] = $data_laporan[$tanggal]['jumlah_q'];
				$new_laporan['isi'][$tanggal]['adm_fee'] =  $data_laporan[$tanggal]['adm_fee'];
			}
			foreach ($new_laporan['isi'] as $tanggal => $data) {
				foreach ($data['data'] as $index => $data__) {
					foreach ($data_laporan[$tanggal]['data'] as $key => $value) {
						if ($value['maskapai'] == $data__['maskapai']) {
							$new_laporan['isi'][$tanggal]['data'][$index]['jumlah'] = $value['jumlah'];
							$sum_laporan['maskapai'][$index]['sum'] += $value['jumlah'];
							// foreach ($sum_laporan['maskapai'] as $s => $v) {
							// 	if ($v['nama'] == $value['maskapai']) {
							// 		$sum_laporan['maskapai'][$s]['sum'] += $value['jumlah'];
							// 	}
							// }
							//$new_laporan['sum']['maskapai'][$data__['maskapai']] += $value['jumlah'];
							//ksort($new_laporan['sum']['maskapai']);
							//break;
						}
					}
				}
				$sum_laporan['jumlah_q'] += $data['jumlah_q']['0'];
				$sum_laporan['adm_fee'] += $data['adm_fee']['0'];
			}
			$new_laporan['penjumlahan'] = $sum_laporan;
			return $new_laporan;
		}
		
		return array();
	}
	// public function get_data_laporan($tahun, $bulan) 
	// {
	// 	$laporan = $this->getLaporan($tahun, $bulan);
	// 	$new_laporan = false;
	// 	if ($laporan) {
	// 		$hasil = false;
	// 		$data_laporan = false;
	// 		$currdate = false;
	// 		$maskapai = $this->get_nama_maskapai();
	// 		foreach ($laporan as $index => $penjualan) {
	// 			if ($penjualan['tanggal'] != $currdate) {
	// 				$currdate = $penjualan['tanggal'];
	// 			}
	// 			$data_laporan[$penjualan['tanggal']]['data'][] = array('maskapai' => $penjualan['nama_maskapai'], 'jumlah' =>  $penjualan['jumlah']);
	// 			$data_laporan[$penjualan['tanggal']]['jumlah_q'][] = $penjualan['jumlah_q'];
	// 			$data_laporan[$penjualan['tanggal']]['adm_fee'][] = $penjualan['adm_fee'];
	// 		}
	// 		foreach ($data_laporan as $tanggal => $data) {
	// 			for ($i=0; $i < sizeof($maskapai); $i++) { 
	// 				$new_laporan[$tanggal]['data'][$i] = array('maskapai' => $maskapai[$i], 'jumlah' => '0'); 
	// 			}
	// 			$new_laporan[$tanggal]['jumlah_q'] = $data_laporan[$tanggal]['jumlah_q'];
	// 			$new_laporan[$tanggal]['adm_fee'] =  $data_laporan[$tanggal]['adm_fee'];
	// 		}
	// 		foreach ($new_laporan as $tanggal => $data) {
	// 			foreach ($data['data'] as $index => $data__) {
	// 				foreach ($data_laporan[$tanggal]['data'] as $key => $value) {
	// 					if ($value['maskapai'] == $data__['maskapai']) {
	// 						$new_laporan[$tanggal]['data'][$index]['jumlah'] = $value['jumlah'];
	// 						break;
	// 					}
	// 				}
	// 			}
	// 		}
	// 	}
	// 	return $new_laporan;
	// }
}
/* End of file m_laporan.php */
/* Location: ./application/models/m_laporan.php */