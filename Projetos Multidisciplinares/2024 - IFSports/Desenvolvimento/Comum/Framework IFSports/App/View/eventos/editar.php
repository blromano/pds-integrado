<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Editar Evento</h4><br>
                <form action="/dashboard/eventos/alterar" class="forms-sample" method="POST">

                    <div class="form-group">
                      <label for="exampleInputEmail1">Nome do Evento</label>
                      <input type="text" class="form-control" id="EVO_NOME" name="EVO_NOME" placeholder="" value="<?php echo $this->getView()->eventoModel->__get('EVO_NOME'); ?>">
                    </div><br>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Organizador responsável pelo Evento</label>                     

                      <select class="form-control" id="FK_ORGANIZADORES_EVENTOS_ORE_ID" name="FK_ORGANIZADORES_EVENTOS_ORE_ID" value="">
                                <option selected>Selecione o Organizador</option>                                             
                                <?php  

                                  foreach($this->getView()->organizadores_eventos as $oe) { ?>
                                    <option value=" <?php echo $oe->__get('ORE_ID'); ?>" <?php  if( $oe->__get('ORE_ID')==$this->getView()->eventoModel->__get('FK_ORGANIZADORES_EVENTOS_ORE_ID')){echo "selected";} ?>>
                                        <?php echo $oe->__get('ORE_NOME'); ?>
                                    </option>
                                <?php } ?>
                              </select>
                    </div><br>                  

                    <div class="form-group">
                          <label for="exampleInputName2">Local de Realização do Evento</label>
                              <select class="form-control" id="FK_CAMPUS_CAM_ID" name="FK_CAMPUS_CAM_ID" value="">
                                  <option selected>Selecione o Campus</option> 
                                  <?php                                 

                                  foreach($this->getView()->campus as $cam) { ?>
                                    <option value="<?php echo $cam->__get('CAM_ID'); ?>" <?php  if( $cam->__get('CAM_ID')==$this->getView()->eventoModel->__get('FK_CAMPUS_CAM_ID')){echo "selected";} ?>>
                                        <?php echo $cam->__get('CAM_NOME'); ?>
                                    </option>
                                  <?php } ?>
                              </select>
                        </div><br>

                    <div class="form-group" >
                          <label for="exampleInputData1">Data de Inicio</label>
                          <input  type="date" id="EVO_DATA_INICIO" name="EVO_DATA_INICIO" class="form-control" placeholder="ano-mes-dia" value="<?php echo $this->getView()->eventoModel->__get('EVO_DATA_INICIO'); ?>" />
                        </div><br>

                        <div class="form-group">
                          <label for="exampleInputData2">Data de Termino</label>
                          <input type="date" id="EVO_DATA_FIM" name="EVO_DATA_FIM" class="form-control" placeholder="ano-mes-dia" value="<?php echo $this->getView()->eventoModel->__get('EVO_DATA_FIM'); ?>" />
                        </div><br>

                        <div class="form-group">
                          <label for="exampleInputUsername1">Status</label>
                                <select id="EVO_STATUS" name="EVO_STATUS" class="form-control" value="">
                                  <option selected>Selecione o status</option> 
                                  <option value="NÃO REALIZADO" <?php  if($this->getView()->eventoModel->__get('EVO_STATUS')=="NÃO REALIZADO"){echo "selected";} ?> >Não Realizado</option>
                                  <option value="EM ANDAMENTO"  <?php  if($this->getView()->eventoModel->__get('EVO_STATUS')=="EM ANDAMENTO"){echo "selected";} ?>  >Em Andamento</option>
                                  <option value="CONCLUÍDO"     <?php  if($this->getView()->eventoModel->__get('EVO_STATUS')=="CONCLUÍDO"){echo "selected";} ?>     >Concluido</option>
                                  <option value="CANCELADO"     <?php  if($this->getView()->eventoModel->__get('EVO_STATUS')=="CANCELADO"){echo "selected";} ?>     >Cancelado</option>
                                </select>
                        </div><br>

                        <div class="form-group">
                          <label for="idade">Idade Minima</label>
                            <input type="number" class="form-control" id="EVO_RESTRICAO_IDADE_MIN" name="EVO_RESTRICAO_IDADE_MIN" value="<?php echo $this->getView()->eventoModel->__get('EVO_RESTRICAO_IDADE_MIN'); ?>">
                        </div><br>

                        <div class="form-group">
                          <label for="idade">Idade Maxima</label>
                            <input type="number" class="form-control" id="EVO_RESTRICAO_IDADE_MAX"  name="EVO_RESTRICAO_IDADE_MAX" value="<?php echo $this->getView()->eventoModel->__get('EVO_RESTRICAO_IDADE_MAX'); ?>">
                        </div><br>

                        <div class="form-group">
                        <label for="exampleSelectGender">Genero</label>
                          <select class="form-control" id="EVO_RESTRICAO_GENERO" name="EVO_RESTRICAO_GENERO" value="">
                            <option selected>Selecione o genero</option> 
                            <option value="FEMININO"  <?php  if($this->getView()->eventoModel->__get('EVO_RESTRICAO_GENERO')=="FEMININO"){echo "selected";} ?>  >Feminino</option>
                            <option value="MASCULINO" <?php  if($this->getView()->eventoModel->__get('EVO_RESTRICAO_GENERO')=="MASCULINO"){echo "selected";} ?> >Masculino</option>
                            <option value="AMBOS"     <?php  if($this->getView()->eventoModel->__get('EVO_RESTRICAO_GENERO')=="AMBOS"){echo "selected";} ?>     >Ambos</option>
                          </select>
                        </div><br><br>                       

                        <div class="form-group">
                          <label for="modind">Quantidade Minima de Incrições em Modalidades Individuais</label>
                            <input type="number" class="form-control" id="EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MIN" name="EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MIN" value="<?php echo $this->getView()->eventoModel->__get('EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MIN'); ?>">
                        </div><br>

                        <div class="form-group">
                          <label for="modind">Quantidade Maxima de Incrições em Modalidades Individuais</label>
                            <input type="number" class="form-control" id="EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MAX" name="EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MAX" value="<?php echo $this->getView()->eventoModel->__get('EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MAX'); ?>">
                        </div><br>

                        <div class="form-group">
                          <label for="modind">Quantidade Minima de Incrições em Modalidades Coletivas</label>
                            <input type="number" class="form-control" id="EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MIN" name="EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MIN" value="<?php echo $this->getView()->eventoModel->__get('EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MIN'); ?>">
                        </div><br>

                        <div class="form-group">
                          <label for="modind">Quantidade Maxima de Incrições em Modalidades Coletivas</label>
                            <input type="number" class="form-control" id="EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MAX" name="EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MAX" value="<?php echo $this->getView()->eventoModel->__get('EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MAX'); ?>">
                        </div><br>

                        <div class="form-group">
                          <label for="exampleTextarea1">Restrições Especificas</label>
                          <textarea class="form-control" id="EVO_RESTRICAO_OUTRAS" name="EVO_RESTRICAO_OUTRAS" rows="4" ><?php echo $this->getView()->eventoModel->__get('EVO_RESTRICAO_OUTRAS'); ?></textarea>
                        </div><br>
                    
                    <input type="hidden" name="EVO_ID" id="EVO_ID" value="<?php echo $this->getView()->eventoModel->__get('EVO_ID'); ?>">

                    <input type="submit" class="btn btn-primary mr-2" value="Salvar">
                    <a href="/dashboard/eventos/listar"><input type="cancel" class="btn btn-primary mr-2" value="Cancelar" onclick="confirm();"></a>

                </form>

        </div>
    </div>
</div>