<!DOCTYPE html> 
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> +Saúde São João </title>
    <script src="<?=JQUERY_PATH?>" charset="utf-8"></script>
    <script src="<?=POPPER_PATH?>" charset="utf-8"></script>
    <script src="<?=THEME_JS_PATH?>" charset="utf-8"></script>
    <script src="<?=ANIMATIONS_PATH?>" charset="utf-8"></script>
    <link rel="stylesheet" href="<?=THEME_CSS_PATH?>">

          <script> 
          $(document).ready(function () {
                $("#flip").click(function () {
                    $("#panel").slideToggle("slow");
                });

                $("#flip2").click(function () {
                    $("#panel2").slideToggle("slow");
                });

                $("#flip3").click(function () {
                    $("#panel3").slideToggle("slow");
                });
            });
          </script>
           
          <style> 
          

          .panel {
             
              display: none;
          }
          </style>
</head>
<body>
    <?php 
    $vertical_menu_links = [
        "Nome do link"=>"link_de_redirecionamento.html"
    ]; 
    include(VIEWS_PATH.'/module_base.php'); 
    ?>
    <section onclick="closeNav()">

    <div class="container-fluid">

       <h1 class="text-left mr-5 mt-4" >Gestão de Programas de Treinamento</h1> 

        <div class="input-group-append">
                  <button type="button" class="btn btn-primary mb-2" id="button-addon2" data-toggle="modal" data-target="#exampleModal4">Adicionar Programa de Treinamento</button>
                </div>

       <div class="row justify-content-md-center mt-5">
                <div class="col-sm-2 ">
                           <div>
                           <select class="custom-select" >
                              
                              <option value="1">Corpo todo</option>
                              <option value="2">Abdômen</option>
                              <option value="3">Braço</option>
                              <option value="4">Costas e Ombros</option>
                              <option value="5">Perna</option>
                              <option value="6">Peito</option>
                            </select>
                            </div>
                </div>
                <div class="col-sm-4 ">
                        <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Digite aqui" aria-label="Recipient's username" aria-describedby="button-addon2">
                              <div class="input-group-append">
                                <button type="button" class="btn btn-dark" id="button-addon2">Pesquisar</button>
                              </div>
                        </div>
                </div>
        </div>

        <h3 class="ml-5 mt-5 mb-5">Resultados encontrados:</h3> 



        <!-- BRAÇO INICIANTE -->


        <div class="row justify-content-md-center mb-2 mt-4"> 
      
              <div class="col col-lg-2">
                <a class="btn btn-dark" data-toggle="collapse" href="javascript:void(0)" data-target="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><h5>Braço Iniciante</h5></a>
              </div>
              <div class="col-md-auto mt-2">
                 <div>
            <h4>Dificuldade:</h4>
                 </div>
              </div>
              <div class="col col-lg-2 ml-2 mt-3">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                     </div>
              </div>

              <div class="col-md-auto mt-1">
                  <div class="input-group-append">
                  <button type="button" class="btn btn-primary mb-2" id="button-addon2" data-toggle="modal" data-target="#exampleModal4">Editar Programa de Treinamento</button>
                </div>
                </div>
                <div class="col-md-auto mt-1">
                  <div class="input-group-append">
                  <button type="button" class="btn btn-info mb-2" id="button-addon2" data-toggle="modal" data-target="#exampleModal2">Adicionar novo exercício</button>
                </div>
                </div>
                <div class="col-md-auto mt-1">
                  <div class="input-group-append">
                  <button type="button" class="btn btn-danger mb-2" id="button-addon2" data-toggle="modal" data-target="#exampleModal6">Excluir Programa de Treinamento</button>
                </div>
                </div>

      </div>

        <div class="collapse multi-collapse" id="multiCollapseExample1">
        <div class="card-body">
      

            <table class="table table-striped table-dark" >
           <thead class="thead-dark">
              <tr>
                <th scope="col">Exercício</th>
                <th scope="col">Número de repetições</th>
                <th scope="col">Intervalo</th>
                <th scope="col">Carga/Peso</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Supino Reto (pegada aberta)</td>
                <td> 4 séries de 8 a 11 repetições</td>
                <td> Máximo de 1min</td>
                <td> 5kg </td>
                <td> <button type="button" class="btn btn-primary" id="button-addon2" data-toggle="modal" data-target="#exampleModal">Editar</button></td>
                <td> <button type="button" class="btn btn-danger" id="button-addon2" data-toggle="modal" data-target="#exampleModal3">Excluir</button></td>
              </tr>
              <tr>
                <td>Supino Inclinado (pegada aberta)</td>
                <td> 4 séries de 8 a 11 repetições</td>
                <td> Máximo de 1min</td>
              <td>5kg </td>
                <td> <button type="button" class="btn btn-primary" id="button-addon2" data-toggle="modal" data-target="#exampleModal">Editar</button></td>
                <td> <button type="button" class="btn btn-danger" id="button-addon2" data-toggle="modal" data-target="#exampleModal3">Excluir</button></td>
              </tr>
              <tr>
                 <td>Crucifixo Reto</td>
                 <td> 4 séries de 8 a 11 repetições</td>
                 <td> Máximo de 1min</td>
                  <td> 5kg </td>
              <td> <button type="button" class="btn btn-primary" id="button-addon2" data-toggle="modal" data-target="#exampleModal">Editar</button></td>
              <td> <button type="button" class="btn btn-danger" id="button-addon2" data-toggle="modal" data-target="#exampleModal3">Excluir</button></td>
              </tr>
               <tr>
                 <td>Crucifixo Voador</td>
                 <td> 4 séries de 8 a 11 repetições</td>
                 <td> Máximo de 1min</td> 
                <td> 5kg </td>

                  <td> <button type="button" class="btn btn-primary" id="button-addon2" data-toggle="modal" data-target="#exampleModal">Editar</button></td>
                  <td> <button type="button" class="btn btn-danger" id="button-addon2" data-toggle="modal" data-target="#exampleModal3">Excluir</button></td>
              </tr>
            </tbody>
          </table>

        </div>
       </div>



        <!-- PEITO INTERMEDIÁRIO -->




           <div class="row justify-content-md-center mb-2 mt-4"> 
      
              <div class="col col-lg-2">
                <a class="btn btn-dark" data-toggle="collapse" href="javascript:void(0)" data-target="#multiCollapseExample2" role="button" aria-expanded="false" aria-controls="multiCollapseExample2"><h5>Peito Intermediário</h5></a>
              </div>
              <div class="col-md-auto mt-2">
                 <div>
            <h4>Dificuldade:</h4>
                 </div>
              </div>
              <div class="col col-lg-2 ml-2 mt-3">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                     </div>
              </div>

              <div class="col-md-auto mt-1">
                  <div class="input-group-append">
                  <button type="button" class="btn btn-primary mb-2" id="button-addon2" data-toggle="modal" data-target="#exampleModal4">Editar Programa de Treinamento</button>
                </div>
                </div>
                <div class="col-md-auto mt-1">
                  <div class="input-group-append">
                  <button type="button" class="btn btn-info mb-2" id="button-addon2" data-toggle="modal" data-target="#exampleModal2">Adicionar novo exercício</button>
                </div>
                </div>
                <div class="col-md-auto mt-1">
                  <div class="input-group-append">
                  <button type="button" class="btn btn-danger mb-2" id="button-addon2" data-toggle="modal" data-target="#exampleModal6">Excluir Programa de Treinamento</button>
                </div>
                </div>

      </div>

        <div class="collapse multi-collapse" id="multiCollapseExample2">
        <div class="card-body">
            

            <table class="table table-striped table-dark" >
           <thead class="thead-dark">
              <tr>
                <th scope="col">Exercício</th>
                <th scope="col">Número de repetições</th>
                <th scope="col">Intervalo</th>
                <th scope="col">Carga/Peso</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Supino Reto (pegada aberta)</td>
                <td> 6 séries de 8 a 11 repetições</td>
                <td> Máximo de 1min</td>
                <td>5kg  </td>
                <td> <button type="button" class="btn btn-primary" id="button-addon2" data-toggle="modal" data-target="#exampleModal">Editar</button></td>
                <td> <button type="button" class="btn btn-danger" id="button-addon2" data-toggle="modal" data-target="#exampleModal3">Excluir</button></td>
              </tr>
              <tr>
                <td>Supino Inclinado (pegada aberta)</td>
                <td> 6 séries de 8 a 11 repetições</td>
                <td> Máximo de 1min</td>
              <td> 5kg </td>
                <td> <button type="button" class="btn btn-primary" id="button-addon2" data-toggle="modal" data-target="#exampleModal">Editar</button></td>
                <td> <button type="button" class="btn btn-danger" id="button-addon2" data-toggle="modal" data-target="#exampleModal3">Excluir</button></td>
              </tr>
              <tr>
                 <td>Crucifixo Reto</td>
                 <td> 6 séries de 8 a 11 repetições</td>
                 <td> Máximo de 1min</td>
            <td>5kg  </td>
              <td> <button type="button" class="btn btn-primary" id="button-addon2" data-toggle="modal" data-target="#exampleModal">Editar</button></td>
              <td> <button type="button" class="btn btn-danger" id="button-addon2" data-toggle="modal" data-target="#exampleModal3">Excluir</button></td>
              </tr>
               <tr>
                 <td>Crucifixo Voador</td>
                 <td> 4 séries de 8 a 11 repetições</td>
                 <td> Máximo de 1min</td>
                <td>5kg </td>

                  <td> <button type="button" class="btn btn-primary" id="button-addon2" data-toggle="modal" data-target="#exampleModal">Editar</button></td>
                  <td> <button type="button" class="btn btn-danger" id="button-addon2" data-toggle="modal" data-target="#exampleModal3">Excluir</button></td>
              </tr>
            </tbody>
          </table>


        </div>
        </div>



         <!-- PERNA AVANÇADO -->



        
           <div class="row justify-content-md-center mb-2 mt-4"> 
      
              <div class="col col-lg-2">
                <a class="btn btn-dark" data-toggle="collapse" href="javascript:void(0)" data-target="#multiCollapseExample3" role="button" aria-expanded="false" aria-controls="multiCollapseExample3"><h5>Perna Avançado</h5></a>
              </div>
              <div class="col-md-auto mt-2">
                 <div>
            <h4>Dificuldade:</h4>
                 </div>
              </div>
              <div class="col col-lg-2 ml-2 mt-3">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                     </div>
              </div>

              <div class="col-md-auto mt-1">
                  <div class="input-group-append">
                  <button type="button" class="btn btn-primary mb-2" id="button-addon2" data-toggle="modal" data-target="#exampleModal4">Editar Programa de Treinamento</button>
                </div>
                </div>
                <div class="col-md-auto mt-1">
                  <div class="input-group-append">
                  <button type="button" class="btn btn-info mb-2" id="button-addon2" data-toggle="modal" data-target="#exampleModal2">Adicionar novo exercício</button>
                </div>
                </div>
                <div class="col-md-auto mt-1">
                  <div class="input-group-append">
                  <button type="button" class="btn btn-danger mb-2" id="button-addon2" data-toggle="modal" data-target="#exampleModal6">Excluir Programa de Treinamento</button>
                </div>
                </div>

      </div>

         <div class="collapse multi-collapse" id="multiCollapseExample3">
        <div class="card-body">

            <table class="table table-striped table-dark" >
           <thead class="thead-dark">
              <tr>
                <th scope="col">Exercício</th>
                <th scope="col">Número de repetições</th>
                <th scope="col">Intervalo</th>
                <th scope="col">Carga/Peso</th>

                <th></th>
                <th></th>

              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Supino Reto (pegada aberta)</td>
                <td> 8 séries de 8 a 11 repetições</td>
                <td> Máximo de 1min</td>  
                <td>5kg  </td>
                <td> <button type="button" class="btn btn-primary" id="button-addon2" data-toggle="modal" data-target="#exampleModal">Editar</button></td>
                <td> <button type="button" class="btn btn-danger" id="button-addon2" data-toggle="modal" data-target="#exampleModal2">Excluir</button></td>
              </tr>
              <tr>
                <td>Supino Inclinado (pegada aberta)</td>
                <td> 8 séries de 8 a 11 repetições</td>
                <td> Máximo de 1min</td>
              <td> 5kg </td>
                <td> <button type="button" class="btn btn-primary" id="button-addon2" data-toggle="modal" data-target="#exampleModal">Editar</button></td>
                <td> <button type="button" class="btn btn-danger" id="button-addon2" data-toggle="modal" data-target="#exampleModal3">Excluir</button></td>
              </tr>
              <tr>
                 <td>Crucifixo Reto</td>
                 <td> 8 séries de 8 a 11 repetições</td>
                 <td> Máximo de 1min</td>
                <td> 5kg </td>
              <td> <button type="button" class="btn btn-primary" id="button-addon2" data-toggle="modal" data-target="#exampleModal">Editar</button></td>
              <td> <button type="button" class="btn btn-danger" id="button-addon2" data-toggle="modal" data-target="#exampleModal2">Excluir</button></td>
              </tr>
               <tr>
                 <td>Crucifixo Voador</td>
                 <td> 8 séries de 8 a 11 repetições</td>
                 <td> Máximo de 1min</td>
                <td>5kg </td>

                  <td> <button type="button" class="btn btn-primary" id="button-addon2" data-toggle="modal" data-target="#exampleModal">Editar</button></td>
                  <td> <button type="button" class="btn btn-danger" id="button-addon2" data-toggle="modal" data-target="#exampleModal3">Excluir</button></td>
              </tr>
            </tbody>
          </table>

         <div class="row justify-content-md-center">
                <div class="col-md-auto">
                  <div class="input-group-append">
                  <button type="button" class="btn btn-primary mb-5" id="button-addon2" data-toggle="modal" data-target="#exampleModal4">Editar Programa de Treinamento</button>
                </div>
                </div>
                <div class="col-md-auto">
                  <div class="input-group-append">
                  <button type="button" class="btn btn-info mb-5" id="button-addon2" data-toggle="modal" data-target="#exampleModal2">Adicionar novo exercício</button>
                </div>
                </div>
                <div class="col-md-auto">
                  <div class="input-group-append">
                  <button type="button" class="btn btn-danger mb-5" id="button-addon2" data-toggle="modal" data-target="#exampleModal6">Excluir Programa de Treinamento</button>
                </div>
                </div>
                </div>

        </div>
         </div>

    </div>
    
