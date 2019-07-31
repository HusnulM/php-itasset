<?php

class Employee_model{

	private $db;
	private $table = 'employee';

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllEmployee()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getEmployeeDtByID($id, $deptId)
	{
		$this->db->query('SELECT * FROM vEmpDept WHERE empId=:empId AND deptId=:deptId');
		$this->db->bind('empId',$id);
		$this->db->bind('deptId',$deptId);
		return $this->db->single();
	}

	public function getEmployeeByID($id,$json)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE empId=:empId');
		$this->db->bind('empId',$id);
		$results = $this->db->single();

		if($json == "json"){
			$json = json_encode($results);
			echo $json;
		}else{
			return $this->db->single();
		}
	}

	public function saveData($data){
		$query = "INSERT INTO employee (firstname, lastname, fullname, gender, aktif) 
		VALUES(:firstname, :lastname, :fullname, :gender, :aktif)";
		$this->db->query($query);
		$this->db->bind('firstname',$data['fName']);
		$this->db->bind('lastname',$data['lName']);
		$this->db->bind('fullname',$data['fName'] .' '. $data['lName']);
		$this->db->bind('gender',$data['gender']);
		$this->db->bind('aktif',1);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateData($data){
		// var_dump($data);
		$query = "UPDATE employee set firstname=:firstname, lastname=:lastname, fullname=:fullname, gender=:gender, aktif=:aktif WHERE empId=:empId";
		$this->db->query($query);
		$this->db->bind('empId',$data['empId']);
		$this->db->bind('firstname',$data['fName']);
		$this->db->bind('lastname',$data['lName']);
		$this->db->bind('fullname',$data['fName'] .' '. $data['lName']);
		$this->db->bind('gender',$data['gender']);
		$this->db->bind('aktif',1);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteData($id){

		$this->db->query('DELETE FROM ' . $this->table . ' WHERE empId=:empId');
		$this->db->bind('empId',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function setEmpDept($data){

		$this->db->query('SELECT * FROM empdept WHERE empId=:empId AND deptId=:deptId');
		$this->db->bind('empId',$data['empId']);
		$this->db->bind('deptId',$data['deptId']);
		$this->db->execute();
		$result = $this->db->rowCount();

		if($result > 0){
			return 'X';
		}else{
			$query = "INSERT INTO empdept (empId, deptId, active) 
			VALUES(:empId, :deptId, :active)";
			$this->db->query($query);
			$this->db->bind('empId',$data['empId']);
			$this->db->bind('deptId',$data['deptId']);
			$this->db->bind('active',1);
			$this->db->execute();

			return $this->db->rowCount();
		}
	}



	public function deleteEmpDept($empId, $deptId){

		$this->db->query('DELETE FROM empdept WHERE empId=:empId AND deptId=:deptId');
		$this->db->bind('empId',$empId);
		$this->db->bind('deptId',$deptId);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function getAllEmpdDept(){
		$this->db->query('SELECT * FROM vEmpDept');
		return $this->db->resultSet();
	}
}