<?php

class Dashboard_Model extends Model{

	function __construct() 
	{
		parent::__construct();
	}

	function xhrInsert()
	{
		$text = $_POST['text'];
		
		//sth = Statement Handler
		$this->db->insert('data', array('text' => $text));
// 		$sth = $this->db->prepare('INSERT INTO data (text) VALUES (:text)');
// 		$sth->execute(array(':text' => $text));
		
		$data = array('text' => $text, 'id' => $this->db->lastInsertId());
		echo json_encode($data);
		
	}
	
	function xhrGetListings()
	{
	    $result = $this->db->select("SELECT * FROM data");
	    
// 		$sth = $this->db->prepare('SELECT * FROM data');
// 		$sth->setFetchMode(PDO::FETCH_ASSOC);
// 		$sth->execute();
// 		$data = $sth->fetchAll();
		echo json_encode($result);
	}
	
	function xhrDeleteListing()
	{
		//typecast to integer just to have a little bit of protection
		$id = (int) $_POST['id']; 
		echo $this->db->delete('data',"id = '$id'");
		//$sth = $this->db->prepare('DELETE FROM data WHERE id = "' . $id . '"');
		//$sth->execute();
	}
}