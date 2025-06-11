<style>
  .btn {
    /*width: 100px;;  Ajuste a largura conforme necessário */
    margin: 5px 0; /* Espaçamento entre os botões */
  }

  h2 {
    text-align: center;
  }
</style>

<style> 
    th {
      background-color: #3BBFC3!important;
    }
</style>

<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h2 class="template-demo">Listagem de Equipes por Modalidade do Responsável</h2>
      <p class="card-description"></p>
      <div class="table-responsive pt-3">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Modalidade</th>
              <th>Evento</th>
              <th>Data de Início do Evento</th>
              <th><center>Ações</center></th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($this->getView()->equipes_responsavel_evento_modalidade as $equipe) { ?>
            <tr>
              <td><?php echo $equipe->__get('MDE_NOME'); ?></td>
              <td><?php echo $equipe->__get('EVO_NOME'); ?></td>
              <td><?php echo $equipe->__get('EVO_DATA_INICIO'); ?></td>
              <td>
                <a href="/everton/editar?id=<?php echo $equipe->__get('REM_ID'); ?>">
                  <button type="button" class="btn btn-primary">Desvincular Equipe Esportiva ao Evento</button>
                </a>
                <a href="/dashboard/alunos_inscritos_modalidades/listar?EVM_ID=<?php echo $equipe->__get('FK_EVENTOS_MODALIDADES_EVM_ID'); ?>">
                  <button type="button" class="btn btn-info">Alunos Inscritos</button>
                </a>
              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
