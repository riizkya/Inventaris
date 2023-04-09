<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajer_help extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!isset($_SESSION['username']))
			redirect('auth');
	}
	public function index()
	{
		$data['konten'] = "view_help";

		$this->load->view('main_dashboard', $data);
	}

}

/* End of file manajer_help.php */
/* Location: ./application/controllers/manajer_help.php */