$(function(){
	var average = $('.ratingAverage').attr('data-average');
	function avaliacao(average){
		average = (Number(average)*20);
		$('.bg').css('width', 0);		
		$('.barra .bg').animate({width:average+'%'}, 500);
	}
	
	avaliacao(average);

	$('.star').on('click', function(){
		var idArticle = $('.article').attr('data-id');
		var voto = $(this).attr('data-vote');
		$.post('votar.php', {votar: 'sim', artigo: idArticle, ponto: voto}, 'jSON');
	});
});