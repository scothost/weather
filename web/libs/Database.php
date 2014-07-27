<?php

// table users
// id, login, password



class Database extends PDO //need to have this enabled in the php.ini file.
{

	public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS)
	{
		parent::__construct( $DB_TYPE . ':host=' . $DB_HOST . ';dbname=' . $DB_NAME, $DB_USER, $DB_PASS);
	
	    //parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTIONS);
	}
	
	public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC)
	{
	    $sth = $this->prepare($sql);
	    foreach ($array as $key => $value){
	        $sth->bindValue("$key", $value); //cool built in method
	    }
	    
	    $sth->execute();
	    return $sth->fetchAll($fetchMode);
	    
	}
	
	public function insert($table, $data)
	{
	    ksort($data); //this step isn't necessary, it sorts the data by key
	    
	    $fieldNames = implode('`,`', array_keys($data)); //eg:  "login,password,role"
	    $fieldValues = ":" . implode(', :', array_keys($data));;
	    
	    $sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues) ");
	   // print_r("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues) ");die;      
	    
	    foreach ($data as $key => $value){
	        $sth->bindValue(":$key", $value); //cool built in method
	    }
	    
		$sth->execute(); //no arguments needed due to the foreach which binds the values
	}
	
	public function update($table, $data, $where)
	{
	    ksort($data); //this step isn't necessary, it sorts the data by key
	    
	    $fieldDetails = NULL; //it starts as null and we append all details one-by-one
	    foreach ($data as $key => $value){
	        $fieldDetails .= "'$key' =:$key, ";
	    };
	    $fieldDetails = rtrim($fieldDetails, ', '); // delete the last comma 
	    
	    $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE 'id' = 5");
	    //echo "UPDATE $table SET $fieldDetails WHERE $where";die;
	    
	    foreach ($data as $key => $value){
	        $sth->bindValue(":$key", $value); //cool built in method
	    }
	    //var_dump($sth);die;
		$sth->execute(); //no arguments needed due to the foreach which binds the values

	}
	
	public function delete($table, $where, $limit = 1)
	{
	    //exec is generally better for delete statements - research PDO::exec
	   // echo 1;
	   // die();
	    return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
	    
	}

}








