<?php
  require_once('connection.php');
  $conn = new Connection;
  $con = $conn->connect();
 
  $imgid = $_POST['imgid'] ;
  $sql = "SELECT * FROM `images` WHERE `imageid` = ?" ;
  $stmt = $con->prepare($sql);
  $stmt->bind_param('i',$imgid);
  $stmt->execute();
  $result = $stmt->get_result();
  if(!$stmt->execute())
  {
  	 die('error in query:'.$stmt->error) ;
  }
?>  

<div class="row" width="100%" height="400px">
 <?php  while($row = $result->fetch_assoc())
        {
           ?>
            <p> click to close </p>
            <img src=<?php echo $row['imageurl'] ?> id="lightboximage" />
            <span id="imgtext"><?php echo $row['title'] ?></span>
           <?php
        }  ?>

</div>

<?php $stmt->close(); ?>