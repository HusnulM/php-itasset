<?php
/**
* 
*/
class Department_model{
	private $db;
	private $table = 'department';

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllDept()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getDeptByID($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE deptId=:deptId');
		$this->db->bind('deptId',$id);
		return $this->db->single();
	}

	public function saveData($maxID, $data){
		$query = "INSERT INTO department (deptId, deptName) VALUES(:deptId, :deptName)";
		$this->db->query($query);
		$this->db->bind('deptId',$maxID);
		$this->db->bind('deptName',$data['deptName']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateData($data){
		$query = "UPDATE department set deptName=:deptName";
		$this->db->query($query);
		$this->db->bind('deptId',$data['deptId']);
		$this->db->bind('deptName',$data['deptName']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteData($id){

		$this->db->query('DELETE FROM ' . $this->table . ' WHERE deptId=:deptId');
		$this->db->bind('deptId',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}	

	public function getMaxID(){
		$this->db->query('SELECT MAX(deptId) as deptId FROM '. $this->table);
		return $this->db->single();
	} 
}