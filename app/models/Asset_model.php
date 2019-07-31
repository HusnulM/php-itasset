<?php
/**
* 
*/
class Asset_model{
	private $db;
	private $table = 'assetdata';

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAsset(){
		$this->db->query('SELECT * FROM assetdata');
		return $this->db->resultSet();
	}

	public function getAssetById($assetnum){
		$this->db->query('SELECT * FROM vassetdata WHERE assetNum=:assetNum');
		$this->db->bind('assetNum',$assetnum);
		return $this->db->single();
	}

	public function getUnit()
	{
		$this->db->query('SELECT * FROM unit');
		return $this->db->resultSet();
	}

	public function getAssetStatus()
	{
		$this->db->query('SELECT * FROM assetstat');
		return $this->db->resultSet();
	}

	public function saveAsset($assetNum, $data){

		$query = "INSERT INTO assetdata (assetNum, assetKat, Description, empId, createdBy, createdDate,
		                                 quantity, unit, assetStat, location) 
				  VALUES(:assetNum, :assetKat, :Description, :empId, :createdBy, :createdDate,
		                 :quantity, :unit, :assetStat, :location)";

		$this->db->query($query);
		$this->db->bind('assetNum',$assetNum);
		$this->db->bind('assetKat',$data['assetKat']);
		$this->db->bind('Description',$data['desc']);
		$this->db->bind('empId',$data['empId']);
		$this->db->bind('createdBy',$_SESSION['usr']['user']);
		$this->db->bind('createdDate','2019-02-12');
		$this->db->bind('quantity',$data['qty']);
		$this->db->bind('unit',$data['unit']);
		$this->db->bind('assetStat',$data['assetStatus']);
		$this->db->bind('location',$data['location']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function getLastAssetNum(){
		$this->db->query('SELECT MAX(assetNum) as assetNum FROM '. $this->table);
		return $this->db->single();
	}
}