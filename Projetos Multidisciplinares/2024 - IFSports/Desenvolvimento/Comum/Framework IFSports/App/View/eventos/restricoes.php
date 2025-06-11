<link rel="stylesheet" href="../../resources/css/modalidades.css">
<!-- Função dataTable -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
  
<!-- Função dataTable -->
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">                 
              <div>
                  <div class="col-lg-7 title_evento"> Restrições do Evento </div>
              </div>
      <br clear="all">

      <style> 
          th {
            background-color: #3BBFC3!important;
          }
      </style>
      
      <div class="table-responsive pt-3">
        <table id="tabela" class="table table-bordered">
          <thead>  
            <tr>
              <th class="centralize">Idade mínima</th>
              <th class="centralize">Idade máxima</th>
              <th class="centralize">Gênero</th>
              <th class="centralize">Qtde Mín de Insc Individuais</th>
              <th class="centralize">Qtde Max de Insc Individuais</th>
              <th class="centralize">Qtde Min de Insc Coletivas</th>
              <th class="centralize">Qtde Max de Insc Coletivas</th>
              <th class="centralize">Restrições Específicas</th>
            </tr>
          </thead>

          <tbody>
            <?php 
            $eventoModel = $this->getView()->eventos[0]; 
            ?>
            <tr>
              <td><?php echo $eventoModel->__get('EVO_RESTRICAO_IDADE_MIN'); ?></td>
              <td><?php echo $eventoModel->__get('EVO_RESTRICAO_IDADE_MAX'); ?></td>
              <td><?php echo $eventoModel->__get('EVO_RESTRICAO_GENERO'); ?></td>
              <td><?php echo $eventoModel->__get('EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MIN'); ?></td>
              <td><?php echo $eventoModel->__get('EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MAX'); ?></td>
              <td><?php echo $eventoModel->__get('EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MIN'); ?></td>
              <td><?php echo $eventoModel->__get('EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MAX'); ?></td>
              <td><?php echo $eventoModel->__get('EVO_RESTRICAO_OUTRAS'); ?></td>             
            </tr>
          </tbody>
        </table>
        <br>
        <a href="/dashboard/eventos/listar" class="btn btn-inverse-info">Voltar</a>
      </div>
    </div>
  </div>
</div>


<!-- Script para o botão "Voltar" com confirmação -->
<script>
  document.querySelectorAll('a.btn-danger').forEach(function(button) {
    button.addEventListener('click', function(event) {
      var confirmacao = confirm('Você tem certeza que deseja voltar?');
      if (!confirmacao) {
        event.preventDefault(); // Se o usuário cancelar, a ação é impedida
      }
    });
  });
</script>
