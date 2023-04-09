<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_perangkat');
		$this->load->model('model_pc');
		$this->load->model('model_server');
		$this->load->model('model_nonaktif');
		$this->load->model('model_opname');
	}
	public function index()
	{
		
		if (isset($_SESSION['username']))
		{
			$data['konten'] = "default";
			$data['sum_hd'] = $this->model_perangkat->get_count_data();
			$data['sum_pc'] = $this->model_pc->get_count_data();
			$data['sum_sv'] = $this->model_server->get_count_data();
			$data['sum_no'] = $this->model_nonaktif->get_count_data();
			$data['sum_op'] = $this->model_opname->get_count_data();


			
			$data['kondisi_hd'] = array($this->model_perangkat->get_count_data_attr("Baik") , 
										$this->model_perangkat->get_count_data_attr("Sedang"),
										$this->model_perangkat->get_count_data_attr("Rusak")
				);

			$data['kondisi_pc'] = array($this->model_pc->get_count_data_attr("Baik") , 
										$this->model_pc->get_count_data_attr("Sedang"),
										$this->model_pc->get_count_data_attr("Rusak")
				);

			$data['kondisi_sv'] = array($this->model_server->get_count_data_attr("Baik") , 
										$this->model_server->get_count_data_attr("Sedang"),
										$this->model_server->get_count_data_attr("Rusak")
				);

			$data['nonAktif'] =   array($this->model_nonaktif->get_count_data_attr("TVKU-IT") , 
										$this->model_nonaktif->get_count_data_attr("TVKU-PC"),
										$this->model_nonaktif->get_count_data_attr("TVKU-SV")
				);
			
			$data['opname'] =   array($this->model_opname->get_count_data_attr("TVKU-IT") , 
										$this->model_opname->get_count_data_attr("TVKU-PC"),
										$this->model_opname->get_count_data_attr("TVKU-SV")
				);


			$this->load->view('main_dashboard' , $data);
		}
		else
		{
			redirect('auth');
		}
		//$this->load->view('chart');		
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */