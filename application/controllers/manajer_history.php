<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajer_history extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_history');
		if (!isset($_SESSION['username']))
			redirect('auth');
	}

	public function index()
	{
		$data['data_history'] = $this->model_history->get_all_data();
		$data['konten'] = "vw_log/view_log_harian";

		$this->load->view('main_dashboard', $data);
	}

}

/* End of file manajer_history.php */
/* Location: ./application/controllers/manajer_history.php */