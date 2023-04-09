<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_history extends CI_Model {

	public function get_all_data()
	{
		return $this->db->get('tblhistory');	
	}

	public function set_log_create($value , $tblname)
	{
		$data = array(
				'user' => $_SESSION['username'],
				'tanggal' => date('Y-m-d H:i:s'),
				'kategori' => "CREATE",
				'tabel' => $tblname,
				'detail' => $value
 			);

		return $this->db->insert('tblhistory',$data);
	}
	
	public function set_log_edit($value, $tblname)
	{
		$data = array(
				'user' => $_SESSION['username'],
				'tanggal' => date('Y-m-d H:i:s'),
				'kategori' => "EDIT",
				'tabel' => $tblname,
				'detail' => $value
 			);

		return $this->db->insert('tblhistory',$data);
	}

	public function set_log_delet($value, $tblname)
	{
		$data = array(
				'user' => $_SESSION['username'],
				'tanggal' => date('Y-m-d H:i:s'),
				'kategori' => "DELETE",
				'tabel' => $tblname,
				'detail' => $value
 			);

		return $this->db->insert('tblhistory',$data);
	}

	public function set_log_login($value, $tblname)
	{
		$data = array(
				'user' => $_SESSION['username'],
				'tanggal' => date('Y-m-d H:i:s'),
				'kategori' => "LOGIN",
				'tabel' => $tblname,
				'detail' => $value
 			);

		return $this->db->insert('tblhistory',$data);
	}

	public function set_log_logout($value, $tblname)
	{
		$data = array(
				'user' => $_SESSION['username'],
				'tanggal' => date('Y-m-d H:i:s'),
				'kategori' => "LOGOUT",
				'tabel' => $tblname,
				'detail' => $value
 			);

		return $this->db->insert('tblhistory',$data);
	}

	public function indonesian_date ($timestamp = '', $date_format = 'l, j F Y | H:i', $suffix = 'WIB') 
	{
	    if (trim ($timestamp) == '')
	    {
	            $timestamp = time ();
	    }
	    elseif (!ctype_digit ($timestamp))
	    {
	        $timestamp = strtotime ($timestamp);
	    }
	    # remove S (st,nd,rd,th) there are no such things in indonesia :p
	    $date_format = preg_replace ("/S/", "", $date_format);
	    $pattern = array (
	        '/Mon[^day]/','/Tue[^sday]/','/Wed[^nesday]/','/Thu[^rsday]/',
	        '/Fri[^day]/','/Sat[^urday]/','/Sun[^day]/','/Monday/','/Tuesday/',
	        '/Wednesday/','/Thursday/','/Friday/','/Saturday/','/Sunday/',
	        '/Jan[^uary]/','/Feb[^ruary]/','/Mar[^ch]/','/Apr[^il]/','/May/',
	        '/Jun[^e]/','/Jul[^y]/','/Aug[^ust]/','/Sep[^tember]/','/Oct[^ober]/',
	        '/Nov[^ember]/','/Dec[^ember]/','/January/','/February/','/March/',
	        '/April/','/June/','/July/','/August/','/September/','/October/',
	        '/November/','/December/',
	    );
	    $replace = array ( 'Sen','Sel','Rab','Kam','Jum','Sab','Min',
	        'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu',
	        'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des',
	        'Januari','Februari','Maret','April','Juni','Juli','Agustus','Sepember',
	        'Oktober','November','Desember',
	    );
	    $date = date ($date_format, $timestamp);
	    $date = preg_replace ($pattern, $replace, $date);
	    $date = "{$date} {$suffix}";
	    return $date;
	}
}

/* End of file model_history.php */
/* Location: ./application/models/model_history.php */