var $window = $(window);
var $elements = $('.animation_element');
var $elements2 = $('.animation_element2');
var $elements3 = $('.animation_element3');
var $elements4 = $('.animation_element4');



function ElementIsInView(){
	var window_height = $window.height();
	var window_top_position = $window.scrollTop();
	var window_bottom_position = (window_height+window_top_position);

	$.each($elements,function(){
       var $element = $(this);
       var element_height = $element.outerHeight();
       var element_top_position = $element.offset().top;
       var element_bottom_position = (element_height+element_top_position);

       if(element_bottom_position >= window_top_position
       	  && element_top_position <= window_bottom_position)
       {
       	 $element.addClass('inview slide_left');

       } 
 	}); 

   $.each($elements2,function(){
   	 var $element2 = $(this);
   	 var element2_height = $element2.outerHeight();
   	 var element2_top_position = $element2.offset().top;
   	 var element2_bottom_position = (element2_top_position + element2_height);

   	 if(element2_bottom_position >= window_top_position
   	 	&& element2_top_position <= window_bottom_position)
   	 {
   	 	$element2.addClass('inview slide_right');
   	 } 
   });

    $.each($elements3,function(){
   	 var $element3 = $(this);
   	 var element3_height = $element3.outerHeight();
   	 var element3_top_position = $element3.offset().top;
   	 var element3_bottom_position = (element3_top_position + element3_height);

   	 if(element3_bottom_position >= window_top_position
   	 	&& element3_top_position <= window_bottom_position)
   	 {
   	 	$element3.addClass('inview slide_top');
   	 } 
   });

    $.each($elements4,function(){
   	 var $element4 = $(this);
   	 var element4_height = $element4.outerHeight();
   	 var element4_top_position = $element4.offset().top;
   	 var element4_bottom_position = (element4_top_position + element4_height);

   	 if(element4_bottom_position >= window_top_position
   	 	&& element4_top_position <= window_bottom_position)
   	 {
   	 	$element4.addClass('inview slide_bottom');
   	 } 
   });		
}

$window.on('scroll resize',ElementIsInView);
$window.trigger('scroll');