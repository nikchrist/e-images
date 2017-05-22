<?php
session_start();
//error_reporting('E_ALL ~& E_NOTICE');
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

</script>
<title>Profile</title>
</head>

<body id="bd" >


<button class="btn btn-primary prof-menubtn">MENU</button>
<div class="prof-menu">
  <ul class="prof-menu-ul">
   <a href="index.php"><li>HOME</li></a>
   <a href="profile.php"><li>PROFILE</li></a>
   <a href="explore.php"><li>EXPLORE</li></a>
   <a href="mostliked.php"><li>MOSTLIKED PHOTOS</li></a>
  </ul>  
</div>
<a href="#" class="scrollToTop"></a> 
<script>
$(document).ready(function(){
  
  //Check to see if the window is top if not then display button
  $(window).scroll(function(){
    if ($(this).scrollTop() > 100) {
      $('.scrollToTop').fadeIn();
    } else {
      $('.scrollToTop').fadeOut();
    }
  });
  
  //Click event to scroll to top
  $('.scrollToTop').click(function(){
    $('html, body').animate({scrollTop : 0},800);
    return false;
  });
  
});

</script>


<div class="row" id="profile-top-row">

<div class="col-md-3">
 <div id="avatar-style">
  <?php include('avatar.php'); ?>
 </div> 
</div>

<div class="col-md-6 text-center" >
  <h1  id="profiletext">Profile|<?php echo ucfirst($_SESSION['freeusername']); ?></h1>
  <button id="btn" class="btn btn-primary">UPLOAD</button>
  <div id="formupload"></div>
</div>


<div class="col-md-3">
 <div class="search-engine">
  <h2 style="color:white;text-align:center" >Search</h2>
  <form class="navbar-form" role="search" action="search.php">
    <div class="input-group add-on">
      <input type="text" class="form-control" placeholder="Search  images" name="k" id="srch-term">
         <div class="input-group-btn">
           <button class="btn btn-default btnSubmit btn-lg" type="submit" >
             <i class="glyphicon glyphicon-search "></i>
           </button>
         </div>
    </div>
  </form>
 </div>
</div>

</div>


<script>

 var count = 0 ;
$(document).mouseup(function (e)
{
   
    var container = $(document.getElementById("formupload"));
    var button = $(document.getElementById("btn")); 

    if (!container.is(e.target)&& container.has(e.target).length === 0 && !button.is(e.target) ) 
    {
        container.fadeOut("slow");
        count = 0;
        return;
    }
    if(button.is(e.target) && count %2 == 0)
    {
        container.toggle("slow");
        count++;
       
        return ;
      }
    if(button.is(e.target) && count %2 == 1)
    {
        container.fadeOut("slow");
        count++;
       
        return;
    } 
});

document.getElementById("formupload").style.display ="none";
var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("formupload").innerHTML = xhttp.responseText;
      
    }
  };
  xhttp.open("GET", "uploadform.html", true);
  xhttp.send();
</script>


<hr />


 <div class="row">

 
  <div class="panel panel-primary panel-transparent">
 
   <div class="panel-heading"><h1 style="text-align:center">Uploaded Images</h1></div>
   <?php
     include('gallery.php');
   ?>
  
  </div>
 
</div>

<div id="showlight">
</div>

<script>
 var images = $(document.getElementsByTagName('img'));
 images.css({"cursor":"pointer"})
 $('.img-style').click(function(e){
   $.ajax({
     url:'lightbox.php',
     type:'POST',
     data:({imgid:e.target.id}),
     success:function(response){
        $('#showlight').html(response).css({"animation":"lightboxmove 1s forwards","display":"block"});
        $('#lightboximage').css({"animation":"lightboximgmove 0.3s forwards"});
     }
     
   });
});

$('body').click(function(){
  $('#showlight').hide();
});


</script>

<br>
<br>

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

<script src="bootstrap/js/bootstrap.min.js"></script>
<script language="javascript" src="./main.js"></script>
</html>