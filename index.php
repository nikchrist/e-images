<?php 
session_start();
require_once("connection.php");
error_reporting('E_ALL ~& E_NOTICE');


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
<link rel="stylesheet" type="text/css" href="simple_sidebar.css">
<link href="font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">
<!-- JQUERY File -->
<script lanquaqe="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<title>Photo Heaven</title>
</head>

<body>

 <div class="container"> 
 <a href="#" class="scrollToTop"></a> 

 <div class="container-fluid">
  <!-- Navigation Bar --> 
  <nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="297" id="menu-top">
     <div class="container-fluid">
      <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
         </button>
       <a class="navbar-brand" href="index.php">Photo Heaven</a>
     </div>
    <div>

<div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
      <li><a href="#home">Home</a></li>
      <li><a href="#contact">Contact Us</a></li>
      <li><a href="#services">Getting Started</a></li>
          <!-- Dropdown menu item -->
      <li><a href="#about">About Us</a></li>
    </ul>

      </div>
    </div>
  </div> 
</nav>

<!-- Home Section -->
<section id="home" >
 
  <nav class="navbar navbar-default no-margin">
    <!-- Brand and toggle get grouped for better mobile display -->
     <div class="navbar-header fixed-brand">
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"  id="menu-toggle">
         <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
       </button>
       <a class="navbar-brand" href="#"><i class="fa fa-users"></i> Registration</a>
    </div><!-- navbar-header-->
 
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
         <li class="active" ><button class="navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle-2"> 
         <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
         </button></li>
      </ul>
    </div><!-- bs-example-navbar-collapse-1 -->
  </nav>



<div id="wrapper">
        <!-- Sidebar -->
  <div id="sidebar-wrapper">
    <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
      <li class="active">
        <a href="#"><div id="showsignupform"><span class="fa-stack fa-lg pull-left"><i class="fa fa-sign-in"></i></span>Sign Up</div></a>
      </li>
      <?php if(!isset($_SESSION['freeid'])){
      	?>
      <li >
       <a href="#"><div id="showloginform"><span class="fa-stack fa-lg pull-left"><i class="fa fa-plug"></i></span>LogIn</div></a>
      </li><?php } ?>
      <?php if(isset($_SESSION['freeid']))
      {

      ?>	
       <li>
        <a href="logout.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-sign-out"></i></span>Sign Out</a>
       </li>
       <li>
        <a href="profile.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-user"></i></span>Profile</a>
       </li> <?php 
      } ?>
                
    </ul>
  </div><!-- /#sidebar-wrapper -->
</div>
</section>  
 
<div id="signupform" ></div>
<div id="loginform" ></div>  

<!--Slider Title -->
<div class="well well-lg animation_element2"><h1 style="text-align:center;">PHOTO SAMPLES</h1></div>
<!-- Slider --> 
 <section id="slider" class="animation-element.slide-left animation_element">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
     <ol class="carousel-indicators">
       <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
               <li data-target="#myCarousel" data-slide-to="1"></li>
               <li data-target="#myCarousel" data-slide-to="2"></li>
               <li data-target="#myCarousel" data-slide-to="3"></li>
         </ol>

  <!-- Wrapper for slides -->
       <div class="carousel-inner" role="listbox">
         <div class="item active">
           <img src="./slider/bridge.jpg" alt="slides-3"  >
         </div>

       <div class="item">
           <img src="./slider/elevator.jpg" alt="slide-2" >
       </div>

       <div class="item">
           <img src="./slider/mill.jpg" alt="slider-5">
       </div>

       <div class="item">
           <img src="./slider/seascape.jpg" alt="slider-1" >
       </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>

  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>  
 </div>
</section>
 <!-- Seperate Sections -->
  <div class="seperator-1">
  </div>
   <div class="seperator-1">
  </div>    

<!-- Link Buttons -->
<div class="well well-lg animation_element3"><h1 style="text-align:center;">OUR SERVICES </h1></div>
<section id="services" data-speed="6" data-type="background" class="animation_element4">

   
     <div class="container">
       <div class="row" id="row-services">
        <div class="col-md-4" >
         <div class="serviceimage" ><a href="explore.php" ><img src="images/explore-icon.png" width="30%" height="30%" class="img-responsive" alt="info"></a>
         <p class="serviceinfo" id="exploreinfo">Explore our</br>
          outstanding photos!!</p></div>
        </div> 
        
        <div class="col-md-4" >
        <div class="serviceimage"><a href="mostliked.php"><img src="images/like-icon.png" width="30%" height="30%" class="img-responsive" alt="info" ></a>
        <p class="serviceinfo" id="likeinfo">The most beatiful </br>
        photos you have</br>
        ever seen</p></div>
        </div>
         <div class="col-md-4" >
        <div class="serviceimage"><a href="profile.php"><img src="images/profile-icon.png" width="30%" height="30%" class="img-responsive" alt="info"></a>
        <p class="serviceinfo" id="profileinfo">Go to your </br>
        profile</p></div> 
      </div>
     </div> 
</section>
<div id="serviceerrors">
</div>

