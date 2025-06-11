<!-- Função dataTable -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
  
<!-- Função dataTable -->

<!-- Função dataTable -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script>
  $(document).ready(function () {
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


<div class="card-body">
  <div class="table-responsive pt-3">
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex auth px-0">
          <div class="row w-100 mx-0">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
            <h2>Alunos Inscritos no Evento</h2>
            
              
              <html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
    

    

</body>
</html>
<style> 
    th {
      background-color: #3BBFC3!important;
    }
</style>

              <table id= "TABELINHA" class="table table-bordered">
                <thead>
                  <tr>
                    <th>Prontuário</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Data de Nascimento</th>
                    <th>Sexo</th>
                    <th>Curso</th>
                    <th>Campus</th>
                    <th>Modalidades</th>
                    <th>Gerar PDF do Aluno</th>
                  </tr>
                </thead>
                <tbody>
                  
                <?php foreach($this->getView()->alunos_inscritos_eventos as $aluno_inscrito_evento) { ?>
                  <tr>
                    <td><?php echo $aluno_inscrito_evento->__get('ALU_PRONTUARIO'); ?></td>
                    <td><?php echo $aluno_inscrito_evento->__get('ALU_NOME'); ?></td>
                    <td><?php echo $aluno_inscrito_evento->__get('ALU_CPF'); ?></td>
                    <td><?php echo $aluno_inscrito_evento->__get('ALU_DATA_NASCIMENTO'); ?></td>
                    <td><?php echo $aluno_inscrito_evento->__get('ALU_SEXO'); ?></td>
                    <td><?php echo $aluno_inscrito_evento->__get('CUR_NOME'); ?></td>
                    <td><?php echo $aluno_inscrito_evento->__get('CAM_NOME'); ?></td>
                    <td><?php echo $aluno_inscrito_evento->__get('MDE_NOME'); ?></td>
                    <td><a href="/dashboard/alunos_inscritos_eventos/pdf_lista?AIE_ID=<?php echo $aluno_inscrito_evento->__get('AIE_ID'); ?>"><button type="button" class="btn btn-outline-info " > 
                          <i class="ti-printer btn-icon-append"></i>                                                                              
                        </button></a></td></tr><?php } ?>

                </tbody>
              </table>
              <br><br>


              <a href="/dashboard/alunos_inscritos_eventos/pdf?EVO_ID=<?php echo $_GET['EVO_ID']; ?>">
              <button type="button">Gerar PDF <i class="ti-printer btn-icon-append"></i></button>
              </a>
              
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
    $(document).ready(function () {
  var table = $('#TABELINHA').DataTable({
  // Localization
  "language": {
  "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json"
  },
  "responsive": true
  }).draw(true).columns.adjust(); 
  });
  </script>
  <!-- Função dataTable -->
</html>
