<?php

class Home extends Controller {

	public function index()
	{
		if( isset($_SESSION['usr']) ){
			// $data['nama'] = $this->model('User_model')->getUser();
			$data['title'] = 'IT-Asset Management Dashboard';
			$data['menu'] = 'Dashboard';
			$data['menu-dsc'] = 'overview';
			$this->view('templates/header_a', $data);
			$this->view('dashboard/index', $data);
			$this->view('templates/footer_a');
		}else{
			$data['title'] = 'IT-Asset Management';
			$this->view('templates/header', $data);
			$this->view('home/index', $data);
			$this->view('templates/footer');
		}
	}

	public function results()
	{
		$data['title'] = 'Bookmark Search Results';
		$data['src'] = $_POST['search'];
		$data['results'] = $this->model('Home_model')->searchBookMark($_POST);
		$this->view('templates/header', $data);
		$this->view('home/results', $data);
		$this->view('templates/footer');
	}

	public function members(){
		$data['user'] = $this->model('Home_model')->login($_POST);
		// echo var_dump($data['user']);
		if($data['user'] === false){
			Flasher::setMessage('','Password Salah','danger');
			header('location: '. BASEURL );
		}else if($data['user'] == 'X'){
			Flasher::setMessage('','User Belum Terdaftar','danger');
			header('location: '. BASEURL );
		}else{
			Auth::setLoginSession($data['user']['username'],$data['user']['password'],'');
			// Flasher::setMessage('','Login Berhasil','success');
			header('location: '. BASEURL );
		}
	}

	public function logout(){
		unset($_SESSION['usr']);
		Flasher::setMessage('','System Logout','success');
		header('location: '. BASEURL);
	}

	public function register(){
		if( $this->model('Home_model')->register($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','','success');
			header('location: '. BASEURL );
			exit;			
		}else if( $this->model('Home_model')->register($_POST) == 'X' ) {
			Flasher::setMessage('Gagal',', User Sudah Terdaftar','danger');
			header('location: '. BASEURL );
			exit;			
		}else{
			Flasher::setMessage('Gagal','','danger');
			header('location: '. BASEURL );
			exit;	
		}
	}
}