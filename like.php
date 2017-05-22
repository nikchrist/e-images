<?php
require_once('connection.php');
error_reporting('E_ALL ~& E_NOTICE');
session_start();

$conn = mysqli_connect('localhost','root','asimakis','photo');
if(!$conn)
{
	die("Could not connect to database:".mysqli_connect_error($conn));
}

$like = $_POST['imglike'] ;
$unlike = $_POST['imgunlike'];
$imgid = $_POST['imageid'];
$unliked = $_POST['btnunlike'];
$liked = $_POST['btnlike'] ;

   var_dump($imgid)."<br>";
echo  $imglike."<br>";

    if(isset($liked))
    { 
       $selectsql = "SELECT * FROM `likes` 
                     WHERE `imageid`='".$imgid."' AND `freeid`='".$_SESSION['freeid']."'";
       $result = mysqli_query($conn,$selectsql);
       
       if(mysqli_num_rows($result) == 0)
       {	
       $sql = "INSERT INTO `likes`(`imglike`,`imgunlike`,`imageid`,`freeid`) 
               VALUES('". ++$like ."','". --$unlike ."','".$imgid."','".$_SESSION['freeid']."')";
               $check = 1;
       }
       else if(mysqli_num_rows($result) > 0)
       {
        $sql = "UPDATE `likes` 
                SET `imglike`='". ++$like ."',`imgunlike`='". --$unlike ."' WHERE `imageid`='".$imgid."' AND `freeid`='".$_SESSION['freeid']."'";
                $check = 2;
       }
    }
    if(isset($unliked))
    { 	
       $selectsql = "SELECT * FROM `likes` 
                     WHERE `imageid`='".$imgid."' AND `freeid`='".$_SESSION['freeid']."'";
       $result = mysqli_query($conn,$selectsql);
       if(mysqli_num_rows($result) == 0)
       {  
       $sql = "INSERT INTO `likes`(`imglike`,`imgunlike`,`imageid`,`freeid`) 
               VALUES('". --$like ."','". ++$unlike ."','".$imgid."','".$_SESSION['freeid']."')";
               $check = 3;
       }
       else if(mysqli_num_rows($result) > 0)
       {
        $sql = "UPDATE `likes` 
                SET `imglike`='". --$like ."',`imgunlike`='". ++$unlike ."' WHERE `imageid`='".$imgid."' AND `freeid`='".$_SESSION['freeid']."'";
                $check = 4;
       }
    }
    
   
  
  
 
  $i = 0;
  $result = mysqli_query($conn,$sql) ;
  if(!$result)
  {
  	die("sql error:".mysqli_error($conn));
  }

 $sql2= "SELECT  * FROM `likes` WHERE  `likes`.`imageid`='".$imgid."'";

 $result2 = mysqli_query($conn,$sql2);

  if(!$result2)
  {
    die("sql error:".mysqli_error($conn));
  }

 while($row = mysqli_fetch_assoc($result2))
 {
     $imgarray[$i] = $row['imglike'];
     $sum = $sum+$imgarray[$i];
     $i++;
     
 }

 echo $sum ;

 $sqlselect2 = "SELECT * FROM `total_likes` WHERE `total_likes`.`imageid`='".$imgid."'";
 $resultselect2 = mysqli_query($conn,$sqlselect2);
 var_dump(mysqli_num_rows($resultselect2));
 if(!$resultselect2)
  {
    die("sql error:".mysqli_error($conn));
  }

if(mysqli_num_rows($resultselect2) == 0)
{ 
$sql3 = "INSERT INTO `total_likes`(`imageid`,`imglikes`) VALUES('".$imgid."','".$sum."')";
} else if(mysqli_num_rows($resultselect2) > 0)
  {
    $sql3 = "UPDATE `total_likes` SET `total_likes`.`imglikes`='".$sum."' WHERE `total_likes`.`imageid`='".$imgid."'";
  }
 $result3 = mysqli_query($conn,$sql3);
 if(!$result3)
  {
    die("sql error:".mysqli_error($conn));
  }

//header('Location:explore.php');

?>