	document.addEventListener('DOMContentLoaded', function(){
	var icon_not = document.getElementsByClassName('notifs')[0],
	dp 	 	 = document.getElementsByClassName('dp')[0],
	total_not= document.getElementsByClassName('ctnots')[0],
	res 	 = document.getElementById('res');

	icon_not.addEventListener('click', function(e){
	e.stopPropagation();
	dp.style.display = 'block';
	});

	document.addEventListener('click', function(){
	dp.style.display = 'none';
	});

	window.setInterval(function(){
	xhr.get('php/mod02/rec_notificacao.php?acao=verificar', function(total){
	total_not.innerHTML = total;
	});
	}, 1000);

	window.setInterval(function(){
	xhr.get('php/mod02/rec_notificacao.php?acao=getnots', function(nots){
		res.innerHTML = nots;
	});
	}, 1000);

	res.addEventListener('click', function(e){
	var elemento = e.target;

	if(elemento.classList.contains('vis')){
		xhr.get('php/mod02/rec_notificacao.php?acao=vis&idnot='+elemento.id, function(res){
		alert(res);
		});
	}
	});
			
	});