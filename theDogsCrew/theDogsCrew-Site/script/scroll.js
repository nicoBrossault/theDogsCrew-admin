console.log("js scroll running");
$(document).ready( function () {
   $('#redirection').click(function() {
     $('html,body').animate({scrollTop: $("#elem1").offset().top}, 'slow');
   });  
})