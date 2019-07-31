<?php

class Location extends Controller {

	public function __construct(){
		if( isset($_SESSION['usr']) ){

		}else{
			header('location:'. BASEURL);
		}
	}

	public function index()
	{
		$data['title'] = 'IT Asset - Maintain Asset Location';
		$data['menu'] = 'Asset Location';
		$data['menu-dsc'] = 'Maintain Asset Location';
		$data['rdata'] = $this->model('Location_model')->getAllData();
		$this->view('templates/header_a', $data);
		$this->view('location/index', $data);
		$this->view('templates/footer_a');
		
	}

	public function add(){
		$data['title'] = 'IT Asset - Create Asset Location';
		$data['menu'] = 'Asset Location';
		$data['menu-dsc'] = 'Create Asset Location';
		$this->view('templates/header_a', $data);
		$this->view('location/add', $data);
		$this->view('templates/footer_a');
	}

	public function create(){
		$data['rdata'] = $this->model('Location_model')->getMaxID();		
		$maxID =  $data['rdata']['location'] + 1;

		if($maxID == 1){
			$maxID = '3000000000';
		}

		if( $this->model('Location_model')->saveData($maxID, $_POST) > 0 ) {
			Flasher::setMessage('New Location Successfully','Created','success');
			header('location: '. BASEURL . '/location');
			exit;			
		}else{
			Flasher::setMessage('Failed,','Check your input','danger');
			header('location: '. BASEURL . '/location');
			exit;	
		}
	}

	public function hapusData($id){
		if( $this->model('Location_model')->deleteData($id) > 0 ) {
			Flasher::setMessage('Location Successfully','Deleted','success');
			header('location: '. BASEURL . '/location');
			exit;			
		}else{
			Flasher::setMessage('Error','Delete Data','danger');
			header('location: '. BASEURL . '/location');
			exit;	
		}
	}
}