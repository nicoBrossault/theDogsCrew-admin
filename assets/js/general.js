$(document).ready(function() {
	$('.button-collapse').sideNav({
	      menuWidth: 280, // Default is 240
	      edge: 'left', // Choose the horizontal origin
	      //closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
		}
	);
	$('.collapsible').collapsible({
      accordion : true // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
	$('.datepicker').pickadate({
		selectMonths: true, // Creates a dropdown to control month
		selectYears: 15 // Creates a dropdown of 15 years to control year
	});
	   
    //La fonction s'active sur l'évènement keydown dans la zone de texte
    $(".materialize-textarea").keydown(function(limit) {
      //Définir la limite à atteindre
      var limit = "5";

      //Récupérer le nombre de caractères dans la zone de texte
      var currlength = $(this).val().length;

      //Afficher un texte de légende en fonction du nombre de caractères
      if(currlength >= limit){
        $("#legende")
        .removeClass("insuffisant")
        .addClass("suffisant")
        .html("Vous avez saisi " + currlength + " caractères")
        .css('color','black');
        $(".materialize-textarea").css('color','black');
      }
      else{
        $("#legende")
        .removeClass("suffisant")
        .addClass("insuffisant")
        .html("Vous avez saisi " + currlength + " caractères sur " + limit + " minimum")
        .css('color','red');
        $(".materialize-textarea").css('color','red');
      }
    });
	        
})