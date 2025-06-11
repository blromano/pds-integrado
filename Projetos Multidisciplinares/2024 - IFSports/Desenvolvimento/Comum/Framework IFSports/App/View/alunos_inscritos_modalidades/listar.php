<style>
  .btn .mdi {
      color: red; 
      
    }
    .my-custom-class {
      background-color: transparent;
    }
</style>
<div class="card-body">
  <div class="table-responsive pt-3">
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex auth px-0">
          <div class="row w-100 mx-0">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <h4 class="card-title">Alunos Inscritos na Modalidade</h4>
              
            
  <style> 
    th {
      background-color: #3BBFC3!important;
      }
  </style>        

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Selecionar</th>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>Prontuário</th>
                    <th>Modalidade</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $cont=1; foreach($this->getView()->alunos_inscritos_modalidades as $aluno_inscrito_modalidade) { ?>
                  <tr>
                    <td><input 
                        type="checkbox" name="alunos_selecionados[]" id="checkbox_<?php echo $cont; ?>" 
                        value="<?php echo $aluno_inscrito_modalidade->__get('ALU_ID'); ?>">
                    </td>
                    <td><?php echo $aluno_inscrito_modalidade->__get('ALU_CPF'); ?></td>
                    <td><?php echo $aluno_inscrito_modalidade->__get('ALU_NOME'); ?></td>
                    <td><?php echo $aluno_inscrito_modalidade->__get('ALU_PRONTUARIO'); ?></td>
                    <td><?php echo $aluno_inscrito_modalidade->__get('MDE_NOME'); ?></td>
                  </tr>
                  <?php $cont++; }?>

                </tbody>
              </table><br><br>
              <a href="/dashboard/alunos_selecionados/selecionar">
                <button type="submit" class="btn btn-inverse-info"> Selecionar </button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>