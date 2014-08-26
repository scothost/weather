<?php

class Note_Model extends Model{

	function __construct() 
	{
		parent::__construct();
	}
	
	public function noteList()
	{	
	    return $this->db->select('SELECT * FROM note WHERE userid = :userid',
	    	array('userid' => $_SESSION['userid']));
	}
	
	public function noteSingleList($noteid)
	{
		// print_r($_SESSION['userid']);
		// print_r($noteid);
	    return $this->db->select('SELECT * FROM note WHERE userid = :userid AND noteid = :noteid', 
	    	array('userid' => $_SESSION['userid'], 'noteid' => $noteid));
 	}
	
	public function create($data)
	{
	    $postData = array(
	        'title' => $data['title'],
	        'userid' => $_SESSION['userid'],
	        'content' => $data['content'],
 		    'date_added' => date('Y-m-d H:i:s') // use GMT aka UTC-0 => it's easyer to add timezones if the application grows
	        );
	    $this->db->insert('note', $postData);
	}
	
	public function editSave($data)
	{
		$postData = array(
	        'title' => $data['title'],
	        'content' => $data['content'],
	        );

		// FIX THIS!!!
		// NU MERGE UPDATE-UL IN BAZA DE DATE

	    $this->db->update('note', $postData , 
	    	" `noteid` = '{$data['noteid']}' AND `userid` = '{$_SESSION['userid']}' ");
		
	}
	
	public function delete($noteid)
	{
	    $this->db->delete('note', " `noteid` = '{$noteid}' AND `userid` = '{$_SESSION['userid']}' ");
	}
}












