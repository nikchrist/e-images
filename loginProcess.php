<?php
session_start();
require_once("connection.php");
require_once("user.php");
require_once("Login.php");
require_once("functions.php");


if($_POST['loginsubmit'])
{
User::Userlogin(array('confemail' => $_POST['confemail'],
	                   'confpass' => $_POST['confpass'] 
	                   ))->login();
}

header('Location:index.php');
?>