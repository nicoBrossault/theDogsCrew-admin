$(document).ready(function() {
	
	$('.button-collapse').sideNav({
	      menuWidth: 280, // Default is 240
	      edge: 'left', // Choose the horizontal origin
	      //closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
		}
	);

	$('.datepicker').pickadate({
		selectMonths: true, // Creates a dropdown to control month
		selectYears: 15 // Creates a dropdown of 15 years to control year
	});
	
	//collapsible user
	$('.collapsibleUser-body').css('display','none');
	$('.closeUser').hide();
	$('.openUser').click(function(){
		$('.collapsibleUser-body').slideDown("speed");
		$('.openUser').hide();
		$('.closeUser').show();
	});
	$('.closeUser').click(function(){
		$('.collapsibleUser-body').slideUp("speed");
		$('.closeUser').hide();
		$('.openUser').show();
	});
	
	//collapsible items of page in menu
	$('.collapsiblePage-body').css('display','none');
	$('.close').hide();
	$('.open').click(function(){
		$('.collapsiblePage-body').slideDown("speed");
		$('.open').hide();
		$('.close').show();
	});
	$('.close').click(function(){
		$('.collapsiblePage-body').slideUp("speed");
		$('.close').hide();
		$('.open').show();
	});
	
	//Fonction textarea
	$('.func').click(function(){
		var func=$(this).attr('id');
		var text=$(".materialize-textarea").val()+'<'+func+'></'+func+'>';
		$(".materialize-textarea").val(text);
	});
	$('.clearText').click(function(){
		var text='';
		$(".materialize-textarea").val(text);
	});
	
    //La fonction s'active sur l'évènement keydown dans la zone de texte
    $(".materialize-textarea").keydown(function(limit){
    	//Définir la limite à atteindre
    	var max="false";
    	var limit = "5";
    	if ($(".article")[0]){
    		var limitMax="300";
	  	    var max="true";
    	}

    	//Récupérer le nombre de caractères dans la zone de texte
    	var currlength = $(this).val().length;

    	//Afficher un texte de légende en fonction du nombre de caractères
    	if(currlength >= limit){
    		$("#legende")
    		.removeClass("insuffisant")
    		.addClass("suffisant")       
    		.css('color','black');
    		$(".materialize-textarea").css('color','black');
    		if (max=="true"){
    			$("#legende").html("Vous avez saisi " + currlength + " caractères sur "+limitMax+" maximum");
    		}else{
    			$("#legende").html("Vous avez saisi " + currlength + " caractères");
    		}
    	}else{
    		$("#legende")
    		.removeClass("suffisant")
    		.addClass("insuffisant")
    		.html("Vous avez saisi " + currlength + " caractères sur " + limit + " minimum")
    		.css('color','red');
    		$(".materialize-textarea").css('color','red');
    	}
    	if(max=="true" && currlength >= limitMax){
			$("#legende")
			.removeClass("suffisant")
			.addClass("insuffisant")
			.html("Vous avez saisi " + currlength + " caractères sur " + limitMax + " maximum")
			.css('color','red');
			$(".materialize-textarea").css('color','red');
		}
	});
	        
})