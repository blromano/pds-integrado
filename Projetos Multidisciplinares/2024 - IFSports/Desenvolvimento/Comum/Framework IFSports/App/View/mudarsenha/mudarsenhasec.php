<link rel="stylesheet" href="../../resources/css/modalidades.css">
<div class="formcentralize">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?php echo $this->getView()->title ?></h4><br><br>
                <form action="/dashboard/secretarios_eventos/mudarsenha" class="forms-sample" method="POST">

                    <div class="form-group">
                      <label for="LGN_SENHA">Nova Senha do Secretario</label>
                      <input type="text" class="form-control" id="LGN_SENHA" name="LGN_SENHA" placeholder="" value="<?php echo $this->getView()->secretarios_eventosModel->__get('LGN_SENHA'); ?>">
                    </div><br>

                    <div class="form-group">
                      <label for="LGN_SENHA_CONFIRMACAO">Confirme a Nova Senha do Secretario</label>
                      <input type="text" class="form-control" id="LGN_SENHA_CONFIRMACAO" name="LGN_SENHA_CONFIRMACAO" placeholder="" value="">
                    </div><br>


                    <input type="hidden" name="LGN_TIPO" id="LGN_TIPO" value="SE">

                    <input type="hidden" name="LGN_ID" id="LGN_ID" value="<?php echo $this->getView()->secretarios_eventosModel->__get('LGN_ID'); ?>">

                    <input type="submit" class="btn btn-primary mr-2" value="Salvar">
                    <a href="/dashboard" class="btn btn-danger">Cancelar</a>

                </form>
            </div>
        </div>
    </div>
</div>