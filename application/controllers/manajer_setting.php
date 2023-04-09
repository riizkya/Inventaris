<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajer_setting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_setting');
		if (!isset($_SESSION['username']))
			redirect('auth');
		//Do your magic here
	}
	public function index()
	{
		$data['konten'] = "view_setting";
		$data['data_signature'] = $this->model_setting->get_all_data();


		$this->load->view('main_dashboard', $data);

		
	}

	public function update ()
	{
		$nama1 = $this->input->post('txt_nama1');
		$nama2 = $this->input->post('txt_nama2');
		$nama3 = $this->input->post('txt_nama3');

		$jabatan1 = $this->input->post('txt_jabatan1');
		$jabatan2 = $this->input->post('txt_jabatan2');
		$jabatan3 = $this->input->post('txt_jabatan3');

		$data_input = array(
				'nama1' =>$nama1,
				'nama2' =>$nama2,
				'nama3' =>$nama3,
				'jabatan1' =>$jabatan1,
				'jabatan2' =>$jabatan2,
				'jabatan3' =>$jabatan3
			);

		$this->model_setting->edit($data_input);

		// set notifikasi
			$this->session->set_flashdata('notif', 'Perubahan Signature telah tersimpan');
		redirect('manajer_setting');
	}

	public function update_tgl()
	{
		$rentang = $this->input->post('rad_kondisi');
		$tgl_aw = $this->input->post('txt_tanggal_aw');
		$tgl_ak = $this->input->post('txt_tanggal_ak');

		if ($rentang==1)
		{
			$data_input = array(
				'use' => $rentang,
				'tgl_awal' => $tgl_aw,
				'tgl_akhir' => $tgl_ak
			);
		}
		else
		{
			$data_input = array(
				'use' => $rentang
			);
		}
		

		$this->model_setting->edit($data_input);

		// set notifikasi
			$this->session->set_flashdata('notif', 'Perubahan Rentang Tanggal telah tersimpan');
		redirect('manajer_setting');
	}

}

/* End of file manajer_setting.php */
/* Location: ./application/controllers/manajer_setting.php */