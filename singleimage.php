<?php 
session_start();
$conn = mysqli_connect("localhost","root","asimakis","photo");
if(!$conn)
{
	die("Could not connect to database:".mysqli_connect_error($conn));
}

?>

<!Doctype html>
 <html>
  <head>
   <meta charset="utf-8" />
   <!-- CSS Files -->
   <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="../css/style.css">
   <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
   <link href="font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">
   <!-- JQUERY File -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
   <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
   <title>Single Image</title>
  </head>

 <body>
  <?php
  $q = $_GET['q'];
  $sql ="SELECT  `images`.*,`free_user`.* 
         FROM `images`
         INNER JOIN `free_user` ON `free_user`.`freeid` = `images`.`freeid` 
         WHERE `free_user`.`freeid` ='".$_SESSION['freeid']."' 
         AND `images`.`imageid`='".$q."'";
  $result = mysqli_query($conn,$sql);

  if(mysqli_num_rows($result) > 0)
   {
    ?>
    <?php
     while($row = mysqli_fetch_assoc($result))
     {
        $imageid = $row['imageid'];
         $imageurl = $row['imageurl'];
         $description = $row['description'];
         $type = $row['type'];
          $title= $row['title'];
        ?>
       
        <img src=<?php echo $imageurl; ?> alt=<?php echo $title; ?>
             title=<?php echo $title ?> class="img-responsive"  />
        <hr />
        <p>Description:<?php echo $description ?> </p>
        <p>Type:<?php echo  $type ?></p>
        <p>Title:<?php echo $title ?></p> 
       
        <?php 

     }
   }  

  ?>

  </body>

  </html>