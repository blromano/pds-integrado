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
        <!--Dados do paciente --> 
            <div class="container" role="main" style="height: 100%;width: 100%;  min-height: 100%;">
                        <br/>
                        <br/>
                <div class="tabcontent p-md-8">  <br>
                    <h3 style="text-align: center" >Informações sobre o usuário</h3> 
                    <div class="row">
                        <div class="col">
                            <h4>Nome</h4>                            
                             <select disabled  class="custom-select col-md-4">
                                <option  >Selecione o nome</option>
                                <option selected>João</option>
                                <option>Marcelo</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <img src="https://thumbs.dreamstime.com/b/vector-user-icon-7337510.jpg" style="width:130px;height:130px; display: block;margin-left: 0;margin-right: 0">
                        <div class="col">
                          <label>Gênero</label>
                        <input type="text" class="form-control" value="Maculino" id="genero" readonly >
                        </div>
                        <div class="col">
                            <label>Data de Nascimento</label>
                            <input type="date" class="form-control" value="00/00/0000" id="data" readonly >
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                                <label>Endereço</label>
                                <input type="text" class="form-control" value="Socorro av.2" id="rua" readonly>
                        </div>
                        <div class="col">
                                <label>Email</label>
                                <input type="Email" class="form-control" value="xxxxxx@xxxx.xxx" id="email" readonly>
                        </div>
                        <div class="col">
                                <label>telefone</label>
                                <input type="text" class="form-control" value="xxxx-xxxx" id="tel" readonly>
                        </div>
                    </div>
                    <!--Ficha de treinamento -->
                    <h3 style="text-align: center; border-top: 2px solid gray;;"><br>Ficha de treinamento </h3>
                    <div class="offset-md-3  form-group row">
                        <div class="col-md-2 offset-md-4 col"><label>Inicio</label><input type="date" class="form-control " name="dataInicio" readonly "></div>
                        <div class="col-md-2  col"><label>Termino</label><input type="date" class="form-control " name="dataTermino" min="2018-06-19" readonly></div>
                    </div>
                    <br>
                    <div class="d-flex justify-content-center">
                    </div>
                    </div>
                    <br><br>
                    <div id="treino">
                        <div>
                            <div class="card-header">
                                <a class="card-link " data-toggle="collapse" href="#collapseOne1">
                                    Nome do treino
                                </a>
                                   
                            </div>
                            <div id="collapseOne1" class="collapse" data-parent="#treino">
                                <div class="card-body">
                                    <div class="container"><br><br>
                                        <div class="row">
                                            <div class="col ">
                                                
                                                <label>Nome do treino:</label>
                                            </div>
                                            <div class="col">
                                                <input type="text" placeholder="Rosca concentrada" readonly class="form-control" >
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
                                                
                                            </ul>
                                        </div><br><br>
                                      
                                        <div id="accordion">
                                           <div class="card col-md-5">
                                             <div class="card-header">
                                               <a class="card-link " data-toggle="collapse" href="#collapseOne">
                                                 Rosca concentrada com halteres

                                               </a>
                                             </div>
                                             <div id="collapseOne" class="collapse" data-parent="#accordion"><br>
                                              
                                               <div class="offset-md-1 card-body">
                                                    <div class="row form-group">
                                                        <div class=" col">
                                                            <label class="col-12" >Séries: </label>
                                                        </div>
                                                        <div class=" col">
                                                            <input type="number" min="0" max="10" class="col-10 form-control" readonly>
                                                        </div>
                                                        <div class="col">    
                                                            <label class="col-12">Repetições: </label>
                                                        </div> 
                                                        <div class="col">    
                                                            <input  min="0" type="number" class="col-10 form-control" readonly>
                                                        </div>                                                                      
                                                    </div>
                                                   <div class="row form-group"> 
                                                        <div class="col">    
                                                            <input  type="number" min="0.5" step="0.5" placeholder="peso" class="col-10 form-control" readonly>
                                                        </div>
                                                        <div class="col">    
                                                            <label >Kilogramas</label>
                                                        </div>                
                                                    </div>
                                                   <textarea rows="3" cols="35" placeholder="Observação" class="form-control" readonly></textarea>
                                                    
                                                </div>
                                             </div>
                                           </div>
                                       </div>
                                        <div class="offset-md-2 card col-md-5">
                                          <div class="card-header">
                                            <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                                              Caminhada
                                            </a>
                                          </div>
                                          <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                              <br>
                                            <div class="offset-md-1 card-body">
                                                   <div class="row form-group"> 
                                                        <div class="col">    
                                                            <input type="number" min="0.5" placeholder="peso" class="col-10">
                                                        </div>
                                                        <div class="col">    
                                                            <select>
                                                                <option>Km</option>
                                                                <option>Minutos</option>
                                                            </select>
                                                        </div>                
                                                    </div>
                                                   <textarea rows="3" cols="35" placeholder="Observação"></textarea>
                                              
                                            </div>
                                          </div>
                                        </div>
                                    </div> 
                                </div>
                                <br><br>
                                
                            </div>
                        </div>  
                        <br><br>
                        <div style="text-align: center;">
                          
                            <button type="button" class="btn btn-primary btn-lg" onclick="finalizar()">Editar Dados</button>
                            <button type="button" class="btn btn-danger btn-lg" >Excluir</button>
                           
                        </div>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>

