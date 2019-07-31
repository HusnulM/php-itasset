<?php

class Unit extends Controller {

	public function __construct(){
		if( isset($_SESSION['usr']) ){

		}else{
			header('location:'. BASEURL);
		}
	}

	public function index()
	{
		$data['title'] = 'IT Asset - Maintain Asset Unit';
		$data['menu'] = 'Asset Unit';
		$data['menu-dsc'] = 'Maintain Asset Unit';
		$data['rdata'] = $this->model('Unit_model')->getAllData();
		$this->view('templates/header_a', $data);
		$this->view('unit/index', $data);
		$this->view('templates/footer_a');
		
	}

	public function add(){
		$data['title'] = 'IT Asset - Create Asset Unit';
		$data['menu'] = 'Asset Unit';
		$data['menu-dsc'] = 'Create Asset Unit';
		$this->view('templates/header_a', $data);
		$this->view('unit/add', $data);
		$this->view('templates/footer_a');
	}

	public function create(){
		// $data['rdata'] = $this->model('Unit_model')->getMaxID();		
		// $maxID =  $data['rdata']['location'] + 1;

		// if($maxID == 1){
		// 	$maxID = '3000000000';
		// }

		if( $this->model('Unit_model')->saveData($_POST) > 0 ) {
			Flasher::setMessage('New Unit Successfully','Created','success');
			header('location: '. BASEURL . '/unit');
			exit;			
		}else{
			Flasher::setMessage('Failed,','Check your input','danger');
			header('location: '. BASEURL . '/unit');
			exit;	
		}
	}

	public function hapusData($id){
		if( $this->model('Unit_model')->deleteData($id) > 0 ) {
			Flasher::setMessage('Unit Successfully','Deleted','success');
			header('location: '. BASEURL . '/unit');
			exit;			
		}else{
			Flasher::setMessage('Error','Delete Data','danger');
			header('location: '. BASEURL . '/unit');
			exit;	
		}
	}
}