var navbar = ("page-header1");
if(navbar){
	//$(".navbar-style").css("margin-bottom","30%");
	//$(".navbar-style").css("margin-top","5%");
	$(".navbar-style").css("background-color","rgba(255, 255, 255, 0.0)");
	$(".navbar-style").css("background-size","cover");
	$(".contient-navbar").css("background-color","rgba(255, 255, 255, 0.3)");
	$(".redirect").removeClass("invisible");
}
function redimensionnement(){ 
 
    var $image = $(".navbar-style");
    var image_width = $image.width(); 
    var image_height = $image.height();     
     
    var over = image_width / image_height;
    var under = image_height / image_width; 
     
    var body_width = $(window).width(); 
    var body_height = $(window).height(); 
     
    if (body_width / body_height >= over) { 
      $image.css({ 
        //'width': body_width + 'px', 
        'height': Math.ceil(under * body_width) + 'px', 
        'left': '0px', 
        'top': Math.abs((under * body_width) - body_height) / -2 + 'px',
      }); 
    }  
     
    else { 
      $image.css({ 
        //'width': Math.ceil(over * body_height) + 'px', 
        'height': body_height + 'px', 
        'top': '0px', 
        'left': Math.abs((over * body_height) - body_width) / -2 + 'px',
      }); 
    }
}
     
$(document).ready(function(){

    // Au chargement initial   
    redimensionnement();
     
    // En cas de redimensionnement de la fenêtre
    $(window).resize(function(){ 
        redimensionnement(); 
    });  
}); 