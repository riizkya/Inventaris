<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_pc extends CI_Model {

	public function get_all_data()
	{
		// "SELECT * FROM users u JOIN profiles p ON p.user_id = u.id"
		//$hasil = $this->db->get('users');
		//$hasil = $this->db->query("SELECT * FROM users u JOIN profiles p ON p.user_id = u.id");
		//$hasil = $this->db->select('u.username, p.*')
		//				  ->from('users u')
		//				  ->join('profiles p','p.user_id = u.id')
		//				  ->get();
		$hasil = $this->db->get_where('tblkomputer' , array('status' => 1));
		return $hasil;
		
	}
	
	public function get_data_spec()
	{
		$this->db->select('id_barang, keterangan, tanggal , penempatan , kondisi');
		$this->db->where('status' , 1);

		$query = $this->db->get('tblkomputer');

		return $query;
	}

	public function get_data($id)
	{
		$hasil = $this->db->select('*')
						  ->from('tblkomputer')
						  ->where('id_barang',$id)
						  ->limit(1)
						  ->get();
		return $hasil->row();
	}
	
	public function get_penempatan()
	{	

		return $this->db->query('SELECT penempatan FROM tblkomputer GROUP BY penempatan');
	}

	public function create($data_komp)
	{
		return $this->db->insert('tblkomputer',$data_komp);
	}
	
	public function update($id,$data_komp)
	{
		$id_select = 'id_barang = \''.$id.'\'';
		return $this->db->update('tblkomputer',$data_komp , $id_select);
	}
	
	public function delete($id)
	{
		// DELETE FROM users WHERE id = $id;
		// DELETE FROM profiles WHERE user_id = $id;
		return $this->db->delete('tblkomputer' , array('id_barang' => $id));
	}

	public function getmaxID ()
	{
		$hasil = $this->db->query ("SELECT `AUTO_INCREMENT`
FROM  INFORMATION_SCHEMA.TABLES
WHERE TABLE_SCHEMA = 'dbperangkat'
AND   TABLE_NAME   = 'tblkomputer'");
		
		return $hasil->row();
	}

	public function get_count_data()
	{
		$query = $this->db->query('SELECT * FROM tblkomputer where status = 1');

		return $query->num_rows(); 
	}

	public function get_count_data_attr($kondisi)
	{
		$query = $this->db->query('SELECT * FROM tblkomputer where status = 1 AND kondisi = \''.$kondisi.'\'');

		return $query->num_rows(); 
	}	
}