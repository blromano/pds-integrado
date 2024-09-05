<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title"><?php echo $this->getView()->title; ?></h5>
              </div>
              <div class="card-body">
                <form action="/dashboard/alterarReclamacao" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="FK_CIDADAOS_USU_ID" value="1">
                  <div class="row">
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label class="text">Título da Reclamação</label>
                        <input type="text" class="form-control" name="REC_TITULO_RECLAMACAO" value="<?php echo $this->getView()->reclamacoes->__get('REC_TITULO_RECLAMACAO'); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="text">Setor da Prefeitura</label>
                    </div>
                    <div class="row">
                    <select name="FK_SETORES_SET_ID">
                    <option value="1" <?php if($this->getView()->reclamacoes->__get('FK_SETORES_SET_ID')=='1') echo "selected"; ?>>Gabinete do Prefeito</option>
                      <option value="2" <?php if($this->getView()->reclamacoes->__get('FK_SETORES_SET_ID')=='2') echo "selected"; ?>>Administração da Prefeitura</option>
                      <option value="3" <?php if($this->getView()->reclamacoes->__get('FK_SETORES_SET_ID')=='3') echo "selected"; ?>>Desenvolvimento Econômico</option>
                      <option value="4" <?php if($this->getView()->reclamacoes->__get('FK_SETORES_SET_ID')=='4') echo "selected"; ?>>Segurança e Trânsito</option>
                      <option value="5" <?php if($this->getView()->reclamacoes->__get('FK_SETORES_SET_ID')=='5') echo "selected"; ?>>Assistência Social</option>
                      <option value="6" <?php if($this->getView()->reclamacoes->__get('FK_SETORES_SET_ID')=='6') echo "selected"; ?>>Comunicação Social</option>
                      <option value="7" <?php if($this->getView()->reclamacoes->__get('FK_SETORES_SET_ID')=='7') echo "selected"; ?>>Cultura</option>
                      <option value="8" <?php if($this->getView()->reclamacoes->__get('FK_SETORES_SET_ID')=='8') echo "selected"; ?>>Educação</option>
                      <option value="9" <?php if($this->getView()->reclamacoes->__get('FK_SETORES_SET_ID')=='9') echo "selected"; ?>>Engenharia</option>
                      <option value="10" <?php if($this->getView()->reclamacoes->__get('FK_SETORES_SET_ID')=='10') echo "selected"; ?>>Esportes</option>
                      <option value="11" <?php if($this->getView()->reclamacoes->__get('FK_SETORES_SET_ID')=='11') echo "selected"; ?>>Finanças</option>
                      <option value="12" <?php if($this->getView()->reclamacoes->__get('FK_SETORES_SET_ID')=='12') echo "selected"; ?>>Procuradoria-Geral do Município</option>
                      <option value="13" <?php if($this->getView()->reclamacoes->__get('FK_SETORES_SET_ID')=='13') echo "selected"; ?>>Meio Ambiente, Agricultura e Abastecimento</option>
                      <option value="14" <?php if($this->getView()->reclamacoes->__get('FK_SETORES_SET_ID')=='14') echo "selected"; ?>>Gestão e Planejamento Urbano</option>
                      <option value="15" <?php if($this->getView()->reclamacoes->__get('FK_SETORES_SET_ID')=='15') echo "selected"; ?>>Recursos Humanos</option>
                      <option value="16" <?php if($this->getView()->reclamacoes->__get('FK_SETORES_SET_ID')=='16') echo "selected"; ?>>Saúde</option>
                      <option value="17" <?php if($this->getView()->reclamacoes->__get('FK_SETORES_SET_ID')=='17') echo "selected"; ?>>Secretaria Geral</option>
                      <option value="18" <?php if($this->getView()->reclamacoes->__get('FK_SETORES_SET_ID')=='18') echo "selected"; ?>>Obras e Serviços Públicos</option>
                      <option value="19" <?php if($this->getView()->reclamacoes->__get('FK_SETORES_SET_ID')=='19') echo "selected"; ?>>Turismo</option>
                      <option value="20" <?php if($this->getView()->reclamacoes->__get('FK_SETORES_SET_ID')=='20') echo "selected"; ?>>Habitação</option>
                      <option value="21" <?php if($this->getView()->reclamacoes->__get('FK_SETORES_SET_ID')=='21') echo "selected"; ?>>Tecnologia da Informação</option>
                      <option value="22" <?php if($this->getView()->reclamacoes->__get('FK_SETORES_SET_ID')=='22') echo "selected"; ?>>Proteção e Bem-Estar Animal</option>
                    </select>
                  </div><br>

                  <div class="row">
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label class="text">Descrição do Problema</label>
                        <textarea rows="4" cols="80" class="form-control" name="REC_DESCRICAO" id="REC_DESCRICAO" placeholder="Descrição do problema"><?php echo $this->getView()->reclamacoes->__get('REC_DESCRICAO'); ?></textarea>
                      </div>
                    </div>
                  </div>

                  <div>
                  <label class="text" for="REC_ANEXO">Anexar documento:</label>
                  <input type="file" id="REC_ANEXO" name="REC_ANEXO" value="<?php echo $this->getView()->reclamacoes->__get('REC_ANEXO'); ?>">
                  </div>

                  <div>
                    <input type="hidden" class="form-control" name="REC_ID" id="REC_ID" value="<?php echo $this->getView()->reclamacoes->__get('REC_ID'); ?>">
                  </div>
                  <div class="row">
                  <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-save"></i> Salvar</button>&nbsp;
                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-backspace"></i> Cancelar</button>
                  </div>
                  
                </form>
              </div>
            </div>
          </div>
          
      </div>