<?php

session_start();
require_once("connection.php");

$conn = new Connection ;

$con = $conn->connect();

if(isset($_POST['imgsubmit']) )
{
  
    //DELETE  IMAGE LIKE 
	$sql2 = "DELETE FROM `likes` WHERE `imageid` = ?";
	$stmt2 = $con->prepare($sql2);
	$stmt2->bind_param("i",$_POST['imageid']);
	if(!$stmt2->execute())
	{
		echo $stmt2->error;
	}
	$stmt2->close();
    //DELETE IMAGE
	$sql = "DELETE FROM `images`   WHERE `imageurl` = ?" ;
	$stmt = $con->prepare($sql);
	$stmt->bind_param("s",$_POST['imagename']);
	$stmt->execute();
    if(!$stmt->execute())
    {
    	echo $stmt->error;
    }
    chmod($_POST['imagename'],0750);
    unlink($_POST['imagename']);
    $stmt->close();
    header('Location:profile.php');
}

if(isset($_POST['avatarsubmit']))
{
	$sql ="UPDATE `free_user` SET `avatar`= NULL WHERE `avatar`= ?";
	$stmt = $con->prepare($sql);
	$stmt->bind_param("s",$_POST['avatarname']);
	$stmt->execute();
	if(!$stmt->execute())
	{
		die("Error in sql:".$stmt->error);
	}
	chmod($_POST['avatarname'],0750);
	unlink($_POST['avatarname']);
	$stmt->close();
	header('Location:profile.php');

}

?>