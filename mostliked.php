<?php
$conn = new mysqli("localhost","root","asimakis","photo");

if(!$conn)
{
	die("Could not connect to database".$conn->connect_error);
}


?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta keywords="photo,contact,samples,info" description = "Photo Heaven" author="Nikolaos Christomanos" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSS Files -->
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<script lanquaqe="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

</head>
<body>
<?php
$sql = "SELECT DISTINCT `images`.*,`likes`.*,`total_likes`.*
        FROM `images`
        INNER JOIN `likes` ON `images`.`imageid` = `likes`.`imageid`
        INNER JOIN `total_likes` ON `total_likes`.`imageid` = `images`.`imageid`
        ORDER BY  `total_likes`.`imglikes` DESC LIMIT 6 ";

 
$result = $conn->query($sql);

if(!$result)
{
	die("Error in sql".$conn->error);
}  
?>
<a href="#" class="scrollToTop"></a> 
<div class='row' id="nav-row">

<div class="nav-wrap">
</div>
 <div class="col-md-3 nav-col">
  <h1 class="mstliked-text" id="h-link">HOME</h1>
 </div>



<div class="nav-wrap">
</div>
 <div class="col-md-3 nav-col">
  <div class="text-center">
   <h1 class="mstliked-text" id="p-link">PROFILE</h1>
  </div> 
 </div>


<div class="nav-wrap">
</div>
 <div class="col-md-3 nav-col">
  <div class="text-center">
   <h1 class="mstliked-text" id="e-link">EXPLORE</h1>  
 </div>
</div>


<div class="nav-wrap">
</div>
 <div class="col-md-3 nav-col">
  <div class="text-center">
   <h1 class="mstliked-text" id="ml-link">MOST LIKED PHOTOS</h1>
  </div> 
 </div>



</div>


<div class="row">
 <div class="text-center">
   <h1 id="most-liked-title">THE TOP 6 PHOTOS</h1>
 </div>
</div> 
<div class="row-fluid">
<?php
while($row = $result->fetch_assoc())
{
  ?>
     <div class="col-md-4">
     <img src=<?php echo $row['imageurl'] ?> width="100%" height="100%" class="mostliked-pics" ?>
     <h2 style="color:white;margin-left:5%">LIKES:<?php echo  $row['imglikes']; ?></h2>
     </div>
 
<?php  
}  

?>
</div>

<div class="mostliked-lightbox">
 
</div>

<script>
  $(document).ready(function(e){
   $('.mostliked-pics').hover().css({"cursor":"pointer"});
   $('.nav-col').on('mouseover',function(){
     $('.mstliked-text').addClass('start');
   });

   $('.nav-col').on('mouseout',function(){
     $('.mstliked-text').removeClass('start');
   });

   $('.nav-col').hover().css({"cursor":"pointer"});
   
   $('#h-link').on('click',function(){
     window.location.href="./index.php";
   });

    $('#p-link').on('click',function(){
     window.location.href="./profile.php";
   });

    $('#e-link').on('click',function(){
     window.location.href="./explore.php";
   });


     $('#ml-link').on('click',function(){
     window.location.href="./mostliked.php";
   });


   });
  
  

</script>

<script lanquaqe="javascript" src="main.js"></script>
</body>
</html>    