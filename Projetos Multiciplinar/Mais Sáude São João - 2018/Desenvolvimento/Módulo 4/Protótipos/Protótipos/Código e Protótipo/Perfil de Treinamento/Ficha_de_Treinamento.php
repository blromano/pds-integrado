<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pesquisar Educador Físico</title>
        <link rel="icon" type="image/png" href="favicon.png">
        <link href="css/bootstrap/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
        <!--- basic page needs
  ================================================== -->
        <meta charset="utf-8">
        <title>Mais Saúde São João</title>

        <!-- mobile specific metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- CSS
   ================================================== -->
        <link rel="stylesheet" href="css/base.css">  
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/vendor.css">     

        <!-- script
        ================================================== -->
        <script src="js/modernizr.js"></script>

        <!-- favicons
             ================================================== -->
        <link rel="icon" type="image.png" href="favicon.png">

    </head>
    <body style="background-color:white">
        <header class="sticky">

            <div class="row">


                <nav id="main-nav-wrap">
                    <ul class="main-navigation">
                        <li><a class="smoothscroll"  href="#intro" title="">Início</a></li>
                        <li><a class="smoothscroll"  href="att.php" title="">Atualizar</a></li>
                        <li><a class="smoothscroll"  href="#" data-toggle="modal" data-target="#myModal2">Excluir </a></li>
                        <li><a class="smoothscroll"  href="lista.php" title="">Lista de Usuários</a></li> 
                        <li class="current"><a class="smoothscroll"  href="PesquisarEducador.php" title="">Pesquisar Educador</a></li>
                        <li><a  href="#" title="">Rede Social</a></li> 
                        <li class="highlight with-sep"><a href="index.php" title="">Inicio</a></li>
                        <li class="highlight "><a href="index.php" title="">Sair</a></li>
                    </ul>
                </nav>
            </div>   	

        </header>
        <div class="container-fluid">

        <!--Corpo do texto ---> 
<div class="container" role="main" style="height: 100%;width: 100%; padding:5%; float:left; min-height: 100%" >
            <br/>
            <br/>
<div class="tabcontent p-md-4">
    
    <h3>Ficha de Treinamento</h3> 
		<form>
			  <div class="row">
			    <div class="col">
			    	<h4>Nome</h4>
			      <select class="form-control" value="Nome completo" id="nome" enable style="height: 10%; font-size: 15px;">
                                  <option value="Nome1">Cristian</option>
                                  <option value="Nome2">Paula</option>
                                  <option value="Nome3">Cleusa</option>
                              </select>
			    </div>
			  </div>
			  <div class="row">
                              <img src="https://thumbs.dreamstime.com/b/vector-user-icon-7337510.jpg" style="width:130px;height:130px; display: block;margin-left: 0;margin-right: 0">
                              <div class="col">
			    	<label>Gênero</label>
			      <input type="text" class="form-control" value="Maculino" id="genero" disabled style="height: 10%; font-size: 15px;">
			    </div>
			    <div class="col">
			    	<label>Data de Nascimento</label>
			    	<input type="date" class="form-control" value="00/00/0000" id="data" disabled  style="height: 10%; font-size: 15px;">
			    </div>
                          </div>
                    <br>
                    <div class="row">
			  	<div class="col">
			  		<label>Endereço</label>
			  		<input type="text" class="form-control" value="Socorro av.2" id="rua" disabled style="height: 10%; font-size: 15px;">
			  	</div>
			  	<div class="col">
			  		<label>Email</label>
			  		<input type="Email" class="form-control" value="xxxxxx@xxxx.xxx" id="email" disabled style="height: 10%; font-size: 15px;">
			  	</div>
			  	<div class="col">
			  		<label>telefone</label>
			  		<input type="text" class="form-control" value="xxxx-xxxx" id="tel" disabled style="height: 10%; font-size: 15px;">
			  	</div>
                          </div>
                    <br>
                    <br>
                    <h3> Atualização da Ficha </h3>
               
			  <div class="row">
			  	<div class="col">
			  		<label>Nome da Atividade Física</label>
			    	<input type="text" class="form-control" value="Levantamento de Perna" id="atividade" disabled  style="height: 10%; font-size: 15px;">
        
			  	</div>
                              
                              <div class="col">
			  		<label>Data de Início</label>
			    	<input type="date" class="form-control" value="00/00/0000" id="datainicio" disabled  style="height: 10%; font-size: 15px;">
        
			  	</div>
			  	<div class="col">
			  		<label>Data de Término</label>
			    	<input type="date" class="form-control" value="00/00/0000" id="datafinal" disabled  style="height: 10%; font-size: 15px;">
			  	</div>
			  </div>
                    <h3> Especificações do Exercício </h3>
			  <div class="row">
			  	<div class="col">
			  		<label>Tempo</label>
			  		<input type="text" class="form-control" value="00:30" id="tempo" disabled>
			  	</div>
			  	<div class="col">
			  		<label>Repetição</label>
			  		<input type="text" class="form-control" value="X" id="repeticao" disabled>
			  	</div>
			  	<div class="col">
			  		<label>Peso(kg)</label>
			  		<input type="text" class="form-control" value="X" id="peso" disabled>
			  	</div>
                              <div class="col">
			  		<label>Séries</label>
			  		<input type="text" class="form-control" value="X" id="serie" disabled>
			  	</div>
			  </div>
			  <div class="row">
			  	<div class="col">
			  		<label>Descrição da Atividade</label>
			  		<textarea class="form-control" id="anotacao" rows="10" disabled style="font-size: 15px;"> Descrição da atividade física, músculo ou grupo muscular a ser trabalhado durante a atividade, objetivo da atividade física e a meta com esta atividade</textarea>
			  	</div>
			  </div>
			  <div style="text-align: center;">
			  <button type="button" class="btn btn-primary" onclick="habilitar()">Editar dados</button>
			  <button type="button" class="btn btn-danger" onclick="finalizar()">Confirmar Dados</button>
			  <button type="button" class="btn btn-info">Enviar Ficha de Treinamento</button>
			  </div>

		</form>
	</div>
	<script>
	function habilitar() {
    document.getElementById("genero").disabled = false;
    document.getElementById("data").disabled = false;
    document.getElementById("rua").disabled = false;
    document.getElementById("email").disabled = false;
    document.getElementById("tel").disabled = false;
    document.getElementById("atividade").disabled = false;
    document.getElementById("datainicio").disabled = false;
    document.getElementById("datafinal").disabled = false;
    document.getElementById("tempo").disabled = false;
    document.getElementById("repeticao").disabled = false;
    document.getElementById("peso").disabled = false;
    document.getElementById("serie").disabled = false;
    document.getElementById("anotacao").disabled = false;
        
	}
	function finalizar(){

    document.getElementById("genero").disabled = true;
    document.getElementById("data").disabled = true;
    document.getElementById("rua").disabled = true;
    document.getElementById("email").disabled = true;
    document.getElementById("tel").disabled = true;
    document.getElementById("atividade").disabled = true;
    document.getElementById("datainicio").disabled = true;
    document.getElementById("datafinal").disabled = true;
    document.getElementById("tempo").disabled = true;
    document.getElementById("repeticao").disabled = true;
    document.getElementById("peso").disabled = true;
    document.getElementById("serie").disabled = true;
    document.getElementById("anotacao").disabled = true;
	}
</script>
</body>
</html>