<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_opname extends CI_Model {

	public function create($barang)
	{
		return $this->db->insert_batch('tblopname',$barang);
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
		
		// keterangan
		// status 1 = opname dalam proses
		// status 0 = proses opname selesai
		$whre  = "tbp.status = 'PROSES'";
		$hasil = $this->db->select('tbp.tanggal_masuk,tbp.id_barang,tbk.'.$col_nm.' AS ket_br , tbp.keterangan AS ket_op')
						  ->from('tblopname tbp')
						  ->join($tbn.' tbk','id_barang')
						  ->where($whre)
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
		$whre  = "tbp.status = 'PROSES' AND tbp.tanggal_masuk BETWEEN '".$dt1."' AND '".$dt2."'";
		$hasil = $this->db->select('tbp.tanggal_masuk,tbp.id_barang,tbk.'.$col_nm.' AS ket_br , tbp.keterangan AS ket_op')
						  ->from('tblopname tbp')
						  ->join($tbn.' tbk','id_barang')
						  ->where($whre)
						  ->get();

		//$SQL = "SELECT tbm.tanggal , tbm.id_barang , tbm.tujuan_aw , tbm.tujuan_ak , tbk.keterangan FROM tblmutasi tbm INNER JOIN tblkomputer tbk USING (id_barang)";
		
		return $hasil;
	}

	public function delet ($id)
	{
		return $this->db->delete('tblopname' , array('id_barang' => $id));
	}

	public function update_status ($id)
	{
		$select_id = array('id_barang' => $id , 'status'=> 'PROSES');
		$data = array ('status' => 'SELESAI' , 'tanggal_selesai' => date("Y-m-d"));

		$hasil = $this->db->where ($select_id)
						  ->update('tblopname',$data);

		return $hasil;
	}

	public function get_data_log()
	{
		$hasil = $this->db->get_where('tblopname' , array('status' => 'SELESAI'));
		return $hasil;
	}

	public function get_count_data_attr($id)
	{
		$query = $this->db->query('SELECT id_barang FROM tblopname where id_barang like \'%'.$id.'%\' AND status = \'PROSES\'');
		return $query->num_rows(); 
	}

	public function get_count_data()
	{
		$query = $this->db->query('SELECT * FROM tblopname where status = \'PROSES\'');
		return $query->num_rows(); 
	}
}

/* End of file model_opname.php */
/* Location: ./application/models/model_opname.php */