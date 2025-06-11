<link rel="stylesheet" href="/resources/css/verInsc.css">
      <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <div class="botaopesquisa">
                <div class="h1">
                <h1>Alunos Inscritos</h1>
                </div>
                <div class="pesquiss">
                <div class="search-container">
  </div>
                </div>  
                </div>
                <div class="nhac">
                  <div class="uber">
                    <table class="nhac1" id="iguinho">
                      <thead>
                        <tr>

                            <th>#ID</th>
                            <th>Nome</th>
                            <th>Prontuário</th>
                            <th>Esporte</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                            foreach($this->getView()->alunos_inscritos_modalidades as $alunos_inscritos){ ?>
                            <tr>
                                <td>
                                <?php echo $alunos_inscritos->__get('ALU_ID'); ?>
                                </td>
                                <td>
                                <?php echo $alunos_inscritos->__get('ALU_NOME'); ?>
                                </td>
                                <td>
                                <?php echo $alunos_inscritos->__get('ALU_PRONTUARIO'); ?>
                                </td>
                                <td>
                                <?php echo $alunos_inscritos->__get('MDE_NOME'); ?>
                                </td>
                                <td>
                                    <a href="/dashboard/modalidade/verificar?=<?php echo $alunos_inscritos->__get('ALU_ID'); ?>" ><button type="button" class="arroba">Verificar</button></a>
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
            </div> <div class="blau"><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
  <script>
    $(document).ready(function () {
  var table = $('#iguinho').DataTable({
  // Localization
  "language": {
  "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json"
  },
  "responsive": true
  }).draw(true).columns.adjust(); 
  });
  </script></div>
  <!-- Função dataTable -->
            