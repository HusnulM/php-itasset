<?php

class Member_model{

	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	// public function searchBookMark($data)
	// {
	// 	// var_dump($data);
	// 	$this->db->query('CALL sp_getBookMark("'. $data['search'] .'")');

	// 	// $json = json_encode($this->db->resultSet());

	// 	// echo $json;
	// 	return $this->db->resultSet();
	// }
}