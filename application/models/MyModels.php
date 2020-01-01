<?php 

/**
 * 
 */
class MyModels extends CI_Model
{
	
	public function get_mhs()
	{
		return $this->db->get('mahasiswa')->result_array();
	}
}