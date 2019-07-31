<?php

class Asset extends Controller{

	public function __construct(){
		if( isset($_SESSION['usr']) ){}
		else{
			header('location:'. BASEURL);
		}
	}

	public function index(){
		$data['title'] = 'IT Asset - Create Asset';
		$data['menu'] = 'Create Asset';
		$data['menu-dsc'] = 'New Asset';
		
		$data['runit'] = $this->model('Asset_model')->getUnit();
		$data['stts'] = $this->model('Asset_model')->getAssetStatus();
		$data['asetkat'] = $this->model('Assetkat_model')->getAllAssetCat();
		$data['location'] = $this->model('Location_model')->getAllData();

		$this->view('templates/header_a', $data);
		$this->view('asset/index', $data);
		$this->view('templates/footer_a');
	}


	public function create(){

		// var_dump($_POST);
		$data['assetnm'] = $this->model('Asset_model')->getLastAssetNum();		
		$assetNum =  $data['assetnm']['assetNum'] + 1;

		if($assetNum == 1){
			$assetNum = "1000000001";
		}

		if( $this->model('Asset_model')->saveAsset($assetNum, $_POST) > 0 ) {
			Flasher::setMessage('Asset ' . $assetNum,' Created','success');
			header('location: '. BASEURL . '/asset');
			exit;			
		}else{
			Flasher::setMessage('Failed,','Check your input','danger');
			header('location: '. BASEURL . '/asset');
			exit;	
		}
	}

	public function change(){
		$data['title'] = 'IT Asset - Change Asset';
		$data['menu'] = 'Asset';
		$data['menu-dsc'] = 'Change Asset';
		// $data['rdata'] = $this->model('Asset_model')->getAllAssetCat();

		$data['runit'] = $this->model('Asset_model')->getUnit();
		$data['stts'] = $this->model('Asset_model')->getAssetStatus();
		$data['asetkat'] = $this->model('Assetkat_model')->getAllAssetCat();
		$data['location'] = $this->model('Location_model')->getAllData();
		$data['asset'] = $this->model('Asset_model')->getAsset();

		$this->view('templates/header_a', $data);
		$this->view('asset/change', $data);
		$this->view('templates/footer_a');
	}


	public function display(){
		$data['title'] = 'IT Asset - Display Asset';
		$data['menu'] = 'Display Asset';
		$data['menu-dsc'] = 'Display Asset';
		$data['asset'] = $this->model('Asset_model')->getAsset();
		$this->view('templates/header_a', $data);
		$this->view('asset/display', $data);
		$this->view('templates/footer_a');
	}

	public function details($assnum){
		$data['asset'] = $this->model('Asset_model')->getAssetById($assnum);
		header('Content-Type: application/json');
		echo json_encode($data['asset']);
	}
}