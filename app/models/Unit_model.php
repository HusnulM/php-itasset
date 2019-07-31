<?php
/**
* 
*/
class unit_model{
	private $db;
	private $table = 'unit';

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllData()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getDataByID($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE unit=:unit');
		$this->db->bind('unit',$id);
		return $this->db->single();
	}

	public function saveData($data){
		$query = "INSERT INTO unit (unit, description) VALUES(:unit, :description)";
		$this->db->query($query);
		$this->db->bind('unit', $data['unit']);
		$this->db->bind('description',$data['Description']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateData($data){
		$query = "UPDATE unit set description=:description";
		$this->db->query($query);
		$this->db->bind('unit',$data['unit']);
		$this->db->bind('description',$data['Description']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteData($id){

		$this->db->query('DELETE FROM ' . $this->table . ' WHERE unit=:unit');
		$this->db->bind('unit',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}	

	public function getMaxID(){
		$this->db->query('SELECT MAX(unit) as unit FROM '. $this->table);
		return $this->db->single();
	} 
}