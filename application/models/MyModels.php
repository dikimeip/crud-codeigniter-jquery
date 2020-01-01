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

	public function input_data($data)
	{
		return $this->db->insert('mahasiswa',$data);
	}

	public function show_datas($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('mahasiswa')->row_array();
	}

	public function ubah_data($id,$data)
	{
		$this->db->where('id',$id);
		return $this->db->update('mahasiswa',$data);
	}
}