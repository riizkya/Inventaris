<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manajer_perangkat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_perangkat');
		$this->load->model('model_history');
		$this->load->model('model_setting');
		$this->load->model('model_opname');

		$this->load->library('fpdf');
		if (!isset($_SESSION['username']))
			redirect('auth');
	}
	
 

	public function index()
	{
		$data['data_hd'] = $this->model_perangkat->get_all_data();
		
		if ($_SESSION['privilege']==1)
		{
			$data['konten'] = "vw_hd/show_hd";
		}
		else
		{
			$data['konten'] = "vw_hd/show_hd_2";
		}

		
		$this->load->view('main_dashboard', $data);

	}
	
	public function create()
	{
		$this->form_validation->set_rules('txt_id', 'ID Perangkat', 'required');
		//$this->form_validation->set_rules('txt_nama', 'Nama Perangkat', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{

			$data['konten'] = "vw_hd/add_hd";
			$data['tempat'] = $this->model_perangkat->get_penempatan();
			$data['id_value'] = $this->generate_id();

			$this->load->view('main_dashboard', $data);
		} 
		else 
		{
			$id_hd = $this->input->post('txt_id');
			$nama_hd = $this->input->post('txt_nama');
			$tgl_hd = $this->input->post('txt_tanggal');
			$tempat_hd = $this->input->post('cmb_tempat');
			$guna_hd = $this->input->post('txt_guna');
			$radio_hd = $this->input->post('rad_kondisi');

			if ($radio_hd=="Lain")
			{
				$radio_hd = $this->input->post('txt_kondisi');
			}

			$data_user = array(
							'id_barang' => $id_hd,
							'nama_hardware' => $nama_hd,
							'tanggal' => $tgl_hd,
							'penempatan'    => $tempat_hd,
							'kegunaan' => $guna_hd,
							'kondisi' => $radio_hd
						 );
			

			// catat log history ke database
			$this->model_history->set_log_create("ID Perangkat yang dibuat = ".$id_hd , "tblhardware");

			$this->model_perangkat->create($data_user);	
			
			// set notifikasi
			$this->session->set_flashdata('notif', 'Data Berhasil Dimasukan.');

			redirect('manajer_perangkat');
		
			
		}
	}
	
	public function update($id)
	{
		$this->form_validation->set_rules('txt_id', 'ID Perangkat', 'required');
		$this->form_validation->set_rules('txt_nama', 'Nama Perangkat', 'required');
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['data_hd'] = $this->model_perangkat->get_data($id);
			$data['konten'] = "vw_hd/form_edit_hd";
			$data['tempat'] = $this->model_perangkat->get_penempatan();

			$this->load->view('main_dashboard',$data);
		} 
		else 
		{
			$id_hd = $this->input->post('txt_id');
			$nama_hd = $this->input->post('txt_nama');
			$tgl_hd = $this->input->post('txt_tanggal');
			$tempat_hd = $this->input->post('cmb_tempat');
			$guna_hd = $this->input->post('txt_guna');
			$radio_hd = $this->input->post('rad_kondisi');
			
			if ($radio_hd=="Lain")
			{
				$radio_hd = $this->input->post('txt_kondisi');
			}

			$data_user = array(
							'id_barang' => $id_hd,
							'nama_hardware' => $nama_hd,
							'tanggal' => $tgl_hd,
							'penempatan'    => $tempat_hd,
							'kegunaan' => $guna_hd,
							'kondisi' => $radio_hd
						 );

			// catat log history ke database
			$this->model_history->set_log_edit("ID Perangkat yang diedit = ".$id_hd , "tblhardware");
			
			$this->model_perangkat->update($id,$data_user);

			// set notifikasi
			$this->session->set_flashdata('notif', 'Data Berhasil Diedit.');
			redirect('manajer_perangkat');
		}
	}
	
	public function delete($id)
	{
		$this->model_perangkat->delete($id);

		// catat log history ke database
		$this->model_history->set_log_delet("ID Perangkat yang dihapus = ".$id, "tblhardware");

		$this->model_opname->update_status($id);
		// set notifikasi
		$this->session->set_flashdata('notif', 'Data Berhasil Dihapus.');
		
		redirect('manajer_perangkat');
	}

	public function generate_id ()
	{
		$id = $this->model_perangkat->getmaxID()->AUTO_INCREMENT;
		

		$nomer = $id;
		$hasil = "";

		if ($nomer < 10)
		{
			$hasil = "TVKU-IT-00".$nomer;
		}
		else if ($nomer > 9 && $nomer <100)
		{
			$hasil = "TVKU-IT-0".$nomer;
		}
		else
		{
			$hasil = "TVKU-IT-".$nomer;
		}
	
		return $hasil;
	}

	public function create_pdf()
	{
		$data['data_tbl'] = array($this->model_perangkat->get_data_spec());
		$data['colum_head'] = array('No','ID Perangkat' , 'Nama Perangkat' , 'Tanggal Masuk' , 'Penempatan' , 'Kondisi');
		$data['colum_size'] = array(7,25,55,30,50,20);
		$data['title'] = "LAPORAN DATA PERANGKAT IT";
		$data['sign_name'] = $this->model_setting->get_all_data();

		$this->load->view('pdf_page' , $data);
	}

	

}