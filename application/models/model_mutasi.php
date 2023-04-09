<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_mutasi extends CI_Model {

	public function create($data_user)
	{
		return $this->db->insert_batch('tblmutasi',$data_user);
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
		$hasil = $this->db->select('tbm.tanggal,tbm.id_barang,'.$col_nm.',tbm.tujuan_aw,tbm.tujuan_ak,')
						  ->from('tblmutasi tbm')
						  ->join($tbn,'id_barang')
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
		$whre = "tbm.tanggal BETWEEN '".$dt1."' AND '".$dt2."'";
		$hasil = $this->db->select('tbm.tanggal,tbm.id_barang,'.$col_nm.',tbm.tujuan_aw,tbm.tujuan_ak,')
						  ->from('tblmutasi tbm')
						  ->join($tbn,'id_barang')
						  ->where($whre)
						  ->get();

		//$SQL = "SELECT tbm.tanggal , tbm.id_barang , tbm.tujuan_aw , tbm.tujuan_ak , tbk.keterangan FROM tblmutasi tbm INNER JOIN tblkomputer tbk USING (id_barang)";
		
		return $hasil;
	}

	public function update_tempat($id,$data_tempat,$tbl)
	{
		$id_select = 'id_barang = \''.$id.'\'';
		return $this->db->update($tbl,$data_tempat , $id_select);
	}
}

/* End of file model_proc.php */
/* Location: ./application/models/model_proc.php */