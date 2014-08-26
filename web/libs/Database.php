<?php

class Database extends PDO //need to have this enabled in the php.ini file.
{

	public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS)
	{
		parent::__construct( $DB_TYPE . ':host=' . $DB_HOST . ';dbname=' . $DB_NAME, $DB_USER, $DB_PASS);
	    
	    //parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTIONS);
	}
	
	/**
	 * select
	 * @param string $sql An SQL string
	 * @param array $array Paramters to bind
	 * @param constant $fetchMode A PDO Fetch mode
	 * @return mixed
	 */
	public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC)
	{
	    $sth = $this->prepare($sql);
	    foreach ($array as $key => $value){
	        $sth->bindValue("$key", $value); //cool built in method
	    }
	    
	    $sth->execute();
	    return $sth->fetchAll($fetchMode);
	}
	
	/**
	 * insert
	 * @param string $table A name of table to insert into
	 * @param string $data An associative array
	 */
	public function insert($table, $data)
	{
		 //this step isn't necessary, ksort() sorts the data by key
	    ksort($data);
	    
	    // prepare field names. eg. "login,password,role"
	    $fieldNames = implode('`,`', array_keys($data));
	    // prepare values for the bindValue method
	    $fieldValues = ":" . implode(', :', array_keys($data));;
	    
	    $sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues) ");
		// print_r("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues) ");die;      
	    
	    foreach ($data as $key => $value){
	        $sth->bindValue(":$key", $value); //cool built in method
	    }
	    
	    //no arguments needed due to the foreach which binds the values
		$sth->execute();
	}
	
	/**
	 * update
	 * @param string $table A name of table to insert into
	 * @param string $data An associative array
	 * @param string $where the WHERE query part
	 */
	public function update($table, $data, $where)
	{
		//this step isn't necessary, it sorts the data by key
	    ksort($data);
	    
	    // starts as null and we append all details one-by-one
	    $fieldDetails = NULL;
	    foreach ($data as $key => $value){
	        $fieldDetails .= "`$key` =:$key, ";
	    };

	    // delete the last comma
	    $fieldDetails = rtrim($fieldDetails, ', '); 
	    
	    $sth = $this->prepare("UPDATE `$table` SET $fieldDetails WHERE $where");
	    //echo "UPDATE $table SET $fieldDetails WHERE $where";die;
	    
	    foreach ($data as $key => $value){
	        $sth->bindValue(":$key", $value); //cool built in method
	    }
	    // var_dump($sth);die;
		
		//no arguments needed due to the foreach which binds the values
		$sth->execute();
	}
	
	/**
	 * delete
	 * 
	 * @param string $table
	 * @param string $where
	 * @param integer $limit
	 * @return integer Affected Rows
	 */
	public function delete($table, $where, $limit = 1)
	{
	
	    //exec is generally better for delete statements - research PDO::exec
	    return $this->exec("DELETE FROM `$table` WHERE $where LIMIT $limit");
	
	}

}








