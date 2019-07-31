<?php

class Mahasiswa extends Controller {
	public function index(){
		$data['title'] = 'Data Mahasiswa';
		$data['mhs'] = $this->model('Mahasiswa_model')->getAllMhasiswa();
		$this->view('templates/header', $data);
		$this->view('mahasiswa/index', $data);
		$this->view('templates/footer');
	}

	public function detail($id){

		$data['title'] = 'Detail Mahasiswa';
		$data['mhs'] = $this->model('Mahasiswa_model')->getAllMhasiswaById($id);
		$this->view('templates/header', $data);
		$this->view('mahasiswa/detail', $data);
		$this->view('templates/footer');
	}

	public function edit($id){

		$data['title'] = 'Detail Mahasiswa';
		$data['mhs'] = $this->model('Mahasiswa_model')->getAllMhasiswaById($id);
		$this->view('templates/header', $data);
		$this->view('mahasiswa/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah Mahasiswa';		
		$this->view('templates/header', $data);
		$this->view('mahasiswa/tambah');
		$this->view('templates/footer');
	}

	public function simpanmahasiswa(){		

		if( $this->model('Mahasiswa_model')->tambahMahasiswa($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. BASEURL . '/mahasiswa');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. BASEURL . '/mahasiswa');
			exit;	
		}
	}

	public function updateMahasiswa(){	
		if( $this->model('Mahasiswa_model')->updateDataMahasiswa($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. BASEURL . '/mahasiswa');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. BASEURL . '/mahasiswa');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('Mahasiswa_model')->deleteMhs($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. BASEURL . '/mahasiswa');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. BASEURL . '/mahasiswa');
			exit;	
		}
		// $data['mhs'] = $this->model('Mahasiswa_model')->deleteMhs($id);
		// return $this->index();
		// header('location:../../mahasiswa');
	}

	public function getDataChange(){

		$id = $_POST['id'];

		echo json_encode($this->model('Mahasiswa_model')->getAllMhasiswaById($id));
	}
}