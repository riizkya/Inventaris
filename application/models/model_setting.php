<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_setting extends CI_Model {

	public function get_all_data()
	{
		$hasil = $this->db->get('tblsignature');
		return $hasil->row();
	}	

	public function edit ($data_edit)
	{
		$id_select = 'no = 1';
		return $this->db->update('tblsignature',$data_edit , $id_select);
	}

}

/* End of file model_setting.php */
/* Location: ./application/models/model_setting.php */