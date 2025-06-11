<!-- Função dataTable -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
  
<!-- Função dataTable -->
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <!-- Título -->
      <h4 class="card-title mb-4"><?php echo $this->getView()->title; ?></h4>
      
      <!-- Botão de Cadastro e Barra de Pesquisa em Linha -->
      <div class="mb-2" style="margin-bottom: 10px;">
        <!-- Botão Cadastrar Novo no Canto Superior Esquerdo -->
        <a href="/dashboard/responsaveis_equipe/adicionar" class="btn btn-success" style="height: 40px;">Cadastrar Novo</a>
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
<style> 
    th {
      background-color: #3BBFC3!important;
    }
</style>

      <!-- Tabela de Responsáveis -->
      <div class="table-responsive">
        <table id= "TABELINHA" class="table table-bordered">
          <thead>
            <tr>
              <th >ID</th>
              <th >Nome</th>
              <th >Email</th>
              <th>Prontuário</th>
              <th>CPF</th>
              <th>Campus</th>
              <th>Atribuir Modalidade ao Responsável</th>
              <th>Editar</th>
              <th>Excluir</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($this->getView()->responsaveis as $responsavelModel) { ?>
            <tr>
              <td><?php echo $responsavelModel->__get('RES_ID'); ?></td>
              <td><?php echo $responsavelModel->__get('RES_NOME'); ?></td>
              <td><?php echo $responsavelModel->__get('LGN_EMAIL'); ?></td>
              <td><?php echo $responsavelModel->__get('RES_PRONTUARIO'); ?></td>
              <td><?php echo $responsavelModel->__get('RES_CPF'); ?></td>
              <td><?php echo $responsavelModel->__get('CAM_NOME'); ?></td>
              <td>
                <a href="/dashboard/responsaveis_equipe_evento_modalidade/atribuirresponsavel?RES_ID=<?php echo $responsavelModel->__get('RES_ID'); ?>" class="btn btn-inverse-info">Escolher</a>
              </td>
              <td>
                <a href="/dashboard/responsaveis_equipe/editar?RES_ID=<?php echo $responsavelModel->__get('RES_ID'); ?>" class="btn btn-dark"><?php echo $this->getView()->icone_editar; ?></a>
              </td>
              <td> <a href="#" onclick="excluirResponsavel(<?php echo $responsavelModel->__get('RES_ID'); ?>)" class="btn btn-danger">
                    <i class="mdi mdi-delete-forever"></i>
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

<script>
function excluirResponsavel(RES_ID) {
  Swal.fire({
    title: 'Tem certeza?',
    text: "Essa ação não poderá ser desfeita!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sim, excluir!',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      fetch(`/dashboard/responsaveis_equipe/excluir?RES_ID=${RES_ID}`, { method: 'GET' })
      .then(response => {
        if (response.ok) {
          Swal.fire('Excluído!', 'O responsável foi excluído.', 'success').then(() => {
            location.reload();
          });
        } else {
          Swal.fire('Erro!', 'Não foi possível excluir o responsável. Tente novamente.', 'error');
        }
      })
      .catch(error => {
        Swal.fire('Erro!', 'Ocorreu um problema na requisição. Verifique sua conexão e tente novamente.', 'error');
      });
    }
  });
}
</script>
