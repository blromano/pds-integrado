<!DOCTYPE html>
<html>

<head>
    <title>Editar</title>
    <link href="modais.css" rel="stylesheet" type="text/css"/>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="<?=JQUERY_PATH?>" charset="utf-8"></script>
        <script src="<?=POPPER_PATH?>" charset="utf-8"></script>
        <script src="<?=THEME_JS_PATH?>" charset="utf-8"></script>
        <script src="<?=ANIMATIONS_PATH?>" charset="utf-8"></script>
        <link rel="stylesheet" href="<?=THEME_CSS_PATH?>">
	<link rel="stylesheet" href="custom-css/build/mssj-style.css">    
    <link rel="stylesheet" type="text/css" href="views/modules/Treinos/mod04.css">  
    </head>
    <body>
        
        <section onclick="closeNav()">
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
                    <h5 class="nomesuplemento">Medidas:</h5><br><h7 class="nomesuplemento" >Usuário:</h7><br><img class="alinhamentoimgsuplemento" src="https://thumbs.dreamstime.com/b/vector-user-icon-7337510.jpg"><br><br><h7>Nome: Nome completo</h7><br><h7>Idade: 30</h7><br><h7>Genero: Masculino</h7><br><h7>Email: xxxx@xxxx.xxx</h7><br><h7>Telefone:xxxx-xxxx</h7><br><br>
                    <div class="form-group">
                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editar_medidas" data-dismiss="modal">Atualizar Medidas Corporais</button><br><br>
                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editar_dobras" data-dismiss="modal">Atualizar Dobras Cutâneas</button>
                        
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
                    <!-- TABELA--> 
                     <div class="container">
            <h2>Lista de Medidas</h2>  
            <button type="button" class="btn btn-primary">Visualizar Medidas</button>
            <button type="button" class="btn btn-primary" onclick="ConfirmarDados()">Adicionar Medidas</button>
			<br>
			<br>
			<div class="table-responsive">
			
                <table class="table table-condensed  table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Medida</th>
                            <th scope="col">Peso(KG)</th>
                            <th scope="col">Altura(CM)</th>
                            <th scope="col">Pescoço</th>
                            <th scope="col">Biceps esquerdo e direito</th>
                            <th scope="col">Antebraços esquerdo e direito</th>
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
                    <td><input type="text" value="xxCm"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxCm"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxCm"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="Saudável" disabled><td>
                    <td><button type="button" class="btn btn-primary btn-sm">Enviar por email</button></td>
                    <tr>
                        <th scope="row">2</th>
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
                    <td><input type="text" value="Saudável" disabled><td>
                    <td><button type="button" class="btn btn-primary btn-sm">Enviar por email</button></td>
    
                    <tr>
                        <th scope="row">3</th>
                    <td><input type="text" value="xxCm"></td>
                    <td><input type="text" value="xxCm"></td>
                    <td><input type="text" value="xxCm"></td>
                    <td><input type="text" value="xxCm"></td>
                    <td><input type="text" value="xxCm"></td>
                    <td><input type="text" value="xxCm"></td>
                    <td><input type="text" value="xxCm"></td>
                     <td><input type="text" value="xxCm"></td>
                    <td><input type="text" value="xxCm"></td>
                    <td><input type="text" value="xxCm"></td>
                    <td><input type="text" value="Saudável" disabled><td>
                    <td><button type="button" class="btn btn-primary btn-sm">Enviar por email</button></td>	    
		
                    </tbody>
                </table>
            </div>            
        </div>
                  </div>
                  <div class="modal-footer">
                  	<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#mostrar_dados_usuario" data-dismiss="modal">Voltar</button>
                        <button type="button" class="btn btn-succes" data-toggle="modal" data-target="#mostrar_dados_usuario" data-dismiss="modal" name="Confirmar" disabled>Confirmar Dados</button>		
                    
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
                   <div class="container">
            <h2>Lista de Dobras Cutâneas</h2>
			<button type="button" class="btn btn-primary">Visualizar Dobras Cutâneas</button>
                        <button type="button" class="btn btn-primary" onclick="ConfirmarDados()">Adicionar Medidas</button>
			<br>
			<br>
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
                  	 <td><input type="text" value="xxCm"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxCm"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxCm"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxCm"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td> <input type="text" value="Saudável" disabled></td>
                    <td><button type="button" class="btn btn-primary btn-sm">Enviar por email</button></td>
                    
    
                    <tr>
                        <th scope="row">2</th>
              	   	 <td><input type="text" value="xxCm"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxCm"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxCm"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxCm"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td> <input type="text" value="Saudável" disabled></td>
                    <td><button type="button" class="btn btn-primary btn-sm">Enviar por email</button></td>
                    <tr>
                        <th scope="row">3</th>
   	 <td><input type="text" value="xxCm"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxCm"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxCm"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxCm"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td><input type="text" value="xxcM"></td>
                    <td> <input type="text" value="Saudável" disabled></td>
                    <td><button type="button" class="btn btn-primary btn-sm">Enviar por email</button></td>
                    </tr>
                    </tbody>
                </table>
            </div>            
        </div>
                  </div>
                  <div class="modal-footer">
                  	<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#mostrar_dados_usuario" data-dismiss="modal">Voltar</button>
                        <button type="button" class="btn btn-succes" data-toggle="modal" data-target="#mostrar_dados_usuario" data-dismiss="modal" name="Confirmar">Confirmar Dados</button>
                  </div>
                </div>
              </div>
          </div>
</section>
</body>

</html>