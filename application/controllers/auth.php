<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_user');
		$this->load->model('model_history');
		
	}

	public function index()
	{
		$this->load->view('form_login2');
		//echo "ada orangnya adalah = ".$_SESSION['username'];
	}

	public function login()
	{
		if (isset($_POST['btn_submit']))
		{
			$username = $this->input->post('txt_user');
			$pass = $this->input->post('txt_pass');

			$hasil = $this->model_user->login($username , $pass);
			if ($hasil)
			{
				$get_data = $this->model_user->get_user($username);

				$data_ses = array('nama' => $get_data->nama,  
						'jabatan' => $get_data->jabatan,
						'username' => $username, 
						'privilege' => $get_data->privilege
					);

				// catat log
				$this->model_history->set_log_login("Username = ".$username." ,berhasil Login" , "tbluser");

				$this->session->set_userdata($data_ses);
				
				
				redirect('dashboard');
				
			}
			else
			{
				$this->session->set_flashdata('notif', 'Username atau Password tidak cocok');
				$this->load->view('form_login2');
			}

		}
		else
		{

			$this->load->view('form_login');
		}
	}

	public function logout()
	{
		// catat log
		$this->model_history->set_log_logout("Username = ".$_SESSION['username']." ,berhasil Logout" , "tbluser");

		$this->session->sess_destroy();
		redirect('auth','refresh');
	}
	

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */