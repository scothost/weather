<?php

class User_Model extends Model{

	function __construct() 
	{
		parent::__construct();
	}
	
	public function userList()
	{	
	    return $this->db->select('SELECT id, username, role FROM user');
// 		$sth = $this->db->prepare('SELECT id,role,username FROM user');
// 		$sth->execute();
// 		return $sth->fetchAll();

	}
	
	public function userSingleList($id)
	{
	    return $this->db->select('SELECT id,role,username,password FROM user WHERE id = :id', array(':id' => $id));
// 	    $sth = $this->db->prepare('SELECT id,role,username,password FROM user WHERE id = :id');
// 		$sth->execute(array(
// 		    ':id' => $id
// 		    ));
// 		return $sth->fetch(); //no need for fetchAll because we only need one row
	}
	
	public function create($data)
	{
	    $postData = array(
	        'username' => $data['username'],
	        'password' => Hash::create('md5', $data['password'], MY_HASH_PASSWORD_KEY),
 		    'role' => $data['role']
	        );
	    $this->db->insert('user', $postData);
// 	    $sth = $this->db->prepare('INSERT INTO users
// 	            (`username`, `password`, `role`)
// 	            VALUES (:username, :password, :role)
// 	            ');
// 		$sth->execute(array(
// 		    ':username' => $data['username'],
// 		    ':password' => Hash::create('md5', $data['password'], MY_HASH_PASSWORD_KEY),
// 		    ':role' => $data['role']
// 		    ));
	}
	
	public function editSave($data)
	{
	    $postData = array(
	        'username' => $data['username'],
	        'password' => Hash::create('md5', $data['password'], MY_HASH_PASSWORD_KEY),
 		    'role' => $data['role']
	        );
	    //$this->db->update('users', $postData , "'id' = {$data['id']}");
	    $this->db->update('user', $postData , null);
	    
// 	    $sth = $this->db->prepare('UPDATE users
// 	            SET `username` = :username, `password` = :password, `role` = :role
// 	            WHERE id = :id
// 	            ');
// 		$sth->execute(array(
// 		    ':id' => $data['id'],
// 		    ':username' => $data['username'],
// 		    ':password' => Hash::create('md5', $_POST['password'], MY_HASH_PASSWORD_KEY),
// 		    ':role' => $data['role']
// 		    ));
	}
	
	public function delete($id)
	{
	   $result = $this->db->select('SELECT role FROM user WHERE id = :id',array(':id' => $id));
	   // $sth = $this->db->prepare('SELECT role FROM user WHERE id = :id');
	   // $sth->execute(array(':id' => $id));
	   // $data = $sth->fetch();
	    if ($result[0]['role'] == 'owner'){
	        return false;
	    }
	    //print_r($data);
	    //die();
	    
	    $this->db->delete('user', "id = ':id'");
	   // $sth = $this->db->prepare('DELETE FROM user WHERE id = :id');
	   // $sth->execute(array(':id' => $id));
	}
}












