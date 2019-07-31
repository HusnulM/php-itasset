<?php

class User extends Controller{

	public function __construct(){
		if( isset($_SESSION['usr']) ){}
		else{
			header('location:'. BASEURL);
		}
	}

	public function index(){
		$data['title'] = 'IT-Asset Maintain User';
		$data['menu'] = 'User';
		$data['menu-dsc'] = 'Maintain User';
		$data['rdata'] = $this->model('User_model')->userList();

		$this->view('templates/header_a', $data);
		$this->view('user/index', $data);
		$this->view('templates/footer_a');
	}

	public function create(){
		$data['title'] = 'IT-Asset Create User';
		$data['menu'] = 'User';
		$data['menu-dsc'] = 'Create User';

		$this->view('templates/header_a', $data);
		$this->view('user/create', $data);
		$this->view('templates/footer_a');
	}

	public function register(){
		if( $this->model('User_model')->register($_POST) > 0 ) {
			Flasher::setMessage('User Successfully','Created','success');
			header('location: '. BASEURL .'/user');
			exit;			
		}else if( $this->model('User_model')->register($_POST) == 'X' ) {
			Flasher::setMessage('Error,','User Already Registered','danger');
			header('location: '. BASEURL .'/user/create' );
			exit;			
		}else{
			Flasher::setMessage('Error','Check your input','danger');
			header('location: '. BASEURL .'/user/create');
			exit;	
		}
	}

	public function hapusData($id){
		if( $this->model('User_model')->deleteData($id) > 0 ) {
			Flasher::setMessage('User Successfully','Deleted','success');
			header('location: '. BASEURL . '/user');
			exit;			
		}else{
			Flasher::setMessage('Error','Delete Data','danger');
			header('location: '. BASEURL . '/user');
			exit;	
		}
	}
}