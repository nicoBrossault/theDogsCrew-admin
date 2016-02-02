$(document).ready(function() {
	console.log("js is running");
	nbImg=0;
	$('.image-galerie').each(function(){
		nbImg+=1;
	});
	// Fait dispparaître les images
	$('.image-galerie').fadeOut(1);
	// Fait apparaître l'image 1 (soit id = 0)
	$('.image-galerie[id="0"]').fadeIn(1);

	// Retire tout les cadre au miniature
	$('thumbnail').removeClass('cadre');
	// Fait apparaître un cadre sur la miniature 1 (soit id = 0)
	$('thumbnail[id="0"]').addClass('cadre');

	// Fait dispparaître les description des images
	$('.desc').fadeOut(1);
	// Fait apparaître l'image 1 (soit id = 0)
	$('.desc[id="0"]').fadeIn(1);
	var id=0;

	//------Clique sur Suivant---------\\
	$('.suiv').click(function(){
		id++;
		if(id>=nbImg-1){
			id=nbImg-1;
		}
		$('.image-galerie').fadeOut(400).delay(100);
		$('.image-galerie[id="'+id+'"]').removeClass('invisible');
		$('.image-galerie[id="'+id+'"]').delay(200).fadeIn(400);
		$('.img-thum').removeClass('cadre');
		$('.img-thum[id="'+id+'"]').addClass('cadre');
		$('.img-thum[id="'+id+'"]').css("margin-bottom:-2%");
		$('.desc').fadeOut(400).delay(100);
		$('.desc[id="'+id+'"]').removeClass('invisible');
		$('.desc[id="'+id+'"]').delay(200).fadeIn(400);
	});

	//------Clique sur Precedent---------\\
	$('.prec').click(function(){
		id--;
		if(id <= 0){
			id=0;
		}
		$('.image-galerie').fadeOut(400).delay(100);
		$('.image-galerie[id="'+id+'"]').delay(200).fadeIn(400);
		$('.img-thum').removeClass('cadre');
		$('.img-thum[id="'+id+'"]').addClass('cadre');
		$('.desc').fadeOut(400).delay(100);
		$('.desc[id="'+id+'"]').removeClass('invisible');
		$('.desc[id="'+id+'"]').delay(200).fadeIn(400);
	});

	//------Selection par thumbnail---------\\
	$('.img-thum').click(function(){
		id = $(this).attr('id');
		$('.img-thum').removeClass('cadre');
		$('.image-galerie').fadeOut(400).delay(300);
		$('.image-galerie[id="'+id+'"]').delay(100).fadeIn(400);
		$(this).addClass('cadre');
		$('.desc').fadeOut(400);
		$('.desc[id="'+id+'"]').fadeIn(400);
	});
});	