<?php

class Member extends Controller {

	public function index()
	{
		$data['nama'] = $this->model('User_model')->getUser();
		$data['title'] = 'BookMark - Member Page';

		$this->view('templates/header', $data);
		$this->view('member/index', $data);
		$this->view('templates/footer');
	}

	// public function results()
	// {
	// 	$data['title'] = 'Bookmark Search Results';
	// 	$data['src'] = $_POST['search'];
	// 	$data['results'] = $this->model('Home_model')->searchBookMark($_POST);
	// 	// var_dump($data);
	// 	$this->view('templates/header', $data);
	// 	$this->view('home/results', $data);
	// 	$this->view('templates/footer');
	// }
}