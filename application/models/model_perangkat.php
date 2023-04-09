<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_perangkat extends CI_Model {

	public function get_all_data()
	{
		// "SELECT * FROM users u JOIN profiles p ON p.user_id = u.id"
		//$hasil = $this->db->get('users');
		//$hasil = $this->db->query("SELECT * FROM users u JOIN profiles p ON p.user_id = u.id");
		//$hasil = $this->db->select('u.username, p.*')
		//				  ->from('users u')
		//				  ->join('profiles p','p.user_id = u.id')
		//				  ->get();
		$hasil = $this->db->get_where('tblhardware' , array('status' => 1));
		return $hasil;
	}

	public function get_data_spec()
	{
		$this->db->select('id_barang, nama_hardware, tanggal , penempatan , kondisi');
		$this->db->where('status' , 1);

		$query = $this->db->get('tblhardware');

		return $query;
	}
	/*
	public function get_all_data_arr()
	{
		$hasil = $this->db->get_where('tblhardware' , array('status' => 1));
		
		$res = array();
		$row = 0;
	
		foreach ($hasil->result() as $val ) 
		{
			$res[$row][0] = $val->id_barang;
			$res[$row][1] = $val->nama_hardware;
			$res[$row][2] = $val->tanggal;
			$res[$row][3] = $val->penempatan;
			$res[$row][4] = $val->kegunaan;
			$res[$row][5] = $val->id_baran;
				
		}

		return $hasil;

	}
	*/
	public function get_data($id)
	{
		$hasil = $this->db->select('*')
						  ->from('tblhardware')
						  ->where('id_barang',$id)
						  ->limit(1)
						  ->get();
		return $hasil->row();
	}
	
	public function get_penempatan()
	{	

		return $this->db->query('SELECT penempatan FROM tblhardware GROUP BY penempatan');
	}

	public function create($data_user)
	{
		return $this->db->insert('tblhardware',$data_user);
	}
	
	public function update($id,$data_user)
	{
		$id_select = 'id_barang = \''.$id.'\'';
		return $this->db->update('tblhardware',$data_user , $id_select);
	}
	
	public function delete($id)
	{
		// DELETE FROM users WHERE id = $id;
		// DELETE FROM profiles WHERE user_id = $id;
		return $this->db->delete('tblhardware' , array('id_barang' => $id));
	}

	public function getmaxID ()
	{
		$hasil = $this->db->query ("SELECT `AUTO_INCREMENT`
FROM  INFORMATION_SCHEMA.TABLES
WHERE TABLE_SCHEMA = 'dbperangkat'
AND   TABLE_NAME   = 'tblhardware'");
		
		return $hasil->row();
	}

	public function get_count_data()
	{
		$query = $this->db->query('SELECT * FROM tblhardware where status = 1');

		return $query->num_rows(); 
	}

	public function get_count_data_attr($kondisi)
	{
		$query = $this->db->query('SELECT * FROM tblhardware where status = 1 and kondisi = \''.$kondisi.'\'');

		return $query->num_rows(); 
	}	
}