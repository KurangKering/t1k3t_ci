<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_dashboard');
	}
	public function index()
	{
		$data['jual'] = $this->Global_CRUD->get_data_all('maskapai');
		$data['header'] = "Dashboard";
		$this->template->render('dashboard/v_dashboard', $data);
	}
	private function generate_bar($data_chart)
	{
		$this->template->js_add('
			var bar_data = {
				data: '.$data_chart.',
				color: "#3c8dbc"
			};
			$.plot("#bar-chart", [bar_data], {
				grid: {
					borderWidth: 1,
					borderColor: "#f3f3f3",
					tickColor: "#f3f3f3"
				},
				series: {
					bars: {
						show: true,
						barWidth: 0.5,
						align: "center"
					}
				},
				xaxis: {
					mode: "categories",
					tickLength: 0
				}
			});
			/* END BAR CHART */
			', 'embed');
	}
}
/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */