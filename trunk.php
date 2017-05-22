<?php 
 require_once("connection.php");
 $conn = new Connection;
 $con = $conn->connect();

 $sql = "TRUNCATE  `total_likes`" ;
 $result = $con->query($sql);
 if(!$result)
 {
 	die("Error in sql:".$con->error);
 }
 
?>