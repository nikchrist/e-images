<?php
   
   /*$conn = new Connection;
   $con = $conn->connect();*/

   $con = new mysqli("localhost","root","asimakis","photo");
   $k = $_GET['k'];
   echo $k;
   $i  = 1;
   $searchterms = explode(" ",$k) ;
   $query1 = "SELECT * FROM `images` as `img`   WHERE `img`.`title` = ?" ;         
   $stmt = $con->prepare($query1);
   $stmt->bind_param("s",$k);
   var_dump($query1);
   $stmt->execute();
   var_dump($stmt->num_rows);
   if(!$stmt->execute())
   {
     die("error in query 1:".$stmt->error);
   }
   if($stmt->num_rows > 0)
   {
      while($row  = $stmt->fetch())
      {
          
      	  $imageid = $row['imageid'];
      	  $imageurl = $row['imageurl'];
      	  $description = $row['description'];
      	  $type = $row['type'];
          $title= $row['title'];
          $titlesize= strlen($title);
          $basefile = explode(".",$title);
          $basefilesize = strlen($basefile[0]);
          $extensionsize = $titlesize - $basefilesize ;
          $extension = substr($title,$basefilesize+1);

          if( ($extension == "image/jpeg")||($extension == "image/png")||($extension == "image/jpg")
            ||($extension == "image/ico")||($extension == "image/gif") )
          {
      	 ?> 
          <img src =<?php echo $imageurl ?> alt=<?php echo $title?>
               title=<?php echo $basefile[0]; ?> class="img-responsive" />
          <hr />     
          <p>Type:<?php echo $type ;?></p>     
          <p>Title:<?php echo $basefile[0];?></p>     
          <p>Description:<?php echo $description ?></p>
          <hr />  
      <?php 
         }
      }
   } 
   else
   {

   	 echo "No results found" ;
   }

$stmt->close();
$con->close();


?>