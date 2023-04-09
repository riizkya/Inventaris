<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manajer_server extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_server');
		$this->load->model('model_history');
		$this->load->model('model_setting');
		$this->load->model('model_opname');

		$this->load->library('fpdf');
		if (!isset($_SESSION['username']))
			redirect('auth');
	}

	   
	public function index()
	{
		
		
		$data['data_sv'] = $this->model_server->get_all_data();
		
		if ($_SESSION['privilege']==1)
		{
			$data['konten'] = "vw_sv/show_sv";
		}
		else
		{
			$data['konten'] = "vw_sv/show_sv_2";
		}

		
		$this->load->view('main_dashboard', $data);
	}
	
	public function create()
	{
		$this->form_validation->set_rules('txt_id', 'ID Server', 'required');
		//$this->form_validation->set_rules('txt_keterangan', 'Keterangan', 'required');	
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['konten'] = "vw_sv/add_sv";
			$data['tempat'] = $this->model_server->get_penempatan();
			$data['id_value'] = $this->generate_id();
			
			$this->load->view('main_dashboard', $data);
		} 
		else 
		{
			$id_sv = $this->input->post('txt_id');
			$keterangan_sv = $this->input->post('txt_keterangan');
			$tanggal_sv = $this->input->post('txt_tanggal');
			$tempat_sv = $this->input->post('cmb_tempat');
			$guna_sv = $this->input->post('txt_guna');
			$ip_sv = $this->input->post('txt_ip');
			$proc_sv = $this->input->post('txt_proc');
			$mobo_sv = $this->input->post('txt_mobo');
			$hdd_sv = $this->input->post('txt_hdd');
			$ram_sv = $this->input->post('txt_ram');
			$vga_sv = $this->input->post('txt_vga');
			$lan_sv = $this->input->post('txt_lan');
			$kondisi_sv = $this->input->post('rad_kondisi');

			if($kondisi_sv == "Lain")
			{
				$kondisi_sv = $this->input->post('txt_kondisi');
			}
				
			$data_sv = array(
							'id_barang' => $id_sv,
							'keterangan' => $keterangan_sv,
							'tanggal'    => $tanggal_sv,
							'penempatan' => $tempat_sv,
							'kegunaan' => $guna_sv,
							'ip_address' => $ip_sv,
							'processor' => $proc_sv,
							'motherboard' => $mobo_sv,
							'harddisk' => $hdd_sv,
							'ram' => $ram_sv,
							'vga' => $vga_sv,
							'lan_card' => $lan_sv,
							'kondisi' => $kondisi_sv 
						 );
			
			// catat log history ke database
			$this->model_history->set_log_create("ID Server yang dibuat = ".$id_sv , "tblserver");

			$this->model_server->create($data_sv);

			// set notifikasi
			$this->session->set_flashdata('notif', 'Data Berhasil Dimasukan.');
			redirect('manajer_server');	
		}
	}
	
	public function update($id)
	{
		$this->form_validation->set_rules('txt_id', 'ID Server', 'required');
		$this->form_validation->set_rules('txt_keterangan', 'Keterangan', 'required');	
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['data_sv'] = $this->model_server->get_data($id);
			$data['konten'] = "vw_sv/form_edit_sv";
			$data['tempat'] = $this->model_server->get_penempatan();

			$this->load->view('main_dashboard',$data);
		} 
		else 
		{
			$id_sv = $this->input->post('txt_id');
			$keterangan_sv = $this->input->post('txt_keterangan');
			$tanggal_sv = $this->input->post('txt_tanggal');
			$tempat_sv = $this->input->post('cmb_tempat');
			$guna_sv = $this->input->post('txt_guna');
			$ip_sv = $this->input->post('txt_ip');
			$proc_sv = $this->input->post('txt_proc');
			$mobo_sv = $this->input->post('txt_mobo');
			$hdd_sv = $this->input->post('txt_hdd');
			$ram_sv = $this->input->post('txt_ram');
			$vga_sv = $this->input->post('txt_vga');
			$lan_sv = $this->input->post('txt_lan');
			$kondisi_sv = $this->input->post('rad_kondisi');

			if($kondisi_sv == "Lain")
			{
				$kondisi_sv = $this->input->post('txt_kondisi');
			}
				
			$data_sv = array(
							'id_barang' => $id_sv,
							'keterangan' => $keterangan_sv,
							'tanggal'    => $tanggal_sv,
							'penempatan' => $tempat_sv,
							'kegunaan' => $guna_sv,
							'ip_address' => $ip_sv,
							'processor' => $proc_sv,
							'motherboard' => $mobo_sv,
							'harddisk' => $hdd_sv,
							'ram' => $ram_sv,
							'vga' => $vga_sv,
							'lan_card' => $lan_sv,
							'kondisi' => $kondisi_sv 
						 );
			
			// catat log history ke database
			$this->model_history->set_log_edit("ID Server yang diedit = ".$id_sv , "tblserver");

			$this->model_server->update($id,$data_sv);

			// set notifikasi
			$this->session->set_flashdata('notif', 'Data Berhasil Diedit.');
			redirect('manajer_server');
		}
	}
	
	public function delete($id)
	{
		$this->model_server->delete($id);

		// catat log history ke database
		$this->model_history->set_log_delet("ID Server yang dihapus = ".$id , "tblserver");

		$this->model_opname->update_status($id);
		// set notifikasi
			$this->session->set_flashdata('notif', 'Data Berhasil Dihapus.');
		redirect('manajer_server');
	}

	public function generate_id ()
	{
		$id = $this->model_server->getmaxID()->AUTO_INCREMENT;
		
		$nomer = $id;
		$hasil = "";

		if ($nomer < 10)
		{
			$hasil = "TVKU-SV-00".$nomer;
		}
		else if ($nomer > 9 && $nomer <100)
		{
			$hasil = "TVKU-SV-0".$nomer;
		}
		else
		{
			$hasil = "TVKU-SV-".$nomer;
		}
	
		return $hasil;
	}

	public function create_pdf()
	{
		$data['data_tbl'] = array($this->model_server->get_data_spec());
		$data['colum_head'] = array('No','ID Server' , 'Keterangan' , 'Tanggal Masuk' , 'Penempatan' , 'Kondisi');
		$data['colum_size'] = array(7,25,55,30,50,20);
		$data['title'] = "LAPORAN DATA SERVER";
		$data['sign_name'] = $this->model_setting->get_all_data();

		$this->load->view('pdf_page' , $data);
	}

	
}