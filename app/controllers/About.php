<?php

class About extends Controller{

	public function index($nama = 'bejo', $pekerjaan = 'guru'){
		$data['title'] = 'Halaman About';
		$this->view('templates/header', $data);
		$this->view('about/index');
		$this->view('templates/footer');
	}

	public function page(){
		$data['title'] = 'My Page';
		$this->view('templates/header', $data);
		$this->view('about/page');
		$this->view('templates/footer');
	}
}