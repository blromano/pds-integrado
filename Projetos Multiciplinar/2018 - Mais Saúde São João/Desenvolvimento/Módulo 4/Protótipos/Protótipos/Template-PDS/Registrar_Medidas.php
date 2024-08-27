<!DOCTYPE html>
<html>

<head>
    <title>Editar</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <style type="text/css">
         @media (min-width: 768px) {
            .modal-xl {
              width: 90%;
             max-width:1200px;
            }
          }
          .modal-body{
          max-height: calc(100vh - 200px);
          overflow-y: auto;
          }

    </style>

</head>
<body>
        <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mostrar_dados_usuario">
                Editar
            </button>
        
      <!-- Visualizar dados do usuario -->

            <div class="modal fade" id="mostrar_dados_usuario" tabindex="-1" role="dialog" aria-labelledby="mostrardadosusuario" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <h5 style="text-align: center;">Medidas:</h5><br><h7 style="text-align: center;">Usuário:</h7><br><img src="https://thumbs.dreamstime.com/b/vector-user-icon-7337510.jpg" style="width:130px;height:130px;""><br><br><h7>Nome: Nome completo</h7><br><h7>Idade: 30</h7><br><h7>Genero: Masculino</h7><br><h7>Email: xxxx@xxxx.xxx</h7><br><h7>Telefone:xxxx-xxxx</h7><br><br>
                    <div class="form-group">
                          <h7>Medidas:</h7><br>
                          <h7>Medida1:  <h8>xx/xx/xxxx</h8></h7> <br> 
                          <h7>Medida2:  <h8>xx/xx/xxxx</h8></h7><br>
                          <h7>Medida3:  <h8>xx/xx/xxxx</h8></h7><br>
                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editar_medidas" data-dismiss="modal">Registrar Medidas Corporais</button><br><br><br>
                          <h7>Registro de Dobras: </h7><br>
                          <h7>Medida1:  <h8>xx/xx/xxxx</h8></h7> <br> 
                          <h7>Medida2:  <h8>xx/xx/xxxx</h8></h7><br>
                          <h7>Medida3:  <h8>xx/xx/xxxx</h8></h7><br>
                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editar_dobras" data-dismiss="modal">Registrar Dobras Cutâneas</button>
                        
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
                  </div>
                </div>
              </div>
            </div>
            
      <!-- Editar Medidas Corporais-->
          <div class="modal fade" id="editar_medidas" tabindex="-1" >
            <div class="modal-dialog modal-xl " role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <h5 style="text-align: center;">Editar Medidas Corporais</h5><br>
                    <!-- TABELA--> 
                     <div class="container">
            <h2>Lista de Medidas</h2>
            <div class="table-responsive">
                <table class="table table-condensed  table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Medida</th>
                            <th scope="col">Peso(KG)</th>
                            <th scope="col">Altura(CM)</th>
                            <th scope="col">Pescoco</th>
                            <th scope="col">Biceps esquerdo e direito</th>
                            <th scope="col">Antebracos esquerdo e direito</th>
                            <th scope="col">Peito</th>
                            <th scope="col">Cintura</th>
                            <th scope="col">Quadris</th>
                            <th scope="col">Coxas esquerda e direita</th>
                            <th scope="col">Panturrilha esquerda e direita</th>
                            <th scope="col">IMC</th>
                        </tr>
                    </thead>
                    <tbody>
                    <th scope="row">1</th>
                    <td><input type="text" value="xxCm" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td>  
						    <select class="custom-select" style="width: 300px" id="IMC">
						 	<option value="magreza grave">magreza grave</option>
						    <option value="magreza moderada">magreza moderada</option>
						    <option value="magreza leve">magreza leve</option>
						    <option value="saudável" selected>saudável</option>
						    <option value="sopreso">sopreso</option>
						    <option value="obesidade I">obesidade I</option>
						    <option value="obesidade II">obesidade II</option>
						    <option value="obesidade III">obesidade III</option>
						    </select>
					<td>
						  <button type="button" class="btn btn-primary btn-sm">Enviar por email</button>
					</td>
    
                    <tr>
                        <th scope="row">2</th>
                    <td><input type="text" value="xxCm" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td>  
                    	    <select class="custom-select" style="width: 300px" id="IMC">
						 	<option value="magreza grave">magreza grave</option>
						    <option value="magreza moderada">magreza moderada</option>
						    <option value="magreza leve">magreza leve</option>
						    <option value="saudável" selected>saudável</option>
						    <option value="sopreso">sopreso</option>
						    <option value="obesidade I">obesidade I</option>
						    <option value="obesidade II">obesidade II</option>
						    <option value="obesidade III">obesidade III</option>
						    </select>
					<td>
						  <button type="button" class="btn btn-primary btn-sm">Enviar por email</button>
					</td>
    
                    <tr>
                        <th scope="row">3</th>
                    <td><input type="text" value="xxCm"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td>  
                    	    <select class="custom-select" style="width: 300px" id="IMC">
						 	<option value="magreza grave">magreza grave</option>
						    <option value="magreza moderada">magreza moderada</option>
						    <option value="magreza leve">magreza leve</option>
						    <option value="saudável" selected>saudável</option>
						    <option value="sopreso">sopreso</option>
						    <option value="obesidade I">obesidade I</option>
						    <option value="obesidade II">obesidade II</option>
						    <option value="obesidade III">obesidade III</option>
						    </select></td>
					<td>
						  <button type="button" class="btn btn-primary btn-sm">Enviar por email</button>
					</td>	    
					<tr>
                    </tbody>
                </table>
            </div>            
        </div>
                  </div>
                  <div class="modal-footer">
                  	<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#mostrar_dados_usuario" data-dismiss="modal">Voltar</button>
                    <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#mostrar_dados_usuario" data-dismiss="modal" >Confirmar Medidas</button>
                  </div>
                </div>
              </div>
          </div>
            <!-- EDITAR DOBRAS -->
             <div class="modal fade" id="editar_dobras" tabindex="-1" >
            <div class="modal-dialog modal-xl " role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <h5 style="text-align: center;">Editar Dobras cutâneas</h5><br>
                   <div class="container">
            <h2>Lista de Dobras Cutâneas</h2>
            <div class="table-responsive">
                <table class="table table-condensed  table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Medida</th>
                            <th scope="col">dobra cutânea triciptal</th>
                            <th scope="col">dobra cutânea subescapular</th>
                            <th scope="col">dobra cutânea biciptal</th>
                            <th scope="col">dobra cutânea axilar média</th>
                            <th scope="col">dobra cutânea supra-ilíaca</th>
                            <th scope="col">dobra cutânea torácica</th>
                            <th scope="col">dobra cutânea da coxa</th>
                            <th scope="col">dobra cutânea abdominal</th>
                            <th scope="col">dobra cutânea panturrilha medial</th>
                            <th scope="col">percentual de gordura corporal </th>
                            <th scope="col">classificação do percentual de gordura corporal</th>
                        </tr>
                    </thead>
                    <tbody>
                    <th scope="row">1</th>
                  	 <td><input type="text" value="xxCm" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td>  
                <select class="custom-select" style="width: 300px" id="IMC">
              <option value="magreza grave">excelente</option>
                <option value="magreza moderada">bom</option>
                <option value="magreza leve">acima da média</option>
                <option value="saudável" selected>média</option>
                <option value="sopreso">abaixo da média</option>
                <option value="obesidade I">ruim</option>
                <option value="obesidade II">muito ruim</option>
                </select>
                	<td>
						  <button type="button" class="btn btn-primary btn-sm">Enviar por email</button>
					</td>
                    
    
                    <tr>
                        <th scope="row">2</th>
              	 <td><input type="text" value="xxCm" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td><input type="text" value="xxcM" class="form-control"></td>
                    <td>  
                <select class="custom-select" style="width: 300px" id="IMC">
              <option value="magreza grave">excelente</option>
                <option value="magreza moderada">bom</option>
                <option value="magreza leve">acima da média</option>
                <option value="saudável" selected>média</option>
                <option value="sopreso">abaixo da média</option>
                <option value="obesidade I">ruim</option>
                <option value="obesidade II">muito ruim</option>
                </select>
                	<td>
						  <button type="button" class="btn btn-primary btn-sm">Enviar por email</button>
					</td>
    
                    <tr>
                        <th scope="row">3</th>
              		 <td><input type="text" value="xxCm" ></td>
                    <td><input type="text" value="xxcM" ></td>
                    <td><input type="text" value="xxcM" ></td>
                    <td><input type="text" value="xxcM" ></td>
                    <td><input type="text" value="xxcM" ></td>
                    <td><input type="text" value="xxcM" ></td>
                    <td><input type="text" value="xxcM" ></td>
                    <td><input type="text" value="xxcM" ></td>
                    <td><input type="text" value="xxcM" ></td>
                    <td><input type="text" value="xxcM" ></td>
                    <td>  
                <select class="custom-select" style="width: 300px" id="IMC">
              <option value="magreza grave">excelente</option>
                <option value="magreza moderada">bom</option>
                <option value="magreza leve">acima da média</option>
                <option value="saudável" selected>média</option>
                <option value="sopreso">abaixo da média</option>
                <option value="obesidade I">ruim</option>
                <option value="obesidade II">muito ruim</option>
                </select>
                	<td>
						  <button type="button" class="btn btn-primary btn-sm">Enviar por email</button>
					</td>
                    </tr>
                    </tbody>
                </table>
            </div>            
        </div>
                  </div>
                  <div class="modal-footer">
                  	<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#mostrar_dados_usuario" data-dismiss="modal">Voltar</button>
                    <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#mostrar_dados_usuario" data-dismiss="modal" >Confirmar Dobras</button>
                  </div>
                </div>
              </div>
          </div>

</body>
</html>