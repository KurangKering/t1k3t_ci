<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler(TRUE);
		$this->load->helper('penjualan_helper');
		$this->load->model('m_laporan', 'laporan');

	}
	public function index()
	{
		

		$result = $this->laporan->getLaporan('2017','2');

		var_dump($result);
	}

	public function tampil_laporan($tahun = null, $bulan = null)
	{
		if ($tahun == null || $bulan == null) {
			show_404();
		}

		$master_maskapai = $this->laporan->getAll('maskapai');
		$master_laporan  = $this->laporan->getLaporan($tahun, $bulan);
		$lapor = array();
		$harihari = $this->laporan->getHari($tahun, $bulan);
		foreach ($harihari as $hari_index => $hari) {
			foreach ($master_maskapai as $maskapai_index => $maskapai) {
				if ($master_laporan['data'][$maskapai_index]->tanggal == $hari) {

					if ($master_laporan) {
						# code...
					}
					$lapor[$hari][$maskapai->nama]['setoran'] = $master_laporan['data'];
				}
				
			} 
		}

		echo '<pre>';
		print_r($lapor);
		echo '</pre';

		// $this->template->css_add('
		// 	.vertical-center {
		// 		vertical-align: middle !important;
		// 	}
		// 	', 'embed');
		// $this->template->render('laporan/v_tampil_laporan', $data);
	}

	public function testt () {

	}

}

/* End of file laporan.php */
/* Location: ./application/controllers/laporan.php */