<link rel="stylesheet" href="../../resources/css/modalidades.css">
<!-- Função dataTable -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
  
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">

      <div>
        <div class="col-lg-7 title_evento">
          <?php echo $this->getView()->texto . $this->getView()->nome_evento; ?>
        </div>
        
      </div>
        <br clear="all">



      <div class="table-responsive pt-3">
        <table id="tabela" class="table table-bordered">
          <thead>
            <thead>
              <tr>
                <th class="centralize">Esporte</th>
                <th class="centralize">Modalidade</th>
                <th class="centralize">Gênero</th>
                <th class="centralize">Quantidade Minima de Jogadores por Equipes</th>
                <th class="centralize">Quantidade Maxima de Jogadores por Equipes</th>
                <th class="centralize">Responsáveis Atribuidos</th>
                <th class="centralize">Desinscrever Responsável </th>
                
              </tr>
            </thead>

            <tbody>
                <?php foreach($this->getView()->modalidades as $modalidade){ ?>

                        <tr>

                            <td class="centralize">
                            <?php echo $modalidade->__get('MDE_NOME'); ?>
                            </td>

                            <td class="centralize">
                                <?php echo $modalidade->__get('MDE_TIPO'); ?>
                            </td>

                            <td class="centralize">
                                <?php echo $modalidade->__get('MDE_GENERO'); ?>
                            </td>

                            <td class="centralize">
                                <?php echo $modalidade->__get('MDE_QUANTIDADE_MINIMA_JOGADORES'); ?>
                            </td>

                            <td class="centralize">
                                <?php echo $modalidade->__get('MDE_QUANTIDADE_MAXIMA_JOGADORES'); ?>
                            </td>

                            <td>
                                  <a href="/dashboard/responsaveis_equipe_evento_modalidade/inserirresponsavelmodalidade?EVM_ID=<?php echo $modalidade->__get('EVM_ID'); ?>&RES_ID=<?php echo $_GET['RES_ID']; ?>" ><button type="button" class="btn btn-inverse-info">Atribuir Modalidade</button></a>
                            </td>
                            <td>
                              <a href="#" onclick="excluirResponsavelModalidade(<?php echo $modalidade->__get('EVM_ID'); ?>, '<?php echo $_GET['RES_ID']; ?>');" class="btn btn-danger">
                                    <?php echo $this->getView()->icone_excluir; ?>
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
function excluirResponsavelModalidade(RES_ID, EVM_ID) {
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
      fetch(`/dashboard/responsaveis_equipe_evento_modalidade/excluirresponsavelmodalidade?RES_ID=${RES_ID}&EVM_ID=${EVM_ID}`, { method: 'GET' })
      .then(response => {
        if (response.ok) {
          Swal.fire('Excluído!', 'O responsável foi excluído da modalidade.', 'success').then(() => {
            location.reload();
          });
        } else {
          Swal.fire('Erro!', 'Não foi possível excluir o responsável da modalidade. Tente novamente.', 'error');
        }
      })
      .catch(error => {
        Swal.fire('Erro!', 'Ocorreu um problema na requisição. Verifique sua conexão e tente novamente.', 'error');
      });
    }
  });
}
</script>

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