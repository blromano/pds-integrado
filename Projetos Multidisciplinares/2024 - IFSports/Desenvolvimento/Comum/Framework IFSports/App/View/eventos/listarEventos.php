<link rel="stylesheet" href="../../resources/css/modalidades.css">
<!-- Função dataTable -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
  
<!-- Função dataTable -->
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  
              <div>
                  <div class="col-lg-7 title_evento"> Listar Eventos </div>
                  <div class="col-lg-5 btn_add">
                   <p class="card-description"><a href="/dashboard/eventos/cadastrar" class="btn btn-success"> <i class="mdi mdi-plus"></i></a></p>
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
                          <th class="centralize">ID</th>
                          <th class="centralize">Nome do Evento</th>
                          <th class="centralize">Status</th>
                          <th class="centralize">Campus Residente</th>
                          <th class="centralize">Organizador Responsável</th>
                          <th class="centralize">Secretarios Atribuidos</th>
                          <th class="centralize">Gestão de Modalidades</th>
                          <th class="centralize">Gestão de Restrições</th>
                          <th class="centralize">Ações</th>
                        </tr>
                      </thead>                 

                      <tbody>
                        <?php foreach($this->getView()->eventos as $eventoModel){ ?>
                          <tr>
                            <td>
                              <?php echo $eventoModel->__get('EVO_ID'); ?>
                            </td>
                            <td>
                            <?php echo $eventoModel->__get('EVO_NOME'); ?>
                            </td>
                            <td>
                            <?php echo $eventoModel->__get('EVO_STATUS'); ?>
                            </td>
                            <td>
                            <?php echo $eventoModel->__get('CAM_NOME'); ?>
                            </td>
                            <td>
                            <?php echo $eventoModel->__get('ORE_NOME'); ?>
                            </td>
                            <td>
                                  <a href="/dashboard/eventos/atribuirsec?EVO_ID=<?php echo $eventoModel->__get('EVO_ID'); ?>" ><button type="button" class="btn btn-inverse-primary">Secretários</button></a>
                            </td>
                            <td>
                                  <a href="/dashboard/modalidades/listar?EVO_ID=<?php echo $eventoModel->__get('EVO_ID'); ?>" ><button type="button" class="btn btn-inverse-info">Modalidades</button></a>
                            </td>
                            <td>
                                  <a href="/dashboard/eventos/restricoes?EVO_ID=<?php echo $eventoModel->__get('EVO_ID'); ?>" ><button type="button" class="btn btn-inverse-success">Restrições</button></a>
                            </td>                      
                            <td>
                                  <a href="/dashboard/eventos/editar?EVO_ID=<?php echo $eventoModel->__get('EVO_ID'); ?>" class="btn btn-dark" ><?php echo $this->getView()->icone_editar; ?></a>
                                  <a href="#" onclick="excluirEvento(<?php echo $eventoModel->__get('EVO_ID'); ?>)" class="btn btn-danger"><i class="mdi mdi-delete-forever"></i></a>
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



function excluirEvento(EVO_ID) {
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
                        // Fazer a requisição de exclusão
                        fetch(`/dashboard/eventos/excluir?EVO_ID=${EVO_ID}`, {
                                method: 'GET'
                            })
                            .then(response => {
                                if (response.ok) {
                                    Swal.fire(
                                        'Excluído!',
                                        `O evento foi excluído.`,
                                        'success'
                                    ).then(() => {
                                        // Recarrega a página para atualizar a lista
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire(
                                        'Erro!',
                                        'Não foi possível excluir o evento. Tente novamente.',
                                        'error'
                                    );
                                }
                            })
                            .catch(error => {
                                Swal.fire(
                                    'Erro!',
                                    'Ocorreu um problema na requisição. Verifique sua conexão e tente novamente.',
                                    'error'
                                );
                            });
                    }
                });
            }




function submitFeedback() {
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: "btn btn-success",
        cancelButton: "btn btn-danger"
    },
      buttonsStyling: false
  });

    swalWithBootstrapButtons.fire({
      title: "Tem certeza que deseja excluir esse evento?",
      text: "Você não sera capaz de reverter essa ação",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Sim, realize a ação",
      cancelButtonText: "Não, cancele a ação",
      reverseButtons: true
  }).then((result) => {

  if (result.isConfirmed) {
    window.location.href="/dashboard/eventos/listar";

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



            <?php

              /////// Link das rotas
              /////// <ul class="nav flex-column sub-menu">
              ///////<li class="nav-item"> <a   href="/dashboard/gmodalidades">Modalidades</a></li>
              ///////<li class="nav-item"> <a   href="/dashboard/gsecretarios">Secretarios</a></li>
              ///////<li class="nav-item"> <a   href="/dashboard/grestricao">Restrições</a></li>
              ///////<li class="nav-item"> <a   href="/dashboard/novoeventos">Novo Evento</a></li>
              ///////<li class="nav-item"> <a   href="/dashboard/editareventos">Editar</a></li>
              ///////<li class="nav-item"> <a   href="/dashboard/excluireventos">Excluir</a></li>
              ///////<li class="nav-item"> <a   href="/dashboard/filtrareventos">Filtrar</a></li>
              ///////</ul>

            ?>