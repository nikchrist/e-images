
/*Parallax effect */
$(document).ready(function(){
   // cache the window object
   $window = $(window);
 
   $('section[data-type="background"]').each(function(){
     // declare the variable to affect the defined data-type
     var $scroll = $(this);
                     
      $(window).scroll(function() {
        // HTML5 proves useful for helping with creating JS functions!
        // also, negative value because we're scrolling upwards                             
        var yPos = -($window.scrollTop() / $scroll.data('speed')); 
         
        // background position
        var coords = '50% '+ yPos + 'px';
 
        // move the background
        $scroll.css({ backgroundPosition: coords });    
      }); // end window scroll
   });  // end section function
}); // close out script


// Scroll to Top 
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

//SignUp Form & Login Form animation 
     var count  = 0;
     var count2 = 0;
     $(document).mouseup(function(e){
       var container = $(document.getElementById("signupform"));
       var button = $(document.getElementById("showsignupform"));
        if(!container.is(e.target) && container.has(e.target).length === 0 && !button.is(e.target) )
        {
          container.fadeOut("fast");
          count = 0;
          return;
        }

        if(button.is(e.target) && count%2 == 0)
        {
          container.load("signupform.html").fadeIn("fast");
          count++;
          return ;
        }

        if(button.is(e.target) && count%2 == 1)
        {
          container.fadeOut("fast");
          count++;
          return;
        }
    });


  

     $(document).mouseup(function(e){
       var container2 = $(document.getElementById("loginform"));
       var button2 = $(document.getElementById("showloginform"));
        if(!container2.is(e.target) && container2.has(e.target).length === 0 && !button2.is(e.target) )
        {
          container2.fadeOut("fast");
          count2 = 0;
          return;
        }

        if(button2.is(e.target) && count2%2 == 0)
        {
          container2.load("loginform.html").fadeIn("fast");
          count2++;
          return ;
        }

        if(button2.is(e.target) && count2%2 == 1)
        {
          container2.fadeOut("fast");
          count2++;
          return;
        }
    });

//About  Section 
     var countlinks = 0 ;
     var textlearn = $(document.getElementById('learntext') );
     textlearn.css({"cursor":"pointer"});
     var textteam = $(document.getElementById('teamtext') );
     textteam.css({"cursor":"pointer"});
     var textservice = $(document.getElementById('servicetext') );
     textservice.css({"cursor":"pointer"});

   $(document).on('mouseup','.aboutlinks',function(e){
     var containerclass=$(document.getElementsByClassName('aboutlinks'))
     var containerteam = $(document.getElementById('ourteambox') );
     var containerlearn = $(document.getElementById('learnaboutbox') );
     var containerservices = $(document.getElementById('ourservicesbox') );
     var button = $(document.getElementById(this.id) );
    
     switch(this.id){

       case 'learnabout':
       containerteam.fadeOut('slow');
       containerservices.fadeOut('slow');
       containerlearn.load('learnabout.html').toggle('slow');
       break;
       
       case 'ourteam':
       containerlearn.fadeOut('slow');
       containerservices.fadeOut('slow');
       containerteam.load('ourteam.html').toggle('slow');
       break;

       case 'ourservices':
       containerlearn.fadeOut('slow');
       containerteam.fadeOut('slow');
       containerservices.load('ourservices.html').toggle('slow');
       break;
       default:
       containerlearn.fadeOut('slow');
       containerteam.fadeOut('slow');
       containerservices.fadeOut('slow');
       break;
     }
   });

    $(document).click(function(e){

      var containerlearn = $(document.getElementById('learnaboutbox') );
      var containerteam = $(document.getElementById('ourteambox') );
      var containerservices = $(document.getElementById('ourservicesbox') );
      if(e.target.id !== 'learnabout' && e.target.id !== 'learntext' && e.target.id!== 'learnaboutbox' 
        && e.target.className !== 'aboutlinks' && containerlearn.has(e.target).length === 0)
       {
         containerlearn.fadeOut('slow');
       }

      if(e.target.id !== 'ourteam' && e.target.id !== 'teamtext' && e.target.id!== 'ourteambox' 
        && e.target.className !== 'aboutlinks' && containerteam.has(e.target).length === 0)
       {
         containerteam.fadeOut('slow');
       }
      if(e.target.id !== 'ourservices' && e.target.id !== 'servicetext' && e.target.id!== 'ourservicesbox' 
        && e.target.className !== 'aboutlinks' && containerservices.has(e.target).length === 0)
       {
         containerservices.fadeOut('slow');
       }   
   });

/* profile menu btn */
$(document).ready(function(){
  $('.prof-menubtn').click(function(){
    $('.prof-menu').slideToggle('slow');
  });
});





 
   
  

var i = 0;



  setInterval(function(){
      if(i > $('.img-style').length)
     {
       clearInterval();

     } else {
      
     $('.img-style:nth-child('+i+')').css({'animation': 'img_animation 1s forwards'});
     i++; 

     }
     
  },200);

  setInterval(function(){
      if(i > $('.img-style-explore').length)
     {
       clearInterval();

     } else {
      
     $('.img-style-explore:nth-child('+i+')').css({'animation': 'img_animation 1s forwards'});
     i++; 

     }
     
  },200);

   setInterval(function(){
      if(i > $('.mostliked-pics').length)
     {
       clearInterval();

     } else {
      
     $('.mostliked-pics:nth-child('+i+')').css({'animation': 'img_animation 1s forwards'});
     i++; 

     }
     
  },200);

   


  

