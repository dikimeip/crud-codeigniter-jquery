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
}