</section>  


            <!-- EDITAR EX -->




          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Editar Excercício do Programa de Treinamento</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Nome do exercício:</label>
                      <input type="text" class="form-control" id="recipient-name">
                      <label for="recipient-name" class="col-form-label">Número de repetições:</label>
                      <input type="text" class="form-control" id="recipient-name">
                      <label for="recipient-name" class="col-form-label">Intervalo:</label>
                      <input type="text" class="form-control" id="recipient-name">
                      <label for="recipient-name" class="col-form-label">Carga/Peso:</label>
                      <input type="text" class="form-control" id="recipient-name">
                    </div>
                    
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn btn-primary">Salvar</button>
                </div>
              </div>
            </div>
          </div>


          <!-- NOVO EX -->



          <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Novo Excercício do Programa de Treinamento</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Nome do exercício:</label>
                      <input type="text" class="form-control" id="recipient-name">
                      <label for="recipient-name" class="col-form-label">Número de repetições:</label>
                      <input type="text" class="form-control" id="recipient-name">
                      <label for="recipient-name" class="col-form-label">Intervalo:</label>
                      <input type="text" class="form-control" id="recipient-name">
                      <label for="recipient-name" class="col-form-label">Carga/Peso:</label>
                      <input type="text" class="form-control" id="recipient-name">
                    </div>
                    
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn btn-primary">Salvar</button>
                </div>
              </div>
            </div>
          </div>

          <!-- EXCLUIR EX -->

         <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Excluir</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Tem certeza que deseja que excluir o exercício?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                          <button type="button" class="btn btn-primary">Excluir</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  




            <!-- EDITAR PT -->


          <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Editar Programa de Treinamento</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="form-group">
                       <label for="recipient-name" class="col-form-label">Nome do programa de treinamento:</label>
                      <input type="text" class="form-control" id="recipient-name">
                      <label for="recipient-name" class="col-form-label">Dificuldade:</label>
                      <input type="text" class="form-control" id="recipient-name">
                    </div>
                    
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn btn-primary">Salvar</button>
                </div>
              </div>
            </div>
          </div>


          <!-- NOVO PT -->



          <div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Novo Programa de Treinamento</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Nome do programa de treinamento:</label>
                      <input type="text" class="form-control" id="recipient-name">
                      <label for="recipient-name" class="col-form-label">Dificuldade:</label>
                      <input type="text" class="form-control" id="recipient-name">
                    </div>
                    
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn btn-primary">Salvar</button>
                </div>
              </div>
            </div>
          </div>

          <!-- EXCLUIR PT -->

         <div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Excluir</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Tem certeza que deseja que excluir o programa de treinamento?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                          <button type="button" class="btn btn-primary">Excluir</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  



    <footer class="footer bg-dark text-white">
        <div class="container center ">
            <div class="row justify-content-center ">
                <span>© 2018 - Todos os Direitos Reservados - Mais Saúde São João</span>
                <br>
                <span>Desenvolvido por alunos do <a href="https://sbv.ifsp.edu.br/">Instituto Federal de Educação Ciência e Tecnologia de São Paulo - Campus São João da Boa Vista</a></span>
            </div>
        </div>
    </footer>
</body>
</html>