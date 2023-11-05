<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

	<title>Dados da consulta</title>
</head>
<body>
		<img src="https://thumbs.dreamstime.com/b/vector-user-icon-7337510.jpg" style="width:130px;height:130px; display: block;margin-left: auto;margin-right: auto">
		 <div style="text-align: left;">
			  <button type="button" class="btn btn-primary" onclick="habilitar()">Registrar Dados</button>
			  <button type="button" class="btn btn-danger" onclick="finalizar()">Finalizar Consulta</button>
			 
			  </div>
	<div>
		<form>
			  <div class="row">
			    <div class="col">
			    	<label>Nome</label>
			      <input type="text" class="form-control" value="Nome completo" id="nome" disabled>
			    </div>
			    <div class="col">
			    	<label>Gênero</label>
			      <input type="text" class="form-control" value="Maculino" id="genero" disabled>
			    </div>
			    <div class="col">
			    	<label>Data de nascimento</label>
			    	<input type="date" class="form-control" value="00/00/0000" id="data" disabled>
			    </div>
			  </div>
			  <div class="row">
			  	<div class="col">
			  		<label>Endereço</label>
			  		<input type="text" class="form-control" value="R.XXX xxx 00" id="rua" disabled>
			  	</div>
			  	<div class="col">
			  		<label>Email</label>
			  		<input type="Email" class="form-control" value="xxxxxx@xxxx.xxx" id="email" disabled>
			  	</div>
			  	<div class="col">
			  		<label>telefone</label>
			  		<input type="text" class="form-control" value="xxxx-xxxx" id="tel" disabled>
			  	</div>
			  </div>
			  <div class="row">
			  	<div class="col">
			  		<label>Objetivos Iniciais</label>
			  		<textarea class="form-control" id="Objetivos" rows="4" disabled></textarea>
			  	</div>
			  	<div class="col">
			  		<label>Experiência</label>
			  		<textarea class="form-control" id="Experiência" rows="4"  disabled></textarea>
			  	</div>
			  </div>
			  <div class="row">
			  	<div class="col">
			  		<label>Peso</label>
			  		<input type="text" class="form-control" value="xxKg" id="peso" disabled>
			  	</div>
			  	<div class="col">
			  		<label>Altura</label>
			  		<input type="text" class="form-control" value="xxCm" id="altura" disabled>
			  	</div>
			  	<div class="col">
			  		<label>IMC</label>
			  		<input type="text" class="form-control" value="saudável" readonly>
			  	</div>
			  </div>
			  <div class="row">
			  	<div class="col">
			  		<label>Anotações</label>
			  		<textarea class="form-control" id="anotações" rows="10" disabled=""></textarea>
			  	</div>
			  </div>
			

		</form>
	</div>
	<script>
	function habilitar() {
    document.getElementById("nome").disabled = false;
    document.getElementById("genero").disabled = false;
    document.getElementById("data").disabled = false;
    document.getElementById("rua").disabled = false;
    document.getElementById("email").disabled = false;
    document.getElementById("tel").disabled = false;
    document.getElementById("Objetivos").disabled = false;
    document.getElementById("Experiência").disabled = false;
    document.getElementById("peso").disabled = false;
    document.getElementById("altura").disabled = false;
   	document.getElementById("anotações").disabled = false;
	}
	function finalizar(){
		document.getElementById("nome").disabled = true;
	    document.getElementById("genero").disabled = true;
	    document.getElementById("data").disabled = true;
	    document.getElementById("rua").disabled = true;
	    document.getElementById("email").disabled = true;
	    document.getElementById("tel").disabled = true;
	    document.getElementById("Objetivos").disabled = true;
	    document.getElementById("Experiência").disabled = true;
	    document.getElementById("peso").disabled =	true;
	    document.getElementById("altura").disabled = true;
	   	document.getElementById("anotações").disabled = true;
	}
</script>
</body>
</html>