<?php if(!$_SESSION['freeid'])
      {
 ?>       
<script>
 $(document).ready(function(){
   $('.serviceimage').on('click',function(){
     alert("Please login to use our services");
     return false;
   });
 });
</script>
<?php
}
?>

<?php if($_SESSION['freeid'])
{
?>
<script>
 $('.serviceinfo').click(function(e){
   console.log(e.target.id);
   if(e.target.id == 'exploreinfo' )
   {
     window.location.href='explore.php';
   }
   if(e.target.id == 'likeinfo')
   {
    window.location.href ='mostliked.php';
   }
   if(e.target.id == 'profileinfo')
   {
    window.location.href ='profile.php';
   }
 });
 </script>
<?php
}
?>

<!-- Second Seperator -->
 <div class="seperator-1">
 </div> 

 <div class="well well-lg animation_element"><h1 style="text-align:center;">ABOUT US </h1></div>
  <section id="about" data-speed="6" data-type="background" class="animation_element2">
 <div class="container">
  <div class ="row" id="row-about">
     <div class="col-sm-4">
     <div class="aboutlinks" id="learnabout"><h1 id="learntext">Learn More About Us</h1></div>
     </div>
     <div class="col-sm-4">
     <div class="aboutlinks" id="ourteam"><h1 id="teamtext">Our Team </h1></div>
     </div>

     <div class="col-sm-4">
     <div class="aboutlinks" id="ourservices"><h1 id="servicetext">Learn More About Our Services</h1></div>  
     </div>
   </div>
 </div>
 
 </section> 

 <div class="row">

 <div class="col-md-4">
 <div id ="learnaboutbox">
 </div>
 </div>

 <div class="col-md-4">
  <div id="ourteambox">
 </div>
 </div>

 <div class="col-md-4">
 <div id="ourservicesbox">
 </div> 
 </div>

 </div>   	

  <div class="seperator-1">
 </div> 

<!-- Contact -->
<div class="well well-lg animation_element3"><h1 style="text-align:center;">CONTACT US</h1></div>
<section id="contact" data-speed="6" data-type="background" class="animation_element2">
     
    <div class="row">
     <h1 style="margin-top:-5%;margin-left:5%;color:black;">Find Us Here</h1>
     <div class="col-md-1">

     <div id="map">
     </div>

     </div>

     <script>
      function initMap(){
       var mapDiv = document.getElementById('map');
        var map = new google.maps.Map(mapDiv, {
          center: {lat: 40.682196, lng:  22.914466},
          zoom: 8
        });
      }
     </script>


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSrhZDmEd80HCbofUL4fzHk3k7wH7V00c&callback=initMap"
    async defer></script>
  
      <div class="col-md-2">
      </div>
      <!-- Contact Form -->
       <div class="col-md-9">
       <form class="form-horizontal" role="form" method="post" action="contact.php" style="position:relative;" id="contact-form">

          <div class="form-group">
             <label for="name" class="col-sm-5 control-label">Subject</label>
             <div class="col-sm-5">
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" value="" >
             </div>
          </div>

          <div class="form-group">
             <label for="name" class="col-sm-5 control-label">First Name</label>
             <div class="col-sm-5">
                <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" value="" required>
             </div>
          </div>
 
          <div class="form-group">
             <label for="name" class="col-sm-5 control-label">Last Name</label>
             <div class="col-sm-5">
                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" value="" required>
             </div>
          </div>

          <div class="form-group">
            <label for="email" class="col-sm-5 control-label">Email</label>
            <div class="col-sm-5">
               <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="" required>
           </div>
         </div>

         <div class="form-group">
            <label for="message" class="col-sm-5 control-label">Message</label>
            <div class="col-sm-5">
              <textarea class="form-control" rows="4" name="message"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="human" class="col-sm-5 control-label">2 + 3 = ?</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="human" name="human" placeholder="Your Answer" required>
            </div>
        </div>

        <div class="form-group">
           <div class="col-sm-10 col-sm-offset-5">
              <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
           </div>
        </div>

        <div class="form-group">
           <div class="col-sm-10 col-sm-offset-2">
              <! Will be used to display an alert to the user>
           </div>
        </div>

     </form>
  
  
 </div>  
</div>

</section> 
<br/>
<!-- Footer -->   


<div class="row" style="background-color:white;margin-bottom:2%" >

<div class="ft-container">
 <div class="col-md-6">
  <div class="pull-left">
   <span class="footer-text">Powered By Nikolaos Christomanos</span>
   <br>
   <span class="footer-text">Copyright &copy; Nikolaos Christomanos</span>

  </div>
 </div>

 <div class="col-md-6">
   <div class="pull-right">
    <span class="footer-text">Social Links</span>
    <div class="s-links">
      <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
      <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
      <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
      <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
     
   </div>
 </div>

 </div>
 </div>
 </div>

    <!--End of main Container class -->

 <!-- Javascript Files -->
<script lanquaqe="javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script lanquaqe="javascript" src="main.js"></script>
<script lanquaqe="javascript" src="sidebar.js"></script>
<script lanquaqe="javascript" src="animation.js"></script>


      
</body>

</html>