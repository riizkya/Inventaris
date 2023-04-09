<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajer_user extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_user');
		$this->load->model('model_history');
		if (!isset($_SESSION['username']))
			redirect('auth');
		
		//Do your magic here
	}

	public function index()
	{
		
		//echo "<script>  </script>";
		$data['data_us'] = 	$this->model_user->get_all_user();
		$data['konten'] = "vw_user/user_management";

		$this->load->view('main_dashboard', $data);
	}

	public function update()
	{
		    
			$nama = $this->input->post('txt_nama');
			$jabatan = $this->input->post ('txt_jabatan');
			$username = $this->input->post ('txt_username');
			$pass = $this->input->post ('txt_pass');
			$priv = $this->input->post ('rad_priv');
			$email = $this->input->post ('txt_email');
			$kontak = $this->input->post ('txt_kontak');

			if ($pass == "")
			{				
				$data_user = array(
							'privilege' => $priv,
							'username' => $username,
							'nama' => $nama,
							'jabatan' => $jabatan,
							'email' =>$email,
							'kontak' => $kontak
						 );
			}
			else
			{
				$data_user = array(
							'privilege' => $priv,
							'username' => $username,
							'password' => md5($pass),
							'nama' => $nama,
							'jabatan' => $jabatan,
							'email' =>$email,
							'kontak' => $kontak
						 );
			}

			// catat log history ke database
			$this->model_history->set_log_edit("username yang diedit = ".$username , "tbluser");
			
			$this->model_user->update($username,$data_user);

			// set notifikasi
			$this->session->set_flashdata('notif', 'Data Berhasil Diedit.');
			redirect('manajer_user');
		
	}

	public function update_profil()
	{
		    
			$nama = $this->input->post('txt_nama');
			$jabatan = $this->input->post ('txt_jabatan');
			$username = $this->input->post ('txt_username');
			$pass = $this->input->post ('txt_pass');
			$email = $this->input->post ('txt_email');
			$kontak = $this->input->post ('txt_kontak');

			if ($pass == "")
			{				
				$data_user = array(
							'username' => $username,
							'nama' => $nama,
							'jabatan' => $jabatan,
							'email' =>$email,
							'kontak' => $kontak
						 );
			}
			else
			{
				$data_user = array(
							'username' => $username,
							'password' => md5($pass),
							'nama' => $nama,
							'jabatan' => $jabatan,
							'email' =>$email,
							'kontak' => $kontak
						 );
			}

			// catat log history ke database
			$this->model_history->set_log_edit("username yang diedit = ".$username , "tbluser");

			$this->model_user->update($username,$data_user);

			// set notifikasi
			$this->session->set_flashdata('notif', 'Data Berhasil Diedit.');
			redirect('manajer_user/view_profile');
		
	}

	public function delete($usrnm)
	{
		$this->model_user->delete($usrnm);

		// catat log history ke database
		$this->model_history->set_log_delet("username yang dihapus = ".$usrnm , "tbluser");

		// set notifikasi
			$this->session->set_flashdata('notif', 'Data Berhasil Dihapus.');
		redirect('manajer_user');
	}

	public function create ()
	{
		$this->form_validation->set_rules('txt_username', 'Username', 'required|callback_isUsernameExist|callback_UsernameFormat');
		$this->form_validation->set_rules('txt_pass', 'Password', 'required');
		$this->form_validation->set_rules('txt_kontak', 'Kontak', 'callback_KontakFormat');
		
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['data_us'] = 	$this->model_user->get_all_user();
			$data['konten'] = "vw_user/user_management";

			$this->load->view('main_dashboard', $data);
		} 
		else 
		{

			$priv = $this->input->post('rad_priv');
			$usrnm = $this->input->post('txt_username');
			$pass = $this->input->post('txt_pass');
			$nama = $this->input->post('txt_nama');
			$jabatan = $this->input->post('txt_jabatan');
			$email = $this->input->post ('txt_email');
			$kontak = $this->input->post ('txt_kontak');

			$data_user = array(
							'privilege' => $priv,
							'username'  => $usrnm,
							'password'  => md5($pass),
							'nama'      => $nama,
							'jabatan'   => $jabatan,
							'email' =>$email,
							'kontak' => $kontak
						 );
			
			// catat log history ke database
			$this->model_history->set_log_create("Username yang dibuat = ".$usrnm , "tbluser");

			$this->model_user->create($data_user);

			// set notifikasi
			$this->session->set_flashdata('notif', 'Registrasi Akun Berhasil');
			redirect('manajer_user');
		}
	}

	public function view_profile()
	{
		$data['konten'] = "vw_user/view_profile";
		$data['data_user'] = $this->model_user->get_user($_SESSION['username']);

		$this->load->view('main_dashboard', $data);
	}

	public function isUsernameExist($username) 
	{
	    
	    $is_exist = $this->model_user->isUsernameExist($username);

	    if ($is_exist) 
	    {
	        $this->form_validation->set_message(
	            'isUsernameExist', 'Username sudah terdaftar.'
	        );    
	        return false;
	    } else {
	        return true;
	    }
	}

	public function UsernameFormat($username)
	{
		$is_valid = $this->model_user->UsernameFormat($username);

		if ($is_valid)
		{
			return true;
		}
		else
		{
			 $this->form_validation->set_message(
	            'UsernameFormat', 'Username hanya boleh mengandung karakter alfabet dan nomer.'
	        );    
			return false;
		}
	}

	public function KontakFormat($kontak)
	{
		$is_valid = $this->model_user->KontakFormat($kontak);

		if ($is_valid)
		{
			return true;
		}
		else
		{
			 $this->form_validation->set_message(
	            'KontakFormat', 'Kontak hanya boleh mengandung karakter angka.'
	        );    
			return false;
		}
	}

}

/* End of file manajer_user.php */
/* Location: ./application/controllers/manajer_user.php */