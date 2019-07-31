<?php
/**
* 
*/
class Assetkat_model{
	private $db;
	private $table = 'assetkat';

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllAssetCat()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getAssetCatByID($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE assetkat=:assetkat');
		$this->db->bind('assetkat',$id);
		return $this->db->single();
	}

	public function saveData($maxID, $data){
		$query = "INSERT INTO assetkat (assetkat, Description) VALUES(:assetkat, :Description)";
		$this->db->query($query);
		$this->db->bind('assetkat',$maxID);
		$this->db->bind('Description',$data['Description']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateData($data){
		$query = "UPDATE assetkat set Description=:Description";
		$this->db->query($query);
		$this->db->bind('assetkat',$data['assetkat']);
		$this->db->bind('Description',$data['Description']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteData($id){

		$this->db->query('DELETE FROM ' . $this->table . ' WHERE assetkat=:assetkat');
		$this->db->bind('assetkat',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}	

	public function getMaxID(){
		$this->db->query('SELECT MAX(assetkat) as assetkat FROM '. $this->table);
		return $this->db->single();
	} 
}