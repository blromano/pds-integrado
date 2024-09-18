
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" type="image/png" href="favicon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Vida Alimentar</title>
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
                <h1 style="color: darkblue; text-align: center;">Vida alimentar e metas </h1>
            </div>		

<form action="sla.php" method="post">
      <div name="busca_usuario" >
                    <label style="padding:0.4%"> Informe o nome completo do paciente: </label> 
                    <input  type="text" class="form-control" id="nome" placeholder=" Escreva o nome completo" required> <br/>
                    <input type="submit" class="btn btn-primary" value="Buscar" name="Buscar"/>
                 
                </div>
            
                
                <div class="page-header">
                    <h1>Fulano X</h1>
                </div>
                <br/>
                <br/>
                <div class="form-group col-md-6">

                    <label style="padding:0.5%">Ingestão de calorias:</label>
                    <input  type="number"  min="1" class="form-control" id="caloria" placeholder="" name="caloria"/>
                </div>
                <div class="form-group col-md-6">

                    <label style="padding:0.5%">Índice de gorduras:</label>
                    <input  type="number"  min="1" class="form-control" id="gordura" placeholder="" name="gordura"/>
                </div>
                
                <div class="form-group col-md-6">

                    <label style="padding:0.5%">Índice de proteínas:</label>
                    <input  type="number"  min="1" class="form-control" id="proteina" placeholder="" name="proteina"/>
                </div>
                
                <div class="form-group col-md-6">

                    <label style="padding:0.5%">Índice de carboidratos:</label>
                    <input  type="number"  min="1" class="form-control" id="carboidrato" placeholder="" name="carboidrato"/>
                </div>
                
                <div class="form-group col-md-6">

                    <label style="padding:0.5%">Índice de nutrientes:</label>
                    <input  type="number" min="1" class="form-control" id="nutriente" placeholder="" name="nutriente" required="" />
                </div>
                
                <div class="form-group col-md-6">

                    <label style="padding:0.5%">Índice de vitaminas:</label>
                    <input  type="number" min="1" class="form-control" id="vitamina" placeholder="" name="vitamina" required=""/>
                </div> 
                
              
                    <h3>Metas</h3>
  
                    <div class="form-group col-md-6">
                        <label style="padding:0.5%"> Metas a serem alcançadas: </label> 
                        <input  type="text" class="form-control" id="nome" placeholder="Calorias: 1200Kcal..." required> 
                    </div>
                
                <div style="width: 100%;height: 70%;text-align:center;clear:both">
                    <button type="submit"  class="btn btn-primary">Salvar</button>
                </div>
            </div>
        <br/>
       

        </form>
            <div style="text-align: center;" class="form-group col-md-6">
    <h1>Nome: Fulano X</h1><br/>
            </div>
            
            <table class="table" border="1" style=" margin-left: 5%; margin-right: 10%; text-align: center;" >
        <thead>
            <tr>
                <th style="background-color: darkblue; color: white; text-align: center;"><h3>Tipo</h3></th>
                <th style="background-color: darkblue; color: white; text-align: center;"><h3>Índice</h3></th>
             
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Calorias</td>
                <td>1280 kcal</td>
            </tr>
            <tr>
                <td>Gordura</td>
                <td>35%</td>
            </tr>
            <tr>
                <td>Proteinas</td>
                <td>20%</td>
            </tr>
             <tr>
                <td>Carboidratos</td>
                <td>53%</td>
            </tr>
             <tr>
                <td>Nutrientes</td>
                <td>15%</td>
            </tr>
             <tr>
                <td>Vitaminas</td>
                <td>5%</td>
            </tr>
        </tbody>
        </table>
    </div>   
    
     <div style="width: 100%;height: 70%;text-align:center;clear:both">
                    <button type="submit"  class="btn btn-primary">Editar</button>
                    <button type="submit"  style="background-color: red;"class="btn btn-primary">Excluir</button>
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
        


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>