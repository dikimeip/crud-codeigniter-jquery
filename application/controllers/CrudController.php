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
		$data = [
			'nama' => $this->input->post('nama'),
			'kelas' => $this->input->post('kelas'),
			'alamat' => $this->input->post('alamat'),
		];
		$query = $this->Model->input_data($data);
		if ($query) {
			$res = [
				'status' => 1,
				'data' => 'Inpt Data Finish'
			];
		} else {
			$res = [
				'status' => 0,
				'data' => 'Inpt Data Vailed'
			];
		}

		echo json_encode($res);
		
	}

	public function edit_data()
	{
		$id = $this->input->post('id');
		$query = $this->Model->show_datas($id);
		echo json_encode($query);
	}

	public function do_edit()
	{
		$data = [
			'nama' => $this->input->post('nama'),
			'kelas' => $this->input->post('kelas'),
			'alamat' => $this->input->post('alamat'),
		];
		$id = $this->input->post('id');
		$query = $this->Model->ubah_data($id,$data);
		if ($query) {
			$res = [
				'status' => 1,
				'data' => 'Inpt Data Finish'
			];
		} else {
			$res = [
				'status' => 0,
				'data' => 'Inpt Data Vailed'
			];
		}

		echo json_encode($res);
	}

	public function hapus()
	{
		$id = $this->input->post('id');
		$query = $this->Model->hapus($id);
		if ($query) {
			$res = [
				'status' => 1,
				'data' => 'Inpt Data Finish'
			];
		} else {
			$res = [
				'status' => 0,
				'data' => 'Inpt Data Vailed'
			];
		}

		echo json_encode($res);
	}
}