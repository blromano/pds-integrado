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
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js" integrity="sha384-u/bQvRA/1bobcXlcEYpsEdFVK/vJs3+T+nXLsBYJthmdBuavHvAW6UsmqO2Gd/F9" crossorigin="anonymous"></script>
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
               <style>
           body, 
.menu,
.sub-menu {
    padding: 0;

}
.clearfix:after{
    content: '.';
    display: block;
    clear: both;
    height: 0;
    line-height: 0;
    font-size: 0;
    visibility: hidden;
    overflow: hidden;
}
.menu,
.sub-menu {
    list-style: none;
    background: #000;
}
.sub-menu {
    background: #444;
}
.menu a {
    text-decoration: none;
    display: block;
    padding: 10px;
    color: #fff;
    font-family: sans-serif;
    font-size: 14px;
    text-transform: uppercase;
    font-weight: 700;
}
.menu li {
    position: block;
}
.menu > li {
    float: left;
}
.menu > li:hover {
    background: #444;
}
.menu li:hover > .sub-menu {
    display: block;
}
.sub-menu {
    display: none;
    position: absolute;
    min-width: 130px;
    max-width: 250px;
}
.sub-menu li:hover {
    background: #555;
}
.sub-menu .sub-menu {
    top: 0;
    left: 100%;
   .card a{
        text-decoration: none;
    }
} </style>

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

        <!--Dados do paciente ---> 
            <div class="container" role="main" style="height: 100%;width: 100%;  min-height: 100%" >
                        <br/>
                        <br/>
                <div class="tabcontent p-md-8">  <br>
                    <h3 style="text-align: center" >Informações sobre o usuário</h3> 
                    <form>
                        <div class="row">
                            <div class="col">
                                <h4>Nome</h4>
                                <input type="select" class="form-control" placeholder="Rogério" id="genero"  style="height: 10%; font-size: 15px;">
                            </div>
                        </div>
                        <div class="row">
                            <img src="https://thumbs.dreamstime.com/b/vector-user-icon-7337510.jpg" style="width:130px;height:130px; display: block;margin-left: 0;margin-right: 0">
                            <div class="col">
                              <label>Gênero</label>
                            <input type="text" class="form-control" value="Maculino" id="genero" disabled style="height: 27%; font-size: 15px;">
                            </div>
                            <div class="col">
                                <label>Data de Nascimento</label>
                                <input type="date" class="form-control" value="00/00/0000" id="data" disabled  style="font-size: 15px;height: 27%;">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                    <label>Endereço</label>
                                    <input type="text" class="form-control" value="Socorro av.2" id="rua" disabled style="height: 27%; font-size: 15px;">
                            </div>
                            <div class="col">
                                    <label>Email</label>
                                    <input type="Email" class="form-control" value="xxxxxx@xxxx.xxx" id="email" disabled style="height: 27%; font-size: 15px;">
                            </div>
                            <div class="col">
                                    <label>telefone</label>
                                    <input type="text" class="form-control" value="xxxx-xxxx" id="tel" disabled style="height: 27%; font-size: 15px;">
                            </div>
                        </div>
                        <!--Ficha de treinamento -->

                        <div class="container" style="border-top: 2px solid gray"><br>
                            <h3 style="text-align: center"> Ficha de treinamento </h3><br>
                            <div class="row">
                                <div class="col col-md-3">
                                    <label>Nome do treino:</label>
                                </div>
                                <div class="col">
                                    <input type="text" class=" col-md-2" style="height: 27%; font-size: 15px;">
                                </div>
                                <div class="col">
                                    <div class="container">
                                        <div class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-info btn-lg">
                                                <input type="checkbox" name="diasemana1" id="seg" value="segunda">Seg
                                            </label>
                                            <label class="btn btn-info btn-lg">
                                                <input type="checkbox" name="diasemana2" id="ter" value="terça">Ter
                                            </label>
                                            <label class="btn btn-info btn-lg">
                                                <input type="checkbox" name="diasemana3" id="qua" value="quarta">Qua
                                            </label>
                                            <label class="btn btn-info btn-lg">
                                                <input type="checkbox" name="diasemana4" id="qui" value="quinta">Qui
                                            </label>
                                            <label class="btn btn-info btn-lg">
                                                <input type="checkbox" name="diasemana5" id="sex" value="sexta">Sex
                                            </label>
                                            <label class="btn btn-info btn-lg">
                                                <input type="checkbox" name="diasemana6" id="sab" value="sabado">Sab
                                            </label>
                                            <label class="btn btn-info btn-lg">
                                                <input type="checkbox" name=diasemana7" id="dom" value="domingo">Dom
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- Grupo muscular-->
                        <div class="container " style="border-top: 2px solid gray"> <br>
                                <h3 style="text-align: center;">Exercício </h3>
                            </div>
                            <br> 
                            <div class="menu-container">
                                <ul class="menu clearfix">
                                    <li><a href="#">Aeróbico</a></li>
                                    <li><a href="#">Abdomen</a></li>                                               
                                    <li><a href="#">M. Inferiores</a></li>
                                    <li><a href="#">M. Superiores</a>
                                    <!-- Nível 1 -->
                                        <!-- submenu -->
                                        <ul class="sub-menu clearfix">
                                            <li><a href="#">Bíceps</a>
                                                <!-- Nível 2 -->
                                                <!-- submenu do submenu -->
                                                <ul class="sub-menu">
                                                    <li><a href="#">Branquial</a></li>
                                                    <li><a href="#">Branquial anterior</a></li>
                                                    <li><a href="#">Coracobraquial</a></li>
                                                </ul><!-- submenu do submenu -->
                                            </li>
                                            <li><a href="#">Tríceps</a></li>
                                        </ul><!-- submenu -->
                                    </li>
                                    <li><a href="#">Peitoral</a></li>
                                    <li><a href="#">Períneo</a></li>
                                    <li><a href="#">Pescoço</a></li>
                                    <li><a href="#">Posterior do Tronco</a></li>
                                    <li><a href="#">Tórax</a></li>
                                </ul>
                            </div><br><br>
                        <table>
                            <tr>
                                <td ><input type="checkbox"> Rosca concentrada com halteres</td>
                                <td ><input type="checkbox"> Rosca Scoot</td>
                                <td ><input type="checkbox"> Rosca direta na polia</td>
                            </tr>
                            <tr>
                                <td ><input type="checkbox"> Rosca direta com barra reta</td>
                                <td ><input type="checkbox"> Rosca Scoot com halter</td>
                            </tr>                           
                        </table>
                             <div id="accordion">
                                <div class="card col-md-5">
                                  <div class="card-header">
                                    <a class="card-link " data-toggle="collapse" href="#collapseOne">
                                      Rosca concentrada com halteres
                                    </a>
                                  </div>
                                  <div id="collapseOne" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <label>Séries: </label><input class="form-control-sm" type="text"><br>
                                        <label>Repetições: </label><input type="text">
                                    </div>
                                  </div>
                                </div>

                                <div class="card col-md-5">
                                  <div class="card-header">
                                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                                      Rosca Scoot
                                    </a>
                                  </div>
                                  <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                      Lorem ipsum..
                                    </div>
                                  </div>
                                </div>
                              </div> 
                            </div>
                            <br><br>
                            <br>
                            <br>
                            <br>
                    </div> 
                               
                            <div style="text-align: center;">
                                <button type="button" class="btn btn-primary" onclick="habilitar()">Editar dados</button>
                                <button type="button" class="btn btn-danger" onclick="finalizar()">Confirmar Dados</button>
                                <button type="button" class="btn btn-info">Enviar Ficha de Treinamento</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
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

