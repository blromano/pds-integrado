<link rel="stylesheet" href="../../resources/css/modalidades.css">
<div class="formcentralize">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?php echo $this->getView()->title ?></h4><br><br>
                <form action="/dashboard/secretarios_eventos/restringir" class="forms-sample" method="POST">
                    
                    <div class="form-group">
                      <label for="LGN_ATIVO">Status do Secretário</label>
                      <select class="form-control" id="LGN_ATIVO" name="LGN_ATIVO">
                          <option value="1" <?php echo ($this->getView()->secretarios_eventosModel->__get('LGN_ATIVO') == '1') ? 'selected' : ''; ?>>Ativo</option>
                          <option value="2" <?php echo ($this->getView()->secretarios_eventosModel->__get('LGN_ATIVO') == '2') ? 'selected' : ''; ?>>Inativo</option>
                      </select>
                    </div><br>

                    <div class="form-group">
                      <label for="LGN_JUSTIFICATIVA_RESTRICAO">Justificativa de Restrição</label>
                      <textarea class="form-control" id="LGN_JUSTIFICATIVA_RESTRICAO" name="LGN_JUSTIFICATIVA_RESTRICAO" rows="4"><?php echo $this->getView()->secretarios_eventosModel->__get('LGN_JUSTIFICATIVA_RESTRICAO'); ?></textarea>
                    </div><br>

                    <input type="hidden" name="LGN_ID" id="LGN_ID" value="<?php echo $this->getView()->secretarios_eventosModel->__get('LGN_ID'); ?>">

                    <input type="submit" class="btn btn-primary mr-2" value="Salvar">
                    <a href="/dashboard/secretarios_eventos/listar" class="btn btn-danger">Cancelar</a>

                </form>
            </div>
        </div>
    </div>
</div>
