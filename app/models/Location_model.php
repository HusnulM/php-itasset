<?php
/**
* 
*/
class Location_model{
	private $db;
	private $table = 'location';

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
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE location=:location');
		$this->db->bind('location',$id);
		return $this->db->single();
	}

	public function saveData($maxID, $data){
		$query = "INSERT INTO location (location, description) VALUES(:location, :description)";
		$this->db->query($query);
		$this->db->bind('location',$maxID);
		$this->db->bind('description',$data['Description']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateData($data){
		$query = "UPDATE location set description=:description";
		$this->db->query($query);
		$this->db->bind('location',$data['location']);
		$this->db->bind('description',$data['Description']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteData($id){

		$this->db->query('DELETE FROM ' . $this->table . ' WHERE location=:location');
		$this->db->bind('location',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}	

	public function getMaxID(){
		$this->db->query('SELECT MAX(location) as location FROM '. $this->table);
		return $this->db->single();
	} 
}