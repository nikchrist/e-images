<?php 

class Upload extends Connection {
    
  private $strategy = NULL ;
  

  public function  __construct($strategy_id,$params){
    $this->params["fileToUpload"]["name"] = $params["fileToUpload"]["name"];
      $this->params["fileToUpload"]["size"] = $params["fileToUpload"]["size"];
      $this->params["fileToUpload"]["type"] = $params["fileToUpload"]["type"];
      $this->params["fileToUpload"]["error"] = $params["fileToUpload"]["error"];
      $this->params["fileToUpload"]["tmp_name"] = $params["fileToUpload"]["tmp_name"];
      $this->params["desc"] = $params["desc"];
      $this->params["title"] = $params["title"];

        switch($strategy_id)
        {
          case "video" :
          $this->strategy = new UploadVideo($this->connect(),$params);
          break;

          case "image" :
          $this->strategy = new UploadImage($this->connect(),$params);
          break;

          case "avatar":
          $this->strategy = new UploadAvatar($this->connect(),$params);
          break;
        }
  }

  public function getUpload(){
    return $this->strategy->upload();
  }

  

}


interface UploadInterface 
{
  public function upload();
}


class UploadImage implements UploadInterface 
{
  public function __construct($conn,$params){
    $this->conn = $conn;
    $this->params["fileToUpload"]["name"] = $params["fileToUpload"]["name"];
      $this->params["fileToUpload"]["size"] = $params["fileToUpload"]["size"];
      $this->params["fileToUpload"]["type"] = $params["fileToUpload"]["type"];
      $this->params["fileToUpload"]["error"] = $params["fileToUpload"]["error"];
      $this->params["fileToUpload"]["tmp_name"] = $params["fileToUpload"]["tmp_name"];
      $this->params["desc"] = $params["desc"];
      $this->params["title"] = $params["title"];
  }

  public function upload(){
        $baseurl = "uploads/";
        $seed = mt_rand(1,2000) *  mt_rand(1,10);
        $basefile = $seed.basename($this->params['fileToUpload']['name']);
        $imgurl = $baseurl.$basefile;
        $type = $this->params["fileToUpload"]["type"];
        $desc = $this->params['desc'];
        $title = $this->params['title'].".".$type;
        if(strpos($imgurl," - Copy"))
        {
          $imgurl = substr($imgurl,0,-11) ;
        }
        $allowedextensions = array("pjpeg","jpg","jpeg","gif","png");
        $extension  = pathinfo($this->params["fileToUpload"]["name"],PATHINFO_EXTENSION);
        if(($this->params["fileToUpload"]["type"] == "image/pjpeg")
          ||($this->params["fileToUpload"]["type"] == "image/jpg")
          ||($this->params["fileToUpload"]["type"] == "image/jpeg")
          ||($this->params["fileToUpload"]["type"] == "image/gif")
          ||($this->params["fileToUpload"]["type"] == "image/png")

          &&($this->params["fileToUpload"]["size"] < 450000)
          && in_array($extension,$allowedextensions) )
          {
            if($this->params["fileToUpload"]["error"] >  0)
            {
              echo "Return Code: " . $this->params["fileToUpload"]["error"] . "<br />";
            }else{

               if(file_exists($imgurl))
               {
                  echo $this->params["fileToUpload"]["name"] . " already exists. ";
               }else{ 
                  $compressedimgurl = compress($this->params["fileToUpload"]["tmp_name"],$imgurl,70);   
                  move_uploaded_file($this->params["fileToUpload"]["tmp_name"],$compressedimgurl);
                  if($this->conn)
                  {
                    echo "success";
                  }

               
                  $id = $_SESSION['freeid'];
                  $sql="INSERT INTO `images`(`imageurl`,`freeid`,`type`,`description`,`title`) VALUES('".$imgurl."','".$id."','".$type."','".
                  $desc."','".$title."')" ;
                  $result = mysqli_query($this->conn,$sql);
                  $_SESSION['imgurl'] = $imgurl;
                
                  if(!$result)
                  {
                    die("Error in sql:".mysqli_error($this->conn));
                  }

                    
               }      
              
            }

        }
      }
    }     

class UploadAvatar implements UploadInterface
{
  public function __construct($conn,$params){
    $this->conn = $conn;
    $this->params["fileToUpload"]["name"] = $params["fileToUpload"]["name"];
      $this->params["fileToUpload"]["size"] = $params["fileToUpload"]["size"];
      $this->params["fileToUpload"]["type"] = $params["fileToUpload"]["type"];
      $this->params["fileToUpload"]["error"] = $params["fileToUpload"]["error"];
      $this->params["fileToUpload"]["tmp_name"] = $params["fileToUpload"]["tmp_name"];
  }

  public function Upload(){
        $baseurl = "user_avatar/";
        $seed = mt_rand(1,2000) *  mt_rand(1,10);
        $basefile = $seed.basename($this->params['fileToUpload']['name']);
        $allowedextensions = array("jpeg", "jpg", "png","gif");
        $extension  = pathinfo($this->params["fileToUpload"]["name"],PATHINFO_EXTENSION);
        $avatarurl = $baseurl.$basefile;
        if(strpos($avatarurl," - Copy"))
        {
          $avatarurl = substr($avatarurl,0,-11) ;
        }
        if((($this->params["fileToUpload"]["type"] == "image/jpeg")
          ||($this->params["fileToUpload"]["type"] == "image/jpg")
          ||($this->params["fileToUpload"]["type"] == "image/png")
          ||($this->params["fileToUpload"]["type"] == "image/gif"))

          &&($this->params["fileToUpload"]["size"] < 1000000)
          && in_array($extension,$allowedextensions) )
          {
            if($this->params["fileToUpload"]["error"] >  0)
            {
              echo "Return Code: " . $this->params["fileToUpload"]["error"] . "<br />";
            } else {

              if(file_exists($avatarurl))
              {
                echo $this->params["fileToUpload"]["name"] . " already exists. ";
                header('Location:profile.php');
              } else{
                $compressedavatarurl = compress($this->params["fileToUpload"]["tmp_name"],$avatarurl,70); 
                move_uploaded_file($this->params["fileToUpload"]["tmp_name"],$compressedavatarurl);
                
                $id = $_SESSION['freeid'];
                $sql="UPDATE  `free_user` SET `avatar` = ? WHERE `freeid`= ? " ;
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param('si',$avatarurl,$_SESSION['freeid']);
                $stmt->execute();
                $_SESSION['avatar'] = $avatarurl ;
                    if(!$stmt->execute())
                     {
                        die("Error in sql:".$stmt->error);
                     }

                  }
          }     
              
    }
  }
}
?>