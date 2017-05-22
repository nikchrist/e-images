<?php
require_once("connection.php");
require_once("user.php");
require_once("usersignup.php");
require_once("functions.php");
//require_once("premiumuser.php");


if($_POST['signupsubmit'])
{
User::Usersignup(array('freeusername' => $_POST["freeusername"],
	                   'freelastname' => $_POST["freelastname"],
	                   'freeemail' => $_POST["freeemail"],
	                   'freepass' =>  hashPassword()
	                   ))->SignIn();
}

header('Location:index.php');


?>