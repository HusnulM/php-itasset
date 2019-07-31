<?php

class Assetkat extends Controller {

	public function __construct(){
		if( isset($_SESSION['usr']) ){

		}else{
			header('location:'. BASEURL);
		}
	}

	public function index()
	{
		$data['title'] = 'IT Asset - Maintain Asset Category';
		$data['menu'] = 'Asset Category';
		$data['menu-dsc'] = 'Maintain Asset Category';
		$data['rdata'] = $this->model('Assetkat_model')->getAllAssetCat();
		$this->view('templates/header_a', $data);
		$this->view('assetkat/index', $data);
		$this->view('templates/footer_a');
		
	}

	public function add(){
		$data['title'] = 'IT Asset - Create Asset Category';
		$data['menu'] = 'Asset Category';
		$data['menu-dsc'] = 'Create Asset Category';
		$this->view('templates/header_a', $data);
		$this->view('assetkat/add', $data);
		$this->view('templates/footer_a');
	}

	public function create(){
		$data['rdata'] = $this->model('Assetkat_model')->getMaxID();		
		$maxID =  $data['rdata']['assetkat'] + 1;

		if( $this->model('Assetkat_model')->saveData($maxID, $_POST) > 0 ) {
			Flasher::setMessage('New Asset Category Successfully','Created','success');
			header('location: '. BASEURL . '/assetkat');
			exit;			
		}else{
			Flasher::setMessage('Failed,','Check your input','danger');
			header('location: '. BASEURL . '/assetkat');
			exit;	
		}
	}

	// public function list(){
	// 	$data['title'] = 'IT Asset - Maintain Asset Category';
	// 	$data['menu'] = 'Asset Category';
	// 	$data['menu-dsc'] = 'Maintain Asset Category';
	// 	$data['rdata'] = $this->model('Assetkat_model')->getAllEmployee();

	// 	$this->view('templates/header_a', $data);
	// 	$this->view('assetkat/asset-list', $data);
	// 	$this->view('templates/footer_a');
	// }

	public function hapusData($id){
		if( $this->model('Assetkat_model')->deleteData($id) > 0 ) {
			Flasher::setMessage('Asset Category Successfully','Deleted','success');
			header('location: '. BASEURL . '/assetkat');
			exit;			
		}else{
			Flasher::setMessage('Error','Delete Data','danger');
			header('location: '. BASEURL . '/assetkat');
			exit;	
		}
	}
}