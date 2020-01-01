<?php  

/**
 * 
 */
class CrudController extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('MyModels','Model');
	}

	public function index()
	{
		$this->load->view('dasboard');
	}

	public function showData()
	{
		$data = $this->Model->get_mhs();
		if ($data) {
			$res = [
				'status' => 1,
				'data' => $data
			];
		} else {
			$res = [
				'status' => 0,
				'data' => 'Get Data Filed'
			];
		}
		echo json_encode($res);
	}

	public function tambah()
	{
		$nama = $this->input->post('nama');
		$kelas = $this->input->post('kelas');
		$alamat = $this->input->post('alamat');
		echo json_encode($alamat);
		// if (condition) {
		// 	# code...
		// }
	}
}