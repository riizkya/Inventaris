<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manajer_pc extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_pc');
		$this->load->model('model_history');
		$this->load->model('model_setting');
		$this->load->model('model_opname');

		$this->load->library('fpdf');
		if (!isset($_SESSION['username']))
			redirect('auth');
	}

	   
	public function index()
	{
		$data['data_pc'] = $this->model_pc->get_all_data();
		$data['alay'] = array("satu" , "dua");

		if ($_SESSION['privilege']==1)
		{
			$data['konten'] = "vw_pc/show_pc";
		}
		else
		{
			$data['konten'] = "vw_pc/show_pc_2";
		}
		
		
		$this->load->view('main_dashboard', $data);
	}
	
	public function create()
	{
		$this->form_validation->set_rules('txt_id', 'ID Komputer', 'required');
	//	$this->form_validation->set_rules('txt_keterangan', 'Keterangan', 'required');	
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['konten'] = "vw_pc/add_pc";
			$data['tempat'] = $this->model_pc->get_penempatan();
			$data['id_value'] = $this->generate_id();

			$this->load->view('main_dashboard', $data);
		} 
		else 
		{
			
			$id_pc = $this->input->post('txt_id');
			$keterangan_pc = $this->input->post('txt_keterangan');
			$tanggal_pc = $this->input->post('txt_tanggal');
			$tempat_pc = $this->input->post('cmb_tempat');
			$guna_pc = $this->input->post('txt_guna');
			$ip_pc = $this->input->post('txt_ip');
			$proc_pc = $this->input->post('txt_proc');
			$mobo_pc = $this->input->post('txt_mobo');
			$hdd_pc = $this->input->post('txt_hdd');
			$ram_pc = $this->input->post('txt_ram');
			$vga_pc = $this->input->post('txt_vga');
			$lan_pc = $this->input->post('txt_lan');
			$kondisi_pc = $this->input->post('rad_kondisi');

			if ($kondisi_pc == "Lain")
			{
					$kondisi_pc = $this->input->post('txt_kondisi');
			}
				
			$data_pc = array(
							'id_barang' => $id_pc,
							'keterangan' => $keterangan_pc,
							'tanggal'    => $tanggal_pc,
							'penempatan' => $tempat_pc,
							'kegunaan' => $guna_pc,
							'ip_address' => $ip_pc,
							'processor' => $proc_pc,
							'motherboard' => $mobo_pc,
							'harddisk' => $hdd_pc,
							'ram' => $ram_pc,
							'vga' => $vga_pc,
							'lan_card' => $lan_pc,
							'kondisi' => $kondisi_pc 
						 );
			
			// catat log history ke database
			$this->model_history->set_log_create("ID Komputer yang dibuat = ".$id_pc , "tblkomputer");

			$this->model_pc->create($data_pc);

			// set notifikasi
			$this->session->set_flashdata('notif', 'Data Berhasil Dimasukan.');
			redirect('manajer_pc');
		}
	}
	
	
	public function update($id)
	{
		$this->form_validation->set_rules('txt_id', 'ID Komputer', 'required');
		$this->form_validation->set_rules('txt_keterangan', 'Keterangan', 'required');	
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['konten'] = "vw_pc/form_edit_pc";
			$data['data_pc'] = $this->model_pc->get_data($id);
			$data['tempat'] = $this->model_pc->get_penempatan();

			$this->load->view('main_dashboard',$data);
		} 
		else 
		{
			$id_pc = $this->input->post('txt_id');
			$keterangan_pc = $this->input->post('txt_keterangan');
			$tanggal_pc = $this->input->post('txt_tanggal');
			$tempat_pc = $this->input->post('cmb_tempat');
			$guna_pc = $this->input->post('txt_guna');
			$ip_pc = $this->input->post('txt_ip');
			$proc_pc = $this->input->post('txt_proc');
			$mobo_pc = $this->input->post('txt_mobo');
			$hdd_pc = $this->input->post('txt_hdd');
			$ram_pc = $this->input->post('txt_ram');
			$vga_pc = $this->input->post('txt_vga');
			$lan_pc = $this->input->post('txt_lan');
			$kondisi_pc = $this->input->post('rad_kondisi');
				
			if ($kondisi_pc == "Lain")
			{
					$kondisi_pc = $this->input->post('txt_kondisi');
			}
				
			$data_pc = array(
							'id_barang' => $id_pc,
							'keterangan' => $keterangan_pc,
							'tanggal'    => $tanggal_pc,
							'penempatan' => $tempat_pc,
							'kegunaan' => $guna_pc,
							'ip_address' => $ip_pc,
							'processor' => $proc_pc,
							'motherboard' => $mobo_pc,
							'harddisk' => $hdd_pc,
							'ram' => $ram_pc,
							'vga' => $vga_pc,
							'lan_card' => $lan_pc,
							'kondisi' => $kondisi_pc 
						 );

			// catat log history ke database
			$this->model_history->set_log_edit("ID Komputer yang diedit = ".$id_pc , "tblkomputer");

			$this->model_pc->update($id,$data_pc);


			// set notifikasi
			$this->session->set_flashdata('notif', 'Data Berhasil Diedit.');
			redirect('manajer_pc');
		}
	}
	
	public function delete($id)
	{
		$this->model_pc->delete($id);

		// catat log history ke database
		$this->model_history->set_log_delet("ID Komputer yang dihapus = ".$id , "tblkomputer");

		$this->model_opname->update_status($id);
		// set notifikasi
		$this->session->set_flashdata('notif', 'Data Berhasil Dihapus.');
		redirect('manajer_pc');
	}

	public function generate_id ()
	{
		$id = $this->model_pc->getmaxID()->AUTO_INCREMENT;
		

		$nomer = $id;
		$hasil = "";

		if ($nomer < 10)
		{
			$hasil = "TVKU-PC-00".$nomer;
		}
		else if ($nomer > 9 && $nomer <100)
		{
			$hasil = "TVKU-PC-0".$nomer;
		}
		else
		{
			$hasil = "TVKU-PC-".$nomer;
		}
	
		return $hasil;
	}

	public function create_pdf()
	{
		$data['data_tbl'] = array($this->model_pc->get_data_spec());
		$data['colum_head'] = array('No','ID Komputer' , 'Keterangan' , 'Tanggal Masuk' , 'Penempatan' , 'Kondisi');
		$data['colum_size'] = array(7,25,55,30,50,20);
		$data['title'] = "LAPORAN DATA KOMPUTER";
		$data['sign_name'] = $this->model_setting->get_all_data();

		$this->load->view('pdf_page' , $data);
	}

	
}