<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_server extends CI_Model {

	public function get_all_data()
	{
		// "SELECT * FROM users u JOIN profiles p ON p.user_id = u.id"
		//$hasil = $this->db->get('users');
		//$hasil = $this->db->query("SELECT * FROM users u JOIN profiles p ON p.user_id = u.id");
		//$hasil = $this->db->select('u.username, p.*')
		//				  ->from('users u')
		//				  ->join('profiles p','p.user_id = u.id')
		//				  ->get();
		$hasil = $this->db->get_where('tblserver' , array('status' => 1));
		return $hasil;
		
	}
	
	public function get_data_spec()
	{
		$this->db->select('id_barang, keterangan, tanggal , penempatan , kondisi');
		$this->db->where('status' , 1);

		$query = $this->db->get('tblserver');

		return $query;
	}

	public function get_data($id)
	{
		$hasil = $this->db->select('*')
						  ->from('tblserver')
						  ->where('id_barang',$id)
						  ->limit(1)
						  ->get();
		return $hasil->row();
	}

	public function get_penempatan()
	{	

		return $this->db->query('SELECT penempatan FROM tblserver GROUP BY penempatan');
	}
	
	public function create($data_server)
	{
		return $this->db->insert('tblserver',$data_server);
	}
	
	public function update($id,$data_server)
	{
		$id_select = 'id_barang = \''.$id.'\'';
		return $this->db->update('tblserver',$data_server , $id_select);
	}
	
	public function delete($id)
	{
		// DELETE FROM users WHERE id = $id;
		// DELETE FROM profiles WHERE user_id = $id;
		return $this->db->delete('tblserver' , array('id_barang' => $id));
	}

	public function getmaxID ()
	{
		$hasil = $this->db->query ("SELECT `AUTO_INCREMENT`
FROM  INFORMATION_SCHEMA.TABLES
WHERE TABLE_SCHEMA = 'dbperangkat'
AND   TABLE_NAME   = 'tblserver'");
		
		return $hasil->row();
	}

	public function get_count_data()
	{
		$query = $this->db->query('SELECT * FROM tblserver where status = 1');

		return $query->num_rows(); 
	}

	public function get_count_data_attr($kondisi)
	{
		$query = $this->db->query('SELECT * FROM tblserver where status = 1 and kondisi = \''.$kondisi.'\'');

		return $query->num_rows(); 
	}	
}