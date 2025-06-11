
<link rel="stylesheet" href="../../resources/css/modalidades.css" >
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">                 
              <div>
                  <div class="col-lg-7 title_evento"> Restrições do Evento </div>
              </div>
              <br clear="all">       
                     <div class="table-responsive pt-3">
                     <table id="tabela" class="table table-bordered">
                      <thead>
                        <tr>
                          <th class="centralize">Idade minima</th>
                          <th class="centralize">Idade maxima</th>
                          <th class="centralize">Genero</th>
                          <th class="centralize">Quantidade Minima de Incrições em Modalidades Individuais</th>
                          <th class="centralize">Quantidade Maxima de Incrições em Modalidades Individuais</th>
                          <th class="centralize">Quantidade Minima de Incrições em Modalidades Coletivas</th>
                          <th class="centralize">Quantidade Maxima de Incrições em Modalidades Coletivas</th>
                          <th class="centralize">Restrições Especificas</th>
                        </tr>
                      </thead>              

                      <tbody>
                        <?php foreach($this->getView()->eventos as $eventoModel){ ?>
                          <tr>
                            <td>
                              <?php echo $eventoModel->__get('EVO_RESTRICAO_IDADE_MIN'); ?>
                            </td>
                            <td>
                            <?php echo $eventoModel->__get('EVO_RESTRICAO_IDADE_MAX'); ?>
                            </td>
                            <td>
                            <?php echo $eventoModel->__get('EVO_RESTRICAO_GENERO'); ?>
                            </td>
                            <td>
                              <?php echo $eventoModel->__get('EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MIN'); ?>
                            </td>
                            <td>
                            <?php echo $eventoModel->__get('EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MAX'); ?>
                            </td>
                            <td>
                            <?php echo $eventoModel->__get('EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MIN'); ?>
                            </td>
                            <td>
                              <?php echo $eventoModel->__get('EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MAX'); ?>
                            </td>
                            <td>
                            <?php echo $eventoModel->__get('EVO_RESTRICAO_OUTRAS'); ?>
                            </td>
                                            
                            <a href="/dashboard/eventos/listar" onclick="confirm();" class="btn btn-danger" >Voltar</a>
                          </tr>
                          <?php } ?>
                      
                    </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
