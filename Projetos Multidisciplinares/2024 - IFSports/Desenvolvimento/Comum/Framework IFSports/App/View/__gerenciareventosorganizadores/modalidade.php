<link rel="stylesheet" href="../../resources/css/modalidades.css">
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div>
        <div class="col-lg-7 title_evento">
          Modalidades do [Nome do Eventos]
        </div>
        <div class="col-lg-5 btn_add">
          <p class="card-description"><a href="/dashboard/novamodalidade"><button type="button" class="btn btn-success"  title="Adicionar"><i class="mdi mdi-plus"></i></button></a></p>
        </div>
      </div>
      <br clear="all">
      <div>
        <div class="formpesquisa">
          <form method="POST" action="pesquisar.php">
            <input type="text" name="pesquisar" placeholder="Pesquisar Modalidades">
            <button type="button" title="Filtrar"><i class="icon-search"></i></button>
          </form>
        </div>
      </div>

      <div class="table-responsive pt-3">
        <table class="table table-bordered">
          <thead>
            <thead>
              <tr>
                <th class="centralize">Esporte</th>
                <th class="centralize">Modalidade</th>
                <th class="centralize">Gênero</th>
                <th class="centralize">Quantidade Minima de Jogadores por Equipes</th>
                <th class="centralize">Quantidade Maxima de Jogadores por Equipes</th>
                <th class="centralize">Ações</th>
              </tr>
            </thead>

          <tbody>
            <tr>
              <td class="centralize">Futebol</td>
              <td class="centralize">Coletivo</td>
              <td class="centralize">Feminino</td>
              <td class="centralize">22</td>
              <td class="centralize">66</td>
              <td class="centralize">
                <a href="/dashboard/editarmodalidade" ><button type="button" class="btn btn-dark" title="Editar"><i class="mdi mdi-marker"></i></button></a>
                <button type="button" class="btn btn-danger" onclick="submitFeedback();" title="Excluir"><i class="mdi mdi-delete-forever"></i></button>
              </td>
            </tr>
            <tr>
              <td class="centralize">Basquete</td>
              <td class="centralize">Coletivo</td>
              <td class="centralize">Masculino</td>
              <td class="centralize">12</td>
              <td class="centralize">36</td>
              <td class="centralize"><a href="/dashboard/editarmodalidade"><button type="button" class="btn btn-dark" title="Editar"><i class="mdi mdi-marker"></i></button></a>
                <button type="button" class="btn btn-danger" onclick="submitFeedback();" title="Excluir"><i class="mdi mdi-delete-forever"></i></button>
              </td>
            </tr>
            <tr>
              <td class="centralize">Volei</td>
              <td class="centralize">Coletivo</td>
              <td class="centralize">Feminino</td>
              <td class="centralize">24</td>
              <td class="centralize">48</td>
              <td class="centralize"><a href="/dashboard/editarmodalidade"><button type="button" class="btn btn-dark" title="Editar"><i class="mdi mdi-marker"></i></button></a>
                <button type="button" class="btn btn-danger" onclick="submitFeedback();" title="Excluir"><i class="mdi mdi-delete-forever"></i></button>
              </td>
            </tr>
          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>


<script>
  function submitFeedback() {
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: "btn btn-success",
        cancelButton: "btn btn-danger"
      },
      buttonsStyling: false
    });

    swalWithBootstrapButtons.fire({
      title: "Tem certeza que deseja excluir essa modalidade?",
      text: "Você não sera capaz de reverter essa ação",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Sim, realize a ação",
      cancelButtonText: "Não, cancele a ação",
      reverseButtons: true
    }).then((result) => {

      if (result.isConfirmed) {
        window.location.href = "/dashboard/gmodalidades";

      }
    });
  }
</script>