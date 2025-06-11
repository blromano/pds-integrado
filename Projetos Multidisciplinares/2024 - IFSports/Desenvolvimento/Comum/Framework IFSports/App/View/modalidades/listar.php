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
        <div class="col-lg-5 btn_add">
          <p class="card-description"><a href="/dashboard/modalidades/adicionar?EVO_ID=<?php echo $_GET['EVO_ID']; ?>" class="btn btn-success"><i class="mdi mdi-plus"></i></a></p>
        </div>
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
                <th class="centralize">Esporte</th>
                <th class="centralize">Modalidade</th>
                <th class="centralize">Gênero</th>
                <th class="centralize">Quantidade Minima de Jogadores por Equipes</th>
                <th class="centralize">Quantidade Maxima de Jogadores por Equipes</th>
                <th class="centralize">Responsáveis Atribuidos</th>
                <th class="centralize">Alunos Inscritos</th>
                <th class="centralize">Ações</th>
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
                                  <a href="/dashboard/responsaveis_equipe/listar?EVM_ID=<?php echo $modalidade->__get('EVM_ID'); ?>" ><button type="button" class="btn btn-inverse-info">Responsáveis</button></a>
                            </td>
                            <td>
                                  <form action="/dashboard/meus_eventos_aluno/listar_alunos_modalidades" method="POST">
                                      <button type="submit" class="btn btn-inverse-info" >
                                          <i class="fas fa-times-circle"></i>
                                          <input type="hidden" name="EVM_ID" id="EVM_ID" value="<?php echo $modalidade->__get('EVM_ID')?>" >
                                          <div class="bold-text">Alunos</div></button>
                                  </form>
                            </td>

                            <td class="centralize">
                                <a href="/dashboard/modalidades/GerenciarTabelasDeResultados?EVM_ID=<?php echo $modalidade->__get('EVM_ID'); ?>" class="btn btn-inverse-success" ><?php echo $this->getView()->icone_resultado; ?></a>

                                <a href="/dashboard/modalidades/editar?EVM=<?php echo $modalidade->__get('EVM_ID'); ?>" class="btn btn-dark">
                                    <?php echo $this->getView()->icone_editar; ?>
                                </a>
                                <a href="#" onclick="submitFeedback(<?php echo $modalidade->__get('EVM_ID'); ?>, '<?php echo $_GET['EVO_ID']; ?>');" class="btn btn-danger">
                                    <?php echo $this->getView()->icone_excluir; ?>
                                </a>
                            </td>      
                        </tr>
                <?php } ?> 
            </tbody>
        </table>
      </div>
    </div>
    <a href="/dashboard/alunos_inscritos_eventos/listar?EVO_ID=<?php echo $_GET['EVO_ID']; ?>" ><button type="button" class="btn btn-inverse-info">Todos Alunos do Evento</button></a>
  </div>
</div>

<script>
function submitFeedback(EVM_ID, EVO_ID) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
    });

    swalWithBootstrapButtons.fire({
        title: "Tem certeza que deseja excluir essa modalidade?",
        text: "Você não será capaz de reverter essa ação",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sim, realize a ação",
        cancelButtonText: "Não, cancele a ação",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = `/dashboard/modalidades/excluir?EVM_ID=${EVM_ID}&EVO_ID=${EVO_ID}`;
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