

<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="title"><?php echo $this->getView()->title; ?></h5>
        </div>
        <div class="card-body">

        <div class=container>              
                <form class="form-mod05" action="/dashboard/inserirResponsavelPrefeitura" method='POST'>              
                    <label for="">Nome</label>
                    <textarea id="USU_NOME" name="USU_NOME" required ></textarea>
                    <label for="">Setor que é responsável</label>
                    <textarea id="FK_SETORES_SET_ID" name="FK_SETORES_SET_ID" required ></textarea>              

                    
                    <select id="" name="">
                        <?php foreach ($this->getView()->setor as $dado) { ?>                        
                            <option value=""> <?php echo $dado->__get('SET_ID'); ?> - <?php echo $dado->__get('SET_NOME'); ?></option>                                                                    
                        <?php } ?>                
                    </select>
                        </br></br>
                    <input type="submit" value="Enviar" id="botaoEnviar" required>                        
                </form>
            </div>
        </div>
    </div>
</div>
</div>
