
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" type="image/png" href="favicon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gerir de Cardápio</title>
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
                
                <!--Leva para outra pagian ou fica nessa mesmo-->
      <div name="nome_usuario" >
          <h2>Fulano x</h2>
          <br/>
          <br/>
           <div name="inicioEfim" style=" width: 30%;" >
               <label style="padding:0.4%"> Data de inicio:</label><input  type="date" class="form-control" id="variacao" placeholder="" required> <br/>
               <label style="padding:0.4%">Data de termino:</label><input  type="date" class="form-control" id="termino" placeholder="" required="Campo preenchido incorretamente!"> <br/>
                  
                 
                </div>
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

                 <div name="horarios" >
                    <label style="padding:0.4%"> Horário ideal: </label> 
                    <input  type="time" class="form-control" id="hora" placeholder="" required> <br/>
                  
                 
                </div>
     
      <div name="alimentos" >
                    <label style="padding:0.4%"> Alimento indicado: </label> 
                    <input  type="text" class="form-control" id="alimentos" placeholder="Ex: Banana, uva..." required> <br/>
  
                </div>
     
      <div name="porção" >
                    <label style="padding:0.4%"> Porção ideal: </label> 
                    <input  type="number" class="form-control" id="qtd" placeholder="" required> <br/>
                  
                 
                </div>
     
      <div name="variação" >
                    <label style="padding:0.4%">Variações do alimento: </label> 
                    <input  type="text" class="form-control" id="variacao" placeholder="" required> <br/>
                  
                 
                </div>
      
    <div style="width: 100%;height: 70%;text-align:center;clear:both">
                    <button type="submit"  class="btn btn-primary">+ Alimentos</button>
                     <button type="submit"  class="btn btn-primary">+ Períodos</button>
                </div>
      <br/>
      <br/>
     
      <div style="width: 100%;height: 70%;text-align:center;clear:both">
                    <button type="submit"  class="btn btn-primary">Salvar</button>
                </div>
     
    </div>
       
        <br/>
       
        <br/>
       
        <br/>
       
        <br/>
       

         </form>
            

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
    <h3>Validade: dd/mm/aaaa a dd/mm/aaaa</h3>
    <br/>
    
   
            </div>
            
            <table class="table" border="1" style=" margin-left: 5%; margin-right: 10%; text-align: center;" >
        <thead>
            <tr>
                <th style="background-color: darkblue; color: white; text-align: center;"><h3>Período</h3></th>
                <th style="background-color: darkblue; color: white; text-align: center;"><h3>Horário</h3></th>
                <th style="background-color: darkblue; color: white; text-align: center;"><h3>Alimento</h3></th>
                <th style="background-color: darkblue; color: white; text-align: center;"><h3>Porção</h3></th>
                <th style="background-color: darkblue; color: white; text-align: center;"><h3>Variação</h3></th>
				 <th style="background-color: darkblue; color: white; text-align: center;"><h3></h3></th>
				
                         
            </tr>
        </thead>
        <tbody>
            <tr>
                <td rowspan="3">Café da Manhã</td>
                <td rowspan="3">07:30</td>
                <td>Iorgute</td>
                <td>250ml</td>
                <td>adicional de banana</td>
				   <td rowspan="3"> <button type="submit"  class="btn btn-success">Editar</button> 
                    </tr>
             <tr>
              
                 <td>Fruta</td>
                <td>100g</td>
                <td>----</td>
             </tr>
				   
            <tr>
               
                <td>Pão Integral</td>
                <td>2 fatias</td>
                <td> ----- </td>
				 </tr>
            <tr>
                <td rowspan="3">Almoço</td>
                <td rowspan="3">12:00</td>
                <td>Salada</td>
                <td>250g</td>
                <td>-----</td>
				   <td rowspan="3"> <button type="submit"  class="btn btn-success">Editar</button> 
                        </tr>
             <tr>
              
                 <td>Carne Vermelha</td>
                <td>150g</td>
                <td>----</td>
             </tr>
				   
            <tr>
               
                <td>Arroz</td>
                <td>100g</td>
                <td> Integral ou Branco </td>
				 </tr>
           
            
        </tbody>
        </table>
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

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>