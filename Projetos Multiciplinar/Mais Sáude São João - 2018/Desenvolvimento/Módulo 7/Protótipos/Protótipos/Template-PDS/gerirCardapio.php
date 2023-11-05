
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" type="image/png" href="favicon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Edição de Cardápio</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body style="background-image: url('images/intro-bg.jpg');" >




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
                <h1 style="color: darkblue; text-align: center;">Editar cardápio</h1>
            </div>		

<form action="sla.php" method="post">
      <div name="nome_usuario" >
          <h1 style="text-align: center">Fulano X</h1>
                   <!-- <label style="padding:0.4%"> Fulano X </label> 
                    <input  type="text" class="form-control" id="nome" placeholder=" Escreva o nome completo" required> <br/>
                  -->
                 
                </div>
      <div name="nome_usuario" >
            <label style="padding:0.4%"> Período indicado: </label>
   
     <select class="form-control" id="options" onchange="optionCheck()">
                    <option value="0">Período</option>
                    <option value="1">Café da Manhã</option>
                    <option value='2'>Almoço</option>
                    <option value='3'>Lanche da Tarde</option>
                    <option value='3'>Café da Tarde</option>
                    <option value='3'>Janta</option>
                    <option value='3'>Lanche da Noite</option>
                </select>
      </div>
     
      <div name="alimentos" >
                    <label style="padding:0.4%"> Alimentos indicados: </label> 
                    <input  type="text" class="form-control" id="alimentos" placeholder="Ex: Banana, uva..." required> <br/>
  
                </div>
     
      <div name="porção" >
                    <label style="padding:0.4%"> Porções ideais: </label> 
                    <input  type="text" class="form-control" id="qtd" placeholder="1 Banana..." required> <br/>
                  
                 
                </div>
      <div name="horarios" >
                    <label style="padding:0.4%"> Horário ideal: </label> 
                    <input  type="time" class="form-control" id="hora" placeholder="" required> <br/>
                  
                 
                </div>
      <div name="variação" >
                    <label style="padding:0.4%">Variações do alimento: </label> 
                    <input  type="text" class="form-control" id="variacao" placeholder=" Variação do alimento" required> <br/>
                  
                 
                </div>
      <div style="width: 100%;height: 70%;text-align:center;clear:both">
                    <button type="submit"  class="btn btn-primary">Salvar Alterações</button>
                </div>
     
   
       
        <br/>
       
        <br/>
       
        <br/>
       
        <br/>
       

        </form>
            

    </div>
     <div style="margin-left: 9%;" class="form-group col-md-6">
    <h1>Cardápio Fulano X</h1><br/>
   
            </div>
            
            <table class="table" border="1" style=" margin-left: 5%; margin-right: 10%; text-align: center;" >
        <thead>
            <tr>
                <th style="background-color: darkblue; color: white; text-align: center;"><h3>Período</h3></th>
                <th style="background-color: darkblue; color: white; text-align: center;"><h3>Horário</h3></th>
                <th style="background-color: darkblue; color: white; text-align: center;"><h3>Alimento</h3></th>
                <th style="background-color: darkblue; color: white; text-align: center;"><h3>Porção</h3></th>
                <th style="background-color: darkblue; color: white; text-align: center;"><h3>Variação</h3></th>
                         
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Café da Manhã</td>
                <td>07:30</td>
                <td>Vitamina de morango</td>
                <td>250ml</td>
                <td>adicional de banana</td>
            </tr>
            <tr>
                <td>Almoço</td>
                 <td>12:00</td>
                <td>Carne branca, arroz, feijão, salada</td>
                <td>100g de carne, 3colheres(sopa) de arroz e feijão, salada a vontade</td>
                <td>trocar feijão por lentilha</td>
            </tr>
            
        </tbody>
        </table>
   
   
     <div style="width: 100%;height: 70%;text-align:center;clear:both">
                    <button type="submit"  class="btn btn-primary">Editar</button>
                    <button type="submit"  class="btn btn-danger" data-toggle="modal" data-target="#myModal2">Excluir</button>
                </div>
         <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title" id="myModalLabel">Tem certeza que deseja que deseja o cardápio?</h4>
                    </div>
                    <div style="font-family: Verdana"class="modal-footer">
                        <a href="index.php"><button type="button" class="btn btn-danger">Confirmar</button>

                        </a> 
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
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