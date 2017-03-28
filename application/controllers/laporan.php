<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_laporan', 'laporan');
	}
	public function index()
	{
		$bulan = array ('Pilih Bulan','Januari','Februari','Maret','April',
			'Mei','Juni','Juli','Agustus',
			'September','Oktober','November','Desember');
		$data['bulan'] = $bulan;
		$this->template->render('laporan/v_laporan', $data);
	}
	public function tampil_laporan($tahun = null, $bulan = null)
	{
		$laporan = $this->laporan->getLaporan($tahun, $bulan);
		$currdate = false;
		$currmaskapai = false;
		$maskapai = array('Air Asia', 'Merpati', 'Garuda', 'Citilink');
		$data_laporan  = false;
		$date = generate_date($tahun, $bulan);
		foreach ($laporan as $index => $penjualan) {
			if ($penjualan['tanggal'] != $currdate) {
				$currdate = $penjualan['tanggal'];
			}
			$data_laporan[$penjualan['tanggal']][] = array('maskapai' => $penjualan['nama_maskapai'], 'jumlah' =>  $penjualan['jumlah']);
		}
		foreach ($data_laporan as $key => $laporan) {
			echo $key . PHP_EOL;
			foreach ($laporan as $kunci => $lapor) {
				foreach ($maskapai  as $masmas) {
					if ($masmas != $lapor['maskapai']) {
						echo $masmas . '---' . PHP_EOL;
					}
					else
					{
						echo $masmas. ' '. $lapor['jumlah'] . PHP_EOL;
					}
				}
			}
		}
		// var_dump($data_laporan);
		//var_dump($data_laporan);
// foreach ($laporan as $index => $penjualan) {
// 	if ($penjualan['tanggal'] != $currdate) {
// 		echo $penjualan['tanggal'] . '<br>';
// 		$currdate = $penjualan['tanggal'];
// 	}
// 	echo $penjualan['nama_maskapai'] . '<br>';
// 	echo $penjualan['jumlah']. '<br>';
// }
		// foreach ($laporan as $index => $penjualan) {
		// 	if ($penjualan['tanggal'] != $currdate) {
		// 		echo $penjualan['tanggal'] . '<br>';
		// 		$currdate = $penjualan['tanggal'];
		// 	}
		// 	foreach ($maskapai as $index => $mask) {
		// 		if ($mask != $penjualan['nama_maskapai']) {
		// 			echo $mask . '<br>';
		// 		}
		// 		// echo $penjualan['nama_maskapai'] . '<br>';
		// 		// echo $penjualan['jumlah']. '<br>';
		// 	}
		// }
	}
	public function testt () {
	}
}
/* End of file laporan.php */
/* Location: ./application/controllers/laporan.php */