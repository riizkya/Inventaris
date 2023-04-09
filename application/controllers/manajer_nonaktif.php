<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajer_nonaktif extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_nonaktif');
		$this->load->model('model_pc');
		$this->load->model('model_perangkat');
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
		

		if ($_SESSION['privilege']!=1)
		{
			redirect('manajer_nonaktif/view');
		}
		
		$data['data_pc'] = $this->model_pc->get_all_data();
		$data['data_hd'] = $this->model_perangkat->get_all_data();
		$data['data_sv'] = $this->model_server->get_all_data();

		$data['konten'] = "vw_proc/proc_nonaktif";
		$this->load->view('main_dashboard', $data);
	}

	public function input()
	{
		$tgl =  $this->input->post('txt_tanggal');
		$kode = explode(" ",$this->input->post('txt_kd'));
		$ket = explode("^",$this->input->post('txt_ket'));
		$sebab = explode("^",$this->input->post('txt_sbb'));

		if (count($kode)==1)
		{
			redirect('manajer_nonaktif');
		}

		$data_input = array();
		$i=0;
		
		$id_string = "";
		for ($i=0 ; $i<count($kode)-1 ; $i++)
		{
			$id_string = $id_string . $kode[$i]. ",";
			$data_input[$i]['id_barang'] = $kode[$i];
			$data_input[$i]['tanggal']   = $tgl;
			$data_input[$i]['sebab']   = $sebab[$i];
			$data_input[$i]['keterangan'] = $ket[$i];

			$this->model_nonaktif->update_status($kode[$i] , array('status' => 0) , $this->getTableName($kode[$i]));
			
		}

		// catat ke log
		$this->model_history->set_log_create("ID yang dinonaktifkan = ".$id_string , "tblnonaktif");

		$this->model_nonaktif->create($data_input);

		// set notifikasi
			$this->session->set_flashdata('notif', 'Data Berhasil Dinonaktifkan.');
		redirect('manajer_nonaktif/view');
	}

	public function view()
	{
		
		$data['data_mt_pc'] = $this->model_nonaktif->get_all_data("tblkomputer");
		$data['data_mt_sv'] = $this->model_nonaktif->get_all_data("tblserver");
		$data['data_mt_hd'] = $this->model_nonaktif->get_all_data("tblhardware");

		$data['tempat_pc'] = $this->model_pc->get_penempatan();
		$data['tempat_hd'] = $this->model_perangkat->get_penempatan();
		$data['tempat_sv'] = $this->model_server->get_penempatan();
		
		if ($_SESSION['privilege']==1)
		{
			$data['konten'] = "vw_data_proc/view_nonaktif";
		}
		else
		{
			$data['konten'] = "vw_data_proc/view_nonaktif_2";
		}

		
		
		$this->load->view('main_dashboard', $data);
	}

	public function set_status($id,$val)
	{
		$st = array('status' => $val);

		$this->model_nonaktif->update_status($id , $st , $this->getTableName($id));
		$this->delete($id);

		redirect('manajer_nonaktif/view');
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

	public function delete($id)
	{
		$this->model_nonaktif->delete($id);
		redirect('manajer_nonaktif/view');
	}

	public function create_pdf()
	{
		$option = $this->model_setting->get_all_data()->use;
		$dt1 = $this->model_setting->get_all_data()->tgl_awal;
		$dt2 = $this->model_setting->get_all_data()->tgl_akhir;

		if ($option == 1)
		{
			$data['data_tbl'] = array($this->model_nonaktif->get_all_data_between("tblkomputer",$dt1,$dt2) , $this->model_nonaktif->get_all_data_between("tblserver",$dt1,$dt2) , $this->model_nonaktif->get_all_data_between("tblhardware",$dt1,$dt2));
		}
		else
		{
			$data['data_tbl'] = array($this->model_nonaktif->get_all_data("tblkomputer") , $this->model_nonaktif->get_all_data("tblserver") , $this->model_nonaktif->get_all_data("tblhardware"));
		}

		

		$data['colum_head'] = array('No','Tanggal Non Aktif' , 'ID Barang' , 'Keterangan Barang' , 'Lokasi Penyimpanan' , 'Sebab Non Aktif');
		$data['colum_size'] = array(7,25,25,45,45,45);
		$data['title'] = "LAPORAN DATA BARANG NON-AKTIF";
		$data['sign_name'] = $this->model_setting->get_all_data();

		$this->load->view('pdf_page' , $data);
	}

	public function aktivasi ()
	{
			$id = $this->input->post('txt_id');
			$tanggal = $this->input->post('txt_tanggal');
			$sebab = $this->input->post('txt_sebab');
			$lokasi = $this->input->post('txt_lokasi');

			$tanggal_no = $this->input->post('txt_tgl_no');
			$sebab_no = $this->input->post('txt_sebab_no');
			$lokasi_no = $this->input->post('txt_lokasi_no');
			
			

			$data_aktiv = array(
							'id_barang' => $id,
							'tanggal_aktiv' => $tanggal,
							'sebab_aktiv' => $sebab,
							'lokasi_baru'    => $lokasi,
							'tanggal_nonaktiv' => $tanggal_no,
							'sebab_nonaktiv' => $sebab_no,
							'lokasi_awal'    => $lokasi_no
						 );
			
			// catat log ke database
			$this->model_history->set_log_create("ID yang diaktivasi = ".$id , "tblaktiv");
			
			// masukan data ke tabel aktivasi
			$this->model_nonaktif->aktivasi($data_aktiv);

			// update status aktivnya terhadap barang
			$st = array('status' => 1);
			$this->model_nonaktif->update_status($id , $st , $this->getTableName($id));

			// hapus dari tabel non aktiv
			$this->model_nonaktif->delete($id);

			// update lokasinya terhadap barangnya
			$lokasi = array ('penempatan' => $lokasi);
			$this->model_nonaktif->update_status($id , $lokasi,$this->getTableName($id));

			// set notifikasi
			$this->session->set_flashdata('notif', 'Aktivasi berhasil dilakukan');
			redirect('manajer_nonaktif/view');
	}

	public function view_aktivasi ()
	{
		$data['data_log_aktif'] = $this->model_nonaktif->get_data_aktiv();
		$data['konten'] = "vw_log/view_log_aktiv";

		$this->load->view('main_dashboard', $data);
	}

	public function nonaktif_opname ()
	{
		$tgl =  $this->input->post('txt_tanggal');
		$kode = $this->input->post('txt_id');
		$sebab = $this->input->post('txt_sebab');
		$lokasi = $this->input->post('txt_lokasi');

		$data_input = array();

		$data_input[0]['id_barang'] = $kode;
		$data_input[0]['tanggal'] = $tgl;
		$data_input[0]['sebab'] = $sebab;
		$data_input[0]['keterangan'] = $lokasi;

		
		
		// update status di tabel tiap barang
		$this->model_nonaktif->update_status($kode , array('status' => 0) , $this->getTableName($kode));
		

		// catat ke log
		$this->model_history->set_log_create("ID yang dinonaktifkan = ".$kode , "tblnonaktif");

		// simpan ke tabel nonaktif
		$this->model_nonaktif->create($data_input);

		// update pada tabel opname
		$this->model_opname->update_status($kode);

		// set notifikasi
		$this->session->set_flashdata('notif', 'Data Berhasil Dinonaktifkan.');
		
		redirect('manajer_opname/view');
	}
}

/* End of file manajer_nonaktif.php */
/* Location: ./application/controllers/manajer_nonaktif.php */