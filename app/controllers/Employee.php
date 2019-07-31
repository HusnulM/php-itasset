<?php

class Employee extends Controller {

	public function __construct(){
		if( isset($_SESSION['usr']) ){}
		else{
			header('location:'. BASEURL);
		}
	}

	public function index()
	{
		$data['title'] = 'IT Asset - Maintain Employee Data';
		$data['menu'] = 'Employee';
		$data['menu-dsc'] = 'Maintain Employee Data';
		$data['wg-hdr'] = '';
		$data['empData'] = $this->model('Employee_model')->getEmployeeByID('','');
		$this->view('templates/header_a', $data);
		$this->view('employee/index', $data);
		$this->view('templates/footer_a');
		
	}

	public function getEmpById($id,$json){
		$data['empData'] = $this->model('Employee_model')->getEmployeeByID($id,$json);
	}

	public function create(){
		if( $this->model('Employee_model')->saveData($_POST) > 0 ) {
			Flasher::setMessage('New Employee Successfully','Created','success');
			header('location: '. BASEURL . '/employee');
			exit;			
		}else{
			Flasher::setMessage('Failed,','Check your input','danger');
			header('location: '. BASEURL . '/employee');
			exit;	
		}
	}

	public function edit($id){
		$data['title'] = 'IT Asset - Maintain Employee Data';
		$data['menu'] = 'Employee';
		$data['menu-dsc'] = 'Update Employee Data';
		$data['wg-hdr'] = '';
		$data['empData'] = $this->model('Employee_model')->getEmployeeByID($id,'array');
		$this->view('templates/header_a', $data);
		$this->view('employee/index', $data);
		$this->view('templates/footer_a');
	}

	public function update(){
		if( $this->model('Employee_model')->updateData($_POST) > 0 ) {
			Flasher::setMessage('Employee Successfully','Updated','success');
			header('location: '. BASEURL . '/employee/list');
			exit;			
		}else{
			Flasher::setMessage('Failed,','Check your input','danger');
			header('location: '. BASEURL . '/employee/list');
			exit;	
		}
	}

	public function list(){
		$data['title'] = 'IT Asset - Employee Data';
		$data['menu'] = 'Employee';
		$data['menu-dsc'] = 'Employee Data';
		$data['rdata'] = $this->model('Employee_model')->getAllEmployee();

		$this->view('templates/header_a', $data);
		$this->view('employee/employee-list', $data);
		$this->view('templates/footer_a');
	}

	public function hapusData($id){
		if( $this->model('Employee_model')->deleteData($id) > 0 ) {
			Flasher::setMessage('Employee Successfully','Deleted','success');
			header('location: '. BASEURL . '/employee/list');
			exit;			
		}else{
			Flasher::setMessage('Error','Delete Data','danger');
			header('location: '. BASEURL . '/employee/list');
			exit;	
		}
	}


	public function emp_dept(){
		$data['title'] = 'IT Asset - Maintain Employee Department';
		$data['menu'] = 'Employee';
		$data['menu-dsc'] = 'Maintain Employee Department';
		$data['deptdt'] = $this->model('Department_model')->getAllDept();
		$data['empdt'] = $this->model('Employee_model')->getEmployeeDtByID('', '');

		$this->view('templates/header_a', $data);
		$this->view('employee/emp-assignment', $data);
		$this->view('templates/footer_a');
	}

	public function setEmpDept(){
		$execute['data'] = $this->model('Employee_model')->setEmpDept($_POST);
		echo json_encode($execute['data']);
	}

	public function department(){
		$data['title'] = 'IT Asset - Maintain Employee Department';
		$data['menu'] = 'Employee';
		$data['menu-dsc'] = 'Maintain Employee Department';
		$data['rdata'] = $this->model('Employee_model')->getAllEmpdDept();

		$this->view('templates/header_a', $data);
		$this->view('employee/employee-dept', $data);
		$this->view('templates/footer_a');
	}

	public function hapusDept($empdId, $deptId){

		// echo $empdId . ' - ' . $deptId;
		if( $this->model('Employee_model')->deleteEmpDept($empdId, $deptId) > 0 ) {
			Flasher::setMessage('Employee Department Successfully','Deleted','success');
			header('location: '. BASEURL . '/employee/department');
			exit;			
		}else{
			Flasher::setMessage('Error','Delete Data','danger');
			header('location: '. BASEURL . '/employee/department');
			exit;	
		}
	}

	public function editDept($empId, $deptId){
		$data['title'] = 'IT Asset - Maintain Employee Department';
		$data['menu'] = 'Employee';
		$data['menu-dsc'] = 'Maintain Employee Department';
		$data['deptdt'] = $this->model('Department_model')->getAllDept();
		$data['empdt'] = $this->model('Employee_model')->getEmployeeDtByID($empId, $deptId);

		// var_dump($data['empdt']);
		$this->view('templates/header_a', $data);
		$this->view('employee/emp-assignment', $data);
		$this->view('templates/footer_a');
	}
}