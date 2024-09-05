<!--Tabela da listagem:-->
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title"><?php echo $this->getView()->title; ?></h5>
              </div>
              <div class="card-body">
                 <!--inicio do pop up-->
    <!-- Inclua o CSS do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script>
        function confirmarExclusao() {
            // Use a função do Bootstrap para exibir a janela modal
            $('#confirmModal').modal('show');
        }

        function excluir() {
            // Redirecione para a página de exclusão após clicar em "Excluir"
            window.location.href = "listagemRecEnviadas";
        }
    </script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/js/bootstrap.min.js"></script>




    <!-- Janela modal personalizada usando o Bootstrap -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Exclusão</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Tem certeza de que deseja excluir esta reclamação?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" onclick="excluir()">Excluir</button>
            </div>
        </div>
    </div>
</div>

<!--fim do pop up-->
<!--

                  <table style="width:100%">
                 
                    <tr>
                        <th>Titúlo da reclamação</th>
                        <th>Departamento</th>
                        <th>Data/Horário</th>
                        <th>Situação</th>
                        <th>Ações</th>
                    </tr>
                    <tr>
                        <td>Rua esburacada</td>
                        <td>Engenharia</td>
                        <td>11/05/2023 | 13:40</td>
                        <td style="color: red">Pendente</td>
                        <td>
                        <button class="btn btn-info" type="">Editar</button>
                        <button onclick="confirmarExclusao()" class="btn btn-danger">Excluir</button>


                        </td>
                    </tr>
                    <tr>
                    <td>Falta de livros</td>
                        <td>Educação</td>
                        <td>23/04/2023 | 10:30</td>
                        <td style="color: red">Pendente</td>
                        <td>
                        <button class="btn btn-info" type="">Editar</button>
                        <button onclick="confirmarExclusao()" class="btn btn-danger">Excluir</button>
                        </td>
                    </tr>
                    <tr>
                    <td>Esgoto podre</td>
                        <td>Engenharia</td>
                        <td>23/02/2023 | 12:30</td>
                        <td style="color: red">Pendente</td>
                        <td>
                        <button class="btn btn-info" type="">Editar</button>
                        <button onclick="confirmarExclusao()" class="btn btn-danger">Excluir</button>
                        </td>
                    </tr>
                    <tr>
                    <td>Falta de macas</td>
                        <td>Saúde</td>
                        <td>11/02/2023 | 13:40</td>
                        <td>10/01/2023 | 18:01</td>
                        <td style="color: #18ce0f">Resolvido</td>
                        <td>
                        <button class="btn btn-success" type="">Avaliar</button>
                        </td>
                    </tr>
                  </table>
                        <div>
                        <button class="btn btn-success" type="">Nova Reclamação</button>
                        </div>
                        fim da tabela de listagem-->

                
                        


