<?php
class Connection{
	private $host = "localhost";
	private $username = "root";
	private $password= "asimakis";
	private $dbname = "photo";


  
    public function connect(){
    $conn = new mysqli($this->host,$this->username,$this->password,$this->dbname);
    
    if(!$conn)
    {
    	die("Could not connect to database".mysqli_connect_error($conn));
    } else {
    	
    	return $conn;
    }
    
}

}

?>