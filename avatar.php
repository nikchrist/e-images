<?php

require_once("connection.php");
?>
<!Doctype html>
<head>
</head>


<body>
<?php
$conn = new Connection; 

$connection = $conn->connect();

$sql = "SELECT * FROM   `free_user` WHERE `freeid`= ?" ;

$stmt = $connection->prepare($sql);
if(!$stmt)
{
    echo $stmt->error;
}
$stmt->bind_param("i",$_SESSION['freeid']);
$stmt->execute();
if(!$stmt->execute())
{
    echo $stmt->error;
}   
    $result = $stmt->get_result();
 	while($row = $result->fetch_assoc() )
 	{  ?>
 		<form action="delete.php" method="post" name="avatarformdel" id="avatarformdel">
        <img  src=<?php if($row['avatar'] == NULL){
                            echo 'user_avatar/default.png';
                         }else { 
                         	     echo "'".$row['avatar']."'"  ;

                         	   }  ?> width="40%" height="20%"/><br>
                         	     
        <input type="hidden"  value=<?php  echo $row['avatar'] ?> name="avatarname" />
        <span id="deletebtn"><button  type="submit" class="btn btn-danger" name="avatarsubmit" id ="avatarsubmit" >DELETE</button></span>
        </form> 
        <?php
 	}

  mysqli_close($connection);
       
?>        
</body>


</html>