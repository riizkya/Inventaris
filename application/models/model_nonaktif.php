<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_nonaktif extends CI_Model {

	public function create($barang)
	{
		return $this->db->insert_batch('tblnonaktif',$barang);
	}

	public function get_all_data($tbn)
	{
		if ($tbn=="tblhardware")
		{
			$col_nm = "nama_hardware";	
		}
		else
		{
			$col_nm = "keterangan";
		}
		
		// "SELECT * FROM users u JOIN profiles p ON p.user_id = u.id"
		//$hasil = $this->db->get('users');
		//$hasil = $this->db->query("SELECT * FROM users u JOIN profiles p ON p.user_id = u.id");
		$hasil = $this->db->select('tbn.tanggal,tbn.id_barang,tbk.'.$col_nm.' AS ket_br , tbn.keterangan AS ket_no , sebab')
						  ->from('tblnonaktif tbn')
						  ->join($tbn.' tbk','id_barang')
						  ->get();

		//$SQL = "SELECT tbm.tanggal , tbm.id_barang , tbm.tujuan_aw , tbm.tujuan_ak , tbk.keterangan FROM tblmutasi tbm INNER JOIN tblkomputer tbk USING (id_barang)";
		
		return $hasil;
	}

	public function get_all_data_between($tbn , $dt1 , $dt2)
	{
		if ($tbn=="tblhardware")
		{
			$col_nm = "nama_hardware";	
		}
		else
		{
			$col_nm = "keterangan";
		}
		
		// keterangan
		// status 1 = opname dalam proses
		// status 0 = proses opname selesai
		$whre = "tbn.tanggal BETWEEN '".$dt1."' AND '".$dt2."'";
		$hasil = $this->db->select('tbn.tanggal,tbn.id_barang,tbk.'.$col_nm.' AS ket_br , tbn.keterangan AS ket_no , sebab')
						  ->from('tblnonaktif tbn')
						  ->join($tbn.' tbk','id_barang')
						  ->where($whre)
						  ->get();

		//$SQL = "SELECT tbm.tanggal , tbm.id_barang , tbm.tujuan_aw , tbm.tujuan_ak , tbk.keterangan FROM tblmutasi tbm INNER JOIN tblkomputer tbk USING (id_barang)";
		
		return $hasil;
	}

	public function update_status($id , $status , $tbl)
	{
		$id_select = 'id_barang = \''.$id.'\'';
		return $this->db->update($tbl,$status , $id_select);
	}

	public function delete($id)
	{
		return $this->db->delete('tblnonaktif' , array('id_barang' => $id));
	}
	
	public function get_count_data()
	{
		$query = $this->db->query('SELECT * FROM tblnonaktif');
		return $query->num_rows(); 
	}

	public function get_count_data_attr($id)
	{
		$query = $this->db->query('SELECT id_barang FROM tblnonaktif where id_barang like \'%'.$id.'%\'');
		return $query->num_rows(); 
	}

	public function aktivasi($data_aktiv)
	{
		return $this->db->insert('tblaktiv',$data_aktiv);
	}

	public function get_data_aktiv ()
	{
		return $this->db->get('tblaktiv');
	}
}

/* End of file model_nonaktif.php */
/* Location: ./application/models/model_nonaktif.php */