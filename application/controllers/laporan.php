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
		$bulan = array ('Januari','Februari','Maret','April',
			'Mei','Juni','Juli','Agustus',
			'September','Oktober','November','Desember');
		$bbulan = array_combine(range(1, count($bulan)), $bulan);
		$data['bulan'] = $bbulan;
		$data['tahun'] = $this->laporan->get_tahun_yang_ada();
		$this->template->render('laporan/v_laporan', $data);
	}
	
	public function generate_laporan () {
		$tahun = $this->input->post('tahun');
		$bulan = $this->input->post('bulan');
		if ($result = $this->laporan->get_data_laporan($tahun, $bulan)) {
			$data['maskapai'] = $this->laporan->get_nama_maskapai();
			$data['tahun'] = $tahun;
			$data['bulan'] = tampil_bulan($bulan);
			$data_laporan = $result;
			$data['data_laporan'] = $data_laporan;
			$output =  $this->load->view('laporan/v_tampil_polos', $data, true);
			$this->load->library('pdf');
			$this->dompdf->load_html($output);
			$this->dompdf->set_paper("legal", "landscape");
			$this->dompdf->render();
			$this->dompdf->stream('Perincian-LPP-' . tampil_bulan($bulan) .'-'. $tahun.'.pdf',array("Attachment"=>0));
		}
		else
		{
			echo "<script type='text/javascript'>";
			echo "window.close();";
			echo "</script>";
		}

	}

	
}
/* End of file laporan.php */
	/* Location: ./application/controllers/laporan.php */