<?php
error_reporting('E_ALL & ~E_NOTICE');
require_once("connection.php");
?>
<!Doctype html>
<head>
</head>


<body>
<?php 
$conn = new Connection ;
$con = $conn->connect();

$rec_limit = 10 ;
$page = $_GET['page'];
/* get max number of rows */
$sql = "SELECT count(`imageid`) 
         FROM `images`
         INNER JOIN `free_user` ON `free_user`.`freeid` = `images`.`freeid`
         WHERE `free_user`.`freeid` = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param('i',$_SESSION['freeid']);
 $stmt->execute();

if(!$stmt->execute())
{
  die("error:".$stmt->error );
}

$row = $stmt->fetch();
$stmt->close();
$rec_count = $row[0];

if(isset($page))
{
   $page = $_GET['page']+1;
   $offset = $rec_limit * $page;
}
else
{
  $page = 0;
  $offset = 0;
}

$left_rec = $rec_count - ($rec_limit * $page);



$sql = "SELECT  `images`.*,`free_user`.* 
        FROM `images`
        INNER JOIN `free_user` ON `free_user`.`freeid` = `images`.`freeid` 
        WHERE `free_user`.`freeid` = ?
        LIMIT $offset,$rec_limit";

$stmt = $con->prepare($sql);
$stmt->bind_param('i',$_SESSION['freeid']);
$stmt->execute();
$result = $stmt->get_result();
if(!$stmt->execute())
 {
  die("Error in sql:".$stmt->error);
 }
  ?><div class="panel-body">
     <div class="img-container"><?php
  if(mysqli_num_rows($result) <= 0)
  {
    ?><p style="text-align:center;color:red;font-size:1.2em;">No images found</p>
  <?php  
  }
  while($row = $result->fetch_assoc())
   {
        ?> 
        <div class="img-style"> 
         <img  src=<?php echo "'".$row['imageurl']."'" ?>  class="img-responsive img-rounded  lightbox-trigger" 
              alt=<?php echo "'".$row['title']."'"?> title=<?php echo "'".$row['title']."'" ?> id=<?php echo "'".$row['imageid']."'"; ?> " >     
         <form action="delete.php" method="post" name="imgformdel" id="imgformdel">        
           <input type="hidden" value=<?php echo $row['imageid'] ?> name="imageid" />  
           <input type="hidden"  value=<?php  echo $row['imageurl']  ?> name="imagename" />
           <button  type="submit" class="btn btn-danger" name="imgsubmit" id ="imgsubmit" >DELETE</button>
         </form>
        </div> 
        <?php  
   }

   if( $page > 0 ) 
   {
      $last = $page - 2;
      ?><a href = '<?php echo  "profile.php?page=".$last; ?>' ><i class="fa fa-arrow-left" aria-hidden="true"><span class="nextlast-img">LAST 10 IMAGES</i></a> 
        <a href = '<?php echo  "profile.php?page=".$page; ?>' ><i class="fa fa-arrow-right" aria-hidden="true"><span class="nextlast-img">NEXT 10 IMAGES</i></a>
      <?php  
         }else if( $page == 0 ) 
           {
      ?>     <a href = '<?php echo "profile.php?page=".$page; ?>' ><i class="fa fa-arrow-right" aria-hidden="true"><span class="nextlast-img">NEXT 10 IMAGES</i></a>
      <?php
           } else if( $left_rec < $rec_limit ) 
             {
               $last = $page - 2;
      ?>       <a href ='<?php echo "profile.php?page=".$last; ?>' ><i class="fa fa-arrow-left" aria-hidden="true"><span class="nextlast-img">LAST 10 IMAGES</i></a>
      <?php 
             }  
         
   $stmt->close();   
?>
 
</div>
</div>

<script>
  var img = document.getElementsByTagName('img');
  document.addEventListener('onmouseover',imgAnimation);
  var count = 0;
  function imgAnimation(){
    img.style.transform='scale(2.5,2.5)';
    count = 1;
    console.log(count);
    return count;
  } 

 if(imgAnimation === 1)
 {
 document.removeEventListener('onmouseover',imgAnimation);
 }
</script>
</body>

</html>