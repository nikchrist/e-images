
<?php
require_once('connection.php');

$conn = new Connection ;

$con = $conn->connect() ;

session_start();
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta keywords="photo,contact,samples,info" description = "User's Profile" author="Nikolaos Christomanos" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSS Files -->
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="style.css">
<!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> -->
<link href="font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">
<!-- JQUERY File -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<title>Explore</title>
</head>

<body id="explorebd">

<a href="#" class="scrollToTop"></a> 

<div class="row">
   <div class="text-center">
    <ul class="explore-nav">
     <li><a href="index.php">HOME</a></li>
     <li><a href="profile.php">PROFILE</a></li>
     <li><a href="explore.php">EXPLORE</a></li>
     <li><a href="mostliked.php">MOST LIKED PHOTOS</a></li>
    </ul> 
   </div> 
</div>

<?php $sql = "SELECT * FROM `images` ";  
$stmt = $con->prepare($sql);
$stmt->execute();
if(!$stmt->execute())
{
  die("error in query:".$stmt->error) ;
}

?>

<div class="panel-body">
<div class="img-container">
<?php
$result = $stmt->get_result();
while($row = $result->fetch_assoc())
{
  
   ?>
    <div class="img-style-explore"> 
     <img src=<?php echo $row['imageurl']; ?> class = "img-responsive img-rounded"/> 
    <?php 
        
    $sql2 = "SELECT * FROM `likes` WHERE `imageid`= ? AND `freeid` =? ";
    $stmt2 = $con->prepare($sql2);
    $stmt2->bind_param('ii',$row['imageid'],$_SESSION['freeid']);
    if(!$stmt2->execute())
    {
      die("Error in query 2:".$stmt->error);
    }
    $result2 = $stmt2->get_result();
    $row2 = $result2->fetch_assoc();?>
    <ul id="like_unlike_list">
     <li id="like_form"><form role="form" action="like.php" method="post" id="like-form">
      <input type="hidden" value=<?php  echo $row2['imgunlike'];  ?> name="imgunlike" id="btnunlikeval" />
      <input type="hidden" value=<?php  echo count($row2['imglike']);  ?> name="imglike" id="btnlikeval" />
      <input type="hidden" value=<?php echo $row['imageid']; ?> name="imageid" id="imageid" />
      <?php if($row2['imglike'] == 0)
      {
        ?>
      <button class="btn btn-primary" name="btnlike"  id = "btnlike">LIKE</button>
      <?php 
      } else {
        ?><button class="btn btn-primary" name="btnlike"  id = "btnlike" disabled>LIKED</button>
      <?php  
      }
      ?>

     </form></li> 
      
    <li id="unlike_form"> <form role="form" action="like.php" method="post" id="unlike-form">
      <input type="hidden" value=<?php  echo $row2['imglike'];  ?> name="imglike" id="btnlikeval" />
      <input type="hidden" value=<?php echo $row['imageid'];  ?> name="imageid" id="imageid" />
      <input type="hidden" value=<?php echo $row2['imgunlike'];?> name="imgunlike" id="btnunlikeval" />
      <button class="btn btn-danger" name="btnunlike"   id="btnunlike" >UNLIKE</button>
     </form></li>
    </ul>
    <?php $sql3="SELECT `freeusername`,`freelastname` FROM `free_user` WHERE `freeid`= ?";
          $stmt3 = $con->prepare($sql3); 
          $stmt3->bind_param('i',$row['freeid']);
          $stmt3->execute();
          if(!$stmt3->execute() )
          {
            die("error in sql 3:".$stmt3->error);
          }
          $result3 = $stmt3->get_result();
          $row3 = $result3->fetch_assoc();
          $stmt3->close();

          $sql4="SELECT SUM(`imglike`)/2  as `total_likes` FROM `likes` WHERE `imageid`= ?";
          $stmt4 = $con->prepare($sql4);
          $stmt4->bind_param('i',$row['imageid']);
          $stmt4->execute();
          if(!$stmt4->execute())
          {
            die("error in sql 4:".$stmt->error);
          }
          $result4= $stmt4->get_result();
          $row4 = $result4->fetch_assoc();
          $stmt4->close();?>

          <p>Uploaded by:<?php echo ucfirst($row3['freeusername'])."\t\t\t".ucfirst($row3['freelastname']); ?></p>
          <p>LIKES:<?php echo intval($row4['total_likes']); ?> </p>
          <p>UPLOADED AT:<?php echo $row['date']; ?></p>
          </div>
   <?php
    }
    ?>
    
  </div>
</div>

<div class="row profile-footer">

  <div class="col-md-6">
    <div class="pull-left">
      <p>Powered By Nikolaos Christomanos</p>
    </div>
  </div>

  <div class="col-md-6">
    <div class="pull-right">
      <p>Nikos Christomanos &copy;</p>
      <p> All Rights Reserved</p>
    </div>
  </div>  

</div> 


</body>
<script lanquaqe="javascript" src="main.js"></script>
</html>