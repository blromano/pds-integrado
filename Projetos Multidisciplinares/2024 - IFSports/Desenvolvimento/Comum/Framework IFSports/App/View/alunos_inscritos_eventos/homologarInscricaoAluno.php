<link rel="stylesheet" href="/resources/css/verificarInsc.css"> 
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h1>Homologação de Alunos em Eventos</h1>
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
              <th>
                Cópia do RG
              </th>
              <th>
                Autorização
              </th>
              <th>
                Boletim
              </th>
              <th>
                Foto
              </th>
              <th>
                Actions
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
              <td>
              <?php echo $this->getView()->alunos_inscritos_eventos->__get('AIE_COPIA_RG'); ?>
              </td>
              <td>
              <?php echo $this->getView()->alunos_inscritos_eventos->__get('AIE_AUTORIZACAO_PAIS'); ?>
              </td>
              <td>
              <?php echo $this->getView()->alunos_inscritos_eventos->__get('AIE_BOLETIM_ESCOLAR'); ?>
              </td>
              <td>
              <?php echo $this->getView()->alunos_inscritos_eventos->__get('AIE_FOTO_PESSOAL'); ?>
              </td>
              <td>
              <?php /* O primeiro botão irá deferir a inscrição do aluno no banco de dados "inserir" as informações*/
                    /* O segundo irá para outra página que irá Justificar para que o aluno seja informado sobre qual informação foi "errada"*/?>
             <a href="/dashboard/aluno/inserirAluno?AIE_ID=<?php echo $this->getView()->alunos_inscritos_eventos->__get('AIE_ID'); ?>"><button type="button" class="arroba">Homologar</button></a>
              <a href="/dashboard/aluno/naoHomologarAluno?AIE_ID=<?php echo $this->getView()->alunos_inscritos_eventos->__get('AIE_ID'); ?>"><button type="button" class="arroba">Não Homologar</button></a>  
            </td>
            </tr> 
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>