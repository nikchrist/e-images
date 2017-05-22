<?php
session_start();
require_once("connection.php");
require_once("user.php");
require_once("uploadClass.php");
require_once("functions.php");

$name = $_FILES['fileToUpload']['name'];
$size = $_FILES['fileToUpload']['size'];
$type = $_FILES['fileToUpload']['type'];
$error= $_FILES['fileToUpload']['error'];
$tmp  = $_FILES['fileToUpload']['tmp_name'];

User::UserUpload("avatar",array('fileToUpload' => array('name' =>$name,
	                                                   'size' =>$size,
	                                                   'type' =>$type,
	                                                   'error'=>$error,
	                                                   'tmp_name'=>$tmp )))->getUpload();

header('Location:profile.php');
?>