<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajer_mutasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_mutasi');
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
			redirect('manajer_mutasi/view');
		}

		$data['data_pc'] = $this->model_pc->get_all_data();
		$data['data_hd'] = $this->model_perangkat->get_all_data();
		$data['data_sv'] = $this->model_server->get_all_data();

		$data['tempat_pc'] = $this->model_pc->get_penempatan();
		$data['tempat_hd'] = $this->model_perangkat->get_penempatan();
		$data['tempat_sv'] = $this->model_server->get_penempatan();

		$data['konten'] = "vw_proc/proc_mutasi";
		$this->load->view('main_dashboard', $data);
	}

	public function input()
	{
		$tgl =  $this->input->post('txt_tanggal');
		$tempat = $this->input->post('cmb_tempat');
		$kode = explode(" ",$this->input->post('txt_kd'));
		$tempat_aw = explode("^",$this->input->post('txt_tmpt'));

		if (count($kode)==1)
		{
			redirect('manajer_mutasi');
		}
		
		$data_input = array();
		$i=0;

		$id_string = "";
		$tempat_update = array();

		for ($i=0 ; $i<count($kode)-1 ; $i++)
		{
			$data_input[$i]['id_barang'] = $kode[$i];
			$id_string = $id_string .$kode[$i].",";
			$data_input[$i]['tanggal']   = $tgl;
			$data_input[$i]['tujuan_aw'] = $tempat_aw[$i];
			$data_input[$i]['tujuan_ak'] = $tempat;

			$tempat_update['penempatan'] = $tempat;
			$this->model_mutasi->update_tempat($kode[$i] ,$tempat_update , $this->getTableName($kode[$i]) );
		}

		// catat ke log
		$this->model_history->set_log_create("ID yang dimutasikan = ".$id_string , "tblmutasi");

		$this->model_mutasi->create($data_input);

		// set notifikasi
			$this->session->set_flashdata('notif', 'Mutasi Berhasil Dilakukan.');
			
		redirect('manajer_mutasi/view');
	}

	public function view()
	{
		$data['data_mt_pc'] = $this->model_mutasi->get_all_data("tblkomputer");
		$data['data_mt_sv'] = $this->model_mutasi->get_all_data("tblserver");
		$data['data_mt_hd'] = $this->model_mutasi->get_all_data("tblhardware");
			
		$data['konten'] = "vw_data_proc/view_mutasi";
		
		$this->load->view('main_dashboard', $data);
	}

	public function getTableName ($id)
	{
		$kode = explode("-",$id);

		if ($kode[1]=="PC")
		{
			return "tblkomputer";
		}
		else if ($kode[1]=="SV")
		{
			return "tblserver";
		}
		else
		{
			return "tblhardware";
		}
	}

	public function create_pdf()
	{
		$option = $this->model_setting->get_all_data()->use;
		$dt1 = $this->model_setting->get_all_data()->tgl_awal;
		$dt2 = $this->model_setting->get_all_data()->tgl_akhir;

		if ($option == 1)
		{
			$data['data_tbl'] = array($this->model_mutasi->get_all_data_between("tblkomputer" , $dt1,$dt2) , $this->model_mutasi->get_all_data_between("tblserver", $dt1,$dt2) , $this->model_mutasi->get_all_data_between("tblhardware", $dt1,$dt2));
		}
		else
		{
			$data['data_tbl'] = array($this->model_mutasi->get_all_data("tblkomputer") , $this->model_mutasi->get_all_data("tblserver") , $this->model_mutasi->get_all_data("tblhardware"));
		}
		

		$data['colum_head'] = array('No','Tanggal Mutasi' , 'ID Barang' , 'Keterangan Barang' , 'Penempatan Awal' , 'Penempatan Akhir');
		$data['colum_size'] = array(7,30,25,50,40,40);
		$data['title'] = "LAPORAN DATA MUTASI BARANG";
		$data['sign_name'] = $this->model_setting->get_all_data();

		$this->load->view('pdf_page' , $data);
	}

}

/* End of file manajer_proc.php */
/* Location: ./application/controllers/manajer_proc.php */