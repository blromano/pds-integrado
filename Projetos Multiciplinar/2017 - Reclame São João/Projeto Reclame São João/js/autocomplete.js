	
	$(function() {
	//autocomplete
	$(".auto").autocomplete({
	source: "php/mod02/procurarEstabelecimento.php",
	minLength: 1
	});				
	});