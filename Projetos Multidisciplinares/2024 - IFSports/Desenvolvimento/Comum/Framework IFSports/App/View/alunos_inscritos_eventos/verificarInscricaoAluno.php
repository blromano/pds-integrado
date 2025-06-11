<!-- Função dataTable -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />

<!-- Função dataTable -->

<!-- Função dataTable -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script>
  $(document).ready(function() {
    var table = $('#tabela').DataTable({
      // Localization
      "language": {
        "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json"
      },
      "responsive": true
    }).draw(true).columns.adjust();
  });
</script>

<!-- Função dataTable -->
<link rel="stylesheet" href="/resources/css/verInsc.css">
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="botaopesquisa">
        <div class="h1">
          <h1>Inscritos em Eventos</h1>
        </div>
        <div class="pesquiss">
          <div class="search-container">
          </div>
        </div>
      </div>
      <div class="table-responsive pt-3">
        <table class="table table-bordered" id="nominho" style="margin: 0 auto; width: 80%;">
          <thead>
            <tr>
              <th>#ID</th>
              <th>Nome</th>
              <th>Prontuário</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            /* print_r($this->getView()->alunos_inscritos_eventos);
            exit(); */
            foreach ($this->getView()->alunos_inscritos_eventos as $alunos_inscritos) { ?>
              <tr>
                <td>
                  <?php echo $alunos_inscritos->__get('AIE_ID'); ?>
                </td>
                <td>
                  <?php echo $alunos_inscritos->__get('ALU_NOME'); ?>
                </td>
                <td>
                  <?php echo $alunos_inscritos->__get('ALU_PRONTUARIO'); ?>
                </td>
                <td>
                  <a href="/dashboard/aluno/verificar?AIE_ID=<?php echo $alunos_inscritos->__get('AIE_ID'); ?>"><button type="button" class="arroba">Verificar</button></a>
                </td>

              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
<!-- Função dataTable -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script>
  $(document).ready(function() {
    var table = $('#nominho').DataTable({
      // Localization
      "language": {
        "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json"
      },
      "responsive": true
    }).draw(true).columns.adjust();
  });
</script>
<!-- Função dataTable -->