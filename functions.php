<?php
function hashPassword(){
    $password = $_POST['freepass'];
    $cost=12;
    $salt=strtr(base64_encode
    (mcrypt_create_iv
    (16,MCRYPT_DEV_URANDOM)),'+','.');
    $salt=sprintf("$2a$%02d$",$cost).$salt;
    $hash = crypt($password,$salt);

    return $hash;
}

function compress($source,$destination,$quality)
{
	$info = getimagesize($source);
	echo filesize($source);

	if($info['mime'] == "image/jpeg")
	{
		$image = imagecreatefromjpeg($source);
		echo "photo is jpeg" ;
	} else if($info['mime'] == "image/png")
	  {
	  	$image = imagecreatefrompng($source);
	  	echo "photo is png" ;
	  } else if($info['mime'] == "image/gif")
	    {
	    	$image = imagecreatefromgif($source);
	    	echo "photo is gif" ;
	    }
     
    imagejpeg($image,$destination,$quality) ;
    echo filesize($destination);
	return $destination;
}
?>