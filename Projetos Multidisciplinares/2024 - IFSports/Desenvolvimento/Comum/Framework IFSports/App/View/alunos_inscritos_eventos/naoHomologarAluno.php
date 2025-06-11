<link rel="stylesheet" href="/resources/css/verificarInsc.css">
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
    <script>



function redirecionarListarAlunos(AIE_ID) {
                Swal.fire({
                    title: 'Tem certeza?',
                    text: "Essa ação não poderá ser desfeita!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, cancelar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Fazer a requisição de exclusão
                        fetch(`/dashboard/aluno/listar`)
                            .then(response => {
                                if (response.ok) {
                                  window.location.href = "/dashboard/aluno/listar";
                                } else {
                                  window.location.href = "/dashboard/aluno/naoHomologarAluno?AIE_ID=";
                                }
                            })
                    }
                });
            }
</script>
      <h1>Justificativa</h1>
      <form enctype="multipart/form-data" action="/dashboard/aluno/justificativa" method="POST" onsubmit="validarFormulario(event)">
      <div class="table-responsive pt-3">
        <table class="table table-bordered">
            <thead>
            <tr>
              <th>
                #ID
              </th>
              <th>
                Nome
              </th>
              <th>
                Prontuário
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
              <?php echo $this->getView()->alunos_inscritos_eventos->__get('AIE_ID'); ?>
              </td>
              <td>
              <?php echo $this->getView()->alunos_inscritos_eventos->__get('ALU_NOME'); ?>
              </td>
              <td>
              <?php echo $this->getView()->alunos_inscritos_eventos->__get('ALU_PRONTUARIO'); ?>
              </td>
            </tr> 
          </tbody>
        </table>
        <div class="area">
        <div class="esc">
        <input type="text" class="input" id="AIE_JUSTIFICATIVA" name="AIE_JUSTIFICATIVA" required placeholder="Insira sua justificativa:">
        </div> 
        <a href="/dashboard/aluno/justificativa?AIE_ID=<?php echo $this->getView()->alunos_inscritos_eventos->__get('AIE_ID'); ?>"><input  class="arrobaa"type="submit" value="Enviar"></a>
        <button type="button" class="arrobaa1" onclick="redirecionarListarAlunos()">Cancelar</button>
        </div>
</form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>