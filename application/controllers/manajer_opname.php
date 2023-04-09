<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajer_opname extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_opname');
		$this->load->model('model_pc');
		$this->load->model('model_perangkat');
		$this->load->model('model_server');
		$this->load->model('model_history');
		$this->load->model('model_setting');

		$this->load->library('fpdf');
		if (!isset($_SESSION['username']))
			redirect('auth');
	}

	public function index()
	{
		if ($_SESSION['privilege']!=1)
		{
			redirect('manajer_opname/view');
		}
		
		$data['data_pc'] = $this->model_pc->get_all_data();
		$data['data_hd'] = $this->model_perangkat->get_all_data();
		$data['data_sv'] = $this->model_server->get_all_data();

		$data['konten'] = "vw_proc/proc_opname";
		$this->load->view('main_dashboard', $data);
	}

	public function input()
	{
		$tgl =  $this->input->post('txt_tanggal');
		$kode = explode(" ",$this->input->post('txt_kd'));
		$ket = explode("^",$this->input->post('txt_ket'));
		
		if (count($kode)==1)
		{
			redirect('manajer_opname');
		}

		$data_input = array();
		$i=0;
		
		$id_string = "";
		for ($i=0 ; $i<count($kode)-1 ; $i++)
		{
			$id_string = $id_string . $kode[$i] . ",";
			$data_input[$i]['id_barang'] = $kode[$i];
			$data_input[$i]['tanggal_masuk']   = $tgl;
			$data_input[$i]['keterangan'] = $ket[$i];
			$data_input[$i]['status'] = 'PROSES';
		}

		// catat ke log
		$this->model_history->set_log_create("ID yang diopname = ".$id_string , "tblopname");

		$this->model_opname->create($data_input);

		// set notifikasi
			$this->session->set_flashdata('notif', 'Data Opname berhasil dimasukan.');
		redirect('manajer_opname/view');
	}

	public function view()
	{
		

		$data['data_mt_pc'] = $this->model_opname->get_all_data("tblkomputer");
		$data['data_mt_sv'] = $this->model_opname->get_all_data("tblserver");
		$data['data_mt_hd'] = $this->model_opname->get_all_data("tblhardware");
		
		if ($_SESSION['privilege']==1)
		{
			$data['konten'] = "vw_data_proc/view_opname";
		}
		else
		{
			$data['konten'] = "vw_data_proc/view_opname_2";
		}

		
		
		$this->load->view('main_dashboard', $data);
	}

	public function update ($id)
	{
		// catat ke dalam log
		$this->model_history->set_log_edit("ID ".$id." telah selesai diopname.","tblopname");
		
		$this->model_opname->update_status($id);
		redirect('manajer_opname/view');
	}

	public function create_pdf()
	{
		$option = $this->model_setting->get_all_data()->use;
		$dt1 = $this->model_setting->get_all_data()->tgl_awal;
		$dt2 = $this->model_setting->get_all_data()->tgl_akhir; 

		if ($option == 1)
		{
			$data['data_tbl'] = array($this->model_opname->get_all_data_between("tblkomputer",$dt1,$dt2) , $this->model_opname->get_all_data_between("tblserver",$dt1,$dt2) , $this->model_opname->get_all_data_between("tblhardware",$dt1,$dt2));
		}
		else
		{
			$data['data_tbl'] = array($this->model_opname->get_all_data("tblkomputer") , $this->model_opname->get_all_data("tblserver") , $this->model_opname->get_all_data("tblhardware"));
		}
		

		$data['colum_head'] = array('No','Tanggal Opname' , 'ID Barang' , 'Keterangan Barang' , 'Keterangan Opname');
		$data['colum_size'] = array(7,30,25,63,63);
		$data['title'] = "LAPORAN DATA BARANG OPNAME";
		$data['sign_name'] = $this->model_setting->get_all_data();

		$this->load->view('pdf_page' , $data);
	}

	public function view_log_opname ()
	{
		$data['data_log_opname'] = $this->model_opname->get_data_log();
		$data['konten'] = "vw_log/view_log_opname";

		$this->load->view('main_dashboard', $data);
	}
}

/* End of file manajer_opname.php */
/* Location: ./application/controllers/manajer_opname.php */