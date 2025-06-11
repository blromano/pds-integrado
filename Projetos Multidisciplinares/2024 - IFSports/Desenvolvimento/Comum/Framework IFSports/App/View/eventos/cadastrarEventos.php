<link rel="stylesheet" href="../../resources/css/modalidades.css">

  <div class= "formcentralize">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Adicionar Novo Evento</h4><br>
                    <form action="/dashboard/eventos/inserir" class="forms-sample" method="POST">

                        <div class="form-group">
                          <label for="nomeEvento">Nome do Evento</label>
                          <input type="text" class="form-control" id="EVO_NOME" name="EVO_NOME" placeholder="" required>
                        </div><br>

                        <div class="form-group">
                          <label for="ResponsavelEvento">Organizador responsável pelo Evento</label>
                              <select class="form-control" id="FK_ORGANIZADORES_EVENTOS_ORE_ID" name="FK_ORGANIZADORES_EVENTOS_ORE_ID" required>                      
                                <option value="" >Selecione o Organizador do Evento</option>
                                  <?php                                 

                                  foreach($this->getView()->organizadores_eventos as $oe) { ?>
                                    <option value="<?php echo $oe->__get('ORE_ID'); ?>">
                                        <?php echo $oe->__get('ORE_NOME'); ?>
                                    </option>
                                <?php } ?>
                              </select>
                        </div><br>              

                        <div class="form-group">
                          <label for="exampleInputName2">Local de Realização do Evento</label>
                              <select class="form-control" id="FK_CAMPUS_CAM_ID" name="FK_CAMPUS_CAM_ID" required>
                                  <option>Selecione o Campus</option> 
                                    <?php                                 

                                    foreach($this->getView()->campus as $cam) { ?>
                                      <option value="<?php echo $cam->__get('CAM_ID'); ?>">
                                          <?php echo $cam->__get('CAM_NOME'); ?>
                                      </option>
                                  <?php } ?>
                              </select>
                        </div><br><br>
                        
                        <div class="form-group" >
                          <label for="exampleInputData1">Data de Inicio</label>
                          <input  type="date" id="EVO_DATA_INICIO" name="EVO_DATA_INICIO" class="form-control" placeholder="ano-mes-dia" required>
                        </div><br>

                        <div class="form-group">
                          <label for="exampleInputData2">Data de Termino</label>
                          <input type="date" id="EVO_DATA_FIM" name="EVO_DATA_FIM" class="form-control" placeholder="ano-mes-dia" required>
                        </div><br>

                        <div class="form-group">
                          <label for="exampleInputUsername1">Status</label>
                                <select id="EVO_STATUS" name="EVO_STATUS" class="form-control" required>
                                  <option selected>Selecione o status</option> 
                                  <option value="NÃO REALIZADO">Não Realizado</option>
                                  <option value="EM ANDAMENTO">Em Andamento</option>
                                  <option value="CONCLUÍDO">Concluido</option>
                                  <option value="CANCELADO">Cancelado</option>
                                </select>
                        </div><br><br>

                        <div class="form-group">
                      <label for="idade">Idade Minima</label>
                        <input type="number" class="form-control" id="EVO_RESTRICAO_IDADE_MIN" name="EVO_RESTRICAO_IDADE_MIN" required>
                    </div><br>

                    <div class="form-group">
                      <label for="idade">Idade Maxima</label>
                        <input type="number" class="form-control" id="EVO_RESTRICAO_IDADE_MAX"  name="EVO_RESTRICAO_IDADE_MAX" required>
                    </div><br><br>

                    <div class="form-group">
                      <label for="exampleSelectGender">Genero</label>
                        <select class="form-control" id="EVO_RESTRICAO_GENERO" name="EVO_RESTRICAO_GENERO" required>
                          <option selected>Selecione o genero</option> 
                          <option value="FEMININO">Feminino</option>
                          <option value="MASCULINO">Masculino</option>
                          <option value="AMBOS">Ambos</option>
                        </select>
                      </div><br><br>
                      

                    <div class="form-group">
                      <label for="modind">Quantidade Minima de Incrições em Modalidades Individuais</label>
                        <input type="number" class="form-control" id="EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MIN" name="EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MIN" required>
                    </div><br>

                    <div class="form-group">
                      <label for="modind">Quantidade Maxima de Incrições em Modalidades Individuais</label>
                        <input type="number" class="form-control" id="EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MAX" name="EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MAX">
                    </div><br>

                    <div class="form-group">
                      <label for="modind">Quantidade Minima de Incrições em Modalidades Coletivas</label>
                        <input type="number" class="form-control" id="EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MIN" name="EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MIN" required>
                    </div><br>

                    <div class="form-group">
                      <label for="modind">Quantidade Maxima de Incrições em Modalidades Coletivas</label>
                        <input type="number" class="form-control" id="EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MAX" name="EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MAX">
                    </div><br><br>

                    <div class="form-group">
                      <label for="exampleTextarea1">Restrições Especificas</label>
                      <textarea class="form-control" id="EVO_RESTRICAO_OUTRAS" name="EVO_RESTRICAO_OUTRAS" rows="4"></textarea>
                    </div><br>

                        <!-- <input type="submit" class="btn btn-primary mr-2" value="Salvar">
                        <a href="/dashboard/eventos/listar" onclick="confirm();" class="btn btn-danger" >Cancelar</a> -->

                        <input type="submit" class="btn btn-primary mr-2" value="Salvar">
                        <a href="/dashboard/eventos/listar"><input type="cancel" class="btn btn-primary mr-2" value="Cancelar" onclick="confirm();"></a>

                    </form>
            </div>
        </div>
    </div>
</div>