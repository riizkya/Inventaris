<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function login($username , $pass)
	{
		$cek = $this->db->get_where('tbluser',array('username'=>$username , 'password'=>md5($pass)));

		if ($cek->num_rows()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function update ($usrnm , $data_user)
	{
		$user_select = 'username = \''.$usrnm.'\'';
		return $this->db->update('tbluser',$data_user , $user_select);
	}

	public function create ($data_user)
	{
		return $this->db->insert('tbluser',$data_user);
	}

	public function delete($usrnm)
	{
		return $this->db->delete('tbluser' , array('username' => $usrnm));
	}

	public function get_all_user()
	{
		$hasil = $this->db->get('tbluser');
		return $hasil;
	}

	public function get_user($username)
	{
		$hasil = $this->db->select('*')
						  ->from('tbluser')
						  ->where('username',$username)
						  ->limit(1)
						  ->get();
		return $hasil->row();
	}

	public function isUsernameExist($username) 
	{
	    $this->db->select('username');
	    $this->db->where('username', $username);
	    $query = $this->db->get('tbluser');

	    if ($query->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}

	public function UsernameFormat($username)
	{
		if (ctype_alnum($username))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function KontakFormat($kontak)
	{
		if (ctype_digit($kontak))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

}

/* End of file model_user.php */
/* Location: ./application/models/model_user.php */