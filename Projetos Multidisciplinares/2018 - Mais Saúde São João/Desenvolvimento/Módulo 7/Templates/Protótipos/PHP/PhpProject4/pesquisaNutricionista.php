<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" type="image/png" href="favicon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Busca por nutricionista</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>




        <script type="text/javascript">
            function optionCheck() {
                var option = document.getElementById("options").value;
                if (option == '0') {
                    alert("Selecione uma opção!");
                    document.getElementById("hiddenDiv").style.visibility = "hidden";
                    document.getElementById("hiddenDiv2").style.visibility = "hidden";
                    document.getElementById("hiddenDiv3").style.visibility = "hidden";
                    document.getElementById("hiddenDiv").style.height = "100px";
                    document.getElementById("hiddenDiv2").style.height = "0px";
                    document.getElementById("hiddenDiv3").style.height = "0px";
                }
                if (option == '1') {
                    document.getElementById("hiddenDiv").style.visibility = "visible";
                    document.getElementById("hiddenDiv2").style.visibility = "hidden";
                    document.getElementById("hiddenDiv3").style.visibility = "hidden";
                    document.getElementById("hiddenDiv").style.visibility = "visible";
                    document.getElementById("hiddenDiv").style.height = "100px";
                    document.getElementById("hiddenDiv2").style.height = "0px";
                    document.getElementById("hiddenDiv3").style.height = "0px";
                }
                if (option == '2') {
                    document.getElementById("hiddenDiv").style.visibility = "visible";
                    document.getElementById("hiddenDiv2").style.visibility = "visible";
                    document.getElementById("hiddenDiv3").style.visibility = "hidden";
                    document.getElementById("hiddenDiv").style.height = "0px";
                    document.getElementById("hiddenDiv2").style.height = "100px";
                    document.getElementById("hiddenDiv3").style.height = "0px";
                }
                if (option == '3') {
                    document.getElementById("hiddenDiv").style.visibility = "visible";
                    document.getElementById("hiddenDiv2").style.visibility = "hidden";
                    document.getElementById("hiddenDiv3").style.visibility = "visible";
                    document.getElementById("hiddenDiv").style.height = "0px";
                    document.getElementById("hiddenDiv2").style.height = "0px";
                    document.getElementById("hiddenDiv3").style.height = "100px";
                }
            }
        </script>

        <div class="container theme-showcase" role="main">
            <div class="page-header">
                <h1 style="color: darkblue; text-align: center;">Vincular-se ao nutricionista</h1>
            </div>		
<!--
<form action="sla.php" method="post">
      <div name="busca_usuario" >
                    <label style="padding:0.4%"> Procure o nutricionista desejado: </label> 
                    <input  type="text" class="form-control" id="nome" placeholder=" Escreva o nome completo" required> <br/>
                     <div name="nome_usuario" >
            <label style="padding:0.4%"> Filtrar pesquisa: </label>
   
     <select class="form-control" id="options" onchange="optionCheck()">
                    <option value="0">Filtros</option>
                    <option value="1">Gênero</option>
                    <option value='2'>Faixa etária</option>
                    <option value='3'>Foco</option>
               
                </select>
      </div>
                     <br/> <br/>

                    <div style="text-align: center;">
                    <input type="submit"  class="btn btn-primary" value="Buscar" name="Buscar"/>
                    </div>
                </div>
     
    -->
    <div name="nome_usuario" >
        <label style="padding:0.4%"> Filtrar pesquisa: </label>
    <select class="form-control" id="options" onchange="optionCheck()">
                    <option value="0">Filtros</option>
                    <option value="1">Gênero</option>
                    <option value='2'>Faixa etária</option>
                    <option value='3'>Foco: emagrecimento</option>
                </select>
    <br/>
    <br/>
    <br/>
    <br/>
<table class="table" border="1" style=" margin-left: 0%; margin-right: 0%; text-align: center;" >
        <thead>
            <tr>
                <th style="background-color: darkblue; color: white; text-align: center;"><h3>Nome</h3></th>
                <th style="background-color: darkblue; color: white; text-align: center;"><h3>Foco</h3></th>
                <th style="background-color: darkblue; color: white; text-align: center;"><h3>Status</h3></th>
             
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Nutricionista A</td>
                <td>Emagrecimento e bem estar</td>
                <td style=" background-color: lightgreen;">Disponível</td>
            </tr>
            <tr>
                <td>Nutricionista B</td>
                <td>Emagrecimento e ganho de massa muscular</td>
                <td style=" background-color: lightcoral;">Indisponível</td>
            </tr>
            <tr>
                <td>Nutricionista C</td>
                <td>Emagrecimento</td>
                <td style=" background-color: lightgreen;">Disponível</td>
            </tr>
             
        </tbody>
        </table></div>
                
             <!--<div style="text-align: justify;" class="page-header">
             <h1 style="color: darkblue;">Nutricionista Y</h1>
             <img style="width: 30%;height: 10%;" src="images/nutri.png" alt=""/>
             <p>Idade: 23</p>
             <p>Gênero: feminino</p>
             <p>Formação acadêmica: link para a formação</p>
             <p>Descrição: blabla bla bla bla bla.</p>
             <p> Foco: emagrecimento.</p>
             <p> Status: disponível.</p>
                    <br/>
                      <button type="submit"  class="btn btn-primary">Solicitar</button>
                      <button type="submit"  class="btn btn-danger" data-toggle="modal" data-target="#myModal2">Dispensar Nutricionista</button>
                      
                </div>
                --><br/>
                <br/>
                  <br/> <br/>
    <br/> <br/>

  <br/> <br/>
    <br/> <br/>

  <br/> <br/>
    <br/> <br/>

  <br/> <br/>
    <br/> <br/>
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title" id="myModalLabel">Deseja desvincular-se desse nutricionista?</h4>
                    </div>
                    <div style="font-family: Verdana"class="modal-footer">
                        <a href="index.php"><button type="button" class="btn btn-danger">Sim</button>

                        </a> 
                        <button type="button" class="btn btn-success" data-dismiss="modal">Não</button>
                    </div>
                </div>
            </div>
        </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>