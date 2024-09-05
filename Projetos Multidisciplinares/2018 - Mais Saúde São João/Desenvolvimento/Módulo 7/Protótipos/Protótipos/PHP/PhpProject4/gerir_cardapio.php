
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" type="image/png" href="favicon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gerir de Cardápio</title>
        <link href="css/css_mod07.css" rel="stylesheet" type="text/css"/>
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
                <h1 style="color: darkblue; text-align: center;">Gerir Cardápio</h1>
            </div>		

            <form action="sla.php" method="post">
     <div name="busca_usuario" >
                <label style="padding:0.4%"> Informe o nome do paciente: </label> 
                <input  style=" width: 50%;" type="text" class="form-control" id="nome" placeholder=" Escreva o nome" required> <br/>
                <input  style="text-align: center;" type="submit" class="btn btn-primary" value="Buscar" name="Buscar"/>

            </div>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                

    </div>
            <br/> <br/>
    <br/> <br/>
    <br/> <br/>
    <br/> <br/>
    <br/> <br/>
      <br/> <br/>
    <br/> <br/>
    <br/> <br/>
    <br/> <br/>
    <br/> <br/>
    <br/> <br/>
 <br/> <br/>
    <br/> <br/>
     <div style="margin-left: 9%;" class="form-group col-md-6">
    <h1>Cardápio Fulano X</h1>
    <br/>
    
   
            </div>
            
            <table class="table" border="1" style=" margin-left: 5%; margin-right: 10%; text-align: center;" >
        <thead>
            <tr>
                <th style="background-color: darkblue; color: white; text-align: center;"><h3>Cardápio</h3></th>
                <th style="background-color: darkblue; color: white; text-align: center;"><h3>Data de Criação</h3></th>
                <th style="background-color: darkblue; color: white; text-align: center;"><h3>Período</h3></th>
                <th style="background-color: darkblue; color: white; text-align: center;"><h3>Visuaizar</h3></th>
                <th style="background-color: darkblue; color: white; text-align: center;"><h3>Excluir</h3></th>
                         
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Cardápio 1</td>
                <td>30/04/2018</td>
                <td>01/05/2018 - 30/05/2018</td>
                <td><img class="icon" src="images/mod07/icone visualizar.png" alt=""/></td>
                <td><img class="icon" src="images/mod07/icone de excluir.png" alt=""/></td>
            </tr>
            <tr>
                <td>Cardápio 1</td>
                <td>30/04/2018</td>
                <td>01/05/2018 - 30/05/2018</td>
                <td><img class="icon" src="images/mod07/icone visualizar.png" alt=""/></td>
                <td><img class="icon" src="images/mod07/icone de excluir.png" alt=""/>r</td>
            </tr>
            <tr>
                <td>Cardápio 1</td>
                <td>30/04/2018</td>
                <td>01/05/2018 - 30/05/2018</td>
                <td><img class="icon" src="images/mod07/icone visualizar.png" alt=""/></td>
                <td><img  class="icon" src="images/mod07/icone de excluir.png" alt=""/></td>
            </tr>
            <tr>
                <td>Cardápio 1</td>
                <td>30/04/2018</td>
                <td>01/05/2018 - 30/05/2018</td>
                <td><img class="icon" src="images/mod07/icone visualizar.png" alt=""/></td>
                <td><img class="icon" src="images/mod07/icone de excluir.png" alt=""/></td>
            </tr>
            <tr>
                <td>Cardápio 1</td>
                <td>30/04/2018</td>
                <td>01/05/2018 - 30/05/2018</td>
                <td><img class="icon" src="images/mod07/icone visualizar.png" alt=""/></td>
                <td><img class="icon"  src="images/mod07/icone de excluir.png" alt=""/></td>
            </tr>
           
        
        
            
        </tbody>
        </table>
    <div>
        <input  style="margin-left: 10%;" type="submit" class="btn btn-primary" name="inserir_cardapio" value="Inserir novo cardápio"/>
    </div>
     
        <br/> <br/>
    <br/> <br/>
    <br/> <br/>
    <br/> <br/>
    <br/> <br/>
 <br/> <br/>
    <br/> <br/>   <br/> <br/>
    <br/> <br/>
    <br/> <br/>
    <br/> <br/>
    <br/> <br/>
 <br/> <br/>
    <br/> <br/>
   
     
        </div>
    <br/> <br/>
    <br/> <br/>
    <br/> <br/>
    <br/> <br/>
    <br/> <br/>
    <br/> <br/>
    <br/> <br/>
    <br/> <br/>
        


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
